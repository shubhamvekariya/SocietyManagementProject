@extends('layouts.app')
@section('title')
    Discussion
@endsection

@section('breadcrumb-title')
    Discussion
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        <a href="{{ route('member.home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Discussion</strong>
    </li>
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>Error!</strong>
            <ul class="text-left">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>{{ session()->get('success') }}</strong>
        </div>
    @endif
    <!-- Forum-->

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="ibox-content m-b-sm border-bottom">
                    <div class="p-xs">
                        <div class="float-left m-r-md">
                            <i class="fa fa-globe text-navy mid-icon"></i>
                        </div>
                        <h2>Welcome to ISocietyClub</h2>
                        <span>Feel free to Discuss Anything.</span>


                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#myModal2">
                            Add Discussion
                        </button>
                    </div>
                </div>

                <div class="ibox-content forum-container">

                    <div class="forum-title">

                        <h3>General subjects</h3>
                    </div>
                    @foreach ($discussion as $diss)
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-shield"></i>
                                    </div>
                                    <a href="{{ route('member.discussion.chats', $diss->id) }}"
                                        class="forum-item-title">{{ $diss->title }}</a>
                                    <div class="forum-sub-title">{{ $diss->description }}</div>
                                </div>
                                <div class="col-md-1 offset-md-2 forum-info">
                                    <span class="views-number">
                                        {{ $diss->message }}
                                    </span>
                                    <div>
                                        <small>Messages</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--end forum-->



    <!--form start-->

    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Discussion Topic</h4>

                </div>
                <form action="{{ route('member.discussion.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="font-normal col-sm-4 col-form-label">Title:</label>
                            <div class="col-sm-8">

                                <input id="title" name="title" type="text" class="form-control" placeholder="Title"
                                    value=''>
                            </div>
                        </div>

                        <div id="description" class="form-group row">

                            <label class="font-normal col-sm-4 col-form-label">Description:</label>

                            <div class="col-sm-8">
                                <textarea rows="3" class="form-control" placeholder="Enter Description"
                                    name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $('.discussion').addClass('active');
        });

    </script>
@endpush
