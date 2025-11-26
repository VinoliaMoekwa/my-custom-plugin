<?php
/*
Plugin Name: My Custom Plugin
Plugin URI: http://example.com
Description: Adds custom functionality to my WordPress site.
Version: 1.0
Author: Vinolia
Author URI: https://vinolia.sblik.com/
*/

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Test deploy - do not remove


// Enqueue custom CSS
function my_custom_plugin_styles() {
	wp_enqueue_style( 'my-custom-plugin', plugin_dir_url(__FILE__) . 'css/my-custom-plugin.css', array(), '1.0' );
}
add_action('wp_enqueue_scripts', 'my_custom_plugin_styles');

// Enqueue custom JS
function my_custom_plugin_scripts() {
	wp_enqueue_script( 'my-custom-script', plugin_dir_url(__FILE__) . 'js/my-custom-plugin.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_plugin_scripts' );

//Test change for pull request

//Hook into Gravity Forms after submission
add_action('gform_after_submission', 'my_custom_plugin_after_submission', 10,2);

function my_custom_plugin_after_submission($entry ,$form ) {
	//Example :send data to an external site via POST
	$data = array(
		'name'               => rgar( $entry, '1' ), //Field ID 1
		'email'              => rgar( $entry, '2' ), //Field ID 2
		'theme_and_occasion' => rgar( $entry, '3' ), //Field ID 3
	);

	$webhook_url = 'https://webhook.site/e544100e-3dce-4827-9d37-14811098b764';


	$args = array(
		'body'    => json_encode( $data ),
		'headers' => array( 'Content-Type' => 'application/json' ),
		'timeout' => 15
	);

	wp_remote_post( $webhook_url, $args );
}

add_filter('gfpdf_register_templates', function($templates) {
	$templates[] = plugin_dir_path(__FILE__) . 'pdf-templates/event-ticket/config.php';
	return $templates;

	// Example
	function test_plugin_change() {
		return "Hello world  from GitHub Actions!";
	}

	//Test Deployment change

});


