@extends('layouts.app')

@section('title')
Edit Meeting
@endsection

@section('breadcrumb-title')
    Edit Meeting
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Meeting</strong>
    </li>
@endsection

@section('content')
<div class="ibox-content w-75 my-5 p-5 mx-auto border">
    <form  action="{{route('society.meetings.update',$meeting->id)}}" method="POST">
        @csrf
        @method('put')
        @include('society.formmeeting')

    </form>
</div>
@endsection
