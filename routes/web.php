<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FarnsworthController;
use App\Http\Controllers\FarnsworthControllerGuest;
use App\Http\Controllers\kelolaController;
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
Route::get('/riwayat/download', [ResultController::class, 'downloadPDF'])->name('riwayat.download');

// Pastikan hanya user yang login yang bisa akses
Route::middleware(['auth'])->group(function () {

    // Route untuk menampilkan halaman kelola akun
    Route::get('/kelola-akun', [kelolaController::class, 'index'])->name('kelolaakun');

    // Route untuk menampilkan form edit user
    Route::get('/kelola-akun/{id}/edit', [kelolaController::class, 'edit'])->name('users.edit');

    // Route untuk memproses update data user
    Route::put('/kelola-akun/{id}', [kelolaController::class, 'update'])->name('users.update');

    // Route untuk menghapus akun
    Route::delete('/kelola-akun/{id}', [kelolaController::class, 'destroy'])->name('users.destroy');
});
Route::middleware(['auth'])->group(function () {

    // 1. Menampilkan Halaman List Semua Akun
    Route::get('/kelola-akun', [kelolaController::class, 'index'])->name('kelolaakun');

    // 2. Menampilkan Form Edit (dengan ID user)
    Route::get('/kelola-akun/{id}/edit', [kelolaController::class, 'edit'])->name('users.edit');

    // 3. Memproses Update Data ke Database (Method PUT)
    Route::put('/kelola-akun/{id}', [kelolaController::class, 'update'])->name('users.update');

    // 4. Menghapus Akun (Method DELETE)
    Route::delete('/kelola-akun/{id}', [kelolaController::class, 'destroy'])->name('users.destroy');
});
