<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<!-- Start Title Tag -->
<title><?php get_my_title_tag(); ?></title>
<!-- End Title Tag -->

<!-- Begin Styles -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    
<!-- Start WP Head -->
<?php wp_head(); ?>
<!-- End WP Head -->

</head>
    
<body <?php body_class();?>></body>


<!-- Start WP Footer -->
<?php wp_footer(); ?>
<!-- End WP Footer -->
    
</html>
