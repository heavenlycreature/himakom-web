<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.main', [
        'title' => 'home',
    ]);
})->name('beranda');
Route::get('/tentang', function() {
    return view('pages.about', [
        'title' => 'Tentang Kami',
    ]);
})->name('tentang');
Route::get('/jurnal', function() {
    return view('pages.jurnal.journal', [
        'title' => 'Daftar Jurnal',
    ]);
})->name('jurnal');

Route::get('/artikel', [BlogsController::class, 'index'])->name('artikel');
// Login method
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', LogoutController::class)->name('logout');