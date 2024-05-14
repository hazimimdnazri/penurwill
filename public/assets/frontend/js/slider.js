$(document).ready(function () {
$('.silk_slider_circular').slick({
  dots: true,
  infinite: true,
  speed: 500,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: false,
  responsive: [
  {
    breakpoint: 1200,
    settings: {
      slidesToShow: 3,
    }
  },
  {
    breakpoint: 991,
    settings: {
      slidesToShow: 2,
    }
  },
  {
    breakpoint: 500,
    settings: {
      slidesToShow: 1,
    }
  },
  ]
});

$('.client-test-v4 .testimonial-slide').slick({
  dots: false,
  infinite: true,
  speed: 500,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: false
});

$('.single-services-slide').slick({
  dots: false,
  infinite: true,
  speed: 500,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: true,
  nextArrow: '<div class="slick-custom-arrow slick-custom-arrow-right"><i class="ri-arrow-right-s-line"></i></div>',
  prevArrow: '<div class="slick-custom-arrow slick-custom-arrow-left"><i class="ri-arrow-left-s-line"></i></div>'
});

$('.secure-card-slider').slick({
  dots: true,
  infinite: true,
  speed: 500,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: false,
  responsive: [{
    breakpoint: 1199,
    settings: {
      slidesToShow: 3,
    }
  },
  {
    breakpoint: 991,
    settings: {
      slidesToShow: 3,
    }
  },
  {
    breakpoint: 781,
    settings: {
      slidesToShow: 2,
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 1,
    }
  },
  ]
});

});