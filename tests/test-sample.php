<?php
class SampleTest extends WP_UnitTestCase {

	function test_plugin_is_loaded() {
		global $wp_theatre;
		
		$this->assertEquals('WPT_Example',get_class($wp_theatre->example));
	}

}

