<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elihans Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/theme/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lineicons/style.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/theme/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme/style-responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="/" class="logo"><b>DASHBOARD</b></a>

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="/admin/logout">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                {{--<p class="centered"><a href="#"><img src="{{ asset('img/theme/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>--}}
                <h5 class="centered">Welcome!!</h5>
                @yield('admin-left-menu')
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('admin-main-content')
        </section>
    </section>

</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/theme/jquery.js') }}"></script>
<script src="{{ asset('js/theme/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('js/theme/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('js/theme/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/theme/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/theme/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/theme/jquery.sparkline.js') }}"></script>


<!--common script for all pages-->
<script src="{{ asset('js/theme/common-scripts.js') }}"></script>

@yield('other-scripts')
</body>
</html>
