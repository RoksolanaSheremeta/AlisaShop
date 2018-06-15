<?php
/**
 * Template for displaying content in the page.php template
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <div class="postdetails">
        <i class="fa fa-calendar"></i> <?php the_time('M j, Y'); ?> | 
        <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                
    <?php
        /// Check if comments are open
        if ( comments_open() ) :
            echo ' | <i class="fa fa-comments"></i> ';
            comments_popup_link( 'Say something', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
        endif;
    ?> 
            <?php
            /// Check if the post is sticky
             if( is_sticky() ) : ?>
            | <i class="fa fa-paperclip"></i> <i><?php _e( 'Sticky post', 'litesite' ); ?></i>
            <?php endif; ?>
                
    </div> <!-- Post Meta ends -->

	<?php the_content(); ?>
    
    <p>
        Posted in: <?php the_category(', ', ' '); ?>
        <?php the_tags('  | <i class="fa fa-tags"></i> Tags: ',', ',''); ?>
    </p>
    
</div> <!-- Post ends -->

<div class="clear-10"></div>

		<?php edit_post_link( __( 'Edit', 'litesite' ), '', '' ); ?>
        
<div class="clear-10"></div>

<div class="nav-links">
      <?php previous_post_link( '<div class="floatleft">%link</div>', '&laquo; %title' ); ?>
      <?php next_post_link( '<div class="floatright">%link</div>', '%title &raquo; ' ); ?>
</div>
    
<div class="clear-10"></div>  

   <?php
			wp_link_pages( array(
				'before' => '<div class="nav-links">' . __( 'Pages:', 'litesite' ),
				'after'  => '</div>',
			) );
	?>
   
<div class="clear-10"></div>

<?php 
	// if ( comments_open() || get_comments_number() ) {
		comments_template();
	//}
?>