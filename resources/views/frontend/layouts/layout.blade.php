<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('frontend-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend-assets/css/style.css')}}">
    <title>{{ $page->{"title_".app()->getLocale()} }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>
<!-- header begin -->
<!-- header end -->
<body>

@include('frontend.layouts.partials.header')

<main class="site-content scroll">
    @yield('content')
    @include('frontend.layouts.partials.footer')
</main>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script src="{{ url('frontend-assets/script/slick.min.js') }}"></script>

<script src="{{ url('frontend-assets/script/general.js') }}"></script>

<script src="{{ url('frontend-assets/script/index.js') }}"></script>


@yield('custom_scripts')
</body>
</html>
