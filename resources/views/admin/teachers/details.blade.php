@extends('admin.layout')

@section('admin-left-menu')
    <li class="mt">
        <a href="/admin/dashboard">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a class="active" href="javascript:;" >
            <i class="fa fa-book"></i>
            <span>Accounts</span>
        </a>

        <ul class="sub">
            <li><a href="/students">Manage Students</a></li>
            <li class="active"><a  href="/teachers">Manage Teachers</a></li>
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
    </li>
@endsection

@section('admin-main-content')
    <h3><i class="fa fa-angle-right"></i> Teacher's Detail</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            @if ($details)
                @if ( isset($update))
                    <div class="alert alert-success">
                        Teacher's Detail successfully updated.
                    </div>
                @else
                    <div class="alert alert-success">
                        Teacher successfully created.
                    </div>
                @endif
                <div class="col-lg-10 col-lg-offset-1  col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn" style="height:26em">
                        <div class="white-header">
                            <h5>{{$details->teacher_reg}}</h5>
                        </div>
                        <p><img src="{{asset('/teacher_photo/'.$details->profile_pix)}}" class="img-circle" width="80"></p>
                        <p><b>{{$details->name}}</b></p>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="small mt">GENDER</p>
                                <p>{{$details->gender}}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="small mt">CLASS</p>
                                <p>{{$details->teacherClass->name}} {{$details->classType->name}}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="small mt">ADDRESS</p>
                                <p>{{$details->address}}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="small mt">PHONE</p>
                                <p>{{$details->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->
            @endif
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
@endsection