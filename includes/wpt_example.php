<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * The class that holds all main functionality of our extension.
 *
 * @since 0.1
 */

class WPT_Example {

	function __construct() {

		global $wpt_example_version;

		// A unique identifier for our plugin, and its version.
		$this->plugin_name = 'wpt_example';
		$this->plugin_version = $wpt_example_version;

		/*
		 * Load the options for our plugin.
		 * @see WPT_Example_Admin
		 */
		$this->options = get_option($this->plugin_name);
	}

	/**
	 * Loads and initializes the sub classes of our plugin.
	 *
	 * @since 0.1
	 * @access private
	 * @return void
	 */
	private function load_dependencies() {
		if (is_admin()) {
			require_once(dirname(__FILE__) . '/wpt_example_admin.php');
			$this->admin = new WPT_Example_Admin();
		}
	}

	/**
	 * Runs our extension.
	 *
	 * Used to safely run our code when everything is fully loaded.
	 *
	 * @since 0.1
	 * @access public
	 * @return void
	 */
	public function run() {

		$this->load_dependencies();
	}
}