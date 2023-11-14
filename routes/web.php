<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuartoController;

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

Route::get('/', [QuartoController::class, 'index']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/dashboard', [QuartoController::class, 'dashboard']);
Route::get('/cadastrar', [QuartoController::class, 'cadastrar']);
Route::post('/cadastrar', [QuartoController::class, 'cadastrarStore']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [QuartoController::class, 'painel'])->name('dashboard');

});
