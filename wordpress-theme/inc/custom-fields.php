<?php
/**
 * Native Meta Boxes for Studio Build Custom Post Types
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_add_meta_boxes() {
    add_meta_box(
        'studio_project_details',
        esc_html__( 'Project Metadata', 'studio-build' ),
        'studio_build_render_project_metabox',
        'portfolio_project',
        'normal',
        'high'
    );

    add_meta_box(
        'studio_testimonial_details',
        esc_html__( 'Author Role & Company', 'studio-build' ),
        'studio_build_render_testimonial_metabox',
        'client_testimonial',
        'normal',
        'high'
    );

    add_meta_box(
        'studio_booking_details',
        esc_html__( 'Service Pricing & Duration', 'studio-build' ),
        'studio_build_render_booking_metabox',
        'booking_service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'studio_build_add_meta_boxes' );

function studio_build_render_project_metabox( $post ) {
    wp_nonce_field( 'studio_save_project_meta', 'studio_project_meta_nonce' );
    $category = get_post_meta( $post->ID, '_project_category', true );
    $year     = get_post_meta( $post->ID, '_project_year', true );
    $tag      = get_post_meta( $post->ID, '_project_tag', true );
    $url      = get_post_meta( $post->ID, '_project_url', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Category Badge (e.g. Web Design, Brand Identity):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_category" value="<?php echo esc_attr( $category ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Year (e.g. 2024):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Tech Stack Tag (e.g. Web App, Figma / React):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_tag" value="<?php echo esc_attr( $tag ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'External Project URL:', 'studio-build' ); ?></strong></label><br>
        <input type="url" name="project_url" value="<?php echo esc_attr( $url ); ?>" style="width:100%;">
    </p>
    <?php
}

function studio_build_render_testimonial_metabox( $post ) {
    wp_nonce_field( 'studio_save_testimonial_meta', 'studio_testimonial_meta_nonce' );
    $role    = get_post_meta( $post->ID, '_testimonial_role', true );
    $company = get_post_meta( $post->ID, '_testimonial_company', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Client Job Title (e.g. Co-founder):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="testimonial_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Client Company (e.g. Orion Labs):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="testimonial_company" value="<?php echo esc_attr( $company ); ?>" style="width:100%;">
    </p>
    <?php
}

function studio_build_render_booking_metabox( $post ) {
    wp_nonce_field( 'studio_save_booking_meta', 'studio_booking_meta_nonce' );
    $price    = get_post_meta( $post->ID, '_booking_price', true );
    $duration = get_post_meta( $post->ID, '_booking_duration', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Price USD (e.g. 240):', 'studio-build' ); ?></strong></label><br>
        <input type="number" name="booking_price" value="<?php echo esc_attr( $price ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Duration (e.g. 20 min):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="booking_duration" value="<?php echo esc_attr( $duration ); ?>" style="width:100%;">
    </p>
    <?php
}

function studio_build_save_meta_boxes( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if ( isset( $_POST['studio_project_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_project_meta_nonce'], 'studio_save_project_meta' ) ) {
        if ( isset( $_POST['project_category'] ) ) update_post_meta( $post_id, '_project_category', sanitize_text_field( $_POST['project_category'] ) );
        if ( isset( $_POST['project_year'] ) ) update_post_meta( $post_id, '_project_year', sanitize_text_field( $_POST['project_year'] ) );
        if ( isset( $_POST['project_tag'] ) ) update_post_meta( $post_id, '_project_tag', sanitize_text_field( $_POST['project_tag'] ) );
        if ( isset( $_POST['project_url'] ) ) update_post_meta( $post_id, '_project_url', esc_url_raw( $_POST['project_url'] ) );
    }

    if ( isset( $_POST['studio_testimonial_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_testimonial_meta_nonce'], 'studio_save_testimonial_meta' ) ) {
        if ( isset( $_POST['testimonial_role'] ) ) update_post_meta( $post_id, '_testimonial_role', sanitize_text_field( $_POST['testimonial_role'] ) );
        if ( isset( $_POST['testimonial_company'] ) ) update_post_meta( $post_id, '_testimonial_company', sanitize_text_field( $_POST['testimonial_company'] ) );
    }

    if ( isset( $_POST['studio_booking_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_booking_meta_nonce'], 'studio_save_booking_meta' ) ) {
        if ( isset( $_POST['booking_price'] ) ) update_post_meta( $post_id, '_booking_price', sanitize_text_field( $_POST['booking_price'] ) );
        if ( isset( $_POST['booking_duration'] ) ) update_post_meta( $post_id, '_booking_duration', sanitize_text_field( $_POST['booking_duration'] ) );
    }
}
add_action( 'save_post', 'studio_build_save_meta_boxes' );
