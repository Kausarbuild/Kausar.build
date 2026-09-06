<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'font-sans text-neutral-900 bg-[#FAF9F6] selection:bg-orange-100 selection:text-[#E8590C] relative min-h-screen overflow-x-hidden' ); ?>>
<?php wp_body_open(); ?>

<!-- Floating Pill Header Navigation -->
<header class="fixed top-5 inset-x-0 z-50 flex justify-center px-4 pointer-events-none" id="site-header">
    <nav class="pointer-events-auto bg-white/85 backdrop-blur-md border border-neutral-200/80 shadow-sm rounded-full px-5 py-2.5 flex items-center gap-6 text-sm font-medium transition-all hover:shadow-md">
        <a class="flex items-center gap-2.5 group" href="<?php echo esc_url( home_url( '/#hero' ) ); ?>">
            <span class="font-semibold tracking-tight text-neutral-900">
                <?php echo esc_html( get_theme_mod( 'studio_site_brand', 'Kausar.Build' ) ); ?>
            </span>
            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-50 text-[11px] font-mono text-emerald-700 border border-emerald-200/60">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <?php esc_html_e( 'Available', 'studio-build' ); ?>
            </span>
        </a>

        <div class="h-4 w-px bg-neutral-200 hidden sm:block"></div>

        <div class="hidden md:flex items-center gap-5 text-neutral-600">
            <a class="hover:text-neutral-900 transition-colors" href="#about"><?php esc_html_e( 'About', 'studio-build' ); ?></a>
            <a class="hover:text-neutral-900 transition-colors" href="#work"><?php esc_html_e( 'Work', 'studio-build' ); ?></a>
            <a class="hover:text-neutral-900 transition-colors" href="#services"><?php esc_html_e( 'Services', 'studio-build' ); ?></a>
            <a class="hover:text-neutral-900 transition-colors" href="#pricing"><?php esc_html_e( 'Pricing', 'studio-build' ); ?></a>
        </div>

        <a class="bg-neutral-900 text-white hover:bg-neutral-800 px-4 py-1.5 rounded-full text-xs font-medium tracking-wide transition-all shadow-sm" href="#book">
            <?php esc_html_e( 'Book Call', 'studio-build' ); ?>
        </a>
    </nav>
</header>
