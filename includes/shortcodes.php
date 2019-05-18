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

function scaffold_shortcode_phone_icon() {
	$phone_icon = "<i class='fa fa-phone fa-lg shortcode-icon'></i> ";
		return $phone_icon;
		}
	add_shortcode( 'phone', 'scaffold_shortcode_phone_icon' );

/* TELEPHONE icon
------------------------ */

function scaffold_shortcode_telephone_icon() {
	$telephone_icon = "<i class='fa fa-phone fa-lg shortcode-icon'></i> ";
		return $telephone_icon;
		}
	add_shortcode( 'telephone', 'scaffold_shortcode_telephone_icon' );

/* EMAIL icon
------------------------ */

function scaffold_shortcode_email_icon() {
	$email_icon = "<i class='far fa-envelope fa-lg shortcode-icon'></i> ";
		return $email_icon;
		}
	add_shortcode( 'email', 'scaffold_shortcode_email_icon' );

/* INFO icon
------------------------ */

function scaffold_shortcode_info_icon() {
	$info_icon = "<i class='fa fa-info-circle fa-lg shortcode-icon'></i> ";
		return $info_icon;
		}
	add_shortcode( 'info', 'scaffold_shortcode_info_icon' );

/* FACEBOOK icon
------------------------ */

function scaffold_shortcode_facebook_icon() {
	$facebook_icon = "<i class='fab fa-facebook fa-lg shortcode-icon'></i> ";
		return $facebook_icon;
		}
	add_shortcode( 'facebook', 'scaffold_shortcode_facebook_icon' );

/* TWITTER icon
------------------------ */

function scaffold_shortcode_twitter_icon() {
	$twitter_icon = "<i class='fab fa-twitter fa-lg shortcode-icon'></i> ";
		return $twitter_icon;
		}
	add_shortcode( 'twitter', 'scaffold_shortcode_twitter_icon' );

/* SKYPE icon
------------------------ */

function scaffold_shortcode_skype_icon() {
	$skype_icon = "<i class='fab fa-skype fa-lg shortcode-icon'></i> ";
		return $skype_icon;
		}
	add_shortcode( 'skype', 'scaffold_shortcode_skype_icon' );

/* LINKEDIN icon
------------------------ */

function scaffold_shortcode_linkedin_icon() {
	$linkedin_icon = "<i class='fab fa-linkedin fa-lg shortcode-icon'></i> ";
		return $linkedin_icon;
		}
	add_shortcode( 'linkedin', 'scaffold_shortcode_linkedin_icon' );

/* YOUTUBE icon
------------------------ */

function scaffold_shortcode_youtube_icon() {
	$youtube_icon = "<i class='fab fa-youtube fa-lg shortcode-icon'></i> ";
		return $youtube_icon;
		}
	add_shortcode( 'youtube', 'scaffold_shortcode_youtube_icon' );

/* CALENDAR icon
------------------------ */

function scaffold_shortcode_calendar_icon() {
	$calendar_icon = "<i class='fa fa-calendar fa-lg shortcode-icon'></i> ";
		return $calendar_icon;
		}
	add_shortcode( 'calendar', 'scaffold_shortcode_calendar_icon' );

/* STAR icon
------------------------ */

function scaffold_shortcode_star_icon() {
	$star_icon = "<i class='fa fa-star fa-lg shortcode-icon'></i> ";
		return $star_icon;
		}
	add_shortcode( 'star', 'scaffold_shortcode_star_icon' );

/* GREEN STAR icon
------------------------ */

function scaffold_shortcode_greenstar_icon() {
	$greenstar_icon = "<i class='fa fa-star fa-lg shortcode-icon' style='color:#84BF41;'></i> ";
		return $greenstar_icon;
		}
	add_shortcode( 'greenstar', 'scaffold_shortcode_greenstar_icon' );

/* LOCATION icon
------------------------ */

function scaffold_shortcode_location_icon() {
	$location_icon = "<i class='fas fa-map-marker-alt fas-lg shortcode-icon'></i> ";
		return $location_icon;
		}
	add_shortcode( 'location', 'scaffold_shortcode_location_icon' );

/* WARNING icon
------------------------ */

function scaffold_shortcode_warning_icon() {
	$warning_icon = "<i class='fa fa-warning fa-lg shortcode-icon'></i> ";
		return $warning_icon;
		}
	add_shortcode( 'warning', 'scaffold_shortcode_warning_icon' );

/* ADDRESS icon
------------------------ */

function scaffold_shortcode_address_icon() {
	$address_icon = "<i class='fa fa-pencil-alt fa-lg shortcode-icon'></i> ";
		return $address_icon;
		}
	add_shortcode( 'address', 'scaffold_shortcode_address_icon' );

/* WEBSITE icon
------------------------ */

function scaffold_shortcode_website_icon() {
	$website_icon = "<i class='fa fa-link fa-lg shortcode-icon'></i> ";
		return $website_icon;
		}
	add_shortcode( 'website', 'scaffold_shortcode_website_icon' );




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

add_shortcode('search', 'get_search_form');

function scaffold_searchform( $form ) {

	$search_box = "<div class='jumbotron widget widget_search' style='margin: 3rem 0;'>" . get_search_form(false) . "</div>";
	return $search_box;
}

add_shortcode('search', 'scaffold_searchform');

function scaffold_shortcode_bootstrap_accordion( $form ) {

	$accordion_output = '<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Collapsible Group 1</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Collapsible Group 2</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Collapsible Group 3</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
</div> ';
	return $accordion_output;
}

add_shortcode('accordion', 'scaffold_shortcode_bootstrap_accordion');
?>
