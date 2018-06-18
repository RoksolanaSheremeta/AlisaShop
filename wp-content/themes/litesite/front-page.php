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
	<section class="posts_block">
		<div class="container">
			<div class="lat_block">LATEST BLOG</div>
			<div class="row">
				<div class="col-lg-6">
					<?php
					$args = array(
						'posts_per_page' => 6,
						'post_status' => 'publish',
					    'orderby' => 'publish_date',
					    'order' => 'ASC',
					);
					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						$count = 0;
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
							<?php if($count == 3){ ?>
								</div>
								<div class="col-lg-6">
							<?php } ?>
							<div class="post_intro">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="necklace">
								<div class="wrap">
									<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
									<div class="description"><?php the_excerpt(); ?></div>
								</div>
							</div>
							<?php
							$count++;
						}
					} else {
					}
					wp_reset_postdata();
					?>
				</div>	
			</div>
		</div>	
	</section>






<?php get_footer(); ?>


