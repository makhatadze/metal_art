
// navbar sticky

let navbar = document.querySelector("header");
let sticky = navbar.offsetTop;

window.onscroll = function() {

  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }

};

// nav dropdown close/hide 
const menuIcon = document.querySelector('.menu-icon');
const mainNavigation = document.querySelector('.navigation');

menuIcon.addEventListener('click', ()=> {
    menuIcon.classList.toggle('close-i');
    mainNavigation.classList.toggle('show-nav');
});


// close navigation with outside click
window.addEventListener('click', (e)=> {

  if(e.target !== mainNavigation && e.target !== menuIcon ) {
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
    if(e.target == sellModal) {
        sellModal.classList.remove('show');
    }
});


// modal - input[date] change color on selected
$('#birthday').change(function(){

  if($('#birthday').val() ){
    $('#birthday').css("color", "#FD8D0F");
  }

});


// --------- animation on subbmit request

const modalSubmit = $('.modal__form-btn');
const modalS = $('#sell-car-modal');

// modalSubmit.click(function() {
  
//   $('.submit-box').addClass('active');

//   modalS.removeClass('show');

//   setTimeout( ()=> {
//     $('.submit-box').removeClass('active');

//     $('.success-box').addClass('active');
    
//     setTimeout( ()=> {
//       $('.success-box').removeClass('active');
//     },1000);

//   },3000)

// });
