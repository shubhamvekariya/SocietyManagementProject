@extends('layouts.app')

@section('title')
Add Notice
@endsection

@section('breadcrumb-title')
Add Notice
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Notice</strong>
    </li>
@endsection

@section('content')
<div class="ibox-content w-75 my-5 p-5 mx-auto border">
    <form  action="{{route('member.notices.store')}}" method="POST">
        @csrf
        @include('notice.formnotice')

    </form>
</div>
@endsection

