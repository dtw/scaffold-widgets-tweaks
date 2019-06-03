<?php

/*	1. SHORTCODES for Fontawesome ICONS

* phone
* email
* info
* facebook
* twitter
* skype
* youtube
* calendar
* star
* warning
* address

	2. SHORTCODES FOR BOOTSTRAP GRID
* row
* column

	3. Other SHORTCODES

* Search form

*/

/* PHONE icon
------------------------ */

function old_scaffold_shortcode_phone_icon() {
	$phone_icon = "<i class='fa fa-phone fa-lg shortcode-icon'></i> ";
		return $phone_icon;
		}
	add_shortcode( 'phone', 'old_scaffold_shortcode_phone_icon' );

/* TELEPHONE icon
------------------------ */

function old_scaffold_shortcode_telephone_icon() {
	$telephone_icon = "<i class='fa fa-phone fa-lg shortcode-icon'></i> ";
		return $telephone_icon;
		}
	add_shortcode( 'telephone', 'old_scaffold_shortcode_telephone_icon' );

/* EMAIL icon
------------------------ */

function old_scaffold_shortcode_email_icon() {
	$email_icon = "<i class='far fa-envelope fa-lg shortcode-icon'></i> ";
		return $email_icon;
		}
	add_shortcode( 'email', 'old_scaffold_shortcode_email_icon' );

/* INFO icon
------------------------ */

function old_scaffold_shortcode_info_icon() {
	$info_icon = "<i class='fa fa-info-circle fa-lg shortcode-icon'></i> ";
		return $info_icon;
		}
	add_shortcode( 'info', 'old_scaffold_shortcode_info_icon' );

/* FACEBOOK icon
------------------------ */

function old_scaffold_shortcode_facebook_icon() {
	$facebook_icon = "<i class='fab fa-facebook fa-lg shortcode-icon'></i> ";
		return $facebook_icon;
		}
	add_shortcode( 'facebook', 'old_scaffold_shortcode_facebook_icon' );

/* TWITTER icon
------------------------ */

function old_scaffold_shortcode_twitter_icon() {
	$twitter_icon = "<i class='fab fa-twitter fa-lg shortcode-icon'></i> ";
		return $twitter_icon;
		}
	add_shortcode( 'twitter', 'old_scaffold_shortcode_twitter_icon' );

/* SKYPE icon
------------------------ */

function old_scaffold_shortcode_skype_icon() {
	$skype_icon = "<i class='fab fa-skype fa-lg shortcode-icon'></i> ";
		return $skype_icon;
		}
	add_shortcode( 'skype', 'old_scaffold_shortcode_skype_icon' );

/* LINKEDIN icon
------------------------ */

function old_scaffold_shortcode_linkedin_icon() {
	$linkedin_icon = "<i class='fab fa-linkedin fa-lg shortcode-icon'></i> ";
		return $linkedin_icon;
		}
	add_shortcode( 'linkedin', 'old_scaffold_shortcode_linkedin_icon' );

/* YOUTUBE icon
------------------------ */

function old_scaffold_shortcode_youtube_icon() {
	$youtube_icon = "<i class='fab fa-youtube fa-lg shortcode-icon'></i> ";
		return $youtube_icon;
		}
	add_shortcode( 'youtube', 'old_scaffold_shortcode_youtube_icon' );

/* CALENDAR icon
------------------------ */

function old_scaffold_shortcode_calendar_icon() {
	$calendar_icon = "<i class='fa fa-calendar fa-lg shortcode-icon'></i> ";
		return $calendar_icon;
		}
	add_shortcode( 'calendar', 'old_scaffold_shortcode_calendar_icon' );

/* STAR icon
------------------------ */

function old_scaffold_shortcode_star_icon() {
	$star_icon = "<i class='fa fa-star fa-lg shortcode-icon'></i> ";
		return $star_icon;
		}
	add_shortcode( 'star', 'old_scaffold_shortcode_star_icon' );

/* GREEN STAR icon
------------------------ */

function old_scaffold_shortcode_greenstar_icon() {
	$greenstar_icon = "<i class='fa fa-star fa-lg shortcode-icon' style='color:#84BF41;'></i> ";
		return $greenstar_icon;
		}
	add_shortcode( 'greenstar', 'old_scaffold_shortcode_greenstar_icon' );

/* LOCATION icon
------------------------ */

function old_scaffold_shortcode_location_icon() {
	$location_icon = "<i class='fas fa-map-marker-alt fas-lg shortcode-icon'></i> ";
		return $location_icon;
		}
	add_shortcode( 'location', 'old_scaffold_shortcode_location_icon' );

/* WARNING icon
------------------------ */

