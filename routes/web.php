<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Select2SearchController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
 use App\Http\Controllers\historiasClinicasController;
 use App\Http\Controllers\abonosClientesController;
 use App\Http\Controllers\terapiasController;
 use App\Http\Controllers\terapias_adicionalesController;
 use App\Http\Controllers\profesionalesController;




use App\Http\Controllers\Controller;




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
    return view('auth.login');
});

Auth::routes();




Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');



Route::get('search', [Select2SearchController::class,'index']);
Route::get('ajax-autocomplete-search', [Select2SearchController::class, 'selectSearch']);


//Route::get('fullcalender', [CalendarController::class, 'index']);verificarcliente
//Route::post('fullcalenderAjax', [CalendarController::class, 'ajax']);

Route::post('clientes',[App\Http\Controllers\ClientesController::class, 'store'])->name('clientes');
Route::post('crear_clientes',[App\Http\Controllers\ClientesController::class, 'create'])->name('crear_clientes');

//Route::get('/mostrar_clientes/{id_clientes}',[App\Http\Controllers\ClientesController::class, 'mostrarCliente']);
Route::post('verificar_cliente', [App\Http\Controllers\ClientesController::class,'verificarCliente'])->name('verificar_cliente');
 
Route::get('fullcalendareventmaster',[CalendarController::class,'index']);
Route::post('fullcalendareventmaster/create',[CalendarController::class,'create']);
Route::post('fullcalendareventmaster/update',[CalendarController::class,'update']);
Route::post('fullcalendareventmaster/delete',[CalendarController::class,'destroy']);
Route::get('fullcalendareventmaster/update_event',[CalendarController::class,'update_event']);

Route::get('cliente/{id}', [Select2SearchController::class,'mostrarCliente'])->name('cliente');


Route::post('buscarmascota', [MascotasController::class,'buscarMascota'])->name('buscarmascota');

Route::post('/editarCliente/{id_cliente}',[App\Http\Controllers\ClientesController::class ,'update'])->name('editarCliente');

Route::get('/historia_clinica/{id}', [App\Http\Controllers\historiasClinicasController::class, 'index']);

Route::post('/crear_historia', [App\Http\Controllers\historiasClinicasController::class, 'store']);

Route::post('/editar_historia/{id_cliente}', [App\Http\Controllers\historiasClinicasController::class, 'update']);

Route::post('/eliminar_historia/{id}', [App\Http\Controllers\historiasClinicasController::class, 'destroy']);

Route::get('/listado_controles/{id_controles}', [App\Http\Controllers\controlesController::class, 'index']);

Route::post('/crear_control', [App\Http\Controllers\controlesController::class, 'store']);

Route::post('/actualizar_control/{id}', [App\Http\Controllers\controlesController::class, 'update']);

Route::get('/editar_control/{id}', [App\Http\Controllers\controlesController::class, 'edit']);

Route::delete('/eliminar_control/{id}', [App\Http\Controllers\controlesController::class, 'destroy']);


Route::get('abonos', [App\Http\Controllers\abonosClientesController::class, 'index']);

Route::get('buscar_tratamiento', [App\Http\Controllers\registrar_tratamientoController::class, 'selectSearchAbonos']);

Route::post('crear_abono', [App\Http\Controllers\abonosClientesController::class, 'store']);

Route::get('editar_abono/{id_abono}', [App\Http\Controllers\abonosClientesController::class, 'edit']);

Route::get('ver_abono/{id}', [App\Http\Controllers\abonosClientesController::class, 'show']);

Route::post('actualizar_abono/{id}', [App\Http\Controllers\abonosClientesController::class, 'update']);

Route::delete('/eliminar_abono/{id}', [App\Http\Controllers\abonosClientesController::class, 'destroy']);

 
Route::get('registrar_tratamientos', [App\Http\Controllers\registrar_tratamientoController::class, 'index']);

Route::post('crear_tratamiento', [App\Http\Controllers\registrar_tratamientoController::class, 'store']);

Route::get('editar_tratamientos/{id_tratamiento}', [App\Http\Controllers\registrar_tratamientoController::class, 'edit']);

Route::post('actualizar_tratamiento/{id}', [App\Http\Controllers\registrar_tratamientoController::class, 'update']);

Route::get('ver_tratamiento/{id}', [App\Http\Controllers\registrar_tratamientoController::class, 'show']);

Route::delete('/eliminar_tratamiento/{id}', [App\Http\Controllers\registrar_tratamientoController::class, 'destroy']);



Route::get('terapias', [App\Http\Controllers\terapiasController::class, 'index']);

Route::get('terapias_adicionales', [App\Http\Controllers\terapias_adicionalesController::class, 'index']);

Route::get('profesionales', [App\Http\Controllers\profesionalesController::class, 'index']);

Route::post('crear_profesional', [App\Http\Controllers\profesionalesController::class, 'store']);

Route::post('verificar_profesional', [App\Http\Controllers\profesionalesController::class, 'verificarProfesional']);


Route::get('ver_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'show']);

Route::get('editar_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'edit']);

Route::post('actualizar_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'update']);

Route::delete('eliminar_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'destroy']);


// Route::post('/listado_citas',[App\Http\Controllers\ListadoCitaMedicaController::class, 'store'])->name('listado_citas');
Route::get('/listado_cliente', [App\Http\Controllers\clientesController::class, 'index']);



//Route::delete('eliminar_cita/{id}', [App\Http\Controllers\ListadoCitaMedicaController::class, 'destroy'])->name('eliminar_cita');
