<?php
/**
 * Services Accordion Template Part
 *
 * Reproduces React ServicesSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$accent_color = get_theme_mod( 'studio_accent_color', '#E8590C' );

$services_query = new WP_Query( array(
    'post_type'      => 'studio_service',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$default_services = array(
    array(
        'id'          => 'serv-1',
        'number'      => '01',
        'title'       => 'Web Design',
        'description' => 'Thoughtful websites with clear structure, strong typography, and responsive layouts.',
    ),
    array(
        'id'          => 'serv-2',
        'number'      => '02',
        'title'       => 'UI / Product Design',
        'description' => 'Interfaces designed around clarity, usability, and a consistent visual system.',
    ),
    array(
        'id'          => 'serv-3',
        'number'      => '03',
        'title'       => 'Web Development',
        'description' => 'Clean, responsive implementation that turns designs into working websites.',
    ),
    array(
        'id'          => 'serv-4',
        'number'      => '04',
        'title'       => 'Design Systems',
        'description' => 'Reusable components and visual systems that keep digital products consistent as they grow.',
    ),
    array(
        'id'          => 'serv-5',
        'number'      => '05',
        'title'       => 'Interaction & Motion',
        'description' => 'Subtle interactions and motion that make a digital experience feel considered.',
    ),
);
?>
<section id="services" class="space-y-8 scroll-mt-24">
    <!-- Header -->
    <div class="space-y-1">
        <span
            class="font-mono text-xs font-semibold uppercase tracking-wider block"
            style="color: <?php echo esc_attr( $accent_color ); ?>;"
        >
            // Services i provide
        </span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
            I can help you with these things
        </h2>
    </div>

    <!-- Accordion Rows -->
    <div class="border-t border-neutral-200 divide-y divide-neutral-200/90" id="services-accordion-list">
        <?php if ( $services_query->have_posts() ) : ?>
            <?php
            $counter = 1;
            while ( $services_query->have_posts() ) :
                $services_query->the_post();
                $is_open = ( $counter === 1 );
                $num_str = sprintf( '%02d', $counter );
            ?>
                <div
                    id="service-row-<?php the_ID(); ?>"
                    class="py-5 sm:py-6 transition-colors group cursor-pointer service-accordion-row"
                    data-service-id="<?php the_ID(); ?>"
                >
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 sm:gap-6 min-w-0">
                            <span class="font-mono text-xs sm:text-sm text-neutral-400 w-6 sm:w-8 shrink-0">
                                <?php echo esc_html( $num_str ); ?>
                            </span>
                            <h3 class="font-display font-semibold text-neutral-900 text-sm sm:text-lg lg:text-xl group-hover:text-neutral-700 transition-colors">
                                <?php the_title(); ?>
                            </h3>
                        </div>
                        <div
                            class="w-7 h-7 rounded-full border border-neutral-200 flex items-center justify-center text-neutral-400 group-hover:border-neutral-400 transition-all duration-300 shrink-0 service-icon <?php echo $is_open ? 'rotate-45 text-neutral-900 border-neutral-900' : ''; ?>"
                        >
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/><path d="M12 5v14"/>
                            </svg>
                        </div>
                    </div>

                    <div class="service-details mt-2.5 pl-9 sm:pl-14 max-w-2xl <?php echo $is_open ? '' : 'hidden'; ?>">
                        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-normal mb-2.5">
                            <?php echo esc_html( get_the_excerpt() ?: get_the_content() ); ?>
                        </p>
                        <a
                            href="#book"
                            class="inline-flex items-center gap-1.5 text-xs font-mono text-neutral-900 font-medium hover:underline hover:text-orange-600 transition-colors"
                        >
                            <span>Inquire about this service</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php $counter++; endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <?php foreach ( $default_services as $idx => $service ) :
                $is_open = ( $idx === 0 );
            ?>
                <div
                    id="service-row-<?php echo esc_attr( $service['id'] ); ?>"
                    class="py-5 sm:py-6 transition-colors group cursor-pointer service-accordion-row"
                    data-service-id="<?php echo esc_attr( $service['id'] ); ?>"
                >
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 sm:gap-6 min-w-0">
                            <span class="font-mono text-xs sm:text-sm text-neutral-400 w-6 sm:w-8 shrink-0">
                                <?php echo esc_html( $service['number'] ); ?>
                            </span>
                            <h3 class="font-display font-semibold text-neutral-900 text-sm sm:text-lg lg:text-xl group-hover:text-neutral-700 transition-colors">
                                <?php echo esc_html( $service['title'] ); ?>
                            </h3>
                        </div>
                        <div
                            class="w-7 h-7 rounded-full border border-neutral-200 flex items-center justify-center text-neutral-400 group-hover:border-neutral-400 transition-all duration-300 shrink-0 service-icon <?php echo $is_open ? 'rotate-45 text-neutral-900 border-neutral-900' : ''; ?>"
                        >
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/><path d="M12 5v14"/>
                            </svg>
                        </div>
                    </div>

                    <div class="service-details mt-2.5 pl-9 sm:pl-14 max-w-2xl <?php echo $is_open ? '' : 'hidden'; ?>">
                        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-normal mb-2.5">
                            <?php echo esc_html( $service['description'] ); ?>
                        </p>
                        <a
                            href="#book"
                            class="inline-flex items-center gap-1.5 text-xs font-mono text-neutral-900 font-medium hover:underline hover:text-orange-600 transition-colors"
                        >
                            <span>Inquire about this service</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
