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
