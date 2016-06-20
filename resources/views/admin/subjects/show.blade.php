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
    <h3><i class="fa fa-angle-right"></i> Subject's Detail</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            @if ($subject)
                <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn" style="height: 25em">
                        <div class="white-header">
                            Info:
                        </div>
                        <p><b>{{$subject->name}}</b></p>
                        <p><b>{{$subject->classGroup->name}}</b></p>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('subjects/'.$subject->id) }}">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <a class="btn btn-success" href="{{ url('/subjects/'.$subject->id.'/edit') }}">Edit</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            {{--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->
            @endif
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
@endsection