<?php
get_header(); // Include the header template

if (have_posts()) {
    get_template_part('app/sections/home', 'room', array('title' => ''));
} else {
    echo '<p class="p-2 mt-5 mb-5">No posts found.</p>';
}

get_footer(); // Include the footer template