@extends('layouts.app')

@section('title')
Edit Services
@endsection

@section('breadcrumb-title')
    Edit Services
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Services</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('society.services.update',$service->id)}}" method="POST">
            @csrf
            @method('put')
            @include('service.formservice')

        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(function() {
            $('.service').addClass('active');
            $('.service ul').addClass('in');
            $('.service ul li:nth-child(2)').addClass('active');
        });
    </script>
@endpush
