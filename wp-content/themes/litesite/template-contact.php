<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

<div class="tpl_contact">
	<div class="container">
		<p class="title-p"><?php the_title(); ?></p>
		<div class="row">
			<div class="main_contant">
				<p class="sub-title"><?php the_field('t_contact_title_left'); ?></p>
				<?php 
				if( have_rows('f_contacts', 'options') ):
					while ( have_rows('f_contacts' ,'options') ) : the_row();?>
						<a href="<?php the_sub_field('f_phones_or_emails'); ?><?php the_sub_field('f_phone_or_email_link'); ?>"><?php the_sub_field('f_phone_or_email'); ?></a>
						<?php
					endwhile;
				endif;
				?>
				<?php the_field('t_contact_info_left'); ?>				
			</div>
			<div class="contact_form">
				<p class="sub-title"><?php the_field('t_contact_title_right'); ?></p>

				<?php 
				$form_shortcode = get_field('t_contact_form_right'); 
				echo do_shortcode($form_shortcode);
				?>				
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>




