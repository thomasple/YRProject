<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model {

	protected $table = 'time_slots';
	public $timestamps = true;
	protected $fillable = array('day', 'from_hour', 'to_hour');

	public function artisan()
	{
		return $this->belongsTo('Artisan');
	}

	public function service()
	{
		return $this->belongsTo('Service');
	}

}