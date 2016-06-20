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
    <h3><i class="fa fa-angle-right"></i> News</h3>

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
                        <th>Status</th>
                        <th> Created</th>
                        <th>Updated </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($news)
                        @foreach($news as $item)
                            <tr>
                                <td>{{ str_limit($item->title, $limit = 50, $end = "...")}}</td>
                                @if ($item->publish == 0 )
                                        <td>Not Published</td>
                                @else
                                        <td>Published</td>
                                @endif
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                <td>{{$item->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="{{ url('/news/'.$item->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-xs" href="{{ url('/news/'.$item->id.'/edit') }}"><i class="fa fa-pencil"></i></a>
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
