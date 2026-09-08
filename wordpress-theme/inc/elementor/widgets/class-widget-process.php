<?php
/**
 * Elementor Widget: Studio Process & Monthly Retainer
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

class Studio_Process_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_process';
    }

    public function get_title() {
        return esc_html__( 'Studio Process & Retainer', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'process', 'steps', 'pricing', 'retainer', 'support', 'profile' );
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
                'default' => '// How it works',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'       => esc_html__( 'Section Headline', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'A considered approach to design & development',
                'label_block' => true,
            )
        );

        $this->end_controls_section();

        // 4 Process Steps
        $this->start_controls_section(
            'section_steps',
            array(
                'label' => esc_html__( 'Process Steps (4 Cards)', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $step_rep = new Repeater();
        $step_rep->add_control(
            'number',
            array(
                'label'   => esc_html__( 'Step Number', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '01',
            )
        );
        $step_rep->add_control(
            'title',
            array(
                'label'   => esc_html__( 'Step Title', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Discovery & Direction',
            )
        );
        $step_rep->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Step Description', 'studio-build' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Understanding the goal, content, and the audience before designing.',
                'rows'    => 2,
            )
        );

        $this->add_control(
            'steps_list',
            array(
                'label'       => esc_html__( 'Steps', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $step_rep->get_controls(),
                'default'     => array(
                    array(
                        'number'      => '01',
                        'title'       => 'Discovery & Direction',
                        'description' => 'Understanding the goal, content, and the audience before designing.',
                    ),
                    array(
                        'number'      => '02',
                        'title'       => 'Design & Structure',
                        'description' => 'Creating clear layouts, visual systems, and interactive prototypes.',
                    ),
                    array(
                        'number'      => '03',
                        'title'       => 'Development & Polish',
                        'description' => 'Writing clean code, responsive testing, and finalizing the details.',
                    ),
                    array(
                        'number'      => '04',
                        'title'       => 'Launch & Support',
                        'description' => 'Deploying the website and ensuring everything runs as expected.',
                    ),
                ),
                'title_field' => '{{{ number }}} - {{{ title }}}',
            )
        );

        $this->end_controls_section();

        // Profile Card Controls
        $this->start_controls_section(
            'section_profile_card',
            array(
                'label' => esc_html__( 'Profile ID Card', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'profile_name',
            array(
                'label'   => esc_html__( 'Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar',
            )
        );

        $this->add_control(
            'profile_location',
            array(
                'label'   => esc_html__( 'Location', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'India',
            )
        );

        $this->add_control(
            'profile_avatar',
            array(
                'label'   => esc_html__( 'Avatar Photo', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/profile-avatar.jpg',
                ),
            )
        );

        $this->add_control(
            'profile_bio',
            array(
                'label'   => esc_html__( 'Collaboration Bio', 'studio-build' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'I care about clear ideas, thoughtful details, and building things that are genuinely useful.',
                'rows'    => 3,
            )
        );

        $this->end_controls_section();

        // Retainer Card Controls
        $this->start_controls_section(
            'section_retainer',
            array(
                'label' => esc_html__( 'Monthly Support Retainer', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'retainer_title',
            array(
                'label'   => esc_html__( 'Retainer Plan Title', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Monthly Website Support',
            )
        );

        $this->add_control(
            'retainer_desc',
            array(
                'label'   => esc_html__( 'Retainer Description', 'studio-build' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Ongoing design and development support for websites that need regular improvements, updates, or new work.',
                'rows'    => 2,
            )
        );

        $this->add_control(
            'retainer_badge',
            array(
                'label'   => esc_html__( 'Pill Badge', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Pause or cancel anytime',
            )
        );

        $this->add_control(
            'retainer_price',
            array(
                'label'   => esc_html__( 'Price Label', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Let’s talk',
            )
        );

        $this->add_control(
            'retainer_period',
            array(
                'label'   => esc_html__( 'Period', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Custom',
            )
        );

        $feat_rep = new Repeater();
        $feat_rep->add_control(
            'feature',
            array(
                'label'       => esc_html__( 'Feature Item', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Design + development',
                'label_block' => true,
            )
        );

        $this->add_control(
            'features_list',
            array(
                'label'       => esc_html__( 'Features Checkmarks', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $feat_rep->get_controls(),
                'default'     => array(
                    array( 'feature' => 'One active request at a time' ),
                    array( 'feature' => 'Design + development' ),
                    array( 'feature' => 'Ongoing improvements' ),
                    array( 'feature' => 'Clear communication' ),
                    array( 'feature' => 'Flexible engagement' ),
                ),
                'title_field' => '{{{ feature }}}',
            )
        );

        $this->add_control(
            'cta_text',
            array(
                'label'   => esc_html__( 'CTA Button Label', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Book a Consultation',
            )
        );

        $this->add_control(
            'cta_url',
            array(
                'label'   => esc_html__( 'CTA Button URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array(
                    'url' => '#book',
                ),
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
                'label'   => esc_html__( 'Accent Dot Color', 'studio-build' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '#E8590C',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings     = $this->get_settings_for_display();
        $section_tag  = ! empty( $settings['section_tag'] ) ? $settings['section_tag'] : '// How it works';
        $section_title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'A considered approach to design & development';
        $accent_color = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';
        $steps        = ! empty( $settings['steps_list'] ) ? $settings['steps_list'] : array();

        $profile_name = ! empty( $settings['profile_name'] ) ? $settings['profile_name'] : 'Kausar';
        $profile_loc  = ! empty( $settings['profile_location'] ) ? $settings['profile_location'] : 'India';
        $profile_bio  = ! empty( $settings['profile_bio'] ) ? $settings['profile_bio'] : '';
        $profile_avatar = ! empty( $settings['profile_avatar']['url'] )
            ? $settings['profile_avatar']['url']
            : get_template_directory_uri() . '/assets/images/profile-avatar.jpg';

        $retainer_title = ! empty( $settings['retainer_title'] ) ? $settings['retainer_title'] : 'Monthly Website Support';
        $retainer_desc  = ! empty( $settings['retainer_desc'] ) ? $settings['retainer_desc'] : '';
        $retainer_badge = ! empty( $settings['retainer_badge'] ) ? $settings['retainer_badge'] : 'Pause or cancel anytime';
        $retainer_price = ! empty( $settings['retainer_price'] ) ? $settings['retainer_price'] : 'Let’s talk';
        $retainer_period = ! empty( $settings['retainer_period'] ) ? $settings['retainer_period'] : '';
        $features       = ! empty( $settings['features_list'] ) ? $settings['features_list'] : array();
        $cta_text       = ! empty( $settings['cta_text'] ) ? $settings['cta_text'] : 'Book a Consultation';
        $cta_url        = ! empty( $settings['cta_url']['url'] ) ? $settings['cta_url']['url'] : '#book';
        ?>
        <section id="pricing" class="space-y-8 scroll-mt-24 relative">
            <span id="process" class="sr-only"></span>

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

            <!-- Process 4 Steps -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ( $steps as $step ) :
                    $num  = ! empty( $step['number'] ) ? $step['number'] : '';
                    $stitle = ! empty( $step['title'] ) ? $step['title'] : '';
                    $sdesc  = ! empty( $step['description'] ) ? $step['description'] : '';
                ?>
                    <div class="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2 flex flex-col justify-between">
                        <div class="space-y-1.5">
                            <span class="font-mono text-xs text-neutral-400 font-semibold block">
                                <?php echo esc_html( $num ); ?>
                            </span>
                            <h3 class="font-display font-bold text-neutral-900 text-base">
                                <?php echo esc_html( $stitle ); ?>
                            </h3>
                        </div>
                        <p class="text-xs text-neutral-600 leading-relaxed">
                            <?php echo esc_html( $sdesc ); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <!-- Left: Profile Verification Card -->
                <div class="lg:col-span-5 bg-white rounded-3xl border border-neutral-200/80 p-5 sm:p-7 shadow-soft flex flex-col justify-between space-y-6 overflow-hidden">
                    <div class="bg-neutral-50/80 rounded-2xl p-4 border border-neutral-200/80 shadow-sm transform -rotate-1 hover:rotate-0 transition-transform duration-300">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl overflow-hidden bg-neutral-900 shrink-0 border border-neutral-200 shadow-xs">
                                    <img
                                        src="<?php echo esc_url( $profile_avatar ); ?>"
                                        alt="<?php echo esc_attr( $profile_name ); ?>"
                                        class="w-full h-full object-cover"
                                    />
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-1.5">
                                        <h4 class="font-display font-bold text-neutral-900 text-base leading-tight truncate">
                                            <?php echo esc_html( $profile_name ); ?>
                                        </h4>
                                        <span class="w-2 h-2 rounded-full" style="background-color: <?php echo esc_attr( $accent_color ); ?>;"></span>
                                    </div>
                                    <p class="text-neutral-500 text-xs font-mono">
                                        Design + Development · <?php echo esc_html( $profile_loc ); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="font-mono text-[10px] text-neutral-400 bg-white px-2 py-1 rounded border border-neutral-200 shrink-0 self-start sm:self-auto">
                                ID: #BUILD-01
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-t border-neutral-200/60 grid grid-cols-3 gap-2 text-center font-mono">
                            <div class="bg-white/70 py-1.5 px-1 rounded border border-neutral-200/60">
                                <div class="text-[9px] text-neutral-400">FOCUS</div>
                                <div class="text-xs font-semibold text-neutral-800 truncate">Websites</div>
                            </div>
                            <div class="bg-white/70 py-1.5 px-1 rounded border border-neutral-200/60">
                                <div class="text-[9px] text-neutral-400">EXP</div>
                                <div class="text-xs font-semibold text-neutral-800 truncate">Design+Dev</div>
                            </div>
                            <div class="bg-white/70 py-1.5 px-1 rounded border border-neutral-200/60">
                                <div class="text-[9px] text-neutral-400">STATUS</div>
                                <div class="text-xs font-semibold text-emerald-600 truncate">Active</div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3 pt-2">
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200/70 text-emerald-700 text-[11px] font-mono">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>Available for selected projects</span>
                        </div>
                        <h3 class="font-display font-bold text-xl sm:text-2xl text-neutral-900 leading-tight">
                            Direct Collaboration
                        </h3>
                        <?php if ( ! empty( $profile_bio ) ) : ?>
                            <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed">
                                <?php echo esc_html( $profile_bio ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right: Monthly Retainer Card -->
                <div class="lg:col-span-7 bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-8 shadow-soft flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <h3 class="font-display font-bold text-xl sm:text-2xl text-neutral-900">
                                <?php echo esc_html( $retainer_title ); ?>
                            </h3>
                            <?php if ( ! empty( $retainer_desc ) ) : ?>
                                <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed max-w-lg">
                                    <?php echo esc_html( $retainer_desc ); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $retainer_badge ) ) : ?>
                            <div class="inline-block">
                                <span class="px-3 py-1 rounded-full bg-neutral-100 text-neutral-600 text-xs font-mono">
                                    <?php echo esc_html( $retainer_badge ); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="pt-2 flex items-baseline gap-1.5">
                            <span class="text-3xl sm:text-4xl font-display font-extrabold text-neutral-900 tracking-tight">
                                <?php echo esc_html( $retainer_price ); ?>
                            </span>
                            <?php if ( ! empty( $retainer_period ) ) : ?>
                                <span class="text-neutral-500 text-sm font-medium">
                                    · <?php echo esc_html( $retainer_period ); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $features ) ) : ?>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-3 text-xs sm:text-sm text-neutral-600">
                                <?php foreach ( $features as $feat ) :
                                    $ftxt = ! empty( $feat['feature'] ) ? $feat['feature'] : '';
                                    if ( empty( $ftxt ) ) continue;
                                ?>
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background-color: <?php echo esc_attr( $accent_color ); ?>;"></span>
                                        <span><?php echo esc_html( $ftxt ); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="pt-4 border-t border-neutral-100 flex flex-wrap items-center justify-between gap-4">
                        <span class="text-xs font-mono text-neutral-400">
                            Available for select clients
                        </span>
                        <?php if ( ! empty( $cta_text ) ) : ?>
                            <a
                                href="<?php echo esc_url( $cta_url ); ?>"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-xs sm:text-sm font-medium hover:bg-neutral-800 transition-all shadow-sm"
                            >
                                <span><?php echo esc_html( $cta_text ); ?></span>
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
