jQuery(document).ready( function($) {

      jQuery('.select_image_button').click(function(e) {

             e.preventDefault();
             //check which button was clicked
             var id = $(this).attr('id');
             //set the target url field
             var target_url_field = id.replace("select_image_button", "img_url");
             var target_id_field = id.replace("select_image_button", "img_id");
             var image_frame;
             if(image_frame){
                 image_frame.open();
             }
             // Define image_frame as wp.media object
             image_frame = wp.media({
                           title: 'Select Media',
                           multiple : false,
                           library : {
                                type : 'image',
                            }
                       });

                       image_frame.on('close',function() {
                          // On close, get selections and save to the hidden input
                          // plus other AJAX stuff to refresh the image preview
                          var selection =  image_frame.state().get('selection').first();
                          jQuery('input#'.concat(target_id_field)).val(selection.id);
                          jQuery('input#'.concat(target_url_field)').val(selection.url);
                          Refresh_Image(val(selection.id),id.slice(id.length -2));
                       });

                      image_frame.on('open',function() {
                        // On open, get the id from the hidden input
                        // and select the appropiate images in the media manager
                        var selection =  image_frame.state().get('selection');
                        var id = jQuery('input#'.concat(target_id_field)).val();
                        var attachment = wp.media.attachment(id);
                        attachment.fetch();
                        selection.add( attachment ? [ attachment ] : [] );
                      });

                    image_frame.open();
     });

});

// Ajax request to refresh the image preview
function Refresh_Image(the_id,the_target){
        var data = {
            action: 'refresh_sample_image',
            id: the_id,
            target: the_target
        };

        jQuery.get(ajaxurl, data, function(response) {

            if(response.success === true) {

                jQuery('#img_preview_'.concat(target)).replaceWith( response.data.image );
            }
        });
}
