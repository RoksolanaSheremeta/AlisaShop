<?php
/**
 * 404 template
 *
 * @package WordPress
 * @subpackage litesite
 */
?>

<?php get_header(); ?>

<div class="content-wrap page-wrap">

<div class="wrap">
	<div class="container">
    
<div class="pagetitle">
<h1 style=""><?php _e( 'Error: 404, The page requested cannot be found.', 'litesite' ); ?></h1>
</div>
<div class="column-three-fourth">
<p><?php _e( '<strong>It looks like nothing was found at this location. Maybe try a search?</strong>', 'litesite' ); ?></p>
		<?php get_search_form(); ?>
        
</div>
<?php
get_sidebar();
get_footer();
?>