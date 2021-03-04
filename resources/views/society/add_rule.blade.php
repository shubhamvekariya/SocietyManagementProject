@extends('layouts.app')

@section('title')
Add Rules
@endsection

@section('breadcrumb-title')
    Add Rules
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Rules</strong>
    </li>
@endsection

@section('content')
<div class="ibox-content w-75 my-5 p-5 mx-auto border">
    <form  action="{{route('society.rule')}}" method="POST">
        @csrf
        @include('society.form_rule')

    </form>
</div>
@endsection