<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtisansServicesTable extends Migration {

	public function up()
	{
		Schema::create('artisans_services', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('artisan_id')->unsigned();
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('artisans_services');
	}
}