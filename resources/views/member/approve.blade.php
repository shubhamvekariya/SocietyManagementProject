@extends('auth.default')
@section('title')
Member Approval Page
@endsection

@section('content')
<div class="middle-box text-center animated fadeInDown">
    <h1><i class="fa fa-clock-o" aria-hidden="true"></i> </h1>
    <h3 class="font-bold">Waiting for approval</h3>

    <div class="error-desc">
        Your account is waiting for your secretary approval.
        <br/>
        You can go back to main page:
        <br/>
        <div class="row">
            <div class="col-6">
                <a href="{{ route('logout') }}" class="btn btn-primary m-t float-right">Logout</a>
            </div>
            <div class="col-6 ">
                <a href="{{ route('Home') }}" class="btn btn-primary m-t float-left">Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
