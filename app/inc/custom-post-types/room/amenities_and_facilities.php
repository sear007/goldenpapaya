<?php
$directory = get_template_directory(  ).'/app/inc/custom-post-types/room/';
require_once $directory.'amenities_and_facilities_items.php';
function display_room_amenities_and_facilities_meta_box($post) {
    global $items;
    $phpObject = json_decode($items);
    echo '<div class="admin-row" style="padding:10px">';
    foreach ($phpObject as $section) {
        echo '<div class="admin-col-lg-3 admin-mb-2">';
            echo '<p class="fw-semi-bold admin-m-0 admin-p-0"><b>'.$section->section_name.'</b><p>';
            foreach ($section->items as $item) {
                echo '<div style="margin-bottom: 10px"><label for="'.$item->key.'">'?>
                        <input <?php checked(get_post_meta($post->ID, $item->key, true), 'on'); ?> id="<?php echo $item->key; ?>" type="checkbox" name="<?php echo $item->key; ?>" />  
        <?php echo $item->name.'</label></div>'; } echo '</div>';}echo '</div>';
}

function save_room_amenities_and_facilities_meta_box($post_id) {
    $features = array(
        "af_khmer","af_english","af_massage","af_tours","af_elevator","af_laundry_service","af_smoking_area","af_airport_transfer","af_car_park","af_rental_car","af_free_wifi_all_rooms","af_free_wifi_public","af_room_service","af_front_desk","af_pets_allowed","af_bicycle_rental"
    );
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    foreach ($features as $feature) {
        $value = isset($_POST[$feature]) ? $_POST[$feature] : '';
        update_post_meta($post_id, $feature, $value);
    }
}
add_action('save_post_room', 'save_room_amenities_and_facilities_meta_box');

function add_room_amenities_and_facilities_meta_box() {
    add_meta_box(
        'amenities_and_facilities',
        'Amenities and facilities',
        'display_room_amenities_and_facilities_meta_box',
        'room',
        'normal', // normal or side
        'default',
    );
}
add_action('add_meta_boxes', 'add_room_amenities_and_facilities_meta_box');