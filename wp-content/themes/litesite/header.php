<?php
/*
 * The Header template for theme
 * @package WordPress
 * @subpackage litesite
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
    	<div class="container">
			<div class="top_header_block">
				<div class="row">
					<div class="col-sm-6 vertical_m blocl_flex">
						<?php 
						$posts = get_field('h_left_page', 'options');
						if( $posts ): ?>
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <a href="<?php the_permalink(); ?>">Доставка і оплата</a>
						    <?php endforeach; ?>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
						<?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
					</div>
					<div class="col-sm-6 exit_registr blocl_flex">
						<?php 
						$posts = get_field('h_right_page', 'options');
						if( $posts ): ?>
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <a href="<?php the_permalink(); ?>">Вхід / Реєстрація</a>
						    <?php endforeach; ?>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="main_header">
				<div class="row">
					<!-- Logo START -->
					<div class="col-xl-3 logo">
						<?php if ( get_theme_mod( 'litesite_logo' ) ) : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'litesite_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
						<?php else : ?>
							<h2><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h2>
							<?php bloginfo( 'description' ); ?>
						<?php endif; ?>
					</div>
					<!-- Logo Ends -->
					<div class="col-xl-8">
						<div class="phone_info blocl_flex">
							<?php 
							if( have_rows('h_phone_numbers', 'options') ):
								while ( have_rows('h_phone_numbers' ,'options') ) : the_row();?>
									<a href="tel:<?php the_sub_field('h_phone_link'); ?>"><?php the_sub_field('h_phone'); ?></a>
									<?php
								endwhile;
							endif;
							?>
						</div>
						<div class="search_block">
							<?php get_search_form(); ?>
						</div>
					</div>
					<div class="col-xl-1 shopping-cart">
						<div class="shopping-cart_block">
							<div class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
							<a href="<?php echo WC()->cart->get_cart_url(); ?>"></a>
						</div>
						<div class="block-content-btn widget_shopping_cart_content" id="mode-mini-cart">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="menu">
		<div class="container">
			<div class="mobile-nav"><span></span></div>
			<div id="menu">
				<!-- navigation START here -->
				<?php
					if(has_nav_menu('header-menu')){
						wp_nav_menu(array(
							'theme_location'  => 'header-menu',
							'container'       => 'div',
							'container_class' => 'nav',
							'container_id'    => 'menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu'
							 ));
					}else {
					?>
				        <div class="nav" id="menu">
				            <ul>
				                <?php wp_list_pages('title_li='); ?>
				            </ul>
				        </div>
					<?php
					}
					?>
				<!-- navigation Ends here -->  
			</div>
		</div>
	</section>
