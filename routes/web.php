<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DistrictController as AdminDistrictController;
use App\Http\Controllers\Admin\VillageController as AdminVillageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OfficerController as AdminOfficerController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $features = [
        [
            'icon' => 'grid-2x2-check',
            'title' => 'Data Kegiatan',
            'description' =>
            'Pengguna dapat mengetahui data kegiatan terbaru dan selalu siap kapan saja melihat update informasi',
        ],
        [
            'icon' => 'area-chart',
            'title' => 'Dashboard',
            'description' => 'Pengguna dapat melihat jadwal kegiatan dan aktivitas lainnya.',
        ],
        [
            'icon' => 'user-round',
            'title' => 'Kelola User',
            'description' => 'Aktivitas ini dapat dilakukan oleh seorang admin untuk mengelola data user.',
        ],
    ];

    $services = [
        [
            'icon' => 'heart-handshake',
            'title' => 'Pelayanan',
            'description' => 'Pengguna dapat melihat data kegiatan secara cepat dan mudah.',
        ],
        [
            'icon' => 'star',
            'title' => 'Kegiatan',
            'description' =>
            'Pengguna dapat melihat data kegiatan terbaru dan selalu siap kapan saja melihat update informasi.',
        ],
        [
            'icon' => 'user-round',
            'title' => 'User',
            'description' => 'Aktivitas ini dapat dilakukan oleh seorang admin untuk mengelola data user.',
        ],
    ];

    return view('welcome', [
        'features' => $features,
        'services' => $services,
    ]);
})->name('landing');


/*
* Helper to redirect to dashboard
*/

Route::middleware('auth')->get('/dashboard', function () {
    return redirect()->route(Auth::user()->role . 's.dashboards.index');
})->name('dashboard');

/*
* Admin Related Routes
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admins')
    ->name('admins.')
    ->group(function () {
        Route::resource('dashboards', AdminDashboardController::class)->only(['index']);
        Route::resource('districts', AdminDistrictController::class)->only(['index']);
        Route::resource('villages', AdminVillageController::class)->only(['index']);
        Route::resource('users', AdminUserController::class)->only(['index']);
        Route::resource('officers', AdminOfficerController::class)->only(['index']);
    });


/*
* User Related Routes
*/
Route::middleware(['auth'])
    ->prefix('users')
    ->name('users.')
    ->group(function () {
        Route::resource('dashboards', DashboardController::class)->only(['index']);
        Route::resource('surveys', SurveyController::class)->except(['show']);
        Route::resource('households', HouseholdController::class)->except(['show']);
        Route::resource('progresses', ProgressController::class)->except(['show']);
    });



require __DIR__ . '/auth.php';
