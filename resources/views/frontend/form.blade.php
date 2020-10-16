<form class="details-section__form" onsubmit="return false;">
    <h1 class="details__form-heading">
        შეავსე განაცხადი
        <img src="./img/logos/i-document-orang.svg" alt="">
    </h1>

    <div class="details__form-input-grid">
        <input type="text" placeholder="სახელი" name="detail_first_name" required>
        <input type="text" placeholder="გვარი" name="detail_last_name" required>

        <input type="number" placeholder="პირადობის ნომერი" name="detail_personal_id" required>
        <input type="number" placeholder="ტელეფონის ნომერი" name="detail_phone" required>

        <input type="email" placeholder="ელ-ფოსტის მისამართი" name="detail_email" required>

        <input type="date"   id="details-birthday" name="detail_birthday" required>
    </div>

    <div class="confirm-info" >
        <input type="checkbox" id="confirm" name="detail_confirm" required>
        <label for="confirm">გავეცანი პირობებს და ვადასტურებ ჩემს მიერ მოწოდებული ინფორმაციის უტყუარობას</label>
    </div>

    <button class="details__form-btn" id="sendEmailBtn">განაცხადის გაგზავნა</button>

</form>
