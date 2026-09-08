<?php
/**
 * Footer template for Studio Build Portfolio
 *
 * Reproduces React FooterSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$footer_greeting = get_theme_mod( 'studio_footer_greeting', 'Thanks for being here.' );
$footer_tagline  = get_theme_mod( 'studio_footer_tagline', "Let's build something thoughtful." );
$profile_name    = get_theme_mod( 'studio_profile_name', 'Kausar' );
$signature_name  = get_theme_mod( 'studio_signature_name', 'Kausar.Build' );
$copyright       = get_theme_mod( 'studio_copyright', '© 2026 Kausar.Build. All Rights Reserved.' );
$wax_seal_img    = studio_build_get_image_src( 'studio_wax_seal_image', '' );
$signature_img   = studio_build_get_image_src( 'studio_signature_image', '' );

$social_github    = get_theme_mod( 'studio_social_github', 'https://github.com' );
$social_email     = get_theme_mod( 'studio_social_email', 'mailto:hello@kausar.build' );
$social_linkedin  = get_theme_mod( 'studio_social_linkedin', 'https://linkedin.com' );
$social_instagram = get_theme_mod( 'studio_social_instagram', 'https://instagram.com' );
$social_twitter   = get_theme_mod( 'studio_social_twitter', 'https://twitter.com' );

$has_socials = ( $social_github || $social_linkedin || $social_instagram || $social_twitter || ( $social_email && $social_email !== 'mailto:' ) );
?>

<footer id="site-footer" class="pt-16 pb-20 border-t border-neutral-200/80 text-center space-y-8 max-w-4xl mx-auto px-4">
    <!-- Social Buttons - only rendered if URL is set and non-empty -->
    <?php if ( $has_socials ) : ?>
        <div id="footer-social-links" class="flex items-center justify-center gap-3">
            <?php if ( $social_github ) : ?>
                <a
                    href="<?php echo esc_url( $social_github ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
                    aria-label="GitHub Profile"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if ( $social_email && $social_email !== 'mailto:' ) : ?>
                <a
                    href="<?php echo esc_url( strpos( $social_email, 'mailto:' ) === 0 ? $social_email : 'mailto:' . $social_email ); ?>"
                    class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
                    aria-label="Send Email"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if ( $social_linkedin ) : ?>
                <a
                    href="<?php echo esc_url( $social_linkedin ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
                    aria-label="LinkedIn Profile"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if ( $social_instagram ) : ?>
                <a
                    href="<?php echo esc_url( $social_instagram ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
                    aria-label="Instagram Profile"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if ( $social_twitter ) : ?>
                <a
                    href="<?php echo esc_url( $social_twitter ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
                    aria-label="X Profile"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Greeting & Decorative Wax Seal Badge -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 text-xs sm:text-sm text-neutral-600 font-medium">
        <span><?php echo esc_html( $footer_greeting ); ?></span>
        <!-- Neutral Kausar.Build Wax Seal Badge -->
        <div class="w-10 h-10 relative select-none hover:rotate-12 transition-transform cursor-pointer flex items-center justify-center shrink-0">
            <?php if ( ! empty( $wax_seal_img ) ) : ?>
                <img src="<?php echo esc_url( $wax_seal_img ); ?>" alt="Wax Seal" class="w-10 h-10 rounded-full object-cover shadow-md border border-[#e8590c]/40" />
            <?php else : ?>
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c94a08] to-[#9c3405] text-white flex items-center justify-center shadow-md border border-[#e8590c]/40">
                    <span class="font-display font-black text-[10px] tracking-widest uppercase">
                        KB
                    </span>
                </div>
            <?php endif; ?>
        </div>
        <span><?php echo esc_html( $footer_tagline ); ?></span>
    </div>

    <!-- Stylized Signature -->
    <div class="pt-2 flex flex-col items-center space-y-1">
        <?php if ( ! empty( $signature_img ) ) : ?>
            <img src="<?php echo esc_url( $signature_img ); ?>" alt="<?php echo esc_attr( $signature_name ); ?>" class="max-h-16 object-contain select-none" />
        <?php else : ?>
            <p class="font-handwriting text-4xl sm:text-5xl lg:text-6xl text-neutral-900 -rotate-2 select-none">
                <?php echo esc_html( $profile_name ); ?>
            </p>
        <?php endif; ?>
        <p class="text-xs text-neutral-500 font-mono tracking-tight">
            <?php echo esc_html( $signature_name ); ?>
        </p>
    </div>

    <!-- Copyright Notice -->
    <div class="text-[11px] font-mono text-neutral-400 pt-3">
        <p><?php echo esc_html( $copyright ); ?></p>
    </div>
</footer>

<!-- Interactive Printable Curriculum Vitae Modal -->
<div id="studio-cv-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-3 sm:p-6 bg-neutral-900/60 backdrop-blur-xs">
    <div class="bg-white rounded-3xl border border-neutral-200 shadow-xl max-w-2xl w-full max-h-[90vh] flex flex-col overflow-hidden text-neutral-900">
        <!-- Top Bar -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-neutral-100 bg-neutral-50/80">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-orange-600"></span>
                <span class="font-mono text-xs font-semibold uppercase tracking-wider text-neutral-500">
                    Curriculum Vitae
                </span>
            </div>
            <div class="flex items-center gap-2">
                <a
                    href="<?php echo esc_url( get_template_directory_uri() . '/assets/docs/kausar-cv.pdf' ); ?>"
                    download="Kausar-CV.pdf"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white text-xs font-medium transition-colors shadow-2xs cursor-pointer"
                    title="Download CV PDF directly"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span>Download PDF</span>
                </a>
                <button
                    type="button"
                    id="btn-print-cv"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white border border-neutral-200 hover:bg-neutral-100 text-neutral-700 text-xs font-medium transition-colors shadow-xs cursor-pointer"
                    title="Print or Save as PDF"
                >
                    <svg class="w-3.5 h-3.5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>Print</span>
                </button>
                <button
                    type="button"
                    id="btn-close-cv-modal"
                    class="w-8 h-8 rounded-full border border-neutral-200 hover:bg-neutral-100 flex items-center justify-center text-neutral-500 hover:text-neutral-900 transition-colors cursor-pointer"
                    aria-label="Close CV Modal"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6 sm:p-8 overflow-y-auto space-y-6 text-xs sm:text-sm text-neutral-700 font-sans leading-relaxed">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-neutral-200">
                <div class="space-y-1">
                    <h3 class="font-display font-bold text-2xl sm:text-3xl text-neutral-900 tracking-tight">
                        <?php echo esc_html( $profile_name ); ?>
                    </h3>
                    <p class="font-display font-medium text-neutral-500 text-sm">
                        Design Engineer · Websites & Digital Products
                    </p>
                </div>
                <div class="space-y-1 font-mono text-[11px] text-neutral-500 sm:text-right">
                    <p>● Remote Worldwide · Available for Projects</p>
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
                    // Summary
                </h4>
                <p class="text-neutral-600 leading-relaxed">
                    Design engineer specializing in crafting fast, elegant, and high-conversion digital products. I combine refined visual aesthetics with clean engineering to create websites that are thoughtful, enduring, and built to work.
                </p>
            </div>

            <div class="space-y-4">
                <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
                    // Experience & Selected Roles
                </h4>
                <div class="space-y-4 border-l-2 border-neutral-200 pl-4">
                    <div class="space-y-1">
                        <div class="flex items-baseline justify-between gap-2">
                            <h5 class="font-display font-bold text-neutral-900 text-sm sm:text-base">
                                Lead Product Designer & Developer
                            </h5>
                            <span class="font-mono text-[11px] text-neutral-400">2022 — Present</span>
                        </div>
                        <p class="text-neutral-500 text-xs">Independent Studio · Remote</p>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-1">
                            Partnering directly with founders and teams to build brand identities, bespoke web applications, and tailor-made CMS platforms with 100% responsiveness.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-baseline justify-between gap-2">
                            <h5 class="font-display font-bold text-neutral-900 text-sm sm:text-base">
                                Senior UI/UX & Frontend Engineer
                            </h5>
                            <span class="font-mono text-[11px] text-neutral-400">2020 — 2022</span>
                        </div>
                        <p class="text-neutral-500 text-xs">Digital Agency · Global</p>
                        <p class="text-neutral-600 text-xs leading-relaxed mt-1">
                            Led design-to-code implementations for high-traffic SaaS landing pages and design systems. Engineered scalable component architectures and optimized Core Web Vitals to 98+.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <h4 class="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
                    // Core Competencies
                </h4>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                    <div class="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                        <p class="font-display font-bold text-xs text-neutral-900">UI/UX Architecture</p>
                        <p class="font-mono text-[10px] text-neutral-500">Figma, Design Systems</p>
                    </div>
                    <div class="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                        <p class="font-display font-bold text-xs text-neutral-900">Frontend Engineering</p>
                        <p class="font-mono text-[10px] text-neutral-500">React, TypeScript, Tailwind</p>
                    </div>
                    <div class="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                        <p class="font-display font-bold text-xs text-neutral-900">WordPress Ecosystem</p>
                        <p class="font-mono text-[10px] text-neutral-500">Custom Themes, CPTs, REST</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-4 border-t border-neutral-100 bg-neutral-50/80 flex items-center justify-between gap-3">
            <a
                href="#book"
                id="btn-cv-discuss"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white text-xs sm:text-sm font-medium transition-colors shadow-xs"
            >
                <span>Discuss a Project</span>
            </a>
            <button
                type="button"
                id="btn-close-cv-modal-bottom"
                class="px-4 py-2 rounded-full border border-neutral-200 hover:bg-neutral-100 text-neutral-700 text-xs font-medium transition-colors cursor-pointer"
            >
                Close
            </button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
