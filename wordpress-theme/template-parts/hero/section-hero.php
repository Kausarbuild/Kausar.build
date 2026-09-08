<?php
/**
 * Hero Section Template Part with Hanging 3D Lanyard Pass
 *
 * Reproduces React HeroSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$status_badge     = get_theme_mod( 'studio_status_badge', 'Available for projects' );
$hero_greeting    = get_theme_mod( 'studio_hero_greeting', 'Hello, I’m Kausar.' );
$hero_headline    = get_theme_mod( 'studio_hero_headline', 'I Turn Ideas Into Websites.' );
$hero_description = get_theme_mod( 'studio_hero_description', 'I design and build websites with a focus on great design, clean work, and a smooth experience. Simple, thoughtful, and made to last. Open for projects ↓' );
$cv_default_file  = get_template_directory_uri() . '/assets/docs/kausar-cv.pdf';
$cv_url           = get_theme_mod( 'studio_cv_url', $cv_default_file );
if ( empty( $cv_url ) || $cv_url === '#cv' ) {
    $cv_url = $cv_default_file;
}
$accent_color     = get_theme_mod( 'studio_accent_color', '#E8590C' );
$hero_image       = studio_build_get_image_src( 'studio_hero_image', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80' );
$badge_name       = get_theme_mod( 'studio_badge_name', 'KAUSAR' );
$badge_role       = get_theme_mod( 'studio_badge_role', 'DESIGN + DEVELOPMENT' );
$badge_pass_id    = get_theme_mod( 'studio_badge_pass_id', 'BUILD #01' );
$profile_name     = get_theme_mod( 'studio_profile_name', 'Kausar' );

// Calculate suffix matching React logic
$raw_greeting = trim( $hero_greeting );
$suffix = ', I’m ' . $profile_name . '.';
if ( strtolower( $raw_greeting ) === 'hello' || strtolower( $raw_greeting ) === 'hi' ) {
    $suffix = '';
} else {
    $stripped = preg_replace( '/^(Hello|Hi|Hey|Bonjour|Hola|Ciao|Namaste)[,\s]*/i', '', $raw_greeting );
    $stripped = trim( $stripped );
    if ( ! empty( $stripped ) ) {
        $suffix = str_starts_with( $stripped, ',' ) ? $stripped : ', ' . $stripped;
    }
}
?>
<section id="hero" class="relative pt-8 sm:pt-14">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-14 items-center">
        <!-- Left Column: Greeting, Headline & Bio (order-2 on mobile, order-1 on desktop) -->
        <div id="hero-content" class="order-2 md:order-1 md:col-span-7 lg:col-span-8 space-y-6">
            <!-- Status Badge -->
            <div
                id="hero-status-pill"
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-mono tracking-tight shadow-2xs"
            >
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span><?php echo esc_html( $status_badge ); ?></span>
            </div>

            <!-- Headline cluster -->
            <div class="space-y-1.5">
                <h1
                    id="hero-greeting-heading"
                    class="text-3xl sm:text-5xl lg:text-6xl font-display font-extrabold tracking-tight text-neutral-900 leading-[1.14]"
                >
                    <span class="inline-block relative overflow-hidden align-bottom py-1 -my-1">
                        <span id="hero-greeting-cycler" class="inline-block text-neutral-900 transition-all duration-300">Hello</span>
                    </span>
                    <?php if ( ! empty( $suffix ) ) : ?>
                        <span class="text-neutral-900"><?php echo esc_html( $suffix ); ?></span>
                    <?php endif; ?>
                </h1>
                <p
                    id="hero-headline-sub"
                    class="text-xl sm:text-3xl lg:text-4xl font-display font-semibold text-neutral-400 tracking-tight leading-snug"
                >
                    <?php echo esc_html( $hero_headline ); ?>
                </p>
            </div>

            <!-- Description -->
            <p
                id="hero-bio-description"
                class="text-neutral-600 text-sm sm:text-base lg:text-lg leading-relaxed max-w-xl font-normal"
            >
                <?php echo esc_html( $hero_description ); ?>
            </p>

            <!-- CTAs -->
            <div id="hero-cta-buttons" class="flex flex-wrap items-center gap-3 pt-2">
                <!-- Download CV -->
                <a
                    id="btn-download-cv"
                    href="<?php echo esc_url( $cv_url ); ?>"
                    download="Kausar-CV.pdf"
                    class="btn-download-cv inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-neutral-300 text-neutral-800 text-xs sm:text-sm font-medium hover:border-neutral-400 hover:bg-neutral-50 transition-all shadow-xs cursor-pointer"
                >
                    <svg class="w-4 h-4 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Download CV</span>
                </a>

                <!-- Let's connect -->
                <a
                    id="btn-hero-connect"
                    href="#book"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-xs sm:text-sm font-medium hover:bg-neutral-800 transition-all shadow-sm"
                >
                    <span
                        class="w-2 h-2 rounded-full"
                        style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                    ></span>
                    <span>Let's connect</span>
                </a>
            </div>
        </div>

        <!-- Right Column: Physical Hanging Lanyard Pass Graphic (order-1 on mobile so badge is first screen) -->
        <div
            id="hero-lanyard-stage"
            class="order-1 md:order-2 md:col-span-5 lg:col-span-4 flex justify-center md:justify-end select-none pt-12 sm:pt-16 md:pt-0 relative overflow-visible"
        >
            <div
                id="hero-lanyard-wrapper"
                class="relative w-52 sm:w-60 flex flex-col items-center cursor-grab active:cursor-grabbing transition-transform duration-150 ease-out"
            >
                <!-- Realistic Lanyard Strap going upwards -->
                <div class="absolute -top-36 w-12 h-36 lanyard-strap rounded-b shadow-inner z-10 opacity-95">
                    <div class="w-full h-full bg-gradient-to-b from-transparent via-transparent to-black/30"></div>
                </div>

                <!-- Hanging Clip Hardware -->
                <div class="absolute -top-7 w-14 h-7 bg-neutral-800 rounded-t-md flex items-center justify-center z-20 border-b border-neutral-700 shadow-md">
                    <div class="w-7 h-2 bg-neutral-400 rounded-xs"></div>
                </div>
                <!-- Metallic Loop Hook -->
                <div class="absolute -top-2.5 w-9 h-3.5 bg-neutral-300 rounded-xs z-20 shadow-sm border border-neutral-400"></div>

                <!-- Lanyard Pass Badge Card -->
                <div
                    id="hero-lanyard-badge"
                    class="w-full bg-white rounded-3xl p-2.5 shadow-2xl border border-neutral-200/90 relative z-20 lanyard-card"
                >
                    <!-- Slot Hole for hook -->
                    <div class="w-10 h-1.5 bg-neutral-900 mx-auto rounded-full mb-2 shadow-inner"></div>

                    <!-- Badge Image Frame -->
                    <div class="w-full aspect-[4/5] rounded-2xl overflow-hidden bg-neutral-900 relative shadow-md flex flex-col justify-between">
                        <img
                            src="<?php echo esc_url( $hero_image ); ?>"
                            alt="<?php echo esc_attr( $badge_name ); ?>"
                            class="w-full h-full object-cover pointer-events-none"
                            loading="eager"
                        />
                        <!-- Understated Personal Design Detail -->
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-3 pt-6 text-white text-left">
                            <p class="font-display font-bold text-xs tracking-wider uppercase">
                                <?php echo esc_html( $badge_name ?: 'KAUSAR' ); ?>
                            </p>
                            <p class="text-[10px] font-mono text-neutral-300 tracking-tight">
                                <?php echo esc_html( $badge_role ?: 'DESIGN + DEVELOPMENT' ); ?>
                            </p>
                            <p class="text-[9px] font-mono text-neutral-400 mt-0.5">
                                <?php echo esc_html( $badge_pass_id ?: 'BUILD #01' ); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Soft Ambient Cast Shadow -->
                <div class="w-48 h-8 bg-black/25 blur-xl rounded-full absolute -bottom-5 z-0 pointer-events-none"></div>
            </div>
        </div>
    </div>
</section>
