@extends('templates/main')

@section('title')
    Sign up
@endsection
@section('content')
    {!! Html::image('images/YRBanner.png', 'YR Banner', ['class'=>'logo_banner']) !!}

    {{--    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif--}}

    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">

        {!! Form::open(['url' => '/auth/register']) !!}
        <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Your first name', 'value' => old('first_name')]) !!}
            {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">
            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Your last name', 'value' => old('last_name')]) !!}
            {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Your email address', 'value' => old('email')]) !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Your phone number', 'value' => old('phone')]) !!}
            {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            {!! Form::password ('password', ['class' => 'form-control', 'placeholder' => 'Choose your password (min. 6 characters)']) !!}
            {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">
            {!! Form::password ('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password']) !!}
            {!! $errors->first('password_confirmation', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::submit('SIGN UP', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
        <br/>

        <div style="font-size: 0.9em;">
            You already have an account ?
            <a href="{{ url('/auth/login') }}">Login</a>
        </div>
    </div>
@endsection

