<?php
/**
 * Image Resolution and Helper Functions for Studio Build Theme
 *
 * Ensures every image can be replaced from WordPress (Page Meta, Featured Images,
 * or Customizer Theme Mods) while falling back to the exact default assets.
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Retrieve the resolved image URL for a given theme image key.
 *
 * Resolution order:
 * 1. Front page post meta (_$key) - when set on the front page in Pages > Edit.
 * 2. Theme modification (get_theme_mod( $key )) - when set in Appearance > Customize.
 * 3. Fallback default URL.
 *
 * Handles both attachment IDs (integers) and direct URLs (strings).
 *
 * @param string $key               Setting key without leading underscore (e.g. 'studio_hero_image').
 * @param string $default_fallback  Default image URL to use if not replaced.
 * @return string The resolved absolute image URL.
 */
function studio_build_get_image_src( $key, $default_fallback = '' ) {
    // 1. Check front page post meta
    $front_id = get_option( 'page_on_front' );
    if ( ! $front_id && ( is_front_page() || is_home() ) ) {
        $front_id = get_the_ID();
    }

    if ( $front_id ) {
        $meta_val = get_post_meta( $front_id, '_' . $key, true );
        if ( ! empty( $meta_val ) ) {
            if ( is_numeric( $meta_val ) ) {
                $src = wp_get_attachment_image_url( (int) $meta_val, 'full' );
                if ( ! empty( $src ) ) {
                    return $src;
                }
            } else {
                return $meta_val;
            }
        }
    }

    // 2. Check Customizer theme_mod
    $theme_mod = get_theme_mod( $key );
    if ( ! empty( $theme_mod ) ) {
        if ( is_numeric( $theme_mod ) ) {
            $src = wp_get_attachment_image_url( (int) $theme_mod, 'full' );
            if ( ! empty( $src ) ) {
                return $src;
            }
        } else {
            return $theme_mod;
        }
    }

    // 3. Fallback to default asset
    return $default_fallback;
}

/**
 * Sanitize image URL or attachment ID.
 *
 * @param mixed $input URL string or attachment ID.
 * @return string
 */
function studio_build_sanitize_image( $input ) {
    if ( is_numeric( $input ) ) {
        return (string) absint( $input );
    }
    return esc_url_raw( $input );
}
