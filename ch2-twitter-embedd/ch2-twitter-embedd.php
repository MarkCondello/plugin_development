<?php
/*
Plugin Name:	Chapter 2 - Twitter embedd
Plugin URI:
Description:	Declares a plugin that will be support a shortcode using [twitterfeed user_name="VALUE"].
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/

function twitter_embedd_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'user_name' => 'ylefebvre'
    ), $atts ) ); 
    if (!empty( $user_name)) {
        $output = '<a class="twitter-timeline" href="'; 
        $output .= esc_url( 'https://twitter.com/' . $user_name );
        $output .= '">Tweets by ' . esc_html( $user_name );
        $output .= '</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
    } else {
        $output = '';
    }
    return $output;
}

add_shortcode('twitterfeed', 'twitter_embedd_shortcode');