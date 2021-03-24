
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
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-8">
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                {{-- <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>--}}
                <a href="{{ route('society.download_pdf')}}" class="btn btn-white"><i class="fa fa-download "></i> Download </a>
                <a href="{{ route('society.view_pdf') }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print
                    Invoice </a>
            </div>
        </div>
    </div>
        @include('bill.formbill')
</div>
@endsection
