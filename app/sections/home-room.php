<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
            <h1 class="mb-5"><?php echo $args['title'] ?? ''; ?></h1>
        </div>
        <div class="row g-4">
            <?php
            if(!isset($args['slug'])){
                $args = array(
                    'post_type' => 'room',
                    'posts_per_page' => 5,
                );
            } else {
                $args = array(
                    'post_type' => 'room',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'room_type',
                            'field' => 'slug', 
                            'terms' => get_query_var('term'),
                        ),
                    ),
                );
            }
            $rooms_query = new WP_Query($args);

            if ($rooms_query->have_posts()) {
                while ($rooms_query->have_posts()) {
                    $rooms_query->the_post();
                    $room_id = get_the_ID();
                    $room_title = get_the_title();
                    $room_name = get_post_meta($room_id, 'room_name', true);
                    $room_price = get_post_meta($room_id, 'room_price', true);
                    $room_image = get_the_post_thumbnail_url($room_id, 'full');
                    $bed_count = get_post_meta($room_id, 'bed_room', true);
                    $room_shower = get_post_meta($room_id, 'room_shower', true);
                    $free_wifi = get_post_meta($room_id, 'free_wifi', true);
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="room-item shadow rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="<?php echo $room_image; ?>" alt="<?php echo $room_title; ?>">
                                        <small class="position-absolute start-0 fw-semi-bold font-weight-bolder top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                            <?php echo $room_price; ?> USD
                                        </small>
                                    </div>
                                    <div class="p-4 mt-2">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="mb-0"><?php echo $room_name;?></h5>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i><?php echo $bed_count; ?> Bed<?php if($bed_count) { echo 's'; }?></small>
                                            <?php if($room_shower === 'on'){?> 
                                                <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>Shower</small>  
                                            <?php } ?>
                                            <?php if($free_wifi === 'on'){?> 
                                                <small><i class="fa fa-wifi text-primary me-2"></i> WiFi</small>    
                                            <?php } ?>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="<?php echo get_permalink($room_id); ?>">
                                                View Detail
                                            </a>
                                            <?php
                                            $terms = get_the_terms($room_id, 'room_type');
                                            if (!empty($terms)) { foreach ($terms as $term) { ?>
                                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="<?php echo get_term_link($term); ?>">
                                                <?php echo $term->name; ?>
                                            </a>
                                            <?php };} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                }
            } else {
                echo 'No rooms found.';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>