<?php
	
/**
 * All admin stuff that happens inside your extension.
 *
 * @since 0.1
 */
class WPT_Example_Admin {

	function __construct() {

		add_filter('admin_init',array($this,'admin_init'));
		add_filter('wpt_admin_page_tabs',array($this,'wpt_admin_page_tabs'));
		
	}
		
		
	/**
	 * Adds settings fields to your new settings tab.
	 *
	 * The settings tabs are based on the Settings API.
	 * @see http://codex.wordpress.org/Settings_API
	 * 
	 * @since 0.1
	 * @return void
	 */
	function admin_init() {

		global $wp_theatre;
	
        register_setting(
            $wp_theatre->example->plugin_name, // Option group
            $wp_theatre->example->plugin_name // Option name
        );        

        add_settings_section(
            'my_example_section', // ID
            '', // Title
            '', // Callback
            $wp_theatre->example->plugin_name // Page
        );  

        add_settings_field(
            'my_example_setting', // ID
            __('An example setting',$this->plugin_name), // Title 
            array( $this, 'my_example_setting_callback' ), // Callback
            $wp_theatre->example->plugin_name, // Page
            'my_example_section' // Section           
        );      
	}

	
	/**
	 * Renders the input fields for your new setting.
	 *
	 * This is just an example. You should write your own.
	 * 
	 * @since 0.1
	 * @return void
	 */
	function my_example_setting_callback() {
		global $wp_theatre;
		echo '<input type="text" id="my_example_setting" name="'.$wp_theatre->example->plugin_name.'[my_example_setting]"';
		if (!empty($wp_theatre->example->options['my_example_setting'])) {
			echo ' value="'.$wp_theatre->example->options['my_example_setting'].'"';
			
		}
		echo ' />';
	}

	/**
	 * Adds a new settings tab to the Theater settings screen.
	 * 
	 * @since 0.1
	 * @param array $tabs An array of all tabs on the Theater settings screen.
	 * @return array $tabs
	 */
	function wpt_admin_page_tabs($tabs) {
		global $wp_theatre;
		$tabs[$wp_theatre->example->plugin_name] = __('Example extension', $wp_theatre->example->plugin_name);		
		return $tabs;
	}
	
	
}