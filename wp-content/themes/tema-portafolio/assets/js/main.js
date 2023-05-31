$ = jQuery;
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
var isMobilTabled = (jQuery(window).width() < 1024) ? true : false;
var isMobil = window.matchMedia("only screen and (max-width: 760px)").matches;

$('.openMenu').click(function (e) {
    e.preventDefault();
    $('.hamburger').addClass("is-active"); 
});