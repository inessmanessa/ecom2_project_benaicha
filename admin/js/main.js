document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
});

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
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

function delete() {
    return confirm('Do you want to delete this listing?');
}