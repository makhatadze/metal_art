<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ url('dist/images/logo.svg') }}" rel="shortcut icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{ url('dist/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .main-section{
            margin:0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0px 0px 20px #c1c1c1;
        }
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }
    </style>


</head>
<body class="app">
<div class="flex">
    @include('admin.partials.mobile_menu')
    @include('admin.partials.desktop_menu')
    <div class="content">
        <div class="top-bar">
            @include('admin.layouts._breadcrumbs')
            <div class="intro-x dropdown  h-8 relative">
                <div class="overflow-hidden shadow-lg image-fit zoom-in">
                    <a href="{{route('logout')}}"
                       class="flex items-center block p-2 transition duration-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-toggle-right w-4 h-4 mr-2">
                            <rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect>
                            <circle cx="16" cy="12" r="3"></circle>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
        {{--        @include('admin.layouts._breadcrumbs')--}}

        @include('admin.layouts.alerts')
        @yield('content')
    </div>
</div>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ url('dist/js/app.js') }}"></script>
<script src="{{ url('uploader/dist/image-uploader.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
@yield('custom_scripts')
</body>
</html>