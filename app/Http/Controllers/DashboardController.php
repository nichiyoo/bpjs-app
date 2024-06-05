<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Officer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard');
    }
}
