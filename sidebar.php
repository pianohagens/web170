    
    <!----- Begin aside --------------->
    <div id="sidebar">
        <h2> <?php echo get_the_title($post->post_parent); ?></h2>
        
        <ul> <!----- Begin sub-navigation --------->
        <?php 
            if($post->post_parent) {//if the page has a parent....
                wp_list_pages(array('title_li' => '', 'child_of' => $post->post_parent, )); // list the children of said parent 
            } else { // if on the parent page...
            
                wp_list_pages(array('title_li' => '', 'child_of' => $post->ID, ));            
            }
            
            ?>
      </ul>   <!----- End sub-navigation --------------->
        
        <h3><!--- Begin Pull Quote for Your Site Using Custom Fields ----->
        
        <?php if (get_post_meta($post->ID, 'Quote', 'Blessing', 'Good News', true)) : //check to see if there is a quote called 'Blessing'?> 
            
            <ul>
            <blockquote><?php echo get_post_meta($post->ID, 'Quote', true); //write out the quote?> </blockquote>
            <blockquote><?php echo get_post_meta($post->ID, 'Blessing', true); //write out the quote?> </blockquote>
            <blockquote><?php echo get_post_meta($post->ID, 'Good News', true); //write out the quote?> </blockquote>            
            </ul>
        <?php endif; ?> 
        </h3><!--- End Pull Quote for Your Site Using Custom Fields -----> 
        
     
            <!----- Begin Dynamic sidebar --------->
        <?php dynamic_sidebar(1); // call out my widgets?>
             <!----- End Dynamic sidebar --------------->
        
    </div>
 
        
        
