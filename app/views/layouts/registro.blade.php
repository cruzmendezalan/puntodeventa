<!DOCTYPE HTML>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <!--nuestro título podrá ser modificado-->
        <title>@yield('titulo')</title>
        {{  HTML::style('css/comun.css')}}

    </head>
        <div class="wrapper">
 
        <h1>Formulario de registro.</h1>
    
        <!--si el formulario contiene errores de validación-->
        @if($errors->has())
            <div class="errors">
                <!--si el usuario falla la validación mostramos el error-->
                @if($errors->has('usuario'))
 
                    <p>{{ $errors->first('usuario') }}</p>
 
                @endif
 
                <!--si el password falla la validación mostramos el error-->
                @if ($errors->has('password'))
 
                    <p>{{ $errors->first('password') }}</p>
 
                @endif
 
                <!--si el email falla la validación mostramos el error-->
                @if ($errors->has('email'))
 
                    <p>{{ $errors->first('email') }}</p>
 
                @endif
 
            </div>
        @endif
 
        <!--pintamos el formulario haciendo uso de la clase form de laravel-->
            <div class="form">
    
                {{ Form::open(array('url' => 'registro')) }}
                <!--equivale a
                <form method="POST" action="http://bloglaravel.com/formularios/user" accept-charset="UTF-8">
                -->
 
                {{ Form::label('usuario', 'Usuario') }}
                <!--equivale a <label for="usuario">Usuario</label>-->
 
                {{ Form::text('usuario', Input::old('usuario')) }}
                <!--equivale a <input type="text" name="usuario" value="" id="usuario">-->
 
                {{ Form::label('password', 'Password') }}
                <!--equivale a <label for="password">Password</label>-->
 
                {{ Form::password('password') }}
                <!--equivale a <input type="password" name="password" id="password">-->
 
                <br />
                {{ Form::submit('Crear Usuario') }}
                <!--equivale a <input type="submit" value="Iniciar sesión">-->
 
                {{ Form::close() }}
                <!--equivale a </form>-->
 
            </div>
 
            <div class="success">
 
                <!--si el registro se lleva a cabo, mostramos el mensaje que 
                envíamos desde el controlador formularios-->
                @if(Session::has('mensaje'))
 
                    <div id="flash_notice">{{ Session::get('mensaje') }}</div>
                     
                @endif
 
            </div>
 
        </div>
    </body>
</html>