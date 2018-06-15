<?php
/**
litesite Social Widget for displaying social icons in the footer.

class My_Widget extends WP_Widget {
	public function __construct() {
		// widget actual processes
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
	}

 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}


 * Adds Social_Widget widget.
 */
class Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'social_widget', // Base ID
			__('litesite Social Widget', 'litesite'), // Name
			array( 'description' => __( 'Social widget for displaying social icons in the footer. Use this in footer.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$fb = $instance['facebook'];
		$tw = $instance['twitter'];
		$lk = $instance['lk'];
		$gplus = $instance['gplus'];
	?>
    
     <?php // esc_url( $url, $protocols, $_context ); Sanitize Urls ?> 
     
        <div class="widget">
            <h2 class="widget-title"><?php echo $title; ?></h2>
                <ul>
                <?php if ($fb!="") { ?>
                    <li><a class="fb" href="<?php echo esc_url($fb); ?>">Facebook</a></li>
                    <?php } ?>
                <?php if ($tw!="") { ?>
                    <li><a class="tw" href="<?php echo esc_url($tw); ?>">Twitter</a></li>
                  <?php } ?>  
                 <?php if ($lk!="") { ?>
                    <li><a class="lk" href="<?php echo esc_url($lk); ?>">Linkedin</a></li>
                   <?php } ?> 
                 <?php if ($gplus!="") { ?>
                    <li><a class="gplus" href="<?php echo esc_url($gplus); ?>">Google+</a></li>
                   <?php } ?>   
                </ul>
        </div>

		<?php
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'text_domain' );
		}
		
		if ( isset( $instance[ 'facebook' ] ) ) {
			$fb = $instance[ 'facebook' ];
		}
		else {
			$fb = __( '', 'text_domain' );
		}
		
		
		if ( isset( $instance[ 'twitter' ] ) ) {
			$tw = $instance[ 'twitter' ];
		}
		else {
			$tw = __( '', 'text_domain' );
		}
		
		if ( isset( $instance[ 'lk' ] ) ) {
			$lk = $instance[ 'lk' ];
		}
		else {
			$lk = __( '', 'text_domain' );
		}
		
		if ( isset( $instance[ 'gplus' ] ) ) {
			$gplus = $instance[ 'gplus' ];
		}
		else {
			$gplus = __( '', 'text_domain' );
		}

		?>
		<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'litesite' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  esc_attr($title); ?>" />
        
        
<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook Full url:' , 'litesite' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php  echo esc_attr($fb); ?>" />

<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter Full url:' , 'litesite' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php  echo esc_attr($tw); ?>" />

<label for="<?php echo $this->get_field_id( 'lk' ); ?>"><?php _e( 'Linkedin Full url:', 'litesite' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'lk' ); ?>" name="<?php echo $this->get_field_name( 'lk' ); ?>" type="text" value="<?php  echo esc_attr($lk); ?>" />


<label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e( 'Google+ Full url:', 'litesite' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" type="text" value="<?php  echo esc_attr($gplus); ?>" />

		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		//$instance = array();
		//$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['lk'] = strip_tags( $new_instance['lk'] );
		$instance['gplus'] = strip_tags( $new_instance['gplus'] );
		return $instance;
	}

} // class Social_Widget
?>