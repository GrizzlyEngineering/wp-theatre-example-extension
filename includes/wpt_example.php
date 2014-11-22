<?php

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	/**
	 * WPT_Example class.
	 *
	 * This is the class that holds all functionality that is specific to your extension.
	 * Be sure to rename all references to 'example'.
	 *
	 * @since 0.1
	 */
	 
	class WPT_Example {
		
		function __construct() {

			// A unique identifier for your plugin.
			$this->plugin_name = 'wpt_example';
			
			/*
			 * Load the options for your plugin.
			 * @see WPT_Example_Admin
			 */
			$this->options = get_option($this->plugin_name);
			
			$this->load_dependencies();

			// Start adding your stuff below...

		}
		
		/**
		 * Loads and initializes the sub classes of your plugin.
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
		
	}