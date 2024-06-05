<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Models\Officer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    protected array $types = ['IPDS', 'Produksi'];
    protected array $categories = ['Seruti', 'Susenas'];
    protected array $answers = [
        'Terisi Lengkap',
        'Terisi Tidak Lengkap',
        'Tidak Ada ART/Responden Yang Dapat Memberi Jawaban',
        'Responden Menolak',
        'Responden Menolak (Tidak Ada ART)',
        'Rumah Tangga Pindah'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = request()->user();

        $category = request('category');
        $type = request('type') ?? $this->types[0];
        $type = in_array($type, $this->types) ? $type : $this->types[0];

        $progresses = Progress::with('officer.village')->when($user, function ($query) use ($user) {
            return $user->hasRole('admin') ? $query : $query->whereHas('officer', function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            });
        })
            ->when($type, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('category', $category);
            })
            ->paginate(10)
            ->withQueryString();

        return view('users.progresses.index', [
            'types' => $this->types,
            'categories' => $this->categories,
            'type' => $type,
            'category' => $category,
            'progresses' => $progresses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = request()->user();

        $type = request('type') ?? $this->types[0];
        $type = in_array($type, $this->types) ? $type : $this->types[0];

        $officers = Officer::with('village')->when($user, function ($query) use ($user) {
            return $user->hasRole('admin') ? $query : $query->where('user_id', $user->id);
        })->get();

        return view('users.progresses.create', [
            'officers' => $officers,
            'types' => $this->types,
            'categories' => $this->categories,
            'answers' => $this->answers,
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgressRequest $request)
    {
        $validated = $request->validated();
        $nks = $request->get('nks');

        $progress = Officer::where('nks', $nks)
            ->first()
            ->progresses()
            ->create($validated);

        return redirect()
            ->route('users.progresses.index', ['type' => $progress->type])
            ->with('success', __('Data berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progress $progress)
    {
        $user = request()->user();

        $officers = Officer::with('village')->when($user, function ($query) use ($user) {
            return $user->hasRole('admin') ? $query : $query->where('user_id', $user->id);
        })->get();

        return view('users.progresses.edit', [
            'officers' => $officers,
            'types' => $this->types,
            'categories' => $this->categories,
            'answers' => $this->answers,
            'progress' => $progress,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgressRequest $request, Progress $progress)
    {
        $validated = $request->validated();
        $progress->update($validated);

        return redirect()
            ->route('users.progresses.index', ['type' => $progress->type])
            ->with('success', __('Data berhasil disimpan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        $type = $progress->type;

        $user = request()->user();
        $admin = $user->hasRole('admin');

        if (!$admin && $user->id === $progress->user_id) {
            return redirect()
                ->route('users.progresses.index', ['type' => $type])
                ->with('error', __('Tidak dapat menghapus data, anda harus menjadi admin atau pengguna yang membuat data ini'));
        }

        $progress->delete();
        return redirect()
            ->route('users.progresses.index', ['type' => $type])
            ->with('success', __('Data berhasil dihapus'));
    }
}
