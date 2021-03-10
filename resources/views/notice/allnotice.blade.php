@extends('layouts.app')
@section('title')
All Notice
@endsection

@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
@section('breadcrumb-title')
    All Notice
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Notice</strong>
    </li>
@endsection


<!--form start-->
<div class="row">
<div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInUp">
        <ul class="notes">
            @foreach($notice as $notice)
            <li>
                <div>
                    <small>{{ $notice->created_at }}</small>
                    <h4>{{ $notice->title }}</h4>
                    <p>{{ $notice->description }}</p>
                    <a href="#"><i class="fa fa-pencil-square-o mr-4"></i></a>
                    <a href="#"><i class="fa fa-trash-o"></i></a>

                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
@endsection
