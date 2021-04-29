@extends('layouts.app')
@section('title')
    Sessions
@endsection

@section('breadcrumb-title')
    Sessions
@endsection
@section('breadcrumb-item')
    <li class="breadcrumb-item">
        @role('secretary')
        <a href="{{ route('society.home') }}">Home</a>
        @endrole
        @role('member')
        <a href="{{ route('member.home') }}">Home</a>
        @endrole
    </li>
    <li class="breadcrumb-item active">
        <strong>Sessions</strong>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="ibox-content m-b-sm border-bottom">
                    <div class="p-xs">
                        <div class="float-left m-r-md">
                            <i class="fa fa-globe text-navy mid-icon"></i>
                        </div>
                        <h2>Welcome to ISocietyClub</h2>
                        <span>Feel free to join any session.</span>


                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#sessionmodel">
                            Add Sessions
                        </button>
                    </div>
                </div>

                <div class="ibox-content forum-container">

                    <div class="forum-title">

                        <h3>General sessions</h3>
                    </div>
                    @foreach ($sessions as $session)
                        <div class="forum-item">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-video-camera"></i>
                                    </div>

                                    <a href=
                                        "@role('secretary') {{ route('society.sessionroom', $session->id) }} @endrole
                                        @role('member') {{ route('member.sessionroom', $session->id) }} @endrole"
                                        class="forum-item-title">{{ $session->name }}</a>
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

    <div class="modal inmodal" id="sessionmodel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Session</h4>

                </div>
                <form action="{{ route('society.createSession') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="font-normal col-sm-4 col-form-label">Name:</label>
                            <div class="col-sm-8">

                                <input id="name" name="name" type="text" class="form-control" placeholder="Name"
                                    value=''>
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
            $('.session').addClass('active');
        });

    </script>
@endpush
