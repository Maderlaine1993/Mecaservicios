<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MecanicoController;
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
    return view('/auth.login');
});

Auth::routes();
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');;

/* Routes de Cliente */
Route::get('/formCliente', [ClienteController::class, 'createCliente'])->name('createCliente')->middleware('auth');;//Formulario de Registro
Route::post('/saveCliente', [ClienteController::class, 'saveCliente'])->name('cliente.saveCliente')->middleware('auth');;//Guardar el formulario
Route::get('/readcliente',  [ClienteController::class, 'index'])->name('index')->middleware('auth');;//Lista de cliente
Route::get('/clientedit/{nit}',  [ClienteController::class, 'editCliente'])->name('editCliente')->middleware('auth');; //Formulario de edicion
Route::patch('/actualizarC/{nit}',[ClienteController::class, 'updateCliente'])->name('updateCliente')->middleware('auth');;//Guardar la edicion
Route::delete('delatecliente/{nit}', [ClienteController::class,'deleteCliente'])->name('deleteCliente')->middleware('auth');; //Eliminar un Cliente

/* Routes de Compras */
Route::get('/readcompras',  [CompraController::class, 'index'])->name('index')->middleware('auth');;//Lista de Compras

/* Routes de Notificaciones */
Route::get('/readnotificacion',  [NotificacionesController::class, 'index'])->name('index')->middleware('auth');;//Lista de notificaciones
Route::delete('delatenotificacion/{id_noti}', [NotificacionesController::class,'deleteNoti'])->name('deleteNoti')->middleware('auth');; //Eliminar una Notificacion

/* Routes de Mecanico */
Route::get('/readmecanico',  [MecanicoController::class, 'index'])->name('index')->middleware('auth');;//Lista de Mecanico
Route::get('/mecanicoedit/{id_mec}',  [MecanicoController::class, 'editMecanico'])->name('editMecanico')->middleware('auth');; //Formulario de Mecanico
Route::patch('/actualizarM/{id_mec}',[MecanicoController::class, 'updateMecanico'])->name('updateMecanico')->middleware('auth');;//Guardar la edicion
Route::delete('delatemecanio/{id_mec}', [MecanicoController::class,'deleteMecanico'])->name('deleteMecanico')->middleware('auth');; //Eliminar un Mecanico
