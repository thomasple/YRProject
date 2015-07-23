<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtisanService extends Model {

	protected $table = 'artisans_services';

	protected $fillable = array('artisan_id', 'service_id');

	public $timestamps = false;

	public function reservations()
	{
		return $this->hasMany('App\Reservation');
	}

}