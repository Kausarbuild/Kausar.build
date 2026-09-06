<?php
/**
 * Footer template for Studio Build Portfolio
 *
 * @package Studio_Build
 */
?>
<footer class="pt-16 pb-12 border-t border-neutral-200/80 text-center space-y-8 max-w-4xl mx-auto px-6" id="site-footer">
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

    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 text-xs sm:text-sm text-neutral-600">
        <span><?php echo esc_html( get_theme_mod( 'studio_footer_greeting', 'Thanks for being here.' ) ); ?></span>
        <div class="w-9 h-9 rounded-full bg-[#8A1A1A] border-2 border-[#5C0A0A] flex items-center justify-center shadow-inner text-amber-100 text-sm select-none">
            ✦
        </div>
        <span><?php echo esc_html( get_theme_mod( 'studio_footer_tagline', 'Let’s build something thoughtful.' ) ); ?></span>
    </div>

    <div class="pt-2">
        <p class="font-handwriting text-4xl sm:text-5xl text-neutral-900 -rotate-2 select-none">
            <?php echo esc_html( get_theme_mod( 'studio_signature_name', 'Kausar.Build' ) ); ?>
        </p>
    </div>

    <div class="text-[11px] font-mono text-neutral-400 pt-2">
        <p><?php echo esc_html( get_theme_mod( 'studio_copyright_text', '© 2026 Kausar.Build. All Rights Reserved.' ) ); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
