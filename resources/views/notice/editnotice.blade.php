@extends('layouts.app')

@section('title')
Edit Notice
@endsection

@section('breadcrumb-title')
Edit Notice
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Notice</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('member.notices.update',$notice->id)}}" method="POST">
            @csrf
            @method('put')
            @include('notice.formnotice')

        </form>
    </div>
</div>
@endsection

