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

// Get Title Tag
function get_title_tag(){
    
    global $post;
    
    if (is_front_page()) { // if it is front page
        
        bloginfo('description');// then retrieve the site tagline
        
    } elseif (is_page()) {//if just pages
        
        the_title(); // then just retrieve the page title
        
        if ($post->post_parent) {// if the page has a parent
            
            echo ' | '; //separator with spaces
            echo get_the_title($post->post_parent); //retrieve the parent page title      
        
        }
    
    } elseif (is_category()) { // for your sites. categories
        
            echo get_the_category()[0]->cat_name; //retrieve the category name    
        
    } elseif (is_single()) { //if it is single - a post
        
        the_title(); //retrieve the posting title
        echo ' | '; //separator with spaces
        echo get_the_category()[0]->cat_name; //retrieve the category name        
    } else { //for everything else 
        
        bloginfo('description');// then retrieve the site tagline   
    
    }
    
    echo ' | '; //separator with spaces
    bloginfo('name');// then retrieve the site name
    echo ' | '; //separator with spaces
    echo 'SeattleBB, WA.'; //the location
    
}
//

// get Search Engine Optimize
function get_seo() {
    $posters = get_post(8);
    $theSEO = $posters->post_content;
    echo $theSEO;
}
//

//Gateway page Spotlights
function gateway_spotlights(){
    global $post;
    
    $words = get_post_meta($post->ID, 'spotlight-page', true);
    $gets = explode (',', $words);
    
    $word001 = $gets[0];
    $word002 = $gets[1];
    $word003 = $gets[2];
    
    if ($words) {
        echo '<div id="spotlight-page">';
        
        echo '<span id="word01">'.$word001.'</span>';
        echo '<span id="word02">'.$word002.'</span>';
        echo '<span id="word03">'.$word003.'</span>';       
        
        echo '</div>';        
    }
    
}
//

// Child pages
// Get Child Pages 
//function get_child_pages() {
//	
//    global $post;
//    rewind_posts(); // stop any previous loops 
//    query_posts(array('post_type' => 'page', 'posts_per_page' => -1, 'post_status' => 'publish','post_parent' => $post->ID,'order' => 'ASC','orderby' => 'menu_order')); // query and order child pages 
//    while (have_posts()) : the_post(); 
//        $childID = $post->ID; // post id
//        $childTitle = $post->post_title; // post titl
//        $parentTitle = get_the_title($post->post_parent);
//        $childImage = get_the_post_thumbnail($post->ID, 'housing'); // get featured thumbnail
//        $childExcerpt = $post->post_excerpt; // post excerpt
//        $childPermalink = get_permalink( $post->ID ); // post permalink
//        echo '<article id="page-excerpt-'.$childID.'" class="page-excerpt">';
//        echo '<a href='.$childPermalink.'>'.$childImage.'</a>';
//        echo '<h3><a href="'.$childPermalink.'">'.$childTitle.' &raquo;</a></h3>';
//        echo '<p>'.$childExcerpt.' <a href="'.$childPermalink.'" class="more">View Our '.$childTitle.' '.$parentTitle.'&nbsp;&raquo;</a></p>';
//        echo '</article>';
//    endwhile;
//    wp_reset_query(); // reset query
//        
//}
//
//

?>