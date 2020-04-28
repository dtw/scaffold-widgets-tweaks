<?php
/*
Based on code by Eduardo Zulian - http://flutuante.com.br - cheers Eduardo
Based on code by Jason King - http://kingjason.com - cheers Jason
*/

/**
 * Register the widget
 */
function SF_register_widget_hwbucks_featured_post() {
	register_widget( 'SF_HWBucks_Featured_Post_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_hwbucks_featured_post' );
/**
 * A Featured Post Widget
 * Feature a post, showing its excerpt and thumbnail.
 *
 */
class SF_HWBucks_Featured_Post_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function SF_HWBucks_Featured_Post_Widget() {
		parent::WP_Widget( 'SF_HWBucks_Featured_Post_Widget',
		$name = 'HW Featured Post',
		array(
			'classname'   => 'scaffold_widget_hwbucks_featured_post widget_featured_post',
			'description' => 'Display a specific post title, excerpt and featured image (choose most recent 10 posts)'
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
		if ( isset( $instance['post'] ) && $instance['post'] != -1 ) {
			$post_id = (int) $instance['post'];
			$title = $instance['title'] ;
			$show_excerpt = $instance['show_excerpt'];
			$panel_colour = $instance['panel_colour'] ;
			$show_btn = $instance['show_btn'];
			$btn_text = $instance['btn_text'] ;
			$p = new WP_Query( array( 'p' => $post_id ) );

			if ( $p->have_posts() ) {
				$p->the_post();

				echo $before_widget;
				?>

				<?php echo '<div class="col-md-12 col-sm-12 col-xs-12 panel panel-' . $panel_colour . '">'?>
					<div class="row">
						<div class="col-md-8 col-sm-6 col-xs-12 panel-text">
							<div class="row">
								<div class="col-md-12 panel-title">
									<h2><?php echo $title ?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 panel-content">
									<a class="title-link" href="
										<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
									<?php if ( $show_excerpt ) { ?>
										<p class="panel-excerpt"> <?php echo get_the_excerpt(); ?> </p>
									<?php	}
									if ( $show_btn ) { ?>
										<p class="clear-both">
											<a class="btn btn-primary" href="<?php echo get_the_permalink(); ?>">
												<?php echo $btn_text; ?>
											</a>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-xs panel-icon">
							<a class="img-anchor" href="
								<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail([auto,240]); ?>
							</a>
						</div>
					</div>
				</div>
				<?php
				echo $after_widget;
				wp_reset_postdata();
			}
		}
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['post'] = (int)( $new_instance['post'] );
		$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
		$instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? 1 : 0;
		$instance['panel_colour'] = wp_strip_all_tags( $new_instance['panel_colour'] );
		$instance['show_btn'] = isset( $new_instance['show_btn'] ) ? 1 : 0;
		$instance['btn_text'] = wp_strip_all_tags( $new_instance['btn_text'] );
		return $instance;
	}
	function form( $instance ) {
		$post = isset( $instance['post'] ) ? (int) $instance['post'] : -1;
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Hot news';
		$show_excerpt = $instance['show_excerpt'];
		$panel_colour = ! empty( $instance['panel_colour'] ) ? $instance['panel_colour'] : 'orange';
		$show_btn = $instance['show_btn'];
		$btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : 'Read more';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Content title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" <?php checked( $show_excerpt, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>">Display excerpt?</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('panel_colour'); ?>">Panel colour:
				<select class='widefat' id="<?php echo $this->get_field_id('panel_colour'); ?>"
						 name="<?php echo $this->get_field_name('panel_colour'); ?>" type="text">
					<?php
					/* This array and loop generates the rows for the dropdown menu. Blue results in panel-blue. Matching styles required in CSS */
					$colourArray = ["Orange", "Blue", "Green", "Pink", "Turquoise","Coronavirus"];
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
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_btn' ); ?>" name="<?php echo $this->get_field_name( 'show_btn' ); ?>" <?php checked( $show_btn, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_btn' ); ?>">Display link button?</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">Button text:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" value="<?php echo esc_attr( $btn_text ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post' ); ?>">Which post?

			<?php
			/**
			 *  Can't see how to walk posts like pages so we'll just get the last 10, which is probably adequate!
			 */
			 		$args = array(
							'post_type' => 'post',
							'numberposts' => '10',
							'post_status' => 'publish',
							//'order' => 'asc' // rather than changing the sort order, this gets the oldest x posts first!
	        );
	        $recent_posts = wp_get_recent_posts($args);
	        if ( ! empty( $recent_posts ) ) { ?>
						<select class='widefat' id="<?php echo $this->get_field_id('post'); ?>" name="<?php echo $this->get_field_name('post'); ?>">
            	<option value="-1">Select a post</option>
            	<?php
								foreach ($recent_posts as $recent)  {
									echo "<option value='" . $recent["ID"] . "'";
									echo ($post==$recent["ID"])?'selected':'';
									echo ">" . $recent["post_title"] . "</option>";
								}
							?>;
            </select>
					</label>
	        <?php
					} else { ?>
						<p>No results!</p>

					<?php
					}
	        ?>
        </p>
	<?php
	}
}
?>
