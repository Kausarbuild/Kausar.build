<?php
/**
 * Elementor Widget: Studio Words & Testimonials
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

class Studio_Testimonials_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_testimonials';
    }

    public function get_title() {
        return esc_html__( 'Studio Testimonials Carousel', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'testimonial', 'quote', 'review', 'words', 'client' );
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
                'default' => '// good words',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'       => esc_html__( 'Section Headline', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => "some good words from people I've worked with",
                'label_block' => true,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_list',
            array(
                'label' => esc_html__( 'Testimonials Items', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'quote',
            array(
                'label'       => esc_html__( 'Client Quote', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'A thoughtful placeholder for a real client testimonial.',
                'rows'        => 3,
            )
        );

        $repeater->add_control(
            'author',
            array(
                'label'   => esc_html__( 'Client Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Alex Rivera',
            )
        );

        $repeater->add_control(
            'role',
            array(
                'label'   => esc_html__( 'Role / Position', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Design Director',
            )
        );

        $repeater->add_control(
            'company',
            array(
                'label'   => esc_html__( 'Company', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Stripe',
            )
        );

        $repeater->add_control(
            'avatar',
            array(
                'label'   => esc_html__( 'Client Avatar Photo', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/testimonial-avatar.jpg',
                ),
            )
        );

        $this->add_control(
            'testimonials',
            array(
                'label'       => esc_html__( 'Testimonials', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'quote'   => 'A thoughtful placeholder for a real client testimonial.',
                        'author'  => 'Client Name',
                        'role'    => 'Role / Position',
                        'company' => 'Company',
                    ),
                    array(
                        'quote'   => 'Working with Kausar felt effortless. The level of craftsmanship and attention to micro-interactions set a new standard for our web experience.',
                        'author'  => 'Alex Rivera',
                        'role'    => 'Design Director',
                        'company' => 'Stripe',
                    ),
                    array(
                        'quote'   => 'Delivered our flagship web application ahead of schedule with immaculate code quality and unmatched visual finesse.',
                        'author'  => 'Marcus Reid',
                        'role'    => 'Co-founder',
                        'company' => 'Orion Labs',
                    ),
                    array(
                        'quote'   => 'Kausar has an extraordinary eye for UI refinement. The resulting product feels crisp, responsive, and thoughtfully assembled in every view.',
                        'author'  => 'Sarah Chen',
                        'role'    => 'VP of Product',
                        'company' => 'Linear',
                    ),
                    array(
                        'quote'   => 'Rarely do you find someone who effortlessly bridges high-end visual aesthetics with clean, bulletproof engineering. Truly exceptional execution.',
                        'author'  => 'Elena Rostova',
                        'role'    => 'Creative Director',
                        'company' => 'Studio Monolith',
                    ),
                    array(
                        'quote'   => 'Our conversion metrics jumped noticeably following Kausar’s website rebuild. The clarity of typography and hierarchy makes all the difference.',
                        'author'  => 'David Vance',
                        'role'    => 'Head of Growth',
                        'company' => 'Craft Commerce',
                    ),
                    array(
                        'quote'   => 'From initial layout prototypes to the final responsive delivery, working together was seamless and fast. An indispensable design partner.',
                        'author'  => 'Maya Lin',
                        'role'    => 'Founder & CEO',
                        'company' => 'Nori Tech',
                    ),
                ),
                'title_field' => '{{{ author }}} ({{{ company }}})',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            array(
                'label' => esc_html__( 'Accents & Colors', 'studio-build' ),
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
        $section_tag  = ! empty( $settings['section_tag'] ) ? $settings['section_tag'] : '// good words';
        $section_title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : "some good words from people I've worked with";
        $accent_color = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';
        $items        = ! empty( $settings['testimonials'] ) ? $settings['testimonials'] : array();
        ?>
        <section id="testimonials" class="space-y-8 scroll-mt-24">
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

            <!-- Card -->
            <div class="bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-10 lg:p-12 shadow-soft relative overflow-hidden testimonial-container">
                <div class="absolute inset-0 bg-grid-dots opacity-30 pointer-events-none"></div>

                <?php foreach ( $items as $idx => $item ) :
                    $is_first = ( 0 === $idx );
                    $quote    = ! empty( $item['quote'] ) ? $item['quote'] : '';
                    $author   = ! empty( $item['author'] ) ? $item['author'] : 'Client Name';
                    $role     = ! empty( $item['role'] ) ? $item['role'] : '';
                    $company  = ! empty( $item['company'] ) ? $item['company'] : '';
                    $avatar_url = ! empty( $item['avatar']['url'] )
                        ? $item['avatar']['url']
                        : get_template_directory_uri() . '/assets/images/testimonial-avatar.jpg';
                    $sub = trim( $role . ( ( $role && $company ) ? ', ' : '' ) . $company );
                ?>
                    <div class="testimonial-slide <?php echo $is_first ? '' : 'hidden'; ?> grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                        <!-- Left: Stacked polaroids avatar -->
                        <div class="md:col-span-4 flex items-center justify-center">
                            <div class="relative w-36 h-36 sm:w-44 sm:h-44 select-none">
                                <div class="absolute inset-0 bg-neutral-100 rounded-2xl rotate-6 border border-neutral-200 shadow-2xs"></div>
                                <div class="absolute inset-0 bg-neutral-200 rounded-2xl -rotate-4 border border-neutral-200 shadow-xs"></div>
                                <div class="absolute inset-0 rounded-2xl overflow-hidden shadow-md border-3 border-white">
                                    <img
                                        src="<?php echo esc_url( $avatar_url ); ?>"
                                        alt="<?php echo esc_attr( $author ); ?>"
                                        class="w-full h-full object-cover"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Right: Quote & Author -->
                        <div class="md:col-span-8 space-y-5">
                            <span class="text-5xl font-serif font-black leading-none block select-none -mb-3" style="color: <?php echo esc_attr( $accent_color ); ?>;">
                                “
                            </span>

                            <p class="text-base sm:text-lg lg:text-xl text-neutral-800 font-medium leading-relaxed">
                                <?php echo esc_html( $quote ); ?>
                            </p>

                            <div class="pt-3 flex flex-wrap sm:flex-nowrap items-center justify-between gap-3 border-t border-neutral-100">
                                <div class="min-w-0 flex-1">
                                    <p class="font-display font-bold text-neutral-900 text-sm sm:text-base truncate">
                                        <?php echo esc_html( $author ); ?>
                                    </p>
                                    <?php if ( ! empty( $sub ) ) : ?>
                                        <p class="text-neutral-500 text-xs sm:text-sm font-mono truncate">
                                            <?php echo esc_html( $sub ); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <!-- Slider Arrow Controls -->
                                <div class="flex items-center gap-2 shrink-0">
                                    <button
                                        type="button"
                                        class="btn-testimonial-prev w-9 h-9 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-neutral-600 hover:text-neutral-900 transition-colors shadow-2xs focus:outline-none"
                                        aria-label="Previous testimonial"
                                    >
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        class="btn-testimonial-next w-9 h-9 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-neutral-600 hover:text-neutral-900 transition-colors shadow-2xs focus:outline-none"
                                        aria-label="Next testimonial"
                                    >
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}
