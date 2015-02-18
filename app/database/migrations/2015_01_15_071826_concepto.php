<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Concepto extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('concepto');

		Schema::create('concepto',function($tabla){
			// $tabla->increments('id');
			$tabla->engine = 'InnoDB';
			$tabla->float('cantidad');
			$tabla->float('importe');
			$tabla->integer('venta_id')->unsigned()->nullable();
			$tabla->integer('producto_id')->unsigned()->nullable();
			$tabla->foreign('producto_id')->references('id')->on('productos');
			$tabla->foreign('venta_id')->references('id')->on('venta');
			$tabla->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('concepto');
	}


}
