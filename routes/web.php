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
use App\Http\Controllers\DeudoresController;
use App\Http\Controllers\lavadosController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\Registros_contableController;
use App\Http\Controllers\PDFController;








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



// ======================================================

//  RUTAS PARA ADMINISTRAR USUARIOS

// ======================================================

Route::get('inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.inicio');

Route::get('listado_usuarios', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('admin.listado_usuarios');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'registration'])->name('register');

Route::post('crear_usuario', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('admin.crear_usuario');

Route::get('editar_usuario/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'edit'])->name('admin.editar_usuario');

Route::post('actualizar_usuario/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'update'])->name('admin.actualiar_usuario');

Route::delete('eliminar_usuario/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'destroy'])->name('admin.eliminar_usuario');



// ======================================================

//  RUTAS PARA ADMINISTRAR BUSQUEDA DE CLIENTES

// ======================================================

Route::get('search', [App\Http\Controllers\Select2SearchController::class, 'index']);

Route::get('ajax-autocomplete-search', [App\Http\Controllers\Select2SearchController::class, 'selectSearch']);


//Route::get('fullcalender', [CalendarController::class, 'index']);verificarcliente
//Route::post('fullcalenderAjax', [CalendarController::class, 'ajax']);


// ======================================================

//  RUTAS PARA ADMINISTRAR CLIENTES

// ======================================================

Route::post('clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes');

Route::post('crear_clientes', [App\Http\Controllers\ClientesController::class, 'create'])->name('crear_clientes');

Route::post('/actualizar/{id}', [App\Http\Controllers\ClientesController::class, 'actulizarCliente']);

Route::get('cliente/{id}', [Select2SearchController::class, 'mostrarCliente'])->name('cliente');

Route::post('/editarCliente', [App\Http\Controllers\ClientesController::class, 'update'])->name('editarCliente');

Route::get('/listado_cliente', [App\Http\Controllers\clientesController::class, 'index']);

Route::get('actualizar_cliente', [App\Http\Controllers\HomeController::class, 'updateStatus']);

Route::post('verificar_cliente', [App\Http\Controllers\ClientesController::class, 'verificarCliente'])->name('verificar_cliente');



// ======================================================

//  RUTAS PARA ADMINISTRAR FULLCALENDAR

// ======================================================



Route::get('fullcalendareventmaster', [CalendarController::class, 'index']);

Route::post('fullcalendareventmaster/create', [CalendarController::class, 'create']);

Route::post('fullcalendareventmaster/update', [CalendarController::class, 'update']);

Route::delete('fullcalendareventmaster/delete/{id}', [CalendarController::class, 'destroy']);

Route::get('fullcalendareventmaster/update_event', [CalendarController::class, 'update_event']);





// ======================================================

//  RUTAS PARA ADMINISTRAR HISTÓRIAS CLÍNICAS

// ======================================================


Route::get('historia_clinica/{id}', [App\Http\Controllers\historiasClinicasController::class, 'index']);

Route::post('/crear_historia', [App\Http\Controllers\historiasClinicasController::class, 'store']);

Route::get('/ver_historia/{id}', [App\Http\Controllers\historiasClinicasController::class, 'show']);

Route::get('/editar_historia/{id}', [App\Http\Controllers\historiasClinicasController::class, 'edit']);

Route::post('/actualizar_historia/{id}', [App\Http\Controllers\historiasClinicasController::class, 'update']);

Route::post('/editar_historia/{id_cliente}', [App\Http\Controllers\historiasClinicasController::class, 'update']);

Route::post('/eliminar_historia/{id}', [App\Http\Controllers\historiasClinicasController::class, 'destroy']);




// ======================================================

//  RUTAS PARA ADMINISTRAR CONTROLES MÉDICOS

// ======================================================



Route::get('/listado_controles/{id_controles}', [App\Http\Controllers\controlesController::class, 'index']);

Route::post('/crear_control', [App\Http\Controllers\controlesController::class, 'store']);

Route::post('/actualizar_control/{id}', [App\Http\Controllers\controlesController::class, 'update']);

Route::get('/editar_control/{id}', [App\Http\Controllers\controlesController::class, 'edit']);

Route::delete('/eliminar_control/{id}', [App\Http\Controllers\controlesController::class, 'destroy']);



// ======================================================

//  RUTAS PARA ADMINISTRAR ABONOS A SALDO DE TRATAMIENTOS

// ======================================================


Route::get('abonos', [App\Http\Controllers\abonosClientesController::class, 'index'])->name('abonos');

Route::post('crear_abono', [App\Http\Controllers\abonosClientesController::class, 'store']);

Route::get('editar_abono/{id_abono}', [App\Http\Controllers\abonosClientesController::class, 'edit']);

Route::get('ver_abono/{id}', [App\Http\Controllers\abonosClientesController::class, 'show']);

Route::post('actualizar_abono/{id}', [App\Http\Controllers\abonosClientesController::class, 'update']);

Route::delete('/eliminar_abono/{id}', [App\Http\Controllers\abonosClientesController::class, 'destroy']);

Route::get('mostrar_abonos/{id}', [App\Http\Controllers\abonosClientesController::class, 'mostrarAbonos']);




// ======================================================

//  RUTAS PARA ADMINISTRAR TRATAMIENTOS

// ======================================================


Route::get('registrar_tratamientos', [App\Http\Controllers\registrar_tratamientoController::class, 'index'])->name('registrar_tratamiento');

Route::post('crear_tratamiento', [App\Http\Controllers\registrar_tratamientoController::class, 'store']);

Route::get('buscar_tratamiento', [App\Http\Controllers\registrar_tratamientoController::class, 'selectSearchAbonos']);

Route::get('mostrar_tratamiento/{id}', [App\Http\Controllers\registrar_tratamientoController::class, 'mostrarTratamiento']);

Route::get('editar_tratamientos/{id_tratamiento}', [App\Http\Controllers\registrar_tratamientoController::class, 'edit']);

Route::post('actualizar_tratamiento/{id}', [App\Http\Controllers\registrar_tratamientoController::class, 'update']);

Route::get('ver_tratamiento/{data}', [App\Http\Controllers\registrar_tratamientoController::class, 'show']);

Route::delete('/eliminar_tratamiento/{id}', [App\Http\Controllers\registrar_tratamientoController::class, 'destroy']);

Route::post('mensaje_pago_deuda', [App\Http\Controllers\registrar_tratamientoController::class, 'mensajePagoDeuda']);

Route::get('deudores', [App\Http\Controllers\DeudoresController::class, 'index'])->name('deudores');





// ======================================================

//  RUTAS PARA ADMINISTRAR TERAPIAS

// ======================================================


Route::get('terapias', [App\Http\Controllers\terapiasController::class, 'index'])->name('terapias');

Route::post('crear_terapia', [App\Http\Controllers\terapiasController::class, 'store']);

Route::get('editar_terapia/{id}', [App\Http\Controllers\terapiasController::class, 'edit']);

Route::post('actualizar_terapia/{id}', [App\Http\Controllers\terapiasController::class, 'update']);

Route::delete('eliminar_terapia/{id}', [App\Http\Controllers\terapiasController::class, 'destroy']);



// ======================================================

//  RUTAS PARA ADMINISTRAR TERAPIAS ADICIONALES

// ======================================================


Route::get('terapias_adicionales', [App\Http\Controllers\terapias_adicionalesController::class, 'index'])->name('terapias_adicionales');

Route::post('crear_terapia_adicional', [App\Http\Controllers\terapias_adicionalesController::class, 'store']);

Route::get('editar_terapia_adicional/{id}', [App\Http\Controllers\terapias_adicionalesController::class, 'edit']);

Route::post('actualizar_terapia_adicional/{id}', [App\Http\Controllers\terapias_adicionalesController::class, 'update']);

Route::delete('eliminar_terapia_adicional/{id}', [App\Http\Controllers\terapias_adicionalesController::class, 'destroy']);




// ======================================================

//  RUTAS PARA ADMINISTRAR LAVADOS

// ======================================================


Route::get('lavados', [App\Http\Controllers\lavadosController::class, 'index'])->name('lavados');

Route::post('crear_lavado', [App\Http\Controllers\lavadosController::class, 'store']);

Route::get('editar_lavado/{id}', [App\Http\Controllers\lavadosController::class, 'edit']);

Route::post('actualizar_lavado/{id}', [App\Http\Controllers\lavadosController::class, 'update']);

Route::delete('eliminar_lavado/{id}', [App\Http\Controllers\lavadosController::class, 'destroy']);




// ======================================================

//  RUTAS PARA ADMINISTRAR PROFESIONALES

// ======================================================


Route::get('profesionales', [App\Http\Controllers\profesionalesController::class, 'index'])->name('profesionales');

Route::post('crear_profesional', [App\Http\Controllers\profesionalesController::class, 'store']);

Route::post('verificar_profesional', [App\Http\Controllers\profesionalesController::class, 'verificarProfesional']);

Route::get('ver_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'show']);

Route::get('editar_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'edit']);

Route::post('actualizar_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'update']);

Route::delete('eliminar_profesional/{id}', [App\Http\Controllers\profesionalesController::class, 'destroy']);




// ======================================================

//  RUTAS PARA ADMINISTRAR PAGO HONORARIOS

// ======================================================

Route::get('pago_honorarios', [App\Http\Controllers\HonorariosProfesionalesController::class, 'index'])->name('pago_honorarios');

Route::get('buscar_pago_honorarios', [App\Http\Controllers\HonorariosProfesionalesController::class, 'selectSearchPagosHonorarios']);

Route::post('crear_pago_honorarios', [App\Http\Controllers\HonorariosProfesionalesController::class, 'store']);

Route::get('ver_pago_honorarios/{id}', [App\Http\Controllers\HonorariosProfesionalesController::class, 'show']);

Route::get('editar_pago_honorarios/{id}', [App\Http\Controllers\HonorariosProfesionalesController::class, 'edit']);

Route::post('actualizar_pago_honorarios/{id}', [App\Http\Controllers\HonorariosProfesionalesController::class, 'update']);

Route::delete('eliminar_honorario/{id}', [App\Http\Controllers\HonorariosProfesionalesController::class, 'destroy']);




// ======================================================

//  RUTAS PARA ADMINISTRAR REGISTROS CONTABLES

// ======================================================

Route::post('/guardar_saldo', [App\Http\Controllers\Registros_contableController::class, 'store']);

Route::post('/guardar_ingreso', [App\Http\Controllers\Registros_contableController::class, 'guardar_ingreso'])->name('guardar_ingreso');

Route::post('/guardar_egreso', [App\Http\Controllers\Registros_contableController::class, 'guardar_egreso'])->name('guardar_egreso');

Route::get('mostrarRegistros/{registros}', [App\Http\Controllers\Registros_contableController::class, 'mostrarRegistros']);


Route::get('registros_contables', [App\Http\Controllers\Registros_contableController::class, 'index'])->name('registros_contables');

Route::post('/editar_registro', [App\Http\Controllers\Registros_contableController::class, 'update']);

Route::post('/eliminar_registro/{id}', [App\Http\Controllers\Registros_contableController::class, 'destroy']);




// ======================================================

//  RUTAS PARA ADMINISTRAR ESTADÍSTICAS

// ======================================================

Route::get('estadisticas', [App\Http\Controllers\ChartJSController::class, 'index'])->name('estadisticas');





// ======================================================

//  RUTA PARA ADMINISTRAR FACTURA PDF

// ======================================================

Route::get('factura/{id}', [App\Http\Controllers\PDFController::class, 'generarFactura']);



// Route::post('/listado_citas',[App\Http\Controllers\ListadoCitaMedicaController::class, 'store'])->name('listado_citas');

//Route::delete('eliminar_cita/{id}', [App\Http\Controllers\ListadoCitaMedicaController::class, 'destroy'])->name('eliminar_cita');
