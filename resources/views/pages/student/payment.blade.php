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

        .container .row .col-sm-10 {
            margin-bottom: 0;;
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
            <div class="col-sm-10 col-sm-offset-1">
                <div class="col-sm-8 col-sm-offset-2 detail">
                    <div class="panel-heading"><p>Pay School Fees </p></div>
                    <div class="panel panel-body">
                        <p>Still Working.... <a class="btn btn-success" href="/student/profile"> Go To Profile</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
