<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CapacidadController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('destinos', DestinoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('capacidad', CapacidadController::class, ['except' => ['create', 'store']]);
Route::get('capacidad/{destino}/create', [CapacidadController::class, 'create'])->name('capacidad.create');
Route::post('capacidad/{destino}/store', [CapacidadController::class, 'store'])->name('capacidad.store');
Route::get('destino/{destino}/historial',[CapacidadController::class, 'historialCapacidad'])->name('destino.historial');
Route::resource('complejos', ComplejoController::class);

