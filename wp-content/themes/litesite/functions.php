<?php
/*-----------------------------------------*/
/* litesite Wordpress Theme Setup
/*-----------------------------------------*/ 

/*-------------------------------------------------*/
/*  Add theme support 
/*-------------------------------------------------*/ 
function litesite_setup(){
    
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 650;
    
    
    //// Make Menu
      register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu', 'litesite' ),
        )
      );
    /////////////

    //// Add Image Thumbnail Support in post/blog page
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, '', true );
    //add_image_size( 'full-width', 500, '' , true );

    add_image_size( 'litesite-featured-thumb', 300); //300 pixels wide (and unlimited height)   
    add_image_size( 'medium', 320, '', true); // Medium Thumbnail
    add_image_size( 'small', 50, 50 , true); // Small Thumbnail
    add_image_size( 'fullwidth', 540, null, true );
    add_image_size( 'slider', 900, 380, true );
    //////////////////

    ///// Add support for other media files 
    add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ) );
    ////

    // Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 
        'comment-form',
        'comment-list',
    ) );
    
    
    add_theme_support( 'custom-background', array(
        'default-color' => 'eee',
    ) );

}
add_action( 'after_setup_theme', 'litesite_setup' );
add_theme_support('woocommerce');


/*-------------------------------------------------*/
/*  Load stylesheet and scripts dynamically
/*-------------------------------------------------*/ 
function litesite_scripts() {
    //wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    wp_enqueue_style( 'litesite-main', get_stylesheet_uri() );
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', '1.0');
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/style/css/library/swiper.min.css', '1.0' );
    wp_enqueue_style('sumoselect', '//cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.0.2/sumoselect.min.css', '1.0');
    wp_enqueue_style( 'litesite-navigationCss', get_template_directory_uri() . '/style/css/style.css', '1.0' );
    // Fonts
    //wp_enqueue_style( 'Alegreya+Sans', 'http://fonts.googleapis.com/css?family=Alegreya+Sans:300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', array(), null );
    //wp_enqueue_style( 'Poppins', 'http://fonts.googleapis.com/css?family=Poppins:300,400,500,600', array(), null );
    //wp_enqueue_style( 'Playfair+Display', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic', array(), null );
    //wp_enqueue_style( 'Dancing+Script', 'https://fonts.googleapis.com/css?family=Dancing+Script:700', array(), null );
    //wp_enqueue_style( 'Raleway', 'https://fonts.googleapis.com/css?family=Raleway:700', array(), null );
    // Using Google Fonts
    //wp_enqueue_style( 'open-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans', array(), null );
    //wp_enqueue_style( 'roboto-google-fonts', 'http://fonts.googleapis.com/css?family=Roboto', array(), null );

    //jquery-modal
    //wp_enqueue_script('modal', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', 'jquery', '1.0.1', true );
    wp_enqueue_script('sumoselect', '//cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.0.2/jquery.sumoselect.min.js', 'sumoselect', '1.0.1', true );
    //wp_enqueue_script('zoom', 'https://cdn.rawgit.com/jackmoore/zoom/master/jquery.zoom.min.js', 'jquery', '1.0.1', true );
    
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', 'popper', '1.0.0', true );
    wp_enqueue_script( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', 'bootstrap', '1.0.0', true );
    //wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.0', true );
    //wp_enqueue_script( 'google map', '//maps.googleapis.com/maps/api/js?key=AIzaSyAfdgfBPYr0FiZt5LnUn817xvn8ymOYcyg', 'map', '1.0.0', true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'litesite_scripts' );


/*-------------------------------------------------*/
/*  Sidebar & Widgets
/*-------------------------------------------------*/ 
function litesite_widgets(){

        ///// Sidebar Blog Widgets
    register_sidebar(array(
        'name' => __( 'Sidebar Blog', 'litesite'),
        'id' => 'sidebar-blog',
        'description' => __( 'Widgets in this area will be shown on the blog page sidebar.', 'litesite' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title-widget">',
        'after_title' => '</h2>'
    ));
    
    ///// Sidebar Right Widgets
    register_sidebar(array(
        'name' => __( 'Sidebar', 'litesite'),
        'id' => 'sidebar',
        'description' => __( 'Widgets in this area will be shown on the sidebar.', 'litesite' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title-widget">',
        'after_title' => '</h2>'
    ));
    
    // Footer widgets
    register_sidebar(array(
        'name' => __('FooterWidget', 'litesite'),
        'description' => __('Add widget to your footer area (max 4 widgets)', 'litesite'),
        'id' => 'footer-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
       'before_title' => '<h2 class="title-widget">',
        'after_title' => '</h2>'
    ));
    ////////////////////
   register_widget( 'social_widget' );
}
add_action( 'widgets_init', 'litesite_widgets' );
require_once get_template_directory() . '/social-widget.php';

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
    return ' <a class="linkred" href="'. get_permalink($post->ID) . '"> ... read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Customizer option to add logo and Intro text to the site
function litesite_theme_customizer( $wp_customize ) {
    //// Add a Logo 
    $wp_customize->add_section( 'litesite_logo_section' , array(
    'title'       => __( 'Logo', 'litesite' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );
    $wp_customize->add_setting( 'litesite_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'litesite_logo', array(
        'label'    => __( 'Logo', 'litesite' ),
        'section'  => 'litesite_logo_section',
        'settings' => 'litesite_logo',
        ) ) );

    //// Add a Intro Text
    $wp_customize->add_section( 'litesite_introtext_section' , array(
    'title'       => __( 'Home Page Intro Text', 'litesite' ),
    'priority'    => 31,
    'description' => 'Write a Cool Intro Text for your website visitors.',
    ) );
    $wp_customize->add_setting('litesite_introtext', array (
    'default' => 'Write something here',
    'sanitize_callback' => 'esc_attr'
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'litesite_introtext', array(
        'label'    => __( 'Home Page Intro Text', 'litesite' ),
        'type'    =>'text',
        'section'  => 'litesite_introtext_section',
        'settings' => 'litesite_introtext',
    ) ) );
}
add_action('customize_register', 'litesite_theme_customizer');








/*--------------------------------------------------------------------------------------------------*/
/*---------------------------------------start WooCommerce support ---------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
function my_custom_woocommerce_theme_support() {
    add_theme_support( 'woocommerce', array(
        // . . .
        // thumbnail_image_width, single_image_width, etc.
 
        // Product grid theme settings
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
             
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
 
add_action( 'after_setup_theme', 'my_custom_woocommerce_theme_support' );

/*--------------------------------------------------------------------------------------------------*/
/*---------------------------------------end WooCommerce support -----------------------------------*/
/*--------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------------------------*/
/*---------------------------------------start options_paget ---------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
//options page ACF
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Загальні дані',
        'menu_title'    => 'Загальні дані',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/*--------------------------------------------------------------------------------------------------*/
/*------------------------------------------end options_page ---------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------------------------*/
/*------------------------------- start woocommerce ajax top cart ----------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    $fragments['div.header-cart-subtotal'] = '<div class="header-cart-subtotal">' . WC()->cart->get_cart_subtotal() . '</div>';
    
    return $fragments;
    
}



  function get_refreshed_fragments() {
    ob_start();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    $data = array(
      'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
          'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
        )
      ),
      'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() ),
    );

    wp_send_json( $data );
  }

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3; // 3 products per row
    }
}
/*--------------------------------------------------------------------------------------------------*/
/*--------------------------------- end woocommerce ajax top cart ----------------------------------*/
/*--------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------------------------*/
/*------------------------------------- start google map API ---------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
/*function my_acf_init() {
    
    acf_update_setting('google_api_key', 'AIzaSyAfdgfBPYr0FiZt5LnUn817xvn8ymOYcyg');
}

add_action('acf/init', 'my_acf_init');*/
/*--------------------------------------------------------------------------------------------------*/
/*-------------------------------------- end google map API ----------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/

