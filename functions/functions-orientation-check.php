<?php
	function orientation_check($image_id) {
    $image_attributes = wp_get_attachment_image_src( $attachment_id = $image_id, 'full' );
    // returns url, width, height, is_intermediate
    if ((abs($image_attributes[1] - $image_attributes[2])) <= 10) {
      // it's roughly square
      return 'sq';
    } elseif ($image_attributes[1] > $image_attributes[2]) {
      // it's landscape
      return 'ls';
    } else {
      // must be portrait
      return 'pt';
    }
  }
?>
