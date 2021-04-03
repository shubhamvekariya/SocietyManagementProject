@extends('layouts.app')

@section('title')
Edit Meeting
@endsection

@section('breadcrumb-title')
    Edit Meeting
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Meeting</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('member.meetings.update',$meeting->id)}}" method="POST">
            @csrf
            @method('put')
            @include('cmember.formmeeting')

        </form>
    </div>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {

            starttime = {!! str_replace("'", "\'", json_encode($meeting->start_time)) !!};
            endtime = {!! str_replace("'", "\'", json_encode($meeting->end_time)) !!};
            $('#datetimepicker1').datetimepicker({
                date: new Date(starttime)
            });
            $('#datetimepicker2').datetimepicker({
                date: new Date(endtime)
            });
        });
    </script>
     <script>
        place = {!! str_replace("'", "\'", json_encode($meeting->place)) !!};
        $('#place').val(place).trriger();
    </script>
@endpush
