@extends('templates/main')

@section('title')
Login
@endsection

@section('content')

{!! Html::image('images/YRBanner.png', 'YR Banner', ['class'=>'logo_banner']) !!}

<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12"
     id="register_body">
    <p>You are trying to access to a configuration page. Please confirm your password first.</p>
    {!! Form::open(['url' => '/confirm', 'class'=>'form_effect']) !!}
    <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
        {!! Form::password ('password', ['class' => 'form-control', 'placeholder' => 'Password','required']) !!}
        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
    </div>

    {!! Form::submit('CONFIRM', ['class' => 'btn btn-info btn-block']) !!}
    {!! Form::close() !!}
</div>
@endsection


