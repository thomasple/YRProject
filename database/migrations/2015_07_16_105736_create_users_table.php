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
			$table->string('email', 100)->unique();
			$table->string('phone', 20)->default(NULL);
			$table->string('password', 100);
			$table->string('id_facebook', 100)->default(NULL);
			$table->boolean('admin')->default(false);
			$table->boolean('salon_owner')->default(false);
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}