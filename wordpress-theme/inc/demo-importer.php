<?php
/**
 * Auto-Seed Demo Content on First Theme Activation
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_seed_demo_content() {
    if ( get_option( 'studio_build_demo_seeded_v1' ) ) {
        return;
    }

    // Seed Sample Projects (Digital Product Design - 1:1)
    $projects = array(
        array(
            'title'    => 'Your website has one job.',
            'content'  => 'A clean, high-impact digital presence engineered to convert visitors into believers without friction.',
            'category' => 'Websites',
            'year'     => '2026',
            'tag'      => "Let's create · @kausar.build",
            'url'      => '#',
        ),
        array(
            'title'    => 'To make people trust your business.',
            'content'  => 'Not confuse them. Clarity-first branding and website systems that establish credibility instantly.',
            'category' => 'Strategy Through Design',
            'year'     => '2026',
            'tag'      => 'Branding · Websites · Experiences',
            'url'      => '#',
        ),
        array(
            'title'    => "Beautiful isn't enough. It has to convert.",
            'content'  => 'Automate. Analyze. Accelerate. High-performance product interfaces engineered for measurable business growth.',
            'category' => 'UI / Conversion',
            'year'     => '2026',
            'tag'      => 'Conversion Systems',
            'url'      => '#',
        ),
        array(
            'title'    => 'I design websites that look premium and perform.',
            'content'  => 'Precision digital craft uniting high-end visual elegance with uncompromising speed and responsiveness.',
            'category' => 'Web Design',
            'year'     => '2026',
            'tag'      => 'Design + Development',
            'url'      => '#',
        ),
    );

    foreach ( $projects as $proj ) {
        $post_id = wp_insert_post( array(
            'post_title'   => $proj['title'],
            'post_content' => $proj['content'],
            'post_status'  => 'publish',
            'post_type'    => 'portfolio_project',
        ) );
        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_project_category', $proj['category'] );
            update_post_meta( $post_id, '_project_year', $proj['year'] );
            update_post_meta( $post_id, '_project_tag', $proj['tag'] );
            update_post_meta( $post_id, '_project_url', $proj['url'] );
        }
    }

    // Seed Booking Services
    $bookings = array(
        array( 'title' => 'Product Design & Engineering', 'content' => 'Full product strategy, UI architecture, and tech feasibility.', 'price' => '240', 'duration' => '20 min' ),
        array( 'title' => 'Framer Site or Landing Page', 'content' => 'High-conversion design and rapid turnkey deployment.', 'price' => '120', 'duration' => '30 min' ),
        array( 'title' => 'Design System Setup', 'content' => 'Tokens, component libraries, and documentation handoff.', 'price' => '160', 'duration' => '15 min' ),
    );

    foreach ( $bookings as $b ) {
        $b_id = wp_insert_post( array(
            'post_title'   => $b['title'],
            'post_content' => $b['content'],
            'post_status'  => 'publish',
            'post_type'    => 'booking_service',
        ) );
        if ( $b_id && ! is_wp_error( $b_id ) ) {
            update_post_meta( $b_id, '_booking_price', $b['price'] );
            update_post_meta( $b_id, '_booking_duration', $b['duration'] );
        }
    }

    update_option( 'studio_build_demo_seeded_v1', true );
}
add_action( 'after_switch_theme', 'studio_build_seed_demo_content' );
