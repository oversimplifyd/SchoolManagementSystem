@extends('auth.layout')

@section('login-form')

    <form class="form-login" role="form" method="POST" action="{{ url('/guardian/login') }}">
        <h2 style="background-color: #CC6633" class="form-login-heading">GUARDIAN LOGIN</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="username "
                   autofocus value="{{ old('username') }}">
            <br>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <br>
            <button style="background-color: #CC6633" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>

            <div class="registration">
                Not Registered? <br/>
                <a class="" href="/guardian/register">
                    Register Here..
                </a>
            </div>

        </div>
    </form>
@endsection
