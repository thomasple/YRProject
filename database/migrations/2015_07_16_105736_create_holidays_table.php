<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolidaysTable extends Migration {

	public function up()
	{
		Schema::create('holidays', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('description');
			$table->datetime('start');
			$table->datetime('end');
			$table->integer('artisan_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('holidays');
	}
}