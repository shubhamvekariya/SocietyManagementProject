@extends('layouts.app')

@section('title')
Edit Expenses
@endsection

@section('breadcrumb-title')
    Edit Expenses
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Expenses</strong>
    </li>
@endsection

@section('content')
<div class="wrapper wrapper-content mt-0">
    <div class="ibox-content w-75 my-5 p-5 mx-auto border">
        <form  action="{{route('member.expenses.update',$expense->id)}}" method="POST">
            @csrf
            @method('put')
            @include('expense.formexpense')

        </form>
    </div>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {

            date = {!! str_replace("'", "\'", json_encode($expense->date)) !!};
            $('#datetimepicker1').datetimepicker({
                date: new Date(date)
            });
            $('.expenses').addClass('active');
            $('.expenses ul').addClass('in');
            $('.expenses ul li:nth-child(2)').addClass('active');
        });
    </script>

@endpush
