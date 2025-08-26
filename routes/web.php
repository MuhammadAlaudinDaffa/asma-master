<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminPengaduanController;

// Halaman Welcome & Login
Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Rute Khusus Mahasiswa
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/pengaduan/buat', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('/pengaduan/riwayat', [PengaduanController::class, 'history'])->name('pengaduan.history');
        Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
        Route::post('/pengaduan/{pengaduan}/rating', [PengaduanController::class, 'submitRating'])->name('pengaduan.submitRating');
        Route::post('/pengaduan/{pengaduan}/comment', [PengaduanController::class, 'addComment'])->name('pengaduan.addComment');
    });

    // Rute Khusus Admin
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminPengaduanController::class, 'index'])->name('dashboard');
        
        // CRUD Pengaduan
        Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/pengaduan/{pengaduan}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
        Route::put('/pengaduan/{pengaduan}/status', [AdminPengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
        Route::post('/admin/pengaduan/{pengaduan}/comment', [AdminPengaduanController::class, 'addComment'])->name('pengaduan.addComment');
        
        // CRUD Mahasiswa
        Route::get('/mahasiswa', [AdminController::class, 'indexMahasiswa'])->name('mahasiswa.index');
        Route::get('/mahasiswa/create', [AdminController::class, 'createMahasiswa'])->name('mahasiswa.create');
        Route::post('/mahasiswa', [AdminController::class, 'storeMahasiswa'])->name('mahasiswa.store');
        Route::get('/mahasiswa/{mahasiswa}', [AdminController::class, 'showMahasiswa'])->name('mahasiswa.show');
        Route::get('/mahasiswa/{mahasiswa}/edit', [AdminController::class, 'editMahasiswa'])->name('mahasiswa.edit');
        Route::put('/mahasiswa/{mahasiswa}', [AdminController::class, 'updateMahasiswa'])->name('mahasiswa.update');
        Route::delete('/mahasiswa/{mahasiswa}', [AdminController::class, 'destroyMahasiswa'])->name('mahasiswa.destroy');
    });

    // Route khusus untuk lihat bukti pengaduan
    Route::get('/pengaduan/{pengaduan}/bukti', [PengaduanController::class, 'lihatBukti'])->name('pengaduan.bukti');
});