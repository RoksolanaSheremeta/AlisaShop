<?php
/**
 * The template for displaying Sidebar Widgets
 *
 * @package litesite
 */
?>
<!--Right Sidebar Starts--> 
<div class="sidebar">
	<?php do_action( 'before_sidebar' ); ?>
        <?php 
        if( is_active_sidebar('sidebar')) dynamic_sidebar( 'sidebar' );
        ?>
</div>
<!--Right Sidebar Ends--> 