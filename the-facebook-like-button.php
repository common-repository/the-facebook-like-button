<?php
/*
Plugin Name: The Facebook Like Button
Plugin URI: http://core.sproutventure.com
Description: Added automitically to your posts ( w/ options for shortcodes or template tags ) the Like button lets users share pages from your site back to their Facebook profile with one click.
Version: beta
Author: Dan Cameron of Sproutventure
Author URI: http://sproutventure.com 
*/


/**
* Plugin Class
*/
if ( !class_exists('FacebookLike') ) {
	
	class FacebookLike
	{

		public function __construct()
		{
			define('PLUG_LOCAL', 'fb_like');
			
			define('FBL_ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
			$this->pluginUrl = str_replace( WP_PLUGIN_DIR, WP_PLUGIN_URL, $this->pluginDirectory );
			
			// Add necessary js
			add_action( 'wp_head', array( $this, 'fb_connect_js' ) );
			//add_action( 'init', array( $this, 'enqueue_resources' ) );
			
			// Options panel
			/*/ Disabled until necessary
			if (is_admin()) {
				include ( FBW_ABSPATH . 'views/admin.php' );
				$FBWOptions = new FacebookLikeOptions();
			}
			/**/
		}
		public function fb_connect_js()
		{
			/**/ ?>
				<script src="//connect.facebook.net/en_US/all.js"></script>
			<?php
			/**/
		}
		public function enqueue_resources() 
		{
			//wp_enqueue_script('facebook-connect', 'http://connect.facebook.net/en_US/all.js');
		}
		
	}
	global $fbl;
	$fbl = new FacebookLike();
	
	// Load up template tags
	// include ('library/template-tags.php');
}