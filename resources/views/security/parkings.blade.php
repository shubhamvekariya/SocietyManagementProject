@extends('layouts.app')
@section('title')
    Parking Details
@endsection
@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    Parking Details
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('staff.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Parking Details</strong>
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
                        <th>Vehicle Number</th>
                        <th>Type</th>
                        <th>Spot</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Vehicle Number</th>
                        <th>Type</th>
                        <th>Spot</th>
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
                var table = $('#visitorTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('staff.visitors.parkings') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
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
                            data: 'vehicle_no',
                            name: 'vehicle_no'
                        },
                        {
                            data: 'type',
                            name: 'type'
                        },
                        {
                            data: 'spot',
                            name: 'spot'
                        },
                    ]
                });

            });

        </script>
    @endpush
