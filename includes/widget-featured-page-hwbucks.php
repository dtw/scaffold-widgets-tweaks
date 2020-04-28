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
		$name = 'HW Featured Page',
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
			$show_excerpt = $instance['show_excerpt'];
			$panel_colour = $instance['panel_colour'] ;
			$show_btn = $instance['show_btn'];
			$btn_text = $instance['btn_text'] ;
			$show_last_updated = $instance['show_last_updated'];
			$last_updated_text = $instance['last_updated_text'];
			$p = new WP_Query( array( 'page_id' => $page_id ) );
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
									<?php if ( $show_last_updated ) { ?>
										<p class="panel-updated"> <?php echo $last_updated_text . ' ' . get_the_modified_date(); ?> </p>
									<?php }
									if ( $show_excerpt ) { ?>
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
		$instance['page'] = (int)( $new_instance['page'] );
		$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
		$instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? 1 : 0;
		$instance['panel_colour'] = wp_strip_all_tags( $new_instance['panel_colour'] );
		$instance['show_btn'] = isset( $new_instance['show_btn'] ) ? 1 : 0;
		$instance['btn_text'] = wp_strip_all_tags( $new_instance['btn_text'] );
		$instance['show_last_updated'] = isset( $new_instance['show_last_updated'] ) ? 1 : 0;
		$instance['last_updated_text'] = wp_strip_all_tags( $new_instance['last_updated_text'] );
		return $instance;
	}
	function form( $instance ) {
		$page = isset( $instance['page'] ) ? (int) $instance['page'] : 0;
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Hot news';
		$show_excerpt = $instance['show_excerpt'];
		$panel_colour = ! empty( $instance['panel_colour'] ) ? $instance['panel_colour'] : 'orange';
		$show_btn = $instance['show_btn'];
		$btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : 'Read more';
		$show_last_updated = $instance['show_last_updated'];
		$last_updated_text = ! empty( $instance['last_updated_text'] ) ? $instance['last_updated_text'] : 'Last updated: ';
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
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'show_last_updated' ); ?>" name="<?php echo $this->get_field_name( 'show_last_updated' ); ?>" <?php checked( $show_last_updated, 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_last_updated' ); ?>">Display last update?</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'last_updated_text' ); ?>">Text to display for last update:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'last_updated_text' ); ?>" name="<?php echo $this->get_field_name( 'last_updated_text' ); ?>" value="<?php echo esc_attr( $last_updated_text ); ?>" />
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
