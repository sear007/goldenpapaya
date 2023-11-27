<?php
function golden_papa_enqueue_scripts() {
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' );
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css' );
    wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/app/assets/lib/animate/animate.min.css' );
    wp_enqueue_style( 'carousel', get_template_directory_uri(). '/app/assets/lib/owlcarousel/assets/owl.carousel.min.css' );
    wp_enqueue_style( 'tempusdominus-bootstrap', get_template_directory_uri(). '/app/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/app/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontello', get_template_directory_uri(). '/app/assets/lib/fontello/css/fontello.css' );
    wp_enqueue_style( 'swiper-style', get_template_directory_uri(). '/app/assets/css/swiper-style.css' );
    wp_enqueue_style( 'main', get_template_directory_uri(). '/app/assets/css/style.css' );
    
    wp_enqueue_script( 'jquerys', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), null, true );
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', array(), null, true );
    wp_enqueue_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js', array(), null, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/app/assets/lib/wow/wow.min.js', array(), null, true );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/app/assets/lib/easing/easing.min.js', array(), null, true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/app/assets/lib/waypoints/waypoints.min.js', array(), null, true );
    wp_enqueue_script( 'counterup', get_template_directory_uri() . '/app/assets/lib/counterup/counterup.min.js', array(), null, true );
    wp_enqueue_script( 'carousel', get_template_directory_uri() . '/app/assets/lib/owlcarousel/owl.carousel.min.js', array(), null, true );

    wp_enqueue_script( 'momentt', get_template_directory_uri() . '/app/assets/lib/tempusdominus/js/moment.min.js', null, null, true );
    wp_enqueue_script( 'moment-timezone', get_template_directory_uri() . '/app/assets/lib/tempusdominus/js/moment-timezone.min.js', array(), null, true );
    wp_enqueue_script( 'tempusdominus-bootstrap-4', get_template_directory_uri() . '/app/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array(), null, true );
    wp_enqueue_script( 'swiper-main', get_template_directory_uri() . '/app/assets/js/swiper-main.js', array(), null, true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/app/assets/js/main.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'golden_papa_enqueue_scripts' );

function enqueue_customizer_scripts() {
    wp_enqueue_script('abcddddd', 
        get_template_directory_uri() . '/app/inc/customizer/js/customizer-slider.js', 
        array('jquery', 'customize-preview'), 
        rand(1, 1000), 
        true
    );
    wp_enqueue_script('service-customizer-script', get_template_directory_uri(  ).'/app/inc/custom-post-types/room/' . '/js/customize-service.js', array('jquery'), '1.0', true);
}
add_action('customize_controls_enqueue_scripts', 'enqueue_customizer_scripts');

function golden_papa_setup() {
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
    ) );
    add_image_size( 'your-theme-medium', 600, 400, true );
}
add_action( 'after_setup_theme', 'golden_papa_setup' );