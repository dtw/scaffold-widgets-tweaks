// automatically scrolls to the top of the active accordion panel
jQuery(document).ready(function(){
  jQuery('.panel-collapse').on('shown.bs.collapse', function(event) {
    var $panel = jQuery(this).closest('.panel');
    jQuery('html,body').animate({
      scrollTop: ($panel.offset().top - jQuery('.navbar').outerHeight())
    }, 250);
  });
});
