<?php
get_header(); // Include the header template

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('app/sections/home', 'room', array('title' => get_the_title()));
    }
} else {
    echo '<p>No posts found.</p>';
}

get_footer(); // Include the footer template