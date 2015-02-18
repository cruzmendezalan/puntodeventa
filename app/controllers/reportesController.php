<?php 

/**
* 
*/
class ReportesController extends BaseController
{
	public function creaPrincipal(){
		// $ventas = Venta::all();
		// $fecha = date('Y-m-d H:i:s');
		// $fecha = strtotime('-2 day',strtotime($fecha));
		// $fechapasada = date('Y-m-d H:i:s',$fecha);
		// $results = DB::select('select id,subtotal,descuento,total,created_at from venta where created_at between \'2015-02-01 00:00:00\' AND \'2015-02-02 23:59:59\'');
		$hoy  = date('Y-m-d');
		$results = DB::select("select id,subtotal,descuento,total,created_at from venta where created_at between '".$hoy." 00:00:00"."' AND '".$hoy." 23:59:59'");
		// $registrostwo = DB::table('ventas')->where("TO_TIMESTAMP(TO_CHAR(fecha,'YYYY-MM-DD HH24:MI:SS')),'YYYY-MM-DD HH24:MI:SS') > now()-'2 hour'::interval")->get();  
		

		// return View::make('reportes.reportes')->with('resultados',$results);
		$numventas =  count($results);
		$total = 0;
		$descuentos = 0;
		foreach ($results as $dato) {
			$total = $total + $dato->total;
			$descuentos = $descuentos + $dato->descuento;
		}
		// echo $total;
		return View::make('reportes.reportes')->with('resultados',$results)->with('total',$total)->with('descuento',$descuentos)->with('numventas',$numventas);
	}

	public function reportesFechas(){
		$predefinido = Input::get('predefinido');
		if ((Input::get('desde')!="")&&(Input::get('hasta')!="")) {
			$results = DB::select("select id,subtotal,descuento,total,created_at from venta where created_at between '".Input::get('desde')." 00:00:00"."' AND '".Input::get('hasta')." 23:59:59'");
		}else{
		switch ($predefinido) {
			case 'hoy':
					// $fecha = date('Y-m-d H:i:s');
					// $fecha = strtotime('-2 day',strtotime($fecha));
					// $fechapasada = date('Y-m-d H:i:s',$fecha);
					$hoy  = date('Y-m-d');
					$results = DB::select("select id,subtotal,descuento,total,created_at from venta where created_at between '".$hoy." 00:00:00"."' AND '".$hoy." 23:59:59'");
				break;
			case 'ayer':
					$hoy = date('Y-m-d H:i:s');
					$hoyT = strtotime('-1 day',strtotime($hoy));
					$ayer = date( 'Y-m-d',$hoyT );
					$results = DB::select("select id,subtotal,descuento,total,created_at from venta where created_at between '".$ayer." 00:00:00"."' AND '".$ayer." 23:59:59'");
				break;
			case 'semanal':
				$hoy = date('Y-m-d H:i:s');
				$hoyT = strtotime('-7 day',strtotime($hoy));
				$hace7dias = date( 'Y-m-d',$hoyT );
				$results = DB::select("select id,subtotal,descuento,total,created_at from venta where created_at between '".$hace7dias." 00:00:00"."' AND '".$hoy." 23:59:59'");
				break;
			default:
				# code...
				break;
		}
		}
		$numventas =  count($results);
		$total = 0;
		$descuentos= 0;
		foreach ($results as $dato) {
			$total = $total + $dato->total;
			$descuentos = $descuentos + $dato->descuento;
		}
		// echo $total;
		return View::make('reportes.reportes')->with('resultados',$results)->with('total',$total)->with('descuento',$descuentos)->with('numventas',$numventas);
	}

	public function reporteventaunica(){
		$folio = Input::get('folio');
		$ventaunica = DB::select("select * from concepto where venta_id =".$folio);
		$descripcionDeVenta= array();

		for ($i=0; $i < count($ventaunica) ; $i++) { 
			$idproducto = $ventaunica[$i]->producto_id;
			$nombreDeProducto = DB::select("select nombre from productos where id =".$idproducto);
			$ventaunica[$i]->producto_id = $nombreDeProducto[0]->nombre;
		}
		
		return View::make('reportes.reportes')->with('ventaunica',$ventaunica)->with('nombre',$descripcionDeVenta);
	}
}

?>