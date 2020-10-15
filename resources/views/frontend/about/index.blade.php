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

    <!-- animation on subbmit request -->
    <div class="submit-box">
        <div class="submit-content">იგზავნება...</div>
    </div>

    <div class="success-box">
        <div class="submit-content">გაგზავნილია!</div>
    </div>
    <!-- end of  animation on subbmit request -->

    <main>
        <!-- section 1 -  contact main  -->
        <section id="about-main">

            <div class="container">

                <div class="about-main__left">

                    <h2 class="about-main__heading">ჩვენ შესახებ</h2>

                    <h3 class="about-main__subheading">ლორემ იპსუმ დოლორ სიტ ამეტ წაიყვანა</h3>

                    <p class="about-us__paragraph">

                        ლორემ იპსუმ მარგალიტებით წასულხართ სასვენი ფერმერსა გადაუხდელი გაწვება ნაწნავიანი, გაეყარათ
                        დავიგვიანებ ურყევია ფორმულას კლერის პროლეტარმა საპროექციო გპატრონობთ. გაგანძრევინებ მერიც აქციეს
                        შებორკილმა მოდაში კრულვიანი. პროლეტარმა გადავდიოდი უბედურებამ ახარებდა იოანემ, ნაწნავიანი
                        მსაჯულს ჰშხუის გვაკვირდებიან. აცალა მიკვეთდა საზიარებლად არჩიოს იამებოდა ჩემგან ამოდიოდა.
                        გაქცეული საზიარებლად გვაკვირდებიან აუ დაეხსომებინა, ავედევნო ქვიშა იამებოდა აქციეს გაეყარათ
                        მოიპოვებს ბუნებისგან იოანემ მოსამსახურეებმა. გულიც შემოგიჭყეტს ურყევია დავიგვიანებ გამოიქცევა,
                        ხისა გპატრონობთ მიკვეთდა იოანემ.

                        <br>
                        <br>

                        ლორემ იპსუმ მარგალიტებით წასულხართ სასვენი ფერმერსა გადაუხდელი გაწვება ნაწნავიანი, გაეყარათ
                        დავიგვიანებ ურყევია ფორმულას კლერის პროლეტარმა საპროექციო გპატრონობთ. გაგანძრევინებ მერიც აქციეს
                        შებორკილმა მოდაში კრულვიანი. პროლეტარმა გადავდიოდი უბედურებამ ახარებდა იოანემ, ნაწნავიანი
                        მსაჯულს ჰშხუის გვაკვირდებიან. აცალა მიკვეთდა საზიარებლად არჩიოს იამებოდა ჩემგან ამოდიოდა.
                        გაქცეული საზიარებლად გვაკვირდებიან აუ დაეხსომებინა, ავედევნო ქვიშა იამებოდა აქციეს გაეყარათ
                        მოიპოვებს ბუნებისგან იოანემ მოსამსახურეებმა. გულიც შემოგიჭყეტს ურყევია დავიგვიანებ გამოიქცევა,
                        ხისა გპატრონობთ მიკვეთდა იოანემ.
                    </p>
                </div>

                <div class="about-page__info">
                    <div class="about-page__info-bg"></div>

                    <div class="about-page__info-top">
                        <p>
                            <img src="{{url('frontend-assets/img/logos/ios-pin.svg')}}" alt="">
                            {{$address->value}}</p>
                        <p>
                            <img src="{{url('frontend-assets/img/logos/pur-phone-alt.svg')}}" alt="">
                            {{$phone->value}}
                        </p>
                    </div>

                    <div class="about-page__info-img">
                        <img class="img-cover" src="{{url('frontend-assets/img/sports-car-brown.png')}}" alt="">
                    </div>

                </div>

            </div>

        </section>

        <!-- section 2 -  -->
        <section id="">

        </section>



        @endsection
        @section('custom_scripts')
            <script src="{{ url('frontend-assets/script/index.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                });
            </script>
@endsection