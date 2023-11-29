<?php
$email = get_theme_mod( 'contact_us_email', '');
$phone = get_theme_mod( 'contact_us_phone', '');
$contact_us_twitter = get_theme_mod( 'contact_us_twitter', '');
$contact_us_facebook = get_theme_mod( 'contact_us_facebook', '');
$contact_us_youtube = get_theme_mod( 'contact_us_youtube', '');
$contact_us_linkedin = get_theme_mod( 'contact_us_linkedin', '');
$contact_us_instagram = get_theme_mod( 'contact_us_instagram', '');
?>
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="/" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h3 class="m-0 text-white text-uppercase">Golden Papaya</h3>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0"><?php echo $email; ?></p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0"><?php echo $phone; ?></p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href="<?php echo $contact_us_facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href="<?php echo $contact_us_twitter; ?>"><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href="<?php echo $contact_us_linkedin; ?>"><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href="<?php echo $contact_us_instagram; ?>"><i class="fab fa-instagram"></i></a>
                        <a class="" href="<?php echo $contact_us_youtube; ?>"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="/" class="navbar-brand d-block d-lg-none">
                    <h3 class="m-0 text-primary text-uppercase">Golden Papaya</h3>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <?php
                        $primary_menu_args = array(
                            'theme_location'  => 'primary',
                            'container'       => false, // Set container to false
                            'items_wrap'      => '%3$s', // Remove the <ul> wrapper
                            'walker'          => new Custom_Nav_Walker(),
                            'echo'            => false,
                        );
                        $primary_menu = wp_nav_menu($primary_menu_args);
                        if ($primary_menu) {
                            echo $primary_menu;
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>