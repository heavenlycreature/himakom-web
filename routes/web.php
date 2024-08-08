<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\KahimController;
use App\Http\Controllers\ProkerController;
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
// Authenticated Method
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', LogoutController::class)->name('logout');
    
    // Kahim method
    Route::get('/dashboard/kahim/{kahim}/edit', [KahimController::class, 'edit'])->name('kahim.edit');
    Route::match(['PUT', 'PATCH'], '/dashboard/kahim/{id}', [KahimController::class, 'update'])->name('kahim.update');
    
    // Proker
    // create
    Route::get('/dashboard/proker/create', [ProkerController::class, 'create'])->name('proker.create');
    Route::post('/dashboard/proker', [ProkerController::class, 'store'])->name('proker.store');
    // edit
    Route::get('/dashboard/proker/{id}/edit', [ProkerController::class, 'edit'])->name('proker.edit');
    Route::match(['PUT', 'PATCH'], '/dashboard/proker/{id}', [ProkerController::class, 'update'])->name('proker.update');
    // delete
    Route::delete('/dashboard/proker/{id}', [ProkerController::class, 'destroy'])->name('proker.destroy');

    // Journal
    Route::get('/dashboard/journal', [JournalController::class, 'index'])->name('journal.index');
});