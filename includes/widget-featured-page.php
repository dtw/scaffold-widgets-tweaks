<?php
/*
Based on code by Eduardo Zulian - http://flutuante.com.br - cheers Eduardo
*/

/**
 * Register the widget
 */
function SF_register_widget_featured_page() {
	register_widget( 'SF_Featured_Page_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_featured_page' );
/**
 * A Featured Page Widget
 * Feature a page, showing its excerpt and thumbnail.
 *
 */
class SF_Featured_Page_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function __construct() {
		parent::WP_Widget( 'SF_Featured_Page_Widget',
		$name = 'SF Featured Page',
		array(
			'classname'   => 'scaffold_widget_featured_page widget_featured_page',
			'description' => 'Display a specific page title, excerpt and featured image'
	)
		);
	}

	function SF_Featured_Page_Widget() {
		self::__construct();
	}
	/**
	 * Outputs the content for a new widget instance.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args 		Widget arguments.
	 * @param array $instance 	Saved values from database.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		if ( isset( $instance['page'] ) && $instance['page'] != -1 ) {
			$page_id = (int) $instance['page'];
			$image_size = isset( $instance['image-size'] ) ? strip_tags( $instance['image-size'] ) : 'thumbnail';
			$p = new WP_Query( array( 'page_id' => $page_id ) );
			if ( $p->have_posts() ) {
				$p->the_post();

				echo $before_widget;
				?>


    <div class="media row">

        
				<?php if ( $image_size != 'no-thumbnail' && has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">						
					<?php the_post_thumbnail( $image_size, array( 'class' => 'media-object alignright' ) ); ?></a>
						<?php endif; ?>

			<?php
 				echo $before_title;
				echo "<a href='". get_the_permalink() ."'>";
				the_title();
				echo "</a>";
				echo $after_title;
				?>





						<?php the_excerpt(); ?>


							</div>



				<?php
				echo $after_widget;
				wp_reset_postdata();
			}
		}
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['page'] = (int)( $new_instance['page'] );
		$instance['image-size'] = strip_tags( $new_instance['image-size'] );
		return $instance;
	}
	function form( $instance ) {
		$page = isset( $instance['page'] ) ? (int) $instance['page'] : 0;
		$image_size = isset( $instance['image-size'] ) ? strip_tags( $instance['image-size'] ) : 'thumbnail';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'page' ); ?>">Which page?</label>

			<?php
			/**
			 *  Mimics wp_dropdown_pages() funcionality to add a 'widefat' class to the <select> tag
			 */
			$args = array(
	            'depth' 				=> 0,
	            'child_of' 				=> 0,
	            'selected' 				=> $page,
	            'name' 					=> $this->get_field_name( 'page' ),
	            'id' 					=> $this->get_field_id( 'page' ),
	            'show_option_none' 		=> '',
	            'show_option_no_change' => '',
	            'option_none_value' 	=> ''
	        );
	        extract( $args, EXTR_SKIP );
	        $pages = get_pages( $args );
	        if ( ! empty( $pages ) ) : ?>
	            <select class="widefat" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>">
	            	<option value="-1">Select a page</option>
	            	<?php echo walk_page_dropdown_tree( $pages, $depth, $args ) ?>;
	            </select>
	        <?php
	        endif;
	        ?>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image-size' ); ?>">Featured Image size:</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'image-size' ); ?>" name="<?php echo $this->get_field_name( 'image-size' ); ?>">
				<option value="no-thumbnail" <?php selected( $image_size, 'no-thumbnail' ); ?>>No post thumbnail, thanks</option>
				<?php
				$all_image_sizes = $this->_get_all_image_sizes();
				foreach ( $all_image_sizes as $key => $value ) :
					$image_dimensions = $value['width'] . 'x' . $value['height']; ?>
					<option value="<?php echo $key; ?>" <?php selected( $image_size, $key ); ?>><?php echo $key; ?> (<?php echo $image_dimensions; ?>)</option>
				<?php endforeach; ?>
			</select>
		</p>
	<?php
	}
	/**
	 * Returns all the registered image sizes along with their dimensions	 *
	 * @global array $_wp_additional_image_sizes
	 * @return array $image_sizes The image sizes
	 */
	function _get_all_image_sizes() {
		global $_wp_additional_image_sizes;
		$default_image_sizes = array( 'thumbnail', 'medium', 'large' );
		foreach ( $default_image_sizes as $size ) {
			$image_sizes[$size]['width']	= intval( get_option( "{$size}_size_w") );
			$image_sizes[$size]['height'] = intval( get_option( "{$size}_size_h") );
			$image_sizes[$size]['crop']	= get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}
		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}
		return $image_sizes;
	}
}
?>