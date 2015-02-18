<?php  

/**
* 
* @media print {  estilos  }
*/
class ventasController extends BaseController
{
	public function nuevaventa(){
		if (Request::isJson()){
			
			$ventas = Venta::all();
			$folio 	= $ventas->count()+1;
			$objetosDeVenta = Input::json();
			$productos = $objetosDeVenta->get('productos');
			$descuento = $objetosDeVenta->get('descuento');
			$ids = array();
			
			$iva = $objetosDeVenta->get('iva');
			$venta  = new Venta;
			$venta -> subtotal 	= $objetosDeVenta->get("subtotal");
			$venta -> total 	= $objetosDeVenta->get("total");
			$venta -> id 		= $folio;
			$venta -> user_id 	= 1;
			$venta -> descuento = $descuento;
			// $venta -> rememberToken();
            // $venta -> timestamps();
            $venta -> save();

			foreach ($productos as $producto){
				$concepto = new Concepto;
				$concepto -> cantidad 	= $producto['cantidad'];
				$concepto -> importe 	= $producto['cantidad'] * $producto['id'];
				$concepto -> venta_id 	= $folio;
				$concepto -> producto_id = $producto['id'];
				// $concepto -> timestamps();
				// $concepto -> rememberToken();
				$concepto -> save();
				// echo "Producto =>"+$p["id"];
			}
			
			// $venta -> user_id	= $objetosDeVenta->get("id_user");
			

			//print_r($objetosDeVenta);
			//die();
			// $productos = $objetosDeVenta->get('productos');
			// $datos = json_decode($productos);
			// echo $objetosDeVenta[0];
			// print_r($objetosDeVenta);
			 // $x = json_decode($productos,true);
			// echo "$objetosDeVenta";
			// echo "string";s
			// echo "sakjdnajksndkjasn";
			$arr = array('respuesta' => 1, 'folio' => $folio+1, 'c' => 3, 'd' => 4, 'e' => 5);

			 return Response::json(json_encode($arr));
			 // return 'Exito';
			 // return Response::("hola");
		}	
	}
	
}



?>