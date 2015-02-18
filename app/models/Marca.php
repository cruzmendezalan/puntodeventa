<?php 
	/**
	* 
	*/
	class Marca extends Eloquent
	{
		protected $table = 'marcas';
		
		public function productos()
		{
			return $this->hasMany('Producto');
		}	
	}
?>