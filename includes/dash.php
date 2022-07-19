<?php

/*

1. Hide welcome panel
2. Remove Dashboard Widgets
3. Unregister default WIDGETS
4. Add CUSTOM CSS to the ADMIN DASHBOARD
5. Disallow theme and plugin editor
6. Modify text in the ADMIN FOOTER
7. Register Editor CSS
8. Custom dashboard widget
9. Add Demographic URL tool

*/


/* 1. Hide welcome panel
-------------------------------------------------------- */

remove_action('welcome_panel', 'wp_welcome_panel' );



/* 2. Remove Dashboard Widgets
-------------------------------------------------------- */

function remove_dashboard_widgets() {
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );



/* 3. Unregister default WIDGETS
-------------------------------------------------------- */

 function unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Categories');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('Akismet_Widget');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_RSS');
 }
 add_action('widgets_init', 'unregister_default_widgets', 11);



/* 4. Add CUSTOM CSS to the ADMIN DASHBOARD
-------------------------------------------------------- */

function scaffold_admin_css() {
	wp_enqueue_style('admin_styles' , plugins_url().'/scaffold-widgets-tweaks/css/dashboard.css?ver=1000');
	}

	add_action('admin_head', 'scaffold_admin_css');




/* 5. Disallow theme and plugin editor
-------------------------------------------------------- */


/* 6. Tidy
https://developer.wordpress.org/reference/hooks/default_hidden_meta_boxes/
-------------------------------------------------------- */

add_filter('hidden_meta_boxes','hide_meta_box',10,2);

function hide_meta_box($hidden, $screen) {
    //make sure we are dealing with the correct screen
    if ('post' == $screen->base){
      //
      $hidden = array('slugdiv','postcustom','commentstatusdiv','authordiv','yarpp_relatedposts','asp_metadata');
      //$hidden[] ='my_custom_meta_box';//for custom meta box, enter the id used in the add_meta_box() function.
    }
    return $hidden;
  }





/* 7. Register Editor CSS
-------------------------------------------------------- */

function scaffold_add_editor_styles() {
add_editor_style( 'editor.css' );
}
add_action( 'after_setup_theme', 'scaffold_add_editor_styles' );



/* 8. Custom dashboard widget
-------------------------------------------------------- */

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget('custom_help_widget', 'Get website support', 'custom_dashboard_help');
}

function custom_dashboard_help() {

  $url = home_url('');

  $google_mobile_friendly_url = 'https://www.google.co.uk/webmasters/tools/mobile-friendly/?url=' . $url;

  $twitter_url = 'http://www.twitter.com/jasoncsking';

  $rtfm = 'https://docs.google.com/document/d/1Vdji4IOJnPP8akjGdVGLP_i6je165qBg_rZbWkr05I8/edit?usp=sharing';

  $my_theme = wp_get_theme();
  $my_theme_name = $my_theme->get( 'Name' );
  $my_theme_version = $my_theme->get( 'Version' );

  echo '

  <p><img src="' . $url . '/wp-content/themes/scaffold/screenshot.png" width="140" style="float:right;" />Your <strong>WordPress</strong> theme is <strong>' . $my_theme_name . ' version ' . $my_theme_version . '</strong>.</p>

  <p><span class="dashicons dashicons-awards"></span>Your website is <a href="' . $google_mobile_friendly_url . '">mobile friendly</a></p>

  <p><span class="dashicons dashicons-info"></span> <a target="_blank" href="' . $url . '/wp-content/themes/scaffold/readme.txt">Readme.txt</a> - theme information and change log</p>

  <p><span class="dashicons dashicons-awards"></span>This theme meets  <a href="' . $url . '/wp-admin/themes.php?page=themecheck">WordPress quality standards</a></p>


  <hr />

  <p><img src="https://pbs.twimg.com/profile_images/446240204962013184/bPy0WSrL_400x400.jpeg" width="120" style="float:right; " />This theme is built and supported by <strong>Jason King</strong>, please contact him with any problems or questions.</p>

  <p><span class="dashicons dashicons-admin-links"></span> <a href="http://www.kingjason.co.uk">www.kingjason.co.uk</a></p>

  <p><span class="dashicons dashicons-email-alt"></span> <a href="mailto:jason@kingjason.co.uk">jason@kingjason.co.uk</a></p>

  <p><span class="dashicons dashicons-phone"></span> <strong>07414 755 856</strong>.</p>

  <p><span class="dashicons dashicons-twitter"></span> <a href="' . $twitter_url . '" target="_blank">@jasoncsking</a></p>

  <hr />

  <p><span class="dashicons dashicons-welcome-learn-more"></span> Getting started? <a href="'. $rtfm .'" target="_blank">READ THE MANUAL</a> on Google Drive</p>

  <p><span class="dashicons dashicons-tickets"></span> Requests? Problems? <a href="mailto:jason@kingjason.co.uk">Email a support ticket</a> to <strong>jason@kingjason.co.uk</strong></p>';
}

/* 9. Add Demographic URL tool
-------------------------------------------------------- */

function hwbucks_url_tool() {
		add_management_page(
			'Demographic URL Tool',
			'Demographic URL Tool',
			'read_private_posts',
			'demographic-url-tool',
			'hwbucks_url_tool_contents',
		);
	}

	add_action( 'admin_menu', 'hwbucks_url_tool' );

	function hwbucks_url_tool_contents() {
		?>
    <div id="hwbucks-url-tool">
      <h1>Demographic Survey URL Tool</h1>
      <div id="hwbucks-url-tool-intructions">
        <p>If you need to complete a demographic survey over the phone, the results will need to be linked to a CiviCRM Contact. This tool can be used to generate a link to the demographic survey based on URLs from CiviCRM.</p>
        <p>This tool will work with either:</p>
          <ul>
            <li>CiviCRM Client URLs - https://bucks.healthwatchcrm.co.uk/civicrm/contact/view?reset=1&cid=2000</li>
            <li>CiviCRM Case view URLs - https://bucks.healthwatchcrm.co.uk/civicrm/contact/view/case?reset=1&id=488&cid=2000&action=view&context=case&selectedChild=case&key=somekey</li>
          </ul>
          <p>Copy the appropriate URL from your web browser and paste into the "CiviCRM URL" field and click "Generate Link". Once the link is generated, you can click through to the survey.</p>
          <p>Click the "Reset" button before pasting a new URL.
      </div>
      <div id="form">
        <form id="formularz">
          <label for="civicrm_url" class="labelInline">CiviCRM URL</label>
          <input type="text" name="civicrm_url" id="civicrm_url"/>
          <button type="button" onclick="generateLink();">Generate Link</button>
          <button type="button" onclick="window.location.reload(true)">Reset</button>
        </form>
      </div>
      <div id="final">
        <p><a href="https://www.smartsurvey.co.uk/s/HW_BUCKS_DEMO_S/?src=signposting&id=id_value" target="_blank">https://www.smartsurvey.co.uk/s/HW_BUCKS_DEMO_S/?src=signposting&id=id_value</a></p>
      </div>
    </div>
		<?php
	}

?>
