<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/sewa', [SewaController::class, 'index'])->middleware('auth');
Route::post('/sewa/store',[SewaController::class, 'store']);

Route::get('/edit/{id}', [SewaController::class, 'edit']);
Route::get('/ambil/{id}', [SewaController::class, 'ambilBarang']);
Route::get('/hapus/{id}', [SewaController::class, 'destroy']);

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

