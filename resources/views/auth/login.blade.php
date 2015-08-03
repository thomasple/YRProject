@extends('templates/main')

@section('title')
    Login
@endsection

@section('content')

    {!! Html::image('images/YRBanner.png', 'YR Banner', ['class'=>'logo_banner']) !!}

    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12"
         id="register_body">

        {!! Form::open(['url' => '/auth/login', 'class'=>'form_effect']) !!}
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            {!! Form::password ('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
            {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('remember') ? 'has-error' : '' !!}" style="text-align: left;">
            <label>{!! Form::checkbox ('remember', 'remember me', false) !!} Remember me</label>
            {!! $errors->first('remember', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::submit('LOGIN', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
        <br/>
        <div style="font-size: 0.9em;">
        <a href="{{ url('/password/email') }}">Forgot Your Password?</a><br/>
        You don't have an account ?
        <a href="{{ url('/auth/register') }}">Sign up</a>
        </div>
    </div>
@endsection


