@extends('templates/main')
@section('title')
    Salon creation
@stop
@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Create Salon</h1>

        {!! Form::open(['url'=>'salon']) !!}
        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('owner_id') ? 'has-error' : '' !!}">
            {!! Form::text('owner_id', null, ['class' => 'form-control', 'placeholder' => 'Owner id']) !!}
            {!! $errors->first('owner_id', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::submit('Confirm', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}
        <a href="javascript:history.back()" class="btn btn-danger pull-left">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@stop
@section('script')
@stop
