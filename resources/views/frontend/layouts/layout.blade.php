<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <link href="{{url('frontend-assets//img/logos/site-logo.svg')}}" rel="shortcut icon">


    <link rel="stylesheet" href="{{url('frontend-assets/css/bpg-arial-caps.css')}}">
    <link rel="stylesheet" href="{{url('frontend-assets/css/bpg-web-001-caps.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{url('frontend-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend-assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('frontend-assets/css/select.css')}}">
    <title>{{ $page->{"title_".app()->getLocale()} }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>
<!-- header begin -->
<!-- header end -->
<body>


<main>
    @yield('content')
    @include('frontend.layouts.partials.footer')

</main>

<!-- sell car Modal -->


<!-- footer-->

<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="{{ url('frontend-assets/script/slick.min.js') }}"></script>

<!-- normal js  -->
<script src="{{ url('frontend-assets/script/general.js') }}"></script>
<script src="{{url('frontend-assets/script/details.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{url('frontend-assets/script/catalogue.js')}}"></script>
@yield('custom_scripts')
</body>
</html>
