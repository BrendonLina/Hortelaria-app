<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;

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

Route::get('/', [QuartoController::class, 'listarDisponiveis']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/dashboard', [QuartoController::class, 'dashboard']);
Route::get('/cadastrar', [QuartoController::class, 'cadastrar']);
Route::post('/cadastrar', [QuartoController::class, 'cadastrarStore']);
Route::get('/quartosocupados', [QuartoController::class, 'quartosOcupados']);
Route::post('/quartosocupados', [QuartoController::class, 'quartosOcupadosStore']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [QuartoController::class, 'painel'])->name('dashboard');

    Route::get('/reserva', [ReservaController::class, 'reserva'])->middleware('administrador')->name('reserva');
    Route::post('/reserva', [ReservaController::class, 'reservaStore'])->middleware('administrador');
    Route::get('/usuarioreserva', [ReservaController::class, 'usuarioReserva']);

    Route::get('/quarto', [QuartoController::class, 'cadastrarQuarto']);
    Route::post('/quarto', [QuartoController::class, 'cadastrarQuartoStore']);

});
