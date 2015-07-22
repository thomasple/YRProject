@extends('templates/main')

@section('title')
    Show time slot
@endsection

@section('content')
    <h1>Show Time Slot</h1>
    <p>Day : {{ $timeslot->day }}</p>
    <p>From : {{ $timeslot->from_hour }}</p>
    <p>To : {{ $timeslot->to_hour }}</p>
    <p>Service ID : {{ $timeslot->service_id }}</p>
    <p>Artisan ID : {{ $timeslot->artisan_id }}</p>

    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
    </a>

@endsection