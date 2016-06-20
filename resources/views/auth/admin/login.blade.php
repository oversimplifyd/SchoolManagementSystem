@extends('auth.layout')

@section('login-form')

    <form class="form-login" role="form" method="POST" action="{{ url('/admin/login') }}">
        <h2 style="background-color: #CC6633" class="form-login-heading">ADMIN LOGIN</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}"
                   autofocus>
            <br>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <br>
            <button style="background-color: #CC6633" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </div>
    </form>
@endsection