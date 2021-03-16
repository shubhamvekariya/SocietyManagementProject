@extends('layouts.app')

@section('title')
    Make entry of visitor
@endsection

@section('breadcrumb-title')
    Make entry of visitor
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Make entry of visitor</strong>
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
            @role('security')
                <form action="{{ route('staff.visitors.store') }}" method="post">
            @endrole
            @role('member')
                <form action="{{ route('member.preregistervisitor') }}" method="post">
            @endrole
                @csrf
                @include('security.formvisitor')
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            var m = new Date();
            var nowTime =
                m.getFullYear() + "-" +
                ("0" + (m.getMonth() + 1)).slice(-2) + "-" +
                ("0" + m.getDate()).slice(-2) + " " +
                ("0" + m.getHours()).slice(-2) + ":" +
                ("0" + m.getMinutes()).slice(-2) + ":" +
                ("0" + m.getSeconds()).slice(-2);
            $('#entryTime').datetimepicker({
                format: 'Y-M-DD H:m:s',
                minDate: 'now',
                date: nowTime
            });
        });

    </script>
@endpush