$(document).ready( function() {

    $('.modal').modal();
    $('select').formSelect();

  $('.materialboxed').materialbox();
    $('.tabs').tabs();
    $('.tabs').tabs('swipeable',true);

 $('.owl-carousel').owlCarousel({
    autoplay: true,
    items: 4,
    margin: 10,
    nav: true,
    dots: true,
    loop: true,
    lazyLoad: true,
    stagePadding: 5,
    responsive: {
        0: {
            items: 1,
            dots: true
        },
        485: {
            items: 2,
            dots: true
        },
        728: {
            items: 3,
            dots: true
        },
        960: {
            items: 4,
            dots: true
        },
        1200: {
            items: 5,
            dots: true
        }
    },
 });


   // $(".center").slick({
   //      dots: true,
   //      infinite: true,
   //      centerMode: true,
   //      slidesToShow: 5,
   //      slidesToScroll: 3
   //    });






});
	






//SIDE NAVIGATION
const sidenav = document.querySelector('.sidenav');
M.Sidenav.init(sidenav, {});

//HOME-PAGE SLIDER
const slider = document.querySelector('.slider');
M.Slider.init(slider, {
    indicators: false,
    height: 400,
    transition: 500,
    interval: 4000

});


// document.addEventListener('DOMContentLoaded', function () {
//     var elems = document.querySelectorAll('.modal');
//     var instances = M.Modal.init(elems, options);
// });


