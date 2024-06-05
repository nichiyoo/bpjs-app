<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Household;
use App\Models\Officer;
use App\Models\Progress;
use App\Models\Survey;
use App\Models\User;
use App\Models\Village;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $counters = [
            ['name' => __('Jumlah Kecamatan'), 'value' => District::count()],
            ['name' => __('Jumlah Desa'), 'value' => Village::count()],
            ['name' => __('Jumlah NKS'), 'value' => Officer::count()],
            ['name' => __('Jumlah Pengguna'), 'value' => User::count()],
        ];

        $surveys = Survey::orderBy('created_at', 'desc')->limit(4)->get();
        $households = Household::orderBy('created_at', 'desc')->limit(10)->get();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $types = ['IPDS', 'Produksi', 'Distribusi', 'Neraca', 'Sosial'];

        $charts = [
            'start' => Survey::select(DB::raw("strftime('%m', start) as month"), DB::raw('count(*) as count'))
                ->groupBy(DB::raw("strftime('%m', start)"))
                ->pluck('count', 'month')
                ->mapWithKeys(function ($item, $key) use ($months) {
                    return [$months[(int) $key - 1] => $item];
                })
                ->all(),
            'end' => Survey::select(DB::raw("strftime('%m', end) as month"), DB::raw('count(*) as count'))
                ->groupBy(DB::raw("strftime('%m', end)"))
                ->pluck('count', 'month')
                ->mapWithKeys(function ($item, $key) use ($months) {
                    return [$months[(int) $key - 1] => $item];
                })
                ->all(),
            'households' => Household::select(DB::raw("type"), DB::raw('count(*) as count'))
                ->groupBy(DB::raw("type"))
                ->pluck('count', 'type')
                ->all(),
        ];

        return view('dashboard', [
            'counters' => $counters,
            'surveys' => $surveys,
            'households' => $households,
            'charts' => $charts,
            'months' => $months,
            'types' => $types,
        ]);
    }
}
