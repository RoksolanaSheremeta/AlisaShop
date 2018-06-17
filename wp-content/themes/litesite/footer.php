
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-6">
					<p class="footer_title"><?php the_field('f_shop_title', 'options'); ?></p>
					<?php 
					$posts = get_field('f_shop_pages', 'options');
					if( $posts ): ?>
					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
					        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					    <?php endforeach; ?>
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
				<div class="col-xl-3 col-lg-6">
					<p class="footer_title"><?php the_field('f_customers_title', 'options'); ?></p>
					<?php 
					$posts = get_field('f_customers_pages', 'options');
					if( $posts ): ?>
					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
					        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					    <?php endforeach; ?>
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
				<div class="col-xl-3 col-lg-6">
					<p class="footer_title"><?php the_field('f_contacts_title', 'options'); ?></p>
					<?php 
					if( have_rows('f_contacts', 'options') ):
						while ( have_rows('f_contacts' ,'options') ) : the_row();?>
							<a href="<?php the_sub_field('f_phones_or_emails'); ?><?php the_sub_field('f_phone_or_email_link'); ?>"><?php the_sub_field('f_phone_or_email'); ?></a>
							<?php
						endwhile;
					endif;
					?>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="soc_icon_bloc">
						<?php 
						if( have_rows('soc_icons', 'options') ):
							while ( have_rows('soc_icons' ,'options') ) : the_row(); 
								$link = get_sub_field('soc_icon_link');
								$icon = get_sub_field_object('soc_icon'); ?>
								<a href="<?php echo $link; ?>" class="<?php echo $icon['value']; ?>" target="_blank"></a>
								<?php
							endwhile;
						endif;
						?>
					</div>
				</div>						
			</div>
		</div>
		<div class="copywriting container">
			© 2016 All Rights Reserved.
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>