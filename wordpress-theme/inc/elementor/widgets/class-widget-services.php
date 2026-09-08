<?php
/**
 * Elementor Widget: Studio Services Accordion
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

class Studio_Services_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_services';
    }

    public function get_title() {
        return esc_html__( 'Studio Services Accordion', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'services', 'accordion', 'pricing', 'offerings', 'capabilities' );
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_header',
            array(
                'label' => esc_html__( 'Section Header', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'section_tag',
            array(
                'label'   => esc_html__( 'Eyebrow Tag', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '// Services i provide',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'       => esc_html__( 'Headline Title', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'I can help you with these things', 'studio-build' ),
                'label_block' => true,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_services_list',
            array(
                'label' => esc_html__( 'Services Items', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'number',
            array(
                'label'   => esc_html__( 'Index / Number', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '01',
            )
        );

        $repeater->add_control(
            'title',
            array(
                'label'       => esc_html__( 'Service Title', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Web Design',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'description',
            array(
                'label'       => esc_html__( 'Description', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Thoughtful websites with clear structure, strong typography, and responsive layouts.',
                'rows'        => 3,
            )
        );

        $repeater->add_control(
            'action_text',
            array(
                'label'   => esc_html__( 'Action Link Text', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Inquire about this service',
            )
        );

        $repeater->add_control(
            'action_url',
            array(
                'label'   => esc_html__( 'Action URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array(
                    'url' => '#book',
                ),
            )
        );

        $this->add_control(
            'services',
            array(
                'label'       => esc_html__( 'Services', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'number'      => '01',
                        'title'       => 'Web Design',
                        'description' => 'Thoughtful websites with clear structure, strong typography, and responsive layouts.',
                    ),
                    array(
                        'number'      => '02',
                        'title'       => 'UI / Product Design',
                        'description' => 'Interfaces designed around clarity, usability, and a consistent visual system.',
                    ),
                    array(
                        'number'      => '03',
                        'title'       => 'Web Development',
                        'description' => 'Clean, responsive implementation that turns designs into working websites.',
                    ),
                    array(
                        'number'      => '04',
                        'title'       => 'Design Systems',
                        'description' => 'Reusable components and visual systems that keep digital products consistent as they grow.',
                    ),
                    array(
                        'number'      => '05',
                        'title'       => 'Interaction & Motion',
                        'description' => 'Subtle interactions and motion that make a digital experience feel considered.',
                    ),
                ),
                'title_field' => '{{{ number }}} - {{{ title }}}',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            array(
                'label' => esc_html__( 'Colors & Styling', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'accent_color',
            array(
                'label'   => esc_html__( 'Accent Color', 'studio-build' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '#E8590C',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings     = $this->get_settings_for_display();
        $section_tag  = ! empty( $settings['section_tag'] ) ? $settings['section_tag'] : '// Services i provide';
        $section_title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'I can help you with these things';
        $accent_color = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';
        $services     = ! empty( $settings['services'] ) ? $settings['services'] : array();
        ?>
        <section id="services" class="space-y-8 scroll-mt-24">
            <!-- Header -->
            <div class="space-y-1">
                <?php if ( ! empty( $section_tag ) ) : ?>
                    <span class="font-mono text-xs font-semibold uppercase tracking-wider block" style="color: <?php echo esc_attr( $accent_color ); ?>;">
                        <?php echo esc_html( $section_tag ); ?>
                    </span>
                <?php endif; ?>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
                    <?php echo esc_html( $section_title ); ?>
                </h2>
            </div>

            <!-- Accordion Rows -->
            <div class="border-t border-neutral-200 divide-y divide-neutral-200/90" id="services-accordion-list">
                <?php foreach ( $services as $index => $item ) :
                    $is_open    = ( 0 === $index );
                    $num        = ! empty( $item['number'] ) ? $item['number'] : sprintf( '%02d', $index + 1 );
                    $title      = ! empty( $item['title'] ) ? $item['title'] : '';
                    $desc       = ! empty( $item['description'] ) ? $item['description'] : '';
                    $action_txt = ! empty( $item['action_text'] ) ? $item['action_text'] : 'Inquire about this service';
                    $action_url = ! empty( $item['action_url']['url'] ) ? $item['action_url']['url'] : '#book';
                ?>
                    <div class="py-5 sm:py-6 transition-colors group cursor-pointer service-accordion-row" data-service-id="<?php echo esc_attr( $index ); ?>">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 sm:gap-6 min-w-0">
                                <span class="font-mono text-xs sm:text-sm text-neutral-400 w-6 sm:w-8 shrink-0">
                                    <?php echo esc_html( $num ); ?>
                                </span>
                                <h3 class="font-display font-semibold text-neutral-900 text-sm sm:text-lg lg:text-xl group-hover:text-neutral-700 transition-colors">
                                    <?php echo esc_html( $title ); ?>
                                </h3>
                            </div>
                            <div class="w-7 h-7 rounded-full border border-neutral-200 flex items-center justify-center text-neutral-400 group-hover:border-neutral-400 transition-all duration-300 shrink-0 service-icon <?php echo $is_open ? 'rotate-45 text-neutral-900 border-neutral-900' : ''; ?>">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/><path d="M12 5v14"/>
                                </svg>
                            </div>
                        </div>

                        <div class="service-details mt-2.5 pl-9 sm:pl-14 max-w-2xl <?php echo $is_open ? '' : 'hidden'; ?>">
                            <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-normal mb-2.5">
                                <?php echo esc_html( $desc ); ?>
                            </p>
                            <a
                                href="<?php echo esc_url( $action_url ); ?>"
                                class="inline-flex items-center gap-1.5 text-xs font-mono text-neutral-900 font-medium hover:underline hover:text-orange-600 transition-colors"
                            >
                                <span><?php echo esc_html( $action_txt ); ?></span>
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}
