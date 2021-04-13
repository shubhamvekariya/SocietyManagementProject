@extends('layouts.app')

@section('title')
Edit security & staff
@endsection

@section('breadcrumb-title')
Edit security & staff
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit security & staff</strong>
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
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 mx-auto border">

        <form action="{{ route('member.staffs.update' , $staff->id) }}"  method="POST">
            @csrf
            @method('PUT')
            @include('cmember.staffform')

        <button type="submit" class="btn btn-primary d-block font-weight-bold mx-auto mt-4" style="width:12%;font-size:20px;">Edit</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        gender = {!! str_replace("'", "\'", json_encode($staff->gender)) !!};
        $('#gender').val(gender);
        nonworkingday = {!! str_replace("'", "\'", json_encode($staff->nonworkingday)) !!};
        $('#nonworkingday').val(nonworkingday);
        position = {!! str_replace("'", "\'", json_encode($staff->position)) !!};
        $('#position').val(position);
        if(position == "security")
            $('#workgroup').hide();
        else if(position == "staff")
        {
            var newOption = new Option('Personal','personal', false, false);
            $('#usage').append(newOption);
        }
        $('#position').trigger('change');
        work = {!! str_replace("'", "\'", json_encode($staff->work)) !!};
        $('#work').val(work);
        usage = {!! str_replace("'", "\'", json_encode($staff->society_id)) !!};
        if(usage==null)
            $('#usage').val('personal');
        else
            $('#usage').val('society');
        $(function() {
            $('.staffs').addClass('active');
            $('.staffs ul').addClass('in');
            $('.staffs ul li:nth-child(2)').addClass('active');
        });
    </script>
@endpush
