$(document).ready(function () {
  $('.menu-button').click(function (ev) {
    ev.preventDefault();
    $(this).toggleClass('active');
    $('.sidenav').toggleClass('visible');
    $('.sidenav-background').toggleClass('visible');
  });
});
