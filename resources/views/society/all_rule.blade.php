@extends('layouts.app')
@section('title')
    All Rules
@endsection

@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    All Rules
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        @role('member')
        <a href="{{ route('member.home') }}">Home</a>
    @else
        <a href="{{ route('society.home') }}">Home</a>
        @endrole
    </li>
    <li class="breadcrumb-item active">
        <strong>Rules</strong>
    </li>
@endsection
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>{{ session()->get('success') }}</strong>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>{{ session()->get('error') }}</strong>
        </div>
    @endif

    <div class="wrapper wrapper-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="all_rule">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rule Description</th>
                        @role('secretary','society')
                        <th width="250px">Action</th>
                        @endrole
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Rule Description</th>
                        @role('secretary','society')
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
        <script>
            @role('secretary')
            @if (Route::is('society.all_rule'))
                $(function() {
                var table = $('#all_rule').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('society.all_rule') }}",
                columns: [{
                data: 'id',
                name: 'id'
                },
                {
                data: 'description',
                name: 'description'
                },
                {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
                },
                ]
                });
                $('.rule').addClass('active');
                $('.rule ul').addClass('in');
                $('.rule ul li:nth-child(2)').addClass('active');
                });
            @endif
            @endrole

            @role('member')

            $(function() {
                var table = $('#all_rule').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('member.rules.allrule') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },

                    ]
                });
                $('.rule').addClass('active');
                $('.rule ul').addClass('in');
                $('.rule ul li:nth-child(2)').addClass('active');
            });
            @endrole

        </script>
    @endpush
