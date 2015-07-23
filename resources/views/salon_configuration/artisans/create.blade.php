@extends('templates/main')

@section('title')
    Salon configuration
@endsection
@section('content')

    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Create Artisan</h1>

        {!! $errors->first('salon_id', '<small class="help-block">:message</small>') !!}

        {!! Form::open(['url' => '/artisan', 'files' => true]) !!}

        {!! Form::hidden('salon_id', $salon_id) !!}
        <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s first name', 'value' => old('first_name')]) !!}
            {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">
            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s last name', 'value' => old('last_name')]) !!}
            {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s email address', 'value' => old('email')]) !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('sex') ? 'has-error' : '' !!}">
            Gender : {!! Form::select('sex', array('M' => 'Male', 'F' => 'Female'), old('sex')) !!}
            {!! $errors->first('sex', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('specialty') ? 'has-error' : '' !!}">
            {!! Form::textarea('specialty', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s specialty', 'value' => old('specialty')]) !!}
            {!! $errors->first('specialty', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s description', 'value' => old('description')]) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('error_photo') ? 'has-error' : '' !!}">
            Main photo : {!! Form::file('main_photo', ['class' => 'form-control', 'value' => old('main_photo')]) !!}
            {!! $errors->first('error_photo', '<small class="help-block">:message</small>') !!}
        </div>


        {!! Form::submit('SEND', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection

