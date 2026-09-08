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

    // Full Site Editing & Block Editor Support
    add_theme_support( 'block-template-parts' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/main.css' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );

    register_nav_menus( array(
        'primary-menu' => esc_html__( 'Primary Navigation Bar', 'studio-build' ),
        'footer-menu'  => esc_html__( 'Footer Navigation', 'studio-build' ),
    ) );
}
add_action( 'after_setup_theme', 'studio_build_setup' );

/**
 * Register custom Gutenberg Block Pattern Categories
 */
function studio_build_register_pattern_categories() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'kausar-build',
            array(
                'label'       => esc_html__( 'Kausar.Build Sections', 'studio-build' ),
                'description' => esc_html__( 'Design-engineered block patterns matching the live portfolio.', 'studio-build' ),
            )
        );
    }
}
add_action( 'init', 'studio_build_register_pattern_categories' );

function studio_build_scripts() {
    // Tailwind CSS Play CDN Engine for immediate visual parity
    wp_enqueue_script(
        'tailwind-cdn',
        'https://cdn.tailwindcss.com',
        array(),
        '3.4.17',
        false
    );

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

function studio_build_admin_scripts( $hook ) {
    // Enqueue native WordPress Media scripts and styles on all edit screens
    if ( in_array( $hook, array( 'post.php', 'post-new.php', 'widgets.php' ), true ) ) {
        wp_enqueue_media();
        wp_enqueue_style( 'studio-build-admin-css', STUDIO_BUILD_URI . '/assets/css/admin.css', array(), STUDIO_BUILD_VERSION );
        wp_enqueue_script( 'studio-build-admin-media', STUDIO_BUILD_URI . '/assets/js/admin-media.js', array( 'jquery' ), STUDIO_BUILD_VERSION, true );
    }
}
add_action( 'admin_enqueue_scripts', 'studio_build_admin_scripts' );

require_once STUDIO_BUILD_DIR . '/inc/image-helpers.php';
require_once STUDIO_BUILD_DIR . '/inc/custom-post-types.php';
require_once STUDIO_BUILD_DIR . '/inc/custom-fields.php';
require_once STUDIO_BUILD_DIR . '/inc/theme-settings.php';
require_once STUDIO_BUILD_DIR . '/inc/demo-importer.php';

// Initialize Elementor integration
if ( file_exists( STUDIO_BUILD_DIR . '/inc/elementor/class-elementor-manager.php' ) ) {
    require_once STUDIO_BUILD_DIR . '/inc/elementor/class-elementor-manager.php';
    \StudioBuild\Elementor\Manager::instance();
}

function studio_build_handle_booking() {
    if ( ! empty( $_POST['security'] ) ) {
        check_ajax_referer( 'studio_build_booking_nonce', 'security' );
    }

    $service_id    = sanitize_text_field( $_POST['service_id'] ?? '' );
    $service_title = sanitize_text_field( $_POST['service_title'] ?? 'Consultation' );
    $service_price = sanitize_text_field( $_POST['service_price'] ?? 'Free' );
    $client_name   = sanitize_text_field( $_POST['client_name'] ?? '' );
    $client_email  = sanitize_email( $_POST['client_email'] ?? '' );
    $client_notes  = sanitize_textarea_field( $_POST['client_notes'] ?? '' );
    $client_dt     = sanitize_text_field( $_POST['client_datetime'] ?? '' );

    if ( empty( $client_name ) || ! is_email( $client_email ) ) {
        wp_send_json_error( array( 'message' => esc_html__( 'Please provide a valid name and email address.', 'studio-build' ) ) );
    }

    // Create a Consultation Inquiry record in WordPress
    $post_title = sprintf( '%s - %s', $client_name, $service_title );
    $post_content = "<strong>Client Name:</strong> " . esc_html( $client_name ) . "<br>"
                  . "<strong>Client Email:</strong> " . esc_html( $client_email ) . "<br>"
                  . "<strong>Service:</strong> " . esc_html( $service_title ) . " (" . esc_html( $service_price ) . ")<br>"
                  . "<strong>Preferred Time:</strong> " . esc_html( $client_dt ?: 'Not specified' ) . "<br><br>"
                  . "<strong>Project Notes:</strong><br>" . nl2br( esc_html( $client_notes ?: 'None provided' ) );

    $inquiry_id = wp_insert_post( array(
        'post_type'    => 'consultation_inquiry',
        'post_title'   => $post_title,
        'post_content' => $post_content,
        'post_status'  => 'publish',
    ) );

    if ( $inquiry_id && ! is_wp_error( $inquiry_id ) ) {
        update_post_meta( $inquiry_id, '_client_name', $client_name );
        update_post_meta( $inquiry_id, '_client_email', $client_email );
        update_post_meta( $inquiry_id, '_service_title', $service_title );
        update_post_meta( $inquiry_id, '_preferred_time', $client_dt );
    }

    do_action( 'studio_build_after_booking_submit', array(
        'service_id'    => $service_id,
        'service_title' => $service_title,
        'service_price' => $service_price,
        'name'          => $client_name,
        'email'         => $client_email,
        'notes'         => $client_notes,
        'datetime'      => $client_dt,
        'submitted_at'  => current_time( 'mysql' ),
    ) );

    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[%s] New Consultation Booking: %s', get_bloginfo( 'name' ), $service_title );
    $message = "You received a new consultation request on your website:\n\n"
             . "Service: {$service_title} ({$service_price})\n"
             . "Client: {$client_name}\n"
             . "Email: {$client_email}\n"
             . "Preferred Time: {$client_dt}\n"
             . "Notes:\n{$client_notes}\n";

    @wp_mail( $admin_email, $subject, $message );

    wp_send_json_success( array(
        'message'       => esc_html__( 'Booking confirmed! We will contact you shortly.', 'studio-build' ),
        'service_title' => $service_title,
        'client_name'   => $client_name,
        'client_email'  => $client_email,
    ) );
}
add_action( 'wp_ajax_studio_build_booking', 'studio_build_handle_booking' );
add_action( 'wp_ajax_nopriv_studio_build_booking', 'studio_build_handle_booking' );
