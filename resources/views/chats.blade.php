@extends('layouts.app')
@section('title')
Discussion topic
@endsection

@section('breadcrumb-title')
Discussion topic
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        Home
    </li>
    <li class="breadcrumb-item">
        Discussion
    </li>
    <li class="breadcrumb-item active">
        <strong>topic</strong>
    </li>
@endsection
@section('content')
<div class="container">

    <chats :user="{{ Auth::user() }}" :diss="{{ Auth::user() }}"></chats>

</div>
@endsection
@push('script')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
