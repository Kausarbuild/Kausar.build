<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Studio_Build
 */

get_header();
?>

<main id="primary" class="site-main studio-container max-w-2xl mx-auto px-4 sm:px-6 pt-36 pb-24 text-center">
    <div class="bg-white rounded-3xl p-8 sm:p-14 border border-neutral-200/80 shadow-soft">
        <span class="inline-block px-3 py-1 rounded-full bg-neutral-100 border border-neutral-200 text-neutral-500 font-mono text-xs mb-4">
            404 Error
        </span>
        <h1 class="text-4xl sm:text-5xl font-display font-extrabold text-neutral-900 tracking-tight mb-4">
            <?php esc_html_e( 'Page Not Found', 'studio-build' ); ?>
        </h1>
        <p class="text-neutral-600 text-sm sm:text-base leading-relaxed mb-8 max-w-md mx-auto">
            <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'studio-build' ); ?>
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-xs font-semibold hover:bg-neutral-800 transition-colors shadow-sm">
                <?php esc_html_e( '← Return to Home', 'studio-build' ); ?>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
