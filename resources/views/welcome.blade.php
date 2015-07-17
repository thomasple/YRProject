@extends('templates/main')

@section('title')
    YRProject
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome to YR Project!</h1>

            <p>Hello @if(Auth::user()) {{Auth::user()->first_name}} @else guest @endif !
                @if(session()->has('confirmed') AND session('confirmed'))
                    You have confirmed your password.
                @endif
            </p>
        </div>
    </div>
@endsection