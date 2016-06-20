@extends('admin.layout')
@section('admin-left-menu')
    <li class="mt">
        <a class="active" href="/admin/dashboard">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-book"></i>
            <span>Accounts</span>
        </a>

        <ul class="sub">
            <li><a  href="/students">Manage Students</a></li>
            <li><a  href="/teachers">Manage Teachers</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Newsboard</span>
        </a>
        <ul class="sub">
            <li><a  href="/news">Manage News</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Gallery</span>
        </a>
        <ul class="sub">
            <li><a  href="/photo">Manage Photos</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Subjects</span>
        </a>
        <ul class="sub">
            <li><a  href="/subjects">Manage Subjects</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-th"></i>
            <span>Sessions</span>
        </a>
        <ul class="sub">
            <li><a  href="/session">Manage Sessions</a></li>
        </ul>
    </li
@endsection

@section('admin-main-content')
    <div class="row">
        <div class="col-lg-11 main-chart">

            <div class="row mtbox">
                <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 box0">
                    <div class="box1">
                        <span class="li_user"></span>
                        <h3>{{ $count = \Elihans\Student::all()->count()}}</h3>
                    </div>
                    <p>There are {{$count}} Registered Students.</p>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 box0">
                    <div class="box1">
                        <span class="li_user"></span>
                        <h3>{{$count2 = \Elihans\Teacher::all()->count()}}</h3>
                    </div>
                    <p>There are {{$count2}} registered Teachers.</p>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 box0">
                    <div class="box1">
                        <span class="li_news"></span>
                        <h3>{{ $count3 = \Elihans\NewsBoard::all()->count()}}</h3>
                    </div>
                    <p>There are over {{$count3}} posts.</p>
                </div>

                <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 box0">
                    <div class="box1">
                        <span class="li_note"></span>
                        <h3>Session</h3>
                    </div>
                    <p>The current Session is 2016/2016.</p>
                </div>

            </div><!-- /row mt -->


            <div class="row mt" style="margin-left: 5em">
                <!-- SERVER STATUS PANELS -->
                <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn donut-chart">
                        <div class="white-header">
                            <h5>Accounts</h5>
                        </div>
                        <div class="row" >
                            <div style="padding: 2em; font-size: large">
                                <p>This section allows you create new accounts and manage existing accounts</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4-->


                <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h5>Newsboard</h5>
                        </div>
                        <div class="row">
                            <div style="padding: 2em; font-size: large">
                                <p>You can create fresh news and manage existing news in this sectioin.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->

                <div class="col-md-4 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h5>Session</h5>
                        </div>
                        <div class="row">
                            <div style="padding: 2em; font-size: large">
                                <p>Sessions can be managed here. Care must be taken when managing sessions. A change in session</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->
            </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </div>
@endsection