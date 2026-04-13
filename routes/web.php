<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FarnsworthController;
use App\Http\Controllers\FarnsworthControllerGuest;
use App\Http\Controllers\VisionController;

Route::get('home', function () {
    return view('welcome');
})->name('home'); // Tambahkan ->name('home')

Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat.farnsworth');
// Halaman awal tes Farnsworth
Route::get('/farnsworth', [FarnsworthController::class, 'index'])
    ->name('farnsworth.index');

// Halaman tes Farnsworth
Route::get('/farnsworth/test', [FarnsworthController::class, 'test'])
    ->name('farnsworth.test');



// Pastikan method 'testguest' ada di controller
Route::get('/farnsworth/testguest', [FarnsworthControllerGuest::class, 'testguest'])->name('farnsworth.testguest');

// Route untuk simpan skor (tanpa middleware auth)
Route::post('/farnsworth/save', [FarnsworthControllerGuest::class, 'save'])->name('farnsworth.save');

Route::post('/farnsworth/submit', [FarnsworthController::class, 'submit'])
    ->name('farnsworth.submit');



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/tentang', [VisionController::class, 'about'])->name('about');
Route::get('/bantuan', [VisionController::class, 'help'])->name('help');
Route::get('/kebijakanprivasi', [VisionController::class, 'privacy'])->name('privacy');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});


// Halaman tes — wajib login
Route::middleware('auth')->group(function () {
    Route::get('/farnsworth', [FarnsworthController::class, 'index'])->name('farnsworth.index');
    Route::get('/farnsworth/test', [FarnsworthController::class, 'test'])->name('farnsworth.test');
});

Route::middleware('auth')->group(function () {
    Route::post('/farnsworth/save', [FarnsworthController::class, 'save'])
        ->name('farnsworth.save');
});

// routes/web.php

// Pastikan view yang dipanggil adalah file dashboard yang barusan kita buat
Route::get('/welcome-dashboard', function () {
    return view('welcomelogin'); // Ganti dengan nama file blade dashboard Anda
})->name('welcomelogin')->middleware('auth');

use App\Http\Controllers\ResultController;

Route::get('/riwayat', [ResultController::class, 'index'])->name('riwayat')->middleware('auth');
