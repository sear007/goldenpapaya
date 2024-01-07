<?php
function theme_customizer_watch_settings($wp_customize) {
    // Watch Section
    $wp_customize->add_section('watch_section', array(
        'title' => 'Watch Section GPPY',
        'priority' => 3,
    ));

    // Title Setting
    $wp_customize->add_setting('watch_title_sub', array(
        'default' => 'LUXURY LIVING',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_setting('watch_title', array(
        'default' => 'Discover A Brand Luxurious Hotel',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Description Setting
    $wp_customize->add_setting('watch_description', array(
        'default' => 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_setting('watch_url', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_setting('watch_image_settings', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));

    // Title Control
    $wp_customize->add_control('watch_title', array(
        'label' => 'Watch Title',
        'section' => 'watch_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_control('watch_title_sub_control', array(
        'label' => 'Sub-Title',
        'section' => 'watch_title_sub',
        'type' => 'text',
    ));

    // Description Control
    $wp_customize->add_control('watch_description', array(
        'label' => 'Watch Description',
        'section' => 'watch_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_control('watch_url', array(
        'label' => 'YouTube URL',
        'section' => 'watch_section',
        'type' => 'text',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize,
      'watch_image_controls',
      array(
          'label' => __('Youtube Thumbnail', 'text-domain'),
          'description' => __('Select an image for youtube Thumbnail.', 'text-domain'),
          'section' => 'watch_section',
          'settings' => 'watch_image_settings',
      )
  ));
}
add_action('customize_register', 'theme_customizer_watch_settings');