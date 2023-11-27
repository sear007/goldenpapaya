<?php
require_once get_template_directory() . '/app/inc/functions.php';
require_once get_template_directory() . '/app/inc/custom-nav-walker.php';
require_once get_template_directory() . '/app/inc/customizer/customizer.php';

require_once get_template_directory() . '/app/inc/custom-post-types/index.php';


add_action('admin_post_nopriv_custom_contact_form', 'custom_contact_form_submission');
add_action('admin_post_custom_contact_form', 'custom_contact_form_submission');

function custom_contact_form_submit() {
  if (isset($_POST['your-name']) && isset($_POST['your-email']) && isset($_POST['your-subject']) && isset($_POST['your-message'])) {
      $name = sanitize_text_field($_POST['your-name']);
      $email = sanitize_email($_POST['your-email']);
      $subject = sanitize_text_field($_POST['your-subject']);
      $message = esc_textarea($_POST['your-message']);

      $to = 'your@email.com'; // Replace with the recipient's email address
      $headers = "From: $name <$email>" . "\r\n";
      $headers .= "Reply-To: $email" . "\r\n";

      wp_mail($to, $subject, $message, $headers);
  }
}
add_action('admin_post_nopriv_custom_contact_form', 'custom_contact_form_submit');
add_action('admin_post_custom_contact_form', 'custom_contact_form_submit');