<?php
/**
 * How It Works & Monthly Retainer Section Template Part
 *
 * Reproduces React HowItWorksSection.tsx with 100% pixel-accuracy.
 *
 * @package Studio_Build
 */

$accent_color   = get_theme_mod( 'studio_accent_color', '#E8590C' );

$profile_name   = get_theme_mod( 'studio_profile_name', 'Kausar' );
$profile_loc    = get_theme_mod( 'studio_profile_location', 'India' );
$profile_exp    = get_theme_mod( 'studio_profile_experience', 'Design + Dev' );
$profile_focus  = get_theme_mod( 'studio_profile_focus', 'Websites' );
$profile_stat   = get_theme_mod( 'studio_profile_status_val', 'Active' );
$profile_bio    = get_theme_mod( 'studio_profile_bio', 'I care about clear ideas, thoughtful details, and building things that are genuinely useful.' );
$profile_img    = studio_build_get_image_src( 'studio_profile_avatar', 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=400&q=80' );

$retainer_title = get_theme_mod( 'studio_retainer_title', 'Monthly Website Support' );
$retainer_desc  = get_theme_mod( 'studio_retainer_description', 'Ongoing design and development support for websites that need regular improvements, updates, or new work.' );
$retainer_badge = get_theme_mod( 'studio_retainer_badge', 'Pause or cancel anytime' );
$retainer_price = get_theme_mod( 'studio_retainer_price', '$3,800' );
$retainer_per   = get_theme_mod( 'studio_retainer_period', '/month' );

$process_steps = array(
    array(
        'number'      => '01',
        'title'       => 'Discovery & Direction',
        'description' => 'Understanding the goal, content, and the audience before designing.',
    ),
    array(
        'number'      => '02',
        'title'       => 'Design & Structure',
        'description' => 'Creating clear layouts, visual systems, and interactive prototypes.',
    ),
    array(
        'number'      => '03',
        'title'       => 'Development & Polish',
        'description' => 'Writing clean code, responsive testing, and finalizing the details.',
    ),
    array(
        'number'      => '04',
        'title'       => 'Launch & Support',
        'description' => 'Deploying the website and ensuring everything runs as expected.',
    ),
);

$retainer_features = array(
    'One active request at a time',
    'Design + development',
    'Ongoing improvements',
    'Clear communication',
    'Flexible engagement',
);
?>
<section id="pricing" class="space-y-8 scroll-mt-24 relative">
    <span id="process" class="sr-only"></span>
    <!-- Header -->
    <div class="space-y-1">
        <span
            class="font-mono text-xs font-semibold uppercase tracking-wider block"
            style="color: <?php echo esc_attr( $accent_color ); ?>;"
        >
            // How it works
        </span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
            A considered approach to design & development
        </h2>
    </div>

    <!-- Process 4 Steps -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ( $process_steps as $step ) : ?>
            <div class="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2 flex flex-col justify-between">
                <div class="space-y-1.5">
                    <span class="font-mono text-xs text-neutral-400 font-semibold block">
                        <?php echo esc_html( $step['number'] ); ?>
                    </span>
                    <h3 class="font-display font-bold text-neutral-900 text-base">
                        <?php echo esc_html( $step['title'] ); ?>
                    </h3>
                </div>
                <p class="text-xs text-neutral-600 leading-relaxed">
                    <?php echo esc_html( $step['description'] ); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        <!-- Left: Profile Verification Card -->
        <div
            id="profile-verification-card"
            class="lg:col-span-5 bg-white rounded-3xl border border-neutral-200/80 p-5 sm:p-7 shadow-soft flex flex-col justify-between space-y-6 overflow-hidden"
        >
            <!-- Tilted Profile ID Card -->
            <div class="bg-neutral-50/80 rounded-2xl p-4 border border-neutral-200/80 shadow-sm transform -rotate-1 hover:rotate-0 transition-transform duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                    <div class="flex items-center gap-3">
                        <div class="relative shrink-0">
                            <img
                                src="<?php echo esc_url( $profile_img ); ?>"
                                alt="<?php echo esc_attr( $profile_name ); ?>"
                                class="w-12 h-12 rounded-full object-cover border border-white shadow-xs"
                            />
                            <!-- Understated dot badge -->
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full flex items-center justify-center text-[9px] text-white shadow-2xs font-bold">
                                ✓
                            </div>
                        </div>
                        <div class="min-w-0">
                            <h4 class="font-display font-bold text-neutral-900 text-sm truncate">
                                <?php echo esc_html( $profile_name ); ?>
                            </h4>
                            <p class="text-neutral-500 text-[11px] font-mono flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                <span class="truncate"><?php echo esc_html( $profile_loc ); ?></span>
                            </p>
                        </div>
                    </div>

                    <!-- Neutral Stats on right -->
                    <div class="flex items-center justify-between sm:justify-end gap-3.5 pt-2 sm:pt-0 border-t sm:border-t-0 border-neutral-200/60 shrink-0">
                        <div class="text-left sm:text-right">
                            <p class="text-xs font-bold font-display text-neutral-900">
                                <?php echo esc_html( $profile_exp ); ?>
                            </p>
                            <p class="text-[9px] text-neutral-400 uppercase font-mono">Experience</p>
                        </div>
                        <div class="text-center sm:text-right">
                            <p class="text-xs font-bold font-display text-neutral-900">
                                <?php echo esc_html( $profile_focus ); ?>
                            </p>
                            <p class="text-[9px] text-neutral-400 uppercase font-mono">Focus</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-bold font-display text-neutral-900 text-emerald-600">
                                <?php echo esc_html( $profile_stat ); ?>
                            </p>
                            <p class="text-[9px] text-neutral-400 uppercase font-mono">Status</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Pitch -->
            <div class="space-y-3 pt-2">
                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200/70 text-emerald-700 text-[11px] font-mono">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Available for selected projects</span>
                </div>
                <h3 class="font-display font-bold text-xl sm:text-2xl text-neutral-900 leading-tight">
                    Direct Collaboration
                </h3>
                <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed">
                    <?php echo esc_html( $profile_bio ); ?>
                </p>
            </div>
        </div>

        <!-- Right: Monthly Retainer Card -->
        <div
            id="monthly-retainer-card"
            class="lg:col-span-7 bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-8 shadow-soft flex flex-col justify-between space-y-6"
        >
            <div class="space-y-4">
                <div class="space-y-1">
                    <h3 class="font-display font-bold text-xl sm:text-2xl text-neutral-900">
                        <?php echo esc_html( $retainer_title ); ?>
                    </h3>
                    <p class="text-neutral-600 text-xs sm:text-sm leading-relaxed max-w-lg">
                        <?php echo esc_html( $retainer_desc ); ?>
                    </p>
                </div>

                <!-- Pause or cancel badge -->
                <div class="inline-block">
                    <span class="px-3 py-1 rounded-full bg-neutral-100 text-neutral-600 text-xs font-mono">
                        <?php echo esc_html( $retainer_badge ); ?>
                    </span>
                </div>

                <!-- Price display -->
                <div class="pt-2 flex items-baseline gap-1.5">
                    <span class="text-3xl sm:text-4xl font-display font-extrabold text-neutral-900 tracking-tight">
                        <?php echo esc_html( $retainer_price ); ?>
                    </span>
                    <span class="text-neutral-500 text-sm font-medium">
                        <?php echo $retainer_per ? '· ' . esc_html( $retainer_per ) : ''; ?>
                    </span>
                </div>

                <!-- Feature bullets -->
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-3 text-xs sm:text-sm text-neutral-600">
                    <?php foreach ( $retainer_features as $feat ) : ?>
                        <li class="flex items-center gap-2">
                            <span
                                class="w-1.5 h-1.5 rounded-full shrink-0"
                                style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                            ></span>
                            <span><?php echo esc_html( $feat ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="pt-4 border-t border-neutral-100">
                <a
                    id="btn-retainer-connect"
                    href="#book"
                    class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white font-medium text-xs sm:text-sm transition-all shadow-sm group"
                >
                    <span
                        class="w-2 h-2 rounded-full"
                        style="background-color: <?php echo esc_attr( $accent_color ); ?>;"
                    ></span>
                    <span>Discuss a project</span>
                </a>
            </div>
        </div>
    </div>
</section>
