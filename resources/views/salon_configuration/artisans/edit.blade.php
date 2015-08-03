@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')


    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">{{ session('salon_chosen_name') }}</h1>
        <h1 style="text-align: center">Edit Artisan</h1>

        {!! Form::model($artisan, ['route' => ['artisan.update', $artisan->id], 'files' => true, 'method'=>'put', 'class'=>'form_effect']) !!}
        <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s first name', 'value' => old('first_name'), 'required']) !!}
            {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">
            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s last name', 'value' => old('last_name'), 'required']) !!}
            {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s email address', 'value' => old('email'), 'required']) !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('sex') ? 'has-error' : '' !!}">
            <select name="sex">
                <option selected disabled>Select Artisan's gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            {!! $errors->first('sex', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('specialty') ? 'has-error' : '' !!}">
            {!! Form::text('specialty', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s specialty', 'value' => old('specialty'), 'required']) !!}
            {!! $errors->first('specialty', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Artisan\'s description', 'value' => old('description')]) !!}
            {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('error_photo') ? 'has-error' : '' !!}">
            Current photo : {!! Html::image($artisan->main_photo, 'Main photo', ['width'=>'100px']) !!} <br/><br/>
            {!! Form::file('main_photo', ['class' => 'form-control']) !!}
            {!! $errors->first('error_photo', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::hidden('current_photo', $artisan->main_photo) !!}
        {!! Form::hidden('salon_id', $artisan->salon_id) !!}

        {!! Form::submit('Save changes', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}
        <a href="javascript:history.back()" class="btn btn-danger pull-left">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection

