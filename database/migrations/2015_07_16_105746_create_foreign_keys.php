<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('salons', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('artisans', function(Blueprint $table) {
			$table->foreign('salon_id')->references('id')->on('salons')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('services', function(Blueprint $table) {
			$table->foreign('salon_id')->references('id')->on('salons')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('artisans_services', function(Blueprint $table) {
			$table->foreign('artisan_id')->references('id')->on('artisans')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('artisans_services', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('time_slots', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('time_slots', function(Blueprint $table) {
			$table->foreign('artisan_id')->references('id')->on('artisans')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->foreign('artisan_service_id')->references('id')->on('artisans_services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('holidays', function(Blueprint $table) {
			$table->foreign('artisan_id')->references('id')->on('artisans')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('salons', function(Blueprint $table) {
			$table->dropForeign('salons_user_id_foreign');
		});
		Schema::table('artisans', function(Blueprint $table) {
			$table->dropForeign('artisans_salon_id_foreign');
		});
		Schema::table('services', function(Blueprint $table) {
			$table->dropForeign('services_salon_id_foreign');
		});
		Schema::table('artisans_services', function(Blueprint $table) {
			$table->dropForeign('artisans_services_artisan_id_foreign');
		});
		Schema::table('artisans_services', function(Blueprint $table) {
			$table->dropForeign('artisans_services_service_id_foreign');
		});
		Schema::table('time_slots', function(Blueprint $table) {
			$table->dropForeign('time_slots_service_id_foreign');
		});
		Schema::table('time_slots', function(Blueprint $table) {
			$table->dropForeign('time_slots_artisan_id_foreign');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->dropForeign('reservations_client_id_foreign');
		});
		Schema::table('reservations', function(Blueprint $table) {
			$table->dropForeign('reservations_artisan_service_id_foreign');
		});
		Schema::table('holidays', function(Blueprint $table) {
			$table->dropForeign('holidays_artisan_id_foreign');
		});
	}
}