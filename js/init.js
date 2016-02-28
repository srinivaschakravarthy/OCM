(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('select').material_select();
  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {

  var owl = $("#courses-carousel");

  owl.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });

  // Custom Navigation Events
    $(".play").mouseover(function(){
        owl.trigger('owl.stop');
    });
    $(".play").mouseout(function(){
        owl.trigger('owl.play',2000);
    });
});

$(document).ready(function() {

  var owl = $("#lecturers-carousel");

  owl.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });

  // Custom Navigation Events
    $(".play").mouseover(function(){
        owl.trigger('owl.stop');
    });
    $(".play").mouseout(function(){
        owl.trigger('owl.play',2000);
    });
});

$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year
      format: 'yyyy-mm-dd'
	  });
