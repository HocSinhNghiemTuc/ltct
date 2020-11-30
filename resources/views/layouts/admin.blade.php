<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('AdminLTE-3.0.5/dist/css/adminlte.min.css')}}">
    @yield('css')
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div id='app'>
    <div class="wrapper">
        @include('partials.header')
        @include('partials.sidebar')
        @yield('content')
        @include('partials.footer')
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{asset('AdminLTE-3.0.5/dist/js/adminlte.min.js')}}"></script>
@yield('js')
</body>
</html>
