import { WordPressFileItem } from '../types';

export const wpThemeFiles: WordPressFileItem[] = [
  {
    path: 'style.css',
    filename: 'style.css',
    category: 'core',
    description: 'Main theme stylesheet and WordPress theme metadata header',
    content: `/*
Theme Name: Kausar.Build Portfolio
Theme URI: https://kausar.build/
Author: Kausar.Build
Author URI: https://kausar.build/
Description: A precision-crafted, responsive WordPress theme for design engineers, UI architects, and creative builders. Clean editorial layout with fully editable Customizer panels, Custom Post Types (Projects, Services, Testimonials, Booking Services), interactive ID badge physics, and a consultation booking wizard.
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: kausar-build
Tags: portfolio, grid-layout, one-column, custom-colors, custom-menu, featured-images, theme-options, translation-ready
*/

:root {
  --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  --font-display: 'Plus Jakarta Sans', sans-serif;
  --font-mono: 'JetBrains Mono', monospace;
  --font-handwriting: 'Caveat', cursive;
  
  --color-canvas: #FAF9F6;
  --color-card-bg: #FFFFFF;
  --color-text-main: #121212;
  --color-text-muted: #6B7280;
  --color-text-subtle: #9CA3AF;
  --color-border: #E5E7EB;
  --color-border-subtle: rgba(229, 231, 235, 0.8);
  --color-accent-orange: #E8590C;
  --color-accent-green: #2B8A3E;
  
  --shadow-soft: 0 10px 30px -5px rgba(0, 0, 0, 0.04);
  --shadow-float: 0 20px 40px -15px rgba(0, 0, 0, 0.08);
  --shadow-lanyard: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  
  --radius-sm: 0.375rem;
  --radius-md: 0.75rem;
  --radius-lg: 1rem;
  --radius-xl: 1.5rem;
  --radius-2xl: 2rem;
  --radius-full: 9999px;
}

html {
  scroll-behavior: smooth;
  font-family: var(--font-sans);
  background-color: var(--color-canvas);
  color: var(--color-text-main);
  -webkit-font-smoothing: antialiased;
}

body {
  margin: 0;
  padding: 0;
  background-color: var(--color-canvas);
  color: var(--color-text-main);
  overflow-x: hidden;
}

/* Base utility patterns */
.bg-grid-dots {
  background-image: radial-gradient(#d1d5db 1px, transparent 1px);
  background-size: 24px 24px;
}

.lanyard-strap {
  background: repeating-linear-gradient(
    45deg,
    #1e1e1e,
    #1e1e1e 8px,
    #2a2a2a 8px,
    #2a2a2a 16px
  );
}

@keyframes spinSlow {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

.animate-spin-slow {
  animation: spinSlow 14s linear infinite;
}
`,
  },
  {
    path: 'functions.php',
    filename: 'functions.php',
    category: 'core',
    description: 'Theme setup, asset enqueuing, custom post types, customizer hooks, and AJAX booking handler',
    content: `<?php
/**
 * Studio Build Portfolio Theme Functions
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'STUDIO_BUILD_VERSION', '1.0.0' );
define( 'STUDIO_BUILD_DIR', get_template_directory() );
define( 'STUDIO_BUILD_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function studio_build_setup() {
    load_theme_textdomain( 'studio-build', STUDIO_BUILD_DIR . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register primary navigation
    register_nav_menus( array(
        'primary-menu' => esc_html__( 'Primary Navigation Bar', 'studio-build' ),
        'footer-menu'  => esc_html__( 'Footer Navigation', 'studio-build' ),
    ) );
}
add_action( 'after_setup_theme', 'studio_build_setup' );

/**
 * Enqueue scripts and styles.
 */
function studio_build_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'studio-build-fonts',
        'https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'studio-build-style', get_stylesheet_uri(), array( 'studio-build-fonts' ), STUDIO_BUILD_VERSION );
    wp_enqueue_style( 'studio-build-main', STUDIO_BUILD_URI . '/assets/css/main.css', array( 'studio-build-style' ), STUDIO_BUILD_VERSION );

    // Main interaction script
    wp_enqueue_script(
        'studio-build-script',
        STUDIO_BUILD_URI . '/assets/js/main.js',
        array(),
        STUDIO_BUILD_VERSION,
        true
    );

    // Pass AJAX configuration to JavaScript
    wp_localize_script( 'studio-build-script', 'studioBuildData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'studio_build_booking_nonce' ),
        'accent'  => get_theme_mod( 'studio_accent_color', '#E8590C' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'studio_build_scripts' );

// Include Custom Post Types
require_once STUDIO_BUILD_DIR . '/inc/custom-post-types.php';

// Include Custom Fields and Meta Boxes
require_once STUDIO_BUILD_DIR . '/inc/custom-fields.php';

// Include WordPress Customizer Panels
require_once STUDIO_BUILD_DIR . '/inc/theme-settings.php';

// Include Demo Data Generator / Seeder
require_once STUDIO_BUILD_DIR . '/inc/demo-importer.php';

/**
 * AJAX Handler for Consultation Booking Submission
 */
function studio_build_handle_booking() {
    check_ajax_referer( 'studio_build_booking_nonce', 'security' );

    $service_id = sanitize_text_field( $_POST['service_id'] ?? '' );
    $service_title = sanitize_text_field( $_POST['service_title'] ?? '' );
    $service_price = sanitize_text_field( $_POST['service_price'] ?? '' );
    $client_name   = sanitize_text_field( $_POST['client_name'] ?? '' );
    $client_email  = sanitize_email( $_POST['client_email'] ?? '' );
    $client_notes  = sanitize_textarea_field( $_POST['client_notes'] ?? '' );

    if ( empty( $client_name ) || ! is_email( $client_email ) ) {
        wp_send_json_error( array( 'message' => esc_html__( 'Please provide a valid name and email address.', 'studio-build' ) ) );
    }

    // Trigger developer hook for CRM/Calendly/Stripe integration
    do_action( 'studio_build_after_booking_submit', array(
        'service_id'    => $service_id,
        'service_title' => $service_title,
        'service_price' => $service_price,
        'name'          => $client_name,
        'email'         => $client_email,
        'notes'         => $client_notes,
        'submitted_at'  => current_time( 'mysql' ),
    ) );

    // Optional email notification to site admin
    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[%s] New Consultation Booking: %s', get_bloginfo( 'name' ), $service_title );
    $message = "You received a new booking from your website:\\n\\n"
             . "Service: {$service_title} ({$service_price})\\n"
             . "Client: {$client_name}\\n"
             . "Email: {$client_email}\\n"
             . "Notes: {$client_notes}\\n";

    wp_mail( $admin_email, $subject, $message );

    wp_send_json_success( array(
        'message'       => esc_html__( 'Booking confirmed! We will contact you within 24 hours.', 'studio-build' ),
        'service_title' => $service_title,
        'client_name'   => $client_name,
        'client_email'  => $client_email,
    ) );
}
add_action( 'wp_ajax_studio_build_booking', 'studio_build_handle_booking' );
add_action( 'wp_ajax_nopriv_studio_build_booking', 'studio_build_handle_booking' );
`,
  },
  {
    path: 'front-page.php',
    filename: 'front-page.php',
    category: 'template',
    description: 'Homepage template rendering all reference sections modularly',
    content: `<?php
/**
 * The template for displaying the front page.
 *
 * @package Studio_Build
 */

get_header(); ?>

<main class="studio-container max-w-4xl mx-auto px-6 pt-32 sm:pt-40 pb-24 space-y-28 sm:space-y-36">

    <?php
    // 1. Hero Section with Hanging 3D Lanyard Pass
    get_template_part( 'template-parts/hero/section-hero' );

    // 2. About Me Bento Grid (Portrait, Spinning Music Player, Moments Stack, Surprise Note)
    get_template_part( 'template-parts/about/section-about' );

    // 3. Design Archive (Projects CPT 2x2 Grid)
    get_template_part( 'template-parts/projects/section-projects' );

    // 4. Services I Provide (Interactive Accordion Rows)
    get_template_part( 'template-parts/services/section-services' );

    // 5. Testimonials (Good words, Photo Stack, Quote Slider)
    get_template_part( 'template-parts/testimonials/section-testimonials' );

    // 6. How It Works (Profile Verification Stats & Monthly Retainer Card)
    get_template_part( 'template-parts/process/section-process' );

    // 7. Instant Booking (Interactive 3-Step Consultation Selector)
    get_template_part( 'template-parts/booking/section-booking' );
    ?>

</main>

<?php get_footer(); ?>
`,
  },
  {
    path: 'header.php',
    filename: 'header.php',
    category: 'template',
    description: 'HTML head, metadata, and floating pill navigation with status pulse',
    content: `<!DOCTYPE html>
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
        <!-- Brand / Site Name & Live Availability Pulse -->
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

        <!-- Section Navigation Links -->
        <div class="hidden md:flex items-center gap-5 text-neutral-600">
            <a class="hover:text-neutral-900 transition-colors" href="#about"><?php esc_html_e( 'About', 'studio-build' ); ?></a>
            <a class="hover:text-neutral-900 transition-colors" href="#work"><?php esc_html_e( 'Work', 'studio-build' ); ?></a>
            <a class="hover:text-neutral-900 transition-colors" href="#services"><?php esc_html_e( 'Services', 'studio-build' ); ?></a>
            <a class="hover:text-neutral-900 transition-colors" href="#pricing"><?php esc_html_e( 'Pricing', 'studio-build' ); ?></a>
        </div>

        <!-- Direct CTA -->
        <a class="bg-neutral-900 text-white hover:bg-neutral-800 px-4 py-1.5 rounded-full text-xs font-medium tracking-wide transition-all shadow-sm" href="#book">
            <?php esc_html_e( 'Book Call', 'studio-build' ); ?>
        </a>
    </nav>
</header>
`,
  },
  {
    path: 'footer.php',
    filename: 'footer.php',
    category: 'template',
    description: 'Footer with social pills, wax tree seal icon, script signature, and copyright',
    content: `<?php
/**
 * Footer template for Studio Build Portfolio
 *
 * @package Studio_Build
 */
?>
<footer class="pt-16 pb-12 border-t border-neutral-200/80 text-center space-y-8 max-w-4xl mx-auto px-6" id="site-footer">
    <!-- Social Circles -->
    <div class="flex items-center justify-center gap-3">
        <?php
        $instagram = get_theme_mod( 'studio_social_instagram', '' );
        $linkedin  = get_theme_mod( 'studio_social_linkedin', '' );
        $twitter   = get_theme_mod( 'studio_social_twitter', '' );
        $github    = get_theme_mod( 'studio_social_github', '' );
        $email     = get_theme_mod( 'studio_social_email', 'your@email.com' );
        ?>
        <?php if ( ! empty( $instagram ) ) : ?>
            <a class="w-8 h-8 rounded-full bg-white border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-all shadow-sm" href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener">ig</a>
        <?php endif; ?>
        <?php if ( ! empty( $linkedin ) ) : ?>
            <a class="w-8 h-8 rounded-full bg-white border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-all shadow-sm" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener">in</a>
        <?php endif; ?>
        <?php if ( ! empty( $twitter ) ) : ?>
            <a class="w-8 h-8 rounded-full bg-white border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-all shadow-sm" href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener">𝕏</a>
        <?php endif; ?>
        <?php if ( ! empty( $github ) ) : ?>
            <a class="w-8 h-8 rounded-full bg-white border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-all shadow-sm" href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener">git</a>
        <?php endif; ?>
        <?php if ( ! empty( $email ) ) : ?>
            <a class="w-8 h-8 rounded-full bg-white border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-all shadow-sm" href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>">✉</a>
        <?php endif; ?>
    </div>

    <!-- Center Greeting & Seal Graphic -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 text-xs sm:text-sm text-neutral-600">
        <span><?php echo esc_html( get_theme_mod( 'studio_footer_greeting', 'Thanks for being here.' ) ); ?></span>
        <div class="w-9 h-9 rounded-full bg-[#8A1A1A] border-2 border-[#5C0A0A] flex items-center justify-center shadow-inner text-amber-100 text-sm select-none">
            ✦
        </div>
        <span><?php echo esc_html( get_theme_mod( 'studio_footer_tagline', 'Let’s build something thoughtful.' ) ); ?></span>
    </div>

    <!-- Stylized Signature -->
    <div class="pt-2">
        <p class="font-handwriting text-4xl sm:text-5xl text-neutral-900 -rotate-2 select-none">
            <?php echo esc_html( get_theme_mod( 'studio_signature_name', 'Kausar.Build' ) ); ?>
        </p>
    </div>

    <!-- Copyright Notice -->
    <div class="text-[11px] font-mono text-neutral-400 pt-2">
        <p><?php echo esc_html( get_theme_mod( 'studio_copyright_text', '© 2026 Kausar.Build. All Rights Reserved.' ) ); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
`,
  },
  {
    path: 'template-parts/hero/section-hero.php',
    filename: 'section-hero.php',
    category: 'template',
    description: 'Hero section with bio, CTAs, and hanging 3D lanyard pass badge',
    content: `<?php
/**
 * Hero Section Template Part
 *
 * @package Studio_Build
 */

$status_badge     = get_theme_mod( 'studio_hero_status', 'Available' );
$hero_greeting    = get_theme_mod( 'studio_hero_greeting', 'Hello, I am Kausar' );
$hero_headline    = get_theme_mod( 'studio_hero_headline', 'I Turn Ideas Into Websites.' );
$hero_description = get_theme_mod( 'studio_hero_description', 'I design and build websites with a focus on great design, clean work, and a smooth experience. Simple, thoughtful, and made to last. Open for projects ↓' );
$hero_image       = get_theme_mod( 'studio_hero_image', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80' );
$badge_name       = get_theme_mod( 'studio_badge_name', 'KAUSAR' );
$badge_role       = get_theme_mod( 'studio_badge_role', 'DESIGN ENGINEER' );
$badge_pass_id    = get_theme_mod( 'studio_badge_pass_id', 'ID: KB-2026' );
$cv_url           = get_theme_mod( 'studio_cv_url', '#cv' );
?>
<section class="relative pt-6 sm:pt-12" id="hero">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-10 items-start">
        <!-- Left Column: Bio and CTA (order-2 on mobile, order-1 on desktop) -->
        <div class="order-2 md:order-1 md:col-span-8 space-y-6">
            <!-- Status pill -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-mono">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                <?php echo esc_html( $status_badge ); ?>
            </div>

            <!-- Hero Main Title with Animated 5-Language Hello -->
            <div class="space-y-1">
                <h1 class="text-4xl sm:text-5xl font-display font-bold tracking-tight text-neutral-900">
                    <span id="hero-animated-hello" class="inline-block transition-all duration-300">Hello</span><?php
                        $clean_suffix = preg_replace( '/^(Hello|Hi|Hey|Bonjour|Hola|Ciao|Namaste)[,\s]*/i', '', $hero_greeting );
                        if ( ! empty( $clean_suffix ) ) {
                            echo esc_html( ( strpos( $clean_suffix, ',' ) === 0 ? '' : ', ' ) . ltrim( $clean_suffix, ',' ) );
                        }
                    ?>
                </h1>
                <p class="text-2xl sm:text-3xl font-display font-medium text-neutral-500 tracking-tight">
                    <?php echo esc_html( $hero_headline ); ?>
                </p>
            </div>
            <script>
            (function() {
                var greetings = ['Hello', 'Bonjour', 'Hola', 'Ciao', 'Namaste'];
                var idx = 0;
                var el = document.getElementById('hero-animated-hello');
                if (el) {
                    setInterval(function() {
                        el.style.opacity = '0';
                        el.style.transform = 'translateY(-10px)';
                        setTimeout(function() {
                            idx = (idx + 1) % greetings.length;
                            el.textContent = greetings[idx];
                            el.style.transform = 'translateY(10px)';
                            setTimeout(function() {
                                el.style.opacity = '1';
                                el.style.transform = 'translateY(0)';
                            }, 50);
                        }, 250);
                    }, 2500);
                }
            })();
            </script>

            <!-- Description paragraph -->
            <p class="text-neutral-600 text-base sm:text-lg leading-relaxed max-w-xl font-normal">
                <?php echo esc_html( $hero_description ); ?>
            </p>

            <!-- CTAs -->
            <div class="flex flex-wrap items-center gap-3 pt-2">
                <!-- Download CV -->
                <a class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-neutral-300 text-neutral-800 text-sm font-medium hover:border-neutral-400 hover:bg-neutral-50 transition-all shadow-sm" href="<?php echo esc_url( $cv_url ); ?>">
                    <svg class="w-4 h-4 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <?php esc_html_e( 'Download CV', 'studio-build' ); ?>
                </a>

                <!-- Let's connect -->
                <a class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-sm font-medium hover:bg-neutral-800 transition-all shadow-sm" href="#book">
                    <span class="w-2 h-2 rounded-full bg-[#E8590C]"></span>
                    <?php esc_html_e( "Let's connect", 'studio-build' ); ?>
                </a>
            </div>
        </div>

        <!-- Right Column: Hanging Lanyard Pass Graphic (order-1 on mobile) -->
        <div class="order-1 md:order-2 md:col-span-4 flex justify-center md:justify-end relative pt-10 sm:pt-14 md:pt-0" id="hero-lanyard-wrapper">
            <div class="relative w-48 sm:w-52 flex flex-col items-center lanyard-interactive">
                <!-- Hanging Clip and Strap -->
                <div class="absolute -top-32 w-10 h-32 lanyard-strap rounded-b-sm shadow-inner z-10"></div>
                <div class="absolute -top-6 w-12 h-6 bg-neutral-800 rounded-t-md flex items-center justify-center z-20 border-b border-neutral-700">
                    <div class="w-6 h-2 bg-neutral-400 rounded-sm"></div>
                </div>
                <div class="absolute -top-2 w-8 h-3 bg-neutral-300 rounded-sm z-20 shadow-sm"></div>

                <!-- Lanyard Badge Card -->
                <div class="w-full bg-neutral-900 rounded-2xl p-2.5 pt-4 shadow-2xl border border-neutral-800 transform transition-transform duration-200 relative z-20 lanyard-card">
                    <!-- Slot Hole -->
                    <div class="w-10 h-1.5 bg-neutral-950 mx-auto rounded-full mb-3 border border-neutral-800"></div>

                    <!-- Badge Image Frame -->
                    <div class="w-full aspect-[4/5] rounded-xl overflow-hidden bg-neutral-800 relative mb-3 border border-neutral-700/60">
                        <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $badge_name ); ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-2.5 left-2.5 text-white">
                            <p class="text-xs font-medium tracking-wide"><?php echo esc_html( $badge_name ); ?></p>
                            <p class="text-[10px] text-neutral-300 font-mono tracking-wider"><?php echo esc_html( $badge_role ); ?></p>
                        </div>
                    </div>

                    <!-- Lanyard Metadata & Barcode -->
                    <div class="px-2 pb-1 pt-1 flex items-center justify-between text-[10px] font-mono text-neutral-400">
                        <div class="space-y-0.5">
                            <p class="text-neutral-300 font-semibold">BUILD PASS // 2026</p>
                            <p class="text-[9px] text-neutral-500"><?php echo esc_html( $badge_pass_id ); ?></p>
                        </div>
                        <div class="flex items-center gap-0.5 h-6">
                            <div class="w-0.5 h-full bg-neutral-400"></div>
                            <div class="w-1 h-full bg-neutral-400"></div>
                            <div class="w-0.5 h-full bg-neutral-400"></div>
                            <div class="w-1.5 h-full bg-neutral-400"></div>
                            <div class="w-0.5 h-full bg-neutral-400"></div>
                            <div class="w-1 h-full bg-neutral-400"></div>
                            <div class="w-0.5 h-full bg-neutral-400"></div>
                        </div>
                    </div>
                </div>

                <!-- Soft lanyard drop shadow -->
                <div class="w-40 h-8 bg-black/10 blur-xl rounded-full absolute -bottom-4 z-0"></div>
            </div>
        </div>
    </div>
</section>
`,
  },
  {
    path: 'template-parts/about/section-about.php',
    filename: 'section-about.php',
    category: 'template',
    description: 'About section bento grid with portrait, rotating vinyl, personal daily ritual card, and guiding philosophy manifesto',
    content: `<?php
/**
 * About Me Bento Grid Template Part
 *
 * @package Studio_Build
 */

$about_title       = get_theme_mod( 'studio_about_title', '// About me' );
$about_subtitle    = get_theme_mod( 'studio_about_subtitle', 'The person behind the pixels' );
$about_portrait    = get_theme_mod( 'studio_about_portrait', 'https://lh3.googleusercontent.com/aida-public/AB6AXuARkvcziNArxEbu_d7ztIzxfeQSjYNpmL8l3WBjGe2_6rDGd8N4Bi0lwTf681IFLK6_O1yD0mn8XdOkhhJNeFHUL5IiJjikwQVIhK9Ij3SWB40xfZwdhE4pCdFIKMzU8BMHtcWd58NiHrKws7bdpp90fL5PxKkM191nZdRls8q8bN00WN2iZAjuHMCIQjg-YHKB8kup1P0sgt44DkX5MQvEI62bnPPPgLo0degfGryxjkvBxOdmSpCNng' );
$about_tag         = get_theme_mod( 'studio_about_portrait_tag', 'Creator & Coder' );
$about_sub         = get_theme_mod( 'studio_about_portrait_sub', 'Crafting purposeful digital tools with passion' );

$music_title       = get_theme_mod( 'studio_music_title', 'Veeran Sheher' );
$music_artist      = get_theme_mod( 'studio_music_artist', 'Kausar XD' );
$music_cover       = get_theme_mod( 'studio_music_cover', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAhHK8cAm6VZfMC6h6u9r06W3Py2rKTr2a9CAidtUmcN8eCbVlF-LX3MwWOE_2uM1RlTsWHSf4V9b8yR0fKabHFyS8Lk7NDRMzt3PKx8NjjsrJGI-wanF58iX2So5S1hXZcdZjFzBbOEK8Yb7EgUa-32zPoM42UUmbqjjLwSwyTk0cc61oZRPMOpMHKOCCGIFIzV8xArzkMit_VRLfSmxmnTODUzpdjm5uc4kcwN7Kj4DKmn9XhjC3u4g' );

$personal_title    = get_theme_mod( 'studio_personal_title', 'Workstation Rig' );
$personal_sub      = get_theme_mod( 'studio_personal_sub', 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.' );
$personal_img      = get_theme_mod( 'studio_personal_img', 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80' );
$personal_tag      = get_theme_mod( 'studio_personal_tag', 'Studio Rig' );
$personal_badge    = get_theme_mod( 'studio_personal_badge', 'Studio Setup' );
$personal_note     = get_theme_mod( 'studio_personal_note', 'M3 Max · Studio Display · Custom Oak' );
$personal_time     = get_theme_mod( 'studio_personal_time', 'Setup v4' );

$manifesto_title   = get_theme_mod( 'studio_manifesto_title', '// Guiding Philosophy' );
$manifesto_quote   = get_theme_mod( 'studio_manifesto_quote', 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.' );
$manifesto_author  = get_theme_mod( 'studio_manifesto_author', '— Kausar · Design Engineer' );
$manifesto_sub     = get_theme_mod( 'studio_manifesto_sub', 'Zero bloat · 100% independent craft' );
?>
<section class="space-y-8" id="about">
    <div class="space-y-1">
        <span class="text-[#E8590C] font-mono text-xs font-semibold uppercase tracking-wider"><?php echo esc_html( $about_title ); ?></span>
        <h2 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight"><?php echo esc_html( $about_subtitle ); ?></h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-stretch">
        <!-- Bento 1: Tall Portrait (Left 5 cols) -->
        <div class="sm:col-span-5 rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/80 shadow-soft group relative aspect-[3/4] sm:aspect-auto">
            <img src="<?php echo esc_url( $about_portrait ); ?>" alt="Portrait" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
            <div class="absolute bottom-4 left-4 right-4 text-white">
                <span class="text-[11px] font-mono uppercase tracking-wider text-neutral-300"><?php echo esc_html( $about_tag ); ?></span>
                <p class="text-sm font-medium"><?php echo esc_html( $about_sub ); ?></p>
            </div>
        </div>

        <!-- Bento Right Column: 3 modules (7 cols) -->
        <div class="sm:col-span-7 flex flex-col gap-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 flex-1">
                <!-- Music Player Widget -->
                <div class="bg-white rounded-2xl p-4 border border-neutral-200/80 shadow-soft flex flex-col justify-between">
                    <div class="flex items-center justify-between text-neutral-400 mb-2">
                        <span class="text-[10px] font-mono uppercase tracking-wider"><?php esc_html_e( 'Listening to', 'studio-build' ); ?></span>
                        <div class="flex items-end gap-0.5 h-3">
                            <span class="w-0.5 h-2 bg-[#E8590C] animate-pulse"></span>
                            <span class="w-0.5 h-3 bg-[#E8590C] animate-pulse delay-75"></span>
                            <span class="w-0.5 h-1 bg-[#E8590C] animate-pulse delay-150"></span>
                        </div>
                    </div>

                    <!-- Album Vinyl Spin -->
                    <div class="my-2 flex justify-center">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-neutral-100 shadow-md relative group">
                            <img src="<?php echo esc_url( $music_cover ); ?>" alt="Album" class="w-full h-full object-cover animate-spin-slow">
                            <div class="w-5 h-5 bg-white rounded-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border-2 border-neutral-300"></div>
                        </div>
                    </div>

                    <div class="text-center space-y-1">
                        <p class="text-xs font-semibold text-neutral-900 truncate"><?php echo esc_html( $music_title ); ?></p>
                        <p class="text-[11px] text-neutral-500 truncate"><?php echo esc_html( $music_artist ); ?></p>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mt-3 space-y-1">
                        <div class="w-full bg-neutral-100 rounded-full h-1 overflow-hidden">
                            <div class="bg-neutral-800 h-full w-2/5 rounded-full"></div>
                        </div>
                        <div class="flex justify-between text-[10px] font-mono text-neutral-400">
                            <span>1:24</span>
                            <span>3:01</span>
                        </div>
                    </div>
                </div>

                <!-- Studio Workstation & Environment Card -->
                <div class="bg-white rounded-2xl p-4 border border-neutral-200/80 shadow-soft flex flex-col justify-between">
                    <div class="w-full aspect-[16/11] rounded-xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group">
                        <img src="<?php echo esc_url( $personal_img ); ?>" alt="<?php echo esc_attr( $personal_title ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-2 left-2 bg-black/65 text-white px-2 py-0.5 rounded-full text-[9px] font-mono flex items-center gap-1 shadow-xs">
                            <span>💻</span>
                            <span><?php echo esc_html( $personal_tag ); ?></span>
                        </div>
                        <div class="absolute bottom-2 right-2 bg-white/90 text-neutral-900 px-2 py-0.5 rounded-full text-[9px] font-mono font-semibold shadow-xs">
                            <?php echo esc_html( $personal_badge ); ?>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-xs font-bold text-neutral-900 font-display truncate"><?php echo esc_html( $personal_title ); ?></h3>
                            <span class="text-[9px] font-mono text-neutral-400 shrink-0"><?php echo esc_html( $personal_time ); ?></span>
                        </div>
                        <p class="text-[11px] text-neutral-500 leading-snug line-clamp-2"><?php echo esc_html( $personal_sub ); ?></p>
                    </div>

                    <div class="w-full flex items-center justify-between gap-2 pt-2.5 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                        <span class="text-neutral-600 truncate flex items-center gap-1 font-medium">
                            <span class="text-[#E8590C]">⚙</span>
                            <span class="truncate"><?php echo esc_html( $personal_note ); ?></span>
                        </span>
                        <span class="text-neutral-500 bg-neutral-100 px-2 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                            Hardware
                        </span>
                    </div>
                </div>
            </div>

            <!-- Guiding Philosophy & Craft Manifesto Card -->
            <div class="bg-white border border-neutral-200/80 rounded-2xl p-5 sm:p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group shadow-soft">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neutral-100 border border-neutral-200/80 text-neutral-700 text-[11px] font-mono tracking-tight mb-3">
                    <span class="text-[#E8590C]">✦</span>
                    <span><?php echo esc_html( $manifesto_title ); ?></span>
                </div>
                <blockquote class="max-w-lg mx-auto px-2">
                    <p class="font-display font-semibold text-base sm:text-lg text-neutral-900 tracking-tight leading-snug">
                        "<?php echo esc_html( $manifesto_quote ); ?>"
                    </p>
                </blockquote>
                <div class="mt-3.5 flex flex-wrap items-center justify-center gap-2 text-xs font-mono">
                    <span class="text-neutral-900 font-semibold font-display text-xs sm:text-sm">
                        <?php echo esc_html( $manifesto_author ); ?>
                    </span>
                    <span class="text-neutral-300">·</span>
                    <span class="text-neutral-500 text-[11px]">
                        <?php echo esc_html( $manifesto_sub ); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
`,
  },
  {
    path: 'template-parts/projects/section-projects.php',
    filename: 'section-projects.php',
    category: 'template',
    description: 'Design Archive section pulling Project Custom Post Types in 2x2 grid',
    content: `<?php
/**
 * Projects / Design Archive Template Part
 *
 * @package Studio_Build
 */

$args = array(
    'post_type'      => 'portfolio_project',
    'posts_per_page' => 4,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
);
$projects_query = new WP_Query( $args );
?>
<section class="space-y-8" id="work">
    <div class="space-y-1">
        <span class="text-[#E8590C] font-mono text-xs font-semibold uppercase tracking-wider"><?php esc_html_e( '// Design Archive', 'studio-build' ); ?></span>
        <h2 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight"><?php esc_html_e( 'Digital Product Design', 'studio-build' ); ?></h2>
        <p class="text-neutral-500 text-sm"><?php esc_html_e( 'A collection of digital work, visual studies, and client systems.', 'studio-build' ); ?></p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <?php if ( $projects_query->have_posts() ) : ?>
            <?php while ( $projects_query->have_posts() ) : $projects_query->the_post();
                $category = get_post_meta( get_the_ID(), '_project_category', true ) ?: 'Web Design';
                $year     = get_post_meta( get_the_ID(), '_project_year', true ) ?: '2024';
                $tag      = get_post_meta( get_the_ID(), '_project_tag', true ) ?: 'Web App';
                $url      = get_post_meta( get_the_ID(), '_project_url', true ) ?: get_permalink();
                $thumb    = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                if ( ! $thumb ) {
                    $thumb = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDZvdEedBIzctizJfL1BqbN6sWo-MKda0X45EdnkUqWv9ww4GzE2AIQudKSezNVIz3QDV9NEak7P83j3K1VW7AwXOdohOthqw2l6G4_CMoWrKqTf-vBRaXwqyPVhP0geplxuCHnsYE8gCrFW_t9Vb3Sc9K3vH30mTBeVFFO1_IaW5Y77n8I6d7DNRxpjYnt3kjEShoj4ea-vN_O0leW2IAxLNiS95hYxCUGssDzAHgp5afJ2Kgw_t3atA';
                }
            ?>
                <article class="group bg-white rounded-3xl border border-neutral-200/80 overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 flex flex-col justify-between">
                    <div class="aspect-square w-full overflow-hidden bg-neutral-900 relative block">
                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-2.5 py-1 rounded-full text-[10px] font-mono uppercase text-neutral-800 border border-white/60 shadow-xs">
                            <?php echo esc_html( $category ); ?>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="font-display font-bold text-neutral-900 text-lg leading-snug">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-neutral-500 text-xs sm:text-sm mt-1.5 leading-relaxed">
                                <?php echo wp_trim_words( get_the_excerpt(), 18 ); ?>
                            </p>
                        </div>
                        <div class="pt-4 border-t border-neutral-100 flex items-center justify-between text-xs">
                            <span class="font-mono text-neutral-400 truncate"><?php echo esc_html( $year . ' · ' . $tag ); ?></span>
                            <span class="font-mono text-[10px] text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0"><?php echo esc_html( $category ); ?></span>
                        </div>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
`,
  },
  {
    path: 'template-parts/services/section-services.php',
    filename: 'section-services.php',
    category: 'template',
    description: 'Services accordion list 01-05 with toggleable details',
    content: `<?php
/**
 * Services Section Template Part
 *
 * @package Studio_Build
 */

$services_query = new WP_Query( array(
    'post_type'      => 'studio_service',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );
?>
<section class="space-y-8" id="services">
    <div class="space-y-1">
        <span class="text-[#E8590C] font-mono text-xs font-semibold uppercase tracking-wider"><?php esc_html_e( '// Services i provide', 'studio-build' ); ?></span>
        <h2 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight"><?php esc_html_e( 'I can help you with these things', 'studio-build' ); ?></h2>
    </div>

    <div class="border-t border-neutral-200 divide-y divide-neutral-200">
        <?php
        $count = 1;
        if ( $services_query->have_posts() ) :
            while ( $services_query->have_posts() ) : $services_query->the_post();
                $num = sprintf( '%02d.', $count );
        ?>
                <details class="group py-5 cursor-pointer">
                    <summary class="flex items-center justify-between list-none text-neutral-900 font-medium text-base sm:text-lg">
                        <span class="flex items-center gap-3">
                            <span class="font-mono text-xs text-neutral-400"><?php echo esc_html( $num ); ?></span>
                            <span><?php the_title(); ?></span>
                        </span>
                        <span class="text-neutral-400 group-open:rotate-45 transition-transform duration-200 text-xl font-light leading-none">+</span>
                    </summary>
                    <p class="mt-3 text-sm text-neutral-600 pl-8 max-w-2xl leading-relaxed">
                        <?php echo get_the_content(); ?>
                    </p>
                </details>
        <?php
                $count++;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>
`,
  },
  {
    path: 'template-parts/testimonials/section-testimonials.php',
    filename: 'section-testimonials.php',
    category: 'template',
    description: 'Testimonials quote card with stacked photos, author info, and controls',
    content: `<?php
/**
 * Testimonials Section Template Part
 *
 * @package Studio_Build
 */

$test_query = new WP_Query( array(
    'post_type'      => 'client_testimonial',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>
<section class="space-y-8" id="testimonials">
    <div class="space-y-1">
        <span class="text-[#E8590C] font-mono text-xs font-semibold uppercase tracking-wider"><?php esc_html_e( '// good words', 'studio-build' ); ?></span>
        <h2 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight"><?php esc_html_e( "Some good words from people I've worked with", 'studio-build' ); ?></h2>
    </div>

    <div class="bg-white rounded-3xl border border-neutral-200/80 p-8 sm:p-12 shadow-soft relative overflow-hidden testimonial-container">
        <?php if ( $test_query->have_posts() ) : $test_query->the_post();
            $role    = get_post_meta( get_the_ID(), '_testimonial_role', true ) ?: 'Co-founder';
            $company = get_post_meta( get_the_ID(), '_testimonial_company', true ) ?: 'Orion Labs';
            $avatar  = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if ( ! $avatar ) {
                $avatar = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBRVZQQZZp1HcbSy0CYyAs4EVu2s2I5d4wlVD2BU03AStUTKreYc2M-ORcOvw-UVrBMHeoIxS9Ms3XTUA0TkQorP-ZVAP-xQY2hMl2nSv6-XWdCMGttK4uszjW-aX33s3zjaMT5bGekMtO0Z7TNWtth3H74zw8OX0MfMYkzzvJ7EhbLhmtVw4VsH9vJA-GWiUHoJ-vrfJSnoyUTn-lk79zpXpPbraiD75h2sqy8XzHdJBwDUVZbq4XxYw';
            }
        ?>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative z-10">
                <!-- Stacked polaroid client frame -->
                <div class="md:col-span-4 flex items-center justify-center">
                    <div class="relative w-36 h-36">
                        <div class="absolute inset-0 bg-neutral-100 rounded-2xl rotate-6 border border-neutral-200"></div>
                        <div class="absolute inset-0 bg-neutral-200 rounded-2xl -rotate-3 border border-neutral-200"></div>
                        <div class="absolute inset-0 rounded-2xl overflow-hidden shadow-md border-2 border-white">
                            <img src="<?php echo esc_url( $avatar ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Quote copy -->
                <div class="md:col-span-8 space-y-4">
                    <span class="text-4xl text-[#E8590C] font-serif font-black leading-none block">“</span>
                    <p class="text-lg sm:text-xl text-neutral-800 font-medium leading-relaxed">
                        <?php echo get_the_content(); ?>
                    </p>
                    <div class="pt-2 flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-neutral-900 text-sm"><?php the_title(); ?></p>
                            <p class="text-neutral-500 text-xs"><?php echo esc_html( $role . ', ' . $company ); ?></p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" aria-label="Previous testimonial" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-neutral-600 transition-colors">←</button>
                            <button type="button" aria-label="Next testimonial" class="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-neutral-600 transition-colors">→</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php wp_reset_postdata(); endif; ?>
        <div class="absolute inset-0 bg-grid-dots opacity-40 pointer-events-none"></div>
    </div>
</section>
`,
  },
  {
    path: 'template-parts/process/section-process.php',
    filename: 'section-process.php',
    category: 'template',
    description: 'Profile Verification Card & Monthly Retainer pricing plan',
    content: `<?php
/**
 * Profile & Retainer Section Template Part
 *
 * @package Studio_Build
 */

$profile_name  = get_theme_mod( 'studio_profile_name', 'Kausar' );
$profile_loc   = get_theme_mod( 'studio_profile_location', 'India' );
$profile_exp   = get_theme_mod( 'studio_profile_experience', 'Design + Dev' );
$profile_focus = get_theme_mod( 'studio_profile_focus', 'Websites' );
$profile_stat  = get_theme_mod( 'studio_profile_status_val', 'Active' );
$profile_bio   = get_theme_mod( 'studio_profile_bio', 'I care about clear ideas, thoughtful details, and building things that are genuinely useful.' );
$profile_img   = get_theme_mod( 'studio_profile_avatar', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCM4y1h16Hh_5-zJ_U21X4v5wLPRN0IrWmq55VQNYD7Rn4UxYP95snGP9I27GKJW3jzjb3Cw4UqnB99ZNJpL0GBY2lqcsI7jLIBPMD23O7ikJ2-ijjLoTF3BXgx3L-t_a_etkGVU5U_KSypqFLlE7VhuO5tyc6t7dxg3jR_ehnM1lAgZcNPVxNtHEMqBckjEEnLLOU6oDwBp1IH9Km4jNJ4JVRyG0Mvi11HgW2c6Ufez4iKQQLF0jeIkQ' );

$retainer_title = get_theme_mod( 'studio_retainer_title', 'Monthly Website Support' );
$retainer_price = get_theme_mod( 'studio_retainer_price', 'Let’s talk' );
$retainer_sub   = get_theme_mod( 'studio_retainer_description', 'Ongoing design and development support for websites that need regular improvements, updates, or new work.' );
?>
<section class="space-y-8" id="pricing">
    <div class="space-y-1">
        <span class="text-[#E8590C] font-mono text-xs font-semibold uppercase tracking-wider"><?php esc_html_e( '// How it works', 'studio-build' ); ?></span>
        <h2 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight"><?php esc_html_e( 'A considered approach to design & development', 'studio-build' ); ?></h2>
    </div>

    <!-- Process 4 Steps -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2">
            <span class="font-mono text-xs text-neutral-400 font-semibold block">01</span>
            <h3 class="font-display font-bold text-neutral-900 text-base">Discovery & Direction</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Understanding the goal, content, and the audience before designing.</p>
        </div>
        <div class="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2">
            <span class="font-mono text-xs text-neutral-400 font-semibold block">02</span>
            <h3 class="font-display font-bold text-neutral-900 text-base">Design & Structure</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Creating clear layouts, visual systems, and interactive prototypes.</p>
        </div>
        <div class="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2">
            <span class="font-mono text-xs text-neutral-400 font-semibold block">03</span>
            <h3 class="font-display font-bold text-neutral-900 text-base">Development & Polish</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Writing clean code, responsive testing, and finalizing the details.</p>
        </div>
        <div class="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2">
            <span class="font-mono text-xs text-neutral-400 font-semibold block">04</span>
            <h3 class="font-display font-bold text-neutral-900 text-base">Launch & Support</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Deploying the website and ensuring everything runs as expected.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
        <!-- Left: Profile Card -->
        <div class="md:col-span-5 bg-white rounded-3xl border border-neutral-200/80 p-6 shadow-soft flex flex-col justify-between space-y-6">
            <div class="space-y-5">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <img src="<?php echo esc_url( $profile_img ); ?>" alt="<?php echo esc_attr( $profile_name ); ?>" class="w-16 h-16 rounded-full object-cover border-2 border-neutral-100 shadow-sm">
                        <span class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] border-2 border-white">✓</span>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-neutral-900 text-base"><?php echo esc_html( $profile_name ); ?></h3>
                        <p class="text-neutral-500 text-xs flex items-center gap-1">
                            <span>📍</span> <?php echo esc_html( $profile_loc ); ?>
                        </p>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-3 gap-2 pt-2">
                    <div class="bg-neutral-50 rounded-2xl p-2.5 border border-neutral-100 text-center">
                        <p class="text-xs font-bold font-display text-neutral-900"><?php echo esc_html( $profile_exp ); ?></p>
                        <p class="text-[9px] text-neutral-400 uppercase font-mono">Experience</p>
                    </div>
                    <div class="bg-neutral-50 rounded-2xl p-2.5 border border-neutral-100 text-center">
                        <p class="text-xs font-bold font-display text-neutral-900"><?php echo esc_html( $profile_focus ); ?></p>
                        <p class="text-[9px] text-neutral-400 uppercase font-mono">Focus</p>
                    </div>
                    <div class="bg-neutral-50 rounded-2xl p-2.5 border border-neutral-100 text-center">
                        <p class="text-xs font-bold font-display text-neutral-900 text-emerald-600"><?php echo esc_html( $profile_stat ); ?></p>
                        <p class="text-[9px] text-neutral-400 uppercase font-mono">Status</p>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-neutral-100 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-50 text-[10px] font-mono text-emerald-700 border border-emerald-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> <?php esc_html_e( 'Available for selected projects', 'studio-build' ); ?>
                </span>
                <h4 class="font-display font-bold text-sm text-neutral-900"><?php esc_html_e( 'Direct Collaboration', 'studio-build' ); ?></h4>
                <p class="text-xs text-neutral-500 leading-relaxed"><?php echo esc_html( $profile_bio ); ?></p>
            </div>
        </div>

        <!-- Right: Monthly Support Card -->
        <div class="md:col-span-7 bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-8 shadow-soft flex flex-col justify-between space-y-6">
            <div class="space-y-4">
                <div class="space-y-1">
                    <h3 class="font-display font-bold text-xl text-neutral-900"><?php echo esc_html( $retainer_title ); ?></h3>
                    <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed"><?php echo esc_html( $retainer_sub ); ?></p>
                </div>
                <div class="inline-block">
                    <span class="px-2.5 py-1 rounded-full bg-neutral-100 text-neutral-600 text-xs font-mono">
                        <?php esc_html_e( 'Flexible scope', 'studio-build' ); ?>
                    </span>
                </div>
                <div class="pt-2 flex items-baseline gap-1">
                    <span class="text-3xl sm:text-4xl font-display font-extrabold text-neutral-900"><?php echo esc_html( $retainer_price ); ?></span>
                </div>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 pt-2 text-xs text-neutral-600">
                    <li class="flex items-center gap-2"><span class="text-[#E8590C]">●</span> <?php esc_html_e( 'One active request at a time', 'studio-build' ); ?></li>
                    <li class="flex items-center gap-2"><span class="text-[#E8590C]">●</span> <?php esc_html_e( 'Design + development', 'studio-build' ); ?></li>
                    <li class="flex items-center gap-2"><span class="text-[#E8590C]">●</span> <?php esc_html_e( 'Ongoing improvements', 'studio-build' ); ?></li>
                    <li class="flex items-center gap-2"><span class="text-[#E8590C]">●</span> <?php esc_html_e( 'Clear communication', 'studio-build' ); ?></li>
                    <li class="flex items-center gap-2 sm:col-span-2"><span class="text-[#E8590C]">●</span> <?php esc_html_e( 'Flexible engagement', 'studio-build' ); ?></li>
                </ul>
            </div>
            <div class="pt-4 border-t border-neutral-100">
                <a class="w-full inline-flex items-center justify-center gap-2 py-3 rounded-full bg-neutral-900 text-white font-medium text-sm hover:bg-neutral-800 transition-colors shadow-sm" href="#book">
                    <span class="w-2 h-2 rounded-full bg-[#E8590C]"></span>
                    <?php esc_html_e( 'Discuss a project', 'studio-build' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
`,
  },
  {
    path: 'template-parts/booking/section-booking.php',
    filename: 'section-booking.php',
    category: 'template',
    description: 'Instant Booking consultation UI with 3 interactive steps, validation, and confirmation',
    content: `<?php
/**
 * Instant Booking Template Part
 *
 * @package Studio_Build
 */

$booking_query = new WP_Query( array(
    'post_type'      => 'booking_service',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );
?>
<section class="space-y-8" id="book">
    <div class="space-y-1">
        <span class="text-[#E8590C] font-mono text-xs font-semibold uppercase tracking-wider"><?php esc_html_e( '// Instant Booking', 'studio-build' ); ?></span>
        <h2 class="text-2xl sm:text-3xl font-display font-bold text-neutral-900 tracking-tight"><?php esc_html_e( 'Book a conversation', 'studio-build' ); ?></h2>
        <p class="text-xs sm:text-sm text-neutral-600 max-w-xl"><?php esc_html_e( 'Pick a topic, select a time that suits you, and let’s talk through your project.', 'studio-build' ); ?></p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
        <!-- Left Visual: Kausar working portrait with chat bubble -->
        <div class="md:col-span-5 bg-neutral-100 rounded-3xl border border-neutral-200/80 p-6 flex flex-col justify-between relative overflow-hidden min-h-[340px]">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80" alt="Kausar portrait" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

            <div class="relative z-10 self-end bg-white/95 backdrop-blur-md rounded-2xl p-2.5 shadow-lg border border-white flex items-center gap-2 max-w-[200px] mt-4">
                <div class="w-7 h-7 rounded-full bg-neutral-900 text-white flex items-center justify-center text-[10px] font-bold">KB</div>
                <div class="text-[10px]">
                    <p class="font-bold text-neutral-900">Kausar</p>
                    <p class="text-emerald-600 font-mono text-[9px] flex items-center gap-1">
                        <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Available
                    </p>
                </div>
            </div>

            <div class="relative z-10 text-white space-y-1">
                <span class="inline-block px-2 py-0.5 rounded-full bg-white/20 backdrop-blur-md text-[10px] font-mono tracking-wider">● AVAILABLE</span>
                <h4 class="font-display font-bold text-lg">Kausar.Build</h4>
                <p class="text-xs text-neutral-300">Design Engineer</p>
            </div>
        </div>

        <!-- Right: 3-Step Service Selector Form -->
        <div class="md:col-span-7 bg-white rounded-3xl border border-neutral-200/80 shadow-soft p-6 sm:p-8 flex flex-col justify-between" id="booking-wizard-card">
            <form id="studio-booking-form" class="space-y-5">
                <!-- Step Header -->
                <div class="bg-gradient-to-r from-orange-600 to-amber-600 text-white p-4 rounded-2xl flex items-center justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base" id="booking-step-title"><?php esc_html_e( 'Select Service', 'studio-build' ); ?></h3>
                        <p class="text-[11px] text-orange-100 font-mono" id="booking-step-indicator"><?php esc_html_e( 'Step 1 of 3', 'studio-build' ); ?></p>
                    </div>
                    <div class="flex gap-1" id="booking-dots">
                        <span class="w-2 h-2 rounded-full bg-white dot-1"></span>
                        <span class="w-2 h-2 rounded-full bg-white/40 dot-2"></span>
                        <span class="w-2 h-2 rounded-full bg-white/40 dot-3"></span>
                    </div>
                </div>

                <!-- Step 1: Radio Options -->
                <div id="booking-step-1" class="space-y-3">
                    <fieldset class="space-y-3">
                        <legend class="sr-only"><?php esc_html_e( 'Consultation services', 'studio-build' ); ?></legend>
                        <?php
                        $index = 0;
                        if ( $booking_query->have_posts() ) :
                            while ( $booking_query->have_posts() ) : $booking_query->the_post();
                                $price_raw = get_post_meta( get_the_ID(), '_booking_price', true );
                                $dur       = get_post_meta( get_the_ID(), '_booking_duration', true ) ?: '30 min';
                                $sub       = get_the_excerpt() ?: 'Discuss a project or design direction.';
                                $checked   = ( $index === 0 ) ? 'checked' : '';
                                $price_str = ( empty( $price_raw ) || $price_raw === '0' || strtolower( $price_raw ) === 'free' ) ? 'Free' : '$' . $price_raw;
                        ?>
                                <label class="flex items-center justify-between p-3.5 rounded-2xl border border-neutral-200 hover:border-orange-500/60 transition-all cursor-pointer bg-neutral-50/50 hover:bg-orange-50/30 group booking-option-label">
                                    <div class="flex items-start gap-3">
                                        <input type="radio" name="booking_service" value="<?php echo esc_attr( get_the_ID() ); ?>" data-title="<?php the_title_attribute(); ?>" data-price="<?php echo esc_attr( $price_str ); ?>" class="mt-1 text-[#E8590C] focus:ring-[#E8590C]" <?php echo $checked; ?>>
                                        <div>
                                            <p class="text-xs font-semibold text-neutral-900 group-hover:text-[#E8590C] transition-colors"><?php the_title(); ?></p>
                                            <p class="text-[10px] text-neutral-500 font-mono"><?php echo esc_html( $dur . ' · ' . $sub ); ?></p>
                                        </div>
                                    </div>
                                    <span class="font-display font-bold text-xs text-neutral-900"><?php echo esc_html( $price_str ); ?></span>
                                </label>
                        <?php
                                $index++;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </fieldset>
                </div>

                <!-- Step 2: Inputs -->
                <div id="booking-step-2" class="space-y-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input type="text" id="booking_name" name="booking_name" placeholder="<?php esc_attr_e( 'Your Name', 'studio-build' ); ?>" required class="text-xs rounded-xl border-neutral-200 bg-neutral-50 p-2.5 focus:border-[#E8590C] focus:ring-[#E8590C] w-full">
                        <input type="email" id="booking_email" name="booking_email" placeholder="<?php esc_attr_e( 'Your Email Address', 'studio-build' ); ?>" required class="text-xs rounded-xl border-neutral-200 bg-neutral-50 p-2.5 focus:border-[#E8590C] focus:ring-[#E8590C] w-full">
                    </div>
                </div>

                <!-- Step 3: Success Confirmation (Hidden initially) -->
                <div id="booking-step-3" class="hidden text-center py-6 space-y-3">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-xl">✓</div>
                    <h4 class="font-display font-bold text-base text-neutral-900"><?php esc_html_e( 'Request Sent', 'studio-build' ); ?></h4>
                    <p class="text-xs text-neutral-500 max-w-sm mx-auto" id="booking-confirm-details"><?php esc_html_e( 'Thank you. I will review your note and get back to you with available times.', 'studio-build' ); ?></p>
                </div>

                <!-- Action Footer -->
                <div class="pt-4 flex items-center justify-between border-t border-neutral-100">
                    <span class="text-[11px] text-neutral-400 font-mono"><?php esc_html_e( 'Direct personal response', 'studio-build' ); ?></span>
                    <button type="submit" id="booking-submit-btn" class="w-10 h-10 rounded-full bg-neutral-900 hover:bg-[#E8590C] text-white flex items-center justify-center shadow transition-all group">
                        <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
`,
  },
  {
    path: 'inc/custom-post-types.php',
    filename: 'custom-post-types.php',
    category: 'inc',
    description: 'Registers Project, Service, Testimonial, and Booking CPTs in WordPress Admin',
    content: `<?php
/**
 * Register Custom Post Types for Studio Build Portfolio
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_register_cpts() {
    // 1. Projects CPT (Portfolio Archive)
    register_post_type( 'portfolio_project', array(
        'labels' => array(
            'name'               => esc_html__( 'Projects', 'studio-build' ),
            'singular_name'      => esc_html__( 'Project', 'studio-build' ),
            'add_new_item'       => esc_html__( 'Add New Project', 'studio-build' ),
            'edit_item'          => esc_html__( 'Edit Project', 'studio-build' ),
            'new_item'           => esc_html__( 'New Project', 'studio-build' ),
            'view_item'          => esc_html__( 'View Project', 'studio-build' ),
            'search_items'       => esc_html__( 'Search Projects', 'studio-build' ),
            'not_found'          => esc_html__( 'No projects found', 'studio-build' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-portfolio',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    // 2. Services CPT (Numbered Accordions)
    register_post_type( 'studio_service', array(
        'labels' => array(
            'name'          => esc_html__( 'Services', 'studio-build' ),
            'singular_name' => esc_html__( 'Service', 'studio-build' ),
            'add_new_item'  => esc_html__( 'Add New Service', 'studio-build' ),
            'edit_item'     => esc_html__( 'Edit Service', 'studio-build' ),
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-hammer',
        'supports'      => array( 'title', 'editor', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );

    // 3. Testimonials CPT (Client Quotes)
    register_post_type( 'client_testimonial', array(
        'labels' => array(
            'name'          => esc_html__( 'Testimonials', 'studio-build' ),
            'singular_name' => esc_html__( 'Testimonial', 'studio-build' ),
            'add_new_item'  => esc_html__( 'Add New Testimonial', 'studio-build' ),
            'edit_item'     => esc_html__( 'Edit Testimonial', 'studio-build' ),
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'  => true,
    ) );

    // 4. Booking Consultation Services CPT
    register_post_type( 'booking_service', array(
        'labels' => array(
            'name'          => esc_html__( 'Booking Options', 'studio-build' ),
            'singular_name' => esc_html__( 'Booking Option', 'studio-build' ),
            'add_new_item'  => esc_html__( 'Add Consultation Option', 'studio-build' ),
            'edit_item'     => esc_html__( 'Edit Consultation Option', 'studio-build' ),
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'supports'      => array( 'title', 'excerpt', 'page-attributes' ),
        'show_in_rest'  => true,
    ) );
}
add_action( 'init', 'studio_build_register_cpts' );
`,
  },
  {
    path: 'inc/custom-fields.php',
    filename: 'custom-fields.php',
    category: 'inc',
    description: 'Meta boxes and fields for custom post types (prices, categories, years, tags)',
    content: `<?php
/**
 * Native Meta Boxes for Studio Build Custom Post Types
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register meta boxes
 */
function studio_build_add_meta_boxes() {
    // Project Meta Box
    add_meta_box(
        'studio_project_details',
        esc_html__( 'Project Metadata', 'studio-build' ),
        'studio_build_render_project_metabox',
        'portfolio_project',
        'normal',
        'high'
    );

    // Testimonial Meta Box
    add_meta_box(
        'studio_testimonial_details',
        esc_html__( 'Author Role & Company', 'studio-build' ),
        'studio_build_render_testimonial_metabox',
        'client_testimonial',
        'normal',
        'high'
    );

    // Booking Service Meta Box
    add_meta_box(
        'studio_booking_details',
        esc_html__( 'Service Pricing & Duration', 'studio-build' ),
        'studio_build_render_booking_metabox',
        'booking_service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'studio_build_add_meta_boxes' );

function studio_build_render_project_metabox( $post ) {
    wp_nonce_field( 'studio_save_project_meta', 'studio_project_meta_nonce' );
    $category = get_post_meta( $post->ID, '_project_category', true );
    $year     = get_post_meta( $post->ID, '_project_year', true );
    $tag      = get_post_meta( $post->ID, '_project_tag', true );
    $url      = get_post_meta( $post->ID, '_project_url', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Category Badge (e.g. Web Design, Brand Identity):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_category" value="<?php echo esc_attr( $category ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Year (e.g. 2024):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Tech Stack Tag (e.g. Web App, Figma / React):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="project_tag" value="<?php echo esc_attr( $tag ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'External Project URL:', 'studio-build' ); ?></strong></label><br>
        <input type="url" name="project_url" value="<?php echo esc_attr( $url ); ?>" style="width:100%;">
    </p>
    <?php
}

function studio_build_render_testimonial_metabox( $post ) {
    wp_nonce_field( 'studio_save_testimonial_meta', 'studio_testimonial_meta_nonce' );
    $role    = get_post_meta( $post->ID, '_testimonial_role', true );
    $company = get_post_meta( $post->ID, '_testimonial_company', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Client Job Title (e.g. Co-founder):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="testimonial_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Client Company (e.g. Orion Labs):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="testimonial_company" value="<?php echo esc_attr( $company ); ?>" style="width:100%;">
    </p>
    <?php
}

function studio_build_render_booking_metabox( $post ) {
    wp_nonce_field( 'studio_save_booking_meta', 'studio_booking_meta_nonce' );
    $price    = get_post_meta( $post->ID, '_booking_price', true );
    $duration = get_post_meta( $post->ID, '_booking_duration', true );
    ?>
    <p>
        <label><strong><?php esc_html_e( 'Price USD (e.g. 240):', 'studio-build' ); ?></strong></label><br>
        <input type="number" name="booking_price" value="<?php echo esc_attr( $price ); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php esc_html_e( 'Duration (e.g. 20 min):', 'studio-build' ); ?></strong></label><br>
        <input type="text" name="booking_duration" value="<?php echo esc_attr( $duration ); ?>" style="width:100%;">
    </p>
    <?php
}

function studio_build_save_meta_boxes( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if ( isset( $_POST['studio_project_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_project_meta_nonce'], 'studio_save_project_meta' ) ) {
        if ( isset( $_POST['project_category'] ) ) update_post_meta( $post_id, '_project_category', sanitize_text_field( $_POST['project_category'] ) );
        if ( isset( $_POST['project_year'] ) ) update_post_meta( $post_id, '_project_year', sanitize_text_field( $_POST['project_year'] ) );
        if ( isset( $_POST['project_tag'] ) ) update_post_meta( $post_id, '_project_tag', sanitize_text_field( $_POST['project_tag'] ) );
        if ( isset( $_POST['project_url'] ) ) update_post_meta( $post_id, '_project_url', esc_url_raw( $_POST['project_url'] ) );
    }

    if ( isset( $_POST['studio_testimonial_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_testimonial_meta_nonce'], 'studio_save_testimonial_meta' ) ) {
        if ( isset( $_POST['testimonial_role'] ) ) update_post_meta( $post_id, '_testimonial_role', sanitize_text_field( $_POST['testimonial_role'] ) );
        if ( isset( $_POST['testimonial_company'] ) ) update_post_meta( $post_id, '_testimonial_company', sanitize_text_field( $_POST['testimonial_company'] ) );
    }

    if ( isset( $_POST['studio_booking_meta_nonce'] ) && wp_verify_nonce( $_POST['studio_booking_meta_nonce'], 'studio_save_booking_meta' ) ) {
        if ( isset( $_POST['booking_price'] ) ) update_post_meta( $post_id, '_booking_price', sanitize_text_field( $_POST['booking_price'] ) );
        if ( isset( $_POST['booking_duration'] ) ) update_post_meta( $post_id, '_booking_duration', sanitize_text_field( $_POST['booking_duration'] ) );
    }
}
add_action( 'save_post', 'studio_build_save_meta_boxes' );
`,
  },
  {
    path: 'inc/theme-settings.php',
    filename: 'theme-settings.php',
    category: 'inc',
    description: 'WordPress Customizer panels for all texts, images, rates, and colors',
    content: `<?php
/**
 * WordPress Customizer Panels for Studio Build Theme
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_customize_register( $wp_customize ) {
    // Main Panel
    $wp_customize->add_panel( 'studio_build_panel', array(
        'title'       => esc_html__( 'Kausar.Build Portfolio Settings', 'studio-build' ),
        'description' => esc_html__( 'Manage all homepage sections, bio details, stats, pricing, and visual tokens.', 'studio-build' ),
        'priority'    => 20,
    ) );

    // Section 1: Hero & Hanging Pass
    $wp_customize->add_section( 'studio_hero_section', array(
        'title' => esc_html__( 'Hero & Lanyard Pass', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_site_brand', array( 'default' => 'Kausar.Build', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_site_brand', array( 'label' => 'Navbar Brand Title', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_status', array( 'default' => 'Available', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_hero_status', array( 'label' => 'Status Tagline', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_greeting', array( 'default' => 'Hello, I am Kausar', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_hero_greeting', array( 'label' => 'Hero Greeting', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_headline', array( 'default' => 'I Turn Ideas Into Websites.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_hero_headline', array( 'label' => 'Hero Sub-headline', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_hero_description', array( 'default' => 'I design and build websites with a focus on great design, clean work, and a smooth experience. Simple, thoughtful, and made to last. Open for projects ↓', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_hero_description', array( 'label' => 'Hero Bio Description', 'section' => 'studio_hero_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_hero_image', array( 'default' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studio_hero_image', array( 'label' => 'Lanyard Badge Portrait (hero-image)', 'section' => 'studio_hero_section' ) ) );

    $wp_customize->add_setting( 'studio_badge_name', array( 'default' => 'KAUSAR', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_badge_name', array( 'label' => 'Badge Name Tag', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_badge_role', array( 'default' => 'DESIGN ENGINEER', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_badge_role', array( 'label' => 'Badge Role Tag', 'section' => 'studio_hero_section', 'type' => 'text' ) );

    // Section 2: How It Works & Profile Stats
    $wp_customize->add_section( 'studio_profile_section', array(
        'title' => esc_html__( 'Profile Info & Monthly Retainer', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_profile_location', array( 'default' => 'India', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_location', array( 'label' => 'Location', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_experience', array( 'default' => 'Design + Development', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_experience', array( 'label' => 'Experience Summary', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_focus', array( 'default' => 'Websites & Digital Products', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_focus', array( 'label' => 'Focus Summary', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_status', array( 'default' => 'Available for selected projects', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_profile_status', array( 'label' => 'Availability Status', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_profile_bio', array( 'default' => 'I care about clear ideas, thoughtful details, and building things that are genuinely useful.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_profile_bio', array( 'label' => 'Profile Bio', 'section' => 'studio_profile_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_retainer_title', array( 'default' => 'Monthly Website Support', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_retainer_title', array( 'label' => 'Retainer Title', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_retainer_description', array( 'default' => 'Ongoing design and development support for websites that need regular improvements, updates, or new work.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_retainer_description', array( 'label' => 'Retainer Description', 'section' => 'studio_profile_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_retainer_price', array( 'default' => 'Let’s talk', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_retainer_price', array( 'label' => 'Retainer Price or Label', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_retainer_period', array( 'default' => 'Flexible scope', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_retainer_period', array( 'label' => 'Retainer Period or Scope', 'section' => 'studio_profile_section', 'type' => 'text' ) );

    // Section 3: Accent Color
    $wp_customize->add_section( 'studio_colors_section', array(
        'title' => esc_html__( 'Theme Accent Color', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_accent_color', array( 'default' => '#E8590C', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'studio_accent_color', array( 'label' => 'Primary Accent Color', 'section' => 'studio_colors_section' ) ) );

    // Section 4: About Me Bento Grid
    $wp_customize->add_section( 'studio_about_section', array(
        'title' => esc_html__( 'About Bento Grid', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_about_title', array( 'default' => '// About me', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_title', array( 'label' => 'Section Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_subtitle', array( 'default' => 'The person behind the pixels', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_subtitle', array( 'label' => 'Section Subtitle', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_portrait_tag', array( 'default' => 'Creator & Coder', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_portrait_tag', array( 'label' => 'Portrait Card Tag', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_about_portrait_sub', array( 'default' => 'Exploring the boundaries of digital craft.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_about_portrait_sub', array( 'label' => 'Portrait Card Subtitle', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_music_title', array( 'default' => 'Veeran Sheher', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_music_title', array( 'label' => 'Music Track Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_music_artist', array( 'default' => 'Kausar XD', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_music_artist', array( 'label' => 'Music Artist Name', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_spotify_url', array( 'default' => 'https://open.spotify.com/track/2U699aQLnplBGFGxWBIiDD', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_spotify_url', array( 'label' => 'Spotify Track URL', 'section' => 'studio_about_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_personal_title', array( 'default' => 'Workstation Rig', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_title', array( 'label' => 'Studio Environment Card Title', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_sub', array( 'default' => 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_personal_sub', array( 'label' => 'Studio Environment Description', 'section' => 'studio_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_personal_img', array( 'default' => 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_personal_img', array( 'label' => 'Studio Photo URL (16:11 Aspect)', 'section' => 'studio_about_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_personal_tag', array( 'default' => 'Studio Rig', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_tag', array( 'label' => 'Studio Tag Pill', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_badge', array( 'default' => 'Studio Setup', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_badge', array( 'label' => 'Studio Badge Pill', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_note', array( 'default' => 'M3 Max · Studio Display · Custom Oak', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_note', array( 'label' => 'Hardware Specs Note', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_personal_time', array( 'default' => 'Setup v4', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_personal_time', array( 'label' => 'Setup Version / Time Tag', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_manifesto_title', array( 'default' => '// Guiding Philosophy', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_manifesto_title', array( 'label' => 'Guiding Philosophy Tag Pill', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_manifesto_quote', array( 'default' => 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'studio_manifesto_quote', array( 'label' => 'Guiding Philosophy Quote Statement', 'section' => 'studio_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'studio_manifesto_author', array( 'default' => '— Kausar · Design Engineer', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_manifesto_author', array( 'label' => 'Guiding Philosophy Author Attribution', 'section' => 'studio_about_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_manifesto_sub', array( 'default' => 'Zero bloat · 100% independent craft', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_manifesto_sub', array( 'label' => 'Guiding Philosophy Sub-tagline', 'section' => 'studio_about_section', 'type' => 'text' ) );

    // Section 5: Footer & Signature
    $wp_customize->add_section( 'studio_footer_section', array(
        'title' => esc_html__( 'Footer, Signature & Socials', 'studio-build' ),
        'panel' => 'studio_build_panel',
    ) );

    $wp_customize->add_setting( 'studio_footer_greeting', array( 'default' => 'Thanks for being here.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_footer_greeting', array( 'label' => 'Footer Greeting', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_footer_tagline', array( 'default' => 'Let’s build something thoughtful.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_footer_tagline', array( 'label' => 'Footer Tagline', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_signature_name', array( 'default' => 'Kausar.Build', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_signature_name', array( 'label' => 'Signature Name', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_copyright_text', array( 'default' => '© 2026 Kausar.Build. All Rights Reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'studio_copyright_text', array( 'label' => 'Copyright Text', 'section' => 'studio_footer_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'studio_social_email', array( 'default' => 'your@email.com', 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'studio_social_email', array( 'label' => 'Contact Email', 'section' => 'studio_footer_section', 'type' => 'email' ) );

    $wp_customize->add_setting( 'studio_social_instagram', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_instagram', array( 'label' => 'Instagram URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_linkedin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_linkedin', array( 'label' => 'LinkedIn URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_twitter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_twitter', array( 'label' => 'X / Twitter URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'studio_social_github', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'studio_social_github', array( 'label' => 'GitHub URL', 'section' => 'studio_footer_section', 'type' => 'url' ) );
}
add_action( 'customize_register', 'studio_build_customize_register' );
`,
  },
  {
    path: 'inc/demo-importer.php',
    filename: 'demo-importer.php',
    category: 'inc',
    description: 'Seeds initial placeholder projects, services, and testimonials on activation',
    content: `<?php
/**
 * Auto Demo Content Seeder for Studio Build
 *
 * @package Studio_Build
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function studio_build_seed_demo_data() {
    if ( get_option( 'studio_build_demo_seeded' ) ) {
        return;
    }

    // 1. Seed Projects (Digital Product Design Archive - 1:1)
    $projects = array(
        array(
            'title'    => 'Your website has one job.',
            'content'  => 'A clean, high-impact digital presence engineered to convert visitors into believers without friction.',
            'category' => 'Websites',
            'year'     => '2026',
            'tag'      => "Let's create · @kausar.build",
            'image'    => '/assets/projects/project-1-one-job.svg',
        ),
        array(
            'title'    => 'To make people trust your business.',
            'content'  => 'Not confuse them. Clarity-first branding and website systems that establish credibility instantly.',
            'category' => 'Strategy Through Design',
            'year'     => '2026',
            'tag'      => 'Branding · Websites · Experiences',
            'image'    => '/assets/projects/project-2-trust-business.svg',
        ),
        array(
            'title'    => "Beautiful isn't enough. It has to convert.",
            'content'  => 'Automate. Analyze. Accelerate. High-performance product interfaces engineered for measurable business growth.',
            'category' => 'UI / Conversion',
            'year'     => '2026',
            'tag'      => 'Conversion Systems',
            'image'    => '/assets/projects/project-3-convert-dashboard.svg',
        ),
        array(
            'title'    => 'I design websites that look premium and perform.',
            'content'  => 'Precision digital craft uniting high-end visual elegance with uncompromising speed and responsiveness.',
            'category' => 'Web Design',
            'year'     => '2026',
            'tag'      => 'Design + Development',
            'image'    => '/assets/projects/project-4-premium-perform.svg',
        ),
    );

    foreach ( $projects as $p ) {
        $post_id = wp_insert_post( array(
            'post_title'   => $p['title'],
            'post_content' => $p['content'],
            'post_status'  => 'publish',
            'post_type'    => 'portfolio_project',
        ) );
        if ( $post_id ) {
            update_post_meta( $post_id, '_project_category', $p['category'] );
            update_post_meta( $post_id, '_project_year', $p['year'] );
            update_post_meta( $post_id, '_project_tag', $p['tag'] );
        }
    }

    // 2. Seed Services
    $services = array(
        'UI & Product Design' => 'High-converting wireframes, interactive Figma prototypes, design discovery, user research, and comprehensive UI systems tailored to your product objectives.',
        'Design Engineering' => 'Bridging design and clean code with modern frontend stacks (React, Vue, Tailwind CSS, TypeScript) with emphasis on snappy rendering and zero layout shift.',
        'Framer & WordPress Development' => 'No-code to custom-coded publishing sites: high-speed WordPress themes, Framer landing pages, and intuitive CMS authoring setups for non-technical teams.',
        'Design Systems' => 'Tokenized component libraries, cross-platform UI kits, design documentation, and governance frameworks that allow engineering teams to ship 3x faster.',
        'Interaction & Motion Design' => 'Delightful micro-interactions, scroll-driven storytelling, interactive canvas experiences, and responsive SVG animations that elevate your brand feeling.',
    );

    $order = 1;
    foreach ( $services as $title => $desc ) {
        wp_insert_post( array(
            'post_title'   => $title,
            'post_content' => $desc,
            'post_status'  => 'publish',
            'post_type'    => 'studio_service',
            'menu_order'   => $order++,
        ) );
    }

    // 3. Seed Booking Options
    $bookings = array(
        array( 'title' => 'Product Design & Engineering', 'price' => 240, 'dur' => '20 min', 'desc' => 'End-to-end ownership from design to code' ),
        array( 'title' => 'Framer Site or Landing Page', 'price' => 120, 'dur' => '30 min', 'desc' => 'Fast-launch site ready to convert' ),
        array( 'title' => 'Design System Setup', 'price' => 160, 'dur' => '15 min', 'desc' => 'I create design system that can scale' ),
    );

    foreach ( $bookings as $b ) {
        $bid = wp_insert_post( array(
            'post_title'   => $b['title'],
            'post_excerpt' => $b['desc'],
            'post_status'  => 'publish',
            'post_type'    => 'booking_service',
        ) );
        if ( $bid ) {
            update_post_meta( $bid, '_booking_price', $b['price'] );
            update_post_meta( $bid, '_booking_duration', $b['dur'] );
        }
    }

    // 4. Seed Testimonial
    $tid = wp_insert_post( array(
        'post_title'   => 'Marcus Reid',
        'post_content' => "Working with Kausar was a completely different experience. He didn't just deliver static designs, he delivered a living, working product that scaled effortlessly.",
        'post_status'  => 'publish',
        'post_type'    => 'client_testimonial',
    ) );
    if ( $tid ) {
        update_post_meta( $tid, '_testimonial_role', 'Co-founder' );
        update_post_meta( $tid, '_testimonial_company', 'Orion Labs' );
    }

    update_option( 'studio_build_demo_seeded', 1 );
}
add_action( 'after_switch_theme', 'studio_build_seed_demo_data' );
`,
  },
  {
    path: 'assets/js/main.js',
    filename: 'main.js',
    category: 'asset',
    description: 'Frontend JavaScript handling 3D lanyard badge tilt, booking wizard, and animations',
    content: `/**
 * Studio Build Theme Interaction Controller
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Interactive 3D Lanyard Pass Physics & Tilt
    const lanyardCard = document.querySelector('.lanyard-card');
    const lanyardWrapper = document.getElementById('hero-lanyard-wrapper');

    if (lanyardCard && lanyardWrapper) {
        lanyardWrapper.addEventListener('mousemove', (e) => {
            const rect = lanyardWrapper.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            const tiltX = (y / (rect.height / 2)) * -8;
            const tiltY = (x / (rect.width / 2)) * 10;
            lanyardCard.style.transform = \`perspective(600px) rotateX(\${tiltX}deg) rotateY(\${tiltY}deg)\`;
        });

        lanyardWrapper.addEventListener('mouseleave', () => {
            lanyardCard.style.transform = 'perspective(600px) rotateX(0deg) rotateY(0deg)';
        });
    }

    // 2. Interactive Booking Consultation Wizard
    const bookingForm = document.getElementById('studio-booking-form');
    const stepTitle = document.getElementById('booking-step-title');
    const stepIndicator = document.getElementById('booking-step-indicator');
    const step1 = document.getElementById('booking-step-1');
    const step2 = document.getElementById('booking-step-2');
    const step3 = document.getElementById('booking-step-3');
    const submitBtn = document.getElementById('booking-submit-btn');
    const dot1 = document.querySelector('#booking-dots .dot-1');
    const dot2 = document.querySelector('#booking-dots .dot-2');
    const dot3 = document.querySelector('#booking-dots .dot-3');

    let currentStep = 1;

    // Radio selection visual highlight
    const radios = document.querySelectorAll('input[name="booking_service"]');
    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            document.querySelectorAll('.booking-option-label').forEach(label => {
                label.classList.remove('border-[#E8590C]', 'bg-orange-50/40');
                label.classList.add('border-neutral-200', 'bg-neutral-50/50');
            });
            const activeLabel = radio.closest('.booking-option-label');
            if (activeLabel) {
                activeLabel.classList.remove('border-neutral-200', 'bg-neutral-50/50');
                activeLabel.classList.add('border-[#E8590C]', 'bg-orange-50/40');
            }
        });
    });

    if (bookingForm) {
        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();

            if (currentStep === 1) {
                // Advance to Step 2
                currentStep = 2;
                stepTitle.textContent = 'Contact Details';
                stepIndicator.textContent = 'Step 2 of 3';
                if (dot1) dot1.classList.replace('bg-white', 'bg-white/40');
                if (dot2) dot2.classList.replace('bg-white/40', 'bg-white');
                document.getElementById('booking_name')?.focus();
            } else if (currentStep === 2) {
                const nameInput = document.getElementById('booking_name');
                const emailInput = document.getElementById('booking_email');

                if (!nameInput.value.trim() || !emailInput.value.trim()) {
                    alert('Please enter your name and email address.');
                    return;
                }

                // Advance to confirmation (Step 3)
                currentStep = 3;
                stepTitle.textContent = 'Confirmed';
                stepIndicator.textContent = 'Step 3 of 3';
                if (step1) step1.classList.add('hidden');
                if (step2) step2.classList.add('hidden');
                if (step3) step3.classList.remove('hidden');
                if (submitBtn) submitBtn.classList.add('hidden');
                if (dot2) dot2.classList.replace('bg-white', 'bg-white/40');
                if (dot3) dot3.classList.replace('bg-white/40', 'bg-white');
            }
        });
    }

    // 3. Smooth scrolling for internal anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId.length > 1) {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
});
`,
  },
  {
    path: 'README.md',
    filename: 'README.md',
    category: 'doc',
    description: 'Full installation, editing, image replacement, and booking integration guide',
    content: `# Studio Build Portfolio — WordPress Theme

A precision-crafted, fully editable, and high-performance WordPress theme for **Kausar.Build** (https://kausar.build/), packaged as a complete, independent, and fully editable WordPress theme.

---

## 1. Quick Installation

1. Download the \`recreated-wordpress-site.zip\` file.
2. Log into your WordPress Dashboard (\`wp-admin\`).
3. Navigate to **Appearance → Themes → Add New → Upload Theme**.
4. Choose the \`recreated-wordpress-site.zip\` archive and click **Install Now**.
5. Click **Activate**.
6. **Done!** The theme automatically seeds default demo content (Projects, Services, Testimonials, and Consultation Booking Services) with zero setup required.

---

## 2. Where Content is Edited

### Global Settings & Homepage Bio
- Go to **Appearance → Customize → Kausar.Build Portfolio Settings**.
- **Hero & Lanyard Pass**: Edit your hero greeting, main headline, bio description, CV link, and upload your high-resolution portrait for the physical hanging ID badge card.
- **Profile Info & Support Retainer**: Configure your location, experience, focus, and ongoing website support details.
- **Theme Accent Color**: Adjust the vibrant signal orange accent or pick your signature brand color.

### Managing Projects (Design Archive)
- Go to **WordPress Admin → Projects**.
- Click **Add New Project**.
- Set the title, description, category badge (e.g. *Web Design*, *Brand Identity*, *Design Systems*), year, tech stack tag, and upload the featured image (16:10 aspect ratio).

### Managing Services
- Go to **WordPress Admin → Services**.
- Add or edit services. Reorder them using the order attribute.
- The front page automatically displays them as clean 01-05 numbered accordions with expand/collapse physics.

### Managing Testimonials
- Go to **WordPress Admin → Testimonials**.
- Set author name, job title, company name, client avatar, and quote.

### Instant Consultation Booking
- Go to **WordPress Admin → Booking Options**.
- Edit consultation types (e.g. *Product Design & Engineering*, *Framer Site*, *Design System*), duration, and USD prices ($240, $120, $160).
- The 3-step booking wizard will automatically update on the front end.

---

## 3. Image Replacement Guide

To maintain exact layout fidelity without breaking grid proportions:
- **Hero Lanyard Badge Image (\`hero-image\`)**: Upload an image with a **4:5 portrait ratio** (e.g., 800 × 1000 px).
- **About Me Portrait (\`about-image\`)**: Upload a **3:4 tall portrait ratio** (e.g., 900 × 1200 px).
- **Project Cards (\`project-image-01..04\`)**: Upload **16:10 or 16:9 landscape ratios** (e.g., 1280 × 800 px).
- **Moments Photos**: Upload **4:3 landscape snapshots** (e.g., 800 × 600 px).

---

## 4. Connecting External Booking Providers (Calendly / Cal.com / Stripe)

The consultation wizard is built with an extensible WordPress action hook:

\`\`\`php
add_action( 'studio_build_after_booking_submit', function( $booking_data ) {
    // $booking_data contains: 'service_title', 'service_price', 'name', 'email', 'notes'
    // Integrate with Calendly, Cal.com API, webhook, or Stripe Checkout here:
    // wp_remote_post('https://your-webhook-endpoint.com', array('body' => $booking_data));
} );
\`\`\`

---

## 5. Required Plugins
- **Zero mandatory plugins!** The theme relies entirely on native WordPress core APIs, Custom Post Types, and Customizer controls.
- Optional: If you prefer advanced block editing, Gutenberg blocks are supported.

© 2026 Kausar.Build Theme. Crafted with precision for creative engineers.
`,
  },
];
