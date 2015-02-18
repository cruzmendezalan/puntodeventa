<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('productos');

		Schema::create('productos',function($tabla){
			$tabla->engine = 'InnoDB';
			$tabla->increments('id');
			$tabla->string('nombre',100);
			$tabla->float('precio');
			$tabla->string('descripcion',100);
			$tabla->string('modelo',100);
			$tabla->rememberToken();
            $tabla->timestamps();
            $tabla->integer('marca_id')->unsigned();
            $tabla->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade')->onUpdate('cascade');
		});


		DB::table('productos')->insert(array('nombre' => 'COCACOLA',	'descripcion' =>"ENVASE DE 600ml",'precio' => 10, 'marca_id' => 1));
	    DB::table('productos')->insert(array('nombre' => 'FANTA',		'descripcion' =>"ENVASE DE 600ml",'precio' => 10, 'marca_id' => 1));
	    DB::table('productos')->insert(array('nombre' => 'AGUA CIEL',	'descripcion' =>"ENVASE DE 600ml",'precio' => 12, 'marca_id' => 1));
	    DB::table('productos')->insert(array('nombre' => 'FRESCA',		'descripcion' =>"ENVASE DE 600ml",'precio' => 11, 'marca_id' => 1));
	    DB::table('productos')->insert(array('nombre' => 'MANZANITA',	'descripcion' =>"ENVASE DE 600ml",'precio' => 10, 'marca_id' => 1));
	    DB::table('productos')->insert(array('nombre' => 'JUGO DEL VALLE','descripcion' =>"ENVASE DE 600ml",'precio' => 8, 'marca_id' => 1));
	    DB::table('productos')->insert(array('nombre' => 'SQUIRT',		'descripcion' =>"ENVASE DE 600ml",'precio' => 12, 'marca_id' => 2));
	    DB::table('productos')->insert(array('nombre' => 'PEPSI',		'descripcion' =>"ENVASE DE 600ml",'precio' => 13, 'marca_id' => 2));
	    DB::table('productos')->insert(array('nombre' => 'MIRINDA',		'descripcion' =>"ENVASE DE 600ml",'precio' => 10, 'marca_id' => 2));
	    DB::table('productos')->insert(array('nombre' => 'SANGRIA',		'descripcion' =>"ENVASE DE 600ml",'precio' => 8, 'marca_id' => 2));
	    DB::table('productos')->insert(array('nombre' => 'JARRITO',		'descripcion' =>"ENVASE DE 600ml",'precio' => 6, 'marca_id' => 2));
	    DB::table('productos')->insert(array('nombre' => 'MINERAL',	'descripcion' =>"ENVASE DE 600ml",'precio' => 12, 'marca_id' => 2));
	 //  	DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 1.83m', 'descripcion'=>'CALIBRE 34','precio'=>	95.00 , 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 1.83m', 'descripcion'=>'CALIBRE 32','precio'=>	105.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 1.83m', 'descripcion'=>'CALIBRE 30','precio'=>	132.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 2.44m', 'descripcion'=>'CALIBRE 34','precio'=>	125.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 2.44m', 'descripcion'=>'CALIBRE 32','precio'=>	135.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 2.44m', 'descripcion'=>'CALIBRE 30','precio'=>	234.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 3.05m', 'descripcion'=>'CALIBRE 34','precio'=>	155.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 3.05m', 'descripcion'=>'CALIBRE 32','precio'=>	165.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 3.05m', 'descripcion'=>'CALIBRE 30','precio'=>	234.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 3.66m', 'descripcion'=>'CALIBRE 34','precio'=>	185.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 3.66m', 'descripcion'=>'CALIBRE 32','precio'=>	205.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 3.66m', 'descripcion'=>'CALIBRE 30','precio'=>	230.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 4.27m', 'descripcion'=>'CALIBRE 34','precio'=>	204.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 4.27m', 'descripcion'=>'CALIBRE 32','precio'=>	233.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 4.27m', 'descripcion'=>'CALIBRE 30','precio'=>	232.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 4.88m', 'descripcion'=>'CALIBRE 34','precio'=>	531.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 4.88m', 'descripcion'=>'CALIBRE 32','precio'=>	643.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 4.88m', 'descripcion'=>'CALIBRE 30','precio'=>	423.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 5.5m	', 'descripcion'=>'CALIBRE 34','precio'=>	234.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 5.5m	', 'descripcion'=>'CALIBRE 32','precio'=>	235.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 5.5m	', 'descripcion'=>'CALIBRE 30','precio'=>	234.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 6.10m', 'descripcion'=>'	CALIBRE 34','precio'=>	234.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 6.10m', 'descripcion'=>'	CALIBRE 32','precio'=>	350.00, 'marca_id'=>3));
		// DB::table('productos')->insert(array('nombre'=>'LAMINA GALVANIZADA 6.10m', 'descripcion'=>'	CALIBRE 30','precio'=>	239.00, 'marca_id'=>3));



	}

 

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
