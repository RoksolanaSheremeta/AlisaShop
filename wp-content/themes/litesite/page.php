<?php
/**
 * This is sinple page template
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php get_header(); ?>

<div class="content-wrap page-wrap">

<div class="wrap">
	<div class="container">

<?php if ( have_posts()): while ( have_posts() ) : the_post(); ?>

<div class="pagetitle">
	<h1 style=""><?php the_title(); ?></h1>
</div>

<div class="column-three-fourth">

<?php
			get_template_part('content', 'page'); /// Get the Content of the PAGE

		endwhile;

	else : 
    
			get_template_part('content', 'none'); /// This will show when nothing is found 

endif; ?>

</div><!-- column-three-fourth ends -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>