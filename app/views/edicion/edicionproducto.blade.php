@extends ('layouts.edicion')
@if (Session::has('error_login'))
        <span class="error">Inicia session para continuar</span>
@endif

@section('tabla')
<div>
	
	<div style="width:50%;">
		<div class="caption">Editar Producto</div>
		<table style="background-color:white; color:blue; width:100%;">
			{{ Form::open(array('url'=>'editarproductopost'))	}}
			<tr class="reportesfila">
				<td class="cell espacio">Codigo</td>
				<td class="cell espacio">{{Form::text('id',$producto[0]->id)}}</td>
			</tr>
			<tr class="reportesfila">
				<td class="cell espacio">Nombre</td>
				<td class="cell espacio">{{Form::text('nombre',$producto[0]->nombre)}}</td>
			</tr>
			<tr class="reportesfila">
				<td class="cell espacio">Precio</td>
				<td class="cell espacio">{{Form::text('precio',$producto[0]->precio)}}</td>
			</tr>
			<tr class="reportesfila">
				<td class="cell espacio">Descripcion</td>
				<td class="cell espacio">{{Form::text('descripcion',$producto[0]->descripcion)}}</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					{{ Form::submit('Guardar',array('class'=>'btn')) }}
				</td>
			</tr>
			
		</table>
	</div>
	
</div>
@endsection