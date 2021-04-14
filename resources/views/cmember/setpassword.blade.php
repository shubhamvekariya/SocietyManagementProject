@extends('auth.default')

@section('title')
    Set password
@endsection

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">AP+</h1>
        </div>
        <h2 class="font-weight-bold">Set New Password</h2>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <strong class="float-left">Error!</strong>
                <br>
                <ul class="text-left">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($error = Session::get('danger'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <strong>{{ $error }}</strong>
            </div>
        @endif
        <form class="m-t" role="form" action="@if (Request::segment(2) == 'society') {{ route('society.setpassword') }} @elseif (Request::segment(2) == 'member') {{ route('member.setpassword') }} @else {{ route('staff.setpassword') }} @endif" method="POST">
            @csrf
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Set password</button>

        </form>
        <p class="m-t"> <small>Work with appartment manangement &copy; 2021</small> </p>
    </div>
</div>
@endsection
