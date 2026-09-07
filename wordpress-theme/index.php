<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio_Build
 */

get_header();
?>

<main id="primary" class="site-main studio-container max-w-4xl mx-auto px-4 sm:px-6 pt-28 sm:pt-36 pb-24">
    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="mb-12 text-center">
                <h1 class="text-3xl sm:text-4xl font-display font-bold text-neutral-900 tracking-tight mb-3">
                    <?php single_post_title(); ?>
                </h1>
                <p class="text-neutral-500 font-mono text-xs">
                    // <?php bloginfo( 'description' ); ?>
                </p>
            </header>
        <?php elseif ( is_archive() ) : ?>
            <header class="mb-12 text-center">
                <h1 class="text-3xl sm:text-4xl font-display font-bold text-neutral-900 tracking-tight mb-3">
                    <?php the_archive_title(); ?>
                </h1>
                <?php the_archive_description( '<div class="text-neutral-500 font-mono text-xs">// ', '</div>' ); ?>
            </header>
        <?php elseif ( is_search() ) : ?>
            <header class="mb-12 text-center">
                <h1 class="text-3xl sm:text-4xl font-display font-bold text-neutral-900 tracking-tight mb-3">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'studio-build' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h1>
            </header>
        <?php endif; ?>

        <div class="space-y-8">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white rounded-2xl p-6 sm:p-8 border border-neutral-200/80 shadow-soft transition-all hover:border-neutral-300' ); ?>>
                    <header class="entry-header mb-4">
                        <div class="flex items-center gap-3 text-xs font-mono text-neutral-400 mb-2">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                            <span>·</span>
                            <span><?php echo esc_html( get_the_author() ); ?></span>
                            <?php if ( has_category() ) : ?>
                                <span>·</span>
                                <span class="text-[#E8590C]"><?php the_category( ', ' ); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ( is_singular() ) : ?>
                            <h1 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight">
                                <?php the_title(); ?>
                            </h1>
                        <?php else : ?>
                            <h2 class="text-xl sm:text-2xl font-display font-bold text-neutral-900 tracking-tight hover:text-[#E8590C] transition-colors">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                        <?php endif; ?>
                    </header>

                    <?php if ( has_post_thumbnail() && ! is_singular() ) : ?>
                        <div class="aspect-video w-full rounded-xl overflow-hidden bg-neutral-100 mb-6 border border-neutral-200/60">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content text-neutral-600 leading-relaxed space-y-4">
                        <?php
                        if ( is_singular() ) {
                            the_content();
                            wp_link_pages( array(
                                'before' => '<div class="page-links mt-6 pt-4 border-t border-neutral-100 font-mono text-xs">' . esc_html__( 'Pages:', 'studio-build' ),
                                'after'  => '</div>',
                            ) );
                        } else {
                            the_excerpt();
                            ?>
                            <div class="pt-2">
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1.5 text-xs font-mono font-semibold text-[#E8590C] hover:underline">
                                    <?php esc_html_e( 'Read More →', 'studio-build' ); ?>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </article>
                <?php
            endwhile;

            the_posts_navigation( array(
                'prev_text' => esc_html__( '← Older posts', 'studio-build' ),
                'next_text' => esc_html__( 'Newer posts →', 'studio-build' ),
            ) );
            ?>
        </div>

    <?php else : ?>

        <div class="bg-white rounded-2xl p-8 sm:p-12 border border-neutral-200/80 shadow-soft text-center max-w-lg mx-auto">
            <span class="text-4xl mb-4 block">🔍</span>
            <h2 class="text-xl font-display font-bold text-neutral-900 mb-2">
                <?php esc_html_e( 'Nothing Found', 'studio-build' ); ?>
            </h2>
            <p class="text-sm text-neutral-500 mb-6">
                <?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'studio-build' ); ?>
            </p>
            <div class="max-w-xs mx-auto">
                <?php get_search_form(); ?>
            </div>
        </div>

    <?php endif; ?>
</main>

<?php
get_footer();
