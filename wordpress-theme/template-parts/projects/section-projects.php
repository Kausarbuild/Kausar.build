<?php
/**
 * Projects Archive 2x2 Grid Template Part
 *
 * Reproduces React ProjectsSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$accent_color = get_theme_mod( 'studio_accent_color', '#E8590C' );
$theme_uri    = get_template_directory_uri();

$projects_query = new WP_Query( array(
    'post_type'      => array( 'portfolio_project', 'project' ),
    'posts_per_page' => 4,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$default_projects = array(
    array(
        'id'          => 'proj-1',
        'title'       => 'Your website has one job.',
        'category'    => 'Websites',
        'year'        => '2026',
        'tag'         => "Let's create · @kausar.build",
        'description' => 'A clean, high-impact digital presence engineered to convert visitors into believers without friction.',
        'image'       => $theme_uri . '/assets/projects/project-1-one-job.svg',
    ),
    array(
        'id'          => 'proj-2',
        'title'       => 'To make people trust your business.',
        'category'    => 'Strategy Through Design',
        'year'        => '2026',
        'tag'         => 'Branding · Websites · Experiences',
        'description' => 'Not confuse them. Clarity-first branding and website systems that establish credibility instantly.',
        'image'       => $theme_uri . '/assets/projects/project-2-trust-business.svg',
    ),
    array(
        'id'          => 'proj-3',
        'title'       => "Beautiful isn't enough. It has to convert.",
        'category'    => 'UI / Conversion',
        'year'        => '2026',
        'tag'         => 'Conversion Systems',
        'description' => 'Automate. Analyze. Accelerate. High-performance product interfaces engineered for measurable business growth.',
        'image'       => $theme_uri . '/assets/projects/project-3-convert-dashboard.svg',
    ),
    array(
        'id'          => 'proj-4',
        'title'       => 'I design websites that look premium and perform.',
        'category'    => 'Web Design',
        'year'        => '2026',
        'tag'         => 'Design + Development',
        'description' => 'Precision digital craft uniting high-end visual elegance with uncompromising speed and responsiveness.',
        'image'       => $theme_uri . '/assets/projects/project-4-premium-perform.svg',
    ),
);
?>
<section id="projects" class="space-y-8 scroll-mt-24 relative">
    <span id="work" class="sr-only"></span>
    <!-- Header -->
    <div class="space-y-1">
        <span
            class="font-mono text-xs font-semibold uppercase tracking-wider block"
            style="color: <?php echo esc_attr( $accent_color ); ?>;"
        >
            // Design Archive
        </span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
            Digital Product Design
        </h2>
        <p class="text-neutral-500 text-xs sm:text-sm">
            A collection of digital work, visual studies, and website concepts.
        </p>
    </div>

    <!-- 2x2 Project Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <?php if ( $projects_query->have_posts() ) : ?>
            <?php
            $count = 0;
            while ( $projects_query->have_posts() ) :
                $projects_query->the_post();
                $count++;
                $cat      = get_post_meta( get_the_ID(), '_project_category', true ) ?: 'Websites';
                $year     = get_post_meta( get_the_ID(), '_project_year', true ) ?: '2026';
                $tag_line = get_post_meta( get_the_ID(), '_project_tag', true ) ?: "Let's create · @kausar.build";
                
                // Check custom project image meta, then featured image, then customizer override, then fallback SVG
                $custom_proj_img = get_post_meta( get_the_ID(), '_project_image', true );
                $thumb = '';
                if ( ! empty( $custom_proj_img ) ) {
                    $thumb = is_numeric( $custom_proj_img ) ? wp_get_attachment_image_url( (int) $custom_proj_img, 'full' ) : $custom_proj_img;
                }
                if ( empty( $thumb ) ) {
                    $thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                }
                if ( empty( $thumb ) ) {
                    $svg_num = ( ( $count - 1 ) % 4 ) + 1;
                    $customizer_img = studio_build_get_image_src( 'studio_project_' . $svg_num . '_image', '' );
                    if ( ! empty( $customizer_img ) ) {
                        $thumb = $customizer_img;
                    } else {
                        $fallback_svgs = array(
                            1 => 'project-1-one-job.svg',
                            2 => 'project-2-trust-business.svg',
                            3 => 'project-3-convert-dashboard.svg',
                            4 => 'project-4-premium-perform.svg',
                        );
                        $thumb = $theme_uri . '/assets/projects/' . $fallback_svgs[ $svg_num ];
                    }
                }
            ?>
                <article
                    id="project-card-<?php the_ID(); ?>"
                    class="group bg-white rounded-3xl border border-neutral-200/80 overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 flex flex-col justify-between"
                >
                    <!-- Image Box: 1:1 Aspect Ratio -->
                    <div class="aspect-square w-full overflow-hidden bg-neutral-900 relative block">
                        <img
                            src="<?php echo esc_url( $thumb ); ?>"
                            alt="<?php the_title_attribute(); ?>"
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
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-neutral-500 text-xs sm:text-sm mt-1.5 leading-relaxed">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>
                        </div>

                        <div class="pt-4 border-t border-neutral-100 flex items-center justify-between gap-2 text-xs">
                            <span class="font-mono text-neutral-400 truncate">
                                <?php echo esc_html( $year ); ?> · <?php echo esc_html( $tag_line ); ?>
                            </span>
                            <span class="font-mono text-[10px] text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0">
                                <?php echo esc_html( $cat ); ?>
                            </span>
                        </div>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <?php foreach ( $default_projects as $idx => $project ) : 
                $p_num = $idx + 1;
                $proj_image_src = studio_build_get_image_src( 'studio_project_' . $p_num . '_image', $project['image'] );
            ?>
                <article
                    id="project-card-<?php echo esc_attr( $project['id'] ); ?>"
                    class="group bg-white rounded-3xl border border-neutral-200/80 overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 flex flex-col justify-between"
                >
                    <!-- Image Box: 1:1 Aspect Ratio -->
                    <div class="aspect-square w-full overflow-hidden bg-neutral-900 relative block">
                        <img
                            src="<?php echo esc_url( $proj_image_src ); ?>"
                            alt="<?php echo esc_attr( $project['title'] ); ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                            loading="lazy"
                        />
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-xs px-2.5 py-1 rounded-full text-[10px] font-mono uppercase text-neutral-800 border border-white/60 shadow-2xs">
                            <?php echo esc_html( $project['category'] ); ?>
                        </div>
                    </div>

                    <!-- Content Details -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="font-display font-bold text-neutral-900 text-lg leading-snug">
                                <?php echo esc_html( $project['title'] ); ?>
                            </h3>
                            <p class="text-neutral-500 text-xs sm:text-sm mt-1.5 leading-relaxed">
                                <?php echo esc_html( $project['description'] ); ?>
                            </p>
                        </div>

                        <div class="pt-4 border-t border-neutral-100 flex items-center justify-between gap-2 text-xs">
                            <span class="font-mono text-neutral-400 truncate">
                                <?php echo esc_html( $project['year'] ); ?> · <?php echo esc_html( $project['tag'] ); ?>
                            </span>
                            <span class="font-mono text-[10px] text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0">
                                <?php echo esc_html( $project['category'] ); ?>
                            </span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
