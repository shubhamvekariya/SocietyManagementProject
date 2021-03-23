
@extends('layouts.app')

@section('title')
Bill
@endsection

@section('breadcrumb-title')
Bill
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Bill</strong>
    </li>
@endsection

@section('content')
<div class="ibox-content w-75 my-5 p-5 mx-auto border">
        @include('bill.formbill')
</div>
@endsection
