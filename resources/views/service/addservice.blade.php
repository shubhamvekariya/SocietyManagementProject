@extends('layouts.app')

@section('title')
    Add Service
@endsection

@section('breadcrumb-title')
    Add Service
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Service</strong>
    </li>
@endsection

@section('content')
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form action="{{ route('society.services.store') }}" method="POST">
            @csrf
            @include('service.formservice')

        </form>
    </div>
@endsection