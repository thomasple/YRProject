<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalonsTable extends Migration
{

    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->text('description');
            $table->string('city', 100);
            $table->text('address');
            $table->time('open_hour')->default('08:00');
            $table->time('close_hour')->default('18:00');
            $table->string('main_photo', 255);
            $table->integer('user_id')->nullable()->default(NULL)->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('salons');
    }
}