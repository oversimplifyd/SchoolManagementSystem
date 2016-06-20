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
                    <h1 class="page-header">About </h1>
                </div>
            </div>
            <div class="col-sm-12">
                <p class="text-info">Elihans Nursery and Basic School is the school opened to educate and train the future leaders.
                    Today, there are many mushroom schools existing yet the standard of education is falling daily.
                    But Elihans Nursery and Basic school has always attain for the highest standard and that what set us apart from the rest.
                </p>
                <p class="text-info">
                    The name Elihans implies the name of the Elijah and Hannah, the children of Mr/Mrs Oduwole the proprietor and proprietress of the school.
                </p>
                <p class="text-info">
                    Some of the objectives and aims te setup to achieve are as follows:
                    <ul class="text-info list">
                    <li>To take education to greater height.</li>
                    <li>To groom pupil morally, academically, physically and spiritually for the trophy of success.</li>
                    <li>To provide dynamic and qualitative education which will be affordable for the reach of the people.</li>
                    <li>To produce respectful, confident and proficient pupils that will be build the nation.</li>
                    <li>To incorporate ICT into the learning curricula of pupil from an early age.</li>
                </ul>
                </p>
            </div>
            <div>

            </div>

        </div>
    </div>
@endsection