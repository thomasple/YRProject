<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	public function up()
	{
		Schema::create('reservations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->datetime('start');
			$table->datetime('end');
			$table->integer('client_id')->unsigned();
			$table->integer('artisan_service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reservations');
	}
}