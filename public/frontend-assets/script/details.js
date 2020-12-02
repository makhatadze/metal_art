
            // section 1 - how to order Modal  ;

// open modal 
const orderModal = document.querySelector('#order-modal');
const orderBtnOpen = document.querySelector('.order-btn');
const orderBtnClose = document.querySelector('.close-order-modal');


orderBtnOpen.addEventListener('click', ()=> {
    orderModal.classList.add('show-order-m')
});

orderBtnClose.addEventListener('click', ()=> {
    orderModal.classList.remove('show-order-m')
})

// close by clicking outside of vid
window.addEventListener('click', (e)=> {
    if(e.target == orderModal) {
        orderModal.classList.remove("show-order-m");
    }
});


            // section 2 - choose category ;
const categoryBtns = document.querySelectorAll('.products-btn');

for(let i=0; i<categoryBtns.length; i++) {

    categoryBtns[i].addEventListener('click', () => {
        for(let i=0; i<categoryBtns.length; i++) {
            categoryBtns[i].classList.remove('selected');   
        }
        categoryBtns[i].classList.add('selected');
    });
};


// section 2 - slider ;

$(document).ready(function(){

    $('.products-slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1300,
        arrows: true,
        dots: false,
        responsive: [
            {
              breakpoint: 1400,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false
              }
            },
            {
              breakpoint: 1000,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false
              }
            },
            {
                breakpoint: 740,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  dots: false
                }
              }
              ,
            {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  dots: false
                }
              }
        ]
        
    });
});
