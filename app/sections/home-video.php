<?php
$title = get_theme_mod('watch_title','Discover A Brand Luxurious Hotel');
$des = get_theme_mod('watch_description','Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet');
$url_youtube = get_theme_mod('watch_url', 'https://www.youtube.com/watch?v=fj4IzuLYoH8&pp=ygURSG90ZWwgZ29vZCBwbGFjZXM%3D');

function getVideoId($link = "https://www.youtube.com/watch?v=fj4IzuLYoH8&pp=ygURSG90ZWwgZ29vZCBwbGFjZXM%3D") {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
    $youtube_id = $match[1];
    
    return $youtube_id; // Return the extracted video ID
}

$video_id = getVideoId($url_youtube);
?>
<div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Luxury Living</h6>
                        <h1 class="text-white mb-4"><?php echo $title; ?></h1>
                        <p class="text-white mb-4"><?php echo $des; ?></p>
                        <?php
                            $rooms_page = get_page_by_title('Rooms'); // Check if "About Us" page exists
                            $button_href = $rooms_page ? get_permalink($rooms_page) : '#';
                            if($rooms_page){
                                echo '<a class="btn btn-primary py-md-3 px-md-5 me-3" href="' . $button_href . '">Our Rooms</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/<?php echo $video_id;?>" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe 
                                class="embed-responsive-item" 
                                src="https://www.youtube.com/embed/<?php echo $video_id;?>" 
                                id="video" 
                                allowfullscreen 
                                allowscriptaccess="always"
                                allow="autoplay"
                            >
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>