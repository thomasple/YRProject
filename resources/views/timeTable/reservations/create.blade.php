@extends('templates/main')

@section('title')
    Reservation configuration
@endsection
@section('content')

    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Create Reservation</h1>

        {!! $errors->first('artisan_service_id', '<small class="help-block">:message</small>') !!}

        {!! Form::open(['url' => '/reservation']) !!}

        {!! Form::hidden('artisan_service_id', $artisan_service_id) !!}
        <div class="form-group {!! $errors->has('start') ? 'has-error' : '' !!}">
            {!! Form::input('datetime','start',\Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            {!! $errors->first('start', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('end') ? 'has-error' : '' !!}">
            {!! Form::input('datetime','end', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('client_id') ? 'has-error' : '' !!}">
            {!! Form::text('client_id', null, ['class' => 'form-control', 'placeholder' => 'Client id', 'value' => old('client_id')]) !!}
            {!! $errors->first('client_id', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('SEND', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection