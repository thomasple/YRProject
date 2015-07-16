<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model {

	protected $table = 'salons';
	public $timestamps = true;
	protected $fillable = array('name', 'description', 'address', 'main_photo');

	public function owner()
	{
		return $this->belongsTo('User');
	}

	public function artisans()
	{
		return $this->hasMany('Artisan');
	}

	public function services()
	{
		return $this->hasMany('Service');
	}

}