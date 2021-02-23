@extends('auth.default')

@section('title')
    Login
@endsection

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">AP+</h1>

        </div>
        <h3>Welcome to AP+</h3>
        <h2 class="font-weight-bold">Login in</h2>
        @if ($error = Session::get('danger'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <strong>{{ $error }}</strong>
            </div>
        @endif
        <form class="m-t" role="form" action="{{ route('login.society') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ route('register.society') }}">Create an account</a>
        </form>
        <p class="m-t"> <small>Work with appartment manangement &copy; 2021</small> </p>
    </div>
</div>
@endsection