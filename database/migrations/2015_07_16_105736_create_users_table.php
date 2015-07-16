<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('phone', 20);
			$table->string('password', 100);
			$table->string('id_facebook', 100);
			$table->boolean('admin');
			$table->boolean('salon_owner');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}