<?php
/**
 * Native Meta Boxes & Image Fields for Studio Build Portfolio
 *
 * Provides dedicated, visual WordPress Media Library pickers for:
 * - Homepage section images (Hero lanyard, About bento portrait, Music cover, Workstation rig, Profile avatar, Booking portrait, Wax seal, Signature)
 * - Project artwork images
 * - Testimonial client avatars
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_add_meta_boxes() {
    // 1. Homepage Images Meta Box (available on all pages, prominently on front page)
    add_meta_box(
        'studio_homepage_images',
        esc_html__( '🖼️ Website Section Images (WordPress Media Library)', 'studio-build' ),
        'studio_build_render_homepage_images_metabox',
        'page',
        'normal',
        'high'
    );

    // 2. Project Metadata & Artwork
    add_meta_box(
        'studio_project_details',
        esc_html__( 'Project Details & Artwork', 'studio-build' ),
        'studio_build_render_project_metabox',
        'portfolio_project',
        'normal',
        'high'
    );

    // 3. Testimonial Author & Avatar
    add_meta_box(
        'studio_testimonial_details',
        esc_html__( 'Author Info & Avatar', 'studio-build' ),
        'studio_build_render_testimonial_metabox',
        'client_testimonial',
        'normal',
        'high'
    );

    // 4. Booking Consultation Options
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

/**
 * Render Front Page / Homepage Images Meta Box
 */
