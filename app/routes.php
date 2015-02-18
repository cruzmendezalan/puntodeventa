<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',array('uses'=>'HomeController@get_index'));
Route::get('login' ,'LoginController@get_index');
Route::post('login',array('uses' => 'LoginController@post_index')); 
Route::get('bienvenida',array('uses' => 'BienvenidaController@desplega_Bienvenida'));
Route::get('logout',array('uses'=>'HomeController@get_logout'));
Route::get('registro',array('uses'=>'RegistroController@get_Registro'));
Route::get('altausuarios',array('uses'=>'AltasBajasController@get_Registro_usuario'));
Route::post('altausuarios',array('uses'=>'AltasBajasController@post_Registro_usuario'));
Route::get('bajausuarios',array('uses'=>'AltasBajasController@get_baja_usuario'));
Route::post('bajausuarios',array('uses'=>'AltasBajasController@post_baja_usuario'));
Route::get('bajaproductos',array('uses'=>'AltasBajasController@get_baja_producto'));
Route::post('bajaproductos',array('uses'=>'AltasBajasController@post_baja_producto'));
Route::get('editaproductos',array('uses'=>'AltasBajasController@get_edita_producto'));
Route::get('edicion',array('uses'=>'edicionController@get_datos'));
Route::post('nuevoproducto',array('uses'=>'edicionController@add_producto'));
Route::post('nuevamarca',array('uses'=>'edicionController@add_marca'));
Route::post('nuevousuario',array('uses'=>'edicionController@add_user'));
Route::post('eliminarproducto',array('uses'=>'edicionController@del_producto'));
Route::post('eliminarmarca',array('uses'=>'edicionController@del_marca'));
Route::post('eliminarusuario',array('uses'=>'edicionController@del_usuario'));
Route::post('nuevaventa',array('uses'=>'ventasController@nuevaventa'));
Route::post('editarproducto',array('uses'=>'edicionController@editarproducto'));
Route::get('reportes',array('uses'=>'reportesController@creaPrincipal'));
Route::post('reportefecha',array('uses'=>'reportesController@reportesFechas'));
Route::post('reportetipo',array('uses'=>'reportesController@reporteventaunica'));
Route::post('editarproductopost',array('uses'=>'edicionController@editarproductopost'));

?>