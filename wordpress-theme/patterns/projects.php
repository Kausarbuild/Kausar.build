<?php
/**
 * Title: Projects Showcase
 * Slug: kausar-build/projects
 * Categories: featured, portfolio, kausar-build
 * Description: Selected works grid with high-resolution imagery, tech tags, live preview links, and case studies.
 * Keywords: projects, portfolio, work, case study, showcase
 */
?>
<!-- wp:group {"metadata":{"name":"Projects Section"},"align":"wide","className":"projects-section py-12 space-y-8","layout":{"type":"constrained"}} -->
<div id="work" class="wp-block-group alignwide projects-section py-12 space-y-8 scroll-mt-24">
  
  <!-- Section Header -->
  <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"bottom"},"className":"gap-4"} -->
  <div class="wp-block-group flex items-end justify-between flex-wrap gap-4">
    <!-- wp:group {"className":"space-y-2 max-w-xl"} -->
    <div class="wp-block-group space-y-2 max-w-xl">
      <!-- wp:paragraph {"className":"text-xs font-mono uppercase tracking-widest text-orange-600 font-semibold"} -->
      <p class="text-xs font-mono uppercase tracking-widest text-orange-600 font-semibold">SELECTED WORKS</p>
      <!-- /wp:paragraph -->
      
      <!-- wp:heading {"level":2,"className":"text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 leading-tight m-0"} -->
      <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 leading-tight m-0">Recent projects built with precision.</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"className":"text-neutral-600 text-base"} -->
      <p class="text-neutral-600 text-base">A curation of production web apps, e-commerce flagship platforms, and design systems.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph {"className":"text-xs text-neutral-400 font-mono"} -->
    <p class="text-xs text-neutral-400 font-mono">2024 — 2026 ARCHIVE</p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- Projects Grid -->
  <!-- wp:group {"className":"grid grid-cols-1 md:grid-cols-2 gap-8"} -->
  <div class="wp-block-group grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <!-- PROJECT 1: Finova -->
    <!-- wp:group {"className":"bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group"} -->
    <div class="wp-block-group bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group">
      <!-- Image & Meta -->
      <!-- wp:group {"className":"space-y-4"} -->
      <div class="wp-block-group space-y-4">
        <!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"} -->
        <figure class="wp-block-image size-large rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"><img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Finova — Neobank &amp; Wealth Management Platform" style="aspect-ratio:16/10;object-fit:cover"/></figure>
        <!-- /wp:image -->

        <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"},"className":"text-xs text-neutral-400 font-mono"} -->
        <div class="wp-block-group flex items-center justify-between text-xs text-neutral-400 font-mono">
          <!-- wp:paragraph -->
          <p>FINTECH · WEB APP</p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p>2025</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"level":3,"className":"text-xl font-bold text-neutral-900 tracking-tight m-0"} -->
        <h3 class="text-xl font-bold text-neutral-900 tracking-tight m-0">Finova — Neobank &amp; Wealth Management</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"text-neutral-600 text-sm leading-relaxed"} -->
        <p class="text-neutral-600 text-sm leading-relaxed">Comprehensive personal banking dashboard featuring live portfolio analytics, automated micro-investments, and cross-border currency exchanges.</p>
        <!-- /wp:paragraph -->

        <!-- Tags -->
        <!-- wp:paragraph {"className":"flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600"} -->
        <p class="flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600">
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Next.js 14</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">TypeScript</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Tailwind</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Recharts</span>
        </p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- Action Buttons -->
      <!-- wp:buttons {"className":"pt-4 border-t border-neutral-100 flex items-center justify-between"} -->
      <div class="wp-block-buttons pt-4 border-t border-neutral-100 flex items-center justify-between">
        <!-- wp:button {"backgroundColor":"text-main","textColor":"canvas","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"18px","right":"18px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-800 shadow-xs"} -->
        <div class="wp-block-button hover:bg-neutral-800 shadow-xs"><a class="wp-block-button__link has-canvas-color has-text-main-background-color has-text-color has-background wp-element-button" href="https://example.com/finova" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;padding-top:8px;padding-right:18px;padding-bottom:8px;padding-left:18px;font-size:13px;font-weight:500">Live Preview ↗</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"card","textColor":"text-muted","style":{"border":{"radius":"9999px","width":"1px","style":"solid","color":"#E5E7EB"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"16px","right":"16px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-50"} -->
        <div class="wp-block-button hover:bg-neutral-50"><a class="wp-block-button__link has-text-muted-color has-card-background-color has-text-color has-background wp-element-button" href="https://github.com" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;border-width:1px;border-style:solid;border-color:#E5E7EB;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px;font-size:13px;font-weight:500">Source Code</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- PROJECT 2: Lumina -->
    <!-- wp:group {"className":"bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group"} -->
    <div class="wp-block-group bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group">
      <!-- Image & Meta -->
      <!-- wp:group {"className":"space-y-4"} -->
      <div class="wp-block-group space-y-4">
        <!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"} -->
        <figure class="wp-block-image size-large rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"><img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Lumina — AI Analytics Platform" style="aspect-ratio:16/10;object-fit:cover"/></figure>
        <!-- /wp:image -->

        <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"},"className":"text-xs text-neutral-400 font-mono"} -->
        <div class="wp-block-group flex items-center justify-between text-xs text-neutral-400 font-mono">
          <!-- wp:paragraph -->
          <p>AI SAAS · ENTERPRISE</p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p>2025</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"level":3,"className":"text-xl font-bold text-neutral-900 tracking-tight m-0"} -->
        <h3 class="text-xl font-bold text-neutral-900 tracking-tight m-0">Lumina — AI Analytics &amp; Workflows</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"text-neutral-600 text-sm leading-relaxed"} -->
        <p class="text-neutral-600 text-sm leading-relaxed">Enterprise automation engine enabling non-technical teams to query real-time data lakes through natural language models and automated visualizations.</p>
        <!-- /wp:paragraph -->

        <!-- Tags -->
        <!-- wp:paragraph {"className":"flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600"} -->
        <p class="flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600">
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">React</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Python</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Tailwind</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">WebSockets</span>
        </p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- Action Buttons -->
      <!-- wp:buttons {"className":"pt-4 border-t border-neutral-100 flex items-center justify-between"} -->
      <div class="wp-block-buttons pt-4 border-t border-neutral-100 flex items-center justify-between">
        <!-- wp:button {"backgroundColor":"text-main","textColor":"canvas","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"18px","right":"18px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-800 shadow-xs"} -->
        <div class="wp-block-button hover:bg-neutral-800 shadow-xs"><a class="wp-block-button__link has-canvas-color has-text-main-background-color has-text-color has-background wp-element-button" href="https://example.com/lumina" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;padding-top:8px;padding-right:18px;padding-bottom:8px;padding-left:18px;font-size:13px;font-weight:500">Live Preview ↗</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"card","textColor":"text-muted","style":{"border":{"radius":"9999px","width":"1px","style":"solid","color":"#E5E7EB"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"16px","right":"16px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-50"} -->
        <div class="wp-block-button hover:bg-neutral-50"><a class="wp-block-button__link has-text-muted-color has-card-background-color has-text-color has-background wp-element-button" href="https://github.com" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;border-width:1px;border-style:solid;border-color:#E5E7EB;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px;font-size:13px;font-weight:500">Source Code</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- PROJECT 3: Aura -->
    <!-- wp:group {"className":"bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group"} -->
    <div class="wp-block-group bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group">
      <!-- Image & Meta -->
      <!-- wp:group {"className":"space-y-4"} -->
      <div class="wp-block-group space-y-4">
        <!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"} -->
        <figure class="wp-block-image size-large rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"><img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Aura — Minimalist E-Commerce Storefront" style="aspect-ratio:16/10;object-fit:cover"/></figure>
        <!-- /wp:image -->

        <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"},"className":"text-xs text-neutral-400 font-mono"} -->
        <div class="wp-block-group flex items-center justify-between text-xs text-neutral-400 font-mono">
          <!-- wp:paragraph -->
          <p>E-COMMERCE · HEADLESS</p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p>2024</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"level":3,"className":"text-xl font-bold text-neutral-900 tracking-tight m-0"} -->
        <h3 class="text-xl font-bold text-neutral-900 tracking-tight m-0">Aura — Minimalist E-Commerce</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"text-neutral-600 text-sm leading-relaxed"} -->
        <p class="text-neutral-600 text-sm leading-relaxed">Headless commerce experience designed for a Scandinavian furniture atelier, yielding a 42% boost in checkout completion rates with sub-second page transitions.</p>
        <!-- /wp:paragraph -->

        <!-- Tags -->
        <!-- wp:paragraph {"className":"flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600"} -->
        <p class="flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600">
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Next.js</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Shopify API</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Tailwind</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Zustand</span>
        </p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- Action Buttons -->
      <!-- wp:buttons {"className":"pt-4 border-t border-neutral-100 flex items-center justify-between"} -->
      <div class="wp-block-buttons pt-4 border-t border-neutral-100 flex items-center justify-between">
        <!-- wp:button {"backgroundColor":"text-main","textColor":"canvas","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"18px","right":"18px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-800 shadow-xs"} -->
        <div class="wp-block-button hover:bg-neutral-800 shadow-xs"><a class="wp-block-button__link has-canvas-color has-text-main-background-color has-text-color has-background wp-element-button" href="https://example.com/aura" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;padding-top:8px;padding-right:18px;padding-bottom:8px;padding-left:18px;font-size:13px;font-weight:500">Live Preview ↗</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"card","textColor":"text-muted","style":{"border":{"radius":"9999px","width":"1px","style":"solid","color":"#E5E7EB"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"16px","right":"16px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-50"} -->
        <div class="wp-block-button hover:bg-neutral-50"><a class="wp-block-button__link has-text-muted-color has-card-background-color has-text-color has-background wp-element-button" href="https://github.com" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;border-width:1px;border-style:solid;border-color:#E5E7EB;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px;font-size:13px;font-weight:500">Source Code</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- PROJECT 4: Kroma -->
    <!-- wp:group {"className":"bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group"} -->
    <div class="wp-block-group bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs hover:shadow-xl transition-all duration-300 space-y-5 flex flex-col justify-between group">
      <!-- Image & Meta -->
      <!-- wp:group {"className":"space-y-4"} -->
      <div class="wp-block-group space-y-4">
        <!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"} -->
        <figure class="wp-block-image size-large rounded-2xl overflow-hidden shadow-xs border border-neutral-100 group-hover:scale-[1.01] transition-transform duration-300"><img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Kroma — Design Systems &amp; Tokens" style="aspect-ratio:16/10;object-fit:cover"/></figure>
        <!-- /wp:image -->

        <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"},"className":"text-xs text-neutral-400 font-mono"} -->
        <div class="wp-block-group flex items-center justify-between text-xs text-neutral-400 font-mono">
          <!-- wp:paragraph -->
          <p>DEV TOOLS · DESIGN SYSTEM</p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p>2024</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"level":3,"className":"text-xl font-bold text-neutral-900 tracking-tight m-0"} -->
        <h3 class="text-xl font-bold text-neutral-900 tracking-tight m-0">Kroma — Collaborative Design Tokens</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"text-neutral-600 text-sm leading-relaxed"} -->
        <p class="text-neutral-600 text-sm leading-relaxed">Multi-brand design system pipeline synchronizing color palettes, typography scales, and UI component variations straight from Figma to React and iOS.</p>
        <!-- /wp:paragraph -->

        <!-- Tags -->
        <!-- wp:paragraph {"className":"flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600"} -->
        <p class="flex flex-wrap gap-1.5 text-[11px] font-mono text-neutral-600">
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">TypeScript</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Web Components</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Vite</span>
          <span class="px-2.5 py-0.5 rounded-full bg-neutral-100 border border-neutral-200">Canvas</span>
        </p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- Action Buttons -->
      <!-- wp:buttons {"className":"pt-4 border-t border-neutral-100 flex items-center justify-between"} -->
      <div class="wp-block-buttons pt-4 border-t border-neutral-100 flex items-center justify-between">
        <!-- wp:button {"backgroundColor":"text-main","textColor":"canvas","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"18px","right":"18px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-800 shadow-xs"} -->
        <div class="wp-block-button hover:bg-neutral-800 shadow-xs"><a class="wp-block-button__link has-canvas-color has-text-main-background-color has-text-color has-background wp-element-button" href="https://example.com/kroma" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;padding-top:8px;padding-right:18px;padding-bottom:8px;padding-left:18px;font-size:13px;font-weight:500">Live Preview ↗</a></div>
        <!-- /wp:button -->

        <!-- wp:button {"backgroundColor":"card","textColor":"text-muted","style":{"border":{"radius":"9999px","width":"1px","style":"solid","color":"#E5E7EB"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"16px","right":"16px"}},"typography":{"fontSize":"13px","fontWeight":"500"}},"className":"hover:bg-neutral-50"} -->
        <div class="wp-block-button hover:bg-neutral-50"><a class="wp-block-button__link has-text-muted-color has-card-background-color has-text-color has-background wp-element-button" href="https://github.com" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;border-width:1px;border-style:solid;border-color:#E5E7EB;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px;font-size:13px;font-weight:500">Source Code</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

  </div>
  <!-- /wp:group -->

</div>
<!-- /wp:group -->
