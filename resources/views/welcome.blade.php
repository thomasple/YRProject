@extends('templates/main')

@section('title')
    YRProject
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12"
         id="register_body" style="text-align:left;">
            <h1>Welcome to BookUR Project!</h1>

            <p>Привет @if(Auth::user()) {{Auth::user()->first_name}} @else guest @endif!</p>
    </div>
@endsection