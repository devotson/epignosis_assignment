<?php
/**
 * Plugin Name: Ajax Contact Form
 * Description: Contact form with ajax submission
 */

function epig_contact_form() {
    $content = '';

    $content .= '<div id="response_div" class="alert" role="alert"></div>';
    $content .= '<form id="ajaxform">';
    $content .= '<div class="form-row">';
    $content .= '<div class="col-sm-6 mb-4">';
    $content .= '<label for="firstname">YOUR FIRSTNAME *</label>';
    $content .= '<input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your firstname" oninvalid="this.setCustomValidity(\'Please fill the field\')" onchange="this.setCustomValidity(\'\')" required>';
    $content .= '</div>';
    $content .= '<div class="col-sm-6 mb-4">';
    $content .= '<label for="lastname">YOUR LASTNAME *</label>';
    $content .= '<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your lastname" oninvalid="this.setCustomValidity(\'Please fill the field\')" onchange="this.setCustomValidity(\'\')" required>';
    $content .= '</div>';
    $content .= '<div class="col-sm-12 mb-4">';
    $content .= '<label for="formemail">YOUR EMAIL *</label>';
    $content .= '<input type="email" class="form-control" name="formemail" id="formemail" placeholder="Enter your email" oninvalid="this.setCustomValidity(\'Please enter a valid email address\')" onchange="this.setCustomValidity(\'\')" required>';
    $content .= '</div>';
    $content .= '<div class="col-sm-12 mb-4">';
    $content .= '<label for="formtextarea">YOUR MESSAGE FOR US *</label>';
    $content .= '<textarea class="form-control" name="formtextarea" id="formtextarea" rows="3" placeholder="Enter your message" oninvalid="this.setCustomValidity(\'Please fill the field\')" onchange="this.setCustomValidity(\'\')" required></textarea>';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '<button class="btn btn-primary" type="submit">SEND MESSAGE</button>';
    $content .= '</form>';

    return $content;
 }

add_shortcode('contact_form', 'epig_contact_form');

function contact_ajax_js() {
    wp_enqueue_script('epig-contact-js', plugins_url( 'js/epig_contact.js', __FILE__ ), array(), false, true);
}

add_action('wp_enqueue_scripts','contact_ajax_js');

?>