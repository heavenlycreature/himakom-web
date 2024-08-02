<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
// Login method
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/dashboard', function (){
        return view('admin.dashboard', [
            'name' => auth()->user()->name,
        ]
);
})->middleware('auth');
Route::post('/logout', LogoutController::class)->name('logout');