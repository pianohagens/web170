        
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
    </div>
    <!----- End aside --------------->
        
        
    <!----- Begin sidebar 
    <div id="sidebar">
        <h3> This is my sidebar</h3>
    </div>
 End sidebar --------------->