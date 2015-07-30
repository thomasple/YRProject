@extends('templates/main')
@section('title')
    Salon modification
@stop
@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <div>
            {!! Form::open(['method' => 'DELETE', 'route' => ['salon.destroy', $salon->id]]) !!}
            {!! Form::submit('Delete this salon', ['class' => 'btn btn-danger pull-right', 'onclick' => 'return confirm(\'Delete this salon and all its artisans and services?\')']) !!}
            {!! Form::close() !!}
        </div>
        <br/>
        <br/>
        <h1 style="text-align: center">Edit Salon</h1>

        {!! Form::model($salon,['route' =>['salon.update',$salon->id],'method' => 'put','files' => true, 'class'=>'form_effect']) !!}
        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) !!}
            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('city') ? 'has-error' : '' !!}">
            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City', 'required']) !!}
            {!! $errors->first('city', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required']) !!}
            {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('open_hour') ? 'has-error' : '' !!}" style="text-align:left">
            Opening hour : {!! Form::input('time', 'open_hour', date('H:i',strtotime($salon->open_hour)), ['class' => 'form-control', 'placeholder' => 'Opening hour (format HH:mm', 'required']) !!}
            {!! $errors->first('open_hour', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('close_hour') ? 'has-error' : '' !!}" style="text-align:left">
             Closing hour : {!! Form::input('time', 'close_hour', date('H:i',strtotime($salon->close_hour)), ['class' => 'form-control', 'placeholder' => 'Closing hour (format HH:mm', 'required']) !!}
            {!! $errors->first('close_hour', '<small class="help-block">:message</small>') !!}
        </div>
        @if(Auth::user()->admin)
        <div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
            {!! Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => 'user_id', 'required']) !!}
            {!! $errors->first('user_id', '<small class="help-block">:message</small>') !!}
        </div>
        @endif
        <div class="form-group {!! $errors->has('error_photo') ? 'has-error' : '' !!}">
            Current photo : {!! Html::image($salon->main_photo, 'Main photo', ['width'=>'100px']) !!} <br/><br/>
            {!! Form::file('main_photo', ['class' => 'form-control']) !!}
            {!! $errors->first('error_photo', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::hidden('current_photo', $salon->main_photo) !!}

        {!! Form::submit('Save changes', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}

        <a href="javascript:history.back()" class="btn btn-danger pull-left">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@stop
@section('script')
@stop