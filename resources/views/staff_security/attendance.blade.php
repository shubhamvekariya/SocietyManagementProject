@extends('layouts.app')
@section('title')
Staffs & Securities
@endsection
@push('css')
<link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    Staffs & Securities
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Staffs & Securities</strong>
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
                    <th>Entry Time</th>
                    <th>Exit Time</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Entry Time</th>
                    <th>Exit Time</th>
                </tr>
            </tfoot>
        </table>
</div>
@endsection

@push('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    @role('member')
        <script>
            $(function () {
                route = {!! str_replace("'", "\'", json_encode(route('member.staffAttendance',$id))) !!};
                var table = $('#staffTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: route,
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'entry_time', name: 'entry_time'},
                        {data: 'exit_time', name: 'exit_time'}
                    ]
                });

            });
        </script>
    @else
        <script>
            $(function () {
                var table = $('#staffTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('staff.attendance') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'entry_time', name: 'entry_time'},
                        {data: 'exit_time', name: 'exit_time'}
                    ]
                });

            });
        </script>
    @endrole
@endpush
