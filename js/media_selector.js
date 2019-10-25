jQuery(document).ready(function ($) {
  // huge thanks to https://vedmant.com/using-wordpress-media-library-in-widgets-options/
  $(document).on("click", ".select-image-button", function (e) {
    e.preventDefault();
    var $button = $(this);

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
      // add .change() so WordPress knows the field changed
      $button.siblings('input').val(attachment.url).change();
      // refresh preview
      jQuery('#image_upload_preview').attr('src',attachment.url ).change();
    });

    // Finally, open the modal
    file_frame.open();
  });
});
