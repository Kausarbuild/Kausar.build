<?php
/**
 * Register Custom Post Types for Studio Build Portfolio
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_register_cpts() {
    register_post_type( 'portfolio_project', array(
        'labels' => array(
            'name'               => esc_html__( 'Projects', 'studio-build' ),
            'singular_name'      => esc_html__( 'Project', 'studio-build' ),
            'add_new_item'       => esc_html__( 'Add New Project', 'studio-build' ),
            'edit_item'          => esc_html__( 'Edit Project', 'studio-build' ),
            'new_item'           => esc_html__( 'New Project', 'studio-build' ),
            'view_item'          => esc_html__( 'View Project', 'studio-build' ),
            'search_items'       => esc_html__( 'Search Projects', 'studio-build' ),
            'not_found'          => esc_html__( 'No projects found', 'studio-build' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-portfolio',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    register_post_type( 'studio_service', array(
        'labels' => array(
            'name'          => esc_html__( 'Services', 'studio-build' ),
            'singular_name' => esc_html__( 'Service', 'studio-build' ),
            'add_new_item'  => esc_html__( 'Add New Service', 'studio-build' ),
            'edit_item'     => esc_html__( 'Edit Service', 'studio-build' ),
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-hammer',
        'supports'      => array( 'title', 'editor', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    register_post_type( 'client_testimonial', array(
        'labels' => array(
            'name'          => esc_html__( 'Testimonials', 'studio-build' ),
            'singular_name' => esc_html__( 'Testimonial', 'studio-build' ),
            'add_new_item'  => esc_html__( 'Add New Testimonial', 'studio-build' ),
            'edit_item'     => esc_html__( 'Edit Testimonial', 'studio-build' ),
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'  => true,
    ) );

    register_post_type( 'booking_service', array(
        'labels' => array(
            'name'          => esc_html__( 'Booking Options', 'studio-build' ),
            'singular_name' => esc_html__( 'Booking Option', 'studio-build' ),
            'add_new_item'  => esc_html__( 'Add Consultation Option', 'studio-build' ),
            'edit_item'     => esc_html__( 'Edit Consultation Option', 'studio-build' ),
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'supports'      => array( 'title', 'excerpt', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    // Store incoming consultation inquiries for easy review in WordPress Admin
    register_post_type( 'consultation_inquiry', array(
        'labels' => array(
            'name'               => esc_html__( 'Consultations', 'studio-build' ),
            'singular_name'      => esc_html__( 'Consultation', 'studio-build' ),
            'menu_name'          => esc_html__( 'Consultations', 'studio-build' ),
            'all_items'          => esc_html__( 'All Inquiries', 'studio-build' ),
            'edit_item'          => esc_html__( 'View Inquiry', 'studio-build' ),
            'search_items'       => esc_html__( 'Search Consultations', 'studio-build' ),
            'not_found'          => esc_html__( 'No consultations found', 'studio-build' ),
        ),
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-email-alt2',
        'capability_type'    => 'post',
        'capabilities'       => array( 'create_posts' => false ),
        'map_meta_cap'       => true,
        'supports'           => array( 'title', 'editor' ),
    ) );
}
add_action( 'init', 'studio_build_register_cpts' );
