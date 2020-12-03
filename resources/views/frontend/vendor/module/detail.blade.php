<?php

use App\Models\Setting;

$phone = Setting::where(['key' => 'phone'])->first();
$addressKey = 'address_'.app()->getLocale();
$address = Setting::where(['key' => $addressKey])->first();
$facebookUrl = Setting::where(['key' => 'facebook_url'])->first();
$linkedinUrl = Setting::where(['key' => 'linkedin'])->first();
$instagramUrl = Setting::where(['key' => 'instagram_url'])->first();
?>
<div id="order-modal">

    <div class="order-modal-wrap">

        <h1 class="order-modal-title">{{ __('index.how_to_order') }}</h1>

        <div class="modal-contact-box">

            <div class="order-col">

                <p>{{ __('index.call_to_phone') }}</p>

                <div class="order-flex">

                    <img src="{{ url('frontend-assets/img/logos/Icon feather-phone-call.png')}}" alt="">

                    <a href="tel:{{ $phone->value }}">{{ $phone->value }}</a>

                </div>

            </div>

            <div class=" order-col modal-location">

                <p>{{ __('index.on_place') }}</p>

                <div class="order-flex">

                    <img src="{{ url('frontend-assets/img/logos/Icon feather-map-pin.png')}}" alt="">

                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95278.13240907624!2d44.768813263292024!3d41.73256609181533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cd7e64f626b%3A0x61d084ede2576ea3!2sTbilisi!5e0!3m2!1sen!2sge!4v1597843332216!5m2!1sen!2sge" target="_blank" >{{ $address->value }}</a>

                </div>

            </div>
            <div class="order-col">

                <p>{{ __('index.find_on_network') }}</p>

                <div class="order-flex">

                    <a href="{{ $facebookUrl->value }}" target="_blank">

                        <img src="{{ url('frontend-assets/img/logos/Icon awesome-facebook.png')}}" alt="">

                    </a>

                    <a href="{{ $instagramUrl->value }}" target="_blank">

                        <img src="{{ url('frontend-assets/img/logos/Icon awesome-instagram.png')}}" alt="">

                    </a>

                </div>

            </div>

        </div>

        <button class="close-order-modal">{{ __('index.close') }}</button>

    </div>

</div>
