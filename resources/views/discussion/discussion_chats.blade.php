@extends('layouts.app')
@section('title')
    Discussion - {{ $discussion->title }}
@endsection

@section('breadcrumb-title')
    Discussion - {{ $discussion->title }}
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('member.discussion.index') }}">Discussion</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>{{ $discussion->title }}</strong>
    </li>
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <strong>{{ $discussion->title }} </strong> {{ $discussion->description }}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <chats :user="{{ Auth::user() }}" :discussion="{{ $discussion }}"></chats>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $(function() {
            $('.discussion').addClass('active');
        });
    </script>
@endpush
