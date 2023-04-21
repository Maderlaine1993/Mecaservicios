<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\NotificacionesController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Routes de Cliente */
Route::get('/formCliente', [ClienteController::class, 'createCliente'])->name('createCliente')->middleware('auth');//Formulario de Registro
Route::post('/saveCliente', [ClienteController::class, 'saveCliente'])->name('cliente.saveCliente')->middleware('auth');//Guardar el formulario
Route::get('/readcliente',  [ClienteController::class, 'index'])->name('index')->middleware('auth');;//Lista de cliente
Route::get('/clientedit/{nit}',  [ClienteController::class, 'editCliente'])->name('editCliente')->middleware('auth'); //Formulario de edicion
Route::patch('/actualizarC/{nit}',[ClienteController::class, 'updateCliente'])->name('updateCliente')->middleware('auth');//Guardar la edicion
Route::delete('delatecliente/{nit}', [ClienteController::class,'deleteCliente'])->name('deleteCliente')->middleware('auth'); //Eliminar un Cliente

/* Routes de Compras */
Route::get('/readcompras',  [CompraController::class, 'index'])->name('index')->middleware('auth');;//Lista de Compras

/* Routes de Notificaciones */
Route::get('/readnotificacion',  [NotificacionesController::class, 'index'])->name('index')->middleware('auth');;//Lista de notificaciones
Route::delete('delatenotificacion/{id_noti}', [NotificacionesController::class,'deleteNoti'])->name('deleteNoti')->middleware('auth'); //Eliminar una Notificacion
