<?php
/**
 * Elementor Widget: Studio Header Navigation
 *
 * @package Studio_Build
 */

namespace StudioBuild\Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Studio_Header_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_header';
    }

    public function get_title() {
        return esc_html__( 'Studio Header Navigation', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'header', 'nav', 'menu', 'navigation', 'navbar' );
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Navigation Bar Settings', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'site_brand',
            array(
                'label'   => esc_html__( 'Brand Text', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar.Build',
            )
        );

        $this->add_control(
            'brand_initial',
            array(
                'label'   => esc_html__( 'Brand Initial Logo', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'K',
            )
        );

        $this->add_control(
            'status_indicator',
            array(
                'label'        => esc_html__( 'Show Live Green Dot', 'studio-build' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'label',
            array(
                'label'       => esc_html__( 'Label', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'About',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'url',
            array(
                'label'   => esc_html__( 'Link URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '#about' ),
            )
        );

        $this->add_control(
            'menu_items',
            array(
                'label'       => esc_html__( 'Navigation Links', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array( 'label' => 'About', 'url' => array( 'url' => '#about' ) ),
                    array( 'label' => 'Archive', 'url' => array( 'url' => '#projects' ) ),
                    array( 'label' => 'Services', 'url' => array( 'url' => '#services' ) ),
                    array( 'label' => 'Words', 'url' => array( 'url' => '#testimonials' ) ),
                    array( 'label' => 'Process', 'url' => array( 'url' => '#process' ) ),
                    array( 'label' => 'Connect', 'url' => array( 'url' => '#book' ) ),
                ),
                'title_field' => '{{{ label }}}',
            )
        );

        $this->add_control(
            'cta_button_text',
            array(
                'label'   => esc_html__( 'CTA Button Label', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Book call',
            )
        );

        $this->add_control(
            'cta_button_url',
            array(
                'label'   => esc_html__( 'CTA Button Link', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => '#book' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings      = $this->get_settings_for_display();
        $site_brand    = ! empty( $settings['site_brand'] ) ? $settings['site_brand'] : 'Kausar.Build';
        $brand_initial = ! empty( $settings['brand_initial'] ) ? $settings['brand_initial'] : 'K';
        $show_dot      = 'yes' === $settings['status_indicator'];
        $menu_items    = ! empty( $settings['menu_items'] ) ? $settings['menu_items'] : array();
        $cta_text      = ! empty( $settings['cta_button_text'] ) ? $settings['cta_button_text'] : 'Book call';
        $cta_url       = ! empty( $settings['cta_button_url']['url'] ) ? $settings['cta_button_url']['url'] : '#book';
        ?>
        <div class="py-2 flex justify-center px-4 w-full">
            <div class="bg-white/90 backdrop-blur-md border border-neutral-200/90 rounded-full px-3 sm:px-4 py-1.5 sm:py-2 shadow-sm flex items-center justify-between gap-3 sm:gap-6 max-w-fit mx-auto transition-all">
                <!-- Brand -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 group text-left">
                    <div class="w-6 h-6 rounded-full bg-neutral-900 text-white flex items-center justify-center font-display font-bold text-xs group-hover:scale-105 transition-transform">
                        <?php echo esc_html( strtoupper( substr( $brand_initial, 0, 1 ) ) ); ?>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="font-display font-semibold text-xs sm:text-sm text-neutral-900 tracking-tight">
                            <?php echo esc_html( $site_brand ); ?>
                        </span>
                        <?php if ( $show_dot ) : ?>
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <?php endif; ?>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 text-xs font-medium text-neutral-600">
                    <?php foreach ( $menu_items as $item ) :
                        $lbl = ! empty( $item['label'] ) ? $item['label'] : '';
                        $url = ! empty( $item['url']['url'] ) ? $item['url']['url'] : '#';
                        if ( empty( $lbl ) ) continue;
                    ?>
                        <a href="<?php echo esc_url( $url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">
                            <?php echo esc_html( $lbl ); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <!-- Quick Action -->
                <?php if ( ! empty( $cta_text ) ) : ?>
                    <div class="flex items-center gap-2">
                        <a href="<?php echo esc_url( $cta_url ); ?>" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neutral-900 text-white text-xs font-medium hover:bg-neutral-800 transition-all shadow-2xs">
                            <span><?php echo esc_html( $cta_text ); ?></span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
