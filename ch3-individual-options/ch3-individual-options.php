<?php
/*
Plugin Name:	Chapter 3 - Individual options
Plugin URI:
Description:	Declares a plugin that will record options in the DB.
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/

function ch3io_set_default_options() {
    if ( false === get_option( 'ch3io_ga_account_name' ) ) {
        add_option( 'ch3io_ga_account_name', 'UA-0000000-0' );  
    }
}

register_activation_hook( __FILE__, 'ch3io_set_default_options' );


/* Query the db
select * from wp_options where option_name = 'ch3io_ga_account_name'

The register_activation_hook function is used to indicate to WordPress the name of the function that should be called when it activates the plugin. Unlike other hooks, this function requires the name of the main plugin code file to be sent as its first argument, along with the name of the associated function. To do this easily, we can leverage the PHP __FILE__ constant as the first argument, which will resolve to the filename.

Before making a call to create the new option (add_option), the activation function checks whether the option is present in the WordPress options table using the get_option function. If the return value is false, indicating that the option was not found, a new default option can be created.

*/

