@extends('templates/main')

@section('title')
    YRProject
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body" style="text-align:left;">
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
@endsection