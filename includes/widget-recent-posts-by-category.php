<?php

// Based on code by author: Ross Cornell http://www.rosscornell.com - thanks Ross!

// Register widget

add_action( 'widgets_init', 'scaffold_register_widget_cat_recent_posts' );

function scaffold_register_widget_cat_recent_posts() {

	register_widget( 'scaffold_widget_cat_recent_posts' );
}

class scaffold_widget_cat_recent_posts extends WP_Widget {

	// Process widget

	function scaffold_widget_cat_recent_posts() {
	
		$widget_ops = array(

			'classname'   => 'scaffold_widget_cat_recent_posts widget_recent_entries',
			'description' => 'Choose a category, how many posts, date and excerpt optional'
		
		);
		
		$this->WP_Widget( 'scaffold_widget_cat_recent_posts', 'SF Recent Posts', $widget_ops );
	
	}
	
	// Build the widget settings form

	function form( $instance ) {
	
		$defaults  = array( 'title' => '', 'category' => '', 'number' => 5, 'show_date' => '' );
		$instance  = wp_parse_args( ( array ) $instance, $defaults );
		$title     = $instance['title'];
		$category  = $instance['category'];
		$number    = $instance['number'];
		$show_date = $instance['show_date'];
		$show_excerpt = isset($instance['show_excerpt']) ? esc_attr( $instance['show_excerpt'] ) : '';
		
		?>
		
		<p>
			<label for="scaffold_widget_cat_recent_posts_title">Title:</label>
			<input type="text" class="widefat" id="scaffold_widget_cat_recent_posts_title" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="scaffold_widget_cat_recent_posts_username">Category:</label>				
			
			<?php

			wp_dropdown_categories( array(

				'orderby'    => 'title',
				'hide_empty' => false,
				'name'       => $this->get_field_name( 'category' ),
				'id'         => 'scaffold_widget_cat_recent_posts_category',
				'class'      => 'widefat',
				'selected'   => $category

			) );

			?>

		</p>
		
		<p>
			<label for="scaffold_widget_cat_recent_posts_number">Number of posts to show: </label>
			<input type="text" id="scaffold_widget_cat_recent_posts_number" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>

		<p>
			<input type="checkbox" id="scaffold_widget_cat_recent_posts_show_date" class="checkbox" name="<?php echo $this->get_field_name( 'show_date' ); ?>" <?php checked( $show_date, 1 ); ?> />
			<label for="scaffold_widget_cat_recent_posts_show_date">Display post date?</label>
		</p>

		<p>
			<input type="checkbox" id="scaffold_widget_cat_recent_posts_show_excerpt" class="checkbox" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" <?php checked( $show_excerpt, 1 ); ?> />
			<label for="scaffold_widget_cat_recent_posts_show_excerpt">Display excerpt?</label>
		</p>
		
		<?php
	
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {

		$instance              = $old_instance;
		$instance['title']     = wp_strip_all_tags( $new_instance['title'] );
		$instance['category']  = wp_strip_all_tags( $new_instance['category'] );
		$instance['number']    = is_numeric( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? 1 : 0;
		$instance['show_excerpt'] = isset( $new_instance['show_excerpt'] ) ? 1 : 0;

		return $instance;

	}















	// Display widget

	function widget( $args, $instance ) {

		extract( $args );

		echo $before_widget;

		$title     = $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category  = $instance['category'];
		$number    = $instance['number'];
		$show_date = ( $instance['show_date'] === 1 ) ? true : false;
		$show_excerpt = ( $instance['show_excerpt'] === 1 ) ? true : false;
		$sticky = get_option( 'sticky_posts' );

		if ( !empty( $title ) ) echo $before_title . $title . $after_title;




// Check if there is a sticky post

$sticky_exclude = $sticky[0];
if (!$sticky_exclude) {
	$sticky_offset = 1;
	}

// Display the first post in a single column, with no offset



		$cat_recent_posts = new WP_Query( array( 

			'post_type'      => 'post',
			'post_status'      => 'publish',
			'posts_per_page' => 1,
			'cat'            => $category,
			'p' 			 => $sticky[0],

		) );

		if ( $cat_recent_posts->have_posts() ) {

			echo '<div class="row img-rounded recent-posts-headliner">';

			while ( $cat_recent_posts->have_posts() ) {

				$cat_recent_posts->the_post();

				if ( has_post_thumbnail() ) {
				echo '<div class="col-md-2 col-sm-3 hidden-xs">';
					}
					
					if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('thumbnail'); ?>
    </a>

				<?php if ( has_post_thumbnail() ) {
					echo '</div><!-- end of column -->';
				}
			
					endif;
			


				if ( has_post_thumbnail() ) {				
				echo '<div class="col-md-10 col-sm-9 col-xs-12">';
				} else {
				echo '<div class="col-md-12 col-sm-12 col-xs-12">';
				}
				
				echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
				if ( $show_excerpt ) { echo '<p class="lead">' . get_the_excerpt() . '</p>';
				}

			}


			echo '<p style="clear: both; margin-top: 3rem;"><a class="btn btn-primary" href="' . get_category_link($category) . '">Read all ' . get_cat_name($category) . '</a></p>';



			echo '</div><!-- end of column --></div><!-- end of row -->';


		} else {

			echo 'No posts yet...';

		}

		wp_reset_postdata();














// Display four posts in four columns, with one offset if there is no sticky post



$sticky = get_option( 'sticky_posts' );

		$cat_recent_posts = new WP_Query( array( 

			'post_type'      => 'post',
			'post_status'      => 'publish',
			'posts_per_page' => $number,
			'cat'            => $category,
			'post__not_in' 		=> $sticky,
			'offset' 		=> $sticky_offset
			

		) );

		if ( $cat_recent_posts->have_posts() ) {

			echo '<div class="row recent-posts">';

			while ( $cat_recent_posts->have_posts() ) {

				$cat_recent_posts->the_post();

				echo '<div class="col-md-3 col-sm-6 col-xs-12" style="min-height: 350px;">';
				
					if ( has_post_thumbnail(large) ) : ?>
    <a class="img-anchor" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('thumbnail'); ?>
    </a>
<?php endif;
			
				
				
				echo '<h3 style="margin: 0; padding-bottom: .5rem;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
				if ( $show_date ) echo '<span class="post-date">' . get_the_time( get_option( 'date_format' ) ) . '</span>';
				if ( $show_excerpt ) echo '<span class="post-excerpt">' . the_excerpt() . '</span>';
				echo '</div><!-- end of column -->';

			}

			echo '</div><!-- end of row -->';


		} else {

			echo 'No posts yet...';

		}

		wp_reset_postdata();

		echo $after_widget;

	}

}

?>