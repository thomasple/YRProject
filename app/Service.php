<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'services';
	public $timestamps = true;
	protected $fillable = array('name', 'description', 'price', 'duration', 'salon_id');

	public function salon()
	{
		return $this->belongsTo('App\Salon');
	}

	public function artisans()
	{
		return $this->belongsToMany('App\Artisan');
	}

	public function timeSlots()
	{
		return $this->hasMany('App\TimeSlot');
	}

}