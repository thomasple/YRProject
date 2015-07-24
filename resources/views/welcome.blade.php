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
                @if(session()->has('salon_chosen') AND session('salon_chosen')!=null)
                    You have chosen salon : {{ session('salon_chosen_name') }}
                @endif
            </p>
        </div>
    </div>
@endsection