<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Officer;
use App\Models\Survey;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = request()->user();
        $surveys = Survey::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(4)->get();
        $households = Household::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(10)->get();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $types = ['IPDS', 'Produksi', 'Distribusi', 'Neraca', 'Sosial'];

        $charts = [
            'start' => Survey::where('user_id', $user->id)->select(DB::raw("strftime('%m', start) as month"), DB::raw('count(*) as count'))
                ->groupBy(DB::raw("strftime('%m', start)"))
                ->pluck('count', 'month')
                ->mapWithKeys(function ($item, $key) use ($months) {
                    return [$months[(int) $key - 1] => $item];
                })
                ->all(),
            'end' => Survey::where('user_id', $user->id)->select(DB::raw("strftime('%m', end) as month"), DB::raw('count(*) as count'))
                ->groupBy(DB::raw("strftime('%m', end)"))
                ->pluck('count', 'month')
                ->mapWithKeys(function ($item, $key) use ($months) {
                    return [$months[(int) $key - 1] => $item];
                })
                ->all(),
            'households' => Household::where('user_id', $user->id)->select(DB::raw("type"), DB::raw('count(*) as count'))
                ->groupBy(DB::raw("type"))
                ->pluck('count', 'type')
                ->all(),
        ];

        return view('dashboard', [
            'surveys' => $surveys,
            'households' => $households,
            'charts' => $charts,
            'months' => $months,
            'types' => $types,
        ]);
    }
}
