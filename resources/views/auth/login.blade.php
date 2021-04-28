@extends('auth.default')

@section('title')
    Login
@endsection

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">ISC+</h1>

            </div>
            <h3>Welcome to ISC+</h3>
            <h2 class="font-weight-bold">Login in</h2>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <strong class="float-left">Error!</strong>
                    <br>
                    <ul class="text-left">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
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
            <form class="m-t" role="form" action="@if (Request::segment(2)=='society' ) {{ route('login.society') }} @elseif (Request::segment(2) == 'staff')  {{ route('login.staff') }} @else {{ route('login.member') }} @endif" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a data-toggle="modal" href="#forgotpassword"><small>Forgot password?</small></a>
                @if (Request::segment(2) != 'staff')
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="@if (Request::segment(2)=='society' ) {{ route('register.society') }} @else {{ route('register.member') }} @endif">Create an account</a>
                @endif
            </form>
            <p class="m-t"> <small>Work with appartment manangement &copy; 2021</small> </p>
        </div>
    </div>

    <div class="modal inmodal" id="forgotpassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title">Forgot Password</h4>

                </div>
                <form action="@if (Request::segment(2)=='society' ) {{ route('forgot.society') }} @elseif (Request::segment(2) == 'staff')  {{ route('forgot.staff') }} @else {{ route('forgot.member') }} @endif" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="font-normal col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-8">

                                <input id="email" name="email" type="email" class="form-control" placeholder="Email"
                                    value=''>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Random Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
