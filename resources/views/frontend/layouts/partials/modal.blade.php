<?php

use App\Models\Setting;

$phone = Setting::where(['key' => 'phone'])->first();
$mailTo = Setting::where(['key' => 'contact_email'])->first();
?>
<div id="sell-car-modal">
    <form class="modal__form" onsubmit="return false;">

        <button class="close-modal-btn"><img src="{{url('frontend-assets/img/logos/ios-close.svg')}}" alt="">
        </button>

        <h1 class="modal__form-heading">
            {{__('app.selling_car')}}
        </h1>

        <p class="modal__form-p">
            {{__('app.to_sell_the_car')}}
        </p>

        <div class="modal__form-info">
            <p>
                <img src="{{url('frontend-assets/img/logos/pur-phone-alt.svg')}}" alt="">
                {{$phone->value}}
            </p>
            <p>
                <img src="{{url('frontend-assets/img/logos/pur-ios-mail.svg')}}" alt="">
                {{$mailTo->value}}
            </p>
        </div>

        <p class="modal__form-p">
            {{__('app.or_fill_out_the_application')}}
        </p>

        <div class="modal__form-input-grid">
            <input type="text" placeholder="{{__('app.first_name')}}" name="first_name" required>
            <input type="text" placeholder="{{__('app.last_name')}}" name="last_name" required>

            <input type="text" placeholder="{{__('app.mobile_phone')}}" name="phone" required>

            <input type="text" placeholder="{{__('app.address')}}" name="address" required>
            <input type="text" placeholder="{{__('app.description')}}" name="description">

        </div>

        <div class="confirm-info">
            <input type="checkbox" name="confirm" id="confirm-1" required>
            <label for="confirm-1">{{__('app.read_terms')}}</label>
        </div>

        <button class="modal__form-btn">{{__('app.submit_application')}}</button>

    </form>
</div>
<!-- animation on subbmit request -->
<div class="submit-box">
    <div class="submit-content">{{__('app.sending')}}</div>
</div>

<div class="success-box">
    <div class="submit-content">{{__('app.sent')}}</div>
</div>

<div class="error-box">
    <div class="submit-content">შეცდომა!</div>
</div>
