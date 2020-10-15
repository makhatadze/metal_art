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

// dollar - gel switch active class
function changecurrency($id, $cur){
  // clear both
  $('#'+$id+' .select-dol').removeClass('active');
  $('#'+$id+' .select-gel').removeClass('active');

  // add to selected - $(#curr2 .select-gel) -dol)
  $('#'+$id+' .select-'+$cur).addClass('active');
}