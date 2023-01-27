<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Umadblu') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <!-- Bootstrap table -->
    <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/restrito.css') }}" rel="stylesheet" />

    @yield('styles')


    <!--  Fonts and icons     -->
    <!--link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"-->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<div class="container restrito-wrapper {{ Route::currentRouteName() == 'restrito.arquivos' ? 'shadow' : '' }}">
    <div class="row">
        @yield('content')
    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<!-- Bootstrap table -->
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/bootstrap-table-pt-BR.js') }}"></script>

<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>

<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="{{ asset('js/masks.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

</html>
