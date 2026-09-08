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
    if ( get_option( 'studio_build_demo_seeded_v4' ) ) {
        return;
    }

    $theme_uri = get_template_directory_uri();

    // 1. Seed Sample Projects with exact SVGs matching Google AI Studio reference
    $projects = array(
        array(
            'title'    => 'Your website has one job.',
            'content'  => 'A clean, high-impact digital presence engineered to convert visitors into believers without friction.',
            'category' => 'Websites',
            'year'     => '2026',
            'tag'      => "Let's create · @kausar.build",
            'url'      => '#',
            'image'    => $theme_uri . '/assets/projects/project-1-one-job.svg',
        ),
        array(
            'title'    => 'To make people trust your business.',
            'content'  => 'Not confuse them. Clarity-first branding and website systems that establish credibility instantly.',
            'category' => 'Strategy Through Design',
            'year'     => '2026',
            'tag'      => 'Branding · Websites · Experiences',
            'url'      => '#',
            'image'    => $theme_uri . '/assets/projects/project-2-trust-business.svg',
        ),
        array(
            'title'    => "Beautiful isn't enough. It has to convert.",
            'content'  => 'Automate. Analyze. Accelerate. High-performance product interfaces engineered for measurable business growth.',
            'category' => 'UI / Conversion',
            'year'     => '2026',
            'tag'      => 'Conversion Systems',
            'url'      => '#',
            'image'    => $theme_uri . '/assets/projects/project-3-convert-dashboard.svg',
        ),
        array(
            'title'    => 'I design websites that look premium and perform.',
            'content'  => 'Precision digital craft uniting high-end visual elegance with uncompromising speed and responsiveness.',
            'category' => 'Web Design',
            'year'     => '2026',
            'tag'      => 'Design + Development',
            'url'      => '#',
            'image'    => $theme_uri . '/assets/projects/project-4-premium-perform.svg',
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
            update_post_meta( $post_id, '_project_image', $proj['image'] );
        }
    }

    // 2. Seed Services (01 to 05)
    $services = array(
        array(
            'title'   => 'Web Design',
            'number'  => '01',
            'content' => 'Thoughtful websites with clear structure, strong typography, and responsive layouts.',
        ),
        array(
            'title'   => 'UI / Product Design',
            'number'  => '02',
            'content' => 'Interfaces designed around clarity, usability, and a consistent visual system.',
        ),
        array(
            'title'   => 'Web Development',
            'number'  => '03',
            'content' => 'Clean, responsive implementation that turns designs into working websites.',
        ),
        array(
            'title'   => 'Design Systems',
            'number'  => '04',
            'content' => 'Reusable components and visual systems that keep digital products consistent as they grow.',
        ),
        array(
            'title'   => 'Interaction & Motion',
            'number'  => '05',
            'content' => 'Subtle interactions and motion that make a digital experience feel considered.',
        ),
    );

    foreach ( $services as $svc ) {
        $svc_id = wp_insert_post( array(
            'post_title'   => $svc['title'],
            'post_content' => $svc['content'],
            'post_status'  => 'publish',
            'post_type'    => 'studio_service',
        ) );
        if ( $svc_id && ! is_wp_error( $svc_id ) ) {
            update_post_meta( $svc_id, '_service_number', $svc['number'] );
        }
    }

    // 3. Seed Testimonials with exact client avatars matching Google AI Studio
    $testimonials = array(
        array(
            'author'  => 'Client Name',
            'role'    => 'Role / Position',
            'company' => 'Company',
            'content' => '“A thoughtful placeholder for a real client testimonial.”',
            'avatar'  => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
        ),
        array(
            'author'  => 'Client Name',
            'role'    => 'Role / Position',
            'company' => 'Company',
            'content' => '“A thoughtful placeholder for a real client testimonial.”',
            'avatar'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
        ),
        array(
            'author'  => 'Client Name',
            'role'    => 'Role / Position',
            'company' => 'Company',
            'content' => '“A thoughtful placeholder for a real client testimonial.”',
            'avatar'  => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=400&q=80',
        ),
    );

    foreach ( $testimonials as $test ) {
        $t_id = wp_insert_post( array(
            'post_title'   => $test['author'],
            'post_content' => $test['content'],
            'post_status'  => 'publish',
            'post_type'    => 'client_testimonial',
        ) );
        if ( $t_id && ! is_wp_error( $t_id ) ) {
            update_post_meta( $t_id, '_testimonial_role', $test['role'] );
            update_post_meta( $t_id, '_testimonial_company', $test['company'] );
            update_post_meta( $t_id, '_testimonial_avatar', $test['avatar'] );
        }
    }

    // 4. Seed Booking Services
    $bookings = array(
        array(
            'title'       => 'Website Design & Development',
            'content'     => 'Discuss a new website or digital project.',
            'price'       => 'Free',
            'duration'    => '30 min',
        ),
        array(
            'title'       => 'Website Review',
            'content'     => 'Review an existing website and discuss possible improvements.',
            'price'       => 'Free',
            'duration'    => '20 min',
        ),
        array(
            'title'       => 'Design Consultation',
            'content'     => 'Talk through an idea, design direction, or product interface.',
            'price'       => 'Free',
            'duration'    => '20 min',
        ),
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

    // 5. Seed Default Theme Mods for Images matching Google AI Studio master
    if ( ! get_theme_mod( 'studio_hero_image' ) ) {
        set_theme_mod( 'studio_hero_image', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80' );
    }
    if ( ! get_theme_mod( 'studio_about_portrait' ) ) {
        set_theme_mod( 'studio_about_portrait', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80' );
    }
    if ( ! get_theme_mod( 'studio_music_cover' ) ) {
        set_theme_mod( 'studio_music_cover', 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80' );
    }
    if ( ! get_theme_mod( 'studio_personal_img' ) ) {
        set_theme_mod( 'studio_personal_img', 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80' );
    }
    if ( ! get_theme_mod( 'studio_profile_avatar' ) ) {
        set_theme_mod( 'studio_profile_avatar', 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=400&q=80' );
    }
    if ( ! get_theme_mod( 'studio_booking_portrait' ) ) {
        set_theme_mod( 'studio_booking_portrait', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80' );
    }

    // 6. Seed Consultation Page
    $consultation_page = get_page_by_path( 'consultation' );
    if ( ! $consultation_page ) {
        wp_insert_post( array(
            'post_title'    => 'Book a Consultation',
            'post_name'     => 'consultation',
            'post_content'  => 'Pick a topic, select a time that suits you, and let’s talk through your project.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'page_template' => 'template-consultation.php',
        ) );
    }

    update_option( 'studio_build_demo_seeded_v5', true );
}
add_action( 'after_switch_theme', 'studio_build_seed_demo_content' );
