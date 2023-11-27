<?php
// Register the meta box
function add_room_gallery_meta_box() {
    add_meta_box(
        'room_gallery',
        'Room Gallery',
        'display_room_gallery_meta_box',
        'room',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_room_gallery_meta_box');

// Display the meta box
function display_room_gallery_meta_box($post) {
    $gallery_images = get_post_meta($post->ID, 'room_gallery_images', true);
    wp_nonce_field('room_gallery_nonce', 'room_gallery_nonce');
    ?>

    <div class="room-gallery-container">
        <ul class="room-gallery-preview">
            <?php
            if (!empty($gallery_images)) {
                foreach ($gallery_images as $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    echo '<li><img src="' . esc_url($image_url) . '"></li>';
                }
            }
            ?>
        </ul>
        <input 
            type="hidden" 
            id="room-gallery-images" 
            name="room_gallery_images" 
            value="
            <?php echo !empty($gallery_images) 
                ? esc_attr(implode(',', $gallery_images)) 
                : ''; 
            ?>">
        <button class="button button-secondary" id="room-gallery-add-images">Add Images</button>
    </div>

    <?php
}

// Save the gallery images
function save_room_gallery_images($post_id) {
    if (!isset($_POST['room_gallery_nonce']) || !wp_verify_nonce($_POST['room_gallery_nonce'], 'room_gallery_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['room_gallery_images'])) {
        $gallery_images = explode(',', $_POST['room_gallery_images']);
        $gallery_images = array_map('intval', $gallery_images);
        $gallery_images = array_filter($gallery_images);
        update_post_meta($post_id, 'room_gallery_images', $gallery_images);
    } else {
        delete_post_meta($post_id, 'room_gallery_images');
    }
}
add_action('save_post_room', 'save_room_gallery_images');