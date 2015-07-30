@extends('templates/main')

@section('title')
    Main Login
@endsection

@section('content')

    {!! Html::image('images/YRBanner.png', 'YR Banner', ['class'=>'logo_banner']) !!}
    {!! $errors->first('admin', '<small class="help-block">:message</small>') !!}
    {!! $errors->first('id', '<small class="help-block">:message</small>') !!}
       <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12"
            id="register_body">
           <p>Warning : this will change a major administration configuration. Please confirm with the special password first.</p>
           {!! Form::open(['url' => '/main_admin', 'class'=>'form_effect']) !!}
           {!! Form::hidden('admin', $admin) !!}
           {!! Form::hidden('id', $id) !!}
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            {!! Form::password ('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
            {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('CONFIRM', ['class' => 'btn btn-info btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection