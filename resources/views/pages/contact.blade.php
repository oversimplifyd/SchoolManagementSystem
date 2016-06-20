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
                    <h1>Contact Us: </h1>
                </div>
            </div>
            <div class="col-sm-12">
                @if (session('message_sent'))
                    <div class="alert alert-success">
                        {{ session('message_sent') }}
                    </div>
                @endif
                <form class="form hide-me" action="/page/email" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="group">
                        <label for="name-organization">
                            Name / Organization *
                        </label>
                        <input type="text" name="name" id="name-organization" placeholder="Tunde Ola Plc" required>
                    </div>

                    <div class="group">
                        <label for="contact-num">
                            Contact Number *
                        </label>
                        <input type="text" name="contact-num" id="contact-num" placeholder="08087987865" required>
                    </div>

                    <div class="group">
                        <label for="message">
                            Message *
                        </label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Leave a comment or an enquiry" required></textarea>
                    </div>

                    <div class="group">
                        <button type="submit">
                            <span class="fa fa-send"></span> Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection