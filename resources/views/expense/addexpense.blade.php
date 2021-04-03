@extends('layouts.app')

@section('title')
Add Expenses
@endsection

@section('breadcrumb-title')
Add Expenses
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Add Expense</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
<div class="ibox-content w-75 my-5 p-5 mx-auto border">
    <form  action="{{route('member.expenses.store')}}" method="POST">
        @csrf
        @include('expense.formexpense')
    </form>
</div>
</div>
@endsection


@push('script')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@endpush
