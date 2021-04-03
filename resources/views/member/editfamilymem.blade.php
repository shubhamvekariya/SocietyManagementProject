@extends('layouts.app')

@section('title')
Add Family Member
@endsection

@section('breadcrumb-title')
Add Family Member
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Family Member</strong>
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
    </script>
@endpush
