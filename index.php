<?php get_header(); ?>


    <!----- Begin Header --------------->
    <div id="header">
     <h1>This is my Header</h1>   
    </div>
    <!----- End Header ---------------> 
    <!----- Begin Navigation --------------->
<div id="navigation">
     <ul>
          <li class="home"><a href="#"><span>Home</span></a></li>
          <li class="about"><a href="#"><span>About</span></a></li>
          <li class="service"><a href="#"><span>Service</span></a></li>
          <li class="products"><a href="#"><span>Products</span></a></li>
          <li class="last contact"><a href="#"><span>Contact</span></a></li>
     </ul>
 </div>
    <!----- End Navigation --------------->
        
    <!----- Begin Main --------------->
    <div id="main">
        <h2>This is my Main</h2>
        
    <!-- Begin Content -->    
<?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        
            <article class="post-main" id="post-main-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>    
                <h4 class="postdate">Posted on <?php the_time('F j, Y'); ?> in Categories of <?php the_category(' , '); ?> by <?php the_author(); ?></h4>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to"><?php the_post_thumbnail('thumbnail'); ?></a>
                <?php the_excerpt(); ?>
                <p class="readmore"><a href="<?php the_permalink(); ?>">Read More &raquo;</a> </p>
            </article>
        <?php endwhile; ?>
<?php endif; ?>
    <!-- End Content -->
        
    </div>
    <!----- End Main --------------->

        

<?php get_sidebar(); ?>
<?php get_footer(); ?>
