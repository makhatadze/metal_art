<form class="details-section__form">
    <h1 class="details__form-heading">
        შეავსე განაცხადი
        <img src="./img/logos/i-document-orang.svg" alt="">
    </h1>

    <div class="details__form-input-grid">
        <input type="text" placeholder="სახელი" required>
        <input type="text" placeholder="გვარი" required>

        <input type="number" placeholder="პირადობის ნომერი" required>
        <input type="number" placeholder="ტელეფონის ნომერი" required>

        <input type="email" placeholder="ელ-ფოსტის მისამართი" required>

        <input type="date"   id="details-birthday" name="დაბადების თარიღი" required>
    </div>

    <div class="confirm-info" >
        <input type="checkbox" id="confirm" required>
        <label for="confirm">გავეცანი პირობებს და ვადასტურებ ჩემს მიერ მოწოდებული ინფორმაციის უტყუარობას</label>
    </div>

    <button class="details__form-btn">განაცხადის გაგზავნა</button>

</form>
