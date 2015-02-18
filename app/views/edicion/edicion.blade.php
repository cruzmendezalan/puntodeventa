<!-- edicionProductos.blade.php -->

@extends ('layouts.edicion')
@if (Session::has('error_login'))
        <span class="error">Inicia session para continuar</span>
@endif
@section('tabla')
<div class="productos">
	@if(Session::has('mensaje'))
        <div id="flash_notice">{{ Session::get('mensaje') }}</div>
    @endif
	<div class="productosSetGetDel scroll">
		<table>
			<thead>
				<tr>
					<th class="cell espacio">Nombre</th>
					<th class="cell espacio">Descripcion</th>
					<th class="cell espacio">Precio</th>
					<th class="cell espacio">Editar</th>
					<th class="cell espacio">Eliminar</th>
				</tr>
			</thead>
			<tbody>
			@foreach($productos as $producto )
				<tr>
					<td class="contenidocelda">{{ $producto->nombre }}</td>
					<td class="contenidocelda">{{ $producto->descripcion }}</td>
					<td class="contenidocelda">{{ $producto->precio }}</td>
					<td class="botonEditar">{{Form::open(array('url' => 'editarproducto'))}} {{ Form::hidden('id',$producto->id)}}{{ Form::submit('Editar') }}{{ Form::close() }}</td>
					<td class="botonEliminar">
						{{ Form::open(array('url' => 'eliminarproducto'))}}
						{{ Form::hidden('id',$producto->id)}}
						{{ Form::submit('Eliminar')}}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="cuadroedicion">
	<h3>Agregar Productos</h3>
		<div class="formulario">
			<table>
				{{ Form::open(array('url' => 'nuevoproducto')) }}
				<tbody>
					<tr>
						<td>{{ Form::label('nombre', 'Nombre :') }}</td>
						<td> {{ Form::text('nombre') }}</td>
						<td>{{ Form::label('codigo','Codigo :') }}</td>
						<td> {{ Form::text('id') }}</td>
					</tr>
					<tr>
						<td>{{ Form::label('marca','Marca :')}}</td>
						<td>{{Form::select('marca', $marcasarr)}}</td>

						<td>{{ Form::label('descripcion', 'Descripcion') }}</td>
						<td>{{ Form::text('descripcion') }}</td>
					</tr>
					<tr>
						<td>{{ Form::label('iva', 'IVA :') }}</td>
						<td>{{ Form::number('iva') }}</td>

						<td>{{ Form::label('precio','Precio :')  }}</td>
						<td>{{ Form::number('precio') }}</td>
					</tr>
					<tr>
						<td colspan="4">{{ Form::submit('Guardar',array('class'=>'btn')) }} {{ Form::close() }}</td>
					</tr>
				</tbody>
			</table>
		
		</div>
	</div>
</div>
<div class="productos">
	<div class="usuariosSetGetDel scroll">
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Contraseña</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $usuario )
				<tr>
					<td class="contenidocelda">{{ $usuario->username }}</td>
					<td class="contenidocelda">******</td>
					<td class="botonEditar">{{Form::open(array('url' => 'editarproducto'))}} {{ Form::hidden('id',$usuario->id)}}{{ Form::hidden('id',1)}}{{ Form::submit('Editar') }}{{ Form::close() }}</td>
					<td class="botonEliminar">{{ Form::hidden('id',$usuario->id)}}{{ Form::hidden('id',2)}}{{ Form::submit('Eliminar')}}{{ Form::close() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="cuadroedicion">
	<h3>Agregar Usuarios</h3>
		<table>
			<tbody>
			{{	Form::open(( array('url' => 'nuevousuario') ))	}}
				<tr>
					<td>{{ Form::label('nombre', 'Nombre :') }}</td>
					<td>{{ Form::text('nombre') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('password', 'Contraseña :') }}</td>
					<td>{{ Form::password('password') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('correo', 'Email :') }}</td>
					<td>{{Form::email('correo')}}</td>
				</tr>
				<tr>
					<td>{{ Form::submit('Agregar') }}</td>
				</tr>
			{{ Form::close() }}
			</tbody>
		</table>
	</div>
</div>

<div class="productos">
	
	<div class="marcasSetGetDel scroll">
		<table>
			<thead>
				<tr>
					<th>Nombre de Marca</th><th>Descripcion</th><th>Editar</th><th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
			@foreach($marcas as $marca )
				<tr><td class="contenidocelda">{{ $marca->nombre }}</td><td class="contenidocelda">{{ $marca->descripcion }}</td><td class="botonEditar">{{Form::open(array('url' => 'editarmarca'))}} {{ Form::hidden('id',$marca->id)}}{{ Form::hidden('id',1)}}{{ Form::submit('Editar') }}{{ Form::close() }}</td><td class="botonEliminar">{{ Form::hidden('id',$marca->id)}}{{ Form::hidden('id',2)}}{{ Form::submit('Eliminar')}}{{ Form::close() }}</td></tr>
			@endforeach
			</tbody>
		</table>
	</div>

	<div class="cuadroedicion">
	<h3>Agregar Marcas</h3>
		<table>
				{{ Form::open(array('url' => 'nuevamarca')) }}
				<tbody>
					<tr><td>{{ Form::label('nombre', 'Nombre :') }}</td><td> {{ Form::text('nombre') }}</td></tr>
					<tr><td>{{ Form::label('descripcion', 'Descripcion') }}</td><td>{{ Form::text('descripcion') }}</td></tr>
					<tr><td>{{ Form::label('codigo', 'Codigo :') }}</td><td> {{ Form::text('id') }}</td></tr>
					<tr><td>{{ Form::submit('Agregar') }}</td></tr>
				</tbody>
			</table>
	</div>
</div>
@endsection