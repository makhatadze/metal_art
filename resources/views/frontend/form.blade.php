<form class="details-section__form" onsubmit="return false;">
    <h1 class="details__form-heading">
        {{__('app.fill_out')}}
        <img src="{{url('frontend-assets/img/logos/i-document-orang.svg')}}" alt="">
    </h1>

    <div class="details__form-input-grid">
        <input type="text" placeholder="{{__('app.first_name')}}" name="detail_first_name" required>
        <input type="text" placeholder="{{__('app.last_name')}}" name="detail_last_name" required>
        <input type="number" placeholder="{{__('app.mobile_phone')}}" name="detail_phone" required>
        <input type="text" placeholder="{{__('app.address')}}" name="detail_address" required>
        <input type="number" placeholder="{{__('app.personal_id')}}" name="detail_personal_id" required>
    </div>

    <div class="confirm-info" >
        <input type="checkbox" id="confirm" name="detail_confirm" required>
        <label for="confirm">{{__('app.read_terms')}}</label>
    </div>

    <button class="details__form-btn" id="sendEmailBtn">{{__('app.submit_application')}}</button>

</form>
