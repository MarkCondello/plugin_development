<?php
/*
Plugin Name:	Chapter 2 - OOP - Private item text
Plugin URI:
Description:	Declares a plugin that will support an open and closing [private] shortcode.
Version:		2.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/
class OO_Private_Item_Text {
    function __construct(){
        //OOP benefit is that the action and filter function names are encased in this class and there will be no conflicts with other function names.
        add_shortcode( 'private', array($this, 'private_shortcode') );
        add_action( 'wp_enqueue_scripts', array($this, 'queue_stylesheet') );
    }  

    function private_shortcode($atts, $content = null){
        if(is_user_logged_in()){
            return "<p class='private'>Private content: " . $content . "</p>";
        } else {
            return "<p class='register'>You need to become a member to view this private content.</p>";
        }
    }

    function queue_stylesheet(){
        wp_enqueue_style('privateshortcodestyle', plugins_url('stylesheet.css', __FILE__));  
    }
}

$privateArea = new OO_Private_Item_Text();




