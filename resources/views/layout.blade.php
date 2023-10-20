<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title') | dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />

    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}"> --}}


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">

    <link href="{{ asset('css/tom-select-bootstrap5.css') }}" rel="stylesheet">

    {{-- app css --}}
    <link rel="stylesheet" href="{{ asset('css/app_css.css') }}">

    </head>
    <body>
        @include('partials.navbar')
        {{-- @include('partials.header') --}}
        @yield('content')
        {{-- @include('partials.footer') --}}

        <!--   Core JS Files   -->
        <script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

	    <!--  Checkbox, Radio & Switch Plugins -->
	    <script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

	    <!--  Charts Plugin -->
	    <script src="{{ asset('js/chartist.min.js') }}"></script>

        <!--  Notifications Plugin    -->
        <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

        <!--  Google Maps Plugin    -->
        <script type="text/javascript" src="{{ asset('https://maps.googleapis.com/maps/api/js') }}"></script>

        <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	    <script src="{{ asset('js/paper-dashboard.js') }}"></script>

	    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	    <script src="{{ asset('js/demo.js') }}"></script>

        {{-- DataTables JS --}}
        <script src=" {{ asset('js/jquery-3.7.1.min.js') }}" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        {{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script> --}}

        <script src="{{ asset('js/tom-select.complete.min.js') }}"></script>

        <script src="{{ asset('js/app_js.js') }}"></script>

    </body>
</html>
