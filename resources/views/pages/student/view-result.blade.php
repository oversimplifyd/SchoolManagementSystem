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
                    <div class="panel-heading"><p>Result </p></div>
                    <div class="panel panel-body">
                        @if (isset($results))
                            @if ($results->count() > 0)
                                <div class="content-panel">
                                    <table style="color: black" class="table table-striped table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th> Grade</th>
                                            <th>Term </th>
                                            <th>Session </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($results as $result)
                                                <tr>
                                                    <td>{{$result->resultSubject->name}}</td>
                                                    <td>{{\Elihans\Result::processResult($result->score)}}</td>
                                                    <td>{{$result->resultTerm->name}}</td>
                                                    <td>{{$result->session}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>There are no results available. for the moment.. <a class="btn btn-success" href="/student/profile">Go To Profile</a></p>

                            @endif
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
