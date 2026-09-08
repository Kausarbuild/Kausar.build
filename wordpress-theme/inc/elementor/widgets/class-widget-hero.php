<?php
/**
 * Elementor Widget: Studio Hero & Availability Pass
 *
 * @package Studio_Build
 */

namespace StudioBuild\Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Studio_Hero_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_hero';
    }

    public function get_title() {
        return esc_html__( 'Studio Hero & Lanyard Pass', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'hero', 'header', 'avatar', 'pass', 'lanyard', 'status' );
    }

    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Hero Content & Copy', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'status_badge',
            array(
                'label'       => esc_html__( 'Status Badge Text', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Available for selected projects', 'studio-build' ),
                'label_block' => true,
            )
        );

        $this->add_control(
            'is_available',
            array(
                'label'        => esc_html__( 'Show Pulsing Live Dot', 'studio-build' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'studio-build' ),
                'label_off'    => esc_html__( 'Hide', 'studio-build' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            )
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'greeting_word',
            array(
                'label'       => esc_html__( 'Word', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Hello',
                'label_block' => true,
            )
        );

        $this->add_control(
            'greeting_words',
            array(
                'label'       => esc_html__( 'Animated Greeting Cycler Words', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array( 'greeting_word' => 'Hello' ),
                    array( 'greeting_word' => 'Bonjour' ),
                    array( 'greeting_word' => 'Hola' ),
                    array( 'greeting_word' => 'Ciao' ),
                    array( 'greeting_word' => 'Namaste' ),
                ),
                'title_field' => '{{{ greeting_word }}}',
            )
        );

        $this->add_control(
            'profile_name',
            array(
                'label'   => esc_html__( 'Profile Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar',
            )
        );

        $this->add_control(
            'hero_headline',
            array(
                'label'       => esc_html__( 'Hero Headline Subtitle', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'I Turn Ideas Into Websites.', 'studio-build' ),
                'label_block' => true,
            )
        );

        $this->add_control(
            'hero_description',
            array(
                'label'       => esc_html__( 'Bio / Intro Description', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => esc_html__( 'I design and build websites with a focus on great design, clean work, and a smooth experience. Simple, thoughtful, and made to last. Open for projects ↓', 'studio-build' ),
            )
        );

        $this->add_control(
            'cv_button_text',
            array(
                'label'   => esc_html__( 'CV Button Label', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__( 'Download CV', 'studio-build' ),
            )
        );

        $this->add_control(
            'cv_button_url',
            array(
                'label'   => esc_html__( 'CV Button Link / URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array(
                    'url' => '#cv',
                ),
            )
        );

        $this->add_control(
            'connect_button_text',
            array(
                'label'   => esc_html__( 'CTA Button Label', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__( "Let's connect", 'studio-build' ),
            )
        );

        $this->add_control(
            'connect_button_url',
            array(
                'label'   => esc_html__( 'CTA Button Link / URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array(
                    'url' => '#book',
                ),
            )
        );

        $this->end_controls_section();

        // 3D Lanyard Card Section
        $this->start_controls_section(
            'section_lanyard',
            array(
                'label' => esc_html__( 'Hanging Lanyard Pass Card', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'hero_image',
            array(
                'label'   => esc_html__( 'Pass Portrait Photo', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/hero-avatar.jpg',
                ),
            )
        );

        $this->add_control(
            'badge_name',
            array(
                'label'   => esc_html__( 'Pass Badge Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'KAUSAR',
            )
        );

        $this->add_control(
            'badge_role',
            array(
                'label'   => esc_html__( 'Pass Role / Title', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'DESIGN + DEVELOPMENT',
            )
        );

        $this->add_control(
            'badge_pass_id',
            array(
                'label'   => esc_html__( 'Pass ID Code', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'BUILD #01',
            )
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'section_style',
            array(
                'label' => esc_html__( 'Accent & Colors', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'accent_color',
            array(
                'label'   => esc_html__( 'Accent Dot / Tag Color', 'studio-build' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '#E8590C',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $status_badge     = ! empty( $settings['status_badge'] ) ? $settings['status_badge'] : 'Available for selected projects';
        $is_available     = 'yes' === $settings['is_available'];
        $profile_name     = ! empty( $settings['profile_name'] ) ? $settings['profile_name'] : 'Kausar';
        $hero_headline    = ! empty( $settings['hero_headline'] ) ? $settings['hero_headline'] : 'I Turn Ideas Into Websites.';
        $hero_description = ! empty( $settings['hero_description'] ) ? $settings['hero_description'] : '';
        $cv_text          = ! empty( $settings['cv_button_text'] ) ? $settings['cv_button_text'] : 'Download CV';
        $default_cv_file  = get_template_directory_uri() . '/assets/docs/kausar-cv.pdf';
        $cv_url           = ! empty( $settings['cv_button_url']['url'] ) ? $settings['cv_button_url']['url'] : $default_cv_file;
        if ( empty( $cv_url ) || $cv_url === '#cv' ) {
            $cv_url = $default_cv_file;
        }
        $connect_text     = ! empty( $settings['connect_button_text'] ) ? $settings['connect_button_text'] : "Let's connect";
        $connect_url      = ! empty( $settings['connect_button_url']['url'] ) ? $settings['connect_button_url']['url'] : '#book';
        $badge_name       = ! empty( $settings['badge_name'] ) ? $settings['badge_name'] : 'KAUSAR';
        $badge_role       = ! empty( $settings['badge_role'] ) ? $settings['badge_role'] : 'DESIGN + DEVELOPMENT';
        $badge_pass_id    = ! empty( $settings['badge_pass_id'] ) ? $settings['badge_pass_id'] : 'BUILD #01';
        $accent_color     = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';

        $image_url = ! empty( $settings['hero_image']['url'] )
            ? $settings['hero_image']['url']
            : get_template_directory_uri() . '/assets/images/hero-avatar.jpg';

        $words_list = array();
        if ( ! empty( $settings['greeting_words'] ) && is_array( $settings['greeting_words'] ) ) {
            foreach ( $settings['greeting_words'] as $w ) {
                if ( ! empty( $w['greeting_word'] ) ) {
                    $words_list[] = esc_attr( $w['greeting_word'] );
                }
            }
        }
        $words_data = ! empty( $words_list ) ? implode( ',', $words_list ) : 'Hello,Bonjour,Hola,Ciao,Namaste';
        ?>
        <section class="relative pt-6 sm:pt-12 scroll-mt-24">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Left Column: Copy & Actions -->
                <div class="order-2 md:order-1 md:col-span-7 lg:col-span-8 space-y-6">
                    <!-- Status Badge -->
                    <?php if ( ! empty( $status_badge ) ) : ?>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-mono tracking-tight shadow-2xs">
                            <?php if ( $is_available ) : ?>
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <?php endif; ?>
                            <span><?php echo esc_html( $status_badge ); ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Headline Cluster -->
                    <div class="space-y-1.5">
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-display font-extrabold tracking-tight text-neutral-900 leading-[1.14]">
                            <span class="inline-block relative overflow-hidden align-bottom py-1 -my-1">
                                <span id="hero-greeting-cycler" data-words="<?php echo esc_attr( $words_data ); ?>" class="inline-block text-neutral-900 transition-all duration-300">
                                    <?php echo ! empty( $words_list[0] ) ? esc_html( $words_list[0] ) : 'Hello'; ?>
                                </span>
                            </span>
                            <span class="text-neutral-900">, I’m <?php echo esc_html( $profile_name ); ?>.</span>
                        </h1>
                        <p class="text-xl sm:text-3xl lg:text-4xl font-display font-semibold text-neutral-400 tracking-tight leading-snug">
                            <?php echo esc_html( $hero_headline ); ?>
                        </p>
                    </div>

                    <!-- Description -->
                    <?php if ( ! empty( $hero_description ) ) : ?>
                        <p class="text-neutral-600 text-sm sm:text-base lg:text-lg leading-relaxed max-w-xl font-normal">
                            <?php echo esc_html( $hero_description ); ?>
                        </p>
                    <?php endif; ?>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <?php if ( ! empty( $cv_text ) ) : ?>
                            <a
                                id="btn-download-cv"
                                href="<?php echo esc_url( $cv_url ); ?>"
                                download="Kausar-CV.pdf"
                                class="btn-download-cv inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-neutral-300 text-neutral-800 text-xs sm:text-sm font-medium hover:border-neutral-400 hover:bg-neutral-50 transition-all shadow-xs cursor-pointer"
                            >
                                <svg class="w-4 h-4 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span><?php echo esc_html( $cv_text ); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $connect_text ) ) : ?>
                            <a
                                href="<?php echo esc_url( $connect_url ); ?>"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-xs sm:text-sm font-medium hover:bg-neutral-800 transition-all shadow-sm"
                            >
                                <span class="w-2 h-2 rounded-full" style="background-color: <?php echo esc_attr( $accent_color ); ?>;"></span>
                                <span><?php echo esc_html( $connect_text ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right Column: Lanyard Badge Card -->
                <div class="order-1 md:order-2 md:col-span-5 lg:col-span-4 flex justify-center md:justify-end select-none pt-12 sm:pt-16 md:pt-0 relative overflow-visible">
                    <div id="hero-lanyard-wrapper" class="relative w-52 sm:w-60 flex flex-col items-center cursor-grab active:cursor-grabbing transition-transform duration-150 ease-out">
                        <!-- Strap going up -->
                        <div class="absolute -top-36 w-12 h-36 lanyard-strap rounded-b shadow-inner z-10 opacity-95">
                            <div class="w-full h-full bg-gradient-to-b from-transparent via-transparent to-black/30"></div>
                        </div>

                        <!-- Clip Hardware -->
                        <div class="absolute -top-7 w-14 h-7 bg-neutral-800 rounded-t-md flex items-center justify-center z-20 border-b border-neutral-700 shadow-md">
                            <div class="w-7 h-2 bg-neutral-400 rounded-xs"></div>
                        </div>
                        <div class="absolute -top-2.5 w-9 h-3.5 bg-neutral-300 rounded-xs z-20 shadow-sm border border-neutral-400"></div>

                        <!-- Badge Frame -->
                        <div class="w-full bg-white rounded-3xl p-2.5 shadow-2xl border border-neutral-200/90 relative z-20 lanyard-card">
                            <div class="w-10 h-1.5 bg-neutral-900 mx-auto rounded-full mb-2 shadow-inner"></div>

                            <div class="w-full aspect-[4/5] rounded-2xl overflow-hidden bg-neutral-900 relative shadow-md flex flex-col justify-between">
                                <img
                                    src="<?php echo esc_url( $image_url ); ?>"
                                    alt="<?php echo esc_attr( $badge_name ); ?>"
                                    class="w-full h-full object-cover pointer-events-none"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-neutral-950/80 via-transparent to-transparent flex flex-col justify-end p-3.5">
                                    <div class="flex items-end justify-between">
                                        <div class="space-y-0.5">
                                            <p class="font-display font-extrabold text-white text-base tracking-wider leading-none">
                                                <?php echo esc_html( $badge_name ); ?>
                                            </p>
                                            <p class="font-mono text-[9px] text-neutral-300 tracking-wider">
                                                <?php echo esc_html( $badge_role ); ?>
                                            </p>
                                        </div>
                                        <span class="font-mono text-[9px] text-neutral-400 bg-neutral-800/80 px-1.5 py-0.5 rounded border border-neutral-700">
                                            <?php echo esc_html( $badge_pass_id ); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2.5 flex items-center justify-between px-1">
                                <span class="font-mono text-[9px] text-neutral-400 tracking-wider uppercase">BUILD STUDIO</span>
                                <div class="flex gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-neutral-300"></span>
                                    <span class="w-1.5 h-1.5 rounded-full" style="background-color: <?php echo esc_attr( $accent_color ); ?>;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
