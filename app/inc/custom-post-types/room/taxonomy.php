<?php
function create_room_type_taxonomy() {
    $labels = array(
        'name' => 'Room Types',
        'singular_name' => 'Room Type',
        'search_items' => 'Search Room Types',
        'all_items' => 'All Room Types',
        'parent_item' => 'Parent Room Type',
        'parent_item_colon' => 'Parent Room Type:',
        'edit_item' => 'Edit Room Type',
        'update_item' => 'Update Room Type',
        'add_new_item' => 'Add New Room Type',
        'new_item_name' => 'New Room Type Name',
        'menu_name' => 'Room Types',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'room-type'),
    );
    register_taxonomy('room_type', 'room', $args);
}
add_action('init', 'create_room_type_taxonomy');