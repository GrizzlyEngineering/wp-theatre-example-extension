<?php
	
/**
 * All admin stuff that happens inside your extension.
 *
 * @since 0.1
 */
class WPT_Example_Admin {

	function __construct() {
		
		global $wp_theatre;

		add_filter('admin_init',array($this,'admin_init'));
		add_filter('wpt_admin_page_tabs',array($this,'wpt_admin_page_tabs'));
		
		$this->plugin_name = $wp_theatre->example->plugin_name;
		$this->options = get_option($this->plugin_name);
		
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
	 * Renders the input fields for your new setting.
	 *
	 * This is just an example. You should write your own.
	 * 
	 * @since 0.1
	 * @return void
	 */
	function my_example_setting_callback() {
		echo '<input type="text" id="my_example_setting" name="'.$this->plugin_name.'[my_example_setting]"';
		if (!empty($this->options['my_example_setting'])) {
			echo ' value="'.$this->options['my_example_setting'].'"';
			
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
		$tabs[$this->plugin_name] = __('Example extension', 'wpt_example');		
		return $tabs;
	}
	
	
}