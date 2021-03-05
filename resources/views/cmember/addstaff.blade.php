@extends('layouts.app')

@section('title')
Add security & staff
@endsection

@section('breadcrumb-title')
Add security & staff
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add security & staff</strong>
    </li>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>Error!</strong>
        <ul class="text-left">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="ibox-content w-75 my-1 mx-auto border">

        @include('cmember.staffform')

</div>
@endsection
