<?php
/**
 * The template for displaying all single posts
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
                <div class="flex items-center gap-3 text-xs font-mono text-neutral-400 mb-3">
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

            <?php if ( has_tag() ) : ?>
                <footer class="entry-footer mt-8 pt-6 border-t border-neutral-100 flex items-center gap-2 flex-wrap font-mono text-xs">
                    <span class="text-neutral-400"><?php esc_html_e( 'Tags:', 'studio-build' ); ?></span>
                    <?php the_tags( '<span class="bg-neutral-100 text-neutral-700 px-2.5 py-0.5 rounded-md border border-neutral-200">#', '</span> <span class="bg-neutral-100 text-neutral-700 px-2.5 py-0.5 rounded-md border border-neutral-200">#', '</span>' ); ?>
                </footer>
            <?php endif; ?>
        </article>

        <?php
        the_post_navigation( array(
            'prev_text' => '<span class="nav-subtitle font-mono text-xs text-neutral-400 block">' . esc_html__( '← Previous Post', 'studio-build' ) . '</span> <span class="nav-title font-medium text-neutral-800">%title</span>',
            'next_text' => '<span class="nav-subtitle font-mono text-xs text-neutral-400 block">' . esc_html__( 'Next Post →', 'studio-build' ) . '</span> <span class="nav-title font-medium text-neutral-800">%title</span>',
            'class'     => 'mt-8 flex justify-between gap-4 bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-soft',
        ) );
    endwhile;
    ?>
</main>

<?php
get_footer();
