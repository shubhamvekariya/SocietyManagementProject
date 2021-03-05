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
<div class="ibox-content w-75 my-5 p-5 mx-auto border">

        @include('cmember.staffform')

</div>
@endsection
@push('script')

    <script>
        $(document).ready(function(){
            $("#gender").select2({
                placeholder: "Select a gender",
                allowClear: true
            });
        });
    </script>
@endpush
