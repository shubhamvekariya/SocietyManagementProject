@extends('layouts.app')

@section('title')
Add Family Member
@endsection

@section('breadcrumb-title')
Add Family Member
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Family Member</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('member.addfamilymem')}}" method="POST">
            @csrf
            @include('member.formfamilymem')

        </form>
    </div>
</div>
@endsection
