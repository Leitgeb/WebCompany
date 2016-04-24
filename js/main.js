//Smooth scroll navigation 
$(document).ready(function(){
  function NavScroll(elem) {
      $(elem).on('click', function(event) {

    event.preventDefault();

    var hash = this.hash;

    $('html, body').animate({
        scrollTop: $(hash).offset().top
    }, 900, function(){

        window.location.hash = hash;
        });
    });
  }
  
  NavScroll(".main-nav a");
  NavScroll(".menu-panel a");  
  
}); //End smooth scroll navigation

// Hide NavBar on scroll
$(window).scroll(function() {

    if ($(this).scrollTop()>0)
     {
        $('.main-nav').fadeOut();
        $('.menu').fadeIn();
     }
    else
     {
      $('.main-nav').fadeIn();
      $('.menu').fadeOut();       
     }
 }); //End hide function
 
 // Popover Menu
 $(document).ready(function(){
     $('.menu').click(function(){
         $('.menu-panel').animate({right: '20%'}, 'fast');
         $('.menu').fadeOut();
     });
     
     $('.close').click(function(){
         $('.menu-panel').animate({right: '0%'}), 'fast';
         $('.menu').fadeIn('slow');
     })
 });// End Popover Menu

//Slide in Animation
$(window).scroll(function() {
  $(".slide-animation").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
}); //End Slide in Animation