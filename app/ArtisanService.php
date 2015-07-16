<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtisanService extends Model {

	protected $table = 'artisans_services';
	public $timestamps = false;

	public function reservations()
	{
		return $this->hasMany('Reservation');
	}

}