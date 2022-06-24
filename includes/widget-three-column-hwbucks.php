<?php
/*
Based on code by Eduardo Zulian - http://flutuante.com.br - cheers Eduardo
Based on code by Jason King - http://kingjason.com - cheers Jason
*/

/**
 * Register the widget
 */
function SF_register_widget_hwbucks_three_column() {
	register_widget( 'SF_HWBucks_Three_Column_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_hwbucks_three_column' );
/**
 * A Three Column Widget
 *
 * Add three links to posts or pages with header and text
 *
 */
class SF_HWBucks_Three_Column_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function __construct() {
		parent::__construct( 'SF_HWBucks_Three_Column_Widget',
		$name = 'HW Three Column',
		array(
			'classname'   => 'scaffold_widget_hwbucks_three_column widget_three_column',
			'description' => 'Display links to posts or pages in a three column layout'
	)
		);
	}

	function SF_HWBucks_Three_Column_Widget() {
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
		echo '<div class="row three-column subitem-container">';
		for ($i = 1; $i <= 3; $i++) { ?>
			<div class="col-md-4 col-sm-12 col-xs-12 subitem">
				<h3>
					<?php echo '<a href="' . $instance['url_'.$i] . '">' . $instance['title_'.$i] . '</a>'?>
				</h3>
				<?php echo '<p>' . $instance['body_text_'.$i] . '</p>'?>
				<p>
					<?php echo '<a href="' . $instance['url_'.$i] . '">' . $instance['btn_text_'.$i] . ' &raquo;</a>'?>
				</p>
			</div>
		<?php }
		echo '</div>';
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for ($i = 1; $i <= 3; $i++) {
			$instance['title_'.$i] = wp_strip_all_tags( $new_instance['title_'.$i] );
			$instance['url_'.$i] = wp_strip_all_tags( $new_instance['url_'.$i] );
			$instance['body_text_'.$i] = wp_strip_all_tags( $new_instance['body_text_'.$i] );
			$instance['btn_text_'.$i] = wp_strip_all_tags( $new_instance['btn_text_'.$i] );
		}
		return $instance;
	}
	function form( $instance ) {
		for ($i = 1; $i <= 3; $i++) {
			$title = ! empty( $instance['title_'.$i] ) ? $instance['title_'.$i] : 'Title' . $i;
			$url = ! empty( $instance['url_'.$i] ) ? $instance['url_'.$i] : 'URL' . $i;
			$body_text = ! empty( $instance['body_text_'.$i] ) ? $instance['body_text_'.$i] : 'Some text.';
			$btn_text = ! empty( $instance['btn_text_'.$i] ) ? $instance['btn_text_'.$i] : 'Read more';
		?>
		<div id="hwbucks-three-column-<?php echo $i ?>" style="margin-top:0.5rem;border:1px solid rgb(221, 221, 221);padding:0.5rem;">
			<h4 style="margin: 0;">Column <?php echo $i ?></h3>
				<p>
					<label for="<?php echo $this->get_field_id( 'title_'.$i ); ?>">Content title:</label>
					<input type="text" id="<?php echo $this->get_field_id( 'title_'.$i ); ?>" name="<?php echo $this->get_field_name( 'title_'.$i ); ?>" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'body_text_'.$i ); ?>">Body text:</label>
					<input type="text" id="<?php echo $this->get_field_id( 'body_text_'.$i ); ?>" name="<?php echo $this->get_field_name( 'body_text_'.$i ); ?>" value="<?php echo esc_attr( $body_text ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'url_'.$i ); ?>">URL:</label>
					<input type="text" id="<?php echo $this->get_field_id( 'url_'.$i ); ?>" name="<?php echo $this->get_field_name( 'url_'.$i ); ?>" value="<?php echo esc_attr( $url ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'btn_text_'.$i ); ?>">URL text:</label>
					<input type="text" id="<?php echo $this->get_field_id( 'btn_text_'.$i ); ?>" name="<?php echo $this->get_field_name( 'btn_text_'.$i ); ?>" value="<?php echo esc_attr( $btn_text ); ?>" />
				</p>
			</h4>
		</div>
	<?php
		}
	}
}
?>
