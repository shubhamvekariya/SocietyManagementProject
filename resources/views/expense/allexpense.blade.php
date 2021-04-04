@extends('layouts.app')
@section('title')
All Expenses
@endsection

@push('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
@section('breadcrumb-title')
    All Expenses
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Expenses</strong>
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
        <table class="table table-striped table-bordered table-hover" id="all_expense" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Money</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Money</th>
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
            var table = $('#all_expense').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('member.expenses.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'date', name: 'date'},
                    {data: 'money', name: 'money'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            $('.expenses').addClass('active');
            $('.expenses ul').addClass('in');
            $('.expenses ul li:nth-child(2)').addClass('active');
        });

    </script>
@endpush

