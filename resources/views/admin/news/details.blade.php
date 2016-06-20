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
    <h3><i class="fa fa-angle-right"></i> Student's Detail</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            @if ($details)
                @if ( isset($update))
                    <div class="alert alert-success">
                        News successfully updated.
                    </div>
                @else
                    <div class="alert alert-success">
                        News successfully created.
                    </div>
                @endif
                <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn" style="height: 25em">
                        <div class="white-header">
                            <h5>{{$details->title}}</h5>
                        </div>
                        @if($details->featured_image)
                            <p><img src="{{asset('/student_photo/'.$details->featured_image)}}" class="img-circle" width="80"></p>
                        @else
                            <p><img src="{{asset('/student_photo/default.jpg')}}" class="img-circle" width="80"></p>
                        @endif
                        <p><b>{{$details->news}}</b></p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="small mt">STATUS</p>
                                @if ($item->publish == 0 )
                                    <p>
                                        Not Published
                                    </p>
                                @else
                                    <p>
                                        Published
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p class="small mt">Action</p>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/news/publish') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="news_id" value="{{$item->id}}">

                                    @if ($item->publish == 0 )

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
                </div><!-- /col-md-4 -->
            @endif
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
@endsection
