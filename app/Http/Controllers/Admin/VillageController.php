<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Village;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $district = request('district');

        $districts = District::all();
        $villages = Village::with('district')
            ->when($district, function ($query, $district) use ($request) {
                return $query->where('district_id', $district);
            })
            ->paginate(10);

        return view('admins.villages.index', [
            'district' => $district,
            'districts' => $districts,
            'villages' => $villages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Village $village)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Village $village)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Village $village)
    {
        //
    }
}
