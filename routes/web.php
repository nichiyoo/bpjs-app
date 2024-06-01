<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
