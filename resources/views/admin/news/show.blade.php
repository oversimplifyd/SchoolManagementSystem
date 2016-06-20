@extends('admin.layout')

@section('admin-left-menu')
    <li class="mt">
        <a href="/admin/dashboard">
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
            <li><a href="/students">Manage Students</a></li>
            <li><a  href="/teachers">Manage Teachers</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a class="active" href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Newsboard</span>
        </a>

        <ul class="sub">
            <li class="active"><a  href="/news">Manage News</a></li>
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
    </li>
@endsection

@section('admin-main-content')
    <h3><i class="fa fa-angle-right"></i> News Detail</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            @if ($news)
                @if ( isset($update))
                    <div class="alert alert-success">
                        News successfully updated.
                    </div>
                @endif
                <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn" style="height: auto">
                        <div class="white-header">
                            <h5>{{$news->title}}</h5>
                        </div>
                        <div class="row">

                            <div class="col-md-10 col-md-offset-1">
                                @if($news->featured_image)
                                    <p><img src="{{asset('news_images/'.$news->featured_image)}}"></p>
                                @else
                                    <p><img src="{{asset('news_images/default.jpg')}}"></p>
                                @endif
                            </div>

                            <div class="col-md-10 col-md-offset-1">
                                <p><b>{{$news->news}}</b></p>
                            </div>

                            <div class="col-md-6 col-md-offset-3">
                                <div style="width: 85%; align-content: center">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/news/publish') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="news_id" value="{{$news->id}}">

                                        @if ($news->publish == 0 )

                                            <input type="hidden" name="publish" value="{{1}}">

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-success">Publish</button>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="publish" value="{{0}}">

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-danger">Unpublish</button>
                                                </div>
                                            </div>

                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->
            @endif
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
@endsection
