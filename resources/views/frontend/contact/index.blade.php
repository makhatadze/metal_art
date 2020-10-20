<?php

use App\Models\Setting;

$protocolKey = 'site_meta_title_'.app()->getLocale();
$addressKey = 'address_'.app()->getLocale();

$phone = Setting::where(['key' => 'phone'])->first();
$address = Setting::where(['key' => $addressKey])->first();
$protoc = Setting::where(['key' => $protocolKey])->first();
?>

@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.detail-header')
    @include('frontend.layouts.partials.modal')


    <!-- end of  animation on subbmit request -->

    <main>
        <main>
            <!-- section 1 -  contact main  -->
            <section id="contact-main">

                <div class="container">

                    <form class="contact__form" onsubmit="return false;">

                        <h1 class="contact__form-heading">{{__('app.contact')}}</h1>

                        <p class="contact__form-p">{{__('app.contact_us_and_we_will_answer_you')}}</p>

                        <div class="contact__form-main">
                            <input type="text" placeholder="{{__('app.full_name')}}" name="message_full_name" required>
                            <div class="focus-line"></div>

                            <input type="text" placeholder="{{__('app.mobile_phone')}}" name="message_phone" required>
                            <div class="focus-line"></div>

                            <input type="text" placeholder="{{__('app.email_address')}}" name="message_email">
                            <div class="focus-line"></div>

                            <textarea name="message_message" id="message_message"
                                      placeholder="{{__('app.write_message')}}"
                                      required></textarea>
                            <div class="focus-line"></div>

                        </div>

                        <button class="contact__form-btn" id="sendMessageBtn">
                            {{__('app.send_message')}}
                        </button>
                    </form>


                </div>

            </section>

            <!-- section 2 -  -->
            <section id="">

            </section>
    </main>



        @endsection
        @section('custom_scripts')
            <script src="{{ url('frontend-assets/script/index.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                });
            </script>
@endsection
