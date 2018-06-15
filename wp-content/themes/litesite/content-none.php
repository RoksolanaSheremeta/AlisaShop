<?php
/**
 * This template will show when nothing is found
 *
 * @package WordPress
 * @subpackage litesite
 */
?>

<div class="pagetitle"><h1 style=""><?php _e( 'Nothing Found', 'litesite' ); ?></h1></div>

<div class="column-three-fourth">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p class="fontred"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'litesite' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p class="fontred"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'litesite' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p class="fontred"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'litesite' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
