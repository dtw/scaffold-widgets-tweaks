<?php

/**
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Scaffold Widgets and Tweaks
 *
 * @wordpress-plugin
 * Plugin Name:       Scaffold Widgets and Tweaks
 * Description:       Improves how the post editor and admin screens work in WordPress, and adds widgets for the Scaffold WordPress theme.  <strong>DO NOT DELETE !</strong>
 * Version:           1.33.0
 * Author:            Phil Thiselton & Jason King
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/* Functions
------------------------------------------- */

	// 1. POST EDITOR modifications
	require_once('includes/post-editor.php');

	// 2. SHORTCODES
	require_once('includes/shortcodes.php');

	// 3. MEDIA LIBRARY
	require_once('includes/media-library.php');

	// 4. DASHBOARD
	require_once('includes/dash.php');

	// 5. Add custom functions
	require_once('functions/functions-orientation-check.php');

	// 6. Add custom roles
	require_once('functions/functions-custom-roles.php');

/* Widgets
------------------------------------------- */

	// a. WIDGET for listing CHILD PAGES
	require_once('includes/widget-list-child-pages.php');

	// b. WIDGET for displaying a FEATURED PAGE
	require_once('includes/widget-featured-page.php');

	// c. WIDGET for listing CHILD PAGES plus FEATURED IMAGES
	// moved to shortcodes.php

	// d. WIDGET for displaying RECENT POSTS by CATEGORY
	require_once('includes/widget-recent-posts-by-category.php');

	// e. WIDGET for link buttons
	require_once('includes/widget-bootstrap-button.php');

	// f. WIDGET for displaying a FEATURED PAGE
	require_once('includes/widget-featured-page-hwbucks.php');

	// g. WIDGET for displaying a FEATURED POST
	require_once('includes/widget-featured-post-hwbucks.php');

	// h. WIDGET for displaying RECENT FEEDBACK
	require_once('includes/widget-recent-feedback-hwbucks.php');

	// i. WIDGET for displaying a three-column content
	require_once('includes/widget-three-column-hwbucks.php');

	// x. WIDGET for displaying a FEATURED POST
	require_once('includes/widget-latest-dic-visit-hwbucks.php');

	// y. WIDGET for displaying a FEATURED POST
	require_once('includes/widget-latest-post-by-category-hwbucks.php');

	// z. WIDGET for displaying a FEATURED POST
	require_once('includes/widget-three-column-img-hwbucks.php');

	// Add CUSTOM CSS to the SHORTCODES

	function scaffold_shortcode_css() {
		wp_enqueue_style('shortcode_styles' , plugins_url().'/scaffold-widgets-tweaks/css/style.css');
		}

		add_action('wp_enqueue_scripts', 'scaffold_shortcode_css');

	// add accordion_scroll script
	function add_accordion_scroll() {
	    wp_enqueue_script(
	        'accordion_scroll', // name your script so that you can attach other scripts and de-register, etc.
	        //plugin_dir_path( __FILE__ ) . 'js/accordion_scroll.js', // this is the location of your script file
					'/wp-content/plugins/scaffold-widgets-tweaks/js/accordion_scroll.js', // this is the location of your script file
	        array('jquery') // this array lists the scripts upon which your script depends
	    );
	}

	add_action( 'wp_enqueue_scripts', 'add_accordion_scroll' );

	// add media_selector script
	function add_media_selector() {
			wp_enqueue_script(
					'media_selector', // name your script so that you can attach other scripts and de-register, etc.
					//plugin_dir_path( __FILE__ ) . 'js/media_selector.js', // this is the location of your script file
					'/wp-content/plugins/scaffold-widgets-tweaks/js/media_selector.js', // this is the location of your script file
					array('jquery'), // this array lists the scripts upon which your script depends
					'0.1'
			);
			wp_enqueue_script( 'media-selector' );
			wp_enqueue_script( 'media-upload' );
	}

	add_action( 'admin_enqueue_scripts', 'add_media_selector' );

	// Ajax action to refresh the user image
	function hwbucks_get_preview_image() {
	    if(isset($_GET['img_id']) and isset($_GET['img_preview_id'])){
	        $image = wp_get_attachment_image( filter_input( INPUT_GET, 'img_id', FILTER_VALIDATE_INT ), 'thumbnail', false, array(
						'id' => filter_input( INPUT_GET, 'img_preview_id'),
					 	'class' => 'hwbucks-three-col-img-preview',)
					);
	        $data = array(
	            'image'    => $image,
	        );
	        wp_send_json_success( $data );
	    } else {
	        wp_send_json_error();
	    }
	}

	add_action( 'wp_ajax_hwbucks_get_preview_image', 'hwbucks_get_preview_image' );

?>
