@extends('app')

@section('page-embed-styles')
    <style>
        .container {
            color: black;
            padding: 5%;
        }

        h1 {
            text-transform: uppercase;
            font-size: x-large;
            font-weight: bold;
        }

        .center {
            align-content: center;
            margin-bottom: 2em;
        }

    </style>
@endsection

@section('content')
    <div class="container well well-lg">
        <div class="row">
            <div class="col-sm-12">
                <div class="center">
                    <h1>{{$news->title}}</h1>
                    <hr>
                    <img src="{{asset('news_images/'.$news->featured_image)}}">
                </div>
            </div>
            <div class="col-sm-12">
                {{$news->news}}
            </div>
        </div>
    </div>
@endsection