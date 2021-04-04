@extends('layouts.app')
@section('title')
member Page
@endsection


@section('breadcrumb-title')
    Welcome member
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
        <h3 class="font-bold">member Page</h3>
        <div class="error-desc">
            You can create here any grid layout you want. And any variation layout you imagine:) Check out
            main dashboard and other site. It use many different layout.
            <br/><a href="{{ route('Home') }}" class="btn btn-primary m-t">Dashboard</a>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(function() {
            $('.dashboard').addClass('active');
        });
    </script>
@endpush
