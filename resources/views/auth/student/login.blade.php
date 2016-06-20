@extends('auth.layout')

@section('login-form')

    <form class="form-login" role="form" method="POST" action="{{ url('/student/login') }}">
        <h2 style="background-color: #CC6633" class="form-login-heading">STUDENT LOGIN</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="Registration Number "
                   autofocus value="{{ old('username') }}">
            <br>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <br>
            <button style="background-color: #CC6633" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>

            <div class="registration">
                Don't have a password yet?<br/>
                <a class="" href="/student/register">
                    Create a password..
                </a>
            </div>

        </div>
    </form>
@endsection
