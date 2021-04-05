@extends('layouts.app')
@section('title')
Society Page
@endsection
@push('css')
    <link href="{{ mix('/css/toastr.min.css') }}" rel="stylesheet">
@endpush


@section('breadcrumb-title')
    Welcome secretary
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item active">
        <strong>Home</strong>
    </li>
@endsection

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ session()->get('success') }}</strong>
    </div>
@endif

<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Secretary</h3>
        <div class="error-desc">
            The Secretary is responsible for:-<br>
            1.Ensuring meetings are effectively organised and minuted.<br>
            2.Maintaining effective records and administration.
            <br/><a href="{{ route('Home') }}" class="btn btn-primary m-t">Home</a>
        </div>
    </div>
</div>
@endsection

