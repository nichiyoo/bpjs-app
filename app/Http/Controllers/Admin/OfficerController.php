<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Officer;
use App\Models\Village;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $district = request('district');
        $nks = request('nks');

        $districts = District::all();
        $officers = Officer::with('village', 'village.district', 'user')
            ->when($district, function ($query) use ($district) {
                $query->whereHas('village.district', function ($query) use ($district) {
                    $query->where('id', $district);
                });
            })
            ->when($nks, function ($query) use ($nks) {
                $query->where('nks', 'like', "%{$nks}%");
            })
            ->orderBy('nks')
            ->paginate(10)
            ->withQueryString();


        return view('admins.officers.index', [
            'district' => $district,
            'districts' => $districts,
            'officers' => $officers,
            'nks' => $nks,
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
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Officer $officer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officer $officer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officer $officer)
    {
        //
    }
}
