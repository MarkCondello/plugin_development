<?php
/*
Plugin Name:	Chapter 2 - Meta Generator
Plugin URI:
Description:	Declares a plugin that will be visible in the WordPress admin interface
Version:		1.0
Author:			Markamus Maximus
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/
function ch2gf_generator_filter($html, $type){
    if($type == 'xhtml'){
        $html = preg_replace('/WordPress.?/', 'Markamus Maximus', $html);
       // $html = preg_replace('/[0-9].?/', ' Version Me', $html); // tried to remove the version number
    }
    return $html;
}

add_filter('the_generator', 'ch2gf_generator_filter', 10, 2);