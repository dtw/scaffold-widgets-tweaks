<?php
/*
Based on code by Eduardo Zulian - http://flutuante.com.br - cheers Eduardo
Based on code by Jason King - http://kingjason.com - cheers Jason
*/

/**
 * Register the widget
 */
function SF_register_widget_hwbucks_recent_feedback() {
	register_widget( 'SF_HWBucks_Recent_Feedback_Widget' );
}
add_action( 'widgets_init', 'SF_register_widget_hwbucks_recent_feedback' );
/**
 * A Recent Feedback widget
 * Shows latest feedback comment in a bootstrap panel followed by the next 3 most recent comments in a three column format.
 *
 */
class SF_HWBucks_Recent_Feedback_Widget extends WP_Widget {
	/**
	 * Sets up a new widget instance.
	 *
	 * @access public
	 */
	function SF_HWBucks_Recent_Feedback_Widget() {
		parent::WP_Widget( 'SF_HWBucks_Recent_Feedback_Widget',
		$name = 'HW Recent Feedback',
		array(
			'classname'   => 'scaffold_widget_hwbucks_recent_feedback widget_recent_feedback',
			'description' => 'Display full details of the latest feedback comment as a panal, with the next 3 most recent star ratings below.'
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
		//extract( $args );
		$title = $instance['title'] ;
		$panel_colour = $instance['panel_colour'] ;

		// The Query - gets the last 4 approved comments for post_type local_services
		$args = array(
			'status' => 'approve',
			'post_type' => 'local_services',
			'number' => 4,
		);
		$comments_query = new WP_Comment_Query;
		$comments = $comments_query->query( $args );

		// no use of $before_widget

		$reviewcount = 1;
		// Comment Loop
		if ( $comments ) {
			echo "<div class='feedback row'><!--start widget output-->";
			foreach ( $comments as $comment ) {
				//if this is the first review ?>
				<?php if ($reviewcount == 1) { ?>
					<!-- start the main panel -->
					<?php echo '<div class="panel col-md-12 col-sm-12 col-xs-12 panel-' . $panel_colour . '">'?>
				<?php } elseif ($reviewcount == 4) { ?>
					<!-- start the final small panel -->
					<div class="col-md-4 hidden-sm hidden-xs">
				<?php } else { ?>
					<!-- start a smaller panel -->
					<div class="col-md-4 col-sm-6 hidden-xs">
				<?php } ?>
				<?php 										// Display icon for taxonomy term
					$term_ids = get_the_terms( $comment->comment_post_ID, 'service_types' );	// Find taxonomies
					$term_id = $term_ids[0]->term_id;											// Get taxonomy ID
					$term_icon = get_term_meta( $term_id, 'icon', true );						// Get meta
				?>
						<!-- contains each panel -->
						<div class="row">
						<?php //if this is the main panel
						if ($reviewcount == 1) { ?>
							<?php //if the post has an thumbnail
							if ( has_post_thumbnail($comment->comment_post_ID) ) {
							// add a container and wrap the thumbnail in a hyperlink to the post ?>
									<a href="
									<?php echo get_the_permalink($comment->comment_post_ID); ?>
									">
									<?php echo get_the_post_thumbnail($comment->comment_post_ID,[auto,180]); ?>
								<div class="service-icon-container text-center col-md-4 col-sm-3 hidden-xs">
							<?php } else {
								//if there is no thumb... the col's are different?! ?>
									<a href="
									<?php echo get_the_permalink($comment->comment_post_ID); ?>
									">
										<img class="service-icon-md" src="
										<?php echo $term_icon; ?>
										" alt="
										<?php echo get_the_title($comment->comment_post_ID); ?>
										" />
							<?php } ?>
						<!-- this isn't the main panel 4x to 2x to 1x-->
						<?php } else { ?>
							<!-- add a container and wrap the term icon in a hyperlink to the post -->
							<div class="service-icon-container text-center col-md-3 col-sm-3 col-xs-12">
								<a href="
								<?php echo get_the_permalink($comment->comment_post_ID); ?>
								">
								<img class="service-icon-sm" src="
								<?php echo $term_icon; ?>
								" alt="
								<?php echo get_the_title($comment->comment_post_ID); ?>
								" />
						<?php } ?>
					</a>
				</div>
		<!-- REVIEWED TO HERE-->
								<?php if ($reviewcount == 1) { ?>
									<div class="service-info-container col-md-8 col-sm-6 col-xs-12 panel-text-right">
										<div class="row">
											<div class="col-md-12 panel-title">
												<h2><?php echo $title ?></h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<a class="title-link" href="
													<?php echo get_the_permalink($comment->comment_post_ID); ?>">
													<?php echo get_the_title($comment->comment_post_ID); ?>
												</a>
								<?php } else { ?>
									<div class="service-info-container-sm col-md-9 col-sm-9 col-xs-12">
										<h3 style="margin: 0; padding-bottom: .5rem;">
											<a href="
												<?php echo get_the_permalink($comment->comment_post_ID); ?>">
												<?php echo get_the_title($comment->comment_post_ID); ?>
											</a>
										</h3>
								<?php } ?>
											<?php if ($reviewcount == 1) {
												get_template_part("elements/comments-list");
											?>
												<p>
													<?php
													// mb_strimwidth trims comment to 300 (if needed) and adds an ellipsis
													// wpautop converts double line breaks to <p></p>
													// i.e. this keeps line breaks in the comment
														echo wpautop(mb_strimwidth($comment->comment_content,0,300," ..."), true);
													?>
												</p>
											<?php } ?>
											<?php // Display star rating
											$individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true ); ?>
											<p class="star-rating p-rating">
												<?php
												for ($i = 1; $i <= $individual_rating; ++$i)  {
													echo "<i class='fa fa-star fa-lg'></i> ";
												}
												for ($i = 1; $i <= (5 - $individual_rating); ++$i)  {echo "<i class='fa fa-star-o fa-lg'></i> ";
												}
												?>
											</p>
											<p>
												<strong>
													<?php echo human_time_diff( strtotime($comment->comment_date), current_time( 'timestamp' ) ); ?> ago
												</strong>
											</p>
											<?php
			$reviewcount = $reviewcount + 1;


			} // end of if there is a rating ?>
										</div>
									</div>
								</div>
								<!-- end of col -->
								<?php	 } // end of loop?

		echo "
							</div>
							<!-- end of row -->";

		} else {
			echo 'No comments found.';
		}
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
		$instance['panel_colour'] = wp_strip_all_tags( $new_instance['panel_colour'] );
		return $instance;
	}
	function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Recent feedback from the public';
		$panel_colour = ! empty( $instance['panel_colour'] ) ? $instance['panel_colour'] : 'grey';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Content title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('panel_colour'); ?>">Panel colour:
				<select class='widefat' id="<?php echo $this->get_field_id('panel_colour'); ?>"
						 name="<?php echo $this->get_field_name('panel_colour'); ?>" type="text">
					<?php
					/* This array and loop generates the rows for the dropdown menu. Blue results in panel-blue. Matching styles required in CSS */
					$colourArray = ["Grey", "Orange", "Blue", "Green", "Pink", "Turquoise"];
						foreach ($colourArray as $colour)  {
							echo "<option value='" . strtolower($colour) . "'";
							echo ($panel_colour==strtolower($colour))?'selected':'';
							echo ">" . $colour . "</option>";
						}
					?>
				</select>
			</label>
		</p>
	<?php
	}
}
?>
