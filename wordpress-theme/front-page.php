<?php
/**
 * The template for displaying the front page.
 *
 * @package Studio_Build
 */

get_header(); ?>

<main class="flex-1 max-w-4xl w-full mx-auto px-4 sm:px-6 pt-20 sm:pt-28 pb-16 sm:pb-24 space-y-20 sm:space-y-28">

    <?php
    // 1. Hero Section with 3D Hanging Lanyard Pass
    get_template_part( 'template-parts/hero/section-hero' );

    // 2. About Me Bento Grid
    get_template_part( 'template-parts/about/section-about' );

    // 3. Design Archive (Projects)
    get_template_part( 'template-parts/projects/section-projects' );

    // 4. Services Accordions 01-05
    get_template_part( 'template-parts/services/section-services' );

    // 5. Good Words (Testimonials Slider)
    get_template_part( 'template-parts/testimonials/section-testimonials' );

    // 6. How It Works (Profile Verification & Monthly Retainer)
    get_template_part( 'template-parts/process/section-process' );

    // 7. Instant Consultation Booking UI
    get_template_part( 'template-parts/booking/section-booking' );
    ?>

</main>

<?php get_footer(); ?>
