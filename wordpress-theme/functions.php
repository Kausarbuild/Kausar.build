<?php
/**
 * Studio Build Portfolio Theme Functions
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'STUDIO_BUILD_VERSION', '1.0.0' );
define( 'STUDIO_BUILD_DIR', get_template_directory() );
define( 'STUDIO_BUILD_URI', get_template_directory_uri() );

function studio_build_setup() {
    load_theme_textdomain( 'studio-build', STUDIO_BUILD_DIR . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary-menu' => esc_html__( 'Primary Navigation Bar', 'studio-build' ),
        'footer-menu'  => esc_html__( 'Footer Navigation', 'studio-build' ),
    ) );
}
add_action( 'after_setup_theme', 'studio_build_setup' );

function studio_build_scripts() {
    wp_enqueue_style(
        'studio-build-fonts',
        'https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap',
        array(),
        null
    );

    wp_enqueue_style( 'studio-build-style', get_stylesheet_uri(), array( 'studio-build-fonts' ), STUDIO_BUILD_VERSION );
    wp_enqueue_style( 'studio-build-main', STUDIO_BUILD_URI . '/assets/css/main.css', array( 'studio-build-style' ), STUDIO_BUILD_VERSION );

    wp_enqueue_script(
        'studio-build-script',
        STUDIO_BUILD_URI . '/assets/js/main.js',
        array(),
        STUDIO_BUILD_VERSION,
        true
    );

    wp_localize_script( 'studio-build-script', 'studioBuildData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'studio_build_booking_nonce' ),
        'accent'  => get_theme_mod( 'studio_accent_color', '#E8590C' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'studio_build_scripts' );

require_once STUDIO_BUILD_DIR . '/inc/custom-post-types.php';
require_once STUDIO_BUILD_DIR . '/inc/custom-fields.php';
require_once STUDIO_BUILD_DIR . '/inc/theme-settings.php';
require_once STUDIO_BUILD_DIR . '/inc/demo-importer.php';

function studio_build_handle_booking() {
    check_ajax_referer( 'studio_build_booking_nonce', 'security' );

    $service_id    = sanitize_text_field( $_POST['service_id'] ?? '' );
    $service_title = sanitize_text_field( $_POST['service_title'] ?? '' );
    $service_price = sanitize_text_field( $_POST['service_price'] ?? '' );
    $client_name   = sanitize_text_field( $_POST['client_name'] ?? '' );
    $client_email  = sanitize_email( $_POST['client_email'] ?? '' );
    $client_notes  = sanitize_textarea_field( $_POST['client_notes'] ?? '' );

    if ( empty( $client_name ) || ! is_email( $client_email ) ) {
        wp_send_json_error( array( 'message' => esc_html__( 'Please provide a valid name and email address.', 'studio-build' ) ) );
    }

    do_action( 'studio_build_after_booking_submit', array(
        'service_id'    => $service_id,
        'service_title' => $service_title,
        'service_price' => $service_price,
        'name'          => $client_name,
        'email'         => $client_email,
        'notes'         => $client_notes,
        'submitted_at'  => current_time( 'mysql' ),
    ) );

    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[%s] New Consultation Booking: %s', get_bloginfo( 'name' ), $service_title );
    $message = "You received a new booking from your website:\\n\\n"
             . "Service: {$service_title} ({$service_price})\\n"
             . "Client: {$client_name}\\n"
             . "Email: {$client_email}\\n"
             . "Notes: {$client_notes}\\n";

    wp_mail( $admin_email, $subject, $message );

    wp_send_json_success( array(
        'message'       => esc_html__( 'Booking confirmed! We will contact you within 24 hours.', 'studio-build' ),
        'service_title' => $service_title,
        'client_name'   => $client_name,
        'client_email'  => $client_email,
    ) );
}
add_action( 'wp_ajax_studio_build_booking', 'studio_build_handle_booking' );
add_action( 'wp_ajax_nopriv_studio_build_booking', 'studio_build_handle_booking' );
