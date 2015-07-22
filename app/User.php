<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	
	use Authenticatable, CanResetPassword;
	
	protected $table = 'users';
	public $timestamps = true;
	protected $fillable = array('first_name', 'last_name', 'email', 'phone', 'password', 'id_facebook', 'admin', 'salon_owner');
	protected $hidden = ['password', 'remember_token'];

	public function salons()
	{
		return $this->hasMany('App\Salon');
	}

	public function reservations()
	{
		return $this->hasMany('App\Reservation');
	}
}