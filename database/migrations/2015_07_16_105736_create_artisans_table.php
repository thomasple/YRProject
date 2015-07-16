<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtisansTable extends Migration {

	public function up()
	{
		Schema::create('artisans', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('email', 100);
			$table->text('specialty');
			$table->text('description');
			$table->string('sex', 1);
			$table->string('main_photo', 255);
			$table->integer('salon_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('artisans');
	}
}