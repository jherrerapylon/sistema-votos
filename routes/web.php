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
Route::get("/votos/mesa/{mesa_id}", [ParticipanteController::class, "votes"])->name("votos.index");
Route::put("/votos/participante/{participante_id}", [ParticipanteController::class, "vote"]);
Route::get("/recuento", [PartidoController::class, "recuento"])->name("recuento.index");
Route::put("/recuento/{partido_id}", [PartidoController::class, "addVote"]);