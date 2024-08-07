$(window).preloader({
    delay: 300
});
//     preloader js

$(".dash-main-menu > li > p").click(function() {

    if (false == $(this).next().is(':visible')) {
        $('.dash-main-menu ul').slideUp(700);
    }
    $(this).next().slideToggle(700);
});

var url = window.location.href;
var $current = $('.dash-main-menu li ul li a[href="' + url + '" ]');
$current.parents('.dash-main-menu ul').slideToggle();
$current.next('.dash-main-menu ul').slideToggle();


$(".main-toggle-btn").click(function() {
    $(".sidebar").animate({
        width: "toggle"
    });
});
$(".main-toggle-btn").click(function() {
    $(".main-content").toggleClass("main-cont-width");
});



$(".sidebar-collapse-menu").click(function() {
    $(".sidebar").animate({
        width: "toggle"
    });
});
$(".sidebar-collapse-menu").click(function() {
    $(".main-content").toggleClass("main-cont-width");
});



//    mobile sidemenu

$(".main-toggle-btn-mobile").click(function() {
    $(".sidebar").addClass("m-sidebar-active");
});
$(".body-dark-mobile").click(function() {
    $(".sidebar").removeClass("m-sidebar-active");
});
$(".main-toggle-btn-mobile").click(function() {
    $(".body-dark-mobile").addClass("body-dark-mobile-active");
});
$(".body-dark-mobile").click(function() {
    $(".body-dark-mobile").removeClass("body-dark-mobile-active");
});

$(".main-toggle-btn-mobile").click(function() {
    $("body").addClass("non-scroll-body");
});
$(".menu-cross").click(function() {
    $("body").removeClass("non-scroll-body");
});
