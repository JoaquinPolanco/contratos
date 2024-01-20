<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContratoController;

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


Route::get('/', [ContratoController::class, 'index'])->name('contratos.index');
Route::get('/contratos/paginate', 'ContratoController@paginate')->name('contratos.paginate');
Route::get('contratos/{id}/edit', 'ContratoController@edit');
Route::put('/contratos/{contrato}', 'ContratoController@update')->name('contratos.update');


Route::resource('contratos', ContratoController::class);
