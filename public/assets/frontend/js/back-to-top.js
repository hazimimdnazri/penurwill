/************************ Back To Top Scroll ***************************/
$(window).scroll(function () {
  if ($(this).scrollTop() > 20) {
    $('.back-to-top').addClass('show-back-to-top');
  } else {
    $('.back-to-top').removeClass('show-back-to-top');
  }
});
$('.back-to-top').click(function () {
  $('html, body').animate({ scrollTop: 0 }, 0);
  return false;
});

/************************ Sticky Header ***************************/
$(window).scroll(function(){
  if ($(window).scrollTop() >= 20) {
    $('#header').addClass('fixed');
  }
  else {
    $('#header').removeClass('fixed');
  }
});
$(window).scroll(function(){
  if ($(window).scrollTop() >= 20) {
    $('#header2').addClass('fixed1');
  }
  else {
    $('#header2').removeClass('fixed1');
  }
});
/************************ Preloader ***************************/
$(window).on("load" , function () {
  $(".preloader").delay(100).fadeOut("slow");
});

/*-------------------------------------Anchore Tag Link Added-------------------------------------*/
$(".attorney1-link").wrap('<a href="attorneys-detail-1.html"></a>');
$(".attorney2-link").wrap('<a href="attorneys-detail-2.html"></a>');


