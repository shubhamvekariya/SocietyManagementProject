@extends('layouts.app')

@section('title')
Edit Complaint
@endsection

@section('breadcrumb-title')
    Edit Complaint
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Complaint</strong>
    </li>
@endsection

@section('content')
<div class="ibox-content w-75 my-5 p-5 mx-auto border">
    <form  action="{{route('member.complaints.update',$complaint->id)}}" method="POST">
        @csrf
        @method('put')
        @include('complaint.formcomplaint')

    </form>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {

            regdate = {!! str_replace("'", "\'", json_encode($complaint->reg_date)) !!};
            $('#datetimepicker1').datetimepicker({
                date: new Date(regdate)
            });
        });
    </script>
     <script>
        complaints = {!! str_replace("'", "\'", json_encode($complaint->category)) !!};
        $('#category').val(complaints).trriger();
    </script>
@endpush
