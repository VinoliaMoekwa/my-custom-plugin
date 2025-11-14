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
