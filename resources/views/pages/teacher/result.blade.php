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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {{$errors->first()}}
                            </div>
                        @endif
                        @if (session('result_uploaded'))
                            <div class="alert alert-success">
                                {{ session('result_uploaded') }} <a href="{{url(
                                'teacher/view-result')}}">You May View Result Here</a>
                            </div>
                        @endif

                        <div><p>Current Session: {{$academic_session->current_session}}</P></div>
                        <div><p>Class: {{$teacher->teacherClass->name}} {{$teacher->classType->name}}</p></div>

                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                              action="{{ url('teacher/result')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                            <input type="hidden" name="class_id" value="{{$teacher->teacherClass->id}}">
                            <input type="hidden" name="class_type_id" value="{{$teacher->classType->id}}">
                            <input type="hidden" name="academic_session" value="{{$academic_session->current_session}}">

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

                            @foreach($students as $student)
                                <div class="form-group">
                                    <label class="col-md-8 control-label">{{$student->name}}</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="score{{$student->id}}" value="{{old('score'.$student->id)}}">
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    {{--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

