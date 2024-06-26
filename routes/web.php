<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//user router
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/mahasiswa', [MahasiswaController::class, 'index'])->name('user.mahasiswa');
    Route::post('/user/mahasiswa', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::get('/user/pmb', [MahasiswaController::class, 'pmb'])->name('user.pmb');
});

//admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/data', [AdminController::class, 'data'])->name('admin.data');
    Route::get('/admin/pendaftaran', [AdminController::class, 'pendaftaran'])->name('admin.pendaftaran');
    Route::post('/admin/status', [AdminController::class, 'updateStatus'])->name('update.status');
    Route::post('/admin/hapus', [AdminController::class, 'DeleteById'])->name('admin.hapus');
});
