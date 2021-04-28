@extends('layouts.app')
@section('title')
    Committee members
@endsection
@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')

@section('breadcrumb-title')
    Add or remove Committee member
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Committee Members</strong>
    </li>
@endsection
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
<div class="wrapper wrapper-content">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="needapprovetable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="150px">Committee Members</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="150px">Committee Members</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            var table = $('#needapprovetable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('society.cmembers') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'committeemember',
                        name: 'committeemember',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('.committeemember').addClass('active');
        });

    </script>
@endpush
