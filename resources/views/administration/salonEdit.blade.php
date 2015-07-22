@extends('templates/main')
@section('title')
    Salon modification
@stop
@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Edit Salon</h1>

        {!! Form::model($salon,['route' =>['salon.update',$salon->id],'method' => 'put','files' => true]) !!}
        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
            {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('open_hour') ? 'has-error' : '' !!}">
            {!! Form::input('time', 'open_hour', date('H:i',strtotime($salon->open_hour)), ['class' => 'form-control']) !!}
            {!! $errors->first('open_hour', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('close_hour') ? 'has-error' : '' !!}">
            {!! Form::input('time', 'close_hour', date('H:i',strtotime($salon->close_hour)), ['class' => 'form-control']) !!}
            {!! $errors->first('close_hour', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('owner_id') ? 'has-error' : '' !!}">
            {!! Form::text('owner_id', null, ['class' => 'form-control', 'placeholder' => 'Owner_id']) !!}
            {!! $errors->first('owner_id', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('error_photo') ? 'has-error' : '' !!}">
            Current photo : {!! Html::image($salon->main_photo, 'Main photo', ['width'=>'100px']) !!} <br/><br/>
            {!! Form::file('main_photo', ['class' => 'form-control']) !!}
            {!! $errors->first('error_photo', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::hidden('current_photo', $salon->main_photo) !!}

        {!! Form::submit('Save changes', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}

        <a href="javascript:history.back()" class="btn btn-danger pull-left">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@stop
@section('script')
@stop