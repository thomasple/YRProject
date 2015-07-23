@extends('templates/main')

@section('title')
    Holiday configuration
@endsection

@section('content')


    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Edit holiday</h1>


        {!! Form::open(['url' => '/reservation']) !!}

        <div class="form-group {!! $errors->has('start') ? 'has-error' : '' !!}">
            {!! Form::input('datetime','start',\Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            {!! $errors->first('start', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('end') ? 'has-error' : '' !!}">
            {!! Form::input('datetime','end', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            {!! $errors->first('end', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('artisan_id') ? 'has-error' : '' !!}">
            {!! Form::text('artisan_id', null, ['class' => 'form-control', 'placeholder' => 'Artisan id', 'value' => old('artisan_id')]) !!}
            {!! $errors->first('artisan_id', '<small class="help-block">:message</small>') !!}
        </div>

        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'value' => old('description')]) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('SEND', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection