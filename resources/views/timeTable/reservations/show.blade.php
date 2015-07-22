@extends('templates/main')

@section('title')
    Show reservation
@endsection

@section('content')
    <h1>Show Reservation</h1>
    <p>From : {{ $reservation->start }}</p>
    <p>To : {{ $reservation->end }}</p>
    <p>Client ID : {{ $reservation->client_id }}</p>
    <p>Artisan-Service ID : {{ $reservation->artisan_service_id }}</p>

    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
    </a>
@endsection