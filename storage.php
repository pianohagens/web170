<?php 

/*  
Theme Name: Students of Premium Design Works
Description: This is a theme your mom would finally respond to.
Version: 3
Author: Premium Design Works
Author URI: http://www.premiumdw.com/
*/

// Add Editor Styles
add_editor_style( 'admin.css' );
//


// Register Sidebars
register_sidebars(2, array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
//


// Create Page Excerpts
add_post_type_support( 'page', 'excerpt' );
//


// Enable Post Thumbnails (Featured Image)
add_theme_support( 'post-thumbnails' ); 
//


// Get My Title Tag
function get_my_title_tag() {
	
	global $post;
	
	if ( is_front_page() ) {  // for the site’s Front Page
	
		bloginfo('description'); // retrieve the site tagline
	
	} 
	
	elseif ( is_page() || is_single() ) { // for your site’s Pages or Postings
	
		the_title(); // retrieve the page or posting title 
	
	} 
	
	else { // for everything else
		
		bloginfo('description'); // retrieve the site tagline
		
	}
	
	if ( $post->post_parent ) { // for your site’s Parent Pages
	
		echo ' | '; // separator with spaces
		echo get_the_title($post->post_parent);  // retrieve the parent page title
		
	}
	
	echo ' | '; // separator with spaces
	bloginfo('name'); // retrieve the site name
	echo ' | '; // separator with spaces
	echo 'Seattle, WA.'; // write in the location
	
}
//


// Get My Meta Description 
function get_my_meta_description() {
	
	global $post;
	
	if ( is_page() || is_single() ) { // for pages or postings...
	
		echo strip_tags(get_the_excerpt()); // get the excerpt from the excerpt filed or the first 150 words of the page or posting
		
	} else { // for everything else...
		
		echo strip_tags(get_the_author_meta('description', 6)); // retrieve my author description
		
	}
	
}
//


// Get My Main Menu
function get_my_main_menu() {
	
	echo '<div id="nav">';
	echo '<h4 id="nav-title">Menu<span id="nav-glyph"></span></h4>';
	echo '<ul id="nav-items">';
	
	$main_pages = get_pages(array('meta_key' => 'navigation', 'meta_value' => 'main', ));
	$parent_ID = wp_get_post_parent_id($post_ID);
	
	foreach ($main_pages as $main) { // foreach main (gateway) page... 
	
		if (is_page($main->ID)) { // if is current page...  
			 
			echo '<li class="main page-item-'.$main->ID.' current-page-item">'; // ... add list item with class of current page item
			 
		} elseif ($parent_ID == ($main->ID)) { // if is current page parent...
			
			echo '<li class="main page-item-'.$main->ID.' current-page-parent">'; // ... add list item with class of current page parent
				
		} else { // not current page or current page parent...
			
			echo '<li class="main page-item-'.$main->ID.'">'; // ... add list item with no class
		}
		
		echo '<a href="'.get_permalink($main->ID).'">'.$main->post_title.'</a>'; // get the title with permalink
		echo '<ul class="sub-menu">'; // get the sub-menu items
			
		if ($main->post_parent) { // if the page has a parent...
						
			echo '<li class="pagenav" >Class:';
			echo '<ul>';
			echo '<li><a href="'.get_permalink($main->post_parent).'">Syllabus</a></li>'; // add link to syllabus with no class
			wp_list_pages(array('child_of' => $main->post_parent, 'title_li' => '', 'meta_key' => 'navigation', 'meta_value' => 'class',)); 
			echo '</ul>';
			wp_list_pages(array('child_of' => $main->post_parent, 'title_li' => 'Lectures:', 'meta_key' => 'navigation', 'meta_value' => 'lecture',));
			wp_list_pages(array('child_of' => $main->post_parent, 'title_li' => 'Assignments:', 'meta_key' => 'navigation', 'meta_value' => 'assignment',)); 
			wp_list_pages(array('child_of' => $main->post_parent, 'title_li' => 'Exercises:', 'meta_key' => 'navigation', 'meta_value' => 'exercise',));
			wp_list_pages(array('child_of' => $main->post_parent, 'title_li' => 'Teams:', 'meta_key' => 'navigation', 'meta_value' => 'team',));
			wp_list_pages(array('child_of' => $main->post_parent, 'title_li' => 'Students:', 'meta_key' => 'navigation', 'meta_value' => 'student',));
			
		} else { // if the page does not have a parent...
		
			echo '<li class="pagenav">Class:';
			echo '<ul>';
			
			if (is_page($main->ID)) { // if is the current parent page
				
				echo '<li class="current_page_item"><a href="'.get_permalink($main->ID).'">Syllabus</a></li>'; // add link to syllabus with class of current page item
				
			} else { // not current parent page
				
				echo '<li><a href="'.get_permalink($main->ID).'">Syllabus</a></li>';// add link to syllabus with no class
				
			}
			
			wp_list_pages(array('child_of' => $main->ID, 'title_li' => '', 'meta_key' => 'navigation', 'meta_value' => 'class',));
			echo '</ul>';
			wp_list_pages(array('child_of' => $main->ID, 'title_li' => 'Lectures:', 'meta_key' => 'navigation', 'meta_value' => 'lecture',));
			wp_list_pages(array('child_of' => $main->ID, 'title_li' => 'Assignments:', 'meta_key' => 'navigation', 'meta_value' => 'assignment',));
			wp_list_pages(array('child_of' => $main->ID, 'title_li' => 'Exercises:', 'meta_key' => 'navigation', 'meta_value' => 'exercise',));
			wp_list_pages(array('child_of' => $main->ID, 'title_li' => 'Teams:', 'meta_key' => 'navigation', 'meta_value' => 'team',));
			wp_list_pages(array('child_of' => $main->ID, 'title_li' => 'Students:', 'meta_key' => 'navigation', 'meta_value' => 'student',));
			
		}
		
		echo '</li>';
		echo '</ul>';
	 
	}
	
	echo '</ul>';
	echo '</div>';
	
	wp_reset_query(); // Don't forget this fucking reset query thing or shit will blow the fuck up, mother fucker.
	
}
//


// Get My Sub Menu
function get_my_sub_menu() {
	
	global $post;
	
	$main_page = get_post_meta($post->ID, 'navigation', true) == 'main';
	$child_of_main_page = get_post_meta($post->post_parent, 'navigation', true) == 'main';

	if ($main_page || $child_of_main_page) {
			
		echo '<div id="sub-nav" class="widget">';
		echo '<ul id="sub-nav-items">';	
		
		if ($post->post_parent) { // if the page has a parent...
							
			echo '<li class="pagenav" >'.get_the_title($post->post_parent).' » Class:'; // list "Class" sub-pages
			echo '<ul>';
			echo '<li><a href="'.get_permalink($post->post_parent).'">Syllabus</a></li>'; // stick in the link to syllabus with no class
			wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => '', 'meta_key' => 'navigation', 'meta_value' => 'class',)); 
			echo '</ul>';
			wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => get_the_title($post->post_parent).' » Lectures:', 'meta_key' => 'navigation', 'meta_value' => 'lecture',)); // list "Lecture" sub-pages
			wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => get_the_title($post->post_parent).' » Assignments:', 'meta_key' => 'navigation', 'meta_value' => 'assignment',)); // list "Assignmnets" sub-pages
			wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => get_the_title($post->post_parent).' » Exercises:', 'meta_key' => 'navigation', 'meta_value' => 'exercise',)); // list "Exercises" sub-pages
			wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => get_the_title($post->post_parent).' » Teams:', 'meta_key' => 'navigation', 'meta_value' => 'team',)); // list "Teams" sub-pages
			wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => get_the_title($post->post_parent).' » Students:', 'meta_key' => 'navigation', 'meta_value' => 'student',)); // list "Students" sub-pages
				
		} else { // if the page does not have a parent...
						
			echo '<li class="pagenav">'.get_the_title($post->ID).' » Class:';
			echo '<ul>';
			
			if (is_page($post->ID)) { // stick in the link to syllabus with class
				
				echo '<li class="current_page_item"><a href="'.get_permalink($post->post_parent).'">Syllabus</a></li>';
				
			} else {
				
				echo '<li><a href="'.get_permalink($post->post_parent).'">Syllabus</a></li>';
				
			}
			
			wp_list_pages(array('child_of' => $post->ID, 'title_li' => '', 'meta_key' => 'navigation', 'meta_value' => 'class',));
			echo '</ul>';
			wp_list_pages(array('child_of' => $post->ID, 'title_li' => get_the_title($post->ID).' » Lectures:', 'meta_key' => 'navigation', 'meta_value' => 'lecture',));
			wp_list_pages(array('child_of' => $post->ID, 'title_li' => get_the_title($post->ID).' » Assignments:', 'meta_key' => 'navigation', 'meta_value' => 'assignment',));
			wp_list_pages(array('child_of' => $post->ID, 'title_li' => get_the_title($post->ID).' » Exercises:', 'meta_key' => 'navigation', 'meta_value' => 'exercise',));
			wp_list_pages(array('child_of' => $post->ID, 'title_li' => get_the_title($post->ID).' » Teams:', 'meta_key' => 'navigation', 'meta_value' => 'team',));
			wp_list_pages(array('child_of' => $post->ID, 'title_li' => get_the_title($post->ID).' » Students:', 'meta_key' => 'navigation', 'meta_value' => 'student',));
			
			}
			
		echo '</ul>';
		echo '</div>';
			
	}
	
}
//


