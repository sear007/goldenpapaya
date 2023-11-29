<?php
$data_json = '[
    {
        "icon": "<i class=\'icon-wifi\'></i>",
        "title": "Free Wi-Fi",
        "description": "Hello world description lorem..",
        "section_title": "Free Wifi",
        "section": "service_free_wifi",
        "key": "service_",
        "panel": "service_panel"
    }
]';

function custom_services_customizer_section($wp_customize) {
    $wp_customize->add_panel('service_panel', array(
        'title' => 'Services Section GPPY',
        'priority' => 4,
    ));

    // Wifi
    $wp_customize->add_section('service_free_wifi', array(
        'title' => 'Free Wifi',
        'priority' => 1,
        'panel' => 'service_panel'
    ));

    $wp_customize->add_setting('service_free_wifi_title', array(
        'default' => 'Free Wifi',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_free_wifi_title', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'service_free_wifi',
        'settings' => 'service_free_wifi_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_free_wifi_description', array(
        'default' => "Free WiFi: Stay connected on the go, no cost.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('service_free_wifi_escription', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'service_free_wifi',
        'settings' => 'service_free_wifi_description',
        'type' => 'textarea',
    ));

    // Free parking
    $wp_customize->add_section('service_free_parking', array(
        'title' => 'Free Parking',
        'priority' => 1,
        'panel' => 'service_panel'
    ));

    $wp_customize->add_setting('service_free_parking_title', array(
        'default' => 'Free Parking',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_free_parking_title', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'service_free_parking',
        'settings' => 'service_free_parking_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_free_parking_description', array(
        'default' => "Free parking: Enjoy complimentary parking without any charges or fees.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('service_free_parking_description', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'service_free_parking',
        'settings' => 'service_free_parking_description',
        'type' => 'textarea',
    ));

    // Massage
    $wp_customize->add_section('service_massage', array(
        'title' => 'Massage',
        'priority' => 1,
        'panel' => 'service_panel'
    ));

    $wp_customize->add_setting('service_massage_title', array(
        'default' => 'Massage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_massage_title', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'service_massage',
        'settings' => 'service_massage_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_massage_description', array(
        'default' => "Massage service: Relax and rejuvenate with professional massages tailored to your needs.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('service_free_parking_escription', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'service_massage',
        'settings' => 'service_massage_description',
        'type' => 'textarea',
    ));

    // Room service
    $wp_customize->add_section('service_room_service', array(
        'title' => 'Room service',
        'priority' => 1,
        'panel' => 'service_panel'
    ));

    $wp_customize->add_setting('service_room_service_title', array(
        'default' => 'Room Service',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_room_service_title', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'service_room_service',
        'settings' => 'service_room_service_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_room_service_description', array(
        'default' => "Room service: Enjoy the convenience of in-room dining and services delivered directly to your accommodation.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('service_room_service_description', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'service_room_service',
        'settings' => 'service_room_service_description',
        'type' => 'textarea',
    ));

    // Airport transfer
    $wp_customize->add_section('service_airport_transfer', array(
        'title' => 'Airport Transfer',
        'priority' => 1,
        'panel' => 'service_panel'
    ));

    $wp_customize->add_setting('service_airport_transfer_title', array(
        'default' => 'Airport Transfer',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_airport_transfer_title', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'service_airport_transfer',
        'settings' => 'service_airport_transfer_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_airport_transfer_description', array(
        'default' => "Airport transfer service: Convenient transportation to and from the airport for a stress-free and comfortable journey.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('service_airport_transfer_description', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'service_airport_transfer',
        'settings' => 'service_airport_transfer_description',
        'type' => 'textarea',
    ));

    // Tour
    $wp_customize->add_section('service_tour', array(
        'title' => 'Tours',
        'priority' => 1,
        'panel' => 'service_panel'
    ));

    $wp_customize->add_setting('service_tour_title', array(
        'default' => 'Tours',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_tour_title', array(
        'label' => __('Title', 'text-domain'),
        'section' => 'service_tour',
        'settings' => 'service_tour_title',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_tour_description', array(
        'default' => "Tours service: Explore and discover new destinations with guided tours and expert insights.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('service_tour_description', array(
        'label' => __('Description', 'text-domain'),
        'section' => 'service_tour',
        'settings' => 'service_tour_description',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'custom_services_customizer_section');