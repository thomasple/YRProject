@extends('templates/main')

@section('title')
    Show holiday
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="register_body">
        <h1>Show Holiday</h1>

        <p>Artisan ID : {{ $holiday->artisan_id }}</p>

        <p>From : {{ $holiday->start }}</p>

        <p>To : {{ $holiday->end }}</p>

        <p>Description: {{ $holiday->description}}</p>

        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@endsection