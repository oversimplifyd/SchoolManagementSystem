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
    <h3><i class="fa fa-angle-right"></i> Manage News</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
                <div style="margin-top: 2%">
                    <a class="btn btn-success" href="{{ url('/news/create') }}">Create A News</a>
                </div>

                <div style="margin-top: 5%">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Manage Existing News</h4>
                        <h5>(Choose a Date Range)</h5>
                </div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/news/filtered') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Year</label>
                            <div class="col-md-6">
                                <select name ='news_year_from' class = "form-control">
                                    @foreach(range(15, 50) as $range)
                                        <option value="{{"20".$range}}">{{"20".$range}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Month</label>
                            <div class="col-md-6">
                                <select name ='news_month_from' class = "form-control">
                                    @foreach(Elihans\NewsBoard::$months as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Year</label>
                            <div class="col-md-6">
                                <select name ='news_year_to' class = "form-control">
                                    @foreach(range(15, 50) as $range)
                                        <option value="{{"20".$range}}">{{"20".$range}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Month</label>
                            <div class="col-md-6">
                                <select name ='news_month_to' class = "form-control">
                                    @foreach(Elihans\NewsBoard::$months as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Manage</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{--<a class="btn btn-primary" href="{{ url('/admin/logout') }}">Logout</a>--}}
            </div>
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->

@endsection
