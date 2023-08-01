<?php

use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PartidoController;
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
    return view('welcome');
});

Route::resource("/mesas", MesaController::class);
Route::resource("/participantes", ParticipanteController::class);
Route::resource("/partidos", PartidoController::class);