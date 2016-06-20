<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <script>window.jQuery || document.write('<script src="//code.jquery.com/jquery-1.11.2.min.js">\x3C/script>')</script>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>{!! trans('forum::base.home_title') !!}</title>

    <style>

       #login-tab li a {
           color: white;
       }

    </style>
</head>
<body>

<nav style="background-color: #CC6633;" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="color: white;" class="navbar-brand" href="/">Elihans</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a style="color: white;" href="{{ url('/forum') }}">Home</a></li>
            </ul>

            <ul id="login-tab" class="nav navbar-nav navbar-right">
                {{--@if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a lhref="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif--}}
                @yield('navbar-content')
            </ul>
        </div>
    </div>
</nav>

    <div style="color: #CC6633;" class="container">
        @include('forum::partials.alerts')

        @yield('content')
    </div>

    <script>

    $('a[data-confirm]').click(function(event) {
        if (!confirm('{!! trans('forum::base.generic_confirm') !!}')) {
            event.stopImmediatePropagation();
            event.preventDefault();
        }
    });
    $('[data-method]:not(.disabled)').click(function(event) {
        $('<form action="' + $(this).attr('href') + '" method="POST">' +
        '<input type="hidden" name="_method" value="' + $(this).data('method') + '">' +
        '<input type="hidden" name="_token" value="{!! Session::getToken() !!}"' +
        '</form>').submit();
		
        event.preventDefault();
    });
    </script>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
