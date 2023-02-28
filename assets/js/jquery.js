window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function mah () {
    x = document.getElementById("nav-bar").offsetLeft;
    xn = x + 50;
    document.getElementById("nav-bar").style.left = xn+"px"
};