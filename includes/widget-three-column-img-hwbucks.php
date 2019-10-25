<?php
/*
Based on code by Eduardo Zulian - http://flutuante.com.br - cheers Eduardo
Based on code by Jason King - http://kingjason.com - cheers Jason
*/

/**
 * Register the widget
 */
function SF_register_widget_hwbucks_three_col_img() {
	register_widget( 'SF_HWBucks_Three_Col_Img_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_hwbucks_three_col_img' );
/**
 * A Three Column Widget with images
 *
 * Add three links to posts or pages with header and text
 *
 */
class SF_HWBucks_Three_Col_Img_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function SF_HWBucks_Three_Col_Img_Widget() {
		parent::WP_Widget( 'SF_HWBucks_Three_Col_Img_Widget',
			$name = 'HW Three Column w. Images',
			array(
				'classname'   => 'scaffold_widget_hwbucks_three_col_img widget_three_col_img',
				'description' => 'Display links to posts or pages in a three column layout w. images'
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
		// <div id="feedback-selector" class="row">
		echo $before_widget;
		for ($i = 1; $i <= 3; $i++) { ?>
			<div class="col-md-4 col-sm-12">
				<div class="choice-container">
					<a class="choice-img-link" <?php echo '<a href="' . $instance['url_'.$i] . '"' ?>>
						<img class="choice-img" <?php echo 'src="' . $instance['img_url_'.$i] . '" alt="' . $instance['title_'.$i] . '"' ?>>
					</a>
					<a class="choice-details" <?php echo '<a href="' . $instance['url_'.$i] . '"' ?>>
							<?php echo '<p>' . $instance['title_'.$i] . '</p>'?>
						<div class="hover-content">
							<?php echo '<p>' . $instance['excerpt_text_'.$i] . '</p>'?>
						</div>
					</a>
				</div>
			</div>
		<?php }
		// </div>
		echo $after_widget;
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for ($i = 1; $i <= 3; $i++) {
			$instance['title_'.$i] = wp_strip_all_tags( $new_instance['title_'.$i] );
			$instance['url_'.$i] = wp_strip_all_tags( $new_instance['url_'.$i] );
			$instance['excerpt_text_'.$i] = wp_strip_all_tags( $new_instance['excerpt_text_'.$i] );
			$instance['img_url_'.$i] = wp_strip_all_tags( $new_instance['img_url_'.$i] );
		}
		return $instance;
	}
	function form( $instance ) {
		for ($i = 1; $i <= 3; $i++) {
			$title = ! empty( $instance['title_'.$i] ) ? $instance['title_'.$i] : 'Title' . $i;
			$url = ! empty( $instance['url_'.$i] ) ? $instance['url_'.$i] : 'https://www.healthwatchbucks.co.uk/';
			$excerpt_text = ! empty( $instance['excerpt_text_'.$i] ) ? $instance['excerpt_text_'.$i] : 'A blurb.';
			$img_url = ! empty( $instance['img_url_'.$i] ) ? $instance['img_url_'.$i] : 'https://www.healthwatchbucks.co.uk/wp-content/uploads/2016/07/Icon-Bubbles-Comments-Feedback.png';
		?>
		<div id="hwbucks_three_col_img_<?php echo $i ?>" style="margin-top:0.5rem;border:1px solid rgb(221, 221, 221);padding:0.5rem;">
			<h4 style="margin: 0;">Column <?php echo $i ?></h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'title_'.$i ); ?>">Title:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'title_'.$i ); ?>" name="<?php echo $this->get_field_name( 'title_'.$i ); ?>" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'excerpt_text_'.$i ); ?>">Excerpt text:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'excerpt_text_'.$i ); ?>" name="<?php echo $this->get_field_name( 'excerpt_text_'.$i ); ?>" value="<?php echo esc_attr( $excerpt_text ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'url_'.$i ); ?>">URL:</label>
				<input type="text" id="<?php echo $this->get_field_id( 'url_'.$i ); ?>" name="<?php echo $this->get_field_name( 'url_'.$i ); ?>" value="<?php echo esc_url( $url ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'img_url_'.$i ); ?>">Image URL:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'img_url_'.$i ); ?>" name="<?php echo $this->get_field_name( 'img_url_'.$i ); ?>" value="<?php echo esc_url( $img_url ); ?>" />
				<button class="select_image_button button button-primary">Select Image</button>
			</p>
		</div>
	<?php
		}
	}
}
?>
