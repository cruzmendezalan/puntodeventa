@extends('layouts.login')
@section('titulo')
    Login
 
@endsection
 
@section('mensaje')
 
    <h1>Bienvenido</h1>
 
@endsection
 
 
@section('contenido')
    <section class="container">
        <div class="login">

        {{ Form::open( array('url' => 'login')) }}
            <!-- Revisemos si tenemos errores de login -->
            @if (Session::has('error_login'))
            <span class="error">Usuario o contraseña incorrectos.</span>
            @endif
     
            {{ Form::label('usuario', 'Usuario') }}
     
            {{ Form::text('username') }}
     
            {{ Form::label('password', 'Password') }}
     
            {{ Form::password('password') }}
     
            <br />
            {{ Form::submit('Iniciar sesión') }}
 
        {{ Form::close() }}
 
        <!--si intentan ir a la home sin inciar sesión o han cerrado sesión mostramos un mensaje-->
        @if(Session::has('mensaje'))
 
            <div id="flash_notice">{{ Session::get('mensaje') }}</div>
                     
         @endif
 
    </div>
    </section>
     
 
@endsection