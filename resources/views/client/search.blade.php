@extends('templates/main')

@section('title')
    Search
@endsection

@section('content')
    <h1>Search menu</h1>
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">

        {!! Form::open(['url' => '/search']) !!}
        All fields are optionnal, but the more precise your request, the more accurate the results.
        <div class="form-group {!! $errors->has('service') ? 'has-error' : '' !!}">
            {!! Form::text('service', null, ['class' => 'form-control', 'placeholder' => 'Service', 'value' => old('service')]) !!}
            {!! $errors->first('service', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('salon') ? 'has-error' : '' !!}">
            {!! Form::text('salon', null, ['class' => 'form-control', 'placeholder' => 'Salon', 'value' => old('salon')]) !!}
            {!! $errors->first('salon', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">
            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s last name', 'value' => old('last_name')]) !!}
            {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s first name', 'value' => old('first_name')]) !!}
            {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('sex') ? 'has-error' : '' !!}">
            Gender : {!! Form::select('sex', array('A'=>'Any','M' => 'Male', 'F' => 'Female'),[ old('sex'),'placeholder' => 'Artisan\'s sex']) !!}
            {!! $errors->first('sex', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('specialty') ? 'has-error' : '' !!}">
            {!! Form::text('specialty', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s specialty', 'value' => old('specialty')]) !!}
            {!! $errors->first('specialty', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('date') ? 'has-error' : '' !!}">
            {!! Form::date('date', \Carbon\Carbon::today(), ['class' => 'form-control', 'placeholder' => 'From', 'value' => old('date')]) !!}
            {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('beginning') ? 'has-error' : '' !!}">
            {!! Form::input('time','beginning', null, ['class' => 'form-control', 'placeholder' => 'From', 'value' => old('beginning')]) !!}
            {!! $errors->first('beginning', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('end') ? 'has-error' : '' !!}">
            {!! Form::input('time','end', null, ['class' => 'form-control', 'placeholder' => 'To', 'value' => old('end')]) !!}
            {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
        </div>


    {!! Form::submit('Search', ['class' => 'btn btn-info pull-right']) !!}
    {!! Form::close() !!}
    </div>
@endsection