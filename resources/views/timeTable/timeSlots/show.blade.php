@extends('templates/main')

@section('title')
    Show time slot
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="register_body" style="text-align: left;">
    <h1>Show Time Slot</h1>
    <p>Day : {{ $timeslot->day }}</p>
    <p>From : {{ $timeslot->from_hour }}</p>
    <p>To : {{ $timeslot->to_hour }}</p>
    <p>Service ID : {{ $timeslot->service_id }}</p>
    <p>Artisan ID : {{ $timeslot->artisan_id }}</p>

    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
    </a>
</div>
@endsection