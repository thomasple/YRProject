<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
		{!! Html::style('css/design.css') !!}
		<!--[if lt IE 9]>
    {{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    {{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->

    <style> textarea {
            resize: none;
        } </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div>{!! Html::image('images/YRLogo.png') !!}</div>
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            @else
                <li><a href="{{ url('/auth/register') }}">Sign up</a></li>
                <li><a href="{{ url('/auth/login') }}">Login <span
                                class="glyphicon glyphicon glyphicon-hand-right"></span></a></li>
            @endif
        </ul>
    </div>
</nav>

@if(!Auth::user())
    <div class="login_roll"
         style="background:url('{{asset('images/login_roll.png')}}') no-repeat; background-size: contain;">
        <a class="btn btn-info btn-lg" role="button" href="{{ url('/auth/login') }}">Login <span
                    class="glyphicon glyphicon glyphicon-hand-right"></span></a>
    </div>
@endif

<section class="body">
    @yield('content')
</section>
</body>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

@yield('script')

</html>