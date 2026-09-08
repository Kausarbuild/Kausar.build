<?php
/**
 * WordPress Customizer Panels & Image Controls for Studio Build Theme
 *
 * Exposes all website images to the WordPress Media Library via WP_Customize_Image_Control
 * so users can replace any image with zero coding required.
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_customize_register( $wp_customize ) {
    // Master Theme Panel
    $wp_customize->add_panel( 'studio_build_panel', array(
        'title'       => esc_html__( 'Kausar.Build Portfolio Settings', 'studio-build' ),
        'description' => esc_html__( 'Manage all homepage sections, media assets, pricing, and visual design tokens.', 'studio-build' ),
        'priority'    => 20,
    ) );

    // ==========================================
    // 0. Dedicated "All Website Images & Media" Section
    // ==========================================
    $wp_customize->add_section( 'studio_all_images_section', array(
        'title'       => esc_html__( '🖼️ All Website Images & Media', 'studio-build' ),
        'description' => esc_html__( 'Easily replace any website image using your WordPress Media Library. Aspect ratios, cropping, and containers are automatically preserved.', 'studio-build' ),
        'panel'       => 'studio_build_panel',
        'priority'    => 10,
    ) );

    // 1. Hero Lanyard Pass Image
    $wp_customize->add_setting( 'studio_hero_image', array(
        'default'           => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_hero_image_all', array(
        'label'       => esc_html__( '1. Hero Lanyard Badge Photo (4:5 Aspect)', 'studio-build' ),
        'description' => esc_html__( 'Physical badge photo on the hanging lanyard pass.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_hero_image',
    ) ) );

    // 2. About Bento Tall Portrait
    $wp_customize->add_setting( 'studio_about_portrait', array(
        'default'           => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_about_portrait_all', array(
        'label'       => esc_html__( '2. About Bento Tall Portrait Photo (4:5 Aspect)', 'studio-build' ),
        'description' => esc_html__( 'Left-side tall vertical portrait card in the About Bento Grid.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_about_portrait',
    ) ) );

    // 3. Music Player Cover
    $wp_customize->add_setting( 'studio_music_cover', array(
        'default'           => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_music_cover_all', array(
        'label'       => esc_html__( '3. Music Player Album Artwork (1:1 Square)', 'studio-build' ),
        'description' => esc_html__( 'Cover artwork inside the Spotify audio player widget.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_music_cover',
    ) ) );

    // 4. Workstation Rig Setup Photo
    $wp_customize->add_setting( 'studio_personal_img', array(
        'default'           => 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_personal_img_all', array(
        'label'       => esc_html__( '4. Studio Workstation Rig Photo (1:1 Square)', 'studio-build' ),
        'description' => esc_html__( 'Studio setup/hardware photo in the Bento Grid.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_personal_img',
    ) ) );

    // 5. Profile Verification Avatar
    $wp_customize->add_setting( 'studio_profile_avatar', array(
        'default'           => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=400&q=80',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_profile_avatar_all', array(
        'label'       => esc_html__( '5. Profile Verification Avatar (1:1 Circle)', 'studio-build' ),
        'description' => esc_html__( 'Circular avatar photo inside the direct collaboration & retainer section.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_profile_avatar',
    ) ) );

    // 6. Booking Consultation Portrait
    $wp_customize->add_setting( 'studio_booking_portrait', array(
        'default'           => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_booking_portrait_all', array(
        'label'       => esc_html__( '6. Booking Consultation Portrait (4:5 Aspect)', 'studio-build' ),
        'description' => esc_html__( 'Portrait photo in the 1:1 Consultation booking wizard card.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_booking_portrait',
    ) ) );

    // 7. Footer Wax Seal
    $wp_customize->add_setting( 'studio_wax_seal_image', array(
        'default'           => '',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_wax_seal_image_all', array(
        'label'       => esc_html__( '7. Footer Wax Seal Emblem (Optional)', 'studio-build' ),
        'description' => esc_html__( 'Upload a custom circular seal image to replace the default KB badge.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_wax_seal_image',
    ) ) );

    // 8. Footer Signature
    $wp_customize->add_setting( 'studio_signature_image', array(
        'default'           => '',
        'sanitize_callback' => 'studio_build_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_signature_image_all', array(
        'label'       => esc_html__( '8. Footer Signature Graphic (Optional)', 'studio-build' ),
        'description' => esc_html__( 'Upload a transparent PNG signature to replace the cursive typography.', 'studio-build' ),
        'section'     => 'studio_all_images_section',
        'settings'    => 'studio_signature_image',
    ) ) );

    // 9. Project Artwork Images (1 to 4)
    for ( $p = 1; $p <= 4; $p++ ) {
        $p_key = 'studio_project_' . $p . '_image';
        $wp_customize->add_setting( $p_key, array(
            'default'           => '',
            'sanitize_callback' => 'studio_build_sanitize_image',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $p_key . '_all', array(
            'label'       => sprintf( esc_html__( 'Project %d Artwork Image (1:1 Square)', 'studio-build' ), $p ),
            'description' => sprintf( esc_html__( 'Replace Project %d preview thumbnail with an image from your Media Library.', 'studio-build' ), $p ),
            'section'     => 'studio_all_images_section',
            'settings'    => $p_key,
        ) ) );
    }

    // ==========================================
    // 1. Hero Section Content & Settings
    // ==========================================
    $wp_customize->add_section( 'studio_hero_section', array(
        'title'    => esc_html__( 'Hero & Lanyard Pass', 'studio-build' ),
        'panel'    => 'studio_build_panel',
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'studio_site_brand', array( 'default' => 'Kausar.Build', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_site_brand', array( 'label' => 'Navbar Brand Title', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_hero_image_control', array(
        'label'       => esc_html__( 'Lanyard ID Badge Photo (4:5 Aspect)', 'studio-build' ),
        'description' => esc_html__( 'Replace the photo displayed on the hanging physical lanyard pass.', 'studio-build' ),
        'section'     => 'studio_hero_section',
        'settings'    => 'studio_hero_image',
    ) ) );

    $wp_customize->add_setting( 'studio_hero_status', array( 'default' => 'Available', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_hero_status', array( 'label' => 'Status Tagline', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_greeting', array( 'default' => 'Hello, I am Kausar', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_hero_greeting', array( 'label' => 'Hero Greeting', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_headline', array( 'default' => 'I Turn Ideas Into Websites.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_hero_headline', array( 'label' => 'Hero Sub-headline', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_description', array( 'default' => 'I design and build websites with a focus on great design, clean work, and a smooth experience. Simple, thoughtful, and made to last. Open for projects ↓', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_hero_description', array( 'label' => 'Hero Bio Description', 'section' => 'studio_hero_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_badge_name', array( 'default' => 'KAUSAR', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_badge_name', array( 'label' => 'Badge Name Tag', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_badge_role', array( 'default' => 'DESIGN ENGINEER', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_badge_role', array( 'label' => 'Badge Role Tag', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    // ==========================================
    // 2. Profile & Retainer Section
    // ==========================================
    $wp_customize->add_section( 'studio_profile_section', array(
        'title'    => esc_html__( 'Profile Info & Monthly Retainer', 'studio-build' ),
        'panel'    => 'studio_build_panel',
        'priority' => 30,
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_profile_avatar_control', array(
        'label'       => esc_html__( 'Profile Verification Avatar (1:1 Circle)', 'studio-build' ),
        'description' => esc_html__( 'Circular avatar photo displayed inside the direct collaboration and retainer card.', 'studio-build' ),
        'section'     => 'studio_profile_section',
        'settings'    => 'studio_profile_avatar',
    ) ) );

    $wp_customize->add_setting( 'studio_profile_location', array( 'default' => 'India', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_location', array( 'label' => 'Location', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_experience', array( 'default' => 'Design + Development', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_experience', array( 'label' => 'Experience Summary', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_focus', array( 'default' => 'Websites & Digital Products', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_focus', array( 'label' => 'Focus Summary', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_status', array( 'default' => 'Available for selected projects', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_status', array( 'label' => 'Availability Status', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_bio', array( 'default' => 'I care about clear ideas, thoughtful details, and building things that are genuinely useful.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_profile_bio', array( 'label' => 'Profile Bio', 'section' => 'studio_profile_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_retainer_title', array( 'default' => 'Monthly Website Support', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_retainer_title', array( 'label' => 'Retainer Title', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_retainer_description', array( 'default' => 'Ongoing design and development support for websites that need regular improvements, updates, or new work.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_retainer_description', array( 'label' => 'Retainer Description', 'section' => 'studio_profile_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_retainer_price', array( 'default' => 'Let’s talk', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_retainer_price', array( 'label' => 'Retainer Price or Label', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_retainer_period', array( 'default' => 'Flexible scope', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_retainer_period', array( 'label' => 'Retainer Period or Scope', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    // ==========================================
    // 3. Projects Archive Images (Fallback / Override)
    // ==========================================
    $wp_customize->add_section( 'studio_projects_section', array(
        'title'       => esc_html__( 'Projects Archive Artwork', 'studio-build' ),
        'description' => esc_html__( 'Customize the default project artwork images in the 2x2 archive grid.', 'studio-build' ),
        'panel'       => 'studio_build_panel',
        'priority'    => 35,
    ) );

    $project_defaults = array(
        1 => 'project-1-one-job.svg',
        2 => 'project-2-trust-business.svg',
        3 => 'project-3-convert-dashboard.svg',
        4 => 'project-4-premium-perform.svg',
    );

    for ( $i = 1; $i <= 4; $i++ ) {
        $setting_key = 'studio_project_' . $i . '_image';
        $wp_customize->add_setting( $setting_key, array(
            'default'           => '',
            'sanitize_callback' => 'studio_build_sanitize_image',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_key, array(
            'label'       => sprintf( esc_html__( 'Project %d Artwork Image (1:1 Square)', 'studio-build' ), $i ),
            'description' => sprintf( esc_html__( 'Custom image for Project %d. Leave empty to use the default SVG.', 'studio-build' ), $i ),
            'section'     => 'studio_projects_section',
        ) ) );
    }

    // ==========================================
    // 4. About Me Bento Grid Section
    // ==========================================
    $wp_customize->add_section( 'studio_about_section', array(
        'title'    => esc_html__( 'About Bento Grid', 'studio-build' ),
        'panel'    => 'studio_build_panel',
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'studio_about_title', array( 'default' => '// About me', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_title', array( 'label' => 'Section Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_subtitle', array( 'default' => 'The person behind the pixels', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_subtitle', array( 'label' => 'Section Subtitle', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_about_portrait_control', array(
        'label'       => esc_html__( 'Bento Tall Portrait Photo (4:5 Aspect)', 'studio-build' ),
        'description' => esc_html__( 'Replace the left-side tall portrait photo in the About Bento Grid.', 'studio-build' ),
        'section'     => 'studio_about_section',
        'settings'    => 'studio_about_portrait',
    ) ) );

    $wp_customize->add_setting( 'studio_about_portrait_tag', array( 'default' => 'Creator & Coder', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_portrait_tag', array( 'label' => 'Portrait Card Tag', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_portrait_sub', array( 'default' => 'Exploring the boundaries of digital craft.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_portrait_sub', array( 'label' => 'Portrait Card Subtitle', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_music_cover_control', array(
        'label'       => esc_html__( 'Music Player Album Artwork (1:1 Square)', 'studio-build' ),
        'description' => esc_html__( 'Replace the Spotify music player album cover artwork.', 'studio-build' ),
        'section'     => 'studio_about_section',
        'settings'    => 'studio_music_cover',
    ) ) );

    $wp_customize->add_setting( 'studio_music_title', array( 'default' => 'Veeran Sheher', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_music_title', array( 'label' => 'Music Track Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_music_artist', array( 'default' => 'Kausar XD', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_music_artist', array( 'label' => 'Music Artist Name', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_spotify_url', array( 'default' => 'https://open.spotify.com/track/2U699aQLnplBGFGxWBIiDD', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_spotify_url', array( 'label' => 'Spotify Track URL', 'section' => 'studio_about_section', 'type' => 'url' ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_personal_img_control', array(
        'label'       => esc_html__( 'Studio Workstation Rig Photo (1:1 Square)', 'studio-build' ),
        'description' => esc_html__( 'Replace the studio workstation setup photo in the bento grid.', 'studio-build' ),
        'section'     => 'studio_about_section',
        'settings'    => 'studio_personal_img',
    ) ) );

    $wp_customize->add_setting( 'studio_personal_title', array( 'default' => 'Workstation Rig', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_title', array( 'label' => 'Studio Environment Card Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_sub', array( 'default' => 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_personal_sub', array( 'label' => 'Studio Environment Description', 'section' => 'studio_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_personal_tag', array( 'default' => 'Studio Rig', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_tag', array( 'label' => 'Studio Tag Pill', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_badge', array( 'default' => 'Studio Setup', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_badge', array( 'label' => 'Studio Badge Pill', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_note', array( 'default' => 'M3 Max · Studio Display · Custom Oak', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_note', array( 'label' => 'Hardware Specs Note', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_time', array( 'default' => 'Setup v4', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_time', array( 'label' => 'Setup Version / Time Tag', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_manifesto_title', array( 'default' => '// Guiding Philosophy', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_manifesto_title', array( 'label' => 'Guiding Philosophy Tag Pill', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_manifesto_quote', array( 'default' => 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_manifesto_quote', array( 'label' => 'Guiding Philosophy Quote Statement', 'section' => 'studio_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_manifesto_author', array( 'default' => '— Kausar · Design Engineer', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_manifesto_author', array( 'label' => 'Guiding Philosophy Author Attribution', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_manifesto_sub', array( 'default' => 'Zero bloat · 100% independent craft', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_manifesto_sub', array( 'label' => 'Guiding Philosophy Sub-tagline', 'section' => 'studio_about_section', 'type' => 'text' ) );

    // ==========================================
    // 5. Booking & Consultation Section
    // ==========================================
    $wp_customize->add_section( 'studio_booking_section', array(
        'title'    => esc_html__( 'Booking & Consultation', 'studio-build' ),
        'panel'    => 'studio_build_panel',
        'priority' => 45,
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_booking_portrait_control', array(
        'label'       => esc_html__( 'Consultation Portrait Photo (4:5 Aspect)', 'studio-build' ),
        'description' => esc_html__( 'Replace the portrait photo displayed in the consultation booking card.', 'studio-build' ),
        'section'     => 'studio_booking_section',
        'settings'    => 'studio_booking_portrait',
    ) ) );

    // ==========================================
    // 6. Footer & Signature Section
    // ==========================================
    $wp_customize->add_section( 'studio_footer_section', array(
        'title'    => esc_html__( 'Footer, Signature & Socials', 'studio-build' ),
        'panel'    => 'studio_build_panel',
        'priority' => 50,
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_wax_seal_image_control', array(
        'label'       => esc_html__( 'Custom Wax Seal Emblem (Optional Image)', 'studio-build' ),
        'description' => esc_html__( 'Upload a custom emblem or stamp image to replace the KB wax seal.', 'studio-build' ),
        'section'     => 'studio_footer_section',
        'settings'    => 'studio_wax_seal_image',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_signature_image_control', array(
        'label'       => esc_html__( 'Custom Signature Graphic (Optional Image)', 'studio-build' ),
        'description' => esc_html__( 'Upload an image of your signature to replace the cursive font.', 'studio-build' ),
        'section'     => 'studio_footer_section',
        'settings'    => 'studio_signature_image',
    ) ) );

    $wp_customize->add_setting( 'studio_footer_greeting', array( 'default' => 'Thanks for being here.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_footer_greeting', array( 'label' => 'Footer Greeting', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_footer_tagline', array( 'default' => 'Let’s build something thoughtful.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_footer_tagline', array( 'label' => 'Footer Tagline', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_signature_name', array( 'default' => 'Kausar.Build', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_signature_name', array( 'label' => 'Signature Name', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_copyright_text', array( 'default' => '© 2026 Kausar.Build. All Rights Reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_copyright_text', array( 'label' => 'Copyright Text', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_social_email', array( 'default' => 'hello@kausar.build', 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'studio_social_email', array( 'label' => 'Contact Email', 'section' => 'studio_footer_section', 'type' => 'email' ) );

    $wp_customize->add_setting( 'studio_social_instagram', array( 'default' => 'https://instagram.com', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_instagram', array( 'label' => 'Instagram URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_linkedin', array( 'default' => 'https://linkedin.com', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_linkedin', array( 'label' => 'LinkedIn URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_twitter', array( 'default' => 'https://twitter.com', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_twitter', array( 'label' => 'X / Twitter URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_github', array( 'default' => 'https://github.com', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_github', array( 'label' => 'GitHub URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    // ==========================================
    // 7. Theme Accent Color
    // ==========================================
    $wp_customize->add_section( 'studio_colors_section', array(
        'title'    => esc_html__( 'Theme Accent Color', 'studio-build' ),
        'panel'    => 'studio_build_panel',
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'studio_accent_color', array( 'default' => '#E8590C', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'studio_accent_color', array( 'label' => 'Primary Accent Color', 'section' => 'studio_colors_section' ) ) );
}
add_action( 'customize_register', 'studio_build_customize_register' );
