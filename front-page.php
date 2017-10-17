<?php get_header(); ?>


    <!----- Begin Main --------------->

<!-- Start Flexslider -->
<?php add_flexslider(); ?>
<!-- End Flexslider -->
        <h5>front-page.php</h5>          

    <!----- End Main --------------->  



        
    <!-- Begin Content = Widgets --> 
<div id="widgets">
<section class="widget-item">
    <h2>Widget-item 1</h2>
<?php if (have_posts() ) : while( have_posts() ) : the_post(); // start loop 1 ?>
<?php the_content(''); //get the home page content ?>
<?php endwhile; endif; //close the loop ?>
</section>
<!-- End Widget-item 1 -->
    
<section class="widget-item">
<h2>Widget-item 2</h2>
<ul>
<?php rewind_posts(); //end loop 1 ?>
<?php while (have_posts()) : the_post(); // start loop 2?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; // close loop 2 ?>
</ul>
</section>
<!-- End Widget-item 2 -->
    
<section class="widget-item">
    <h2>Widget-item 3</h2>
    <p>WordPress Customized Theme or templete theme, Responsive, Widgets, and Plugins.The easiest way to create a website or blog. Choose a design, a custom domain, and a plan with the features you needed. Find a host, install plugins, and get ready to start. To complete control over the design and code. Install and customize any </p>
</section>
<!-- End Widget-item 3 -->
    
</div>

    <!-- End Content = Widgets -->
   

<?php get_sidebar(); ?>
<?php get_footer(); ?>