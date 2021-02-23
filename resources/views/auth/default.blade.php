<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body class="gray-bg">
    @yield('content')

    <!-- Mainly scripts -->
    <script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('/js/popper.min.js') !!}"></script>
    <script src="{!! asset('/js/bootstrap.js') !!}"></script>


    @yield('script')

</body>

</html>