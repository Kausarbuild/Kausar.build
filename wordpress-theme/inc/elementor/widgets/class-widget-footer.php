<?php
/**
 * Elementor Widget: Studio Footer & Colophon
 *
 * @package Studio_Build
 */

namespace StudioBuild\Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Studio_Footer_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_footer';
    }

    public function get_title() {
        return esc_html__( 'Studio Footer & Colophon', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-footer';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'footer', 'colophon', 'signature', 'social', 'copyright' );
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_content',
            array(
                'label' => esc_html__( 'Footer Content', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'footer_greeting',
            array(
                'label'   => esc_html__( 'Greeting Line', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Thanks for being here.',
            )
        );

        $this->add_control(
            'footer_tagline',
            array(
                'label'   => esc_html__( 'Tagline / Closing Sentence', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => "Let's build something thoughtful.",
            )
        );

        $this->add_control(
            'profile_name',
            array(
                'label'   => esc_html__( 'Handwritten Signature Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar',
            )
        );

        $this->add_control(
            'signature_name',
            array(
                'label'   => esc_html__( 'Studio Brand Subtext', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar.Build',
            )
        );

        $this->add_control(
            'copyright',
            array(
                'label'   => esc_html__( 'Copyright Notice', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '© 2026 Kausar.Build. All Rights Reserved.',
            )
        );

        $this->end_controls_section();

        // Social Links
        $this->start_controls_section(
            'section_socials',
            array(
                'label' => esc_html__( 'Social Profiles', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
            'social_email',
            array(
                'label'   => esc_html__( 'Email Address', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'hello@kausar.build',
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
                'default' => array( 'url' => 'https://instagram.com' ),
            )
        );

        $this->add_control(
            'social_twitter',
            array(
                'label'   => esc_html__( 'Twitter / X URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array( 'url' => 'https://twitter.com' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings        = $this->get_settings_for_display();
        $footer_greeting = ! empty( $settings['footer_greeting'] ) ? $settings['footer_greeting'] : 'Thanks for being here.';
        $footer_tagline  = ! empty( $settings['footer_tagline'] ) ? $settings['footer_tagline'] : "Let's build something thoughtful.";
        $profile_name    = ! empty( $settings['profile_name'] ) ? $settings['profile_name'] : 'Kausar';
        $signature_name  = ! empty( $settings['signature_name'] ) ? $settings['signature_name'] : 'Kausar.Build';
        $copyright       = ! empty( $settings['copyright'] ) ? $settings['copyright'] : '© 2026 Kausar.Build. All Rights Reserved.';

        $github_url    = ! empty( $settings['social_github']['url'] ) ? $settings['social_github']['url'] : '';
        $linkedin_url  = ! empty( $settings['social_linkedin']['url'] ) ? $settings['social_linkedin']['url'] : '';
        $instagram_url = ! empty( $settings['social_instagram']['url'] ) ? $settings['social_instagram']['url'] : '';
        $twitter_url   = ! empty( $settings['social_twitter']['url'] ) ? $settings['social_twitter']['url'] : '';
        $email_val     = ! empty( $settings['social_email'] ) ? $settings['social_email'] : '';
        $has_socials   = ( $github_url || $linkedin_url || $instagram_url || $twitter_url || $email_val );
        ?>
        <footer class="pt-16 pb-20 border-t border-neutral-200/80 text-center space-y-8 max-w-4xl mx-auto px-4">
            <?php if ( $has_socials ) : ?>
                <div class="flex items-center justify-center gap-3">
                    <?php if ( $github_url ) : ?>
                        <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105" aria-label="GitHub Profile">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ( $email_val ) : ?>
                        <a href="<?php echo esc_url( strpos( $email_val, 'mailto:' ) === 0 ? $email_val : 'mailto:' . $email_val ); ?>" class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105" aria-label="Send Email">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ( $linkedin_url ) : ?>
                        <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105" aria-label="LinkedIn Profile">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ( $instagram_url ) : ?>
                        <a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105" aria-label="Instagram Profile">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ( $twitter_url ) : ?>
                        <a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105" aria-label="X Profile">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Greeting & Wax Seal -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 text-xs sm:text-sm text-neutral-600 font-medium">
                <span><?php echo esc_html( $footer_greeting ); ?></span>
                <div class="w-10 h-10 relative select-none hover:rotate-12 transition-transform cursor-pointer flex items-center justify-center shrink-0">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c94a08] to-[#9c3405] text-white flex items-center justify-center shadow-md border border-[#e8590c]/40">
                        <span class="font-display font-black text-[10px] tracking-widest uppercase">
                            KB
                        </span>
                    </div>
                </div>
                <span><?php echo esc_html( $footer_tagline ); ?></span>
            </div>

            <!-- Stylized Signature -->
            <div class="pt-2 flex flex-col items-center space-y-1">
                <p class="font-handwriting text-4xl sm:text-5xl lg:text-6xl text-neutral-900 -rotate-2 select-none">
                    <?php echo esc_html( $profile_name ); ?>
                </p>
                <p class="text-xs text-neutral-500 font-mono tracking-tight">
                    <?php echo esc_html( $signature_name ); ?>
                </p>
            </div>

            <!-- Copyright Notice -->
            <div class="text-[11px] font-mono text-neutral-400 pt-3">
                <p><?php echo esc_html( $copyright ); ?></p>
            </div>
        </footer>
        <?php
    }
}
