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
        <a class="active" href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Gallery</span>
        </a>
        <ul class="sub">
            <li class="active"><a  href="/photo">Manage Photos</a></li>
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
    <h3><i class="fa fa-angle-right"></i> Photos</h3>

    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    {{--<h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
                    <hr>--}}
                    <thead>
                    <tr>
                        <th><i class="fa fa-hacker-news"></i> Title</th>
                        <th>Photo</th>
                        <th> Created</th>
                        <th>Updated </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($images)
                        @foreach($images as $item)
                            <tr>
                                <td>{{ str_limit($item->title, $limit = 30, $end = "...")}}</td>
                                <td><img src="{{asset('gallery/'.$item->image)}}" class="img-circle" width="50"></td>
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                <td>{{$item->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('photo/'.$item->id) }}">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <a class="btn btn-success btn-xs" href="{{ url('/photo/'.$item->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{{ url('/photo/'.$item->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
@endsection

