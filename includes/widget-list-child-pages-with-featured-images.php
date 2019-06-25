<?php

function scaffold_list_child_pages_with_featured_images() {

global $post;

$args=array(
  'post_parent' => $post->ID,
  'post_type' => 'page',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'menu_order'
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {


	$output = "";
	$output .= "<div class='container-fluid child-nav'><div class='row'>";

  while ($my_query->have_posts()) : $my_query->the_post();

// check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) {
	$featured_image = get_the_post_thumbnail($page->ID, 'thumbnail');
} else {
	$featured_image = '';
	}

$output .= '<div class="child-nav-item col-lg-4 col-md-4 col-sm-4 col-xs-6	text-center">';

$output .= '<div class="child-nav-img"><a href="'.get_permalink().'" title="'.get_the_title().'">'.$featured_image.'</a></div>';

$output .= '<div class="child-nav-title"><p><a href="'.get_permalink().'">'.get_the_title().'</a></p></div>';

$output .= '</div>';


  endwhile;

	$output .= "</div><!-- end of row --></div><!-- end of container -->";

  return $output;
}
wp_reset_query();

}

add_shortcode('childrenwithimages', 'scaffold_list_child_pages_with_featured_images');
