<?php
/**
 * Title: Hero Section
 * Slug: kausar-build/hero
 * Categories: featured, banner, kausar-build
 * Description: Editorial hero section with greeting, typography, action buttons, and ID badge card.
 * Keywords: hero, banner, lanyard, badge, introduction
 */
?>
<!-- wp:group {"metadata":{"name":"Hero Section"},"align":"wide","className":"hero-section-block py-8 sm:py-12","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide hero-section-block py-8 sm:py-12">
  <!-- wp:columns {"verticalAlignment":"center","className":"gap-8 lg:gap-12 items-center"} -->
  <div class="wp-block-columns gap-8 lg:gap-12 items-center">
    
    <!-- wp:column {"width":"58%","className":"space-y-6"} -->
    <div class="wp-block-column space-y-6" style="flex-basis:58%">
      
      <!-- Availability Badge -->
      <!-- wp:group {"className":"inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-800 text-xs font-mono font-medium","layout":{"type":"flex","flexWrap":"nowrap"}} -->
      <div class="wp-block-group inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-800 text-xs font-mono font-medium">
        <!-- wp:paragraph {"className":"m-0 flex items-center gap-1.5"} -->
        <p class="m-0 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>AVAILABLE FOR Q3/Q4 WORK</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- Main Headline -->
      <!-- wp:heading {"level":1,"className":"text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-neutral-900 leading-[1.08] m-0"} -->
      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-neutral-900 leading-[1.08] m-0">Hello, I’m Kausar. <span class="text-neutral-500 font-normal block sm:inline">I Turn Ideas Into Websites.</span></h1>
      <!-- /wp:heading -->

      <!-- Bio Paragraph -->
      <!-- wp:paragraph {"className":"text-base sm:text-lg text-neutral-600 leading-relaxed max-w-xl"} -->
      <p class="text-base sm:text-lg text-neutral-600 leading-relaxed max-w-xl">I design and build websites with a focus on great design, clean work, and a smooth experience. Simple, thoughtful, and made to last. Open for projects ↓</p>
      <!-- /wp:paragraph -->

      <!-- Action Buttons -->
      <!-- wp:buttons {"className":"flex flex-wrap items-center gap-3 pt-2"} -->
      <div class="wp-block-buttons flex flex-wrap items-center gap-3 pt-2">
        <!-- wp:button {"backgroundColor":"accent-orange","textColor":"canvas","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"24px","right":"24px"}},"typography":{"fontSize":"14px","fontWeight":"600"}},"className":"hover:bg-orange-700 shadow-sm transition-all"} -->
        <div class="wp-block-button hover:bg-orange-700 shadow-sm transition-all"><a class="wp-block-button__link has-canvas-color has-accent-orange-background-color has-text-color has-background wp-element-button" href="#book" style="border-radius:9999px;padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px;font-size:14px;font-weight:600">Let's connect</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"card","textColor":"text-main","style":{"border":{"radius":"9999px","width":"1px","style":"solid","color":"#E5E7EB"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"22px","right":"22px"}},"typography":{"fontSize":"14px","fontWeight":"500"}},"className":"hover:bg-neutral-50 shadow-xs transition-all"} -->
        <div class="wp-block-button hover:bg-neutral-50 shadow-xs transition-all"><a class="wp-block-button__link has-text-main-color has-card-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( get_template_directory_uri() . '/assets/docs/kausar-cv.pdf' ); ?>" download="Kausar-CV.pdf" style="border-radius:9999px;border-width:1px;border-style:solid;border-color:#E5E7EB;padding-top:12px;padding-right:22px;padding-bottom:12px;padding-left:22px;font-size:14px;font-weight:500">Download CV</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->

    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"42%","className":"flex justify-center"} -->
    <div class="wp-block-column flex justify-center" style="flex-basis:42%">
      
      <!-- Interactive ID Badge Card -->
      <!-- wp:group {"className":"relative w-full max-w-[320px] bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xl space-y-5 group hover:shadow-2xl transition-all duration-300"} -->
      <div class="wp-block-group relative w-full max-w-[320px] bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xl space-y-5 group hover:shadow-2xl transition-all duration-300">
        
        <!-- Badge Lanyard Hole -->
        <!-- wp:group {"className":"w-10 h-3 bg-neutral-100 rounded-full mx-auto border border-neutral-300/80 shadow-inner"} -->
        <div class="wp-block-group w-10 h-3 bg-neutral-100 rounded-full mx-auto border border-neutral-300/80 shadow-inner"></div>
        <!-- /wp:group -->

        <!-- Profile Photo -->
        <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"rounded-2xl overflow-hidden border border-neutral-200 shadow-sm"} -->
        <figure class="wp-block-image size-large rounded-2xl overflow-hidden border border-neutral-200 shadow-sm"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&amp;fit=crop&amp;w=600&amp;q=80" alt="Kausar - Design Engineer" style="aspect-ratio:1;object-fit:cover"/></figure>
        <!-- /wp:image -->

        <!-- Name & Details -->
        <!-- wp:group {"className":"text-center space-y-1"} -->
        <div class="wp-block-group text-center space-y-1">
          <!-- wp:heading {"level":3,"className":"text-xl font-bold text-neutral-900 tracking-tight m-0"} -->
          <h3 class="text-xl font-bold text-neutral-900 tracking-tight m-0">KAUSAR</h3>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"className":"text-xs text-orange-600 font-mono font-semibold uppercase tracking-wider"} -->
          <p class="text-xs text-orange-600 font-mono font-semibold uppercase tracking-wider">DESIGN ENGINEER</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Barcode Graphic / Badge ID Footer -->
        <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"},"className":"pt-3 border-t border-dashed border-neutral-200 text-[11px] font-mono text-neutral-400"} -->
        <div class="wp-block-group flex items-center justify-between pt-3 border-t border-dashed border-neutral-200 text-[11px] font-mono text-neutral-400">
          <!-- wp:paragraph -->
          <p>ID: #8824-KB</p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p>DEV / DESIGN</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
