<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'services';
	public $timestamps = true;
	protected $fillable = array('name', 'description', 'price', 'duration');

	public function salon()
	{
		return $this->belongsTo('Salon');
	}

	public function artisans()
	{
		return $this->belongsToMany('Artisan');
	}

	public function timeSlots()
	{
		return $this->hasMany('TimeSlot');
	}

}