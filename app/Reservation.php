<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

	protected $table = 'reservations';
	public $timestamps = true;
	protected $fillable = array('start', 'end');

	public function client()
	{
		return $this->belongsTo('App\User');
	}

	public function artisan_service()
	{
		return $this->belongsTo('App\ArtisanService');
	}

}