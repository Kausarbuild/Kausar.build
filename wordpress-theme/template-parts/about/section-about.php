<?php
/**
 * About Me Bento Grid Template Part
 *
 * Reproduces React AboutSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$accent_color      = get_theme_mod( 'studio_accent_color', '#E8590C' );
$about_title       = get_theme_mod( 'studio_about_title', '// About me' );
$about_subtitle    = get_theme_mod( 'studio_about_subtitle', 'The person behind the pixels' );
$about_portrait    = studio_build_get_image_src( 'studio_about_portrait', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80' );

$music_cover       = studio_build_get_image_src( 'studio_music_cover', 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80' );
$music_title       = get_theme_mod( 'studio_music_title', 'Veeran Sheher' );
$music_artist      = get_theme_mod( 'studio_music_artist', 'Kausar XD' );
$music_time_cur    = get_theme_mod( 'studio_music_time_current', '1:24' );
$music_time_tot    = get_theme_mod( 'studio_music_time_total', '3:45' );
$spotify_url       = get_theme_mod( 'studio_spotify_url', 'https://open.spotify.com/track/2U699aQLnplBGFGxWBIiDD' );

$personal_img      = studio_build_get_image_src( 'studio_personal_img', 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80' );
$personal_title    = get_theme_mod( 'studio_personal_title', 'Workstation Rig' );
$personal_sub      = get_theme_mod( 'studio_personal_sub', 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.' );
$personal_tag      = get_theme_mod( 'studio_personal_tag', 'Studio Rig' );
$personal_badge    = get_theme_mod( 'studio_personal_badge', 'Studio Setup' );
$personal_note     = get_theme_mod( 'studio_personal_note', 'M3 Max · Studio Display · Custom Oak' );
$personal_time     = get_theme_mod( 'studio_personal_time', 'Setup v4' );

$manifesto_title   = get_theme_mod( 'studio_manifesto_title', '// Guiding Philosophy' );
$manifesto_quote   = get_theme_mod( 'studio_manifesto_quote', 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.' );
$manifesto_author  = get_theme_mod( 'studio_manifesto_author', '— Kausar · Design Engineer' );
$manifesto_sub     = get_theme_mod( 'studio_manifesto_sub', 'Zero bloat · 100% independent craft' );
?>
<section id="about" class="space-y-8">
    <!-- Header -->
    <div class="space-y-1">
        <span
            class="font-mono text-xs font-semibold uppercase tracking-wider block"
            style="color: <?php echo esc_attr( $accent_color ); ?>;"
        >
            <?php echo esc_html( $about_title ); ?>
        </span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
            <?php echo esc_html( $about_subtitle ); ?>
        </h2>
    </div>

    <!-- Bento Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">
        <!-- Bento 1: Tall Portrait (Left 5 cols on lg) -->
        <div
            id="bento-portrait-card"
            class="lg:col-span-5 rounded-3xl overflow-hidden bg-neutral-100 border border-neutral-200/80 shadow-soft group relative aspect-[4/5] sm:aspect-[16/10] lg:aspect-auto min-h-[340px] lg:min-h-[420px]"
        >
            <img
                src="<?php echo esc_url( $about_portrait ); ?>"
                alt="Kausar"
                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
            />
        </div>

        <!-- Bento 2: Right Column (7 cols on lg) -->
        <div class="lg:col-span-7 flex flex-col gap-5 justify-between">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 flex-1">
                <!-- 2A: Music Player Widget (Veeran Sheher - 1:1 Layout) -->
                <a
                    id="bento-music-card"
                    href="<?php echo esc_url( $spotify_url ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-soft flex flex-col justify-between group hover:border-neutral-300 transition-all cursor-pointer block text-inherit no-underline"
                    title="<?php esc_attr_e( 'Listen on Spotify', 'studio-build' ); ?>"
                >
                    <!-- Photo Frame 1:1 Square -->
                    <div class="w-full aspect-square rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group/img">
                        <img
                            src="<?php echo esc_url( $music_cover ); ?>"
                            alt="<?php echo esc_attr( $music_title ); ?>"
                            class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                        />
                        <!-- Top overlay badge -->
                        <div class="absolute top-2.5 left-2.5 bg-black/65 backdrop-blur-xs text-white px-2.5 py-1 rounded-full text-[10px] font-mono flex items-center gap-1.5 shadow-sm">
                            <svg class="w-3 h-3 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a9 9 0 0 1 18 0v12a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>
                            </svg>
                            <span><?php esc_html_e( 'Now Playing', 'studio-build' ); ?></span>
                        </div>
                        <!-- Bottom-right micro-pill -->
                        <div class="absolute bottom-2.5 right-2.5 bg-white/90 group-hover:bg-white text-neutral-900 px-2.5 py-0.5 rounded-full text-[10px] font-mono border border-white/60 shadow-xs font-semibold flex items-center gap-1 transition-colors">
                            <span>Spotify</span>
                            <svg class="w-2.5 h-2.5 text-neutral-500 group-hover:text-neutral-900 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6m4-3h6v6m-11 5L21 3"/></svg>
                        </div>
                    </div>

                    <!-- Controls & Track Info -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between gap-2">
                            <div class="min-w-0 flex-1">
                                <h3 class="text-sm font-bold text-neutral-900 font-display truncate">
                                    <?php echo esc_html( $music_title ); ?>
                                </h3>
                                <p class="text-[11px] text-neutral-500 font-mono tracking-tight truncate">
                                    <?php echo esc_html( $music_artist ); ?>
                                </p>
                            </div>
                            <!-- Equalizer Wave / Audio indicator -->
                            <div class="flex items-end gap-0.5 h-3 shrink-0">
                                <span
                                    class="w-0.5 h-2 animate-pulse rounded-full"
                                    style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                                ></span>
                                <span
                                    class="w-0.5 h-3 animate-pulse delay-75 rounded-full"
                                    style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                                ></span>
                                <span
                                    class="w-0.5 h-1.5 animate-pulse delay-150 rounded-full"
                                    style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                                ></span>
                                <span
                                    class="w-0.5 h-2.5 animate-pulse delay-100 rounded-full"
                                    style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                                ></span>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="space-y-1">
                            <div class="w-full bg-neutral-100 rounded-full h-1 overflow-hidden">
                                <div
                                    class="h-full w-2/5 rounded-full transition-all duration-300"
                                    style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                                ></div>
                            </div>
                            <div class="flex justify-between text-[10px] font-mono text-neutral-400">
                                <span><?php echo esc_html( $music_time_cur ); ?></span>
                                <span><?php echo esc_html( $music_time_tot ); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer Bar - Matching 1:1 with Workstation -->
                    <div class="w-full flex items-center justify-between gap-2 pt-3 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                        <span class="text-neutral-600 truncate flex items-center gap-1.5 font-medium">
                            <svg class="w-3 h-3 text-[#E8590C] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>
                            </svg>
                            <span class="truncate">Lo-Fi / Focus Beats · On Repeat</span>
                        </span>
                        <span class="text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                            Audio
                        </span>
                    </div>
                </a>

                <!-- 2B: Studio Workstation Rig & Creative Environment (1:1 Layout) -->
                <div
                    id="bento-workspace-card"
                    class="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-soft flex flex-col justify-between group hover:border-neutral-300 transition-colors"
                >
                    <!-- Photo Frame 1:1 Square -->
                    <div class="w-full aspect-square rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group/img">
                        <img
                            src="<?php echo esc_url( $personal_img ); ?>"
                            alt="<?php echo esc_attr( $personal_title ); ?>"
                            class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                        />
                        <!-- Top overlay badge -->
                        <div class="absolute top-2.5 left-2.5 bg-black/65 backdrop-blur-xs text-white px-2.5 py-1 rounded-full text-[10px] font-mono flex items-center gap-1.5 shadow-sm">
                            <svg class="w-3 h-3 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/>
                            </svg>
                            <span><?php echo esc_html( $personal_tag ); ?></span>
                        </div>
                        <!-- Bottom-right micro-pill -->
                        <div class="absolute bottom-2.5 right-2.5 bg-white/90 backdrop-blur-xs text-neutral-900 px-2.5 py-0.5 rounded-full text-[10px] font-mono border border-white/60 shadow-xs font-semibold">
                            <?php echo esc_html( $personal_badge ); ?>
                        </div>
                    </div>

                    <!-- Title & Personal Bio Note -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-sm font-bold text-neutral-900 font-display truncate">
                                <?php echo esc_html( $personal_title ); ?>
                            </h3>
                            <span class="text-[10px] font-mono text-neutral-400 shrink-0">
                                <?php echo esc_html( $personal_time ); ?>
                            </span>
                        </div>
                        <p class="text-[11px] text-neutral-500 leading-relaxed line-clamp-2">
                            <?php echo esc_html( $personal_sub ); ?>
                        </p>
                    </div>

                    <!-- Card Footer Bar -->
                    <div class="w-full flex items-center justify-between gap-2 pt-3 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                        <span class="text-neutral-600 truncate flex items-center gap-1.5 font-medium">
                            <svg class="w-3 h-3 text-[#E8590C] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/>
                            </svg>
                            <span class="truncate"><?php echo esc_html( $personal_note ); ?></span>
                        </span>
                        <span class="text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                            Hardware
                        </span>
                    </div>
                </div>
            </div>

            <!-- 2C: Guiding Philosophy & Craft Manifesto Card -->
            <div
                id="bento-guiding-philosophy-card"
                class="bg-white border border-neutral-200/80 rounded-3xl p-5 sm:p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group shadow-soft hover:border-neutral-300 transition-all duration-300"
            >
                <!-- Top Pill Tag -->
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neutral-100/90 border border-neutral-200/80 text-neutral-700 text-[11px] font-mono tracking-tight mb-3 select-none">
                    <svg class="w-3 h-3 text-[#E8590C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                    </svg>
                    <span><?php echo esc_html( $manifesto_title ); ?></span>
                </div>

                <!-- Central Focal Statement / Manifesto -->
                <blockquote class="max-w-lg mx-auto px-2">
                    <p class="font-display font-semibold text-base sm:text-lg lg:text-xl text-neutral-900 tracking-tight leading-snug">
                        "<?php echo esc_html( $manifesto_quote ); ?>"
                    </p>
                </blockquote>

                <!-- Author Attribution & Footer -->
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
