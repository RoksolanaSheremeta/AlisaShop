<?php
/**
 * The template for displaying home page when selected from admin
 *
 * @package WordPress
 * @subpackage litesite
 */
?>
<?php get_header(); ?>





</section>
	<div class="with_l_sitebar">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 category_sitebar" id="h_category">
					<div class="title">Категорії<img src="img/badge.png"></div>
					<ul>
						<li>
							<div class="wrap">
								<img src="img/beads.svg" alt="beads">
								<a href="#">Бісер</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>
						</li>
						<li>
							<div class="wrap">
								<img src="img/necklace_category.png" alt="necklace_category">
								<a href="#">Намистини</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>
						</li>
						<li class="active">
							<div class="wrap">
								<img src="img/tools.png" alt="tools">
								<a href="#">Інструменти</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>
						</li>
						<li>
							<div class="wrap">
								<img src="img/pendants.png" alt="pendants">
								<a href="#">Підвіски</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>	
						</li>
						<li>
							<div class="wrap">
								<img src="img/materials.png" alt="materials">
								<a href="#">Матеріали</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
						</li>
						<li>
							<div class="wrap">
								<img src="img/trading .png" alt="trading ">
								<a href="#">Торгове обладнання</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>
						</li>
						<li>
							<div class="wrap">
								<img src="img/jewelry.png" alt="jewelry">
								<a href="#">Прикраси</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>	
						</li>
						<li>
							<div class="wrap">
								<img src="img/packaging.png" alt="packaging">
								<a href="#">Упаковка</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>	
						</li>
						<li>
							<div class="wrap">
								<img src="img/furniture.png" alt="furniture">
								<a href="#">Фурнітура</a>
								<a href="#" class="badge"><img src="img/badge.png"></a>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-xl-9 col-lg-12 category_description">
					<div class="swiper-container swiper-container_h">
						<div class="swiper-wrapper">
			<?php 
			if( have_rows('fp_slider') ):
				while ( have_rows('fp_slider') ) : the_row();?>

					<div class="swiper-slide post_intro post_intro_row block_flex">
						<div class="col-xl-6">
							<img src="<?php the_sub_field('fp_slider_img'); ?>" alt="product_desc">
						</div>
						<div class="col-xl-6 wrap">
							<div class="wrap">
								<div class="title_description">
									<div class="title"><?php the_sub_field('fp_slider_title'); ?></div>
									<div class="description"><?php the_sub_field('fp_slider_description'); ?></div>
									<div class="btn">
										<a href="<?php the_sub_field('fp_link'); ?>">Більше</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
			endif;
			?>
								
						
							
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination swiper-pagination_h"></div>
					</div>
				</div>	
			</div>
		</div>
	</div>



























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
							<?php if($count == 2){ ?>
								<div class="post_intro post_intro_row">
									<div class="wrap">
										<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
										<div class="description"><?php the_excerpt(); ?></div>
									</div>
									<img src="<?php the_post_thumbnail_url(); ?>" alt="screwdriver">	
								</div>
							<?php }
							elseif($count == 4){ ?>
								<div class="post_intro post_intro_row">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="screwdriver">
									<div class="wrap">
										<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
										<div class="description"><?php the_excerpt(); ?></div>
									</div>	
								</div>
							<?php }
							else{ ?>
								<div class="post_intro">
									<img src="<?php the_post_thumbnail_url(); ?>" alt="necklace">
									<div class="wrap">
										<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
										<div class="description"><?php the_excerpt(); ?></div>
									</div>
								</div>
							<?php } ?>
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


