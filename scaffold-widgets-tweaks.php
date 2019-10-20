<?php

/**
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       Scaffold Widgets and Tweaks
 * Description:       Improves how the post editor and admin screens work in WordPress, and adds widgets for the Scaffold WordPress theme.  <strong>DO NOT DELETE !</strong>
 * Version:           1.2
 * Author:            Jason King
 * Author URI:        http://www.kingjason.co.uk/
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

/* Widgets
------------------------------------------- */

	// a. WIDGET for listing CHILD PAGES
	require_once('includes/widget-list-child-pages.php');

	// b. WIDGET for displaying a FEATURED PAGE
	require_once('includes/widget-featured-page.php');

	// c. WIDGET for listing CHILD PAGES plus FEATURED IMAGES
	require_once('includes/widget-list-child-pages-with-featured-images.php');

	// d. WIDGET for displaying RECENT POSTS by CATEGORY
	require_once('includes/widget-recent-posts-by-category.php');

	// e. WIDGET for link buttons
	require_once('includes/widget-bootstrap-button.php');

	// f. WIDGET for displaying a FEATURED PAGE
	require_once('includes/widget-featured-page-hwbucks.php');

	// g. WIDGET for displaying a FEATURED POST
	require_once('includes/widget-featured-post-hwbucks.php');

	// h. WIDGET for displaying a three-column content
		require_once('includes/widget-three-column-hwbucks.php');
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
