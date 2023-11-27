<?php
/*
Template Name: Contact Us
*/
get_header();
get_template_part('app/sections/page', 'header', array(
    'name' => 'Contact Us',
    'link' => 'contact',
));
get_template_part('app/sections/home', 'booking');
get_template_part('app/sections/page', 'contact');
get_footer();