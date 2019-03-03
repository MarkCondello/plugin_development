<?php
/*
Plugin Name:	Chapter 2 - Nav menu filter
Plugin URI:
Description:	Declares a plugin that will be hide the menu item Private Area if not an admin user.
Version:		1.0
Author:			Yannick Lefebvre
Author URI:		http://ylefebvre.ca
License:		GPLv2
*/
function ch2nmf_new_nav_menu_items($sorted_menu_items, $args){
    //print_r($sorted_menu_items);
    if(is_user_logged_in() == FALSE) {
        //loop through menu itesm and get each items $key variable
        foreach($sorted_menu_items as $key => $sorted_menu_item):
            //check if title matches search string
            if('Private Area' == $sorted_menu_item->title) {
                //remove item from the menu array
                unset($sorted_menu_items[$key]);
            }
        endforeach;
    }
    return $sorted_menu_items;
}

add_filter('wp_nav_menu_objects', 'ch2nmf_new_nav_menu_items', 10, 2);