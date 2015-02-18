<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('usuarios');

		Schema::create('usuarios',function($tabla){
			$tabla->engine = 'InnoDB';
            $tabla->increments('id');
            $tabla->string('username', 60);
            $tabla->string('password', 100);
            $tabla->string('correo',100);
            $tabla->integer('tipo');        
            $tabla->rememberToken();
            $tabla->timestamps();
 
        });
        
 
        DB::table('usuarios')->insert(array('username' => 'usuario','password' => Hash::make('123456')));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
