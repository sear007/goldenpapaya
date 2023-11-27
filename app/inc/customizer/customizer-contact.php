<?php
function custom_contact_us_customizer_section($wp_customize) {
    $wp_customize->add_section('contact_us', array(
        'title' => 'Contact Us Section GPPY',
        'priority' => 5,
    ));

    $wp_customize->add_setting('contact_us_address', array(
        'default' => "123 Street, New York, USA",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_address', array(
        'label' => __('Address', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_address',
        'type' => 'text'
    ));

    $wp_customize->add_setting('contact_us_phone', array(
        'default' => "+012 345 67890",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_phone', array(
        'label' => __('Phone', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_phone',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('contact_us_email', array(
        'default' => "info@example.com",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_email', array(
        'label' => __('Email', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_email',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('contact_us_map', array(
        'default' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_map', array(
        'label' => __('Map URL', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_map',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('contact_us_twitter', array(
        'default' => "",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_twitter', array(
        'label' => __('Twitter URL', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_twitter',
        'type' => 'text'
    ));

    $wp_customize->add_setting('contact_us_facebook', array(
        'default' => "",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_facebook', array(
        'label' => __('Facebook URL', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_facebook',
        'type' => 'text'
    ));

    $wp_customize->add_setting('contact_us_youtube', array(
        'default' => "",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_youtube', array(
        'label' => __('YouTube URL', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_youtube',
        'type' => 'text'
    ));

    $wp_customize->add_setting('contact_us_linkedin', array(
        'default' => "",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_linkedin', array(
        'label' => __('LinkedIn URL', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_linkedin',
        'type' => 'text'
    ));

    $wp_customize->add_setting('contact_us_instagram', array(
        'default' => "",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_us_instagram', array(
        'label' => __('Instagram URL', 'text-domain'),
        'section' => 'contact_us',
        'settings' => 'contact_us_instagram',
        'type' => 'text'
    ));
}
add_action('customize_register', 'custom_contact_us_customizer_section');