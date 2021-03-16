@extends('layouts.app')
@section('title')
All Asset/Events
@endsection

@push('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
@section('breadcrumb-title')
    All Asset/Events
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Assets/Events</strong>
    </li>
@endsection

@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ session()->get('success') }}</strong>
    </div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ session()->get('error') }}</strong>
    </div>
@endif

<div class="wrapper wrapper-content">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="all_asset" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Assets/Events</th>
                    <th>Function details</th>
                    <th>Charges</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Assets/Events</th>
                    <th>Function details</th>
                    <th>Charges</th>
                    <th width="250px">Action</th>
                </tr>
            </tfoot>
        </table>
</div>
@endsection


@push('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            var table = $('#all_asset').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('member.assets.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'start_time', name: 'start_time'},
                    {data: 'end_time', name: 'end_time'},
                    {data: 'assets', name: 'assets'},
                    {data: 'func_details', name: 'func_details'},
                    {data: 'charges', name: 'charges'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@endpush
