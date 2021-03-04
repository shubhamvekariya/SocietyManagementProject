@extends('layouts.app')

@section('title')
Edit Rules
@endsection

@section('breadcrumb-title')
    Edit Rules
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('society.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Edit Rules</strong>
    </li>
@endsection

@section('content')
<div class="ibox-content">
    <form  action="{{ url('/society/update_rule') }}" method="POST">
        @csrf
        @method('put')

        <input type="hidden" value="{{$rule_data['id']}}" name="rid">
        @include('society.form_rule');


    </form>
</div>
@endsection
