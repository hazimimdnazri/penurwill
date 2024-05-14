$('.testimonial-slide').slick({
  dots: false,
  infinite: true,
  speed: 500,
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: true,
  responsive: [{
    breakpoint: 600,
    settings: {
      slidesToShow: 1,
    }
  },
  ]
});