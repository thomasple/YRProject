<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->text('description');
			$table->decimal('price');
			$table->integer('duration');
			$table->integer('salon_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('services');
	}
}