@extends('layouts.app')
@section('title')
Visitors
@endsection
@push('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    Visitors
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        @role('security')
            <a href="{{ route('staff.home') }}">Home</a>
        @endrole
        @role('member')
            <a href="{{ route('member.home') }}">Home</a>
        @endrole
    </li>
    <li class="breadcrumb-item active">
        <strong>Visitors</strong>
    </li>
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ session()->get('success') }}</strong>
    </div>
@endif
<div class="wrapper wrapper-content">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="visitorTable" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Entry time</th>
                    <th>Exit time</th>
                    @role('security')
                        <th>Whom to meet</th>
                        <th width="250px">Action</th>
                    @endrole
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Entry time</th>
                    <th>Exit time</th>
                    @role('security')
                        <th>Whom to meet</th>
                        <th width="250px">Action</th>
                    @endrole
                </tr>
            </tfoot>
        </table>
</div>
@endsection

@push('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    @role('security')
        <script>
            $(function () {
                var table = $('#visitorTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('staff.visitors.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phoneno', name: 'phoneno'},
                        {data: 'entry_time', name: 'entry_time'},
                        {data: 'exit_time', name: 'exit_time'},
                        {data: 'memberdetails', name: 'memberdetails'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

            });
        </script>
    @endrole
    @role('member')
        <script>
            $(function () {
                var table = $('#visitorTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('member.visitors') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phoneno', name: 'phoneno'},
                        {data: 'entry_time', name: 'entry_time'},
                        {data: 'exit_time', name: 'exit_time'},
                    ],
                    "order": [[ 3, "asc" ]]
                });

            });
        </script>
    @endrole
@endpush
