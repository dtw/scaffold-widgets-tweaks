<?php

/*

1 Style FORMATS
2 TinyMCE first row icons
3 TinyMCE remove second row
4 Remove H1, H5, H6 from Tiny MCE
5 Add counter (300 characters) to Excerpt box

*/


/* 1. Add style FORMATS
-------------------------------------------------------- */

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
array_unshift( $buttons, 'styleselect' );
return $buttons;
}

// Register our callback to the appropriate filter
add_filter('mce_buttons_1', 'my_mce_buttons_1');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Lead paragraph',
			'selector' => 'p',
			'classes' => 'lead',
			'wrapper' => true,
		),
		array(
			'title' => 'Button',
			'selector' => 'p > a',
			'classes' => 'btn btn-primary',
			'wrapper' => false,
			'selector' => 'p > a',
		),
		array(
			'title' => 'Call to Action',
			'classes' => 'call-to-action',
			'wrapper' => false,
		),

	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );





/* 2. TinyMCE: First line toolbar customisations
-------------------------------------------------------- */

if( !function_exists('base_extended_editor_mce_buttons') ){
	function base_extended_editor_mce_buttons($buttons) {
		// The settings are returned in this array. Customize to suite your needs.
		return array(
			'styleselect', 'formatselect', 'bold', 'italic', 'hr', 'bullist', 'numlist', 'blockquote', 'link', 'unlink', 'outdent', 'indent', 'charmap', 'removeformat', 'fullscreen', 'pastetext','wp_more'	);
	}
	add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}



/* 3. TinyMCE: Remove the Second line toolbar
-------------------------------------------------------- */

if( !function_exists('base_extended_editor_mce_buttons_2') ){
	function base_extended_editor_mce_buttons_2($buttons) {
		// An empty array is used here because I remove the second row of icons.
		return array();
	}
	add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}




/* 4. Remove H1, H5, H6 from Tiny MCE
-------------------------------------------------------------- */

add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );
function tiny_mce_remove_unused_formats($init) {
// Add block format elements you want to show in dropdown
$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Blockquote=blockquote';
return $init;
}



/* 5. Add counter (300 characters) to Excerpt box
-------------------------------------------------------------- */

/* Removed because on Signposts custom post type it caused Ajax links error */

?>
