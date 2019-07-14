<?php
//exit if file is called directly
if(! defined('ABSPATH')){
    exit;
}

// register plugin settings
function myplugin_register_settings() {
	/*
	register_setting( 
		string   $option_group. Must match settings_fields() name, 
		string   $option_name, 
		callable $sanitize_callback
	);
	*/
	register_setting( 
		'myplugin_options', 
		'myplugin_options', 
		'myplugin_callback_validate_options' 
    ); 
    
    /*
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page where options are displayed. Must match do_settings_sections() name.
	);
	*/
	
/* My test section start 
	add_settings_section( 
		'my_test_section', 
		'MY TEST SECTION', 
		'myplugin_callback_test_section_link', 
		'myplugin'
	);
  My test section end */

	add_settings_section( 
		'myplugin_section_login', 
		'Customize Login Page', 
		'myplugin_callback_section_login', 
		'myplugin'
	);
	
	add_settings_section( 
		'myplugin_section_admin', 
		'Customize Admin Area', 
		'myplugin_callback_section_admin', 
		'myplugin'
	);
	
	  // callback: login section
/* 	function myplugin_callback_test_section_link() {
        echo '<p>These settings do absolutely nothing yet.</p>';
    } */

    
    // callback: login section
    function myplugin_callback_section_login() {
        echo '<p>These settings enable you to customize the WP Login screen.</p>';
    }

    // callback: admin section
    function myplugin_callback_section_admin() {
        echo '<p>These settings enable you to customize the WP Admin Area.</p>';
    }

    /*
	add_settings_field(
    	string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);
	*/

 /* My test section start  
	add_settings_field(
		'custom_link',
		'Custom Link yo',
		'myplugin_callback_field_text',
		'myplugin',
		'my_test_section',
		[ 'id' => 'custom_link', 'label' => 'Custom link for no purpose' ]
	);
 My test section end */


	add_settings_field(
		'custom_url',
		'Custom URL',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
	);

	add_settings_field(
		'custom_title',
		'Custom Title',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_title', 'label' => 'Custom title attribute for the logo link' ]
	);

	add_settings_field(
		'custom_style',
		'Custom Style',
		'myplugin_callback_field_radio',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
	);

	add_settings_field(
		'custom_message',
		'Custom Message',
		'myplugin_callback_field_textarea',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
	);

	add_settings_field(
		'custom_footer',
		'Custom Footer',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_admin',
		[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
	);

	add_settings_field(
		'custom_toolbar',
		'Custom Toolbar',
		'myplugin_callback_field_checkbox',
		'myplugin',
		'myplugin_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	);

	add_settings_field(
		'custom_scheme',
		'Custom Scheme',
		'myplugin_callback_field_select',
		'myplugin',
		'myplugin_section_admin',
		[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	);
}
add_action( 'admin_init', 'myplugin_register_settings' );