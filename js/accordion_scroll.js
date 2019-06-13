// automatically scrolls to the top of the active accordion panel
  jQuery('.panel-collapse').on('shown.bs.collapse', function(event) {
    var $panel = $(this).closest('.panel');
    jQuery('html,body').animate({
      scrollTop: $panel.offset().top
    }, 500);
  });

