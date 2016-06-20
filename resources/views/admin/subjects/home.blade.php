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
        <a class="active" href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Subjects</span>
        </a>
        <ul class="sub">
            <li class="active"><a  href="/subjects">Manage Subjects</a></li>
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
    <h3><i class="fa fa-angle-right"></i> Manage Subjects</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <div style="margin-top: 2%">
                    <a class="btn btn-success" href="{{ url('/subjects/create') }}">Create A New Subject</a
                </div>
                <div style="margin-top: 5%">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Manage Existing Subjects</h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/subjects/filtered') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Class Group</label>
                            <div class="col-md-6">
                                <select name ='group_id' class = "form-control">
                                    @foreach(\Elihans\ClassGroup::all() as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
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
            </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->

@endsection