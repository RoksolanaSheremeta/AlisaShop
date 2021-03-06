<?php
/**
 * The template for displaying search forms
 *
 * @package litesite
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="text" class="searchinput" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s"
        placeholder="<?php echo esc_attr_x( 'Пошук..', 'placeholder', 'litesite' ); ?>" />
		<input type="submit" class="submit" id="searchsubmit" value="<?php echo esc_attr_x( '', 'submit button', 'litesite' ); ?>" />
	</form>