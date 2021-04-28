@extends('layouts.app')

@section('title')
    Add Notice
@endsection

@section('breadcrumb-title')
    Add Notice
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Notice</strong>
    </li>
@endsection

@section('content')
    <div class="wrapper wrapper-content mt-0">
        <div class="ibox-content w-75 my-5 p-5 mx-auto border">
            <form action="{{ route('member.notices.store') }}" method="POST">
                @csrf
                @include('notice.formnotice')

            </form>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(function() {
            $('.notice').addClass('active');
            $('.notice ul').addClass('in');
            $('.notice ul li:nth-child(1)').addClass('active');
        });

    </script>
@endpush
