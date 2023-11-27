<?php
/*
Template Name: Room Posts Template
*/

get_header(); // Include the header template
$directory = get_template_directory(  ).'/app/inc/custom-post-types/room/';
require_once $directory.'amenities_and_facilities_items.php';
// Custom query to retrieve room posts
$args = array(
    'post_type' => 'room',
    'posts_per_page' => 10, // Number of room posts to display
);
$room_query = new WP_Query($args);

// Check if there are any room posts
if ($room_query->have_posts()) {
    while ($room_query->have_posts()) {
        $room_query->the_post();
        $room_id = get_the_ID();
        $room_title = get_the_title();
        $room_name = get_post_meta($room_id, 'room_name', true);
        $room_price = get_post_meta($room_id, 'room_price', true);
        $room_image = get_the_post_thumbnail_url($room_id, 'full');
        $bed_count = get_post_meta($room_id, 'bed_room', true);
        $room_shower = get_post_meta($room_id, 'room_shower', true);
        $free_wifi = get_post_meta($room_id, 'free_wifi', true);
        $free_wifi = get_post_meta($room_id, 'free_wifi', true);
        $gallery_images = get_post_meta($post->ID, 'room_gallery_images', true);
        wp_nonce_field('room_gallery_nonce', 'room_gallery_nonce');
?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Room</h6>
            <h1 class="mb-5"><span class="text-primary text-uppercase"><?php echo $room_name; ?></span></h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-9" >
            <!-- Start Slider -->
                <div class="swiper-container main-slider loading" style="height: 500px !important">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($gallery_images as $key => $image_id) {
                                $image_url = wp_get_attachment_url($image_id);
                                ?>
                                    <div class="swiper-slide">
                                        <figure 
                                            class="slide-bgimg" 
                                            style="background-image:url(<?php echo esc_url($image_url); ?>)"
                                        >
                                            <img src="<?php echo esc_url($image_url); ?>" class="entity-img" />
                                        </figure>
                                        <div class="content">
                                            <p class="title"></p>
                                            <span class="caption"></span>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev swiper-button-white"></div>
                    <div class="swiper-button-next swiper-button-white"></div>
                </div>
                <!-- Thumbnail navigation -->
                <div class="swiper-container nav-slider loading">
                    <div class="swiper-wrapper" role="navigation">
                        <?php
                            foreach ($gallery_images as $key => $image_id) {
                                $image_url = wp_get_attachment_url($image_id);
                                ?>
                                    <div class="swiper-slide">
                                        <figure 
                                            class="slide-bgimg" 
                                            >
                                            <img style="height: 95px; width: 100%; object-fit: cotain" src="<?php echo esc_url($image_url); ?>" />
                                        </figure>
                                        <div class="content">
                                            <span class="caption">Golden</span>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            <!-- End Slider -->
            </div>
            <div class="col-lg-3">
                <hr>
                <div class="mb-2 wow fadeInRight">
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between items-center gap-2">
                            <div>
                                <p class="text-primary m-0 p-0 h5"><?php echo $room_price; ?> USD</p>
                                <h6 class="text-muted small"><?php echo $room_name; ?></h6>
                            </div>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-phone-alt"></i> Booking</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <h5 class="text-primary">Features</h5>
                    <p class="p-0 m-0"><i class="icon-blueprint"></i><small> Room size: 18 m²/194 ft²</small></p>
                    <p class="p-0 m-0"><i class="icon-no-smoking"></i><small> Non-smoking</small></p>
                    <p class="p-0 m-0"><i class="icon-air-conditioning"></i><small> Air conditioning</small></p>
                    <p></p>
                    <h5 class="text-primary">Entertainment</h5>
                    <p class="p-0 m-0"><i class="icon-watch-tv"></i><small> Satellite/cable channels</small></p>
                    <p class="p-0 m-0"><i class="icon-wifi"></i><small> Free Wi-Fi</small></p>
                    <p></p>
                    <h5 class="text-primary">Comforts</h5>
                    <p class="p-0 m-0"><i class="icon-fan"></i><small> Fan</small></p>
                    <p class="p-0 m-0"><i class="icon-shower"></i><small> Shower</small></p>
                    <p></p>
                    <h6 class="text-primary">Dining, drinking, and snacking</h6>
                    <p class="p-0 m-0"><i class="icon-water"></i><small> Free Water</small></p>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="border p-3 rounded  shadow-sm wow fadeInLeft">
                    <h5 class="text-primary">Amenities and facilities</h5>
                    <?php
                        global $items;
                        $phpObject = json_decode($items);
                        $keys = [];
                        $data_meta = [];
                        foreach ($phpObject as $section) {
                            foreach ($section->items as $item){
                                $keys[] = $item->key;
                                $data_meta[$item->key] = get_post_meta($room_id, $item->key, true);
                            }
                        }
                    ?>
                    <div class="row">
                        <?php foreach ($phpObject as $section) { ?>
                            <div class="col-lg-3 mb-2">
                                <div class="flex flex-column">
                                    <p class="fw-semi-bold m-0 p-0"><?php echo $section->section_name; ?><p>
                                    <?php foreach ($section->items as $item) { ?>
                                        <p 
                                            lass="p-0 m-0"
                                            style="<?php echo get_post_meta($room_id, $item->key, true) ? "":"text-decoration-line: line-through; color: #ccc"; ?>"> 
                                            <?php echo $item->icon.' <small>'.$item->name; ?></small>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }

    // Restore original post data
    wp_reset_postdata();
} else {
    echo 'No room posts found.';
}

get_footer(); // Include the footer template