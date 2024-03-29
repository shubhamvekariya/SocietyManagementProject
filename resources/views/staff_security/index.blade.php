@extends('layouts.app')
@section('title')
    Society Page
@endsection
@push('css')
    <link href="{{ mix('/css/toastr.min.css') }}" rel="stylesheet">
@endpush
@section('content')

@section('breadcrumb-title')
    Welcome staff
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item active">
        <strong>Home</strong>
    </li>
@endsection

<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Staff Page</h3>
        <div class="error-desc">
            You can create here any grid layout you want. And any variation layout you imagine:) Check out
            main dashboard and other site. It use many different layout.
            <br /><a href="{{ route('Home') }}" class="btn btn-primary m-t">Dashboard</a>
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
