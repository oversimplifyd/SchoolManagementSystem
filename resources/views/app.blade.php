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

        .wrapper.row1 {
            border: 0;
        }

        div.wrapper header nav ul a{
            text-decoration: none;
        }
        
    </style>

    @yield('page-embed-styles')

</head>
<body>

<div class="wrapper row1">
    <header id="header" class="clear">

        <div id="logo" class="fl_left" style="padding: 0; margin: 0;">
            <h1><a href="/"><img src="{{ asset('img/home/logo3.png') }}"></a></h1>
        </div>

        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="/">Home</a></li>
                <li><a href="/page/about"> About Elihans</a></li>
                <li><a href="/page/image-gallery">Gallery</a>
                <li><a href="/forum">Forum</a></li>
                <li><a href="/page/contact">Contact Us</a></li>
            </ul>
        </nav>

    </header>
</div>

@yield('content')


<div class="wrapper row5">
    <div id="copyright" class="clear">

        <p class="fl_left">Copyright &copy; {{ date('Y') }} - All Rights Reserved -www.elihansschool.com.ng</p>
        <p class="fl_right">C</p>

    </div>
</div>


@yield('page-embed-scripts')

</body>
</html>
