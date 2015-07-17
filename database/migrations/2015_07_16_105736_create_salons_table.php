<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalonsTable extends Migration {

	public function up()
	{
		Schema::create('salons', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->text('description');
			$table->text('address');
			$table->string('main_photo', 255);
			$table->integer('owner_id')->nullable()->default(NULL)->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('salons');
	}
}