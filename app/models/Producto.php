<?php 
	/**
	* 
	*/
	class Producto extends Eloquent
	{
		protected $table = 'productos';

		public function marca(){
			return $this->belongsTo('Marca');
		}
		public function concepto(){
			return $this->belongsTo('Concepto');
		}	
		
	}
 ?>