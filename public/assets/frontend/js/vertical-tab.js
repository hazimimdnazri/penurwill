/************************ Vertical Tab ***************************/
var button = document.getElementsByClassName('but'),
  tabContent = document.getElementsByClassName('tab-content');
button[0].classList.add('active');
tabContent[0].style.display = 'block';
function city(e, city) {
  var i;
  for (i = 0; i < button.length; i++) {
    tabContent[i].style.display = 'none';
    button[i].classList.remove('active');
  }
  document.getElementById(city).style.display = 'block';
  e.currentTarget.classList.add('active');
}
const modal = document.querySelector("#modal");
const body = document.querySelector("body");
const showModal = function (e) {
  modal.classList.toggle("hidden");
  if (!modal.classList.contains("hidden")) {
    body.style.overflow = "hidden";
  } else {
    body.style.overflow = "auto";
  }
};

