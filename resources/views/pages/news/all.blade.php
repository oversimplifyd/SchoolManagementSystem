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

        .row .col-sm-12 a {
            text-decoration: none;
            color: #CC6633;
        }

        .row .col-sm-12 a:hover {
            color: grey;
        }

        .row .col-sm-12 p {
            font-size: small;
            margin-top: 1em;;
            text-align: right;;
        }

    </style>
@endsection

@section('content')
    <div class="container well well-lg">
        <div class="row">
            @foreach($news as $item)
                <div class="col-sm-12">
                    <h1><a href="/page/show-news/{{$item->id}}">{{$item->title}}</a></h1>
                    {{str_limit($item->news, $limit = 200, $end = "...")}}
                    <p> Created: {{$item->created_at->diffForHumans()}}</p>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection