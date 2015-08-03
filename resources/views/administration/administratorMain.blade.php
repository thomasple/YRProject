@extends('templates/main')

@section('title')
    Administration
@stop

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Administration : main menu</h1>
        <br/>

        <p><a href="{{ url('/salon') }}" class="btn btn-success btn-block">Salons management</a></p>

        <p><a href="{{ url('/administrators') }}" class="btn btn-success btn-block">Users management</a></p>
    </div>
@stop