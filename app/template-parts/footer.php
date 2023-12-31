<!-- Footer Start -->
<?php
$short_description = get_theme_mod( 'about_us_short_description', 'short description');
$email = get_theme_mod( 'contact_us_email', '');
$phone = get_theme_mod( 'contact_us_phone', '');
$address = get_theme_mod( 'contact_us_address', '');
$contact_us_twitter = get_theme_mod( 'contact_us_twitter', '');
$contact_us_facebook = get_theme_mod( 'contact_us_facebook', '');
$contact_us_youtube = get_theme_mod( 'contact_us_youtube', '');
$contact_us_linkedin = get_theme_mod( 'contact_us_linkedin', '');
$contact_us_instagram = get_theme_mod( 'contact_us_instagram', '');
?>
<div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="bg-primary rounded p-4">
                            <a href="index.html"><h3 class="text-white text-uppercase mb-3">Golden Papaya</h3></a>
                            <p class="text-white mb-0">
								<?php echo $short_description; ?>
							</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $phone; ?></p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i><span ><?php echo $email; ?></span></p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><span ><?php echo $address; ?></span></p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="<?php echo $contact_us_twitter; ?>"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="<?php echo $contact_us_facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="<?php echo $contact_us_youtube; ?>"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="<?php echo $contact_us_linkedin; ?>"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="row gy-5 g-2">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                                
                                    <?php
                                    $footer_menu_args = array(
                                        'theme_location' => 'footer',
                                        'container' => false,
                                        'echo' => false, // Set 'echo' to false to capture the menu instead of displaying it immediately
                                    );
                                    $footer_menu = wp_nav_menu($footer_menu_args);

                                    // Process the menu items if the menu exists
                                    if ($footer_menu) {
                                        // Use regular expression to extract the individual menu items
                                        preg_match_all('/<a.*?href="(.*?)".*?>(.*?)<\/a>/', $footer_menu, $matches, PREG_SET_ORDER);

                                        // Iterate through each menu item
                                        foreach ($matches as $match) {
                                            // Display the menu item in the desired format
                                            echo '<a class="btn btn-link" href="' . $match[1] . '">' . $match[2] . '</a>';
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Golden Papaya</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php wp_footer(); ?>
</body>

</html>