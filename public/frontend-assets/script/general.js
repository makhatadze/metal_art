// navbar sticky

let navbar = document.querySelector("header");
let sticky = navbar.offsetTop;

window.onscroll = function () {

    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }

};

// nav dropdown close/hide 
const menuIcon = document.querySelector('.menu-icon');
const mainNavigation = document.querySelector('.navigation');

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle('close-i');
    mainNavigation.classList.toggle('show-nav');
});


// close navigation with outside click
window.addEventListener('click', (e) => {

    if (e.target !== mainNavigation && e.target !== menuIcon) {
        menuIcon.classList.remove('close-i');
        mainNavigation.classList.remove('show-nav');
    }
});


// --------- Modal show / hide

const sellModal = document.querySelector('#sell-car-modal');
const openModalBtn = document.querySelector('.sell-modal-btn');
const closeModalBtn = document.querySelector('.close-modal-btn');

// close modal
closeModalBtn.addEventListener('click', () => {
    sellModal.classList.remove('show');
});
// open modal 
openModalBtn.addEventListener('click', () => {
    sellModal.classList.add('show');
});

// close modal by outside click
window.addEventListener('click', (e) => {
    if (e.target == sellModal) {
        sellModal.classList.remove('show');
    }
});


// modal - input[date] change color on selected
$('#birthday').change(function () {

    if ($('#birthday').val()) {
        $('#birthday').css("color", "#FD8D0F");
    }

});


// --------- animation on subbmit request

const modalSubmit = $('.modal__form-btn');
const modalS = $('#sell-car-modal');

modalSubmit.click(function () {
    let first_name = $('input[name="first_name"]').val();
    let last_name = $('input[name="last_name"]').val();
    let phone = $('input[name="phone"]').val();
    let address = $('input[name="address"]').val();
    let description = $('input[name="description"]').val();
    let confirm = $('input[name="confirm"]').val();


    if (first_name && last_name && phone && address && description &&  confirm) {
        $.ajax({
            type: 'GET',
            url: '/send-email',
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'address': address,
                'phone': phone,
                'description': description,
            },
            beforeSend: function () {
                $('.submit-box').addClass('active');
            },
            success: function (data) {
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.success-box').addClass('active');
                    $(':input', '.modal__form')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                    modalS.removeClass('show');
                }, 1000);
            },
            error: function (xhr) { // if error occured
                console.log(111)
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.error-box').addClass('active');
                }, 1000);
            },
            complete: function () {
                setTimeout(() => {
                    $('.success-box').removeClass('active');
                    $('.error-box').removeClass('active');
                }, 2500);
            },
        });

    }
});

$('#sendEmailBtn').on('click',function () {
    let first_name = $('input[name="detail_first_name"]').val();
    let last_name = $('input[name="detail_last_name"]').val();
    let phone = $('input[name="detail_phone"]').val();
    let address = $('input[name="detail_address"]').val();

    if (first_name && last_name && phone && address && confirm) {
        $.ajax({
            type: 'GET',
            url: '/send-loan',
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'phone': phone,
                'address': address,
                'url': location.href
            },
            beforeSend: function () {
                $('.submit-box').addClass('active');
            },
            success: function (data) {
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.success-box').addClass('active');
                    $(':input', '.details-section__form')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                    modalS.removeClass('show');
                }, 1000);
            },
            error: function (xhr) { // if error occured
                console.log(111)
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.error-box').addClass('active');
                }, 1000);
            },
            complete: function () {
                setTimeout(() => {
                    $('.success-box').removeClass('active');
                    $('.error-box').removeClass('active');
                }, 2500);
            },
        });

    }
})

$('#sendMessageBtn').on('click',function () {
    console.log(1233)
    let full_name = $('input[name="message_full_name"]').val();
    let phone = $('input[name="message_phone"]').val();
    let email = $('input[name="message_email"]').val();
    let message = $('#message_message').val();

    //
    if (full_name &&  phone && message) {
        $.ajax({
            type: 'GET',
            url: '/send-message',
            data: {
                'full_name': full_name,
                'email': email,
                'phone': phone,
                'message': message,
            },
            beforeSend: function () {
                $('.submit-box').addClass('active');
            },
            success: function (data) {
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.success-box').addClass('active');
                    $(':input', '.contact__form')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                }, 1000);
            },
            error: function (xhr) { // if error occured
                setTimeout(() => {
                    $('.submit-box').removeClass('active');
                    $('.error-box').addClass('active');
                }, 1000);
            },
            complete: function () {
                setTimeout(() => {
                    $('.success-box').removeClass('active');
                    $('.error-box').removeClass('active');
                }, 2500);
            },
        });

    }
})