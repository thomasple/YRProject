@extends('templates/main')

@section('title')
    Show artisan
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Show Artisan</h1>

        <div style="text-align: left">
            <p>Nom : {{ $artisan->first_name.' '.$artisan->last_name }}</p>

            <p>Email : {{ $artisan->email }}</p>

            <p>Gender : {{ $artisan->sex }}</p>

            <p>Specialty : {{ $artisan->specialty }}</p>

            <p>Description : {{ $artisan->description }}</p>

            <p>Salon : {!! link_to_route('salon.show', $artisan->salon->name, [$artisan->salon->id]) !!}</p>

            <p>photo : {!! Html::image($artisan->main_photo, 'Main photo', ['width'=>'100px']) !!}</p>

            <a href="javascript:history.back()" class="btn btn-primary">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
            </a>
        </div>
    </div>
@endsection