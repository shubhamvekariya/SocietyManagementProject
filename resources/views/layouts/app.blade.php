<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="shubhamvekariya">
    <title>@yield('title')</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('css')
    @role('secretary','society')
    <link href="{{ mix('/css/toastr.min.css') }}" rel="stylesheet">
    @endrole
    @role('member')
    <link href="{{ mix('/css/toastr.min.css') }}" rel="stylesheet">
    @endrole
</head>
<body>
    <div id="wrapper">
        @include('layouts.navigation')
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.topnavbar')
            @include('layouts.breadcrumb')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script>
    <script src="{!! asset('js/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('js/jquery.slimscroll.min.js') !!}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{!! asset('js/inspinia.js') !!}"></script>
    <script src="{!! asset('js/pace.min.js') !!}"></script>
    @stack('script')
    @role('secretary','society')
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
        var channel = pusher.subscribe('approve-channel-' + data);
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
            toastr.success(data['message'] +
                " <br/> <br/> <div class='row'> <div class='col-6'> <a class='btn btn-success btn-rounded' href='" +
                data['approvelink'] +
                "'> Approve</a> </div> <div class='col-6'> <a class='btn btn-danger btn-rounded' href='" +
                data['rejectlink'] + "'>Reject</a></div></div>", "<h1>Approve user</h1>")
        });
    </script>
@endrole
@role('member')
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
        var channel = pusher.subscribe('approve-visitor-channel-' + data);
        channel.bind('approve-visitor-event', function(data) {
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
            toastr.success(data['message'] +
                " <br/> <br/> <div class='row'> <div class='col-6'> <a class='btn btn-success btn-rounded' href='" +
                data['approvelink'] +
                "'> Approve</a> </div> <div class='col-6'> <a class='btn btn-danger btn-rounded' href='" +
                data['rejectlink'] + "'>Reject</a></div></div>", "<h1>Approve visitor</h1>")
        });
    </script>
@endrole
</body>
</html>
