    
    <!----- Begin aside --------------->
    <div id="sidebar">
        <h2> <?php echo get_the_title($post->post_parent); ?></h2>
        
        <ul>
        <?php 
            if($post->post_parent) {//if the page has a parent....
                wp_list_pages(array('title_li' => '', 'child_of' => $post->post_parent, )); // list the children of said parent 
            } else { // if on the parent page...
            
                wp_list_pages(array('title_li' => '', 'child_of' => $post->ID, ));            
            }
            
            ?>
      </ul>
        
        <h3>
        <!--- Begin Blessing Quote ----->
        <?php if (get_post_meta($post->ID, 'Quote', 'Blessing', 'Good News', true)) : //check to see if there is a quote called 'Blessing'?> 
            
            <ul>
            <blockquote><?php echo get_post_meta($post->ID, 'Quote', true); //write out the quote?> </blockquote>
            <blockquote><?php echo get_post_meta($post->ID, 'Blessing', true); //write out the quote?> </blockquote>
            <blockquote><?php echo get_post_meta($post->ID, 'Good News', true); //write out the quote?> </blockquote>            
            </ul>
        <?php endif; ?>    
        <!--- Begin Bless Quote ----->
        
        
      
        </h3>
    </div>
    <!----- End aside --------------->
        
        
    <!----- Begin sidebar 
    <div id="sidebar">
        <h3> This is my sidebar</h3>
    </div>
 End sidebar --------------->