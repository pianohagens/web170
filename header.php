<!doctype html>
<html>
<head>
<!-- Start Meta -->
<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
<meta name="keywords" content="Piano's WP_Starter Wireframs, Web Design, WordPress, Web Development, Search Engine Optiomization (SEO), Seattle, Washington" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<!-- End Meta -->
    
<!-- Start Title Tag -->
<?php the_title( '<h1>', '</h1>' ); ?>
<!-- End Title Tag -->
        
<!----- Begin Styles --------------->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/menu.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lightboxp.css" type="text/css">
<!----- End Styles --------------->
 
<!-- Start WP Head -->
<?php wp_head(); ?>
<!-- End WP Head -->
    
 <!-- Start script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/navig.js"></script>   
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/lightboxp.js"></script>   
<!-- End script -->   

        
</head><!----- End head --------------->
    
 <body <?php body_class();?>>   

    <!----- Begin Header --------------->
<div id="container">     
    <div id="header">
        <div id="container"> 
        <!-- Begin Logo -->
        <h1 id="logo"><a href="<?php echo get_settings('home'); ?>"><img id="logo" src="https://www.phagens.com/images/430x120logo.png" alt="Piano's WP_Starter" /></a></h1>
        <!-- End Logo -->
        
          <h5>header.php</h5> 
        
              <!-- Start mobile_botton -->
        <div id="mobile_botton">
            <a href="#">&#9776;</a>
        </div>
        <!-- END mobile_botton -->
        </div>
    </div>
</div>    
    <!----- End Header ---------------> 

 <div id="container">
<!-- Start WP Menu -->
<?php wp_nav_menu(array('theme_location' => 'loca-menu', 'container' => 'div', 'container_id' => 'navbar')); ?>
<!-- End WP Menu -->

 </div>  
    
     <div id="container body" class="body"> 
         <div id="main">
