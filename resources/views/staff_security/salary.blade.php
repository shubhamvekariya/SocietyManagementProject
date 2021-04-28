@extends('layouts.app')
@section('title')
    Salary Details
@endsection
@push('css')
    <link href="{{ mix('/css/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb-title')
    Salary Details
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        @role('member')
        <a href="{{ route('member.home') }}">Home</a>
    @else
        <a href="{{ route('staff.home') }}">Home</a>
        @endrole
    </li>
    <li class="breadcrumb-item active">
        <strong>Salary Details</strong>
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
            <table class="table table-striped table-bordered table-hover" id="salaryTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Leave</th>
                        <th>Salary</th>
                        @role('member')
                        <th>Action</th>
                    @else
                        <th style="width:125px;">Status</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salaries as $salary)
                        <tr>
                            @role('member')
                            <form action="{{ route('stripe.salary') }}" method="POST">
                                @csrf
                                <th><input name="no" value="{{ $salary->no }}" readonly /></th>
                                <th><input name="month" value="{{ $salary->month }}" readonly /></th>
                                <th><input name="year" value="{{ $salary->year }}" readonly /></th>
                                <th><input name="leave" value="{{ $salary->leave }}" readonly /></th>
                                <th><input name="salary" value="{{ $salary->salary }}" readonly /></th>
                                <th>
                                    @if ($salary->status == 1)
                                        <input type="hidden" name="staff_id" value="{{ $salary->staff_id }}" />
                                        <button type="submit" class="btn btn-primary btn-rounded d-block mx-auto">Pay
                                            Salary</button>
                                    @else
                                        <button class="btn btn-success btn-rounded d-block mx-auto text-bold" type="submit"
                                            disabled>Paid</button>
                                    @endif
                                </th>
                            </form>
                        @else
                            <th>{{ $salary->no }}</th>
                            <th>{{ $salary->month }}</th>
                            <th>{{ $salary->year }}</th>
                            <th>{{ $salary->leave }}</th>
                            <th>{{ $salary->salary }}</th>
                            <th>
                                @if ($salary->status == 1)
                                    <button class="btn btn-danger btn-rounded d-block mx-auto disabled" style="width:100px"
                                        type="submit">Unpaid</button>
                                @else
                                    <button class="btn btn-success btn-rounded d-block mx-auto" style="width:100px"
                                        type="submit" disabled>Paid</button>
                                @endif
                            </th>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Leave</th>
                        <th>Salary</th>
                        @role('member')
                        <th>Action</th>
                    @else
                        <th style="width:125px;">Status</th>
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
            $(function() {
                var table = $('#salaryTable').DataTable();
                @role('member')
                $('.staffs').addClass('active');
                $('.staffs ul').addClass('in');
                $('.staffs ul li:nth-child(2)').addClass('active');
            @else
                $('.salary').addClass('active');
                @endrole
            });

        </script>
    @endpush