function old_scaffold_shortcode_warning_icon() {
	$warning_icon = "<i class='fa fa-warning fa-lg shortcode-icon'></i> ";
		return $warning_icon;
		}
	add_shortcode( 'warning', 'old_scaffold_shortcode_warning_icon' );

/* ADDRESS icon
------------------------ */

function old_scaffold_shortcode_address_icon() {
	$address_icon = "<i class='fa fa-pencil-alt fa-lg shortcode-icon'></i> ";
		return $address_icon;
		}
	add_shortcode( 'address', 'old_scaffold_shortcode_address_icon' );

/* WEBSITE icon
------------------------ */

function old_scaffold_shortcode_website_icon() {
	$website_icon = "<i class='fas fa-external-link-alt fa-lg shortcode-icon'></i> ";
		return $website_icon;
		}
	add_shortcode( 'website', 'old_scaffold_shortcode_website_icon' );

	/*



	NEW VERSIONS!!!!!!!!!!!!!!



	*/

	/* PHONE icon
	------------------------ */

	function scaffold_shortcode_phone_icon() {
		$phone_icon = "<i class='fa fa-phone fa-lg shortcode-icon'></i> ";
			return $phone_icon;
			}
		add_shortcode( 'icon_phone', 'scaffold_shortcode_phone_icon' );

	/* TELEPHONE icon
	------------------------ */

	function scaffold_shortcode_telephone_icon() {
		$telephone_icon = "<i class='fa fa-phone fa-lg shortcode-icon'></i> ";
			return $telephone_icon;
			}
		add_shortcode( 'icon_telephone', 'scaffold_shortcode_telephone_icon' );

	/* EMAIL icon
	------------------------ */

	function scaffold_shortcode_email_icon() {
		$email_icon = "<i class='far fa-envelope fa-lg shortcode-icon'></i> ";
			return $email_icon;
			}
		add_shortcode( 'icon_email', 'scaffold_shortcode_email_icon' );

	/* INFO icon
	------------------------ */

	function scaffold_shortcode_info_icon() {
		$info_icon = "<i class='fa fa-info-circle fa-lg shortcode-icon'></i> ";
			return $info_icon;
			}
		add_shortcode( 'icon_info', 'scaffold_shortcode_info_icon' );

	/* FACEBOOK icon
	------------------------ */

	function scaffold_shortcode_facebook_icon() {
		$facebook_icon = "<i class='fab fa-facebook fa-lg shortcode-icon'></i> ";
			return $facebook_icon;
			}
		add_shortcode( 'icon_facebook', 'scaffold_shortcode_facebook_icon' );

	/* TWITTER icon
	------------------------ */

	function scaffold_shortcode_twitter_icon() {
		$twitter_icon = "<i class='fab fa-twitter fa-lg shortcode-icon'></i> ";
			return $twitter_icon;
			}
		add_shortcode( 'icon_twitter', 'scaffold_shortcode_twitter_icon' );

	/* SKYPE icon
	------------------------ */

	function scaffold_shortcode_skype_icon() {
		$skype_icon = "<i class='fab fa-skype fa-lg shortcode-icon'></i> ";
			return $skype_icon;
			}
		add_shortcode( 'icon_skype', 'scaffold_shortcode_skype_icon' );

	/* LINKEDIN icon
	------------------------ */

	function scaffold_shortcode_linkedin_icon() {
		$linkedin_icon = "<i class='fab fa-linkedin fa-lg shortcode-icon'></i> ";
			return $linkedin_icon;
			}
		add_shortcode( 'icon_linkedin', 'scaffold_shortcode_linkedin_icon' );

	/* YOUTUBE icon
	------------------------ */

	function scaffold_shortcode_youtube_icon() {
		$youtube_icon = "<i class='fab fa-youtube fa-lg shortcode-icon'></i> ";
			return $youtube_icon;
			}
		add_shortcode( 'icon_youtube', 'scaffold_shortcode_youtube_icon' );

	/* CALENDAR icon
	------------------------ */

	function scaffold_shortcode_calendar_icon() {
		$calendar_icon = "<i class='fa fa-calendar fa-lg shortcode-icon'></i> ";
			return $calendar_icon;
			}
		add_shortcode( 'icon_calendar', 'scaffold_shortcode_calendar_icon' );

	/* STAR icon
	------------------------ */

	function scaffold_shortcode_star_icon() {
		$star_icon = "<i class='fa fa-star fa-lg shortcode-icon'></i> ";
			return $star_icon;
			}
		add_shortcode( 'icon_star', 'scaffold_shortcode_star_icon' );

	/* GREEN STAR icon
	------------------------ */

	function scaffold_shortcode_greenstar_icon() {
		$greenstar_icon = "<i class='fa fa-star fa-lg shortcode-icon' style='color:#84BF41;'></i> ";
			return $greenstar_icon;
			}
		add_shortcode( 'icon_greenstar', 'scaffold_shortcode_greenstar_icon' );

	/* LOCATION icon
	------------------------ */

	function scaffold_shortcode_location_icon() {
		$location_icon = "<i class='fas fa-map-marker-alt fas-lg shortcode-icon'></i> ";
			return $location_icon;
			}
		add_shortcode( 'icon_location', 'scaffold_shortcode_location_icon' );

	/* WARNING icon
	------------------------ */

	function scaffold_shortcode_warning_icon() {
		$warning_icon = "<i class='fa fa-warning fa-lg shortcode-icon'></i> ";
			return $warning_icon;
			}
		add_shortcode( 'icon_warning', 'scaffold_shortcode_warning_icon' );

	/* ADDRESS icon
	------------------------ */

	function scaffold_shortcode_address_icon() {
		$address_icon = "<i class='fa fa-pencil-alt fa-lg shortcode-icon'></i> ";
			return $address_icon;
			}
		add_shortcode( 'icon_address', 'scaffold_shortcode_address_icon' );

	/* WEBSITE icon
	------------------------ */

	function scaffold_shortcode_website_icon() {
		$website_icon = "<i class='fas fa-external-link-alt fa-lg shortcode-icon'></i> ";
			return $website_icon;
			}
		add_shortcode( 'icon_website', 'scaffold_shortcode_website_icon' );

