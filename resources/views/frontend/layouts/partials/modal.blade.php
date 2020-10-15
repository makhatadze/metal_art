<div id="sell-car-modal">
    <form class="modal__form">

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
            <input type="text" placeholder="სახელი" required>
            <input type="text" placeholder="გვარი" required>

            <input type="number" placeholder="პირადობის ნომერი" required>
            <input type="number" placeholder="ტელეფონის ნომერი" required>

            <input type="email" placeholder="ელ-ფოსტის მისამართი" required>

            <input type="date" id="birthday" name="დაბადების თარიღი" required>
        </div>

        <div class="confirm-info">
            <input type="checkbox" id="confirm-1" required>
            <label for="confirm-1">გავეცანი პირობებს და ვადასტურებ ჩემს მიერ მოწოდებული ინფორმაციის უტყუარობას</label>
        </div>

        <button class="modal__form-btn">განაცხადის გაგზავნა</button>

    </form>
</div>
