<?php 
get_header();
get_template_part('app/sections/home', 'carousel');
get_template_part('app/sections/home', 'about');
get_template_part('app/sections/home', 'room', array(
    'title' => 'Explore Our Rooms',
));
get_template_part('app/sections/home', 'video');
get_template_part('app/sections/home', 'service');
// get_template_part('app/sections/home', 'team');
get_footer();
?>