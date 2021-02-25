@extends('layouts.app')
@section('title')
Society Page
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Home Page</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('society.home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>@role('secretary','society')
                    I'm a secretary!
                @else
                    I'm not a secretary...
                @endrole</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Society Page</h3>
        <div class="error-desc">
            You can create here any grid layout you want. And any variation layout you imagine:) Check out
            main dashboard and other site. It use many different layout.
            <br/><a href="{{ route('Home') }}" class="btn btn-primary m-t">Dashboard</a>
        </div>
    </div>
</div>
@endsection
