<?php

class LoginController extends BaseController {

	//establecemos restful a true
    public $restful = true;
 	protected $layout = 'layouts.login';
    //al hacer uso de get le decimos a laravel que queremos crear una ruta, 
    //cargar una vista etc
    public function get_index()
    {
 
        //si se ha iniciado sesión no dejamos volver
        if(Auth::user())
        {
            return Redirect::to('/');
        }

        /*$marca  =  new Marca;
        $marca->nombre = 'lala';
        $marca->save();*/



        //mostramos la vista views/login/index.blade.php pasando un título
        return View::make('login.index')->with('title','Login');
        //return View::make('login.index');
 
    }
 
    //anteponemos post al nombre de la función, esto es así porque es la función
    //que recibirá datos por post
    public function post_index()
    {
        //echo "string";
        //recogemos los campos del formulario y los guardamos en un array
        //para pasarselo al método Auth::attempt
        $userdata = array(
 
            'username' => Input::get('username'),
            'password' => Input::get('password')
 
        ); 
 
        //si los datos son correctos y existe un usuario con los mismos se inicia sesión
        //y redirigimos a la home
        if(Auth::attempt($userdata, true))
        {
 
            return Redirect::to('/');
 
        }else{
            //en caso contrario mostramos un error
            return Redirect::to('login')->with('error_login', true);
 
        }
 	}

}
