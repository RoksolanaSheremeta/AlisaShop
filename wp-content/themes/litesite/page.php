<?php
/**
 * This is sinple page template
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php get_header(); ?>

<div class="content-wrap page-wrap page-template">

<div class="wrap">
	<div class="container">

	<h2 class="title"><?php the_title(); ?></h2>
	<div class="content"><?php the_content(); ?></div>

</div><!-- column-three-fourth ends -->

<?php get_footer(); ?>