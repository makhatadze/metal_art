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
    let personal_id = $('input[name="personal_id"]').val();
    let phone = $('input[name="phone"]').val();
    let email = $('input[name="email"]').val();
    let birthday = $('input[name="birthday"]').val();
    let confirm = $('input[name="confirm"]').val();

    let check = /\S+@\S+\.\S+/;
    let emailStatus = check.test(email);


    if (first_name && last_name && phone && email && personal_id && birthday && emailStatus && confirm) {
        $.ajax({
            type: 'GET',
            url: '/send-email',
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'personal_id': personal_id,
                'phone': phone,
                'email': email,
                'birthday': birthday,
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
    let personal_id = $('input[name="detail_personal_id"]').val();
    let phone = $('input[name="detail_phone"]').val();
    let email = $('input[name="detail_email"]').val();
    let birthday = $('input[name="detail_birthday"]').val();
    let confirm = $('input[name="detail_confirm"]').val();

    let check = /\S+@\S+\.\S+/;
    let emailStatus = check.test(email);


    if (first_name && last_name && phone && email && personal_id && birthday && emailStatus && confirm) {
        $.ajax({
            type: 'GET',
            url: '/send-email',
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'personal_id': personal_id,
                'phone': phone,
                'email': email,
                'birthday': birthday,
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