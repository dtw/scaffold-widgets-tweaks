jQuery(document).ready(function ($) {
  // huge thanks to https://vedmant.com/using-wordpress-media-library-in-widgets-options/
  $(document).on("click", ".select-image-button", function (e) {
    e.preventDefault();
    var $button = $(this);
    // get id of button
    var button_id = $(this).attr('id');
    // get the image preview field id
    var img_preview_id = button_id.replace("select_image_button", "img_preview");
    // get img_id field id
    var img_id_id = button_id.replace("select_image_button", "img_id");
    // Create the media frame.
    var file_frame = wp.media.frames.file_frame = wp.media({
      title: 'Select or upload image',
      library: { // remove these to show all
        type: 'image' // specific mime
      },
      button: {
        text: 'Select'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on('select', function () {
      // We set multiple to false so only get one image from the uploader
      var attachment = file_frame.state().get('selection').first().toJSON();
      console.log('ID: '+attachment.id);
      // refresh preview
      // this doesn't work now we use thumbnail
      //jQuery('#'+img_preview_id).attr('src',attachment.url ).change();
      //console.log('#'+img_id_id);
      // update img_id field
      jQuery('#'+img_id_id).attr('value',attachment.id ).change();
      //console.log('Attach ID'+attachment.id);
      //console.log('Img Preview ID'+img_preview_id)
      //refresh_image_preview(attachment.id,img_preview_id);
    });

    // Finally, open the modal
    file_frame.open();
  });
});
