@extends('layouts.app')
@section('title')
    Need Approve visitors
@endsection
@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    Approve visitors
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Approve visitors</strong>
    </li>
@endsection
@section('content')


    <div class="wrapper wrapper-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="needapprovetable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Entry Time</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Entry Time</th>
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
            $(function() {
                var table = $('#needapprovetable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('member.needapprovevisitor') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'reason_to_meet',
                            name: 'reason_to_meet'
                        },
                        {
                            data: 'entry_time',
                            name: 'entry_time'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
                $('.approvevisitor').addClass('active');
                $('.approvevisitor ul').addClass('in');
                $('.approvevisitor ul li:nth-child(1)').addClass('active');
            });

        </script>
    @endpush
