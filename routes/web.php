<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Main Page (Dashboard)
Route::get('/', function() {
    return redirect('/dashboard');
});

Route::get('/dashboard', function() {
    if (is_null(auth()->user())){
        return redirect()->route('login');
    }
    return view('pages.dashboard.main');
})->name('dashboard');

// Login
Route::get('/login', function() {
    return view('pages.login');
})->name('login');
Route::any('/postLogin', [LoginController::class, 'login']);

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [UserController::class, 'halamanRegister'])->name('register');
Route::post('/simpanUser', [UserController::class, 'simpanUser']);

// Save data
Route::post('/simpanPerjalanan', [PerjalananController::class, 'simpanPerjalanan']);

// Pages
Route::get('/dashboard/daftar-data', [PerjalananController::class, 'index'])->name('daftar-data');
Route::get('/dashboard/input', function () {
    return view('pages.dashboard.input');
})->name('input');

// Search Data
Route::get('/cari_data', [DashboardController::class, 'cariData']);

// Delete Data
Route::post('/hapusPerjalanan', [DashboardController::class, 'hapusData']);

// Sort Data
Route::get('/sort', [DashboardController::class, 'sort']);
