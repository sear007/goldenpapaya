<?php
function theme_slider_settings($wp_customize) {
    $slider_number = get_theme_mod('slider_number_setting');

    // Add Slider section
    $wp_customize->add_panel('slider_panel', array(
        'title' => __('Slider Section GPPY', 'text-domain'),
        'priority' => 1,
    ));

    $wp_customize->add_section('slider_height_section', array(
        'title' => __('Height Slider', 'text-domain'),
        'priority' => 0,
        'panel' => 'slider_panel',
    ));

    $wp_customize->add_setting('slider_height_setting', array(
        'default' => 500,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('slider_height_control', array(
        'label' => __("Height Of slider"),
        'section' => 'slider_height_section',
        'settings' => 'slider_height_setting',
        'type' => 'number',
        'transport' => 'refresh',
    ));

    $wp_customize->add_section('slider_number_section', array(
        'title' => __('Number Slider', 'text-domain'),
        'priority' => 0,
        'panel' => 'slider_panel',
    ));

    $wp_customize->add_setting('slider_number_setting', array(
        'default' => 2,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('slider_number_control', array(
        'label' => __("Number Of slider"),
        'section' => 'slider_number_section',
        'settings' => 'slider_number_setting',
        'type' => 'text',
        'transport' => 'refresh',
    ));
    loopSliderControl($slider_number, $wp_customize);
}

function loopSliderControl($count = 2, $wp_customize){
    for ($i = 0; $i < $count; $i++) { 
        // Add Slider Image setting
        $wp_customize->add_section('slider_section_'.$i, array(
            'title' => __('Slider '. ($i + 1), 'text-domain'),
            'priority' => $i + 1,
            'panel' => 'slider_panel',
        ));

        $wp_customize->add_setting('slider_image_'.$i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Add Slider Caption setting
        $wp_customize->add_setting('slider_caption_'.$i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        // Add Slider Image control
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_control_'.$i,
            array(
                'label' => __('Slider Image', 'text-domain'),
                'description' => __('Select an image for the slider.', 'text-domain'),
                'section' => 'slider_section_'.$i,
                'settings' => 'slider_image_'.$i,
            )
        ));

        // Add Slider Caption control
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'slider_caption_control_'.$i,
            array(
                'label' => __('Slider Caption', 'text-domain'),
                'description' => __('Enter a caption for the slider.', 'text-domain'),
                'section' => 'slider_section_'.$i,
                'settings' => 'slider_caption_'.$i,
                'type' => 'text',
            )
        ));
    }
}


add_action('customize_register', 'theme_slider_settings');