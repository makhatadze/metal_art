@extends('frontend.layouts.layout')
@section('content')
<!-- section 1 - contact -->
<section id="contact">

    <div class="map-wrap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95278.13240907624!2d44.768813263292024!3d41.73256609181533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cd7e64f626b%3A0x61d084ede2576ea3!2sTbilisi!5e0!3m2!1sen!2sge!4v1597843332216!5m2!1sen!2sge"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        <div class="color-change"></div>

        <div class="map-btns">
            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95278.13240907624!2d44.768813263292024!3d41.73256609181533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cd7e64f626b%3A0x61d084ede2576ea3!2sTbilisi!5e0!3m2!1sen!2sge!4v1597843332216!5m2!1sen!2sge" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.588" height="24.719" viewBox="0 0 20.588 24.719">
                    <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.5 -0.5)">
                        <path id="Path_40" data-name="Path 40" d="M23.088,10.794c0,7.229-9.294,13.425-9.294,13.425S4.5,18.023,4.5,10.794a9.294,9.294,0,1,1,18.588,0Z" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <path id="Path_41" data-name="Path 41" d="M19.7,13.6a3.1,3.1,0,1,1-3.1-3.1A3.1,3.1,0,0,1,19.7,13.6Z" transform="translate(-2.804 -2.804)" fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </g>
                </svg>
                თბილისი ქუჩა N31
            </a>
            <a href="tel:+995555555555">
                <svg xmlns="http://www.w3.org/2000/svg" width="24.421" height="24.464" viewBox="0 0 24.421 24.464">
                    <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M16.99,5.773a5.341,5.341,0,0,1,4.22,4.22M16.99,1.5a9.615,9.615,0,0,1,8.493,8.482m-1.068,8.525v3.2a2.137,2.137,0,0,1-2.329,2.137,21.141,21.141,0,0,1-9.219-3.28,20.832,20.832,0,0,1-6.41-6.41A21.141,21.141,0,0,1,3.176,4.9,2.137,2.137,0,0,1,5.3,2.568h3.2a2.137,2.137,0,0,1,2.137,1.837,13.717,13.717,0,0,0,.748,3,2.137,2.137,0,0,1-.481,2.254L9.554,11.018a17.093,17.093,0,0,0,6.41,6.41l1.357-1.357a2.137,2.137,0,0,1,2.254-.481,13.717,13.717,0,0,0,3,.748A2.137,2.137,0,0,1,24.414,18.507Z" transform="translate(-2.167 -0.396)" fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
                +995 555 555 555
            </a>
        </div>
    </div>

    <form class="form">
        <div class="logo-box">
            <img src="{{url('frontend-assets/img/logos/site-logo.png')}}" alt="">
        </div>
        <h1 class="form-heading">{{__('app.contact')}}</h1>

        <label for="name" required>{{__('app.first_name')}}</label>
        <input type="text" placeholder="{{__('app.first_name')}}">

        <label for="e-mail" required>{{__('app.email')}}</label>
        <input type="text" placeholder="{{__('app.email_address')}}">

        <label for="phone">{{__('app.mobile')}}</label>
        <input type="text" placeholder="{{__('app.mobile_phone')}}">

        <label for="message" required>{{__('app.message')}}</label>

        <textarea name="" id="" cols="30" rows="6" placeholder="{{__('app.write_message')}}..."></textarea>

        <button class="form-btn">{{__('app.send')}}</button>
    </form>
</section>
@include('frontend.vendor.module.about')

@endsection