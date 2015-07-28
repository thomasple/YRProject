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
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12"
         id="register_body">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#client" data-toggle="tab">Register as a client</a></li>
            <li style="border-bottom:1px solid lightgrey; vertical-align: middle"><strong>OR</strong></li>
            <li><a href="#business" data-toggle="tab">Register your business</a></li>
        </ul>
        <div class="tab-content"
             style="padding:10px; background-color: white; border:1px solid lightgrey; border-top:none;">
            <div class="tab-pane active" id="client">
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
                {!! Form::hidden('salon_owner', 0) !!}
                {!! Form::submit('SIGN UP AS A CLIENT', ['class' => 'btn btn-info btn-block']) !!}
                {!! Form::close() !!}
            </div>

            <div class="tab-pane" id="business">
                {!! Form::open(['url' => '/auth/register']) !!}
                <div class="form-group">
                    <legend>About you</legend>
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
                    {!! Form::hidden('salon_owner', 1) !!}
                </div>
                <div class="form-group">
                    <legend>About your business <a data-toggle="tooltip" href="#"
                                                   title="If you have a network of businesses, you can add more later"
                                                   class="info">[?]</a></legend>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('city') ? 'has-error' : '' !!}">
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
                        {!! $errors->first('city', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                        {!! $errors->first('address', '<small class="help-block">:message</small>') !!}
                    </div>
                </div>

                {!! Form::submit('REGISTER YOUR BUSINESS', ['class' => 'btn btn-info btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <br/>

        <div style="font-size: 0.9em;">
            You already have an account ?
            <a href="{{ url('/auth/login') }}">Login</a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('.info').tooltip({ placement: 'bottom', trigger:'hover click' });
        });
    </script>
@endsection

