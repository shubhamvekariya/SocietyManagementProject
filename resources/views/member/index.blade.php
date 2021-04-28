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
            <h3 class="font-bold">Member</h3>
            <div class="error-desc">
                A Member of a Society has the following duties:-<br>
                1. He has the duty to work to fulfill the objectives of the society.<br>
                2. He has to attend the meetings held in the society regularly.

                <br /><a href="{{ route('Home') }}" class="btn btn-primary m-t">Home</a>
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
