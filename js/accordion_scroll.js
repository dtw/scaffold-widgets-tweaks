// automatically scrolls to the top of the active accordion panel
$(document).ready(function(){
  $('.panel-collapse').on('shown.bs.collapse', function(event) {
    var $panel = $(this).closest('.panel');
    $('html,body').animate({
    }, 500);
      scrollTop: ($panel.offset().top - $('.navbar').outerHeight())
  });
});

