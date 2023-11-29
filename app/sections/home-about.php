<?php
    $title = get_theme_mod('about_us_title', 'Welcome to GOLDEN PAPAYA');
    $des = get_theme_mod('about_us_description', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet');
    $img01 = get_theme_mod('about_us_image_01', get_template_directory_uri(  ).'/app/assets/img/about-1.jpg');
    $img02 = get_theme_mod('about_us_image_02', get_template_directory_uri(  ).'/app/assets/img/about-2.jpg');
    $img03 = get_theme_mod('about_us_image_03', get_template_directory_uri(  ).'/app/assets/img/about-3.jpg');
    $img04 = get_theme_mod('about_us_image_04', get_template_directory_uri(  ).'/app/assets/img/about-4.jpg');
    $count_room = get_theme_mod( 'about_us_count_rooms',  '1234');
    $count_staff = get_theme_mod( 'about_us_count_staff',  '1234');
    $count_client = get_theme_mod( 'about_us_count_client',  '1234');
?>
<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h3 class="mb-4"><?php echo $title; ?></h3>
                        <p class="mb-4"><?php echo $des; ?></p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $count_room; ?></h2>
                                        <p class="mb-0" style="font-size: 10px">Number of rooms</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $count_staff; ?></h2>
                                        <p class="mb-0 small" style="font-size: 10px">Number of floors</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $count_client; ?></h2>
                                        <p class="mb-0 small" style="font-size: 10px">Year property opened</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $about_page = get_page_by_title('About'); // Check if "About Us" page exists
                            $button_href = $about_page ? get_permalink($about_page) : '#';
                            if($about_page){
                                echo '<a class="btn btn-primary py-3 px-5 mt-2" href="' . $button_href . '">Explore More</a>';
                            }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="<?php echo $img01; ?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="<?php echo $img02; ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="<?php echo $img03; ?>">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="<?php echo $img04; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>