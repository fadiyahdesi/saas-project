<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\CompanyRegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CompanyRegisterController::class, 'showRegistrationForm']);

// Mendaftarkan semua route untuk otentikasi (login, register, dll.)
Auth::routes();

// Route untuk halaman dashboard utama setelah login
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk halaman registrasi perusahaan baru
Route::get('/register-company', [CompanyRegisterController::class, 'showRegistrationForm'])->name('company.register');
Route::post('/register-company', [CompanyRegisterController::class, 'register']);