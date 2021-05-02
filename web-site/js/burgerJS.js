$(document).ready(function() {
  $('.fa-bars').click(function(event) {
    $('.menu-background').toggleClass('active-for-menu-background');
    // $('.menu').toggleClass('active-menu');
    setTimeout(function(){
      $('.left-menu').toggleClass('move-left-menu');
    }, 1);

    $('html').toggleClass('lock');
  });

  // $('.fa-times').click(function(event) {
  //   $('.menu-background').toggleClass('active-for-menu-background');
  //   setTimeout(function(){
  //     $('.menu').toggleClass('move-menu');
  //   }, 1);
  //   setTimeout(function(){
  //     $('.menu').toggleClass('active-menu');
  //   }, 500);
  //
  //   $('html').toggleClass('lock');
  // });

  $('.menu-background').click(function(event) {
    $('.menu-background').toggleClass('active-for-menu-background');
    setTimeout(function(){
      $('.left-menu').toggleClass('move-left-menu');
    }, 1);
    // setTimeout(function(){
    //   $('.menu').toggleClass('active-menu');
    // }, 500);

    $('html').toggleClass('lock');
  });
});
