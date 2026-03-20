<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EspeciesMaestraController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\MetodosProduccionController;
use App\Http\Controllers\ConservacionesController;
use App\Http\Controllers\PresentacionesController;
use App\Http\Controllers\FrescuraController;
use App\Http\Controllers\CalibresController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CompradoresController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\BalsasController;




Route::resource('especies-maestra', EspeciesMaestraController::class);
Route::resource('paises', PaisesController::class);
Route::resource('metodos-produccion', MetodosProduccionController::class);
Route::resource('conservaciones', ConservacionesController::class);
Route::resource('presentaciones', PresentacionesController::class);
Route::resource('frescura', FrescuraController::class);
Route::resource('calibres', CalibresController::class);
Route::resource('instalaciones', InstalacionesController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::resource('especies', EspeciesController::class);
Route::resource('ventas', VentasController::class);
Route::resource('compradores', CompradoresController::class);
Route::resource('vendedores', VendedoresController::class);
Route::resource('balsas', BalsasController::class);
Route::get('/ventas/{id}/xml', [VentasController::class, 'xml']);
