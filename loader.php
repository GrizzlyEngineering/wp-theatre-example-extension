<?php
/*
Plugin Name: Example Extension for Theater
Version: 0.1
Description: An example extension for Theater for WordPress that you can use to write your own extension..
Author: Jeroen Schmit
Author URI: http://slimndap.com
Plugin URI: https://github.com/slimndap/wp-theatre-starter-extension
Text Domain: wpt_example
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$wpt_example_version = '0.1';

/**
 * Loads our extension.
 *
 * Triggered by the `wpt_loaded` action, which is fired after the Theater for WordPress plugin is loaded.
 * @see includes/wpt_example.php
 *
 * @since 1.0
 * @return void
 */
function wpt_example_loader() {

	global $wp_theatre;

	require_once(dirname(__FILE__) . '/includes/wpt_example.php');

	/**
	 * Add an instance of our class to the global Theater object and then run it.
	 *
	 * Requires Theater 0.9.4.
	 */
	$wp_theatre->example = new WPT_Example();
	$wp_theatre->example->run();

}

add_action('wpt_loaded', 'wpt_example_loader');