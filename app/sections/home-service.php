<?php
$data_json = '[
    {
        "title": "'.get_theme_mod('service_free_wifi_title', 'Free Wifi').'",
        "description": "'.get_theme_mod('service_free_wifi_description', 'Free Wifi Description').'",
        "icon": "<i class=\"icon-wifi fa-2x text-primary\"></i>"
    },
    {
        "title": "'.get_theme_mod('service_free_parking_title', 'Free Parking').'",
        "description": "'.get_theme_mod('service_free_parking_description', 'Free Parking Description').'",
        "icon": "<i class=\"icon-parking fa-2x text-primary\"></i>"
    },
    {
        "title": "'.get_theme_mod('service_massage_title', 'Massage').'",
        "description": "'.get_theme_mod('service_massage_description', 'Massage Description').'",
        "icon": "<i class=\"icon-body-massage fa-2x text-primary\"></i>"
    },
    {
        "title": "'.get_theme_mod('service_room_service_title', 'Room Service').'",
        "description": "'.get_theme_mod('service_room_service_description', 'Room Service Description').'",
        "icon": "<i class=\"icon-food-service fa-2x text-primary\"></i>"
    },
    {
        "title": "'.get_theme_mod('service_airport_transfer_title', 'Airport Transfer').'",
        "description": "'.get_theme_mod('service_airport_transfer_description', 'Airport Transfer Description').'",
        "icon": "<i class=\"icon-airport fa-2x text-primary\"></i>"
    },
    {
        "title": "'.get_theme_mod('service_tour_title', 'Tours').'",
        "description": "'.get_theme_mod('service_tour_description', 'Tours Description').'",
        "icon": "<i class=\"icon-tourists fa-2x text-primary\"></i>"
    }
]';
$data = json_decode($data_json, true);
$rooms_page = get_page_by_title('Rooms'); // Check if "About Us" page exists
$button_href = $rooms_page ? get_permalink($rooms_page) : '#';
?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
            <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
        </div>
        <div class="row g-4">
            <?php foreach ($data as $service) { ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item rounded" href="<?php echo $button_href; ?>">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <?php echo $service['icon']; ?>
                            </div>
                        </div>
                        <h5 class="mb-3"><?php echo $service['title']; ?></h5>
                        <p class="text-body mb-0"><?php echo $service['description']; ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>