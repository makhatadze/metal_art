// for all apges

// navbar  dropdown

const menuBtn = document.querySelector('#menu');
const closeMenuBtn = document.querySelector('#close');
const btnsWrapper = document.querySelector('.dropdown-btns');
const Menu = document.querySelector('.nav-navbar');
const header = document.querySelector('.nav');


menuBtn.addEventListener('click', () => {
    btnsWrapper.classList.add('open');
    Menu.classList.add('show-m')
})
closeMenuBtn.addEventListener('click', () => {
    btnsWrapper.classList.remove('open');
    Menu.classList.remove('show-m')
})

// close dropdown on outside click 
$(document).click(function(){
    btnsWrapper.classList.remove('open');
    Menu.classList.remove('show-m')
  });
$("#menu").click(function(e){
    e.stopPropagation();
});


/* --------------  about us Modal ---------  */

const modal = document.querySelector('#about-modal');

const aboutModal = document.querySelector('.hello-about-btn');
const navLinks = document.querySelectorAll('.navbar-link');
const closeModalB = document.querySelector('.close-btn');


// from nav
navLinks[1].addEventListener('click', () => {
    navLinks[1].classList.add('active');

    modal.classList.add('visible');
});
// close
closeModalB.addEventListener('click', () => {
    navLinks[1].classList.remove('active');
    modal.classList.remove('visible');
});


// close by clicking outside of about-m
window.addEventListener('click', (e)=> {
    if(e.target == modal) {
        navLinks[1].classList.remove('active');
        modal.classList.remove('visible');
    }
});


