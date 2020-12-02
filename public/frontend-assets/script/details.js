// section 2
// vip sales slider
$('.details-slider').slick({
    infinite: true,
    autoplaySpeed: 1200,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    arrows: true,
    centerMode: true,
    centerPadding: '500px',
    responsive: [
      {
        breakpoint: 1500,
        settings: {
          slidesToShow: 1,
          centerPadding: '300px',
        }
      },

      {
        breakpoint: 990,
        settings: {
          slidesToShow: 1,
          centerPadding: '200px',
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1,
          centerPadding: '43px',
        }
      }
    ]
  });


// section 2 main

//  input[date] selected
$('#details-birthday').change(function(){
  if($('#details-birthday').val()){
    $('#details-birthday').css("color", "#FD8D0F");
  }
});


      // ------ section 4 - u might like
function changecurrencyvips($id,$cur,id,dolarValue,realValue) {
    let amount = realValue;
    if ($cur === 'dol') {
        amount = amount * dolarValue;
    }
    amount = `${parseInt(amount)}`;

    amount = amount.split('').reverse().join('').match(/.{1,3}/g).map(function (x) {
        return x.split('').reverse().join('')
    }).reverse()
    amount = amount.join(',')
    let sel = `.vip-gel-${id}`;
    $(sel).text(amount);
    // clear both
    $('#'+$id+' .select-dol').removeClass('active');
    $('#'+$id+' .select-gel').removeClass('active');

    // add to selected - $(#curr2 .select-gel) -dol)
    $('#'+$id+' .select-'+$cur).addClass('active');
}


function changecurrencynews($id,$cur,id,dolarValue,realValue) {
    let amount = realValue;
    if ($cur === 'dol') {
        amount = amount * dolarValue;
    }
    amount = `${parseInt(amount)}`;

    amount = amount.split('').reverse().join('').match(/.{1,3}/g).map(function (x) {
        return x.split('').reverse().join('')
    }).reverse()
    amount = amount.join(',')
    let sel = `.new-gel-${id}`;
    $(sel).text(amount);
    // clear both
    $('#'+$id+' .select-dol').removeClass('active');
    $('#'+$id+' .select-gel').removeClass('active');

    // add to selected - $(#curr2 .select-gel) -dol)
    $('#'+$id+' .select-'+$cur).addClass('active');
}

const slidesModal = document.querySelectorAll('.slider-modal');

function showImg(num) {
    slidesModal[num -1].classList.add('show');
}


window.addEventListener('click', evt => {
    slidesModal.forEach((e, i)=> {
        if(evt.target == slidesModal[i] ) {
            e.classList.remove('show');
        }
    })

})