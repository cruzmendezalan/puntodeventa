<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public $restful = true;
	
	public function showWelcome()
	{
		return View::make('index');
	}

    //cargamos la vista home/index.blade.php
    public function get_index()
    {
    	date_default_timezone_set('UTC');
        if (Auth::user()) {
        	$productos = Producto::orderBy('nombre')->get();
        	$ventas = Venta::all();
        	$folio = $ventas->count()+1;
        	$hoy = date("Y/m/d");
        	$usuario= Auth::user()->username;
        	return View::make('index')->with('title','Bienvenido')->with('productos',$productos)->with('hoy',$hoy)->with('folio',$folio)->with('usuario',$usuario);
        }else{
        	return Redirect::to('login');
        }
        
    }
 
    //con este sencillo metódo cerramos la sesión del usuario
    public function get_logout()
    {
 
        Auth::logout();
        return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
 
    }

}
