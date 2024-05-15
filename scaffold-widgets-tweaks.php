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
 * Version:           1.45.3
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
	require_once(plugin_dir_path( __FILE__ ).'/includes/post-editor.php');

	// 2. SHORTCODES
	require_once(plugin_dir_path( __FILE__ ).'/includes/shortcodes.php');

	// 3. MEDIA LIBRARY
	require_once(plugin_dir_path( __FILE__ ).'/includes/media-library.php');

	// 4. DASHBOARD
	require_once(plugin_dir_path( __FILE__ ).'/includes/dash.php');

	// 5. Add custom functions
	require_once('functions/functions-orientation-check.php');

	// 6. Add custom roles
	require_once('functions/functions-custom-roles.php');

	// 7. SiteGround Tweaks
	require_once(plugin_dir_path(__FILE__) . '/includes/siteground-tweaks.php');

/* Widgets
------------------------------------------- */

	// a. WIDGET for listing CHILD PAGES
	require_once(plugin_dir_path( __FILE__ ).'/includes/widget-list-child-pages.php');

	// b. WIDGET for displaying a FEATURED PAGE - REPLACED by widget-featured-page-hwbucks.php
	// require_once(plugin_dir_path( __FILE__ ).'/includes/widget-featured-page.php');

	// c. WIDGET for listing CHILD PAGES plus FEATURED IMAGES
	// moved to shortcodes.php

	// d. WIDGET for displaying RECENT POSTS by CATEGORY - REPLACED by widget-latest-post-by-category-hwbucks.php
	// require_once(plugin_dir_path( __FILE__ ).'/includes/widget-recent-posts-by-category.php');

	// e. WIDGET for link buttons - DELETED
	// require_once(plugin_dir_path( __FILE__ ).'/includes/widget-bootstrap-button.php');

	// f. WIDGET for displaying a FEATURED PAGE
	require_once(plugin_dir_path( __FILE__ ).'/includes/widget-featured-page-hwbucks.php');

	// g. WIDGET for displaying a FEATURED POST
	require_once(plugin_dir_path( __FILE__ ).'/includes/widget-featured-post-hwbucks.php');

	// h. WIDGET for displaying RECENT FEEDBACK - MOVED to hw-feedback
	//require_once(plugin_dir_path( __FILE__ ).'/includes/widget-recent-feedback-hwbucks.php');

	// i. WIDGET for displaying a three-column content
	require_once(plugin_dir_path( __FILE__ ).'/includes/widget-three-column-hwbucks.php');

	// x. WIDGET for displaying a DIC VISIT - MOVED to hw-feedback
	// require_once(plugin_dir_path( __FILE__ ).'/includes/widget-latest-dic-visit-hwbucks.php');

	// y. WIDGET for displaying a FEATURED POST w. optional children
	require_once(plugin_dir_path( __FILE__ ).'/includes/widget-latest-post-by-category-hwbucks.php');

	// z. WIDGET for displaying a FEATURED POST
	require_once(plugin_dir_path( __FILE__ ).'/includes/widget-three-column-img-hwbucks.php');

	// Add CUSTOM CSS to the SHORTCODES

	function scaffold_shortcode_css() {
		wp_enqueue_style('shortcode_styles' , plugins_url().'/scaffold-widgets-tweaks/css/style.css');
		}

		add_action('wp_enqueue_scripts', 'scaffold_shortcode_css');

	// add accordion_scroll script
	function add_accordion_scroll() {
	    wp_enqueue_script(
	        'accordion_scroll', // name your script so that you can attach other scripts and de-register, etc.
	        //plugin_dir_url( __FILE__ ) . 'js/accordion_scroll.js', // this is the location of your script file
					'/wp-content/plugins/scaffold-widgets-tweaks/js/accordion_scroll.js', // this is the location of your script file
	        array('jquery') // this array lists the scripts upon which your script depends
	    );
	}

	add_action( 'wp_enqueue_scripts', 'add_accordion_scroll' );

	// add media_selector script
	function add_media_selector() {
			wp_enqueue_script(
					'media_selector', // name your script so that you can attach other scripts and de-register, etc.
					//plugin_dir_url( __FILE__ ) .  'js/media_selector.js', // this is the location of your script file
					'/wp-content/plugins/scaffold-widgets-tweaks/js/media_selector.js', // this is the location of your script file
					array('jquery'), // this array lists the scripts upon which your script depends
					'0.1'
			);
			wp_enqueue_script( 'media-selector' );
			wp_enqueue_script( 'media-upload' );
	}

	add_action( 'admin_enqueue_scripts', 'add_media_selector' );

	// add generate_link script
	function add_generate_link() {
			wp_enqueue_script(
					'generate_link', // name your script so that you can attach other scripts and de-register, etc.
					plugin_dir_url( __FILE__ ) . 'js/generate_link.js', // this is the location of your script file
					//'/wp-content/plugins/scaffold-widgets-tweaks/js/generate_link.js', // this is the location of your script file
			);
	}

	add_action( 'admin_enqueue_scripts', 'add_generate_link' );

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

	/**
	 * Activate the plugin.
	 */
	function scaffold_widget_tweaks_activate() {
		// Trigger our function that registers the custom role
		create_editor_plus_role();
		create_subscriber_plus_role();
		create_moderator_role();
	}
	register_activation_hook( __FILE__, 'scaffold_widget_tweaks_activate' );

	/**
	 * Deactivate the plugin.
	 */
	function scaffold_widget_tweaks_deactivate() {
		// Trigger our function that remove the custom role
		remove_editor_plus_role();
		remove_subscriber_plus_role();
		remove_moderator_role();
	}
	register_deactivation_hook( __FILE__, 'scaffold_widget_tweaks_deactivate' );
	register_uninstall_hook( __FILE__, 'scaffold_widget_tweaks_deactivate' );

?>
