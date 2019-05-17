<?php
/*
Based on code by Eduardo Zulian - http://flutuante.com.br - cheers Eduardo
Based on code by Jason King - http://kingjason.com - cheers Jason
*/

/**
 * Register the widget
 */
function SF_register_widget_hwbucks_featured_page() {
	register_widget( 'SF_HWBucks_Featured_Page_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_hwbucks_featured_page' );
/**
 * A Featured Page Widget
 * Feature a page, showing its excerpt and thumbnail.
 *
 */
class SF_HWBucks_Featured_Page_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function SF_HWBucks_Featured_Page_Widget() {
		parent::WP_Widget( 'SF_HWBucks_Featured_Page_Widget',
		$name = 'SF HW Bucks Featured Page',
		array(
			'classname'   => 'scaffold_widget_hwbucks_featured_page widget_featured_page',
			'description' => 'Display a specific page title, excerpt and featured image'
	)
		);
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
			$title = $instance['title'] ;
			$p = new WP_Query( array( 'page_id' => $page_id ) );
			if ( $p->have_posts() ) {
				$p->the_post();

				echo $before_widget;
				?>

				<div class="col-md-12 col-sm-12 col-xs-12 panel panel-orange">
					<div class="col-md-12 panel-title">
						<h2><?php echo $title ?><h2>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<a class="title-link" href="
							<?php the_permalink(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
						<?php the_excerpt(); ?>
						<!-- <p><a href="
						<?php echo get_the_permalink(); ?>">Read more &raquo;</a></p> -->
					</div>
					<div class="col-md-3 hidden-sm hidden-xs panel-icon">
						<a href="
							<?php the_permalink(); ?>" rel="bookmark">
							<?php the_post_thumbnail([auto,180]); ?>
						</a>
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
		$instance['title'] = ( $new_instance['title'] );
		return $instance;
	}
	function form( $instance ) {
		$page = isset( $instance['page'] ) ? (int) $instance['page'] : 0;
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Hot news';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Content Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
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
	<?php
	}
}
?>
