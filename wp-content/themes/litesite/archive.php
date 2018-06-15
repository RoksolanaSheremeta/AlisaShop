<?php
/**
 * The template for displaying Archive pages
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php get_header(); ?>



<div class="content-wrap page-wrap">

<div class="wrap">
	<div class="container">


<?php if (have_posts()) : ?>
<div class="pagetitle">
    <h1 style="">
    <?php
        if ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'litesite' ), get_the_date());
        elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'litesite' ), get_the_date( 'F Y' ));
        elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'litesite' ), get_the_date( 'Y' ));
        elseif ( is_category() ) :
            printf( __( '%s', 'litesite' ), single_cat_title('',false));
        elseif ( is_tag() ) :
            printf( __( 'Tagged: %s', 'litesite' ), single_tag_title('',false));					
        else :
            _e( 'Archives', 'litesite' );
        endif;
    ?>
    </h1>
</div>

<?php  //get_template_part('sidebarleft'); ?>

<div class="column-three-fourth">

<?php while (have_posts()) : the_post();

			get_template_part('content'); 

		endwhile;
			
			get_template_part('nav');
	
	else : 
	
			get_template_part('none'); 	

	endif; 
?>

</div><!-- column-three-fourth ends -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>