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
    <link rel='stylesheet'
          href='//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css'/>
    <link rel="shortcut icon" href="{{ url('/images/favicon.png') }}"/>

    <style> textarea {
            resize: none;
        }

        .charging {
            background: rgba(0, 0, 0, .5) url({{ url('/images/ajax-loader.gif') }}) 50% 50% no-repeat;
        }
    </style>
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
            @if(Auth::user() AND Auth::user()->admin)
                <li>
                    <a href="{{ url('/administrator') }}">Administration</a>
                </li>
            @endif
            @if(Auth::user() AND Auth::user()->salon_owner)
                <li>
                    <a href="{{ url('/owner/salon-configuration') }}">Salon configuration</a>
                </li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                @if(Auth::user()->salon_owner)
                    <li><a href="{{ url('/salon/create') }}">Create a business</a></li>
                @endif
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            @else
                <li><a href="{{ url('/auth/register') }}">Sign up</a></li>
                <li><a href="{{ url('/auth/login') }}">Login <span
                                class="glyphicon glyphicon glyphicon-hand-right"></span></a></li>
            @endif
        </ul>
    </div>
</nav>

{{--@if(!Auth::user())
    <div class="login_roll"
         style="background:url('{{asset('images/login_roll.png')}}') no-repeat; background-size: contain;">
        <a class="btn btn-info btn-lg" role="button" href="{{ url('/auth/login') }}">Login <span
                    class="glyphicon glyphicon glyphicon-hand-right"></span></a>
    </div>
@endif--}}
@if(Auth::user() AND session()->has('salon_chosen') AND session('salon_chosen')!=null AND session('nb_salons')>1)
    <div class="login_roll chosen_salon">
        You are configuring salon :<br/> {{ session('salon_chosen_name') }}
        <a href="{{ url('/change_salon') }}">Change salon</a>
    </div>
@endif

<div class="body">
    @yield('content')
</div>


<div id="footer">
    <footer>
        <div class="container">
            <p class="text-muted credit">
            <h4>ABOUT</h4>
            Sed viverra efficitur nulla, semper pharetra nibh placerat a. Cras blandit, sapien nec posuere scelerisque,
            diam
            nisi gravida dolor, eu scelerisque leo est non odio. Lorem ipsum dolor sit amet, consectetur adipiscing
            elit.
            Etiam fermentum euismod accumsan. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
            inceptos himenaeos. Curabitur ac libero id tortor sagittis mattis. Ut eu nulla nulla. Nunc ut erat nec ex
            cursus
            imperdiet. Sed rhoncus erat nec blandit tempus.
            <ul id="footerUl" class="siteFooterSection">
                <li role="contentinfo">&copy; 2015 YRProject, Inc. All rights reserved.</li>
                <li><a href="#">FIND</a></li>
                @if(Auth::user())
                    <li><a href="{{ url('/salon/create') }}">CREATE YOUR OWN BUSINESS</a></li>
                    <li><a href="{{ url('/auth/logout') }}">LOGOUT</a></li>
                @else
                    <li><a href="{{ url('/auth/login') }}">LOGIN</a></li>
                    <li><a href="{{ url('/auth/register') }}">SIGN UP</a></li>
                @endif
                <li><a href="#">JOBS</a></li>
                <li><a href="#" class="last">CONTACT</a></li>
            </ul>
            </p>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@yield('script')
</body>
</html>