// Add a Flexslider Gallery Using Shortcode
function add_flexslider() {
						
	global $post; // don't forget to make this a global variable inside your function or it won't f'ing work
	
	$attachments = get_children(array('post_parent' => $post->ID, 'order' => 'ASC', 'orderby' => 'menu_order',  'post_type' => 'attachment', 'post_mime_type' => 'image', )); // get and order the attachments
	
	if ($attachments) { // check for images attached to posting
		
		$open .= '<div class="flexslider"><ul class="slides">'; // create opening markup
			 
		foreach ( $attachments as $attachment ) { // create the list items with images (slides)
		
			$slides .= '<li id="slide-' . $attachment->ID . '">' . wp_get_attachment_image($attachment->ID, 'large') . '</li>'; // create slides with large size image markup
		
		}
		
		$close .= '</ul></div>'; // create closing markup
		
	} // end check for images
		
	return $open . $slides . $close; // create the whole slider
		
} // end function

add_shortcode( 'flexslider', 'add_flexslider' ); // add shortcode
// 


// Add my Thumbnail Gallery Using Shortcode
function my_thumbnail_gallery() {
						
	global $post; // don't forget to make this a global variable inside your function or it won't f'ing work
	
	$attachments = get_children(array('post_parent' => $post->ID, 'order' => 'ASC', 'orderby' => 'rand',  'post_type' => 'attachment', 'post_mime_type' => 'image', )); // get and order the attachments
	
	if ($attachments) { // check for images attached to posting
		
		$open .= '<div class="my-thumb-gallery"><ul class="my-thumbs">'; // create opening markup
			 
		foreach ( $attachments as $attachment ) { // create the list items with images and links
		
			$thumbs .= '<li id="my-thumb-' . $attachment->ID . '" class="my-thumb">' . wp_get_attachment_link($attachment->ID) . '</li>'; // create a thumbnail size image with link
		
		}
		
		$close .= '</ul></div>'; // create closing markup
		
	} // end check for images
		
	return $open . $thumbs . $close; // create the whole gallery
		
} // end function

