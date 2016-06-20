<!DOCTYPE html>
<html>
<head>
    <title>Elihans Schools</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="{{ asset('css/home/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/layout.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('img/home/background.jpg') }}');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .quick-edit {
            background-color: #CC6633;
            border: 0;
            margin-bottom: 0;
        }

        .quick-edit .container-fluid .navbar-header a{
            color: white;
        }

        .quick-edit .container-fluid #bs-example-navbar-collapse-1 ul a{
            color: white;
        }

        h1, h2, h3, h4, h5 {
            color: black;
        }
    </style>

    @yield('page-embed-styles')

</head>
<body>
<nav class="navbar navbar-default quick-edit">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Elihans</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li><a href="{{ url('/student/profile') }}">Home</a></li>--}}
                @yield('profile-link')
            </ul>
            <ul class="nav navbar-nav navbar-right">
                   {{-- <li><a style="color: #ffffff;" href="/student/logout">Logout</a></li>--}}
                @yield('logout-link')
            </ul>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
