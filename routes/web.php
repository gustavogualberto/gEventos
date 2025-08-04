<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use GuzzleHttp\Middleware;

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

Route::get('/', [EventosController::class, 'index'])->name('site.home');

Route::get('/adicionar-evento', [EventosController::class, 'adicionar'])->name('site.adicionar')->middleware('auth');

Route::post('/salvar-evento', [EventosController::class, 'salvar'])->name('salvar.evento');

Route::get('/evento/{id}', [EventosController::class, 'info'])->name('info.evento');

Route::delete('/meusEventos/deletar/{id}', [EventosController::class, 'destroy'])->name('deletar.evento')->middleware('auth');

Route::get('/editar-evento/{id}', [EventosController::class, 'editar'])->name('evento.editar')->middleware('auth');

Route::put('/atualizar-evento/{id}', [EventosController::class, 'update'])->name('evento.atualizar')->middleware('auth');

Route::post('/eventos/join/{id}', [EventosController::class, 'joinEvento'])->name('join.evento')->middleware('auth');

Route::delete('/Eventos/sair/{id}', [EventosController::class, 'sairDoEvento'])->name('sair.evento')->middleware('auth');



Route::get('/meusEventos', [EventosController::class, 'meusEventos'])->name('meusEventos.evento')->middleware('auth');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [EventosController::class, 'meusEventos'])->name('dashboard')->middleware('auth');
});

