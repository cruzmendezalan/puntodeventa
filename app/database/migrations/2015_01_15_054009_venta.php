<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Venta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('venta');

		Schema::create('venta',function($tabla){
			$tabla->engine = 'InnoDB';
			$tabla->increments('id');
			// $tabla->string('nombre',100);
			$tabla->float('descuento');
			$tabla->float('subtotal');
			$tabla->float('total');
			$tabla->timestamps();
			$tabla->rememberToken();
			$tabla->unsignedInteger('user_id');
		});
		Schema::table('venta',function($tabla){
			$tabla->foreign('user_id')->references('id')->on('usuarios');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venta');
	}

}