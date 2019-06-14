// automatically scrolls to the top of the active accordion panel
$(document).ready(function(){
  $('.panel-collapse').on('shown.bs.collapse', function(event) {
    var $panel = $(this).closest('.panel');
    $('html,body').animate({
      scrollTop: ($panel.offset().top - 76)
    }, 500);
  });
});

