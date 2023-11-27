<?php
/*
Template Name: About Us
*/
get_header();
get_template_part('app/sections/page', 'header', array(
    'name' => 'About Us',
    'link' => 'about',
));
get_template_part('app/sections/home', 'booking');
get_template_part('app/sections/home', 'about');
get_template_part('app/sections/home', 'team');
get_footer();
