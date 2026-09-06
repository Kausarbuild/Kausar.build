<?php
/**
 * Main index fallback template
 *
 * @package Studio_Build
 */

get_header(); ?>

<main class="studio-container max-w-4xl mx-auto px-6 pt-32 pb-24">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
