<div class="container-fluid p-0 mb-5">
                    
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                        $slider_number = get_theme_mod('slider_number_setting');
                        $slider_height = get_theme_mod('slider_height_setting', '500');
                        for ($i = 0; $i < $slider_number; $i++) { 
                        $caption = get_theme_mod('slider_caption_'.$i);
                        $image = get_theme_mod('slider_image_'.$i);
                    ?>
                        <div class="carousel-item <?php echo $i == 0 ? 'active': '';?>">
                            <img class="w-100" src="<?php echo $image;?>" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Our Room</h6>
                                    <h1 class="display-3 text-white mb-4 animated slideInDown"><?php echo $caption;?></h1>
                                    <?php
                                        $rooms_page = get_page_by_title('Rooms'); // Check if "About Us" page exists
                                        $button_href = $rooms_page ? get_permalink($rooms_page) : '#';
                                        if($rooms_page){
                                            echo '<a class="btn btn-primary py-3 px-5 mt-2" href="' . $button_href . '">Explore More</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <style>
                    .carousel-item {
                        height: <?php echo $slider_height.'px'; ?>;
                    }
                    .carousel-item img {
                        height: 100%;
                        object-fit: cover;
                    }
                </style>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>