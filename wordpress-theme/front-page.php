<?php
/**
 * The template for displaying the front page.
 *
 * @package Studio_Build
 */

get_header(); ?>

<main class="studio-container max-w-4xl mx-auto px-6 pt-32 sm:pt-40 pb-24 space-y-28 sm:space-y-36">

    <?php
    get_template_part( 'template-parts/hero/section-hero' );
    get_template_part( 'template-parts/about/section-about' );
    get_template_part( 'template-parts/projects/section-projects' );
    get_template_part( 'template-parts/services/section-services' );
    get_template_part( 'template-parts/testimonials/section-testimonials' );
    get_template_part( 'template-parts/process/section-process' );
    get_template_part( 'template-parts/booking/section-booking' );
    ?>

</main>

<?php get_footer(); ?>
