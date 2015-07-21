@extends('templates/main')

@section('title')
    Show artisan
@endsection

@section('content')
    <h1>Show Artisan</h1>
    <p>Nom : {{ $artisan->first_name.' '.$artisan->last_name }}</p>
    <p>Email : {{ $artisan->email }}</p>
    <p>Gender : {{ $artisan->sex }}</p>
    <p>Specialty : {{ $artisan->specialty }}</p>
    <p>Description : {{ $artisan->description }}</p>
    <p>photo : {!! Html::image($artisan->main_photo, 'Main photo', ['width'=>'100px']) !!}</p>

    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
    </a>
@endsection