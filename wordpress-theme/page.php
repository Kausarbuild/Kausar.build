<?php
/**
 * The template for displaying all pages
 *
 * @package Studio_Build
 */

get_header();
?>

<main id="primary" class="site-main studio-container max-w-4xl mx-auto px-4 sm:px-6 pt-28 sm:pt-36 pb-24">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white rounded-3xl p-6 sm:p-10 border border-neutral-200/80 shadow-soft' ); ?>>
            <header class="entry-header mb-8 pb-6 border-b border-neutral-100">
                <h1 class="text-3xl sm:text-4xl font-display font-bold text-neutral-900 tracking-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="aspect-video w-full rounded-2xl overflow-hidden bg-neutral-100 mb-8 border border-neutral-200/60">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content text-neutral-700 leading-relaxed space-y-4">
                <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links mt-8 pt-4 border-t border-neutral-100 font-mono text-xs">' . esc_html__( 'Pages:', 'studio-build' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
