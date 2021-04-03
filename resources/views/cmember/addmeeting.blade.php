@extends('layouts.app')

@section('title')
Add Meeting
@endsection

@section('breadcrumb-title')
    Add Meeting
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Meeting</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('member.meetings.store')}}" method="POST">
            @csrf
            @include('cmember.formmeeting')

        </form>
    </div>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
        });
    </script>
@endpush
