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

       .container .row .col-sm-8 div.profile-pix {
           padding: 1em;
       }

       .container .row .col-sm-10 {
           margin-bottom: 0;;
       }

       .container .row .col-sm-10.links {
           margin-top: 0;
           background-color: inherit;
           border: 0;
       }

       .container .row .col-sm-10.links div a {
           border: 0;
       }

       .container .row .col-sm-10 div.detail p {
           color: darkgrey;
           text-align: center;
           font-weight: bold;
       }

   </style>
@endsection

@section('profile-link')
    <li><a href="{{ url('/student/profile') }}">Home</a></li>
@endsection

@section('logout-link')
    <li><a style="color: #ffffff;" href="/student/logout">Logout</a></li>
@endsection

@section('content')
    <div class="container well well-lg">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-sm-4 col-sm-offset-4 profile-pix">
                    <img src="{{asset('/student_photo/'.$student->profile_pix)}}" class="img-circle">
                    <h2>{{$student->name}} </h2>
                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1">
                <div class="col-sm-8 col-sm-offset-2 detail">
                    <div class="panel-heading">
                        <p>Other Details </p>
                    </div>
                    <div class="panel panel-body">
                        <p>Gender: {{$student->gender}}</p>
                        <p>Reg. No. : {{$student->student_reg}}</p>
                        <p>Class: {{$student->studentClass->name}} {{$student->classType->name}}</p>
                        <p>Phone: {{$student->phone}} </p>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1 links">
                <div style=" margin: 2%; text-align: center;">
                    <a href="/student/edit-profile/{{$student->id}}" class="btn btn-primary">Edit Profile</a>
                    <a href="/student/view-result" class="btn btn-success">View Result</a>
                    <a class="btn btn-danger" href="/student/payment">Pay School Fees</a>
                </div>
            </div>
        </div>
    </div>
@endsection