add_shortcode( 'mythumbgallery', 'my_thumbnail_gallery' ); // add shortcode
// 


// Get My Photo Sets from Flickr
function get_my_flickr_set($atts) {
    
    $photoset_id = $atts['id']; // pass the photoset id via shorcode
    
    $url = 'https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=51deab88b25b39f3f49fe73891c05f32&photoset_id='.$photoset_id.'&user_id=132730337%40N04&format=json&nojsoncallback=1'; // https://www.flickr.com/services/api/explore/flickr.photosets.getPhotos
    
    $response = json_decode(file_get_contents($url)); // get url via json
    
    $photos = $response->photoset->photo; // response for photosets

    $output = '<ul class="my-flickr-set">'; // begin markup

    foreach( array_reverse($photos) as $photo ) { // begin loop

        $output .= '<li class="my-flickr-thumb"><a href="https://www.flickr.com/photos/132730337@N04/'. $photo->id .'" target="_blank"><img src="http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'_q.jpg" /></a></li>'; // create the list item(s) with a square thumbnail that links to the photo on Flickr

    }  // end loop

    $output .= '</ul>';  // end markup
    
    return $output; // return it, bitch.
	
} // end function

add_shortcode( 'myflickrset','get_my_flickr_set'); // add shortcode
//


// Get My Latest Photos from Flickr
function get_my_flickr_latest() {
    
    $url = 'https://api.flickr.com/services/rest/?method=flickr.people.getPhotos&api_key=51deab88b25b39f3f49fe73891c05f32&user_id=132730337%40N04&per_page=4&format=json&nojsoncallback=1'; // https://www.flickr.com/services/api/explore/flickr.people.getPhotos
    
    $response = json_decode(file_get_contents($url)); // get url via json
    
    $photos = $response->photos->photo; // response for photos

    $output = '<ul class="my-flickr-latest">'; // begin markup

    foreach( $photos as $photo ) { // begin loop

        $output .= '<li class="my-flickr-thumb"><a href="https://www.flickr.com/photos/132730337@N04/'. $photo->id .'" target="_blank"><img src="http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'_q.jpg" /></a></li>'; // create the list item(s) with a square thumbnail that links to the photo on Flickr

    }  // end loop

    $output .= '</ul>';  // end markup
    
    return $output; // return it, bitch.
	
} // end function

add_shortcode( 'myflickrlatest','get_my_flickr_latest'); // add shortcode 
//


// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
//


// Open Graph Image
function get_opengraph_image() {    
    
    if ( has_post_thumbnail() ) { // if there is a featured image
        
		$get_my_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true ); // set the featured image
		
		echo $get_my_featured_image[0]; // get the featured image
                
    } else { 
	
		$get_my_default_image = bloginfo('template_directory').'/images/thumbnail-default.png'; // set the default image
		
		echo $get_my_default_image; // get the default image
    
    }
	
}
//


// Dedication Thingy
function get_dedication() {
	
	echo 'Empty. :-(';
	
}
//



// Show Gravatars
function show_avatar($comment, $size) {		
		
	$email=strtolower(trim($comment->comment_author_email));
	$rating = "G"; // [G | PG | R | X]
 
	if (function_exists('get_avatar')) {
		
		echo get_avatar($email, $size);
		
	} else {
  
  		$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5($emaill) . "&size=" . $size."&rating=".$rating;
  	
		echo "<img src='$grav_url'/>";
	}
			
}
//	


// Remove Inline Styles from Captions
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');

function fixed_img_caption_shortcode($attr, $content = null) {
	
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array('id' => '', 'align'	=> 'alignnone', 'width'	=> '', 'caption' => ''), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
//


// Remove Emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
//

	
?>