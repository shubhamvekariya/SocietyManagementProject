@extends('layouts.app')

@section('title')
Edit Asset/Events
@endsection

@section('breadcrumb-title')
    Edit Asset/Events
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Asset/Events</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('member.assets.update',$asset->id)}}" method="POST">
            @csrf
            @method('put')
            @include('asset.formasset')

        </form>
    </div>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {

            starttime = {!! str_replace("'", "\'", json_encode($asset->start_time)) !!};
            endtime = {!! str_replace("'", "\'", json_encode($asset->end_time)) !!};
            $('#datetimepicker1').datetimepicker({
                date: new Date(starttime)
            });
            $('#datetimepicker2').datetimepicker({
                date: new Date(endtime)
            });
        });
    </script>
     <script>
        assets = {!! str_replace("'", "\'", json_encode($asset->assets)) !!};
        $('#asset').val(assets).trriger();
    </script>
@endpush
