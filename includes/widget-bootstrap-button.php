<?php

// Register 'Bootstrap button' widget
add_action( 'widgets_init', 'init_scaffold_bootstrap_button' );
function init_scaffold_bootstrap_button() { return register_widget('scaffold_bootstrap_button'); }


class scaffold_bootstrap_button extends WP_Widget {




	/** constructor */
	function __construct() {
		parent::WP_Widget( 'scaffold_bootstrap_button',
		$name = 'SF Link button',

		array(
			'classname'   => 'scaffold_widget_link_button widget_link_button',
			'description' => 'Button that links to any URL'
		)
	);
	}

	function scaffold_bootstrap_button() {
		self::__construct();
	}

	/**
	* This is our Widget
	**/


	function widget( $args, $instance ) {
		global $post;
		extract($args);


		// Widget options
		$link_text	 = $instance['link_text']; // Text of the link
		$link_url	 = $instance['link_url']; // URL of the link

        // Output
		echo $before_widget;


		echo "<p class='text-center'><a class='btn btn-primary' href='".$link_url."'>" . $link_text . "</a></p>";


?>



		<?php
		// echo widget closing tag
		echo $after_widget;
	}

	/** Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance    = $old_instance;

		//Let's turn that array into something the Wordpress database can store
		$instance['link_text'] = strip_tags( $new_instance['link_text'] );
		$instance['link_url'] = strip_tags( $new_instance['link_url'] );
		return $instance;
	}

	/**
	* Widget settings
	**/
	function form( $instance ) {

		    // instance exist? if not set defaults
		    if ( $instance ) {
				$link_text = $instance['link_text'];
		        $link_url = $instance['link_url'];
		    } else {
			    //These are our defaults
		        $link_url = 'http://';
		    }

			// The widget form
			?>

                	<p>
			<label for="<?php echo $this->get_field_id('link_url'); ?>">What is the URL?</label>
			<input id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" placeholder="http://" type="text" value="<?php echo $link_url; ?>" class="widefat" />
			</p>


            		<p>
			<label for="<?php echo $this->get_field_id('link_text'); ?>"><?php echo  'What text do you want on the button?'; ?></label>
			<input id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>"  type="text" value="<?php echo $link_text; ?>" class="widefat" />
			</p>

	<?php
	}

} // class scaffold_bootstrap_button

?>
