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
	function __construct() {
		parent::__construct( 'SF_HWBucks_Latest_Post_Widget',
		$name = 'HW Latest Post by Category',
		array(
			'classname'   => 'scaffold_widget_hwbucks_latest_post widget_latest_post',
			'description' => 'Display links to latest post as a panel with optional posts below in a three column layout')
		);
	}

	function SF_HWBucks_Latest_Post_Widget() {
		self::__construct();
	}
	// Build the widget settings form

	function form( $instance ) {

		$defaults  = array( 'title' => '', 'category' => '', 'show_excerpt' => true, 'show_extra' => false, 'panel_colour' => 'orange', 'show_btn' => true, 'btn_text' => '' );
		$instance  = wp_parse_args( ( array ) $instance, $defaults );
		$title     = $instance['title'];
		$category  = $instance['category'];
		$show_excerpt = $instance['show_excerpt'];
		$show_extra = $instance['show_extra'];
		$bg_colour = ! empty( $instance['bg_colour'] ) ? $instance['bg_colour'] : 'light-blue';
		$border_colour = ! empty( $instance['border_colour'] ) ? $instance['border_colour'] : 'none';
		$show_btn = $instance['show_btn'];
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
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" <?php checked( $show_excerpt, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>">Display excerpt?</label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_extra' ); ?>" name="<?php echo $this->get_field_name( 'show_extra' ); ?>" <?php checked( $show_extra, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_extra' ); ?>">Display optional posts?</label>
		</p>
		<!-- Background colour -->
		<p>
			<label for="<?php echo $this->get_field_id('bg_colour'); ?>">Background colour:
				<select class='widefat' id="<?php echo $this->get_field_id('bg_colour'); ?>"
						 name="<?php echo $this->get_field_name('bg_colour'); ?>" type="text">
					<?php
					/* This array and loop generates the rows for the dropdown menu. Blue results in panel-blue. Matching styles required in CSS */
					$colourArray = ["Orange", "Blue", "Green", "Pink", "Turquoise","Coronavirus"];
						foreach ($colourArray as $colour)  {
							echo "<option value='" . strtolower($colour) . "'";
							echo ($bg_colour==strtolower($colour))?'selected':'';
							echo ">" . $colour . "</option>";
						}
					?>
				</select>
			</label>
		</p>
		<!-- Image border colour -->
		<p>
			<label for="<?php echo $this->get_field_id('border_colour'); ?>">Border colour:
				<select class='widefat' id="<?php echo $this->get_field_id('border_colour'); ?>"
						 name="<?php echo $this->get_field_name('border_colour'); ?>" type="text">
					<?php
					/* This array and loop generates the rows for the dropdown menu. Blue results in panel-blue. Matching styles required in CSS */
						$colourArray = ["None", "Pink", "Blue", "Gold", "Teal"];
						foreach ($colourArray as $colour)  {
							echo "<option value='" . strtolower($colour) . "'";
							echo ($border_colour==strtolower($colour))?'selected':'';
							echo ">" . $colour . "</option>";
						}
					?>
				</select>
			</label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_btn' ); ?>" name="<?php echo $this->get_field_name( 'show_btn' ); ?>" <?php checked( $show_btn, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_btn' ); ?>">Display category link button?</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">Button text (optional):</label>
			<input type="text" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" value="<?php echo esc_attr( $btn_text ); ?>" />
		</p>
		<?php
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {

		$instance              = $old_instance;
		$instance['title']     = wp_strip_all_tags( $new_instance['title'] );
		$instance['category']  = wp_strip_all_tags( $new_instance['category'] );
		$instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? 1 : 0;
		$instance['show_extra'] = isset( $new_instance['show_extra'] ) ? 1 : 0;
		$instance['bg_colour'] = wp_strip_all_tags( $new_instance['bg_colour'] );
		$instance['border_colour'] = wp_strip_all_tags( $new_instance['border_colour'] );
		$instance['show_btn'] = isset( $new_instance['show_btn'] ) ? 1 : 0;
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
		$show_excerpt = ( $instance['show_excerpt'] === 1 ) ? true : false;
		$show_extra = ( $instance['show_extra'] === 1 ) ? true : false;
		$bg_colour = $instance['bg_colour'] ;
		$border_colour = $instance['border_colour'] ;
		$show_btn = ( $instance['show_btn'] === 1 ) ? true : false;
		$btn_text = $instance['btn_text'] ;

		// Check if there is a sticky post
		$sticky = get_option( 'sticky_posts' );
		if ($sticky) {
			$first_sticky_post = $sticky[0];
			$sticky_offset = 0;
		} else  {
			$first_sticky_post = '';
			$sticky_offset = 1;
			}

		// Display the first post in a single column panel
		$cat_recent_posts = new WP_Query( array(

			'post_type'      => 'post',
			'post_status'      => 'publish',
			'posts_per_page' => 1,
			'cat'            => $category,
			'p' 			 => $first_sticky_post,

		) );

		echo '<div class="row latest-post-'.strtolower(get_the_category_by_ID($category)).'">';
		if ( $cat_recent_posts->have_posts() ) {
			$cat_recent_posts->the_post();
			// start the panel
			?>
				<?php echo '<div class="col-md-12 col-sm-12 col-xs-12 panel panel-' . $bg_colour . '">'?><!-- start panel -->
					<div class="row">
					<?php $img_orient = orientation_check(get_post_thumbnail_id());
					if ( $img_orient == 'ls') {
						echo '<!--ls--><div class="col-md-8 col-sm-6 col-xs-12 panel-text">';
					} elseif ( $img_orient == 'pt') {
						echo '<!--pt--><div class="col-md-10 col-sm-9 col-xs-12 panel-text">';
					} elseif ( $img_orient == 'sq') {
						echo '<!--sq--><div class="col-md-9 col-sm-8 col-xs-12 panel-text">';
					}
					?>
							<div class="row">
								<div class="col-md-12 panel-title">
									<h2><?php echo $title ?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 panel-content">
									<a class="title-link" href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
									<?php if ( $show_excerpt ) { ?>
										<p class="panel-excerpt"> <?php echo get_the_excerpt(); ?> </p>
									<?php	}
									if ( $show_btn ) { ?>
										<p class="clear-both">
											<a class="btn btn-primary" href="<?php echo get_category_link($category); ?>">
												<?php if ( empty( $btn_text ) ) {
														echo 'Read all ' . strtolower(get_cat_name($category));
													} else {
														echo $btn_text;
													}
												?>
											</a>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php if ( $img_orient == 'ls') {
						echo '<!--ls--><div class="col-md-4 col-sm-6 hidden-xs panel-icon">';
					} elseif ( $img_orient == 'pt') {
						echo '<!--pt--><div class="col-md-2 col-sm-3 hidden-xs panel-icon">';
					} elseif ( $img_orient == 'sq') {
						echo '<!--sq--><div class="col-md-3 col-sm-4 hidden-xs panel-icon">';
					}
					?>
							<a class="img-anchor" href="
								<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail('medium', array('class' => 'panel-icon-img border-colour-'.$border_colour)); ?>
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
			);?>
			<div class="col-sm-12 hidden-xs subitem-container">
			<?php
			if ( $cat_recent_posts->have_posts() ) {
				while ( $cat_recent_posts->have_posts() ) {
					$cat_recent_posts->the_post(); ?>
					<div class="col-md-4 col-sm-4 hidden-xs subitem">
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
				}?>
			</div><!-- end subitem-container -->
			<?php wp_reset_postdata();
			}
		echo '</div>';
	}
}
?>
