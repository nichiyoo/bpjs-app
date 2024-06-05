<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    protected array $durations = ['Bulanan', 'Tahunan'];
    protected array $statuses = ['Berjalan', 'Selesai'];
    protected array $types = ['IPDS', 'Produksi', 'Distribusi', 'Neraca', 'Sosial'];

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $user = request()->user();

        $status = request('status');
        $type = request('type') ?? $this->types[0];
        $type = in_array($type, $this->types) ? $type : $this->types[0];

        $surveys = Survey::when($user, function ($query) use ($user) {
            return $user->hasRole('admin') ? $query : $query->where('user_id', $user->id);
        })
            ->when($type, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->paginate(10)
            ->withQueryString();

        return view('users.surveys.index', [
            'surveys' => $surveys,
            'types' => $this->types,
            'statuses' => $this->statuses,
            'type' => $type,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Request $request): View
    {
        $type = $request->get('type') ?? $this->types[0];
        $type = in_array($type, $this->types) ? $type : $this->types[0];

        return view('users.surveys.create', [
            'types' => $this->types,
            'durations' => $this->durations,
            'statuses' => $this->statuses,
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurveyRequest $request)
    {
        $user = request()->user();

        $validated = $request->validated();
        $type = $request->get('type');

        User::find($user->id)
            ->surveys()
            ->create($validated);

        return redirect()
            ->route('users.surveys.index', ['type' => $type])
            ->with('success', __('Data berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        $user = request()->user();
        $admin = $user->hasRole('admin');

        if ($admin || $user->id === $survey->user_id) {
            return view('users.surveys.edit', [
                'survey' => $survey,
                'types' => $this->types,
                'durations' => $this->durations,
                'statuses' => $this->statuses,
            ]);
        }

        return redirect()
            ->route('users.surveys.index', ['type' => $survey->type])
            ->with('error', __('Tidak dapat mengubah survei ini, anda harus menjadi admin atau pengguna yang membuat survei ini'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyRequest $request, Survey $survey)
    {
        $validated = $request->validated();

        $survey->update($validated);

        return redirect()
            ->route('users.surveys.index', ['type' => $survey->type])
            ->with('success', __('Data berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $type = $survey->type;

        $user = request()->user();
        $admin = $user->hasRole('admin');

        if (!$admin && $user->id === $survey->user_id) {
            return redirect()
                ->route('users.surveys.index', ['type' => $type])
                ->with('error', __('Tidak dapat menghapus survei ini, anda harus menjadi admin atau pengguna yang membuat survei ini'));
        }

        $survey->delete();
        return redirect()
            ->route('users.surveys.index', ['type' => $type])
            ->with('success', __('Data berhasil dihapus'));
    }
}
