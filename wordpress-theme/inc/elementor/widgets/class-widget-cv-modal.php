<?php
/**
 * Elementor Widget: Studio CV Modal & Printable Bio
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

class Studio_CV_Modal_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_cv_modal';
    }

    public function get_title() {
        return esc_html__( 'Studio CV Modal & Bio', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-document-file';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'cv', 'resume', 'modal', 'bio', 'experience', 'print' );
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_cv_header',
            array(
                'label' => esc_html__( 'CV Header & Summary', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'profile_name',
            array(
                'label'   => esc_html__( 'Candidate Name', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Kausar',
            )
        );

        $this->add_control(
            'role_title',
            array(
                'label'       => esc_html__( 'Role / Headline', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Design Engineer · Websites & Digital Products',
                'label_block' => true,
            )
        );

        $this->add_control(
            'location_tag',
            array(
                'label'   => esc_html__( 'Location / Availability', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '● Remote Worldwide · Available for Projects',
            )
        );

        $this->add_control(
            'summary_text',
            array(
                'label'       => esc_html__( 'Professional Summary', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Design engineer specializing in crafting fast, elegant, and high-conversion digital products. I combine refined visual aesthetics with clean engineering to create websites that are thoughtful, enduring, and built to work.',
                'rows'        => 3,
            )
        );

        $this->end_controls_section();

        // Experience Repeater
        $this->start_controls_section(
            'section_experience',
            array(
                'label' => esc_html__( 'Experience & Roles', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'role',
            array(
                'label'       => esc_html__( 'Role Title', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Lead Product Designer & Developer',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'company',
            array(
                'label'   => esc_html__( 'Company & Location', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Independent Studio · Remote',
            )
        );

        $repeater->add_control(
            'period',
            array(
                'label'   => esc_html__( 'Time Period', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '2022 — Present',
            )
        );

        $repeater->add_control(
            'description',
            array(
                'label'   => esc_html__( 'Description', 'studio-build' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Partnering directly with founders and teams to build brand identities, bespoke web applications, and tailor-made CMS platforms with 100% responsiveness.',
                'rows'    => 2,
            )
        );

        $this->add_control(
            'experience_items',
            array(
                'label'       => esc_html__( 'Experience Timeline', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'role'        => 'Lead Product Designer & Developer',
                        'company'     => 'Independent Studio · Remote',
                        'period'      => '2022 — Present',
                        'description' => 'Partnering directly with founders and teams to build brand identities, bespoke web applications, and tailor-made CMS platforms with 100% responsiveness.',
                    ),
                    array(
                        'role'        => 'Senior UI/UX & Frontend Engineer',
                        'company'     => 'Digital Agency · Global',
                        'period'      => '2020 — 2022',
                        'description' => 'Led design-to-code implementations for high-traffic SaaS landing pages and design systems. Engineered scalable component architectures and optimized Core Web Vitals to 98+.',
                    ),
                ),
                'title_field' => '{{{ role }}} ({{{ period }}})',
            )
        );

        $this->end_controls_section();

        // Core Skills
        $this->start_controls_section(
            'section_skills',
            array(
                'label' => esc_html__( 'Competencies & Skills', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $skill_rep = new Repeater();

        $skill_rep->add_control(
            'skill_title',
            array(
                'label'   => esc_html__( 'Skill Category', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'UI/UX Architecture',
            )
        );

        $skill_rep->add_control(
            'skill_details',
            array(
                'label'   => esc_html__( 'Tools / Technologies', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Figma, Design Systems',
            )
        );

        $this->add_control(
            'skills_items',
            array(
                'label'       => esc_html__( 'Competency Badges', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $skill_rep->get_controls(),
                'default'     => array(
                    array(
                        'skill_title'   => 'UI/UX Architecture',
                        'skill_details' => 'Figma, Design Systems',
                    ),
                    array(
                        'skill_title'   => 'Frontend Engineering',
                        'skill_details' => 'React, TypeScript, Tailwind',
                    ),
                    array(
                        'skill_title'   => 'WordPress Ecosystem',
                        'skill_details' => 'Elementor, Custom Themes, CPTs',
                    ),
                ),
                'title_field' => '{{{ skill_title }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings     = $this->get_settings_for_display();
        $name         = ! empty( $settings['profile_name'] ) ? $settings['profile_name'] : 'Kausar';
        $role         = ! empty( $settings['role_title'] ) ? $settings['role_title'] : 'Design Engineer · Websites & Digital Products';
        $loc          = ! empty( $settings['location_tag'] ) ? $settings['location_tag'] : '● Remote Worldwide · Available for Projects';
        $summary      = ! empty( $settings['summary_text'] ) ? $settings['summary_text'] : '';
        $experience   = ! empty( $settings['experience_items'] ) ? $settings['experience_items'] : array();
        $skills       = ! empty( $settings['skills_items'] ) ? $settings['skills_items'] : array();

        $is_editor    = \Elementor\Plugin::$instance->editor->is_edit_mode();
        ?>
        <?php if ( $is_editor ) : ?>
            <div class="p-4 bg-orange-50 border border-orange-200 rounded-2xl text-xs font-mono text-neutral-700 space-y-2 mb-4">
                <div class="flex items-center gap-2 font-bold text-orange-800">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    <span>Curriculum Vitae Modal (Active in Live Frontend via "Download CV" button)</span>
                </div>
                <p>In the live site, this CV modal opens smoothly when visitors click "Download CV" in the hero or any CV link.</p>
            </div>
        <?php endif; ?>

        <div id="studio-cv-modal" class="<?php echo $is_editor ? 'relative my-6' : 'fixed inset-0 z-50 hidden flex items-center justify-center p-3 sm:p-6 bg-neutral-900/60 backdrop-blur-xs'; ?>">
            <div class="bg-white rounded-3xl border border-neutral-200 shadow-xl max-w-2xl w-full max-h-[90vh] flex flex-col overflow-hidden text-neutral-900 mx-auto">
                <!-- Top Bar -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-neutral-100 bg-neutral-50/80">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-orange-600"></span>
                        <span class="font-mono text-xs font-semibold uppercase tracking-wider text-neutral-500">
                            Curriculum Vitae
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            type="button"
                            id="btn-print-cv"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white border border-neutral-200 hover:bg-neutral-100 text-neutral-700 text-xs font-medium transition-colors shadow-xs cursor-pointer"
                            title="Print or Save as PDF"
                        >
                            <svg class="w-3.5 h-3.5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                            <span>Print / Save PDF</span>
                        </button>
                        <button
                            type="button"
                            id="btn-close-cv-modal"
                            class="w-8 h-8 rounded-full border border-neutral-200 hover:bg-neutral-100 flex items-center justify-center text-neutral-500 hover:text-neutral-900 transition-colors cursor-pointer"
                            aria-label="Close CV Modal"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 sm:p-8 overflow-y-auto space-y-6 text-xs sm:text-sm text-neutral-700 font-sans leading-relaxed">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-neutral-200">
                        <div class="space-y-1">
                            <h3 class="font-display font-bold text-2xl sm:text-3xl text-neutral-900 tracking-tight">
                                <?php echo esc_html( $name ); ?>
                            </h3>
                            <p class="font-display font-medium text-neutral-500 text-sm">
                                <?php echo esc_html( $role ); ?>
                            </p>
                        </div>
                        <div class="space-y-1 font-mono text-[11px] text-neutral-500 sm:text-right">
                            <p><?php echo esc_html( $loc ); ?></p>
                        </div>
                    </div>

                    <?php if ( ! empty( $summary ) ) : ?>
                        <div class="space-y-2">
                            <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
                                // Summary
                            </h4>
                            <p class="text-neutral-600 leading-relaxed">
                                <?php echo esc_html( $summary ); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $experience ) ) : ?>
                        <div class="space-y-4">
                            <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
                                // Experience & Selected Roles
                            </h4>
                            <div class="space-y-4 border-l-2 border-neutral-200 pl-4">
                                <?php foreach ( $experience as $exp ) :
                                    $exp_role  = ! empty( $exp['role'] ) ? $exp['role'] : '';
                                    $exp_comp  = ! empty( $exp['company'] ) ? $exp['company'] : '';
                                    $exp_time  = ! empty( $exp['period'] ) ? $exp['period'] : '';
                                    $exp_desc  = ! empty( $exp['description'] ) ? $exp['description'] : '';
                                ?>
                                    <div class="space-y-1">
                                        <div class="flex items-baseline justify-between gap-2">
                                            <h5 class="font-display font-bold text-neutral-900 text-sm sm:text-base">
                                                <?php echo esc_html( $exp_role ); ?>
                                            </h5>
                                            <span class="font-mono text-[11px] text-neutral-400"><?php echo esc_html( $exp_time ); ?></span>
                                        </div>
                                        <?php if ( ! empty( $exp_comp ) ) : ?>
                                            <p class="text-neutral-500 text-xs"><?php echo esc_html( $exp_comp ); ?></p>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $exp_desc ) ) : ?>
                                            <p class="text-neutral-600 text-xs leading-relaxed mt-1">
                                                <?php echo esc_html( $exp_desc ); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $skills ) ) : ?>
                        <div class="space-y-3">
                            <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
                                // Core Competencies
                            </h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                                <?php foreach ( $skills as $sk ) :
                                    $s_title = ! empty( $sk['skill_title'] ) ? $sk['skill_title'] : '';
                                    $s_det   = ! empty( $sk['skill_details'] ) ? $sk['skill_details'] : '';
                                ?>
                                    <div class="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                                        <p class="font-display font-bold text-xs text-neutral-900"><?php echo esc_html( $s_title ); ?></p>
                                        <p class="font-mono text-[10px] text-neutral-500"><?php echo esc_html( $s_det ); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-neutral-100 bg-neutral-50/80 flex items-center justify-between gap-3">
                    <a
                        href="#book"
                        id="btn-cv-discuss"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white text-xs sm:text-sm font-medium transition-colors shadow-xs"
                    >
                        <span>Discuss a Project</span>
                    </a>
                    <button
                        type="button"
                        id="btn-close-cv-modal-bottom"
                        class="px-4 py-2 rounded-full border border-neutral-200 hover:bg-neutral-100 text-neutral-700 text-xs font-medium transition-colors cursor-pointer"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
}
