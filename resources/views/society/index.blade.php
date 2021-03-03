@extends('layouts.app')
@section('title')
Society Page
@endsection
@section('css')
    <link href="{{ mix('/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Home Page</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('society.home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>
                    @role('secretary','society')
                        I'm a secretary!
                    @else
                        I'm not a secretary...
                    @endrole
                </strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Society Page</h3>
        <div class="error-desc">
            You can create here any grid layout you want. And any variation layout you imagine:) Check out
            main dashboard and other site. It use many different layout.
            <br/><a href="{{ route('Home') }}" class="btn btn-primary m-t">Dashboard</a>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <!-- Toastr script -->
    <script src="{!! asset('js/toastr.min.js') !!}"></script>
    <script>
    data = {!! str_replace("'", "\'", json_encode(Auth::user()->id)) !!};
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('6b723375502146131d40', {
        cluster: 'ap2',
        encrypted: true
    });

    var channel = pusher.subscribe('approve-channel-'+data);
    channel.bind('approve-event', function(data) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": true,
            "positionClass": "toast-top-center",
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "70000",
            "extendedTimeOut": "10000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success(data['message']+" <br/> <br/> <div class='row'> <div class='col-6'> <a class='btn btn-success btn-rounded' href='"+data['approvelink']+"'> Approve</a> </div> <div class='col-6'> <a class='btn btn-danger btn-rounded' href='"+data['rejectlink']+"'>Reject</a></div></div>", "<h1>Approve user</h1>")
    });
    </script>
@endsection
