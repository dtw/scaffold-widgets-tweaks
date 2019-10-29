<?php

// Based on code by author: Ross Cornell http://www.rosscornell.com - thanks Ross!

/**
 * Register the widget
 */
function SF_register_widget_hwbucks_latest_post() {
	register_widget( 'SF_HWBucks_Latest_Post_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_hwbucks_latest_post' );
/**
 * A Three Column Widget
 *
 * Add three links to posts or pages with header and text
 *
 */
class SF_HWBucks_Latest_Post_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function SF_HWBucks_Latest_Post_Widget() {
		parent::WP_Widget( 'SF_HWBucks_Latest_Post_Widget',
		$name = 'HW Latest Post by Category',
		array(
			'classname'   => 'scaffold_widget_hwbucks_latest_post widget_latest_post',
			'description' => 'Display links to latest post as a panel with optional posts below in a three column layout')
		);
	}

	// Build the widget settings form

	function form( $instance ) {

		$defaults  = array( 'title' => '', 'category' => '', 'show_extra' => false, 'panel_colour' => 'orange', 'btn_text' => 'Read more' );
		$instance  = wp_parse_args( ( array ) $instance, $defaults );
		$title     = $instance['title'];
		$category  = $instance['category'];
		$show_extra = $instance['show_extra'];
		$panel_colour = $instance['panel_colour'];
		$btn_text = $instance['btn_text'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Content title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>">Category:</label>
			<?php
			wp_dropdown_categories( array(
				'orderby'    => 'title',
				'hide_empty' => false,
				'name'       => $this->get_field_name( 'category' ),
				'id'         => $this->get_field_name( 'category' ),
				'class'      => 'widefat',
				'selected'   => $category)
			);
			?>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_extra' ); ?>" name="<?php echo $this->get_field_name( 'show_extra' ); ?>" <?php checked( $show_extra, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_extra' ); ?>">Display optional posts?</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('panel_colour'); ?>">Panel colour:
				<select class='widefat' id="<?php echo $this->get_field_id('panel_colour'); ?>"
						 name="<?php echo $this->get_field_name('panel_colour'); ?>" type="text">
					<?php
					/* This array and loop generates the rows for the dropdown menu. Blue results in panel-blue. Matching styles required in CSS */
					$colourArray = ["Orange", "Blue", "Green", "Pink", "Turquoise"];
						foreach ($colourArray as $colour)  {
							echo "<option value='" . strtolower($colour) . "'";
							echo ($panel_colour==strtolower($colour))?'selected':'';
							echo ">" . $colour . "</option>";
						}
					?>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">Button text:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" value="<?php echo esc_attr( $btn_text ); ?>" />
		</p>
		<?php
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {

		$instance              = $old_instance;
		$instance['title']     = wp_strip_all_tags( $new_instance['title'] );
		$instance['category']  = wp_strip_all_tags( $new_instance['category'] );
		$instance['show_extra'] = isset( $new_instance['show_extra'] ) ? 1 : 0;
		$instance['panel_colour'] = $new_instance['panel_colour'];
		$instance['btn_text'] = wp_strip_all_tags( $new_instance['btn_text'] );

		return $instance;

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

		$title     = $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category  = $instance['category'];
		$show_extra = ( $instance['show_extra'] === 1 ) ? true : false;
		$panel_colour = $instance['panel_colour'] ;
		$btn_text = $instance['btn_text'] ;

		// Check if there is a sticky post
		$sticky = get_option( 'sticky_posts' );
		$sticky_exclude = $sticky[0];
		if (!$sticky_exclude) {
			$sticky_offset = 1;
			}

		// Display the first post in a single column panel
		$cat_recent_posts = new WP_Query( array(

			'post_type'      => 'post',
			'post_status'      => 'publish',
			'posts_per_page' => 1,
			'cat'            => $category,
			'p' 			 => $sticky[0],

		) );

		echo $before_widget;
		if ( $cat_recent_posts->have_posts() ) {
			$cat_recent_posts->the_post();
			// start the panel
			?>
				<div class="col-md-12 col-sm-12 col-xs-12 panel panel-<?php echo $panel_colour ?>"><!-- start panel -->
					<div class="row">
						<div class="col-md-8 col-sm-6 col-xs-12 panel-text">
							<div class="row">
								<div class="col-md-12 panel-title">
									<h2><?php echo $title ?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<a class="title-link" href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
									<?php the_excerpt(); ?>
									<p style="clear: both;">
										<a class="btn btn-primary" href="<?php echo get_category_link($category); ?>">
											Read all <?php echo strtolower(get_cat_name($category)); ?>
										</a>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-xs panel-icon">
							<a href="
								<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail([auto,240]); ?>
							</a>
						</div>
					</div>
				</div><!-- end panel -->
				<?php
			}
		else {
			echo 'No posts yet...';
		}
		wp_reset_postdata();

		// Show the extra posts if needed
		if ( $show_extra ) {
			// Display three posts in three columns, with one offset if there is no sticky post
			$cat_recent_posts = new WP_Query( array(

				'post_type'      => 'post',
				'post_status'      => 'publish',
				'posts_per_page' => 3,
				'cat'            => $category,
				'post__not_in' 		=> $sticky,
				'offset' 		=> $sticky_offset)
			);

			if ( $cat_recent_posts->have_posts() ) {
				while ( $cat_recent_posts->have_posts() ) {
					$cat_recent_posts->the_post(); ?>
					<div class="col-md-4 col-sm-4 hidden-xs" style="padding-right: 2rem;">
						<h3>
							<a href="
								<?php the_permalink(); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h3>
						<?php the_excerpt(); ?>
						<p>
							<a href="
								<?php echo get_the_permalink(); ?>">Read more &raquo;
							</a>
						</p>
					</div><!-- end of column -->
				<?php }
				} else {
					echo 'No posts yet...';
				}
			wp_reset_postdata();
			}
		echo $after_widget;
	}
}
?>
