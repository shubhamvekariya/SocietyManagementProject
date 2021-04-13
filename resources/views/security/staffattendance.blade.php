@extends('layouts.app')
@section('title')
Attendance of Staffs & Securities
@endsection
@push('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    Attendance of Staffs & Securities
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('staff.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Attendance</strong>
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
        <table class="table table-striped table-bordered table-hover" id="staffTable" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
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
            var table = $('#staffTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('staff.allstaffs') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'position', name: 'position'},
                    {data: 'check', name: 'check', orderable: false, searchable: false},
                ]
            });
            $('.staffentry').addClass('active');
        });
    </script>
@endpush
