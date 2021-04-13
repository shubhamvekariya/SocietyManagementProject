@extends('layouts.app')

@section('title')
Edit Family Member
@endsection

@section('breadcrumb-title')
Edit Family Member
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Family Member</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{ route('member.updatefamilymem') }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" value="{{$family_mem['id']}}" name="fid">
            @include('member.formfamilymem')

        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        gender = {!! str_replace("'", "\'", json_encode($family_mem->gender)) !!};
        $('#gender').val(gender);
        $(function() {
            $('.familymember').addClass('active');
            $('.familymember ul').addClass('in');
            $('.familymember ul li:nth-child(2)').addClass('active');
        });
    </script>
@endpush
