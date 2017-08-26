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