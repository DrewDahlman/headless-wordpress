<?php 

/*
Plugin Name: WP Headless
Plugin URI: https://github.com/DrewDahlman/wp-headless
Description: A simple plugin for publishing static JSON files from Wordpress for a headless CMS.
Version: 1.0.0
Author: Drew Dahlman
Author URI: http://drewdahlman.com/
License: MIT
Copyright: Drew Dahlman
*/

// Set the header
header("Content-type:application/json");

// Exit if accessed directly.
if ( ! defined( "ABSPATH" ) ) {
	exit;
}

if( !class_exists("wpheadless") ){

	// Deps
	include_once("lib/uploader.php");

	class wpheadless {

		// Setup vars
		var $version = "1.0.0";
		var $settings = array();
		var $posts;

		/*
		------------------------------------------
		| construct:void (-)
		|
		| Create our class.
		| 
		| @env:string - The environment to publish
		------------------------------------------ */
		function __construct( $env ){

			// Setup
			$this->createOptionsPage();

			// Settings
			$this->settings = array(
				"name"		=> "WP Headless",
				"version" => $this->version,
				"files"		=> array(),
				"env"			=> $env,
				"tmp_dir"	=> get_template_directory() . "/data/"
			);
		}

		/*
		------------------------------------------
		| createOptionsPage:void (-)
		|
		| Create an options page
		------------------------------------------ */
		function createOptionsPage(){
			acf_add_options_page(array(
				"page_title" 	=> "publish Settings",
				"menu_title"	=> "publish Settings",
				"menu_slug" 	=> "publish-settings-configuration",
				"capability"	=> "edit_posts",
				"redirect"		=> false
			));
		}

	}

	// Check for dependencies
	function requirement_check() {
		$pass = true;
		$dependencies = array(
			array(
				"name" 		 => "Advanced Custom Fields Pro",
				"file" 		 => "advanced-custom-fields-pro/acf.php",
				"link" 		 => "https://wordpress.org/plugins/advanced-custom-fields/",
				"required" => true
			),
			array(
				"name" 		 => "Amazon Web Services",
				"file" 		 => "amazon-web-services/amazon-web-services.php",
				"link" 		 => "https://wordpress.org/plugins/amazon-web-services/",
				"required" => true
			),
			array(
				"name" 		 => "WP Offload",
				"file" 		 => "amazon-s3-and-cloudfront/wordpress-s3.php",
				"link" 		 => "https://wordpress.org/plugins/amazon-web-services/",
				"required" => false
			)
		);

		foreach( $dependencies as $dependency ){
			if( !is_plugin_active( $dependency["file"]) ){
				if( $dependency['required'] ){
					$class = "notice notice-error";
					$message = "WP Headless requires " . $dependency["name"] . " <a href='" . $dependency["link"] . "'>Click to download</a>";
					$pass = false;
				} else {
					$class = "notice notice-error is-dismissable";
					$message = "WP Headless doesn't require " . $dependency["name"] . " but having it installed will make things better. <a href='" . $dependency["link"] . "'>Click to download</a>";
				}
				include("views/dependency-error.php");
			}
		}

		// If no errors then create the options page
		if( $pass ){
			acf_add_options_page(array(
				"page_title" 	=> "Publish Settings",
				"menu_title"	=> "Publish Settings",
				"menu_slug" 	=> "publish-settings-configuration",
				"capability"	=> "edit_posts",
				"redirect"		=> false
			));
		}

	}
	add_action( "_admin_menu", "requirement_check" );

}

?>