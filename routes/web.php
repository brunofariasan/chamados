<?php

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
use App\Http\Controllers\ChamadoController;


// Route::get('/',  [MobileController::class, 'index']);

// Route::get('/events/create',  [MobileController::class, 'create']);
// Route::get('/events/{id}',  [MobileController::class, 'show']);

// Route::POST('/events', [MobileController::class, 'store']);


Route::delete('/painel/chamados/{cod}', 'ChamadoController@delete')->name('chamado.delete');
Route::get('/painel/chamados', 'ChamadoController@index')->name('chamado.index');
Route::get('/painel/chamados/pendentes', 'ChamadoController@pendente')->name('chamado.pendente');
Route::put('/painel/chamados/{codigo}', 'ChamadoController@update')->name('chamado.update');



Route::get('/painel/', function () {
    return view('site.pages.home');
})->name('site.home');

Route::post('create', 'ChamadoController@store')->name('chamado.store');
