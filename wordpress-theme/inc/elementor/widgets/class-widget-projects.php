<?php
/**
 * Elementor Widget: Studio Work & Projects Grid
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

class Studio_Projects_Widget extends Widget_Base {

    public function get_name() {
        return 'studio_projects';
    }

    public function get_title() {
        return esc_html__( 'Studio Projects Archive Grid', 'studio-build' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return array( 'studio-build' );
    }

    public function get_keywords() {
        return array( 'projects', 'portfolio', 'archive', 'grid', 'work' );
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
                'label'   => esc_html__( 'Section Tag / Eyebrow', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '// Design Archive',
            )
        );

        $this->add_control(
            'section_title',
            array(
                'label'       => esc_html__( 'Section Title', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Digital Product Design', 'studio-build' ),
                'label_block' => true,
            )
        );

        $this->add_control(
            'section_description',
            array(
                'label'       => esc_html__( 'Section Description', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'A collection of digital work, visual studies, and website concepts.', 'studio-build' ),
                'rows'        => 2,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_projects',
            array(
                'label' => esc_html__( 'Projects List', 'studio-build' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            array(
                'label'       => esc_html__( 'Project Title', 'studio-build' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Your website has one job.',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'category',
            array(
                'label'   => esc_html__( 'Category Badge', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Websites',
            )
        );

        $repeater->add_control(
            'year',
            array(
                'label'   => esc_html__( 'Year', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '2026',
            )
        );

        $repeater->add_control(
            'tag',
            array(
                'label'   => esc_html__( 'Sub-tag Line', 'studio-build' ),
                'type'    => Controls_Manager::TEXT,
                'default' => "Let's create · @kausar.build",
            )
        );

        $repeater->add_control(
            'description',
            array(
                'label'       => esc_html__( 'Description', 'studio-build' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'A clean, high-impact digital presence engineered to convert visitors into believers without friction.',
                'rows'        => 3,
            )
        );

        $repeater->add_control(
            'image',
            array(
                'label'   => esc_html__( 'Project Image / Artwork', 'studio-build' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/projects/project-1-one-job.svg',
                ),
            )
        );

        $repeater->add_control(
            'project_url',
            array(
                'label'   => esc_html__( 'External / Details URL', 'studio-build' ),
                'type'    => Controls_Manager::URL,
                'default' => array(
                    'url' => '#',
                ),
            )
        );

        $theme_uri = get_template_directory_uri();

        $this->add_control(
            'projects_list',
            array(
                'label'       => esc_html__( 'Projects', 'studio-build' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'title'       => 'Your website has one job.',
                        'category'    => 'Websites',
                        'year'        => '2026',
                        'tag'         => "Let's create · @kausar.build",
                        'description' => 'A clean, high-impact digital presence engineered to convert visitors into believers without friction.',
                        'image'       => array( 'url' => $theme_uri . '/assets/projects/project-1-one-job.svg' ),
                    ),
                    array(
                        'title'       => 'To make people trust your business.',
                        'category'    => 'Strategy Through Design',
                        'year'        => '2026',
                        'tag'         => 'Branding · Websites · Experiences',
                        'description' => 'Not confuse them. Clarity-first branding and website systems that establish credibility instantly.',
                        'image'       => array( 'url' => $theme_uri . '/assets/projects/project-2-trust-business.svg' ),
                    ),
                    array(
                        'title'       => "Beautiful isn't enough. It has to convert.",
                        'category'    => 'UI / Conversion',
                        'year'        => '2026',
                        'tag'         => 'Conversion Systems',
                        'description' => 'Automate. Analyze. Accelerate. High-performance product interfaces engineered for measurable business growth.',
                        'image'       => array( 'url' => $theme_uri . '/assets/projects/project-3-convert-dashboard.svg' ),
                    ),
                    array(
                        'title'       => 'I design websites that look premium and perform.',
                        'category'    => 'Web Design',
                        'year'        => '2026',
                        'tag'         => 'Design + Development',
                        'description' => 'Precision digital craft uniting high-end visual elegance with uncompromising speed and responsiveness.',
                        'image'       => array( 'url' => $theme_uri . '/assets/projects/project-4-premium-perform.svg' ),
                    ),
                ),
                'title_field' => '{{{ title }}}',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            array(
                'label' => esc_html__( 'Style & Accents', 'studio-build' ),
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
        $section_tag  = ! empty( $settings['section_tag'] ) ? $settings['section_tag'] : '// Design Archive';
        $section_title = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Digital Product Design';
        $section_desc = ! empty( $settings['section_description'] ) ? $settings['section_description'] : '';
        $accent_color = ! empty( $settings['accent_color'] ) ? $settings['accent_color'] : '#E8590C';
        $projects     = ! empty( $settings['projects_list'] ) ? $settings['projects_list'] : array();
        ?>
        <section id="projects" class="space-y-8 scroll-mt-24 relative">
            <span id="work" class="sr-only"></span>

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
                    <p class="text-neutral-500 text-xs sm:text-sm">
                        <?php echo esc_html( $section_desc ); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- 2x2 Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <?php foreach ( $projects as $idx => $project ) :
                    $title     = ! empty( $project['title'] ) ? $project['title'] : '';
                    $cat       = ! empty( $project['category'] ) ? $project['category'] : 'Websites';
                    $year      = ! empty( $project['year'] ) ? $project['year'] : '2026';
                    $tag_line  = ! empty( $project['tag'] ) ? $project['tag'] : "Let's create · @kausar.build";
                    $desc      = ! empty( $project['description'] ) ? $project['description'] : '';
                    $link_url  = ! empty( $project['project_url']['url'] ) ? $project['project_url']['url'] : '#';
                    $image_url = ! empty( $project['image']['url'] )
                        ? $project['image']['url']
                        : get_template_directory_uri() . '/assets/projects/project-1-one-job.svg';
                ?>
                    <article class="group bg-white rounded-3xl border border-neutral-200/80 overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 flex flex-col justify-between">
                        <!-- Image Box -->
                        <div class="aspect-square w-full overflow-hidden bg-neutral-900 relative block">
                            <img
                                src="<?php echo esc_url( $image_url ); ?>"
                                alt="<?php echo esc_attr( $title ); ?>"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                                loading="lazy"
                            />
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-xs px-2.5 py-1 rounded-full text-[10px] font-mono uppercase text-neutral-800 border border-white/60 shadow-2xs">
                                <?php echo esc_html( $cat ); ?>
                            </div>
                        </div>

                        <!-- Content Details -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="font-display font-bold text-neutral-900 text-lg leading-snug">
                                    <?php echo esc_html( $title ); ?>
                                </h3>
                                <?php if ( ! empty( $desc ) ) : ?>
                                    <p class="text-neutral-500 text-xs sm:text-sm mt-1.5 leading-relaxed">
                                        <?php echo esc_html( $desc ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="pt-4 border-t border-neutral-100 flex items-center justify-between text-xs font-mono">
                                <span class="text-neutral-400 font-medium">
                                    <?php echo esc_html( $tag_line ); ?>
                                </span>
                                <span class="text-neutral-400 font-medium">
                                    <?php echo esc_html( $year ); ?>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}
