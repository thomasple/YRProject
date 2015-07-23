@extends('templates/main')

@section('title')
    Salon configuration
@endsection
@section('content')

    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Create Service</h1>

        {!! $errors->first('salon_id', '<small class="help-block">:message</small>') !!}

        {!! Form::open(['url' => '/service']) !!}

        {!! Form::hidden('salon_id', $salon_id) !!}

        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Service\'s name', 'value' => old('name')]) !!}
            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
            {!! Form::input('number', 'price', null, ['class' => 'form-control', 'placeholder' => 'Service\'s price (RUR)', 'value' => old('price')]) !!}
            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('duration') ? 'has-error' : '' !!}">
            {!! Form::input('number', 'duration', null,
                ['class' => 'form-control', 'placeholder' => 'Service\'s duration (in minutes)', 'value' => old('duration'), 'min'=>'15', 'step'=>'15']) !!}
            {!! $errors->first('duration', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Service\'s description', 'value' => old('description')]) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('SEND', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection

