@extends('layouts.app')

@section('title')
    Edit visitor details
@endsection

@section('breadcrumb-title')
    Edit visitor details
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit visitor</strong>
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
        <div class="ibox-content w-75 my-5 mx-auto border py-5">
            <form action="{{ route('staff.visitors.update', $visitor->id) }}" method="post">
                @csrf
                @method('PUT')
                @include('security.formvisitor')
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        user_id = {!! str_replace("'", "\'", json_encode($visitor->user_id)) !!};
        $('#member').val(user_id);
        parking = {!! str_replace("'", "\'", json_encode($visitor->parking)) !!};
        if (parking != null)
            $('#type').val(parking['type']);
        $(function() {
            $('.visitors').addClass('active');
            $('.visitors ul').addClass('in');
            $('.visitors ul li:nth-child(2)').addClass('active');
        });

    </script>
@endpush
