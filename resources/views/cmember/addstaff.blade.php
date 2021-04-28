@extends('layouts.app')

@section('title')
    Add security & staff
@endsection

@section('breadcrumb-title')
    Add security & staff
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add security & staff</strong>
    </li>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>Error!</strong>
            <ul class="text-left">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="wrapper wrapper-content mt-0">
        <div class="ibox-content w-75 my-5 mx-auto border">
            <form action="{{ route('member.staffs.store') }}" method="POST">
                @csrf
                @include('cmember.staffform')
                <button type="submit" class="btn btn-primary d-block font-weight-bold mx-auto mt-4"
                    style="width:12%;font-size:20px;">Add</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $('.staffs').addClass('active');
            $('.staffs ul').addClass('in');
            $('.staffs ul li:nth-child(1)').addClass('active');
        });

    </script>
@endpush
