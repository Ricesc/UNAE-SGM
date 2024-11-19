<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('sectores', App\Http\Controllers\SectorController::class);


    Route::resource('salas', App\Http\Controllers\SalaController::class);


    Route::resource('salasTipos', App\Http\Controllers\SalasTipoController::class);


    Route::resource('dependencias', App\Http\Controllers\DependenciaController::class);


    Route::resource('transferencias', App\Http\Controllers\TransferenciaController::class);


    Route::resource('bajas', App\Http\Controllers\BajaController::class);


    Route::resource('bienes', App\Http\Controllers\BienController::class);


    Route::resource('ingresos', App\Http\Controllers\IngresoController::class);


    Route::resource('proveedores', App\Http\Controllers\ProveedorController::class);


    Route::resource('bienesTipos', App\Http\Controllers\BienesTipoController::class);


    Route::resource('bienesSubTipos', App\Http\Controllers\BienesSubTipoController::class);


    Route::resource('users', App\Http\Controllers\UserController::class);


    Route::resource('edificios', App\Http\Controllers\EdificioController::class);


    Route::resource('pisos', App\Http\Controllers\PisoController::class);

    Route::get('bienes_tipos/autocomplete', [App\Http\Controllers\BienesTipoController::class, 'autocomplete'])->name('bienes_tipos.autocomplete');
    Route::get('bienes_subtipos/autocomplete', [App\Http\Controllers\BienesSubTipoController::class, 'autocomplete'])->name('bienes_subtipos.autocomplete');

    Route::get('/ingresos/{ingreso}/gestion-estados', [App\Http\Controllers\IngresoController::class, 'gestionEstados'])->name('ingresos.gestion-estados');
    Route::post('/ingresos/{ingreso}/actualizar-estados', [App\Http\Controllers\IngresoController::class, 'actualizarEstados'])->name('ingresos.actualizar-estados');
});
