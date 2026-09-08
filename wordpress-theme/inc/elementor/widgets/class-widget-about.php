<?php
/**
 * Elementor Widget: Studio About Me Bento Grid
 *
 * @package Studio_Build
 */

namespace StudioBuild\Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Studio_About_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_about';
    }

    public function get_title() {
        return esc_html__( 'Studio About Bento Grid', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-inner-section';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'about', 'bento', 'profile', 'music', 'workspace', 'manifesto' );
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
                'default' => '// About me',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'       => esc_html__( 'Section Title', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'The person behind the pixels',
                'label_block' => true,
            )
        );

        $this->end_controls_section();

        // Bento 1: Portrait Photo
        $this->start_controls_section(
            'section_portrait',
            array(
                'label' => esc_html__( 'Tall Portrait Card', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'about_portrait',
            array(
                'label'   => esc_html__( 'Portrait Photo', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/about-portrait.jpg',
                ),
            )
        );

        $this->end_controls_section();

        // Bento 2A: Music Player
        $this->start_controls_section(
            'section_music',
            array(
                'label' => esc_html__( 'Music Player Card', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'music_cover',
            array(
                'label'   => esc_html__( 'Album Art Cover', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/music-cover.jpg',
                ),
            )
        );

        $this->add_control(
            'music_title',
            array(
                'label'   => esc_html__( 'Track Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Veeran Sheher',
            )
        );

        $this->add_control(
            'music_artist',
            array(
                'label'   => esc_html__( 'Artist Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar XD',
            )
        );

        $this->add_control(
            'music_time_cur',
            array(
                'label'   => esc_html__( 'Current Timestamp', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '1:24',
            )
        );

        $this->add_control(
            'music_time_tot',
            array(
                'label'   => esc_html__( 'Total Length', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '3:45',
            )
        );

        $this->end_controls_section();

        // Bento 2B: Workspace Rig
        $this->start_controls_section(
            'section_workspace',
            array(
                'label' => esc_html__( 'Workspace Rig Card', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'personal_img',
            array(
                'label'   => esc_html__( 'Desk Photo', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/workspace-rig.jpg',
                ),
            )
        );

        $this->add_control(
            'personal_title',
            array(
                'label'   => esc_html__( 'Title', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Workstation Rig',
            )
        );

        $this->add_control(
            'personal_sub',
            array(
                'label'   => esc_html__( 'Description', 'studio-build' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.',
                'rows'    => 2,
            )
        );

        $this->add_control(
            'personal_tag',
            array(
                'label'   => esc_html__( 'Overlay Badge Tag', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Studio Rig',
            )
        );

        $this->add_control(
            'personal_badge',
            array(
                'label'   => esc_html__( 'Corner Badge', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Studio Setup',
            )
        );

        $this->add_control(
            'personal_note',
            array(
                'label'   => esc_html__( 'Specs Note', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'M3 Max · Studio Display · Custom Oak',
            )
        );

        $this->end_controls_section();

        // Bento 2C: Manifesto
        $this->start_controls_section(
            'section_manifesto',
            array(
                'label' => esc_html__( 'Manifesto Card', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'manifesto_title',
            array(
                'label'   => esc_html__( 'Manifesto Tag', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '// Guiding Philosophy',
            )
        );

        $this->add_control(
            'manifesto_quote',
            array(
                'label'   => esc_html__( 'Statement Quote', 'studio-build' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.',
                'rows'    => 3,
            )
        );

        $this->add_control(
            'manifesto_author',
            array(
                'label'   => esc_html__( 'Author Attribution', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '— Kausar · Design Engineer',
            )
        );

        $this->add_control(
            'manifesto_sub',
            array(
                'label'   => esc_html__( 'Subnote', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Zero bloat · 100% independent craft',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            array(
                'label' => esc_html__( 'Accents & Styling', 'studio-build' ),
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
        $section_tag  = ! empty( $settings['section_tag'] ) ? $settings['section_tag'] : '// About me';
        $section_title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'The person behind the pixels';
        $accent_color = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';

        $portrait_url = ! empty( $settings['about_portrait']['url'] )
            ? $settings['about_portrait']['url']
            : get_template_directory_uri() . '/assets/images/about-portrait.jpg';

        $music_cover = ! empty( $settings['music_cover']['url'] )
            ? $settings['music_cover']['url']
            : get_template_directory_uri() . '/assets/images/music-cover.jpg';
        $music_title = ! empty( $settings['music_title'] ) ? $settings['music_title'] : 'Veeran Sheher';
        $music_artist = ! empty( $settings['music_artist'] ) ? $settings['music_artist'] : 'Kausar XD';
        $time_cur    = ! empty( $settings['music_time_cur'] ) ? $settings['music_time_cur'] : '1:24';
        $time_tot    = ! empty( $settings['music_time_tot'] ) ? $settings['music_time_tot'] : '3:45';
        $spotify_url = get_theme_mod( 'studio_spotify_url', 'https://open.spotify.com/track/2U699aQLnplBGFGxWBIiDD' );

        $personal_img = ! empty( $settings['personal_img']['url'] )
            ? $settings['personal_img']['url']
            : get_template_directory_uri() . '/assets/images/workspace-rig.jpg';
        $personal_title = ! empty( $settings['personal_title'] ) ? $settings['personal_title'] : 'Workstation Rig';
        $personal_sub   = ! empty( $settings['personal_sub'] ) ? $settings['personal_sub'] : '';
        $personal_tag   = ! empty( $settings['personal_tag'] ) ? $settings['personal_tag'] : 'Studio Rig';
        $personal_badge = ! empty( $settings['personal_badge'] ) ? $settings['personal_badge'] : 'Studio Setup';
        $personal_note  = ! empty( $settings['personal_note'] ) ? $settings['personal_note'] : 'M3 Max · Studio Display';

        $manifesto_tag    = ! empty( $settings['manifesto_title'] ) ? $settings['manifesto_title'] : '// Guiding Philosophy';
        $manifesto_quote  = ! empty( $settings['manifesto_quote'] ) ? $settings['manifesto_quote'] : '';
        $manifesto_author = ! empty( $settings['manifesto_author'] ) ? $settings['manifesto_author'] : '— Kausar · Design Engineer';
        $manifesto_sub    = ! empty( $settings['manifesto_sub'] ) ? $settings['manifesto_sub'] : '';
        ?>
        <section id="about" class="space-y-8">
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

            <!-- Bento Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">
                <!-- Bento 1: Tall Portrait -->
                <div class="lg:col-span-5 rounded-3xl overflow-hidden bg-neutral-100 border border-neutral-200/80 shadow-soft group relative aspect-[4/5] sm:aspect-[16/10] lg:aspect-auto min-h-[340px] lg:min-h-[420px]">
                    <img
                        src="<?php echo esc_url( $portrait_url ); ?>"
                        alt="Kausar"
                        class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
                    />
                </div>

                <!-- Bento 2: Right Column -->
                <div class="lg:col-span-7 flex flex-col gap-5 justify-between">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 flex-1">
                        <!-- Music Player -->
                        <a
                            id="bento-music-card"
                            href="<?php echo esc_url( $spotify_url ); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-soft flex flex-col justify-between group hover:border-neutral-300 transition-all cursor-pointer block text-inherit no-underline"
                            title="<?php esc_attr_e( 'Listen on Spotify', 'studio-build' ); ?>"
                        >
                            <div class="w-full aspect-square rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group/img">
                                <img
                                    src="<?php echo esc_url( $music_cover ); ?>"
                                    alt="<?php echo esc_attr( $music_title ); ?>"
                                    class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                                />
                                <div class="absolute top-2.5 left-2.5 bg-black/65 backdrop-blur-xs text-white px-2.5 py-1 rounded-full text-[10px] font-mono flex items-center gap-1.5 shadow-sm">
                                    <svg class="w-3 h-3 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a9 9 0 0 1 18 0v12a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>
                                    </svg>
                                    <span><?php esc_html_e( 'Now Playing', 'studio-build' ); ?></span>
                                </div>
                                <div class="absolute bottom-2.5 right-2.5 bg-white/90 group-hover:bg-white text-neutral-900 px-2.5 py-0.5 rounded-full text-[10px] font-mono border border-white/60 shadow-xs font-semibold flex items-center gap-1 transition-colors">
                                    <span>Spotify</span>
                                    <svg class="w-2.5 h-2.5 text-neutral-500 group-hover:text-neutral-900 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6m4-3h6v6m-11 5L21 3"/></svg>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center justify-between gap-2">
                                    <div class="min-w-0 flex-1">
                                        <h3 class="text-sm font-bold text-neutral-900 font-display truncate">
                                            <?php echo esc_html( $music_title ); ?>
                                        </h3>
                                        <p class="text-[11px] text-neutral-500 font-mono tracking-tight truncate">
                                            <?php echo esc_html( $music_artist ); ?>
                                        </p>
                                    </div>
                                    <span class="font-mono text-[10px] text-neutral-400 bg-neutral-50 px-2 py-0.5 rounded border border-neutral-200/60 shrink-0">
                                        Active
                                    </span>
                                </div>

                                <div class="space-y-1">
                                    <div class="h-1 bg-neutral-100 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full w-[38%]" style="background-color: <?php echo esc_attr( $accent_color ); ?>;"></div>
                                    </div>
                                    <div class="flex justify-between text-[10px] font-mono text-neutral-400">
                                        <span><?php echo esc_html( $time_cur ); ?></span>
                                        <span><?php echo esc_html( $time_tot ); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full flex items-center justify-between gap-2 pt-3 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                                <span class="text-neutral-600 truncate flex items-center gap-1.5 font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span>Daily Rotation</span>
                                </span>
                                <span class="text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                                    Audio
                                </span>
                            </div>
                        </a>

                        <!-- Workspace Rig -->
                        <div class="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-soft flex flex-col justify-between group hover:border-neutral-300 transition-colors">
                            <div class="w-full aspect-square rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group/img">
                                <img
                                    src="<?php echo esc_url( $personal_img ); ?>"
                                    alt="<?php echo esc_attr( $personal_title ); ?>"
                                    class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                                />
                                <div class="absolute top-2.5 left-2.5 bg-black/65 backdrop-blur-xs text-white px-2.5 py-1 rounded-full text-[10px] font-mono flex items-center gap-1.5 shadow-sm">
                                    <svg class="w-3 h-3 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/>
                                    </svg>
                                    <span><?php echo esc_html( $personal_tag ); ?></span>
                                </div>
                                <div class="absolute bottom-2.5 right-2.5 bg-white/90 backdrop-blur-xs text-neutral-900 px-2.5 py-0.5 rounded-full text-[10px] font-mono border border-white/60 shadow-xs font-semibold">
                                    <?php echo esc_html( $personal_badge ); ?>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <div class="flex items-center justify-between gap-2">
                                    <h3 class="text-sm font-bold text-neutral-900 font-display truncate">
                                        <?php echo esc_html( $personal_title ); ?>
                                    </h3>
                                    <span class="text-[10px] font-mono text-neutral-400 shrink-0">
                                        Setup v4
                                    </span>
                                </div>
                                <?php if ( ! empty( $personal_sub ) ) : ?>
                                    <p class="text-[11px] text-neutral-500 leading-relaxed line-clamp-2">
                                        <?php echo esc_html( $personal_sub ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="w-full flex items-center justify-between gap-2 pt-3 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                                <span class="text-neutral-600 truncate flex items-center gap-1.5 font-medium">
                                    <svg class="w-3 h-3 text-[#E8590C] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/>
                                    </svg>
                                    <span class="truncate"><?php echo esc_html( $personal_note ); ?></span>
                                </span>
                                <span class="text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                                    Hardware
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Manifesto -->
                    <div class="bg-white border border-neutral-200/80 rounded-3xl p-5 sm:p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group shadow-soft hover:border-neutral-300 transition-all duration-300">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neutral-100/90 border border-neutral-200/80 text-neutral-700 text-[11px] font-mono tracking-tight mb-3 select-none">
                            <svg class="w-3 h-3 text-[#E8590C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                            </svg>
                            <span><?php echo esc_html( $manifesto_tag ); ?></span>
                        </div>

                        <?php if ( ! empty( $manifesto_quote ) ) : ?>
                            <blockquote class="max-w-lg mx-auto px-2">
                                <p class="font-display font-semibold text-base sm:text-lg lg:text-xl text-neutral-900 tracking-tight leading-snug">
                                    "<?php echo esc_html( $manifesto_quote ); ?>"
                                </p>
                            </blockquote>
                        <?php endif; ?>

                        <div class="mt-3.5 flex flex-wrap items-center justify-center gap-2 text-xs font-mono">
                            <span class="text-neutral-900 font-semibold font-display text-xs sm:text-sm">
                                <?php echo esc_html( $manifesto_author ); ?>
                            </span>
                            <?php if ( ! empty( $manifesto_sub ) ) : ?>
                                <span class="text-neutral-300">·</span>
                                <span class="text-neutral-500 text-[11px]">
                                    <?php echo esc_html( $manifesto_sub ); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
