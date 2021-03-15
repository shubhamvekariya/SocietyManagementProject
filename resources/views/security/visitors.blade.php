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
        @role('security')
        @if (Route::is('staff.visitors.index'))
            <script>
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
                        ]
                    });

                });

            </script>
        @elseif(Route::is('staff.visitors.allvisitors'))
            <script>
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

                });

            </script>
        @endif
        @endrole
        @role('member')
        <script>
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

            });

        </script>
        @endrole
    @endpush
