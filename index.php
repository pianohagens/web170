<?php get_header(); ?>


        <h2>This is my Main</h2>
        
    <!-- Begin Content -->    
        <?php if (have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
        
        <article class="post-excerpt">
        <h2><a href="<?php the_permalink(); // link to the page or posting ?>">
                    <?php the_title(); //get the page or posting title ?></a></h2>
        <h5>Posted on <?php the_time('F J, Y'); // Add the time ?> By <?php the_author(); // add the author ?>; In Category of <?php the_category(', '); //add category?></h5>
        
            <a href="<?php the_permalink(); // link to the page or posting ?>"><?php the_post_thumbnail('thumbnail'); //call out featured images?></a>
        <?php the_excerpt(''); // Add a excerpt filter to the posting ?>
       <p class="readmore"><a href="<?php the_permalink(); ?>">Read More &raquo;</a> </p>
        </article>
        
        <?php endwhile; endif; // end the loop ?>
    <!-- End Content -->
   <h5>index.php</h5>     



    <!----- End Main --------------->

        

<?php get_sidebar(); ?>

<?php get_footer(); ?>
