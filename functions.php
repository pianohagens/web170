<?php

/*
Theme name: Web170_Temp
Author: Piano Hagens
Author URI: https://phagens.com/web170_temp/
Description: Wordpress project start with sketch sheet
Version: 1.0
*/

// Register Menu Locations-- if no argument provided, it will not have "Manage Location" Tag
register_nav_menus(array(
    'top-menu' =>__('My Menus', 'Web170_Temp'), 
    'bottom-menu' =>__('Bottom Menus', 'Web170_Temp'), 
    'side-menu' =>__('Side Menus', 'Web170_Temp'), 
)); 
//

// Register Sidebar
register_sidebar(array(
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));
//

// Create page Excerpts
add_post_type_support( 'page', 'excerpt' );

//// custom_excerpt Filter the except length to 20 words.
//function custom_excerpt_length( $length ) {
//    return 20;
//}
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//

// Create Post Thumbnails
add_theme_support( 'post-thumbnails' );
?>