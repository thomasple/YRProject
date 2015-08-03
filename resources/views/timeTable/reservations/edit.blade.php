@extends('templates/main')

@section('title')
    Reservation configuration
@endsection

@section('content')


    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Edit reservation</h1>


        {!! Form::model($timeslot, ['route' => ['timeslot.update', $timeslot->id], 'method'=>'put', 'class'=>'form_effect']) !!}

        <div class="form-group {!! $errors->has('start') ? 'has-error' : '' !!}">
            {!! Form::input('datetime','start',null, ['class' => 'form-control', 'required']) !!}
            {!! $errors->first('start', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('end') ? 'has-error' : '' !!}">
            {!! Form::input('datetime','end', null, ['class' => 'form-control', 'required']) !!}
            {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('client_id') ? 'has-error' : '' !!}">
            {!! Form::text('client_id', null, ['class' => 'form-control', 'placeholder' => 'Client id', 'value' => old('client_id'), 'required']) !!}
            {!! $errors->first('client_id', '<small class="help-block">:message</small>') !!}
        </div>

        <div class="form-group {!! $errors->has('artisan_service_id') ? 'has-error' : '' !!}">
            {!! Form::text('artisan_service_id', null, ['class' => 'form-control', 'placeholder' => 'Artisan_Service ID', 'value' => old('artisan_service_id'), 'required']) !!}
            {!! $errors->first('artisan_service_id', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('SEND', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection