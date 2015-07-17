<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::resource('user', 'UserController');
Route::resource('salon', 'SalonController');
Route::resource('artisan', 'ArtisanController');
Route::resource('service', 'ServiceController');
Route::resource('artisanservice', 'ArtisanServiceController');
Route::resource('timeslot', 'TimeSlotController');
Route::resource('reservation', 'ReservationController');
Route::resource('holiday', 'HolidayController');

Route::get('confirm', 'ConfirmController@getConfirm');
Route::post('confirm', 'ConfirmController@postConfirm');
Route::get('end-session', 'Auth\AuthController@endSession');
