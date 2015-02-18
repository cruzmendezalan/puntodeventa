<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Marcas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('marcas');

		Schema::create('marcas',function($tabla){
			$tabla->engine = 'InnoDB';
			$tabla->increments('id');
			$tabla->string('nombre',100);
			$tabla->string('descripcion',100);
			$tabla->timestamps();
			$tabla->rememberToken();
		});
    DB::table('marcas')->insert(array('nombre' => 'PEPSI',	'descripcion' =>"JUGOS Y BEBIDAS", 'id'=>2));
    DB::table('marcas')->insert(array('nombre' => 'COCACOLA',	'descripcion' =>"JUGOS Y BEBIDAS", 'id'=>1));
    DB::table('marcas')->insert(array('nombre' => 'LAMINAS HUAJUAPAN',	'descripcion' =>"FIERROS", 'id'=>3));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marcas');
	}

}
