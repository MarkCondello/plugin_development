<?php
/*
Plugin Name:	Chapter 2 - Private item text
Plugin URI:
Description:	Declares a plugin that will support an open and closing [private] shortcode.
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/

function private_shortcode($atts, $content = null){
    if(is_user_logged_in()){
        return "<p class='private'>Private content: " . $content . "</p>";
    } else {
        return "<p class='register'>You need to become a member to view this private content.</p>";
    }
}
add_shortcode( 'private', 'private_shortcode' );

function queue_stylesheet(){
  wp_enqueue_style('privateshortcodestyle', plugins_url('stylesheet.css', __FILE__));  
}
add_action( 'wp_enqueue_scripts', 'queue_stylesheet' );


