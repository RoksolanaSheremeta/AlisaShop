<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>

<div class="tpl_blog">
	<div class="container">
		<?php the_title(); ?>
		<div class="row">
			<div class="main_contant">
				<?php                
				$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
				$custom_query_args = array(
				                        'post_type' => 'post',
				                        'posts_per_page' => 3,
				                        'paged' => $paged,
				                        'order' => 'DESC', // 'ASC'
				                        'orderby' => 'date' // modified | title | name | ID | rand
				                    );
				$custom_query = new WP_Query( $custom_query_args );
				    if ( $custom_query->have_posts() ) :
				    while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

				    <div class="blog_post">
				    	<div class="block_img">
				    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    			<img src="<?php the_post_thumbnail_url('single-post-thumbnail'); ?>">
				    		</a>
				    	</div>
				    	<div class="block_info">
				    		<h3 class="title-news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				    		<div class="blog_time"><?php the_time('M jS, Y'); ?></div>			    		
				    		<div class="description">
				    			<?php the_excerpt(); ?>
				    			<a class="btn-readmore" href="<?php the_permalink(); ?>" title="Wie is Oscar?">Детальніше</a>
				    		</div>
				    	</div>
				    </div>

				<?php
				endwhile;
				?>        
				<?php
				    wp_reset_postdata(); // reset the query
				    else:
				    echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
				    endif;
				?>
				<div class="wrapper-pagination">	
					<div id="pagination">
					    <?php            
					    $big = 999999999; // уникальное число            
					        echo paginate_links( array(
					                                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					                                'format'    => '?paged=%#%',
					                                'current'   => max( 1, get_query_var('paged') ),
					                                'total'     => $custom_query->max_num_pages,
					                                'mid_size'  => 1,
					                                'prev_text' => __('<i class="clever-icon-arrow-left-regular" aria-hidden="true"></i>'),
					                                'next_text' => __('<i class="clever-icon-arrow-right-regular" aria-hidden="true"></i>')
					                            ) );
					    ?> 
					</div>
				</div>
			</div>	
			<div class="sidebar r_sidebar">
				<?php  if( is_active_sidebar('sidebar' )) dynamic_sidebar( 'sidebar' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>