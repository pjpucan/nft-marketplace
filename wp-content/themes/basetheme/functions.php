<?php
// Include Theme Blocks Handler
include('includes/basetheme-blocks-handler/basetheme-blocks-handler.php');

add_theme_support( 'post-thumbnails' );

// Register Main menu
register_nav_menus( array(
    'main_menu' => 'Main Menu',
) );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'parent_slug'	=> 'themes.php',
    ));
}



// Include JS and CSS
function basetheme_enqueue_scripts() {
    // wp_enqueue_style( 'slick-css',get_stylesheet_directory_uri().'/assets/slick/css/slick.css',array(),'1.8.1');
    // wp_enqueue_style( 'slick-theme-css',get_stylesheet_directory_uri().'/assets/slick/css/slick-theme.css',array(),'1.8.1');
    wp_enqueue_style( 'main-style',get_stylesheet_directory_uri().'/assets/dist/css/main.css',array(),'2.0');
    
    // wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri().'/assets/slick/js/slick.min.js', array('jquery'), '1.8.1', true );
    wp_enqueue_script( 'main-script', get_stylesheet_directory_uri().'/assets/dist/js/main.js', array('jquery'), '2.0', true );
    wp_localize_script( 'main-script', 'wp',array( 'ajax' => admin_url( 'admin-ajax.php' ) ) );
    
}

add_action( 'wp_enqueue_scripts', 'basetheme_enqueue_scripts' );


function basetheme_menu() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
        )
    );
}
add_action( 'init', 'basetheme_menu' );

