<?php
/**
 * Testimonials Carousel Template Part
 *
 * Reproduces React TestimonialsSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$accent_color = get_theme_mod( 'studio_accent_color', '#E8590C' );

$test_query = new WP_Query( array(
    'post_type'      => array( 'client_testimonial', 'testimonial' ),
    'posts_per_page' => 10,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$default_testimonials = array(
    array(
        'quote'   => 'A thoughtful placeholder for a real client testimonial.',
        'author'  => 'Client Name',
        'role'    => 'Role / Position',
        'company' => 'Company',
        'avatar'  => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
    ),
    array(
        'quote'   => 'Working with Kausar felt effortless. The level of craftsmanship and attention to micro-interactions set a new standard for our web experience.',
        'author'  => 'Alex Rivera',
        'role'    => 'Design Director',
        'company' => 'Stripe',
        'avatar'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
    ),
    array(
        'quote'   => 'Delivered our flagship web application ahead of schedule with immaculate code quality and unmatched visual finesse.',
        'author'  => 'Marcus Reid',
        'role'    => 'Co-founder',
        'company' => 'Orion Labs',
        'avatar'  => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80',
    ),
    array(
        'quote'   => 'Kausar has an extraordinary eye for UI refinement. The resulting product feels crisp, responsive, and thoughtfully assembled in every view.',
        'author'  => 'Sarah Chen',
        'role'    => 'VP of Product',
        'company' => 'Linear',
        'avatar'  => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&q=80',
    ),
    array(
        'quote'   => 'Rarely do you find someone who effortlessly bridges high-end visual aesthetics with clean, bulletproof engineering. Truly exceptional execution.',
        'author'  => 'Elena Rostova',
        'role'    => 'Creative Director',
        'company' => 'Studio Monolith',
        'avatar'  => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&q=80',
    ),
    array(
        'quote'   => 'Our conversion metrics jumped noticeably following Kausar’s website rebuild. The clarity of typography and hierarchy makes all the difference.',
        'author'  => 'David Vance',
        'role'    => 'Head of Growth',
        'company' => 'Craft Commerce',
        'avatar'  => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&q=80',
    ),
    array(
        'quote'   => 'From initial layout prototypes to the final responsive delivery, working together was seamless and fast. An indispensable design partner.',
        'author'  => 'Maya Lin',
        'role'    => 'Founder & CEO',
        'company' => 'Nori Tech',
        'avatar'  => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&q=80',
    ),
);
?>
<section id="testimonials" class="space-y-8 scroll-mt-24">
    <!-- Header -->
    <div class="space-y-1">
        <span
            class="font-mono text-xs font-semibold uppercase tracking-wider block"
            style="color: <?php echo esc_attr( $accent_color ); ?>;"
        >
            // good words
        </span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
            some good words from people I've worked with
        </h2>
    </div>

    <!-- Main Testimonial Card -->
    <div class="bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-10 lg:p-12 shadow-soft relative overflow-hidden testimonial-container">
        <!-- Subtle dot pattern background -->
        <div class="absolute inset-0 bg-grid-dots opacity-30 pointer-events-none"></div>

        <?php if ( $test_query->have_posts() ) : ?>
            <?php $i = 0; while ( $test_query->have_posts() ) : $test_query->the_post();
                $role    = get_post_meta( get_the_ID(), '_testimonial_role', true ) ?: 'Role / Position';
                $company = get_post_meta( get_the_ID(), '_testimonial_company', true ) ?: 'Company';
                $custom_avatar = get_post_meta( get_the_ID(), '_testimonial_avatar', true );
                $avatar = '';
                if ( ! empty( $custom_avatar ) ) {
                    $avatar = is_numeric( $custom_avatar ) ? wp_get_attachment_image_url( (int) $custom_avatar, 'medium' ) : $custom_avatar;
                }
                if ( empty( $avatar ) ) {
                    $avatar = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                }
                if ( empty( $avatar ) ) {
                    $fallback_avatars = array(
                        0 => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
                        1 => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
                        2 => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=400&q=80',
                    );
                    $avatar = isset( $fallback_avatars[ $i % 3 ] ) ? $fallback_avatars[ $i % 3 ] : $fallback_avatars[0];
                }
                $hidden_class = ( $i === 0 ) ? '' : 'hidden';
            ?>
                <div class="testimonial-slide <?php echo esc_attr( $hidden_class ); ?> grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                    <!-- Left: Stacked polaroids avatar -->
                    <div class="md:col-span-4 flex items-center justify-center">
                        <div class="relative w-36 h-36 sm:w-44 sm:h-44 select-none">
                            <div class="absolute inset-0 bg-neutral-100 rounded-2xl rotate-6 border border-neutral-200 shadow-2xs"></div>
                            <div class="absolute inset-0 bg-neutral-200 rounded-2xl -rotate-4 border border-neutral-200 shadow-xs"></div>
                            <div class="absolute inset-0 rounded-2xl overflow-hidden shadow-md border-3 border-white">
                                <img
                                    src="<?php echo esc_url( $avatar ); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quote, Author info, and Next/Prev Controls -->
                    <div class="md:col-span-8 space-y-5">
                        <span
                            class="text-5xl font-serif font-black leading-none block select-none -mb-3"
                            style="color: <?php echo esc_attr( $accent_color ); ?>;"
                        >
                            “
                        </span>

                        <p class="text-base sm:text-lg lg:text-xl text-neutral-800 font-medium leading-relaxed">
                            <?php echo get_the_content(); ?>
                        </p>

                        <div class="pt-3 flex flex-wrap sm:flex-nowrap items-center justify-between gap-3 border-t border-neutral-100">
                            <div class="min-w-0 flex-1">
                                <p class="font-display font-bold text-neutral-900 text-sm sm:text-base truncate">
                                    <?php the_title(); ?>
                                </p>
                                <p class="text-neutral-500 text-xs sm:text-sm font-mono truncate">
                                    <?php echo esc_html( $role . ', ' . $company ); ?>
                                </p>
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
            <?php $i++; endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <?php foreach ( $default_testimonials as $idx => $item ) :
                $hidden_class = ( $idx === 0 ) ? '' : 'hidden';
            ?>
                <div class="testimonial-slide <?php echo esc_attr( $hidden_class ); ?> grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
                    <!-- Left: Stacked polaroids avatar -->
                    <div class="md:col-span-4 flex items-center justify-center">
                        <div class="relative w-36 h-36 sm:w-44 sm:h-44 select-none">
                            <div class="absolute inset-0 bg-neutral-100 rounded-2xl rotate-6 border border-neutral-200 shadow-2xs"></div>
                            <div class="absolute inset-0 bg-neutral-200 rounded-2xl -rotate-4 border border-neutral-200 shadow-xs"></div>
                            <div class="absolute inset-0 rounded-2xl overflow-hidden shadow-md border-3 border-white">
                                <img
                                    src="<?php echo esc_url( $item['avatar'] ); ?>"
                                    alt="<?php echo esc_attr( $item['author'] ); ?>"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quote, Author info, and Next/Prev Controls -->
                    <div class="md:col-span-8 space-y-5">
                        <span
                            class="text-5xl font-serif font-black leading-none block select-none -mb-3"
                            style="color: <?php echo esc_attr( $accent_color ); ?>;"
                        >
                            “
                        </span>

                        <p class="text-base sm:text-lg lg:text-xl text-neutral-800 font-medium leading-relaxed">
                            <?php echo esc_html( $item['quote'] ); ?>
                        </p>

                        <div class="pt-3 flex flex-wrap sm:flex-nowrap items-center justify-between gap-3 border-t border-neutral-100">
                            <div class="min-w-0 flex-1">
                                <p class="font-display font-bold text-neutral-900 text-sm sm:text-base truncate">
                                    <?php echo esc_html( $item['author'] ); ?>
                                </p>
                                <p class="text-neutral-500 text-xs sm:text-sm font-mono truncate">
                                    <?php echo esc_html( $item['role'] . ', ' . $item['company'] ); ?>
                                </p>
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
        <?php endif; ?>
    </div>
</section>
