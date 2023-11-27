<?php
function display_room_features_meta_box($post) {
    $room_name = get_post_meta($post->ID, 'room_name', true);
    $bed_room = get_post_meta($post->ID, 'bed_room', true);
    $room_size = get_post_meta($post->ID, 'room_size', true);
    $room_price = get_post_meta($post->ID, 'room_price', true);
    $allow_smooking = get_post_meta($post->ID, 'allow_smooking', true);
    $room_shower = get_post_meta($post->ID, 'room_shower', true);
    $free_wifi = get_post_meta($post->ID, 'free_wifi', true);
    $television = get_post_meta($post->ID, 'television', true);
    $air_conditioning = get_post_meta($post->ID, 'air_conditioning', true);
    $fan = get_post_meta($post->ID, 'fan', true);
    $free_water = get_post_meta($post->ID, 'free_water', true);
    ?>
        <div style="display: flex;flex-direction: column; gap: 5    px">
            <div style="margin-bottom: 10px">
                <label for="room_name">Room name</label><br>
                <input id="room_name" type="text" name="room_name" value="<?php echo esc_attr($room_name); ?>" />
            </div>
            <div style="margin-bottom: 10px">
                <label for="room_price">Room Price</label><br>
                <input id="room_price" type="text" name="room_price" value="<?php echo esc_attr($room_price); ?>" />
            </div>
            <div style="margin-bottom: 10px">
                <label for="bed_room">Bed room</label><br>
                <input id="bed_room" type="number" min="0" name="bed_room" value="<?php echo esc_attr($bed_room); ?>" />
            </div>
            <div style="margin-bottom: 10px">
                <label for="room_size">Room Size</label><br>
                <input id="room_size" type="text" name="room_size" value="<?php echo esc_attr($room_size); ?>" />
            </div>
        </div>

        <div style="display: flex;flex-direction: column; gap: 10px">
            <div>
                <label>
                    <input type="checkbox" name="allow_smooking" <?php checked($allow_smooking, 'on'); ?> />
                    Allow Smooking
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="room_shower" <?php checked($room_shower, 'on'); ?> />
                    Room Shower
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="free_wifi" <?php checked($free_wifi, 'on'); ?> />
                    Free Wi-Fi
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="television" <?php checked($television, 'on'); ?> />
                    Television
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="air_conditioning" <?php checked($air_conditioning, 'on'); ?> />
                    Air conditioning
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="fan" <?php checked($fan, 'on'); ?> />
                    Fan
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="free_water" <?php checked($free_water, 'on'); ?> />
                    Free bottled water
                </label>
            </div>
        </div>
    <?php
}

function save_room_features_meta_box($post_id) {
    $features = array(
        'room_size',
        'allow_smooking', 
        'room_shower',
        'room_name',
        'room_price',
        'bed_room',
        'free_wifi',
        'television',
        'air_conditioning',
        'fan',
        'free_water',
    );
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    foreach ($features as $feature) {
        $value = isset($_POST[$feature]) ? $_POST[$feature] : '';
        update_post_meta($post_id, $feature, $value);
    }
}
add_action('save_post_room', 'save_room_features_meta_box');

function add_room_features_meta_box() {
    add_meta_box(
        'room_features',
        'Room Features',
        'display_room_features_meta_box',
        'room',
        'normal', // normal or side
        'default',
    );
}
add_action('add_meta_boxes', 'add_room_features_meta_box');