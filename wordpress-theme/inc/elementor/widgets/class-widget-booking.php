<?php
/**
 * Elementor Widget: Studio Direct Contact & Connect
 *
 * Replaces old multi-step consultation topic selection with three clear functional contact options:
 * - WhatsApp (+916002357235)
 * - Instagram (@Kausar.build)
 * - Call Me (+916002357235)
 *
 * @package Studio_Build
 */

namespace StudioBuild\Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Studio_Booking_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_booking';
    }

    public function get_title() {
        return esc_html__( 'Studio Direct Contact', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-envelope';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'booking', 'contact', 'whatsapp', 'instagram', 'call', 'connect', 'phone' );
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
                'default' => '// Connect',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'       => esc_html__( 'Section Headline', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Let’s talk',
                'label_block' => true,
            )
        );

        $this->add_control(
            'section_desc',
            array(
                'label'       => esc_html__( 'Description', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Direct communication, zero friction. Reach out directly via WhatsApp, Instagram, or give me a call.',
                'rows'        => 2,
            )
        );

        $this->end_controls_section();

        // Left Portrait & Socials
        $this->start_controls_section(
            'section_profile',
            array(
                'label' => esc_html__( 'Host Profile & Social Links', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'profile_name',
            array(
                'label'   => esc_html__( 'Host Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar',
            )
        );

        $this->add_control(
            'booking_portrait',
            array(
                'label'   => esc_html__( 'Portrait Photo', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/hero-avatar.jpg',
                ),
            )
        );

        $this->add_control(
            'social_github',
            array(
                'label'   => esc_html__( 'GitHub URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => 'https://github.com' ),
            )
        );

        $this->add_control(
            'social_linkedin',
            array(
                'label'   => esc_html__( 'LinkedIn URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => 'https://linkedin.com' ),
            )
        );

        $this->add_control(
            'social_instagram',
            array(
                'label'   => esc_html__( 'Instagram URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => 'https://instagram.com/Kausar.build' ),
            )
        );

        $this->add_control(
            'social_twitter',
            array(
                'label'   => esc_html__( 'X / Twitter URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => 'https://twitter.com' ),
            )
        );

        $this->add_control(
            'social_email',
            array(
                'label'   => esc_html__( 'Email Address', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'hello@kausar.build',
            )
        );

        $this->end_controls_section();

        // Contact Channels Section
        $this->start_controls_section(
            'section_contact_channels',
            array(
                'label' => esc_html__( 'Contact Channels', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'card_title',
            array(
                'label'   => esc_html__( 'Card Header Title', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Direct Contact',
            )
        );

        $this->add_control(
            'card_subtitle',
            array(
                'label'   => esc_html__( 'Card Header Subtitle', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Fast response · Open for collaborations & consultations',
            )
        );

        $this->add_control(
            'whatsapp_number',
            array(
                'label'   => esc_html__( 'WhatsApp Number', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '+916002357235',
            )
        );

        $this->add_control(
            'instagram_username',
            array(
                'label'   => esc_html__( 'Instagram Username', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar.build',
            )
        );

        $this->add_control(
            'phone_number',
            array(
                'label'   => esc_html__( 'Call Phone Number', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '+916002357235',
            )
        );

        $this->end_controls_section();

        // Styling Controls
        $this->start_controls_section(
            'section_style_theme',
            array(
                'label' => esc_html__( 'Accent Color', 'studio-build' ),
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
        $settings = $this->get_settings_for_display();

        $accent_color       = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';
        $section_tag        = ! empty( $settings['section_tag'] ) ? $settings['section_tag'] : '// Connect';
        $section_title      = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Let’s talk';
        $section_desc       = ! empty( $settings['section_desc'] ) ? $settings['section_desc'] : '';
        $profile_name       = ! empty( $settings['profile_name'] ) ? $settings['profile_name'] : 'Kausar';

        $portrait_url       = ! empty( $settings['booking_portrait']['url'] ) ? $settings['booking_portrait']['url'] : ( get_template_directory_uri() . '/assets/images/hero-avatar.jpg' );

        $github_url         = ! empty( $settings['social_github']['url'] ) ? $settings['social_github']['url'] : '';
        $linkedin_url       = ! empty( $settings['social_linkedin']['url'] ) ? $settings['social_linkedin']['url'] : '';
        $instagram_url      = ! empty( $settings['social_instagram']['url'] ) ? $settings['social_instagram']['url'] : 'https://instagram.com/Kausar.build';
        $twitter_url        = ! empty( $settings['social_twitter']['url'] ) ? $settings['social_twitter']['url'] : '';
        $email_val          = ! empty( $settings['social_email'] ) ? $settings['social_email'] : 'hello@kausar.build';

        $card_title         = ! empty( $settings['card_title'] ) ? $settings['card_title'] : 'Direct Contact';
        $card_subtitle      = ! empty( $settings['card_subtitle'] ) ? $settings['card_subtitle'] : 'Fast response · Open for collaborations & consultations';
        $whatsapp_number    = ! empty( $settings['whatsapp_number'] ) ? $settings['whatsapp_number'] : '+916002357235';
        $instagram_username = ! empty( $settings['instagram_username'] ) ? $settings['instagram_username'] : 'Kausar.build';
        $phone_number       = ! empty( $settings['phone_number'] ) ? $settings['phone_number'] : '+916002357235';

        $whatsapp_clean     = preg_replace( '/[^0-9]/', '', $whatsapp_number );
        $whatsapp_url       = 'https://wa.me/' . ( $whatsapp_clean ? $whatsapp_clean : '916002357235' );
        $ig_url             = 'https://instagram.com/' . ltrim( $instagram_username, '@' );
        $tel_url            = 'tel:' . $phone_number;
        ?>
        <section id="book" class="space-y-8 scroll-mt-24">
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

                <?php if ( ! empty( $section_desc ) ) : ?>
                    <p class="text-neutral-600 text-xs sm:text-sm max-w-xl">
                        <?php echo esc_html( $section_desc ); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <!-- Left Visual Card -->
                <div id="booking-portrait-card" class="lg:col-span-5 bg-white rounded-3xl border border-neutral-200/80 p-4 sm:p-5 shadow-soft flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/5] rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/60 shadow-xs mb-4">
                        <img
                            src="<?php echo esc_url( $portrait_url ); ?>"
                            alt="<?php echo esc_attr( $profile_name ); ?>"
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 bg-neutral-900/90 backdrop-blur-xs px-3.5 py-1 rounded-full text-[10px] font-mono tracking-wider text-white shadow-md flex items-center gap-1.5 border border-white/10 whitespace-nowrap">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>AVAILABLE</span>
                        </div>
                    </div>

                    <div class="text-center space-y-3 pb-1">
                        <p class="text-xs sm:text-sm font-semibold text-neutral-800 font-display flex items-center justify-center gap-1.5 flex-wrap">
                            <span><?php echo esc_html( $profile_name ); ?></span>
                            <span class="text-neutral-400 text-xs">●</span>
                            <span class="text-neutral-500 font-normal">Design + Development</span>
                        </p>
                        <div class="flex items-center justify-center gap-2 text-neutral-600">
                            <?php if ( $github_url ) : ?>
                                <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noreferrer" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs" aria-label="GitHub">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ( $linkedin_url ) : ?>
                                <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noreferrer" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs" aria-label="LinkedIn">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo esc_url( $ig_url ); ?>" target="_blank" rel="noreferrer" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs" aria-label="Instagram">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                                </svg>
                            </a>
                            <?php if ( $twitter_url ) : ?>
                                <a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noreferrer" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs" aria-label="Twitter">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ( $email_val ) : ?>
                                <a href="<?php echo esc_url( strpos( $email_val, 'mailto:' ) === 0 ? $email_val : 'mailto:' . $email_val ); ?>" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs" aria-label="Email">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Right: Clean 3-Option Contact Section -->
                <div id="contact-options-card" class="lg:col-span-7 bg-white rounded-3xl border border-neutral-200/80 shadow-soft p-5 sm:p-7 flex flex-col justify-between space-y-6">
                    <!-- Card Header Banner -->
                    <div class="p-4 sm:p-5 rounded-2xl flex items-center justify-between text-white transition-colors" style="background-color: <?php echo esc_attr( $accent_color ); ?>;">
                        <div>
                            <h3 class="font-display font-bold text-base sm:text-lg">
                                <?php echo esc_html( $card_title ); ?>
                            </h3>
                            <p class="text-[11px] text-orange-100 font-mono mt-0.5">
                                <?php echo esc_html( $card_subtitle ); ?>
                            </p>
                        </div>
                        <div class="flex items-center gap-1.5 bg-white/20 backdrop-blur-xs px-3 py-1 rounded-full text-[10px] font-mono tracking-wider text-white border border-white/10">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>AVAILABLE</span>
                        </div>
                    </div>

                    <!-- Three Functional Contact Options -->
                    <div class="space-y-3.5">
                        <!-- Option 1: WhatsApp -->
                        <a
                            id="contact-whatsapp-btn"
                            href="<?php echo esc_url( $whatsapp_url ); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group relative flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-2xl border border-neutral-200 bg-neutral-50/70 hover:bg-emerald-50/40 hover:border-emerald-300 hover:shadow-xs transition-all cursor-pointer"
                        >
                            <div class="flex items-center gap-3.5 min-w-0">
                                <div class="w-11 h-11 rounded-2xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-200/60 group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c4.52 0 8.24 3.72 8.24 8.24 0 2.2-.86 4.27-2.42 5.82a8.196 8.196 0 0 1-5.82 2.42c-1.48 0-2.93-.39-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.188 8.188 0 0 1-1.25-4.38c0-4.52 3.72-8.24 8.24-8.24m4.53 11.53c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.514 7.514 0 0 1-1.4-1.73c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.1-.23-.17-.48-.29" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <p class="font-display font-bold text-sm text-neutral-900 leading-snug group-hover:text-emerald-950 transition-colors">
                                            WhatsApp
                                        </p>
                                        <span class="font-mono text-[10px] text-emerald-700 bg-emerald-100/70 px-2 py-0.5 rounded-full border border-emerald-200/50">
                                            Fastest
                                        </span>
                                    </div>
                                    <p class="text-xs font-mono font-semibold text-emerald-800 mt-0.5">
                                        <?php echo esc_html( $whatsapp_number ); ?>
                                    </p>
                                    <p class="text-[11px] text-neutral-500 font-mono mt-0.5">
                                        Click to open direct chat in WhatsApp
                                    </p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-900 text-white text-xs font-medium group-hover:bg-emerald-700 transition-colors shadow-2xs shrink-0 self-start sm:self-center">
                                <span>Chat on WhatsApp</span>
                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/>
                                </svg>
                            </span>
                        </a>

                        <!-- Option 2: Instagram -->
                        <a
                            id="contact-instagram-btn"
                            href="<?php echo esc_url( $ig_url ); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group relative flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-2xl border border-neutral-200 bg-neutral-50/70 hover:bg-fuchsia-50/40 hover:border-fuchsia-300 hover:shadow-xs transition-all cursor-pointer"
                        >
                            <div class="flex items-center gap-3.5 min-w-0">
                                <div class="w-11 h-11 rounded-2xl bg-fuchsia-100/80 text-fuchsia-700 flex items-center justify-center shrink-0 border border-fuchsia-200/60 group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <p class="font-display font-bold text-sm text-neutral-900 leading-snug group-hover:text-fuchsia-950 transition-colors">
                                            Instagram
                                        </p>
                                        <span class="font-mono text-[10px] text-fuchsia-700 bg-fuchsia-100/70 px-2 py-0.5 rounded-full border border-fuchsia-200/50">
                                            Profile & DM
                                        </span>
                                    </div>
                                    <p class="text-xs font-mono font-semibold text-fuchsia-800 mt-0.5">
                                        @<?php echo esc_html( $instagram_username ); ?>
                                    </p>
                                    <p class="text-[11px] text-neutral-500 font-mono mt-0.5">
                                        Click to open Instagram profile and message
                                    </p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-900 text-white text-xs font-medium group-hover:bg-fuchsia-700 transition-colors shadow-2xs shrink-0 self-start sm:self-center">
                                <span>View @<?php echo esc_html( $instagram_username ); ?></span>
                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/>
                                </svg>
                            </span>
                        </a>

                        <!-- Option 3: Call Me -->
                        <a
                            id="contact-call-btn"
                            href="<?php echo esc_url( $tel_url ); ?>"
                            class="group relative flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-2xl border border-neutral-200 bg-neutral-50/70 hover:bg-orange-50/40 hover:border-orange-300 hover:shadow-xs transition-all cursor-pointer"
                        >
                            <div class="flex items-center gap-3.5 min-w-0">
                                <div class="w-11 h-11 rounded-2xl bg-orange-100/80 text-orange-700 flex items-center justify-center shrink-0 border border-orange-200/60 group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <p class="font-display font-bold text-sm text-neutral-900 leading-snug group-hover:text-orange-950 transition-colors">
                                            Call Me
                                        </p>
                                        <span class="font-mono text-[10px] text-orange-700 bg-orange-100/70 px-2 py-0.5 rounded-full border border-orange-200/50">
                                            Direct Line
                                        </span>
                                    </div>
                                    <p class="text-xs font-mono font-semibold text-orange-800 mt-0.5">
                                        <?php echo esc_html( $phone_number ); ?>
                                    </p>
                                    <p class="text-[11px] text-neutral-500 font-mono mt-0.5">
                                        Click to launch device phone dialer
                                    </p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-900 text-white text-xs font-medium group-hover:bg-orange-700 transition-colors shadow-2xs shrink-0 self-start sm:self-center">
                                <span>Call Now</span>
                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </span>
                        </a>
                    </div>

                    <!-- Bottom Card Footer -->
                    <div class="pt-4 border-t border-neutral-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-[11px] font-mono text-neutral-500">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>Typically replies within 1–2 hours</span>
                        </div>
                        <div class="text-neutral-400">
                            Direct & confidential communication
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
