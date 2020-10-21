
// section 2
// vip sales slider
$('.vip-sales__slider').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 1500,
    slidesToShow: 4,
    slidesToScroll: 1,
    speed: 1000,
    arrows: true,
    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 660,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
  

  // with class - for sliders copyied items
// dollar - gel switch active class
function changecurrencyClass($id, $cur, id,dolarValue,realValue){
    let amount = realValue;
    if ($cur === 'dol') {
        amount = amount * dolarValue;
    }
    amount = `${parseInt(amount)}`;

    amount = amount.split('').reverse().join('').match(/.{1,3}/g).map(function (x) {
        return x.split('').reverse().join('')
    }).reverse()
    amount = amount.join(',')
    let sel = `.gel-${id}`;
    $(sel).text(amount);
  // clear both
  $('.'+$id+' .select-dol').removeClass('active');
  $('.'+$id+' .select-gel').removeClass('active');

  // add to selected - $(#curr2 .select-gel) -dol)
  $('.'+$id+' .select-'+$cur).addClass('active');
}

  // with di  - for normal items
// dollar - gel switch active class
function changecurrency($id, $cur, id,dolarValue,realValue){
    let amount = realValue;
    if ($cur === 'dol') {
        amount = amount * dolarValue;
    }
    amount = `${parseInt(amount)}`;

    amount = amount.split('').reverse().join('').match(/.{1,3}/g).map(function (x) {
        return x.split('').reverse().join('')
    }).reverse()
    amount = amount.join(',')
    let sel = `.gel-${id}`;
    $(sel).text(amount);
    // clear both
  $('#'+$id+' .select-dol').removeClass('active');
  $('#'+$id+' .select-gel').removeClass('active');

  // add to selected - $(#curr2 .select-gel) -dol)
  $('#'+$id+' .select-'+$cur).addClass('active');
}
