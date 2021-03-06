<!-- LAYOUT PRINCIPAL, ESQUELETO DEL INDEX (ALGO PARECIDO A AJAX) -->
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="_token" content="{{ csrf_token() }}" />
	<title>Punto de Venta</title>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<? 
			// echo HTML::favicon('favicon.ico');
			// echo HTML::style('css/comun.css'); 
			// echo HTML::style('css/barranavegacion.css');
			echo HTML::style('css/puntodeventa.css');
			echo HTML::style("css/bootstrap.css");
															?>
</head>
<body onload="paginacargada()">
	<? if(Auth::user())// Si el usuario ya esta logueado. 
						{?> 
	<h1>Punto de Venta</h1> 
	<div class"container">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div id="navbar" class="navbar-collapse collapse">
				<ul  class="nav navbar-nav">
					<li><?  {{ echo HTML::link('/', 'Principal', array('class' => 'principalimagen')); }} ?> 
					</li>
					<li>
						<?  {{ echo HTML::link('/reportes', 'Reportes', array('class' => 'reportesimagen')); }} ?>
						<!-- <a href="#">Reportes</a> -->
					</li>
						<li> 
						<?  {{ echo HTML::link('/edicion', 'Administracion', array('class' => 'administracionimagen')); }} ?>
					</li>
					<li>
						<?  {{ echo HTML::link('/', 'Contacto', array('class' => 'contactoimagen')); }} ?>
						<!-- <a href="#">Contacto</a> -->
					</li>
					<li>
						<?  {{ echo HTML::link('logout', 'Cerrar Sesion', array('class' => 'salirimagen')); }} ?>
					</li>
				</ul>
				</div>
			</div>
		</nav>
	</div>	
	<div class="container">
		<div class="row">
		 @yield('contenido')
		 </div> 
	</div>
	<? }else{ //si no esta logueado, lo redirecionamos a login
		Redirect::to('login');
	}
	?>
	<?	echo HTML::script("https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js");
		echo HTML::script("js/bootstrap.min.js");
		echo HTML::script('js/ventaActual.js');

	?>
</body>
</html>
