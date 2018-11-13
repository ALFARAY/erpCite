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
    return view('auth/login');
});

Route::resource('logistica/orden_compra','OrdenCompraController');
Route::resource('Subcategoria','ClasificacionController');
Route::resource('Categoria','CategoriaController');
Route::resource('logistica/articulo','MaterialController');
Route::resource('configuracion_inicial','ConfiguracionController');
Route::resource('logistica/proveedores','ProveedorController');
Route::resource('bienvenida','BienvenidaController');
Route::resource('logistica/ingreso_salida','KardexController');
Route::resource('pdf/orden_compra','PdfController');
Route::get('logistica/recoger/{var}','RecogerController@index')->name('recogida');
Route::post('logistica/recoger/create','RecogerController@store');
Route::resource('Admin','AdminController');
Route::resource('Usuario','CambiarContrasenaController');
Route::resource('recursos_humanos/trabajador','TrabajadorController');
Route::resource('recursos_humanos/area','AreaController');
Route::resource('logistica/almacen','AlmacenController');
Route::resource('recursos_humanos/Usuarios','UserChangeController');
Route::resource('logistica/kardex','KardexMatController');
Route::get('logistica/orden_compra_vista/{var}','OrdenCompraViewController@index')->name('ver');
Route::get('logistica/historial/{var}','HistorialController@index')->name('historial');
Auth::routes();