/* 2. BOOTSTRAP grid
------------------------ */

function scaffold_shortcode_bootstrap_row_start() {
	$bootstrap_row_start = "<div class='row'>";
		return $bootstrap_row_start;
		}
	add_shortcode( 'row', 'scaffold_shortcode_bootstrap_row_start' );

function scaffold_shortcode_bootstrap_row_end() {
	$bootstrap_row_end = "</div><!-- end of row -->";
		return $bootstrap_row_end;
		}
	add_shortcode( 'endrow', 'scaffold_shortcode_bootstrap_row_end' );

function scaffold_shortcode_bootstrap_column_start() {
	$bootstrap_col_start = "<div class='col-md-6'>";
		return $bootstrap_col_start;
		}
	add_shortcode( 'col', 'scaffold_shortcode_bootstrap_column_start' );

function scaffold_shortcode_bootstrap_column_end() {
	$bootstrap_col_end = "</div><!-- end of column -->";
		return $bootstrap_col_end;
		}
	add_shortcode( 'endcol', 'scaffold_shortcode_bootstrap_column_end' );




/* 3. Other SHORTCODES
------------------------ */

/* this isn't a callback so I assume get_search_form is decalred elsewhere */

add_shortcode('search', 'get_search_form');

/*  Adds a search form with scaffold styles */

function scaffold_searchform( $form ) {

	$search_box = "<div class='jumbotron widget widget_search' style='margin: 3rem 0;'>" . get_search_form(false) . "</div>";
	return $search_box;
}

add_shortcode('search', 'scaffold_searchform');

/* Start a bootstrao accordion with [bootstrap_accordion] this requires a closing tag [/bootstrap_accordion] and wraps around accordion_panel (see below) */

function scaffold_shortcode_bootstrap_accordion( $atts, $content = null ) {

	$accordion_output = '
	<div class="panel-group" id="accordion">
		' . do_shortcode($content) . '
	</div> ';
	return $accordion_output;
}

add_shortcode('bootstrap_accordion', 'scaffold_shortcode_bootstrap_accordion');

/*	Add a bootstrap accordion panel with [accordion_panel title="Title for the panel" panel_id="1"]Contents of the panel[/accordion_panel]
		This can be used for any content you want to put into an accordion.
*/

function scaffold_shortcode_bootstrap_accordion_panel( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'title' => 'Title',
			'panel_id' => (int)'1', // setting to 1 means that the panel is expanded on load
		), $atts );

		// this depends on the user
		// if the panel_id attribute is set to 1 the panel will be expanded on load
		if ($a['panel_id'] == '1') {
			$panel_heading_class = '';
			$panel_collapse_class = ' in';
		} else {
		// bootstrap JS adds the collapsed class on toggle but we want to start with it so we can style panels collapsed on load without the JS firing
			$panel_heading_class = ' collapsed';
			$panel_collapse_class = '';
		}

		$accordion_output = '
		<div class="panel panel-default">
			<div class="panel-heading' . $panel_heading_class . '" data-toggle="collapse" data-parent="#accordion" data-target="#' . $a['panel_id'] . '">
				<h4 class="panel-title"><i class="fas fa-caret-right"></i>' . $a['title'] . '</h4>
			</div>
			<div id="' . $a['panel_id'] . '" class="panel-collapse collapse' . $panel_collapse_class . '">
				<div class="panel-body">
					' . do_shortcode($content) . '
				</div>
			</div>
		</div>';
	return $accordion_output;
}

