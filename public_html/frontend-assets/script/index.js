// hero slider ----

$(document).ready(function(){

    $('.hero-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1300,
        arrows: true,
        dots: false,
        responsive: [
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: false
              }
            },
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


// video btn follow ---

const box = document.querySelector('.video-box')
const videoBtn = document.querySelector('.video-btn')


videoBtn.addEventListener('mousemove', (e)=> {
    let w = window.innerWidth;
    if(w <700){
      return;
    }
    let xPos = e.clientX - (box.offsetLeft ) ;
    let yPos = e.pageY - (box.offsetTop ) ;

    let width =box.getBoundingClientRect().width;
    let height =box.getBoundingClientRect().height;

    if(e.target == videoBtn) {

      videoBtn.style.left = xPos/ width * 100 + "%";
      videoBtn.style.top =  yPos/ height * 100 + "%";

    // if out of box reset !
    }else if (xPos < 0  ||  xPos > width || yPos < 0  ||  yPos > height ) {
        videoBtn.style.left = 50 + "%";
        videoBtn.style.top =  50 + "%";
    }
  
  })




// Video Modal   open / close
const videoModal = document.querySelector('#video-modal');
const closeVideoBtn = document.querySelector('.video-close-btn');

const videos = document.querySelectorAll('iframe');

videoBtn.addEventListener('click', ()=> {
    videoModal.classList.add('show-video');
   
})
closeVideoBtn.addEventListener('click', ()=> {
    videoModal.classList.remove('show-video');
    
    // stop video
    videos.forEach(i => {
      let source = i.src;
      i.src = '';
      i.src = source;
   });
 
})

// close by clicking outside of vid
window.addEventListener('click', (e)=> {
    if(e.target == videoModal) {
        videoModal.classList.remove("show-video");
    }
});



//  ***** open About modal from index.html - last section  ******
aboutModal.addEventListener('click', () => {
    modal.classList.add('visible');
    navLinks[1].classList.add('active');
});