<?php get_header(); ?>

<!-- Start Content -->
<div id="main" class="pages">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="page-main-<?php the_ID(); ?>" class="page-main">
    <h2><?php the_title(); ?></h2>
    <?php gateway_spotlights(); // get gateway page spotlights ?>
    <?php the_content(''); // get written page content ?>
    </article>
	<?php endwhile; endif; ?>
    <?php /*get_child_pages();*/ ?>
    <h5>page.php</h5>        
</div>
<!-- End Content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>