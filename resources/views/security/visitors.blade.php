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
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>{{ session()->get('success') }}</strong>
        </div>
    @endif
    <div class="wrapper wrapper-content">
        @role('security')
        <a href="{{ route('staff.visitor.export') }}" id="vendorExport" class="btn btn-primary float-right mr-4 mb-3"
            target="_blank"><i class="fa fa-file-excel-o"></i> Export</a>
        @endrole
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="visitorTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Entry time</th>
                        @unlessrole('security')
                        <th>Exit time</th>
                        @endunlessrole
                        @if (Route::is('staff.visitors.allvisitors'))
                            <th>Exit time</th>
                        @endif
                        @role('security')
                        <th>Whom to meet</th>
                        @if (Route::is('staff.visitors.index'))
                            <th width="250px">Action</th>
                        @endif
                        @endrole
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Entry time</th>
                        @unlessrole('security')
                        <th>Exit time</th>
                        @endunlessrole
                        @if (Route::is('staff.visitors.allvisitors'))
                            <th>Exit time</th>
                        @endif
                        @role('security')
                        <th>Whom to meet</th>
                        @if (Route::is('staff.visitors.index'))
                            <th width="250px">Action</th>
                        @endif
                        @endrole
                    </tr>
                </tfoot>
            </table>
        </div>
    @endsection

    @push('script')
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            @role('security')
            @if (Route::is('staff.visitors.index'))
                $(function() {
                var table = $('#visitorTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('staff.visitors.index') }}",
                columns: [{
                data: 'id',
                name: 'id'
                },
                {
                data: 'name',
                name: 'name'
                },
                {
                data: 'phoneno',
                name: 'phoneno'
                },
                {
                data: 'entry_time',
                name: 'entry_time'
                },
                {
                data: 'memberdetails',
                name: 'memberdetails'
                },
                {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
                },
                ],
                order: [3,'asc']
                });
                $('.visitors').addClass('active');
                $('.visitors ul').addClass('in');
                $('.visitors ul li:nth-child(2)').addClass('active');
                });
            @elseif(Route::is('staff.visitors.allvisitors'))
                $(function() {
                var table = $('#visitorTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('staff.visitors.allvisitors') }}",
                columns: [{
                data: 'id',
                name: 'id'
                },
                {
                data: 'name',
                name: 'name'
                },
                {
                data: 'phoneno',
                name: 'phoneno'
                },
                {
                data: 'entry_time',
                name: 'entry_time'
                },
                {
                data: 'exit_time',
                name: 'exit_time'
                },
                {
                data: 'memberdetails',
                name: 'memberdetails'
                }
                ]
                });
                $('.visitors').addClass('active');
                $('.visitors ul').addClass('in');
                $('.visitors ul li:nth-child(3)').addClass('active');
                });
            @endif
            @endrole
            @role('member')
            $(function() {
                var table = $('#visitorTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('member.visitors') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'phoneno',
                            name: 'phoneno'
                        },
                        {
                            data: 'entry_time',
                            name: 'entry_time'
                        },
                        {
                            data: 'exit_time',
                            name: 'exit_time'
                        },
                    ],
                    "order": [
                        [3, "asc"]
                    ]
                });
                $('.approvevisitor').addClass('active');
                $('.approvevisitor ul').addClass('in');
                $('.approvevisitor ul li:nth-child(3)').addClass('active');
            });
            @endrole

        </script>
    @endpush
