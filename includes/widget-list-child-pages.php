<?php

// Create a shortcode to list CHILD PAGES
function scaffold_list_child_pages_with_excerpts() {

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

  while ($my_query->have_posts()) : $my_query->the_post();

$output .= '<p><a class="child-link" href="'.get_permalink().'">'.get_the_title().'</a></p>
                        <p>'.get_the_excerpt().'</p>';
  endwhile;
  return $output;
}
wp_reset_query();

}

add_shortcode('children', 'scaffold_list_child_pages_with_excerpts');

// Create function to list CHILD PAGES

// Use scaffold_list_child_pages(); in a template

function scaffold_list_child_pages() {

global $post;

if ( is_page() && $post->post_parent )

	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

	$parent_title = get_the_title($post->post_parent);
		echo "<ul class='child-menu'><li><a class='child-menu-parent' href='" . get_the_permalink($post->post_parent) . "'>" . $parent_title . "</a>";

	$string = '<ul class="child-menu-children">' . $childpages . '</ul></li></ul>';
echo $string;
}


}

add_shortcode('subnavigation', 'scaffold_list_child_pages');






// Now we add WIDGET functionality


// Register 'Recent Custom Posts' widget
add_action( 'widgets_init', 'init_scaffold_list_child_pages' );
function init_scaffold_list_child_pages() { return register_widget('scaffold_list_child_pages'); }

class scaffold_list_child_pages extends WP_Widget {
	/** constructor */
	function __construct() {
		parent::__construct(
			'scaffold_list_child_pages',
			$name = 'SF List Child Pages',
					array(
					'classname'   => 'scaffold_widget_child_pages widget_child_pages',
					'description' => 'Subnavigation, a list of links to child pages'
	)

			);
	}

	function scaffold_list_child_pages() {
		self::__construct();
	}

	/**
	* This is our Widget
	**/
	function widget( $args, $instance ) {
		global $post;
		extract($args);

		// Widget options
		$title 	 = apply_filters('widget_title', $instance['title'] ); // Title

        // Output

$children = get_pages('child_of='.$post->ID);
if( count( $children ) != 0 || is_page() && $post->post_parent ) {
		echo $before_widget;
		    if ( $title ) echo $before_title . $title . $after_title;
				echo do_shortcode('[subnavigation]');
			echo $after_widget;
		} }

	/** Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance    = $old_instance;

		//Let's turn that array into something the Wordpress database can store
		$instance['title']  = strip_tags( $new_instance['title'] );
		return $instance;
	}

	/**
	* Widget settings
	**/
	function form( $instance ) {

		    // instance exist? if not set defaults
		    if ( $instance ) {
				$title  = $instance['title'];
		    } else {
			    //These are our defaults
				$title  = '';
		    }

			// The widget form
			?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
			</p>
	<?php
	}

} // class scaffold_list_child_pages


?>
