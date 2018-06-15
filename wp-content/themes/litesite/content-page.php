<?php
/**
 * Template for displaying content in the page.php template
 *
 * @package WordPress
 * @subpackage litesite
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : ?>
        <div class="page-featured-img">       
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	            <?php the_post_thumbnail();  ?>
            </a>
        </div>       
    <?php endif; ?>

<!-- /post thumbnail -->

<?php the_content(); ?>

</div> <!-- Post ends -->

<div class="clear-10"></div>

	<?php edit_post_link( __( 'Edit', 'litesite' ), '', '' ); ?>

<div class="clear-10"></div>
	<?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() )  ?>
	    <?php comments_template(); ?>

<div class="clear"></div>

<?php
	wp_link_pages( array(
		'before' => '<div class="nav-links">' . __( 'Pages:', 'litesite' ),
		'after'  => '</div>',
	) );
?>