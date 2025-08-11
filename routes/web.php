<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\CompanyRegisterController;
use App\Http\Controllers\DashboardController;

// Halaman utama langsung ke form registrasi perusahaan
Route::get('/', [CompanyRegisterController::class, 'showRegistrationForm'])->name('company.register');

// Route untuk memproses form registrasi
Route::post('/register-company', [CompanyRegisterController::class, 'register'])->name('company.register.submit');

// Mendaftarkan semua route otentikasi (login, logout, dll.)
Auth::routes(['register' => false]); // Menonaktifkan route register bawaan Laravel

// Route untuk dashboard setelah login (dilindungi middleware auth)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');