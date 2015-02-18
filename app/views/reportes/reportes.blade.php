@extends ('layouts.index')

@section('contenido')
	<h1>Reporte Ventas</h1>
	<div class="cabecerareportes">
		<div class="reportes reportegenerales login">
			{{ Form::open(array('url'=>'reportetipo'))	}}
			<table class="tablareportes">
				<tr>
					<td colspan="2">
						<h1>Buscar Nota</h1>
					</td>
				</tr>
				<tr>
					<td class="tdlabelreportes">
						{{ Form::label('folio','Folio de Venta:') }}
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::text('folio',null,array('class'=>'tdinputsreportes')) }}
					</td>
				</tr>
				<tr>
					<td class="tdlabelreportes">
						{{ Form::label('vendedor','Vendedor') }}
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::text('vendedor',null,array('class'=>'tdinputsreportes')) }}
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::submit('Buscar',array('class'=>'btn')) }}
					</td>
				</tr>
			</table>
			{{ Form::close() }}
		</div>
		<div class="reportes">
			
			{{ Form::open(array('url'=>'reportefecha'))	}}
			<table class="tablareportes">
				<tr>
					<td colspan="2">
						<h1>Listar Ventas</h1>
					</td>
				</tr>
				<tr>
					<td class="tdlabelreportes">
						{{ Form::label('reportepredefinido','Reportes Predefinidos:') }}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{{ Form::select('predefinido', array('hoy' => 'Hoy', 'ayer' => 'Ayer', 'semanal' => 'Semanal'),null,array('class'=>'tdinputsreportes')) }}
					</td>
				</tr>
				<tr>
					<td class="tdlabelreportes">
						{{ Form::label('desde','Desde:') }}
					</td>
					<td>
						{{ Form::label('hasta','Hasta:') }}
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::input('date', 'desde') }}
					</td>
					<td>
						{{ Form::input('date', 'hasta') }}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{{ Form::submit('Buscar',array('class'=>'btn')) }}
					</td>
				</tr>
			</table>
			{{ Form::close() }}
		</div>
		<div class="reportes">
			{{ Form::open(array('url'=>'reportefecha'))	}}
			<table class="tablareportes">
				<tr>
					<td colspan="2">
						<h1>Datos de Reportes</h1>
					</td>
				</tr>
				
			</table>
			{{ Form::close() }}
		</div>
		
	</div>
	@if(isset($total))
	<div id="table" class="reportegeneral">
		<div class="caption">Lista de ventas realizadas en el periodo especificado:</div>
		<table>
			<thead>
			<div class="header-row row">
				<tr>
					<th class="cell espacio">Folio</th>
					<th class="cell espacio">Fecha</th>
					<th class="cell espacio">Subtotal</th>
					<th class="cell espacio">Descuento</th>
					<th class="cell espacio">Total</th>
					<th class="cell espacio">Vendedor</th>
				</tr>
			</div>
			</thead>
			<tbody style="background-color:white;">
				@foreach($resultados as $venta)
					<tr class="reportesfila">
						<td class="cell espacio">{{$venta->id}}</td>
						<td class="cell espacio">{{$venta->created_at}}</td>
						<td class="cell espacio">{{$venta->subtotal}}</td>
						<td class="cell espacio">{{$venta->descuento}}</td>
						<td class="cell espacio">{{$venta->total}}</td>
						<td class="cell espacio"> ... </td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="caption">Detalles de ventas:</div>
		<table>
			<thead>
			<div class="header-row row">
				<tr>
					<th class="cell espacio">Numero de Ventas</th>
					<th class="cell espacio">Total de Descuentos</th>
					<th class="cell espacio">Total de ventas</th>
				</tr>
			</div>
			</thead>
			<tbody style="background-color:white;">
						<td class="cell espacio">{{$numventas}}</td>
						<td class="cell espacio">{{$descuento}}</td>
						<td class="cell espacio">{{$total}}</td>
			</tbody>
		</table>	
	</div>
	@endif
	@if(isset($ventaunica))
		<div id="table" class="reportegeneral">
			<div  class="caption">Venta con FOLIO: {{$ventaunica[0]->venta_id}}</div>
			<table>
				<thead>
				<div class="header-row row">
					<tr>
						<th class="cell espacio">Cantidad</th>
						<th class="cell espacio">Subtotal</th>
						<th class="cell espacio">Producto</th>
					</tr>
				</div>
				</thead>
				<tbody style="background-color:white;">
					@foreach($ventaunica as $concepto)
					<tr>
						<td class="cell espacio">{{$concepto->cantidad}}</td>
						<td class="cell espacio">{{$concepto->importe}}</td>
						<td class="cell espacio">{{$concepto->producto_id}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@endif
@endsection