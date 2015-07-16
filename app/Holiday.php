<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model {

	protected $table = 'holidays';
	public $timestamps = true;
	protected $fillable = array('description', 'start', 'end');

	public function artisan()
	{
		return $this->belongsTo('Artisan');
	}

}