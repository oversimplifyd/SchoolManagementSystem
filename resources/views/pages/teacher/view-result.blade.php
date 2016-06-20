@extends('pages.layout')

@section('page-embed-styles')
    <style>
        .container.well.well-lg {
            padding-top: 1%;
        }

        .container .row .col-sm-8 div.profile-pix h2 {
            color: #000000;
            text-align: center;
            font-weight: bold;
            margin-top: 1em;
        }

        .container .row .col-sm-10 div.detail p {
            color: darkgrey;
            text-align: center;
            font-weight: bold;
        }

        .container .row .col-sm-10 div.detail .panel-body label{
            color: darkgrey;
        }


    </style>
@endsection

@section('profile-link')
    <li><a href="{{ url('/teacher/profile') }}">Home</a></li>
@endsection

@section('logout-link')
    <li><a style="color: #ffffff;" href="/teacher/logout">Logout</a></li>
@endsection

@section('content')
    <div class="container well well-lg">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="col-sm-8 col-sm-offset-2 detail">
                    <div class="panel-heading">
                        <p>Upload Result Details. PLease do this carefully as results uploaded are not editable. </p>
                    </div>
                    <div class="panel panel-body">
                        <div><p>Current Session: {{$academic_session->current_session}}</P></div>
                        <div><p>Class: {{$teacher->teacherClass->name}} {{$teacher->classType->name}}</p></div>

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('teacher/view-result')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                <input type="hidden" name="class_id" value="{{$teacher->teacherClass->id}}">
                                <input type="hidden" name="class_type_id" value="{{$teacher->classType->id}}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Select Subject</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="subjects" >
                                            @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Select Term</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="term" >
                                            @foreach ($terms as $term)
                                                <option value="{{$term->id}}">{{$term->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </div>
                                </div>
                            </form>
                            <div style="color: black;" class="panel-body">
                                @if (isset($results))
                                    @if ($results->count() > 0)
                                        <div class="content-panel">
                                            <table style="color: black" class="table table-striped table-advance table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Student</th>
                                                    <th> Score</th>
                                                    <th>Grade </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($results as $result)
                                                    <tr>
                                                        <td>{{$result->resultStudent->name}}</td>
                                                        <td>{{$result->score}}</td>
                                                        <td>{{\Elihans\Result::processResult($result->score)}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div>No Results Available.</div>
                                    @endif
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

