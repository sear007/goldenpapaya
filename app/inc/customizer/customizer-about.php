<?php
function custom_about_us_customizer_section($wp_customize) {
    $wp_customize->add_panel('about_us_panel', array(
        'title' => __('About Us Section GPPY', 'text-domain'),
        'priority' => 2,
    ));

    /** 
     * Description section
    */
    $wp_customize->add_section('about_us_section', array(
        'title' => __('Description', 'text-domain'),
        'panel' => 'about_us_panel',
    ));

    $wp_customize->add_setting('about_us_title', array(
        'default' => 'Welcome to GOLDEN PAPAYA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_us_title_control', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_us_description', array(
        'default' => 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_us_description_control', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_description',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_us_short_description', array(
        'default' => 'Download , build a professional website for your hotel business and grab the attention of new visitors upon your site’s launch.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_us_short_description_control', array(
        'label' => __('Short Description', 'text-domain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_short_description',
        'type' => 'textarea',
    ));

    /** 
     * Images section
    */

    $wp_customize->add_section('about_us_image_section', array(
        'title' => __('Images', 'text-domain'),
        'panel' => 'about_us_panel',
    ));

    $wp_customize->add_setting('about_us_image_01', array(
        'default' => get_template_directory_uri(  ).'/app/assets/img/about-1.jpg',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_image_01_control', array(
        'label' => __('Image 01', 'text-domain'),
        'section' => 'about_us_image_section',
        'settings' => 'about_us_image_01',
    )));

    $wp_customize->add_setting('about_us_image_02', array(
        'default' => get_template_directory_uri(  ).'/app/assets/img/about-2.jpg',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_image_02_control', array(
        'label' => __('Image 02', 'text-domain'),
        'section' => 'about_us_image_section',
        'settings' => 'about_us_image_02',
    )));

    $wp_customize->add_setting('about_us_image_03', array(
        'default' => get_template_directory_uri(  ).'/app/assets/img/about-3.jpg',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_image_03_control', array(
        'label' => __('Image 03', 'text-domain'),
        'section' => 'about_us_image_section',
        'settings' => 'about_us_image_03',
    )));

    $wp_customize->add_setting('about_us_image_04', array(
        'default' => get_template_directory_uri(  ).'/app/assets/img/about-4.jpg',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_image_04_control', array(
        'label' => __('Image 04', 'text-domain'),
        'section' => 'about_us_image_section',
        'settings' => 'about_us_image_04',
    )));

    /** 
     * Count section
    */

    $wp_customize->add_section('about_us_count_section', array(
        'title' => __('Count', 'text-domain'),
        'panel' => 'about_us_panel',
    ));

    $wp_customize->add_setting('about_us_count_rooms', array(
        'default' => '1234',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_us_count_rooms_control', array(
        'label' => __('Rooms', 'text-domain'),
        'section' => 'about_us_count_section',
        'settings' => 'about_us_count_rooms',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_us_count_staff', array(
        'default' => '1234',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_us_count_staff_control', array(
        'label' => __('Floor', 'text-domain'),
        'section' => 'about_us_count_section',
        'settings' => 'about_us_count_staff',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_us_count_client', array(
        'default' => '1234',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_us_count_client_control', array(
        'label' => __('Year', 'text-domain'),
        'section' => 'about_us_count_section',
        'settings' => 'about_us_count_client',
        'type' => 'text',
    ));

}
add_action('customize_register', 'custom_about_us_customizer_section');