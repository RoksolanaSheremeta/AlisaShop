<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

<div class="tpl_contact">
	<div class="container">
		<?php the_title(); ?>
		<div class="row">

<?php the_field('t_contact_title_left'); ?>
<?php 
if( have_rows('f_contacts', 'options') ):
	while ( have_rows('f_contacts' ,'options') ) : the_row();?>
		<a href="<?php the_sub_field('f_phones_or_emails'); ?><?php the_sub_field('f_phone_or_email_link'); ?>"><?php the_sub_field('f_phone_or_email'); ?></a>
		<?php
	endwhile;
endif;
?>
<?php the_field('t_contact_info_left'); ?>







<?php the_field('t_contact_title_right'); ?>

<?php 
$form_shortcode = get_field('t_contact_form_right'); 
echo do_shortcode($form_shortcode);
?>

		</div>
	</div>
</div>

<?php get_footer(); ?>




