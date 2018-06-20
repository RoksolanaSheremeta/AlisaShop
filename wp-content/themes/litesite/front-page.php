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
					<div class="title">Категорії</div>
					<ul class = "block-category-ul">
					<?php
						$taxonomy     = 'product_cat';
						$orderby      = 'name';  
						$show_count   = 0;      // 1 for yes, 0 for no
						$pad_counts   = 0;      // 1 for yes, 0 for no
						$hierarchical = 1;      // 1 for yes, 0 for no  
						$title        = '';  
						$empty        = 0;

						$args = array(
							'taxonomy'     => $taxonomy,
							'orderby'      => $orderby,
							'show_count'   => $show_count,
							'pad_counts'   => $pad_counts,
							'hierarchical' => $hierarchical,
							'title_li'     => $title,
							'hide_empty'   => $empty
						);
						$all_categories = get_categories( $args );
						foreach ($all_categories as $cat) 
						{
							if($cat->category_parent == 0) 
							{
								echo '<li class = "block-category-li ' . $cat->slug . '">';
								$category_id = $cat->term_id;   
								$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
								$image = wp_get_attachment_url( $thumbnail_id ); 
								?>
									<div class="wrap">
										<?php
										echo "<img src='{$image}' />";
										echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
										?>
									</div>
								<?php
								//echo '<br /><a' . ' class="' . $cat->slug . '"' . ' href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
								//echo "<img src='{$image}' alt='' width='20' height='20' />";

								$args2 = array(
									'taxonomy'     => $taxonomy,
									'child_of'     => 0,
									'parent'       => $category_id,
									'orderby'      => $orderby,
									'show_count'   => $show_count,
									'pad_counts'   => $pad_counts,
									'hierarchical' => $hierarchical,
									'title_li'     => $title,
									'hide_empty'   => $empty
								);
								$sub_cats = get_categories( $args2 );
								if($sub_cats) 
								{
									echo '<div class="sub-category-block"><div class="sub-category-block_wrap"><ul class = "block-sub-category-ul">';
									foreach($sub_cats as $sub_category) 
									{
										$thumbnail_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true ); 
										$image = wp_get_attachment_url( $thumbnail_id ); 
										//echo  $sub_category->name ;
										echo '<li  class = "block-sub-category-li ' . $cat->slug . '-' . $sub_category->slug . '">';
													echo "<img src='{$image}' alt='' width='20' height='20' />";
													echo '<a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
													?>
												</li>
										<?php

										//echo '<a' . ' class="' . $cat->slug . '-' . $sub_category->slug . '"' . ' href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
										//echo "<img src='{$image}' alt='' width='20' height='20' />";
									} 
									echo '</ul></div></div>';
								}
								echo '</li>';
					    	}       
						}
					?>
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
										<div class="col-xl-6 wrap block_flex">
											<div class="wrap">
												<div class="title_description">
													<div class="title"><?php the_sub_field('fp_slider_title'); ?></div>
													<div class="description"><?php the_sub_field('fp_slider_description'); ?></div>
													<div class="btn">
														<a href="<?php the_sub_field('fp_link'); ?>"><?php the_sub_field('fp_btn'); ?></a>
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