function studio_build_render_homepage_images_metabox( $post ) {
    wp_nonce_field( 'studio_save_homepage_images', 'studio_homepage_images_nonce' );

    $fields = array(
        'studio_hero_image' => array(
            'title'       => __( 'Hero Lanyard Badge Photo', 'studio-build' ),
            'badge'       => '4:5 Aspect',
            'desc'        => __( 'Photo displayed on the physical hanging lanyard ID pass in the Hero section.', 'studio-build' ),
            'aspect'      => 'aspect-4-5',
            'default'     => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        ),
        'studio_about_portrait' => array(
            'title'       => __( 'About Bento Tall Portrait', 'studio-build' ),
            'badge'       => '4:5 Aspect',
            'desc'        => __( 'Left-hand tall vertical portrait photo in the About Me Bento Grid.', 'studio-build' ),
            'aspect'      => 'aspect-4-5',
            'default'     => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80',
        ),
        'studio_music_cover' => array(
            'title'       => __( 'Music Player Album Cover', 'studio-build' ),
            'badge'       => '1:1 Square',
            'desc'        => __( 'Album artwork displayed on the Spotify music player widget in the Bento Grid.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80',
        ),
        'studio_personal_img' => array(
            'title'       => __( 'Studio Workstation Rig Photo', 'studio-build' ),
            'badge'       => '1:1 Square',
            'desc'        => __( 'Workspace/hardware photo in the Studio Setup card in the Bento Grid.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80',
        ),
        'studio_profile_avatar' => array(
            'title'       => __( 'Profile Verification Avatar', 'studio-build' ),
            'badge'       => '1:1 Circle',
            'desc'        => __( 'Circular portrait avatar inside the direct collaboration and retainer card.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=400&q=80',
        ),
        'studio_booking_portrait' => array(
            'title'       => __( 'Booking Consultation Portrait', 'studio-build' ),
            'badge'       => '4:5 Aspect',
            'desc'        => __( 'Portrait photo displayed on the left card in the Consultation Booking wizard.', 'studio-build' ),
            'aspect'      => 'aspect-4-5',
            'default'     => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        ),
        'studio_project_1_image' => array(
            'title'       => __( 'Project 1 Artwork (One Job)', 'studio-build' ),
            'badge'       => '1:1 Square',
            'desc'        => __( 'Thumbnail image for Project 1 in the 2x2 design archive.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => get_template_directory_uri() . '/assets/projects/project-1-one-job.svg',
        ),
        'studio_project_2_image' => array(
            'title'       => __( 'Project 2 Artwork (Trust Business)', 'studio-build' ),
            'badge'       => '1:1 Square',
            'desc'        => __( 'Thumbnail image for Project 2 in the 2x2 design archive.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => get_template_directory_uri() . '/assets/projects/project-2-trust-business.svg',
        ),
        'studio_project_3_image' => array(
            'title'       => __( 'Project 3 Artwork (Convert Dashboard)', 'studio-build' ),
            'badge'       => '1:1 Square',
            'desc'        => __( 'Thumbnail image for Project 3 in the 2x2 design archive.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => get_template_directory_uri() . '/assets/projects/project-3-convert-dashboard.svg',
        ),
        'studio_project_4_image' => array(
            'title'       => __( 'Project 4 Artwork (Premium Perform)', 'studio-build' ),
            'badge'       => '1:1 Square',
            'desc'        => __( 'Thumbnail image for Project 4 in the 2x2 design archive.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => get_template_directory_uri() . '/assets/projects/project-4-premium-perform.svg',
        ),
        'studio_wax_seal_image' => array(
            'title'       => __( 'Footer Wax Seal Emblem (Optional)', 'studio-build' ),
            'badge'       => '1:1 Circle',
            'desc'        => __( 'Upload a custom emblem or logo stamp to replace the default KB wax seal badge.', 'studio-build' ),
            'aspect'      => 'aspect-square',
            'default'     => '',
        ),
        'studio_signature_image' => array(
            'title'       => __( 'Footer Signature Graphic (Optional)', 'studio-build' ),
            'badge'       => 'Transparent PNG',
            'desc'        => __( 'Upload an image of your signature to replace the cursive typography in the footer.', 'studio-build' ),
            'aspect'      => 'aspect-banner',
            'default'     => '',
        ),
    );
    ?>
    <p style="margin-top:0; color:#475569; font-size:13px;">
        <?php esc_html_e( 'Select or replace any website image using your WordPress Media Library. The design, cropping, and aspect ratios are automatically preserved.', 'studio-build' ); ?>
    </p>

    <div class="studio-admin-images-grid">
        <?php foreach ( $fields as $key => $field ) :
            $current_val = get_post_meta( $post->ID, '_' . $key, true );
            if ( empty( $current_val ) ) {
                $current_val = get_theme_mod( $key, $field['default'] );
            }
            $display_src = $current_val;
            if ( is_numeric( $display_src ) ) {
                $display_src = wp_get_attachment_image_url( (int) $display_src, 'full' );
            }
            if ( empty( $display_src ) ) {
                $display_src = $field['default'];
            }
        ?>
            <div class="studio-admin-image-card studio-media-field-wrapper">
                <div class="studio-admin-image-card-header">
                    <div class="studio-admin-image-title">
                        <span><?php echo esc_html( $field['title'] ); ?></span>
                        <span class="studio-admin-image-badge"><?php echo esc_html( $field['badge'] ); ?></span>
                    </div>
                    <p class="studio-admin-image-desc"><?php echo esc_html( $field['desc'] ); ?></p>
                </div>

                <div class="studio-media-preview-container <?php echo esc_attr( $field['aspect'] ); ?>">
                    <div class="studio-media-preview <?php echo empty( $display_src ) ? 'is-empty' : ''; ?>">
                        <?php if ( ! empty( $display_src ) ) : ?>
                            <img src="<?php echo esc_url( $display_src ); ?>" alt="<?php echo esc_attr( $field['title'] ); ?>" />
                        <?php else : ?>
                            <span><?php esc_html_e( 'No image set (Default design active)', 'studio-build' ); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <input
                    type="hidden"
                    class="studio-media-input"
                    name="<?php echo esc_attr( $key ); ?>"
                    value="<?php echo esc_attr( $current_val ); ?>"
                />

                <div class="studio-admin-image-actions">
                    <button
                        type="button"
                        class="button studio-media-upload-btn"
                        data-title="<?php echo esc_attr( sprintf( __( 'Select %s', 'studio-build' ), $field['title'] ) ); ?>"
                        data-button-text="<?php esc_attr_e( 'Use This Image', 'studio-build' ); ?>"
                    >
                        <span class="dashicons dashicons-admin-media" style="margin-top:4px;"></span>
                        <?php esc_html_e( 'Replace Image', 'studio-build' ); ?>
                    </button>

                    <button
                        type="button"
                        class="button studio-media-remove-btn"
                        data-default="<?php echo esc_attr( $field['default'] ); ?>"
                        title="<?php esc_attr_e( 'Reset to theme default image', 'studio-build' ); ?>"
                    >
                        <?php esc_html_e( 'Reset Default', 'studio-build' ); ?>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

/**
 * Render Project Details & Artwork Meta Box
 */
function studio_build_render_project_metabox( $post ) {
    wp_nonce_field( 'studio_save_project_meta', 'studio_project_meta_nonce' );

    $category = get_post_meta( $post->ID, '_project_category', true );
    $year     = get_post_meta( $post->ID, '_project_year', true );
    $tag      = get_post_meta( $post->ID, '_project_tag', true );
    $url      = get_post_meta( $post->ID, '_project_url', true );
    $img      = get_post_meta( $post->ID, '_project_image', true );

    if ( empty( $img ) ) {
        $thumb_id = get_post_thumbnail_id( $post->ID );
        if ( $thumb_id ) {
            $img = wp_get_attachment_image_url( $thumb_id, 'full' );
        }
    }
    $display_src = $img;
    if ( is_numeric( $display_src ) ) {
        $display_src = wp_get_attachment_image_url( (int) $display_src, 'full' );
    }
    ?>
    <div style="margin-bottom: 20px;" class="studio-media-field-wrapper">
        <label><strong><?php esc_html_e( 'Project Artwork / Cover Image (1:1 Aspect Ratio):', 'studio-build' ); ?></strong></label>
        <p style="margin: 4px 0 10px 0; color: #64748b; font-size: 12px;">
            <?php esc_html_e( 'Select or upload a project thumbnail from the WordPress Media Library. This image is displayed in the 2x2 design archive grid.', 'studio-build' ); ?>
        </p>
        <div class="studio-single-media-box">
            <div class="studio-media-preview-container aspect-square" style="width: 160px; height: 160px;">
                <div class="studio-media-preview <?php echo empty( $display_src ) ? 'is-empty' : ''; ?>">
                    <?php if ( ! empty( $display_src ) ) : ?>
                        <img src="<?php echo esc_url( $display_src ); ?>" alt="<?php the_title_attribute(); ?>" />
                    <?php else : ?>
                        <span style="padding:10px; text-align:center;"><?php esc_html_e( 'Using default SVG artwork', 'studio-build' ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <input
                    type="hidden"
                    class="studio-media-input"
                    name="project_image"
                    value="<?php echo esc_attr( $img ); ?>"
                />
                <button
                    type="button"
                    class="button studio-media-upload-btn"
                    data-title="<?php esc_attr_e( 'Select Project Artwork', 'studio-build' ); ?>"
                    data-button-text="<?php esc_attr_e( 'Use As Project Artwork', 'studio-build' ); ?>"
                >
                    <span class="dashicons dashicons-admin-media" style="margin-top:4px;"></span>
                    <?php esc_html_e( 'Select / Replace Project Image', 'studio-build' ); ?>
                </button>
                <button
                    type="button"
                    class="button studio-media-remove-btn"
                    data-default=""
                    <?php echo empty( $img ) ? 'style="display:none;"' : ''; ?>
                >
                    <?php esc_html_e( 'Remove Custom Image', 'studio-build' ); ?>
                </button>
            </div>
        </div>
    </div>

    <hr style="border:0; border-top:1px solid #e2e8f0; margin:16px 0;">

    <p>
        <label><strong><?php esc_html_e( 'Category Badge (e.g. Web Design, Brand Identity):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_category" value="<?php echo esc_attr( $category ); ?>" style="width:100%; max-width:500px;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Year (e.g. 2026):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%; max-width:200px;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Tech Stack Tag (e.g. Web App, Figma / React):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_tag" value="<?php echo esc_attr( $tag ); ?>" style="width:100%; max-width:500px;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'External Project URL:', 'studio-build' ); ?></strong></label><br>
        <input type="url" name="project_url" value="<?php echo esc_attr( $url ); ?>" style="width:100%; max-width:500px;">
    </p>
    <?php
}

/**
 * Render Testimonial Metadata & Avatar Meta Box
 */
function studio_build_render_testimonial_metabox( $post ) {
    wp_nonce_field( 'studio_save_testimonial_meta', 'studio_testimonial_meta_nonce' );

    $role    = get_post_meta( $post->ID, '_testimonial_role', true );
    $company = get_post_meta( $post->ID, '_testimonial_company', true );
    $avatar  = get_post_meta( $post->ID, '_testimonial_avatar', true );

    if ( empty( $avatar ) ) {
        $thumb_id = get_post_thumbnail_id( $post->ID );
        if ( $thumb_id ) {
            $avatar = wp_get_attachment_image_url( $thumb_id, 'medium' );
        }
    }
    $display_src = $avatar;
    if ( is_numeric( $display_src ) ) {
        $display_src = wp_get_attachment_image_url( (int) $display_src, 'medium' );
    }
    ?>
    <div style="margin-bottom: 20px;" class="studio-media-field-wrapper">
        <label><strong><?php esc_html_e( 'Client Avatar Photo (1:1 Square):', 'studio-build' ); ?></strong></label>
        <p style="margin: 4px 0 10px 0; color: #64748b; font-size: 12px;">
            <?php esc_html_e( 'Select or upload the client avatar displayed in the testimonials carousel.', 'studio-build' ); ?>
        </p>
        <div class="studio-single-media-box">
            <div class="studio-media-preview-container aspect-square" style="width: 120px; height: 120px; border-radius: 50%;">
                <div class="studio-media-preview <?php echo empty( $display_src ) ? 'is-empty' : ''; ?>">
                    <?php if ( ! empty( $display_src ) ) : ?>
                        <img src="<?php echo esc_url( $display_src ); ?>" alt="<?php the_title_attribute(); ?>" style="border-radius: 50%;" />
                    <?php else : ?>
                        <span style="padding:10px; text-align:center;"><?php esc_html_e( 'No avatar', 'studio-build' ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <input
                    type="hidden"
                    class="studio-media-input"
                    name="testimonial_avatar"
                    value="<?php echo esc_attr( $avatar ); ?>"
                />
                <button
                    type="button"
                    class="button studio-media-upload-btn"
                    data-title="<?php esc_attr_e( 'Select Client Avatar', 'studio-build' ); ?>"
                    data-button-text="<?php esc_attr_e( 'Use As Client Avatar', 'studio-build' ); ?>"
                >
                    <span class="dashicons dashicons-admin-media" style="margin-top:4px;"></span>
                    <?php esc_html_e( 'Select / Replace Client Avatar', 'studio-build' ); ?>
                </button>
                <button
                    type="button"
                    class="button studio-media-remove-btn"
                    data-default=""
                    <?php echo empty( $avatar ) ? 'style="display:none;"' : ''; ?>
                >
                    <?php esc_html_e( 'Remove Avatar', 'studio-build' ); ?>
                </button>
            </div>
        </div>
    </div>

    <hr style="border:0; border-top:1px solid #e2e8f0; margin:16px 0;">

    <p>
        <label><strong><?php esc_html_e( 'Client Job Title (e.g. Co-founder):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="testimonial_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%; max-width:400px;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Client Company (e.g. Orion Labs):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="testimonial_company" value="<?php echo esc_attr( $company ); ?>" style="width:100%; max-width:400px;">
    </p>
    <?php
}

/**
 * Render Booking Details Meta Box
 */
function studio_build_render_booking_metabox( $post ) {
    wp_nonce_field( 'studio_save_booking_meta', 'studio_booking_meta_nonce' );
    $price    = get_post_meta( $post->ID, '_booking_price', true );
    $duration = get_post_meta( $post->ID, '_booking_duration', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Price USD (e.g. 240 or Free):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="booking_price" value="<?php echo esc_attr( $price ); ?>" style="width:100%; max-width:200px;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Duration (e.g. 20 min or 30 min):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="booking_duration" value="<?php echo esc_attr( $duration ); ?>" style="width:100%; max-width:200px;">
    </p>
    <?php
}

/**
 * Save Post Meta Handler
 */
function studio_build_save_meta_boxes( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // 1. Save Homepage Section Images
    if ( isset( $_POST['studio_homepage_images_nonce'] ) && wp_verify_nonce( $_POST['studio_homepage_images_nonce'], 'studio_save_homepage_images' ) ) {
        $image_keys = array(
            'studio_hero_image',
            'studio_about_portrait',
            'studio_music_cover',
            'studio_personal_img',
            'studio_profile_avatar',
            'studio_booking_portrait',
            'studio_project_1_image',
            'studio_project_2_image',
            'studio_project_3_image',
            'studio_project_4_image',
            'studio_wax_seal_image',
            'studio_signature_image',
        );

        foreach ( $image_keys as $img_key ) {
            if ( isset( $_POST[ $img_key ] ) ) {
                $val = sanitize_text_field( wp_unslash( $_POST[ $img_key ] ) );
                update_post_meta( $post_id, '_' . $img_key, $val );
                // Synchronize with Theme Mod so Customizer also reflects the update
                set_theme_mod( $img_key, $val );
            }
        }
    }

    // 2. Save Project Meta & Image
    if ( isset( $_POST['studio_project_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_project_meta_nonce'], 'studio_save_project_meta' ) ) {
        if ( isset( $_POST['project_category'] ) ) update_post_meta( $post_id, '_project_category', sanitize_text_field( $_POST['project_category'] ) );
        if ( isset( $_POST['project_year'] ) ) update_post_meta( $post_id, '_project_year', sanitize_text_field( $_POST['project_year'] ) );
        if ( isset( $_POST['project_tag'] ) ) update_post_meta( $post_id, '_project_tag', sanitize_text_field( $_POST['project_tag'] ) );
        if ( isset( $_POST['project_url'] ) ) update_post_meta( $post_id, '_project_url', esc_url_raw( $_POST['project_url'] ) );
        if ( isset( $_POST['project_image'] ) ) {
            $proj_img = sanitize_text_field( wp_unslash( $_POST['project_image'] ) );
            update_post_meta( $post_id, '_project_image', $proj_img );
            if ( is_numeric( $proj_img ) ) {
                set_post_thumbnail( $post_id, (int) $proj_img );
            }
        }
    }

    // 3. Save Testimonial Meta & Avatar
    if ( isset( $_POST['studio_testimonial_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_testimonial_meta_nonce'], 'studio_save_testimonial_meta' ) ) {
        if ( isset( $_POST['testimonial_role'] ) ) update_post_meta( $post_id, '_testimonial_role', sanitize_text_field( $_POST['testimonial_role'] ) );
        if ( isset( $_POST['testimonial_company'] ) ) update_post_meta( $post_id, '_testimonial_company', sanitize_text_field( $_POST['testimonial_company'] ) );
        if ( isset( $_POST['testimonial_avatar'] ) ) {
            $avatar_img = sanitize_text_field( wp_unslash( $_POST['testimonial_avatar'] ) );
            update_post_meta( $post_id, '_testimonial_avatar', $avatar_img );
            if ( is_numeric( $avatar_img ) ) {
                set_post_thumbnail( $post_id, (int) $avatar_img );
            }
        }
    }

    // 4. Save Booking Meta
    if ( isset( $_POST['studio_booking_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_booking_meta_nonce'], 'studio_save_booking_meta' ) ) {
        if ( isset( $_POST['booking_price'] ) ) update_post_meta( $post_id, '_booking_price', sanitize_text_field( $_POST['booking_price'] ) );
        if ( isset( $_POST['booking_duration'] ) ) update_post_meta( $post_id, '_booking_duration', sanitize_text_field( $_POST['booking_duration'] ) );
    }
}
add_action( 'save_post', 'studio_build_save_meta_boxes' );
