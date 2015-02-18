@extends('layouts.index')
@section('contenido')
		<div class="col-xs-3 col-md-3">	
			<div class="row">	
				<div class="tablaAlCentro">
					<table class="table">
						<tbody>
							<h2 class="notadeventatitulo">Productos</h2>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
			<table class="table">
				<thead>
					<tr class="busquedatr">
						<th class="header-row busquedath">
							<input type="text" class="busqueda" onkeypress="busca(this.value)" id="objetobuscado">
						</th>
					</tr>
				</thead>
			</table>
			</div>
			<div class="row">
				<div>
					<table class="table table-bordered table-hover table-condensed">
						<tbody>
							@foreach($productos as $producto )
								<tr>
									<td class="cell primary productoslista" onclick="cuantosElementos(this); generaSubtotal();" vid="{{ $producto->id }}" valorunitario="{{ $producto->precio }}" >{{ $producto->nombre }}, {{ $producto->descripcion }}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<div class="col-xs-5 col-md-5">
		<div class="row">	
				<div>
					<table class="table">
						<tbody>
							<h2 class="notadeventatitulo">Nota de Venta</h2>
						</tbody>
					</table>
				</div>
		</div>
			<div class="row">
				<div id="mensaje"></div>
				{{ Form::open(array('url' => '#')) }}
				<table id="tablanotadeventa" class="table table-bordered warning">
				<thead>
					<tr>
						<th class="cantidad header-row">Cantidad</th>
						<th class="articulo header-row">Articulo</th> 
						<th class="valorunitario header-row">Valor Unit.</th>
						<th class="importe header-row">Importe</th></tr>
				</thead>
				<tbody id="articulosDeVenta">
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					<tr><td>.</td><td></td><td></td><td></td></tr>
					
				</tbody>
				</table>
				{{ Form::close() }}
			</div>		
	</div>
	<div class="col-xs-4 col-md-4">
			<div class="barraDeVentaT caption">	
				<div class="tablaAlCentro">
					<table>
						<tbody>
							<h2 class="notadeventatitulo">Descripcion</h2>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<form action="#">
					<table class="table table-bordered">
						<tr>
								<td class="etiquetas">
							    	<label for="fecha">Fecha :</label>
								</td>
								<td class="inputs">
									<input type="text" value="{{$hoy}}" disabled="true" class="textocentrado">
								</td>
						</tr>
						<tr>
								<td class="etiquetas">
									<label for="folio">Folio :</label>
								</td>
								<td class="inputs">
					            	<input id="folio" type="text" value="{{$folio}}" disabled="true" class="textocentrado" > 
								</td>
						</tr>
						<tr>
							<td class="etiquetas"><label for="subtotal">Subtotal:</label></td>
							<td class="inputs"><input class="textocentrado" type="text" id="subtotal" disabled="true" value="0.00"></td>
						</tr>
						<tr>
							<td class="etiquetas"><label for="descuento" class="labelComun">Descuento:</label></td>
							<td class="inputs"><input class="textocentrado" type="text" id="descuento"  value="0" onchange="generaSubtotal();"></td>
						</tr>
						<tr>
							<td class="etiquetas"><label for="iva" class="labelComun">IVA  %:</label></td>
							<td class="inputs"><input class="textocentrado" type="text" id="iva" value="16" onchange="generaSubtotal();"></td>
						</tr>
						
						<tr>
							<td class="etiquetas"><label for="total" class="labelComun">Total:</label></td>
							<td class="inputs"><input class="textocentrado" type="text" id="total" disabled="true" value="0.00"></td>
						</tr>
						<tr>
							<td class="etiquetas"><label for="vendedor">Vendedor:</label></td>
							<td class="inputs"><input class="textocentrado" type="text"  value="{{$usuario}}" disabled="true"></td>
						</tr>
						<tr class="textocentrado">
							<td colspan="2"><button onclick="regenera();" class="btncancelar">Cancelar</button><button onclick="ajax();" class="btn">Vender</button></td>	
						</tr>
					</table>	
				</form>
			</div>
				
		</div>

		<div>
			<p id="coincidir">
				
			</p>
		</div>
		
@endsection