<?php

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
    return view('home');
});

//Platillo
Route::get('/registrarPlatillos', 'platillosController@registrar');

Route::post('guardarPlatillo', 'platillosController@guardar');

Route::get('consultarPlatillos', 'platillosController@consultar');

Route::get('eliminarPlatillo/{id}', 'platillosController@eliminar');

Route::get('editarPlatillo/{id}', 'platillosController@editar');

Route::post('actualizarPlatillo/{id}', 'platillosController@actualizar');

Route::get('platillosPDF', 'platillosController@pdf');

//Bebida
Route::get('/registrarBebidas', 'bebidasController@registrar');

Route::post('guardarBebida', 'bebidasController@guardar');

Route::get('consultarBebidas', 'BebidasController@consultar');

Route::get('eliminarBebida/{id}', 'bebidasController@eliminar');

Route::get('editarBebida/{id}', 'bebidasController@editar');

Route::post('actualizarBebida/{id}', 'bebidasController@actualizar');

Route::get('bebidasPDF', 'bebidasController@pdf');

//Trabajador
Route::get('/registrarTrabajadores', 'TrabajadoresController@registrar');

Route::post('guardarTrabajador', 'TrabajadoresController@guardar');

Route::get('consultarTrabajadores', 'TrabajadoresController@consultar');

Route::get('eliminarTrabajador/{id}', 'TrabajadoresController@eliminar');

Route::get('editarTrabajador/{id}', 'TrabajadoresController@editar');

Route::post('actualizarTrabajador/{id}', 'TrabajadoresController@actualizar');

Route::get('trabajadoresPDF', 'TrabajadoresController@pdf');

//Cliente
Route::get('/registrarClientes', 'clientesController@registrar');

Route::post('/guardarCliente', 'clientesController@guardar');

Route::get('/consultarClientes', 'clientesController@consultar');

Route::get('/eliminarCliente/{id}', 'clientesController@eliminar');

Route::get('/editarCliente/{id}', 'clientesController@editar');

Route::post('/actualizarCliente/{id}', 'clientesController@actualizar');

Route::get('clientesPDF', 'clientesController@pdf');

//Promocion
Route::get('/registrarPromociones', 'promocionesController@registrar');

Route::post('/guardarPromocion', 'promocionesController@guardar');

Route::get('/consultarPromociones', 'promocionesController@consultar');

Route::get('/eliminarPromocion/{id}', 'promocionesController@eliminar');

Route::get('/editarPromocion/{id}', 'promocionesController@editar');

Route::post('/actualizarPromocion/{id}', 'promocionesController@actualizar');

Route::get('promocionesPDF', 'promocionesController@pdf');

//Puesto
Route::get('/registrarPuestos', 'puestosController@registrar');

Route::post('/guardarPuesto', 'puestosController@guardar');

Route::get('/consultarPuestos', 'puestosController@consultar');

Route::get('/eliminarPuesto/{id}', 'puestosController@eliminar');

Route::get('/editarPuesto/{id}', 'puestosController@editar');

Route::post('/actualizarPuesto/{id}', 'puestosController@actualizar');

Route::get('puestosPDF', 'puestosController@pdf');

//PuestosTrabajadores
Route::get('/puestostrabajadoresPDF/{id}', 'puestostrabajadoresController@pdf');

//Correos
Route::get('form_enviar_correo', 'correoController@crear');
Route::post('enviar_correo', 'correoController@enviar');
Route::post('cargar_archivo_correo', 'correoController@store');