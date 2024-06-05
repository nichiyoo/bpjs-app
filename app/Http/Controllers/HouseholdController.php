<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Http\Requests\StoreHouseholdRequest;
use App\Http\Requests\UpdateHouseholdRequest;
use App\Models\Officer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    protected array $types = ['IPDS', 'Produksi'];
    protected array $categories = ['Seruti', 'Susenas'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $user = request()->user();

        $category = request('category');
        $type = request('type') ?? $this->types[0];
        $type = in_array($type, $this->types) ? $type : $this->types[0];

        $households = Household::with('officer.village')->when($user, function ($query) use ($user) {
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

        return view('users.households.index', [
            'types' => $this->types,
            'categories' => $this->categories,
            'type' => $type,
            'category' => $category,
            'households' => $households,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $user = request()->user();

        $type = request('type') ?? $this->types[0];
        $type = in_array($type, $this->types) ? $type : $this->types[0];

        $officers = Officer::with('village')->when($user, function ($query) use ($user) {
            return $user->hasRole('admin') ? $query : $query->where('user_id', $user->id);
        })->get();

        return view('users.households.create', [
            'officers' => $officers,
            'types' => $this->types,
            'categories' => $this->categories,
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHouseholdRequest $request)
    {
        $validated = $request->validated();
        $nks = $request->get('nks');

        $household = Officer::where('nks', $nks)
            ->first()
            ->households()
            ->create($validated);

        return redirect()
            ->route('users.households.index', ['type' => $household->type])
            ->with('success', __('Data berhasil disimpan'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Household $household)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Household $household)
    {
        $user = request()->user();

        $officers = Officer::with('village')->when($user, function ($query) use ($user) {
            return $user->hasRole('admin') ? $query : $query->where('user_id', $user->id);
        })->get();

        return view('users.households.edit', [
            'officers' => $officers,
            'types' => $this->types,
            'categories' => $this->categories,
            'household' => $household,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHouseholdRequest $request, Household $household)
    {
        $validated = $request->validated();
        $household->update($validated);

        return redirect()
            ->route('users.households.index', ['type' => $household->type])
            ->with('success', __('Data berhasil disimpan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Household $household)
    {
        $type = $household->type;

        $user = request()->user();
        $admin = $user->hasRole('admin');

        if (!$admin && $user->id === $household->user_id) {
            return redirect()
                ->route('users.households.index', ['type' => $type])
                ->with('error', __('Tidak dapat menghapus data, anda harus menjadi admin atau pengguna yang membuat data ini'));
        }

        $household->delete();
        return redirect()
            ->route('users.households.index', ['type' => $type])
            ->with('success', __('Data berhasil dihapus'));
    }
}
