<?php
/**
 * Elementor Integration Manager
 *
 * Registers custom Elementor category and widgets.
 *
 * @package Studio_Build
 */

namespace StudioBuild\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Manager {

    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        // Register custom category
        add_action( 'elementor/elements/categories_registered', array( $this, 'register_category' ) );

        // Register custom widgets
        add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );

        // Enqueue preview styles for Elementor editor
        add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_frontend_styles' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'enqueue_preview_styles' ) );
        add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'enqueue_editor_scripts' ) );
    }

    /**
     * Register Studio Build Elementor category
     *
     * @param \Elementor\Elements_Manager $elements_manager
     */
    public function register_category( $elements_manager ) {
        $elements_manager->add_category(
            'studio-build',
            array(
                'title' => esc_html__( 'Studio Portfolio (Editable)', 'studio-build' ),
                'icon'  => 'fa fa-palette',
            )
        );
    }

    /**
     * Register all custom widgets
     *
     * @param \Elementor\Widgets_Manager $widgets_manager
     */
    public function register_widgets( $widgets_manager ) {
        $widgets = array(
            'class-widget-hero.php'         => 'StudioBuild\Elementor\Widgets\Studio_Hero_Widget',
            'class-widget-about.php'        => 'StudioBuild\Elementor\Widgets\Studio_About_Widget',
            'class-widget-projects.php'     => 'StudioBuild\Elementor\Widgets\Studio_Projects_Widget',
            'class-widget-services.php'     => 'StudioBuild\Elementor\Widgets\Studio_Services_Widget',
            'class-widget-process.php'      => 'StudioBuild\Elementor\Widgets\Studio_Process_Widget',
            'class-widget-testimonials.php' => 'StudioBuild\Elementor\Widgets\Studio_Testimonials_Widget',
            'class-widget-booking.php'      => 'StudioBuild\Elementor\Widgets\Studio_Booking_Widget',
            'class-widget-header.php'       => 'StudioBuild\Elementor\Widgets\Studio_Header_Widget',
            'class-widget-footer.php'       => 'StudioBuild\Elementor\Widgets\Studio_Footer_Widget',
            'class-widget-cv-modal.php'     => 'StudioBuild\Elementor\Widgets\Studio_CV_Modal_Widget',
        );

        $widgets_dir = get_template_directory() . '/inc/elementor/widgets/';

        foreach ( $widgets as $file => $class_name ) {
            $filepath = $widgets_dir . $file;
            if ( file_exists( $filepath ) ) {
                require_once $filepath;
                if ( class_exists( $class_name ) ) {
                    $widgets_manager->register( new $class_name() );
                }
            }
        }
    }

    /**
     * Frontend styles
     */
    public function enqueue_frontend_styles() {
        wp_enqueue_style( 'studio-build-style', get_stylesheet_uri(), array(), '1.0.0' );
    }

    /**
     * Preview styles inside Elementor editor iframe
     */
    public function enqueue_preview_styles() {
        wp_enqueue_style( 'studio-google-fonts', 'https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap', array(), null );
        wp_enqueue_script( 'tailwind-play-cdn', 'https://cdn.tailwindcss.com', array(), null, false );
    }

    /**
     * Editor scripts
     */
    public function enqueue_editor_scripts() {
        // Scripts if needed in editor panel
    }
}
