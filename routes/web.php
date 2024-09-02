<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
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

Route::get('/', [GuestController::class, 'main'])->name('beranda');
Route::get('/tentang', [GuestController::class, 'about'])->name('tentang');
Route::get('/jurnal', [GuestController::class, 'journal'])->name('jurnal');
Route::get('/jurnal/{slug}', [GuestController::class, 'showJurnal'])->name('jurnal.show');

Route::get('/artikel', [GuestController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [GuestController::class, 'showArtikel'])->name('artikel.show');
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
    Route::get('/dashboard/journals', [JournalController::class, 'index'])->name('journal.index');
    // create
    Route::get('/dashboard/journals/create', [JournalController::class, 'create'])->name('journal.create');
    Route::post('/dashboard/journals', [JournalController::class, 'store'])->name('journal.store');
    // show
    Route::get('/dashboard/journals/{slug}', [JournalController::class, 'show'])->name('journal.show');
    // edit
    Route::get('/dashboard/journals/{slug}/edit', [JournalController::class, 'edit'])->name('journal.edit');
    Route::match(['PUT', 'PATCH'], '/dashboard/journals/{slug}', [JournalController::class, 'update'])->name('journal.update');
    // delete
    Route::delete('/dashboard/journals/{slug}', [JournalController::class, 'destroy'])->name('journals.destroy');
    
    // blogs
    Route::get('/dashboard/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    // create
    Route::get('/dashboard/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/dashboard/blogs', [BlogsController::class, 'store'])->name('blogs.store');
    // show
    Route::get('/dashboard/blogs/{slug}', [BlogsController::class, 'show'])->name('blogs.show');
    // edit
    Route::get('/dashboard/blogs/{slug}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::match(['PUT', 'PATCH'], '/dashboard/blogs/{slug}', [BlogsController::class, 'update'])->name('blogs.update');
    // delete
    Route::delete('/dashboard/blogs/{slug}', [BlogsController::class, 'destroy'])->name('blogs.destroy');
});