<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtisanServiceTable extends Migration {

	public function up()
	{
		Schema::create('artisan_service', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('artisan_id')->unsigned();
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('artisan_service');
	}
}