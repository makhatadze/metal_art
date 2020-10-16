<div id="sell-car-modal">
    <form class="modal__form" onsubmit="return false;">

        <button class="close-modal-btn"><img src="{{url('frontend-assets/img/logos/ios-close.svg')}}" alt="">
        </button>

        <h1 class="modal__form-heading">
            მანქანის გაყიდვა
        </h1>

        <p class="modal__form-p">
            მანქანის გასაყიდად დაგვიკავშირდით მითითებულ ნომერზე ან მოგვწერეთ მეილზე
        </p>

        <div class="modal__form-info">
            <p>
                <img src="{{url('frontend-assets/img/logos/pur-phone-alt.svg')}}" alt="">
                +995 555 555 555
            </p>
            <p>
                <img src="{{url('frontend-assets/img/logos/pur-ios-mail.svg')}}" alt="">
                autohome@example.com
            </p>
        </div>

        <p class="modal__form-p">
            ან შეავსეთ განცხადების ფორმა და ჩვენი ოპერატორი დაგიკავშირდებათ
        </p>

        <div class="modal__form-input-grid">
            <input type="text" placeholder="სახელი" name="first_name" required>
            <input type="text" placeholder="გვარი" name="last_name" required>

            <input type="number" placeholder="პირადობის ნომერი" name="personal_id" required>
            <input type="number" placeholder="ტელეფონის ნომერი" name="phone" required>

            <input type="email" placeholder="ელ-ფოსტის მისამართი" name="email" required>

            <input type="date" id="birthday" placeholder="დაბადების თარიღი" name="birthday" required>
        </div>

        <div class="confirm-info">
            <input type="checkbox" name="confirm" id="confirm-1" required>
            <label for="confirm-1">გავეცანი პირობებს და ვადასტურებ ჩემს მიერ მოწოდებული ინფორმაციის უტყუარობას</label>
        </div>

        <button class="modal__form-btn">განაცხადის გაგზავნა</button>

    </form>
</div>
<!-- animation on subbmit request -->
<div class="submit-box">
    <div class="submit-content">იგზავნება...</div>
</div>

<div class="success-box">
    <div class="submit-content">გაგზავნილია!</div>
</div>

<div class="error-box">
    <div class="submit-content">შეცდომა!</div>
</div>