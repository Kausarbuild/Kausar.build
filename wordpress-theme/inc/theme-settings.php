<?php
/**
 * WordPress Customizer Panels for Studio Build Theme
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'studio_build_panel', array(
        'title'       => esc_html__( 'Kausar.Build Portfolio Settings', 'studio-build' ),
        'description' => esc_html__( 'Manage all homepage sections, bio details, stats, pricing, and visual tokens.', 'studio-build' ),
        'priority'    => 20,
    ) );

    // Hero Section
    $wp_customize->add_section( 'studio_hero_section', array(
        'title' => esc_html__( 'Hero & Lanyard Pass', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_site_brand', array( 'default' => 'Kausar.Build', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_site_brand', array( 'label' => 'Navbar Brand Title', 'section' => 'studio_hero_section', 'type' => 'text' ) );

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

    // Profile & Retainer Section
    $wp_customize->add_section( 'studio_profile_section', array(
        'title' => esc_html__( 'Profile Info & Monthly Retainer', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

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

    // Accent Color
    $wp_customize->add_section( 'studio_colors_section', array(
        'title' => esc_html__( 'Theme Accent Color', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_accent_color', array( 'default' => '#E8590C', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'studio_accent_color', array( 'label' => 'Primary Accent Color', 'section' => 'studio_colors_section' ) ) );

    // About Me Bento Grid Section
    $wp_customize->add_section( 'studio_about_section', array(
        'title' => esc_html__( 'About Bento Grid', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_about_title', array( 'default' => '// About me', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_title', array( 'label' => 'Section Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_subtitle', array( 'default' => 'The person behind the pixels', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_subtitle', array( 'label' => 'Section Subtitle', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_portrait_tag', array( 'default' => 'Creator & Coder', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_portrait_tag', array( 'label' => 'Portrait Card Tag', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_portrait_sub', array( 'default' => 'Exploring the boundaries of digital craft.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_portrait_sub', array( 'label' => 'Portrait Card Subtitle', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_music_title', array( 'default' => 'Veeran Sheher', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_music_title', array( 'label' => 'Music Track Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_music_artist', array( 'default' => 'Kausar XD', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_music_artist', array( 'label' => 'Music Artist Name', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_spotify_url', array( 'default' => 'https://open.spotify.com/track/2U699aQLnplBGFGxWBIiDD', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_spotify_url', array( 'label' => 'Spotify Track URL', 'section' => 'studio_about_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_personal_title', array( 'default' => 'Workstation Rig', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_title', array( 'label' => 'Studio Environment Card Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_sub', array( 'default' => 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_personal_sub', array( 'label' => 'Studio Environment Description', 'section' => 'studio_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_personal_img', array( 'default' => 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_personal_img', array( 'label' => 'Studio Photo URL (16:11 Aspect)', 'section' => 'studio_about_section', 'type' => 'url' ) );

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

    // Footer & Signature Section
    $wp_customize->add_section( 'studio_footer_section', array(
        'title' => esc_html__( 'Footer, Signature & Socials', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_footer_greeting', array( 'default' => 'Thanks for being here.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_footer_greeting', array( 'label' => 'Footer Greeting', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_footer_tagline', array( 'default' => 'Let’s build something thoughtful.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_footer_tagline', array( 'label' => 'Footer Tagline', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_signature_name', array( 'default' => 'Kausar.Build', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_signature_name', array( 'label' => 'Signature Name', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_copyright_text', array( 'default' => '© 2026 Kausar.Build. All Rights Reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_copyright_text', array( 'label' => 'Copyright Text', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_social_email', array( 'default' => 'your@email.com', 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'studio_social_email', array( 'label' => 'Contact Email', 'section' => 'studio_footer_section', 'type' => 'email' ) );

    $wp_customize->add_setting( 'studio_social_instagram', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_instagram', array( 'label' => 'Instagram URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_linkedin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_linkedin', array( 'label' => 'LinkedIn URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_twitter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_twitter', array( 'label' => 'X / Twitter URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_github', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_github', array( 'label' => 'GitHub URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );
}
add_action( 'customize_register', 'studio_build_customize_register' );
