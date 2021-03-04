@extends('layouts.app')
@section('title');
All Rules
@endsection

@section('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
@section('breadcrumb-title')
    All Rules
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Rules</strong>
    </li>
@endsection

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="wrapper wrapper-content">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="all_rule" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rule Description</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Rule Description</th>
                    <th width="250px">Action</th>
                </tr>
            </tfoot>
        </table>
</div>
@endsection


@section('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            var table = $('#all_rule').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('society.all_rule') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@endsection
