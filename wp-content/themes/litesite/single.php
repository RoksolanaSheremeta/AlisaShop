<?php
/**
 * The template for displaying single posts
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php get_header(); ?>

<div class="content-wrap page-wrap">

<div class="wrap">
	<div class="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="pagetitle"><h1 style=""><?php the_title(); ?></h1></div>

<div class="column-three-fourth">

<?php
			get_template_part('content', 'single'); /// Get the Content of the POST

		endwhile; 

	else :

			get_template_part('content', 'none'); /// This will show when nothing is found  
        
endif; ?>

</div><!-- column-three-fourth ends -->

<div class="sidebar">
<?php if( is_active_sidebar('sidebar-blog' )) dynamic_sidebar( 'sidebar-blog' ); 
//get_sidebar(); ?>
</div>
<?php get_footer(); ?>