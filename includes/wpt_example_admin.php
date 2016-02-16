<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * All admin stuff that happens inside our extension.
 *
 * @since 0.1
 */

class WPT_Example_Admin {

	function __construct() {

		global $wp_theatre;

		add_filter( 'admin_init', array( $this, 'enqueue_styles_scripts' ) );
		add_filter('admin_init',array($this,'add_settings_fields_to_tab'));
		add_filter('wpt_admin_page_tabs',array($this,'add_wpt_admin_page_tab'));

		// The unique identifier for our plugin, and its version.
		$this->plugin_name = $wp_theatre->example->plugin_name;
		$this->plugin_version = $wp_theatre->example->plugin_version;

		$this->options = get_option($this->plugin_name);
	}


	/**
	 * Adds settings fields to our new settings tab.
	 *
	 * The settings tabs are based on the Settings API.
	 * @see http://codex.wordpress.org/Settings_API
	 *
	 * @since 0.1
	 * @access public
	 * @return void
	 */
	public function add_settings_fields_to_tab() {
        register_setting(
            $this->plugin_name, // Option group
            $this->plugin_name // Option name
        );

        add_settings_section(
            'my_example_section', // ID
            '', // Title
            '', // Callback
            $this->plugin_name // Page
        );

        add_settings_field(
            'my_example_setting', // ID
            __('An example setting','wpt_example'), // Title
            array( $this, 'my_example_setting_callback' ), // Callback
            $this->plugin_name, // Page
            'my_example_section' // Section
        );
	}

	/**
	 * Adds a new settings tab to the Theater settings screen.
	 *
	 * @since 0.1
	 * @access public
	 * @param array $tabs An array of all tabs on the Theater settings screen.
	 * @return array $tabs
	 */
	public function add_wpt_admin_page_tab($tabs) {
		$tabs[$this->plugin_name] = __('Example extension', 'wpt_example');
		return $tabs;
	}

	/**
	 * Enqueue styles and scripts for admin screens.
	 *
	 * @since 0.1
	 * @access public
	 * @return void
	 */
	public function enqueue_styles_scripts() {
		global $wp_theatre;
		$ver = $this->plugin_version;

		wp_enqueue_style('wpt_example_admin', plugins_url( '../css/admin.css', __FILE__ ), array(), $ver);
		wp_enqueue_script('wpt_example_admin', plugins_url( '../js/admin-min.js', __FILE__ ), array('jquery'), $ver, true);
	}

	/**
	 * Renders the input fields for our new setting.
	 *
	 * This is just an example. You should write your own.
	 *
	 * @since 0.1
	 * @access public
	 * @return void
	 */
	public function my_example_setting_callback() {
		echo '<input type="text" id="my_example_setting" name="'.$this->plugin_name.'[my_example_setting]"';
		if (!empty($this->options['my_example_setting'])) {
			echo ' value="'.$this->options['my_example_setting'].'"';

		}
		echo ' />';
	}
}