<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Concepto extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'concepto';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function productos()
		{
			return $this->hasMany('Producto');
		}
	public function venta()
    {
        return $this->belongsTo('Venta');
    }


}
