<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
		{!! Html::style('css/design_white.css') !!}
		<!--[if lt IE 9]>
    {{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    {{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css"/>
    <link rel='stylesheet'
          href='//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css'/>
    <link rel="shortcut icon" href="{{ url('/images/favicon.png') }}"/>

    <style> textarea {
            resize: none;
        }

        .charging {
            background: rgba(0, 0, 0, .5) url("{{ url('/images/ajax-loader.gif') }}") 50% 50% no-repeat;
        }
    </style>
</head>
<body>

@if(Auth::user() AND (Auth::user()->salon_owner OR Auth::user()->admin))
    <div class="btn_panel admin_toggle close" style="margin:0;opacity:1;text-shadow: none;"><a><span
                    class="glyphicon glyphicon-wrench"></span></a></div>

    <div id="admin_panel" class="mCustomScrollbar" data-mcs-theme="minimal">
        <div class="close admin_toggle"><a><span class="glyphicon glyphicon-menu-left"></span></a></div>
        <div class="content_panel">
            <li style="padding-left:7px;color:green;"><span style="color:#9b9a96">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</span></li>
            <h2 style="padding-left: 3%;">Configuration</h2>
            @if(Auth::user()->salon_owner)
                @if(session()->has('salon_chosen') AND session('salon_chosen')!=null)
                    <div class="panel-heading" id="heading2" style="background-color:#6398C6">
                        <a href="#item2" data-toggle="collapse"><span class="glyphicon glyphicon-wrench"
                                                                      style="font-size:0.7em"></span> {{ session('salon_chosen_name') }}
                        </a>
                    </div>
                    <div id="item2"
                         class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul>
                                <li>
                                    <a href="{{ url('/salon/'.session('salon_chosen').'/edit') }}">Edit salon
                                        properties</a>
                                </li>
                                <li>
                                    <a href="{{ url('/artisan') }}">Configure artisans</a>
                                </li>
                                <li>
                                    <a href="{{ url('/service') }}">Configure services</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
                <br/>

                <div class="panel-heading" id="heading1"
                     @if(!(session()->has('salon_chosen') OR session('salon_chosen')!=null)) style="background-color:#6398C6" @endif>
                    <a href="#item1" data-toggle="collapse"><span class="glyphicon glyphicon-menu-hamburger"
                                                                  style="font-size:0.7em"></span> CHOOSE A SALON</a>
                </div>
                <div id="item1"
                     class="panel-collapse collapse @if(!(session()->has('salon_chosen') AND session('salon_chosen')!=null)) in @endif">
                    <div class="panel-body">
                        <ul>
                            @foreach(Auth::user()->salons as $salon)
                                <li>
                                    <a
                                        @if(session()->has('salon_chosen') AND session('salon_chosen')==$salon->id)
                                            >
                                            <span class="glyphicon glyphicon-triangle-right"></span>
                                            @else
                                        href="{{ url('/confirm-salon/'.$salon->id) }}">
                                        @endif
                                        {{ $salon->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ url('/salon/create') }}"><span class="glyphicon glyphicon-plus"></span>
                                    Create a salon</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            @if(Auth::user()->admin)
                <br/>
                <div class="panel-heading" id="heading3" style="background-color:#6398C6">
                    <a href="#item3" data-toggle="collapse"><span class="glyphicon glyphicon-menu-hamburger"
                                                                  style="font-size:0.7em"></span> ADMINISTRATION
                    </a>
                </div>
                <div id="item3"
                     class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <a href="{{ url('/salon/') }}">Salons management</a>
                            </li>
                            <li>
                                <a href="{{ url('/administrators') }}">Users management</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>
    </div>
    </div>
@endif

{{--@if(!Auth::user())
    <div class="login_roll"
         style="background:url('{{asset('images/login_roll.png')}}') no-repeat; background-size: contain;">
        <a class="btn btn-info btn-lg" role="button" href="{{ url('/auth/login') }}">Login <span
                    class="glyphicon glyphicon glyphicon-hand-right"></span></a>
    </div>
@endif--}}
{{--@if(Auth::user() AND session()->has('salon_chosen') AND session('salon_chosen')!=null AND session('nb_salons')>1)
    <div class="login_roll chosen_salon">
        You are configuring salon :<br/> {{ session('salon_chosen_name') }}
        <a href="{{ url('/change_salon') }}">Change salon</a>
    </div>
@endif--}}
<div id="wrap">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="padding-right:20px;margin-top:15px;padding-top:0;font-size: 1.3em;">
                    <span class="glyphicon glyphicon-menu-hamburger"> </span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div>{!! Html::image('images/YRLogo.png', 'Logo', ['height'=>'27px']) !!}</div>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    {{--<li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>--}}
                    {{--@if(Auth::user() AND Auth::user()->admin)
                        <li>
                            <a href="{{ url('/administrator') }}">Administration</a>
                        </li>
                    @endif--}}
                    <li>
                        <a href="{{ url('/search') }}">SEARCH</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user())
                        {{--@if(Auth::user()->salon_owner)
                            <li><a href="{{ url('/salon/create') }}">Create a business</a></li>
                        @endif--}}
                        <li><a href="#" class="logout">Account</a></li>
                        <li><a href="{{ url('/auth/logout') }}" class="logout">Logout</a></li>
                    @else
                        <li><a href="{{ url('/auth/register') }}">Sign up</a></li>
                        <li><a href="{{ url('/auth/login') }}">Log in </a></li>
                    @endif

                </ul>
                {{--{!! Html::image('images/separator.png', 'separator', ['width'=>'100.5%']) !!}--}}
            </div>
        </div>
    </nav>

    <div class="body">

        @yield('content')
    </div>


    <div id="footer">
        <footer>
            <div class="container">
                <p class="text-muted credit">
                <h4>ABOUT</h4>
                Sed viverra efficitur nulla, semper pharetra nibh placerat a. Cras blandit, sapien nec posuere
                scelerisque,
                diam
                nisi gravida dolor, eu scelerisque leo est non odio. Lorem ipsum dolor sit amet, consectetur adipiscing
                elit.
                Etiam fermentum euismod accumsan. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                per
                inceptos himenaeos. Curabitur ac libero id tortor sagittis mattis. Ut eu nulla nulla. Nunc ut erat nec
                ex
                cursus
                imperdiet. Sed rhoncus erat nec blandit tempus.
                <ul id="footerUl" class="siteFooterSection">
                    <li role="contentinfo">&copy; 2015 BookUR, Inc. All rights reserved.</li>
                    <li><a href="{{ url('/search') }}">SEARCH</a></li>
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
</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script src="//cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
    $.webshims.formcfg = {
        en: {
            dFormat: '/',
            dateSigns: '/',
            patterns: {
                d: "dd/mm/yy"
            }
        }
    };
</script>
<script>
    $(function () {
        $('.admin_toggle').click(function () {
            $('#admin_panel').animate({width: 'toggle'}, 330);
        });
        $("#item1").on("show.bs.collapse", function () {
            $("#heading1").attr('style', 'background-color:#6398C6');
        }).on("hide.bs.collapse", function () {
            $("#heading1").removeAttr('style');
        });
        $("#item2").on("show.bs.collapse", function () {
            $("#heading2").attr('style', 'background-color:#6398C6');
        }).on("hide.bs.collapse", function () {
            $("#heading2").removeAttr('style');
        });
        $("#item3").on("show.bs.collapse", function () {
            $("#heading3").attr('style', 'background-color:#6398C6');
        }).on("hide.bs.collapse", function () {
            $("#heading3").removeAttr('style');
        });
        $('#wrap').click(function () {
            $('#admin_panel').animate({width: '0'}, 330, function () {
                document.getElementById("admin_panel").style.width = null;
                document.getElementById("admin_panel").style.display = null;
                self.location.hash = '';
            });
        });
    });
</script>
@yield('script')
</body>
</html>