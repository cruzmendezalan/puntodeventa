<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Punto de Venta</title>
	<?{{ 
			echo HTML::style('css/comun.css'); 
			echo HTML::style('css/barranavegacion.css');
															}}?>
</head>
<!-- <link rel="stylesheet" href="../../public/css/comun.css"> -->
<body>
	<? if(Auth::user())// Si el usuario ya esta logueado. 
						{?>  
	<div class"container">
		<ul class="nav">
			<li><a href="#">Principal</a></li>
			<li>
				<a href="#">Reportes</a>
				<!-- <ul>
					<li><a href="#">Webdesign</a></li>
					<li><a href="#">Development</a></li>
					<li><a href="#">App Design</a></li>
					<li>
						<a href="#">Identity</a>
						<ul>
							<li><a href="#">Level 2</a></li>
							<li><a href="#">Level 2</a></li>
							<li>
								<a href="#">Level 2</a>
								<ul>
									<li><a href="#">Level 3</a></li>
									<li><a href="#">Level 3</a></li>
									<li><a href="#">Level 3</a></li>
									<li><a href="#">Level 3</a></li>
								</ul>
							</li>
							<li><a href="#">Level 2</a></li>
						</ul>
					</li>
					<li><a href="#">Marketing</a></li>
				</ul> -->
			</li>
			<li><a href="#">Administracion</a></li>
			<li><a href="#">Ventas</a></li>
			<!-- <li><a href="#">Services</a></li> -->
			<li><a href="#">Contacto</a></li>
		</ul>
	</div>	
	<div>
		<p> <? {{ echo HTML::link('logout', 'Logout'); }} ?> </p> 
	</div>
	<? }else{ //si no esta logueado, lo redirecionamos a login
		Redirect::to('login');
	}
	?>
</body>
</html>
