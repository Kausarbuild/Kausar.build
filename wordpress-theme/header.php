<?php
/**
 * Header template for Studio Build Portfolio
 *
 * Displays all of the <head> section and the floating pill navigation.
 *
 * @package Studio_Build
 */

$site_brand    = get_theme_mod( 'studio_site_brand', 'Kausar.Build' );
$status_badge  = get_theme_mod( 'studio_status_badge', 'Available for projects' );
$accent_color  = get_theme_mod( 'studio_accent_color', '#E8590C' );
$profile_name  = get_theme_mod( 'studio_profile_name', 'Kausar' );

// Compute links so they work on both homepage and inner/consultation pages
$is_home       = is_front_page() || is_home();
$about_url     = $is_home ? '#about' : esc_url( home_url( '/#about' ) );
$projects_url  = $is_home ? '#projects' : esc_url( home_url( '/#projects' ) );
$services_url  = $is_home ? '#services' : esc_url( home_url( '/#services' ) );
$words_url     = $is_home ? '#testimonials' : esc_url( home_url( '/#testimonials' ) );
$process_url   = $is_home ? '#process' : esc_url( home_url( '/#process' ) );
$book_url      = $is_home ? '#book' : esc_url( home_url( '/#book' ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Preconnect & Google Fonts matching React reference -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind Play CDN configured to match React Theme Tokens -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                        handwriting: ['Caveat', 'cursive'],
                    },
                    colors: {
                        canvas: '#FAF9F6',
                        accent: {
                            orange: '<?php echo esc_attr( $accent_color ); ?>',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 30px -5px rgba(0, 0, 0, 0.04)',
                        'float': '0 20px 40px -15px rgba(0, 0, 0, 0.08)',
                        '2xs': '0 1px 2px 0 rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class( 'min-h-screen bg-[#FAF9F6] text-[#121212] flex flex-col selection:bg-orange-100 selection:text-[#E8590C]' ); ?>>
<?php wp_body_open(); ?>

<!-- Floating Pill Navigation (Exact React Parity) -->
<header id="site-floating-nav" class="fixed top-4 sm:top-6 inset-x-0 z-50 flex justify-center px-4 pointer-events-none">
    <div class="pointer-events-auto bg-white/90 backdrop-blur-md border border-neutral-200/90 rounded-full px-3 sm:px-4 py-1.5 sm:py-2 shadow-sm flex items-center justify-between gap-3 sm:gap-6 max-w-fit mx-auto transition-all">
        <!-- Brand & Availability -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 group text-left">
            <div class="w-6 h-6 rounded-full bg-neutral-900 text-white flex items-center justify-center font-display font-bold text-xs group-hover:scale-105 transition-transform">
                <?php echo esc_html( strtoupper( substr( $profile_name, 0, 1 ) ) ); ?>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="font-display font-semibold text-xs sm:text-sm text-neutral-900 tracking-tight">
                    <?php echo esc_html( $site_brand ); ?>
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            </div>
        </a>

        <!-- Desktop Navigation Anchor Links -->
        <nav class="hidden md:flex items-center gap-1 text-xs font-medium text-neutral-600">
            <a href="<?php echo esc_url( $about_url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">About</a>
            <a href="<?php echo esc_url( $projects_url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">Archive</a>
            <a href="<?php echo esc_url( $services_url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">Services</a>
            <a href="<?php echo esc_url( $words_url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">Words</a>
            <a href="<?php echo esc_url( $process_url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">Process</a>
            <a href="<?php echo esc_url( $book_url ); ?>" class="px-2.5 py-1 rounded-full hover:text-neutral-900 hover:bg-neutral-100/80 transition-colors">Connect</a>
        </nav>

        <!-- Right Quick Action / Let's Talk Button -->
        <div class="flex items-center gap-2">
            <a href="<?php echo esc_url( $book_url ); ?>" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neutral-900 text-white text-xs font-medium hover:bg-neutral-800 transition-all shadow-2xs">
                <span>Book call</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>

            <!-- Mobile Hamburger Toggle -->
            <button
                id="btn-mobile-menu-toggle"
                type="button"
                class="md:hidden p-1.5 rounded-full hover:bg-neutral-100 text-neutral-700 transition-colors focus:outline-none"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
            >
                <svg id="menu-icon-open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg id="menu-icon-close" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Dropdown Menu (hidden by default) -->
<div id="mobile-nav-menu" class="hidden fixed inset-x-4 top-16 z-40 bg-white/98 backdrop-blur-lg border border-neutral-200 rounded-3xl p-5 shadow-xl md:hidden space-y-4 text-center">
    <nav class="flex flex-col space-y-2 text-sm font-medium text-neutral-800">
        <a href="<?php echo esc_url( $about_url ); ?>" class="mobile-nav-link py-2 rounded-xl hover:bg-neutral-100 transition-colors">About</a>
        <a href="<?php echo esc_url( $projects_url ); ?>" class="mobile-nav-link py-2 rounded-xl hover:bg-neutral-100 transition-colors">Archive</a>
        <a href="<?php echo esc_url( $services_url ); ?>" class="mobile-nav-link py-2 rounded-xl hover:bg-neutral-100 transition-colors">Services</a>
        <a href="<?php echo esc_url( $words_url ); ?>" class="mobile-nav-link py-2 rounded-xl hover:bg-neutral-100 transition-colors">Words</a>
        <a href="<?php echo esc_url( $process_url ); ?>" class="mobile-nav-link py-2 rounded-xl hover:bg-neutral-100 transition-colors">Process</a>
        <a href="<?php echo esc_url( $book_url ); ?>" class="mobile-nav-link py-2 rounded-xl hover:bg-neutral-100 transition-colors">Connect</a>
    </nav>
    <div class="pt-2 border-t border-neutral-100">
        <a href="<?php echo esc_url( $book_url ); ?>" class="mobile-nav-link w-full py-2.5 rounded-full bg-neutral-900 text-white text-xs font-medium inline-flex items-center justify-center gap-1.5 shadow-sm">
            <span>Book Consultation</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>
</div>
