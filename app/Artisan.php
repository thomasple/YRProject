<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model {

	protected $table = 'artisans';
	public $timestamps = true;
	protected $fillable = array('first_name', 'last_name', 'email', 'specialty', 'description', 'sex', 'main_photo', 'salon_id');

	public function salon()
	{
		return $this->belongsTo('Salon');
	}

	public function services()
	{
		return $this->belongsToMany('Service');
	}

	public function timeSlots()
	{
		return $this->hasMany('TimeSlot');
	}

	public function holidays()
	{
		return $this->hasMany('Holiday');
	}

}