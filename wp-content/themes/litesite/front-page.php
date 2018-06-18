<?php
/**
 * The template for displaying home page when selected from admin
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php get_header(); ?>

<section class="posts_quality">
		<div class="container">
			<div class="row">
				<?php 
				if( have_rows('fp_advantages') ):
					while ( have_rows('fp_advantages') ) : the_row();?>
						<div class="col-xl-4">
							<div class="post_quality post_quality_row">
								<img src="<?php the_sub_field('fp_advantages_img'); ?>" alt="quality_2">
								<div class="wrap">
									<div class="title"><?php the_sub_field('fp_advantages_title'); ?></div>
									<div class="description"><?php the_sub_field('fp_advantages_description'); ?></div>
								</div>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>