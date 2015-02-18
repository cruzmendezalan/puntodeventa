<?php  

/**
*
*/
class edicionController extends BaseController
{
	public function get_datos(){
		$productos = Producto::all();
		$users = User::all();
		$marcas = Marca::all();
		$marcasArray = array();
		$productoAEditar = "";
		foreach ($marcas as $marcaunitaria) {
			$marcasArray[$marcaunitaria->id] = $marcaunitaria->nombre;
		}
		return View::make('edicion.edicion')->with('productos',$productos)->with('users',$users)->with('marcas',$marcas)->with('marcasarr',$marcasArray)->with('editable',$productoAEditar);
	}
	public function editarproductopost(){
		
		$id = Input::get("id");
		
		$producto = Producto::find($id);
		$producto->nombre= Input::get("nombre");
		$producto->precio=Input::get("precio");
		$producto->descripcion= Input::get("descripcion");
		$producto->save();
		return Redirect::to('/edicion');
	}
	public function editarproducto(){
		if (Request::isJson()) {
			$id = Input::get("id");
			$productoAEditar = DB::table('productos')->where('id','=',$id)->get();
			return Response::json(json_encode($productoAEditar));
		}
		$id = Input::get("id");
		$producto = DB::table('productos')->where('id','=',$id)->get();
		// print_r($producto);
		return View::make('edicion.edicionproducto')->with('producto',$producto);
	}
	public function add_producto(){
		$datosDeRegistro = array(
				'nombre' => Input::get('nombre'),
				'preciodecompra'=> Input::get('preciodecompra'),
				'descripcion' => Input::get('descripcion')
				);
			$producto = new Producto;
			$producto -> id = Input::get('codigo');
			$producto -> nombre = Input::get('nombre');
			$producto -> precio = Input::get('precio');
			$producto -> descripcion = Input::get('descripcion');
			$producto -> marca_id = Input::get('marca');
			$producto -> save();
			return Redirect::to('/edicion');
	}
	public function set_producto(){
		$users = User::all();
		$productos = Producto::all();
		return View::make('edicion.edicion')->with('users',$users);
	}
	public function del_producto(){
			$productoAEliminar = Input::get('id');
			DB::table('productos')->where('id','=',$productoAEliminar)->delete();
			return Redirect::to('/edicion');
	}
	public function add_marca(){
		$marca =  new Marca;
		if ((Input::get('codigo')) != '' ) {
			$marca -> id = Input::get('codigo');
		}
		$marca -> nombre = Input::get('nombre');
		$marca -> descripcion = Input::get('descripcion');
		$marca->save();
		return Redirect::to('/edicion');
	}
	public function add_user(){
		$nuevousuario = new User;
		$nuevousuario -> username = Input::get('nombre');
		$nuevousuario -> correo = Input::get('correo');
		$nuevousuario -> password = Hash::make(Input::get('password'));
		$nuevousuario -> save();

		return Redirect::to('/edicion');

	}
}



?>