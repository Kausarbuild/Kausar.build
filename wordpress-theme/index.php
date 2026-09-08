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

if ( is_front_page() ) {
    include get_template_directory() . '/front-page.php';
    return;
}

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
                        <h2 class="entry-title text-xl sm:text-2xl font-display font-bold text-neutral-900 hover:text-[#E8590C] transition-colors">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail mb-6 rounded-xl overflow-hidden aspect-[16/9] bg-neutral-100">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-summary text-neutral-600 text-sm sm:text-base leading-relaxed mb-6 font-normal">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="entry-footer pt-4 border-t border-neutral-100 flex items-center justify-between">
                        <a href="<?php the_permalink(); ?>" class="text-xs font-mono font-medium text-neutral-900 hover:text-[#E8590C] flex items-center gap-1 transition-colors">
                            <span><?php esc_html_e( 'Read Article', 'studio-build' ); ?></span>
                            <span>→</span>
                        </a>
                        <span class="text-xs font-mono text-neutral-400">
                            <?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
                        </span>
                    </footer>
                </article>
            <?php endwhile; ?>
        </div>

        <?php
        the_posts_pagination( array(
            'prev_text'          => '← ' . esc_html__( 'Previous', 'studio-build' ),
            'next_text'          => esc_html__( 'Next', 'studio-build' ) . ' →',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'studio-build' ) . ' </span>',
            'class'              => 'pagination flex justify-center items-center gap-2 pt-12 text-sm font-mono',
        ) );
        ?>

    <?php else : ?>

        <div class="no-results not-found bg-white rounded-2xl p-10 text-center border border-neutral-200 shadow-soft max-w-lg mx-auto">
            <div class="w-12 h-12 rounded-full bg-neutral-100 text-neutral-400 flex items-center justify-center mx-auto mb-4 font-mono text-lg">
                ?
            </div>
            <h1 class="page-title text-2xl font-display font-bold text-neutral-900 mb-2">
                <?php esc_html_e( 'Nothing Found', 'studio-build' ); ?>
            </h1>
            <p class="text-neutral-500 text-sm mb-6">
                <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Try returning to the homepage.', 'studio-build' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-xs font-medium hover:bg-neutral-800 transition-all">
                <span>←</span>
                <span><?php esc_html_e( 'Back to Home', 'studio-build' ); ?></span>
            </a>
        </div>

    <?php endif; ?>
</main>

<?php
get_footer();
