<?php
/*
Plugin Name:	Chapter 2 -  Favicon
Plugin URI:
Description:	Declares a plugin that will be visible in the WordPress admin interface
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/

function ch2fi_page_header_output(){
   $site_icon_url = get_site_icon_url();
   if(!empty($site_icon_url)){
       wp_site_icon();
   } else {
       $icon_url = plugins_url('favicon.ico', __FILE__);
       ?>
       <link rel="shortcut icon" href="<?php echo $icon_url; ?>" />
       <?php
   }

} 

add_action('wp_head', 'ch2fi_page_header_output');