<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<!-- Start Title Tag -->
<?php the_title( '<h1>', '</h1>' ); ?>
<!-- End Title Tag -->
        
<!----- Begin Styles --------------->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<!----- End Styles --------------->
 
<!-- Start WP Head -->
<?php wp_head(); ?>
<!-- End WP Head -->
        
    </head><!----- End head --------------->

    
<body <?php body_class();?>>
    <!----- Begin Header --------------->
    <div id="header">
        
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
                <h4 class="postdate">Posted on <?php the_time('F j, Y'); ?> in <?php the_category(', ') ?> by <?php the_author(); ?></h4>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to"><?php the_post_thumbnail('thumbnail'); ?></a>
                <?php the_excerpt(); ?>
                <p class="readmore"><a href="<?php the_permalink(); ?>">Read More &raquo;</a> </p>
            </article>
        <?php endwhile; ?>
<?php endif; ?>
    <!-- End Content -->
        
    </div>
    <!----- End Main --------------->
        
    <!----- Begin aside --------------->
    <div id="aside">
        <h3> This is my aside</h3>
    </div>
    <!----- End aside --------------->
        
        
    <!----- Begin sidebar --------------->
    <div id="sidebar">
        <h3> This is my sidebar</h3>
    </div>
    <!----- End sidebar --------------->
        

    </body>
    
    <!-- Start WP Footer -->
<?php wp_footer(); ?>

<!-- End WP Footer -->
        <!----- End Footer --------------->
     <div id="footer">
<p>&copy;2017     |    All Right Reserved | Desigen be: Piano Hagens </p>   
    </div>
    <!----- End footer --------------->
</html>