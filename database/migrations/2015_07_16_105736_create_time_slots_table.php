<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimeSlotsTable extends Migration {

	public function up()
	{
		Schema::create('time_slots', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('day', 2);
			$table->time('from_hour');
			$table->time('to_hour');
			$table->integer('service_id')->unsigned();
			$table->integer('artisan_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('time_slots');
	}
}