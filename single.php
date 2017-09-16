<?php get_header(); ?>
	
    <!-- Start Content -->    
    <!----- Begin Main ---------------> 
        <?php if (have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
        
        <article id="post-<?php the_ID(); ?>" class="post">
        <h2><?php the_title(); //get the page or posting title ?></h2>
        <h5>Posted on <?php the_time('F J, Y'); // Add the time ?> By <?php the_author(); // add the author ?>; In Category of <?php the_category(', '); //add category?></h5>
        
        <?php the_post_thumbnail('large'); //call out and enlarge featured images ?>
        <?php the_content(''); // get the page or post content ?>    
        
        <?php endwhile; endif; // end the loop ?>
    <!-- End Content -->
        <h5>single.php</h5>  
        </article>
<!----- End Main ---------------> 
<!-- End Content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>