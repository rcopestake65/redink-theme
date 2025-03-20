<?php
//load stylesheet
function load_css()
{
    wp_register_style('style', get_template_directory_uri() . '/css/style.css', array(), false, 'all');
    wp_enqueue_style('style');
    wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v6.3.0/css/all.css' );
}

add_action('wp_enqueue_scripts', 'load_css');
//thumbnail support
add_theme_support( 'post-thumbnails' );
// Then we'll add our 2 custom images
add_image_size( 'thumbnail', 1600, 400, true );
add_image_size( 'medium', 300, 300, true );
add_image_size( 'large', 1024, 1024, true );
//load js
function loadjs()
{
    // Remove app.js from WordPress enqueue since we're adding it directly in header.php
    wp_register_script( 'gsap-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js', null, null, true );
    wp_enqueue_script('gsap-cdn');

    wp_register_script( 'gsap-scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js', array('gsap-cdn'), null, true );
    wp_enqueue_script('gsap-scrollTrigger');
    
    wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.6.3.min.js', null, null, false );
    wp_enqueue_script('jQuery');

    // wp_register_script('gsap', get_stylesheet_directory_uri() . '/js/gsap.js', '', 1, true);
    // wp_enqueue_script('gsap');

    // Remove the app.js registration and enqueue since we're adding it directly in header.php
    // wp_register_script('app', get_template_directory_uri() . '/js/app.js', '', 1, true);
    // wp_script_add_data('app', 'type', 'module');
    // wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'loadjs');


//Theme Options

add_theme_support('menus');

//Menus

register_nav_menus(
array(
'main-menu' => 'Main Menu Location',
'mobile-menu' => 'Mobile Menu Location',

)
);

//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
    }
    add_filter( 'body_class', 'add_slug_body_class' );

 

/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );

//add featured image to posts admin

function elbow_theme_support(){
    add_theme_support('post-thumbnails');
  
  }
  add_action ('after_setup_theme', 'elbow_theme_support');
  






//custom post types

function portfolio()
{
$args = array(
    'label' => 'Portfolio',
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    //'supports' => array('title', 'editor','thumbnail', 'excerpt'),
    'menu_icon'   => 'dashicons-portfolio',
    'taxonomies' => array('category'),
);

register_post_type('portfolio', $args);
}
add_action('init', 'portfolio');

function testimonials()
{
$args = array(
    'label' => 'Testimonials',
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    //'supports' => array('title', 'editor','thumbnail', 'excerpt'),
    'menu_icon'   => 'dashicons-format-quote',
    'taxonomies' => array('category'),
	'publicly_queryable'  => false
);

register_post_type('testimonials', $args);
}
add_action('init', 'testimonials');
?>