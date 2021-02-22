<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body>

    <div id="wrapper">

        @include('layouts.navigation')

        <div id="page-wrapper" class="gray-bg">
            @include('layouts.topnavbar')

            @yield('content')

            @include('layouts.footer')
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('/js/popper.min.js') !!}"></script>
    <script src="{!! asset('/js/bootstrap.js') !!}"></script>
    <script src="{!! asset('js/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('js/jquery.slimscroll.min.js') !!}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{!! asset('js/inspinia.js') !!}"></script>
    <script src="{!! asset('js/pace.min.js') !!}"></script>
    @yield('script')

</body>

</html>
