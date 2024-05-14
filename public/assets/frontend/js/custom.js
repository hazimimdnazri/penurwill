
/************************ Form placeholder effect ***************************/
$('.floating-placeholder[placeholder]').placeholderLabel({
  // placeholder color
  placeholderColor: "rgba(0,0,0,.5)",
  // label color
  labelColor: "rgba(0,0,0,.7)",
  // size of label
  labelSize: "inherit",
  // font style
  fontStyle: "normal",
  // uses border color
  useBorderColor: false,
  // displayed in the input
  inInput: true,
  // time to move
  timeMove: 150
});
$('.floating-placeholder').prev('label').css({
  'pointer-events': 'none',
  'font-weight': 'normal'
});

/************************ Add to any ***************************/
var a2a_config = a2a_config || {};
a2a_config.num_services = 12;
a2a_config.prioritize = ["facebook", "twitter", "google_plus", "email", "reddit", "whatsapp", "google_gmail", "evernote", "flipboard", "google_bookmarks", "outlook_com"];

/************************ Video background play button ***************************/
$('#play-video').on('click', function (e) {
  e.preventDefault();
  $('#video-overlay').addClass('open');
  $("#video-overlay").append('<iframe width="960" height="450" src="https://www.youtube.com/embed/rFygb2YoQ0A?si=aq0hJDXfHqMgbP4E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
});
$('.video-overlay, .video-overlay-close').on('click', function (e) {
  e.preventDefault();
  close_video();
});
$(document).keyup(function (e) {
  if (e.keyCode === 27) { close_video(); }
});
function close_video() {
  $('.video-overlay.open').removeClass('open').find('iframe').remove();
};

$(".js-overlay-start").unbind("click").bind("click", function (e) {
  e.preventDefault();
  var src = $(this).attr("data-url");
  $(".overlay-video").show();
  setTimeout(function () {
    $(".overlay-video").addClass("o1");
    $("#player").attr("src", src);
  }, 100);
});

$(".overlay-video").click(function (event) {
  if (!$(event.target).closest(".videoWrapperExt").length) {
    var PlayingVideoSrc = $("#player").attr("src").replace("&autoplay=1", "");
    $("#player").attr("src", PlayingVideoSrc);
    $(".overlay-video").removeClass("o1");
    setTimeout(function () {
      $(".overlay-video").hide();
    }, 600);
  }
});

$(".close").click(function (event) {
  var PlayingVideoSrc = $("#player").attr("src").replace("&autoplay=1", "");
  $("#player").attr("src", PlayingVideoSrc);
  $(".overlay-video").removeClass("o1");
  setTimeout(function () {
    $(".overlay-video").hide();
  }, 600);

});


/*-------------------------------------Specific Function-------------------------------------*/
function reveal1() {
  var reveals = document.querySelectorAll(".reveal1");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;
    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}
window.addEventListener("scroll", reveal1);

















