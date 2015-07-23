@extends('templates/main')

@section('title')
    Time Slot configuration
@endsection
@section('content')

    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Create Time Slot</h1>

        {!! $errors->first('artisan_id', '<small class="help-block">:message</small>') !!}
        {!! $errors->first('service_id', '<small class="help-block">:message</small>') !!}
        {!! Form::open(['url' => '/timeslot']) !!}

        {!! Form::hidden('artisan_id', $artisan_id) !!}
        {!! Form::hidden('service_id', $service_id) !!}
        <div class="form-group {!! $errors->has('day') ? 'has-error' : '' !!}">
            Day
            {!! Form::select('day',['Mo'=>'Monday','Tu'=>'Tuesday','We'=>'Wednesday','Th'=>'Thursday','Fr'=>'Friday','Sa'=>'Saturday','Su'=>'Sunday'], ['class' => 'form-control', 'placeholder' => 'Day', 'value' => old('day')]) !!}
            {!! $errors->first('day', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('from_hour') ? 'has-error' : '' !!}">
            {!! Form::input('time','from_hour',  \Carbon\Carbon::now()->toTimeString(), ['class' => 'form-control', 'placeholder' => 'From', 'value' => old('from_hour')]) !!}
            {!! $errors->first('from_hour', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('to_hour') ? 'has-error' : '' !!}">
            {!! Form::input('time','to_hour',  \Carbon\Carbon::now()->toTimeString(), ['class' => 'form-control', 'placeholder' => 'To', 'value' => old('to_hour')]) !!}
            {!! $errors->first('to_hour', '<small class="help-block">:message</small>') !!}
        </div>


        {!! Form::submit('REGISTER', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
    </a>
@endsection