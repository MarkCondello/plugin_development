<?php
/*
Plugin Name:	Chapter 2 - Twitter shortcode
Plugin URI:
Description:	Declares a plugin that will be support a shortcode using [tl].
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/
function twitter_link_shortcode( $atts ) {
    $output = '<a href="https://twitter.com/ylefebvre">';
    $output .= 'Twitter Feed</a>';
    return $output;
}

add_shortcode('tl', 'twitter_link_shortcode');