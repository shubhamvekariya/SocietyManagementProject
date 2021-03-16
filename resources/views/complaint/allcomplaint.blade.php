@extends('layouts.app')
@section('title')
All Complaints
@endsection

@push('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
@section('breadcrumb-title')
    All Complaints
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Complaints</strong>
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
        <table class="table table-striped table-bordered table-hover" id="all_complaint" >
            <thead>
                <tr>
                    <th>Complaint No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Complaint No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Registration Date</th>
                    <th>Status</th>
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
            var table = $('#all_complaint').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('member.complaints.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'category', name: 'category'},
                    {data: 'reg_date', name: 'reg_date'},
                    {data: 'status', name: 'status'},
                   // {data: 'remarks', name: 'remarks'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@endpush

