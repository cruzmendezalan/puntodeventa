<!DOCTYPE HTML>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <!--nuestro título podrá ser modificado-->
        <title>@yield('titulo')</title>
        {{  HTML::style('css/login.css')}}
        {{  HTML::style('css/comun.css')}}

    </head>
    <body>
 
        <h1>@yield('mensaje')</h1>
 
        <div class="wrapper">
            <div>
                @yield('contenido')
            </div>
 
        </div>
    </body>
</html>