add_shortcode('accordion_panel', 'scaffold_shortcode_bootstrap_accordion_panel');

/*	Add a special bootstrap accordion panel with [signpost_panel title="Step 1 of X" signpost_id="54673"] - this tag is self-closing
		Based on the supplied signpost_id, this fetches a signpost Post and displays the content (without the title)
		in a bootstrap accordion panel
*/

function hwbucks_shortcode_signpost_accordion_panel( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'title' => 'Step 1',
			'signpost_id' => (int)'49784', // this is the A&E signpost
			'expanded' => 'false', // set true to expand first panel
		), $atts );

		// fetch the signpost
		$content_post = get_post($a['signpost_id']);
		// get and clean up the content and title
		$content = apply_filters('the_content', $content_post->post_content);
		$title = apply_filters('the_title', $content_post->post_title);
		$content = do_shortcode($content);

		// this depends on the user
		// if the expanded attribute is set to true the panel will be expanded automatically.
		if ($a['expanded'] == 'true') {
			$panel_heading_class = '';
			$panel_collapse_class = ' in';
		} else {
		// bootstrap JS adds the collapsed class on toggle but we want to start with it so we can style panels collapsed on load without the JS firing
			$panel_heading_class = ' collapsed';
			$panel_collapse_class = '';
		}

		$accordion_output_start = '
	<div class="panel panel-default">
		<div class="panel-heading' . $panel_heading_class . '" data-toggle="collapse" data-parent="#accordion" data-target="#' . $a['signpost_id'] . '">
			<h4 class="panel-title"><i class="fas fa-caret-right"></i>' . $a['title'] . '</h4>
		</div>
		<div id="' . $a['signpost_id'] . '" class="panel-collapse collapse' . $panel_collapse_class . '">
			<div class="panel-body">' . $content;

		$accordion_output_end = '
			</div>
		</div>
	</div>';

	if(is_user_logged_in()){
		$accordion_output_start .= '<p class="edit-signpost"><a href="'. get_edit_post_link($a['signpost_id']) . '">Edit signpost</a></p>';
	};

	return $accordion_output_start . $accordion_output_end;
}

add_shortcode('signpost_panel', 'hwbucks_shortcode_signpost_accordion_panel');

/* Media object ADDRESS
------------------------ */

function hwbucks_shortcode_signpost_address_object( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'address' => 'Mail address for the signpost', // address for the signpost
	), $atts );
	if ( empty( $content ) ) {
		$address_object = '
		<div class="media signpost-address">
			<div class="media-left">
					<i class="media-object fas fa-pencil-alt fa-lg shortcode-icon"></i>
			</div>
			<div class="media-body">' . $a['address'] . '</div>
		</div>';
	} else {
		$address_object = '
		<div class="media signpost-address">
			<div class="media-left">
					<i class="media-object fas fa-pencil-alt fa-lg shortcode-icon"></i>
			</div>
			<div class="media-body">' . $content . '</div>
		</div>';
	}

	return $address_object;
}

add_shortcode( 'signpost_address', 'hwbucks_shortcode_signpost_address_object' );

/* Media object LOCATION
------------------------ */

function hwbucks_shortcode_signpost_location_object( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'location' => 'Physical location for the signpost', // location for the signpost
	), $atts );
	if ( empty( $content ) ) {
		$location_object = '
		<div class="media signpost-location">
			<div class="media-left">
					<i class="media-object fas fa-map-marker-alt fa-lg shortcode-icon"></i>
			</div>
			<div class="media-body">' . $a['location'] . '</div>
		</div>';
	} else {
		$location_object = '
		<div class="media signpost-location">
			<div class="media-left">
					<i class="media-object fas fa-map-marker-alt fa-lg shortcode-icon"></i>
			</div>
			<div class="media-body">' . $content . '</div>
		</div>';
	}

	return $location_object;
}

add_shortcode( 'signpost_location', 'hwbucks_shortcode_signpost_location_object' );

/* Media object WEBSITE
------------------------ */

function hwbucks_shortcode_signpost_website_object( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'website' => 'https://healthwatchbucks.co.uk/', // website for the signpost
	), $atts );

	if ( empty( $content ) ) {
		$cleaned_url = wp_strip_all_tags($a['website']);
	} else {
		$cleaned_url = wp_strip_all_tags($content);
	}
	$display_url = preg_replace("(^https?://)", "", $cleaned_url );
	$website_object = '
	<div class="media signpost-location">
		<div class="media-left">
				<i class="media-object fas fa-external-link-alt  fa-lg shortcode-icon"></i>
		</div>
		<div class="media-body"><a href="' . $cleaned_url . '">' . $display_url . '</a></div>
	</div>';

	return $website_object;
}

add_shortcode( 'signpost_website', 'hwbucks_shortcode_signpost_website_object' );

?>
