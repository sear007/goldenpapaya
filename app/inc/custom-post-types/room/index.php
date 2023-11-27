<?php
$directory = get_template_directory(  ).'/app/inc/custom-post-types/room/';
function create_rooms_post_type() {
    $labels = array(
        'name' => 'Rooms',
        'singular_name' => 'Room',
        'menu_name' => 'Rooms',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Room',
        'edit' => 'Edit',
        'edit_item' => 'Edit Room',
        'new_item' => 'New Room',
        'view' => 'View',
        'view_item' => 'View Room',
        'search_items' => 'Search Rooms',
        'not_found' => 'No rooms found',
        'not_found_in_trash' => 'No rooms found in Trash',
        'parent' => 'Parent Room'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'rooms'),
        'supports' => array('title', 'thumbnail'),
        'taxonomies' => array('room_type'),
    );

    register_post_type('room', $args);
}
add_action('init', 'create_rooms_post_type');

// Add room_type column to the post listing
function add_room_type_column($columns) {
    $new_columns = array(
        'room_type' => 'Room Type',
    );
    
    // Find the 'title' column and its position
    $title_column = isset($columns['title']) ? $columns['title'] : '';
    $title_position = array_search('title', array_keys($columns));
    
    // Insert the room_type column after the title column
    $columns = array_slice($columns, 0, $title_position + 1, true) + $new_columns + array_slice($columns, $title_position + 1, count($columns) - 1, true);
    
    return $columns;
}
add_filter('manage_room_posts_columns', 'add_room_type_column');

// Populate room_type column with taxonomy data
function populate_room_type_column($column, $post_id) {
    if ($column === 'room_type') {
        $terms = get_the_terms($post_id, 'room_type');
        if ($terms && !is_wp_error($terms)) {
            $room_types = array();
            foreach ($terms as $term) {
                $room_types[] = $term->name;
            }
            echo implode(', ', $room_types);
        }
    }
}
add_action('manage_room_posts_custom_column', 'populate_room_type_column', 10, 2);

// Make room_type column sortable
function make_room_type_column_sortable($columns) {
    $columns['room_type'] = 'room_type';
    return $columns;
}
add_filter('manage_edit-room_sortable_columns', 'make_room_type_column_sortable');

// Handle sorting based on room_type column
function handle_room_type_column_sorting($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ($orderby === 'room_type') {
        $query->set('orderby', 'taxonomy');
        $query->set('orderby', 'room_type');
    }
}
add_action('parse_query', 'handle_room_type_column_sorting');

function add_room_custom_feature_image_columns($columns) {
    $new_columns = array(
        'featured_image' => 'Image',
    );
    // Insert the 'featured_image' column at the beginning
    $position = array_search('title', array_keys($columns));
    $columns = array_slice($columns, 0, $position, true) + $new_columns + array_slice($columns, $position, count($columns) - 1, true);
    return $columns;
}
add_filter('manage_room_posts_columns', 'add_room_custom_feature_image_columns', 10);
// Add custom columns to the post listing
function add_room_custom_columns($columns) {
    $new_columns = array(
        'bed_room' => 'Bed room',
        'air_conditioning' => 'Air Conditioning',
        'fan' => 'Fan',
    );
    // Find the 'room_type' column and its position
    $room_type_position = array_search('room_type', array_keys($columns));
    
    // Insert the custom columns after the 'room_type' column
    $columns = array_slice($columns, 0, $room_type_position + 1, true) + $new_columns + array_slice($columns, $room_type_position + 1, count($columns) - 1, true);
    
    return $columns;
}
add_filter('manage_room_posts_columns', 'add_room_custom_columns', 11);

// Populate custom columns with meta field data
function populate_room_custom_columns($column, $post_id) {
    switch ($column) {
        case 'featured_image':
            $thumbnail = get_the_post_thumbnail($post_id, array(50, 50));
            echo $thumbnail;
            break;
        case 'bed_room':
            $bed_room = get_post_meta($post_id, 'bed_room', true);
            echo esc_html($bed_room);
            break;
        case 'air_conditioning':
            $air_conditioning = get_post_meta($post_id, 'air_conditioning', true);
            echo esc_html($air_conditioning === 'on' ? 'Available' : 'None');
            break;
        case 'fan':
            $fan = get_post_meta($post_id, 'fan', true);
            echo esc_html($fan === 'on' ? 'Available' : 'None');
            break;
    }
}
add_action('manage_room_posts_custom_column', 'populate_room_custom_columns', 10, 2);

// Make custom columns sortable and filterable
function make_room_custom_columns_sortable($columns) {
    $sortable_columns = array(
        'bed_room' => 'bed_room',
        'air_conditioning' => 'air_conditioning',
        'fan' => 'fan',
    );
    return wp_parse_args($sortable_columns, $columns);
}
add_filter('manage_edit-room_sortable_columns', 'make_room_custom_columns_sortable');

// Modify the query to handle custom column sorting and filtering
function handle_room_custom_columns($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    $orderby = $query->get('orderby');
    if (isset($_GET['orderby'])) {
        switch ($orderby) {
            case 'bed_room':
            case 'air_conditioning':
            case 'fan':
                $query->set('meta_key', $orderby);
                $query->set('orderby', 'meta_value');
                break;
        }
    }
}
add_action('pre_get_posts', 'handle_room_custom_columns');

require_once $directory.'taxonomy.php';
require_once $directory.'galarry_meta.php';
require_once $directory.'feature_meta.php';
require_once $directory.'amenities_and_facilities.php';


function enqueue_room_gallery_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_media();
    wp_enqueue_script('room-gallery-script', get_template_directory_uri(  ).'/app/inc/custom-post-types/room/' . '/js/room-gallery.js', array('jquery'), '1.0', true);
    wp_enqueue_style('room-gallery-style', get_template_directory_uri(  ).'/app/inc/custom-post-types/room/' . '/css/room-gallery.css');
}
add_action('admin_enqueue_scripts', 'enqueue_room_gallery_scripts');
