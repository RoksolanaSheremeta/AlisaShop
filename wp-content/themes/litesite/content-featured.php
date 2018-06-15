<?php
/**
 * Template for displaying Sticky post on Home page
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php
$sticky=get_option( 'sticky_posts' );

if (!empty($sticky)) {
rsort($sticky);
// Arguments
$args = array(
	'posts_per_page' => 3,
	'post__in'  => $sticky,
	'ignore_sticky_posts' => 1
);

// the query
$the_query = new WP_Query( $args );
?>
<!-- Sticky posts starts -->
<?php if ( $the_query->have_posts() ) : ?>
	<!-- start of the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    
    <div class="column-one-third">
        <!-- post thumbnail -->
        <?php 
        if ( '' != get_the_post_thumbnail() ) {
                the_post_thumbnail('litesite-featured-thumb');
            } else {
                echo '<img src="' . get_stylesheet_directory_uri() . '/images/default.png" />';

            }
        ?>
        <!-- /post thumbnail -->

        <h3><?php the_title(); ?></h3>
        
        <p class="">
        <?php 
            $content = get_the_excerpt();
            $trimmed_content = wp_trim_words( $content, 20 );
            echo $trimmed_content;
         ?>
        </p>
        <a href="<?php the_permalink();?>">Read More</a>
	</div>

	<?php endwhile; ?><!-- end of the loop -->

	<?php wp_reset_query(); ?>

<?php else:  ?>

<?php endif; 

}

else {

?>

<div class="column-one-third">
	<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/default.png" />'; ?>
    <h3>Sticky Post</h3>
        <p>
        Add sticky post to see here.
        This area will show 3 sticky posts.
        </p>
    <a href="#">Read More</a>
</div>

<div class="column-one-third">
	<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/default.png" />'; ?>
    <h3>Sticky Post</h3>
        <p>
        Add sticky post to see here.
        This area will show 3 sticky posts.
        </p>
    <a href="#">Read More</a>
</div>

<div class="column-one-third">
	<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/default.png" />'; ?>
    <h3>Sticky Post</h3>
        <p>
        Add sticky post to see here.
        This area will show 3 sticky posts.
        </p>
    <a href="#">Read More</a>
</div>

	<?php } ?>
