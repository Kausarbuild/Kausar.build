<?php
/**
 * Template Name: Consultation & Booking
 *
 * Dedicated Consultation Page Template
 * Completely editable in WordPress Admin.
 *
 * @package Studio_Build
 */

get_header();

$accent_color = get_theme_mod( 'studio_accent_color', '#E8590C' );
?>

<main id="primary" class="site-main flex-1 max-w-4xl w-full mx-auto px-4 sm:px-6 pt-24 sm:pt-32 pb-16 sm:pb-24 space-y-12">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Editable Page Header from WordPress Editor -->
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'space-y-6' ); ?>>
            <header class="space-y-3">
                <span class="font-mono text-xs font-semibold uppercase tracking-wider block" style="color: <?php echo esc_attr( $accent_color ); ?>;">
                    // Consultation
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-neutral-900 tracking-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <?php if ( get_the_content() ) : ?>
                <div class="prose prose-neutral max-w-none text-neutral-600 text-sm sm:text-base leading-relaxed">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </article>
    <?php endwhile; ?>

    <!-- Interactive 3-Step Consultation Booking Component -->
    <div class="pt-4">
        <?php get_template_part( 'template-parts/booking/section', 'booking' ); ?>
    </div>
</main>

<?php
get_footer();
