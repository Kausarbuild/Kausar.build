<?php
/**
 * Title: Booking & Contact Section
 * Slug: kausar-build/booking
 * Categories: featured, call-to-action, kausar-build
 * Description: Interactive consultation scheduler, project inquiry form, timezone indicator, and direct contact channels.
 * Keywords: booking, contact, hire, schedule, form
 */
?>
<!-- wp:group {"metadata":{"name":"Booking Section"},"align":"wide","className":"booking-section py-12 space-y-8","layout":{"type":"constrained"}} -->
<div id="book" class="wp-block-group alignwide booking-section py-12 space-y-8 scroll-mt-24">
  
  <!-- Section Header -->
  <!-- wp:group {"className":"space-y-2"} -->
  <div class="wp-block-group space-y-2">
    <!-- wp:paragraph {"className":"text-xs font-mono uppercase tracking-widest text-orange-600 font-semibold"} -->
    <p class="text-xs font-mono uppercase tracking-widest text-orange-600 font-semibold">START A CONVERSATION</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":2,"className":"text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 leading-tight m-0"} -->
    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 leading-tight m-0">Book a discovery call or send an inquiry.</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":"text-neutral-600 text-base max-w-2xl"} -->
    <p class="text-neutral-600 text-base max-w-2xl">Have a new product, redesign, or engineering challenge? Choose a time below or drop the project details.</p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- Booking Container Grid -->
  <!-- wp:columns {"className":"gap-8 items-start"} -->
  <div class="wp-block-columns gap-8 items-start">
    
    <!-- Left Column: Direct Info & Quick Booking Box -->
    <!-- wp:column {"width":"40%","className":"space-y-6"} -->
    <div class="wp-block-column space-y-6" style="flex-basis:40%">
      
      <!-- Quick Call Schedule Box -->
      <!-- wp:group {"className":"bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs space-y-5"} -->
      <div class="wp-block-group bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs space-y-5">
        <!-- wp:paragraph {"className":"text-xs font-mono uppercase tracking-widest text-neutral-400 font-medium"} -->
        <p class="text-xs font-mono uppercase tracking-widest text-neutral-400 font-medium">DIRECT CALENDAR</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":3,"className":"text-xl font-bold text-neutral-900 tracking-tight m-0"} -->
        <h3 class="text-xl font-bold text-neutral-900 tracking-tight m-0">15-Minute Intro Call</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"text-sm text-neutral-600 leading-relaxed"} -->
        <p class="text-sm text-neutral-600 leading-relaxed">No pressure, no hard pitches. A quick video sync to discuss your roadmap, timeline, and whether we are a good mutual fit.</p>
        <!-- /wp:paragraph -->

        <!-- Calendar features -->
        <!-- wp:list {"className":"space-y-2 text-xs text-neutral-600 font-mono pt-2 border-t border-neutral-100"} -->
        <ul class="space-y-2 text-xs text-neutral-600 font-mono pt-2 border-t border-neutral-100">
          <li>⏱ 15 or 30 minutes</li>
          <li>📍 Google Meet / Zoom</li>
          <li>🌐 GMT+6 (Bangladesh Standard Time)</li>
        </ul>
        <!-- /wp:list -->

        <!-- wp:buttons {"className":"pt-2"} -->
        <div class="wp-block-buttons pt-2">
          <!-- wp:button {"backgroundColor":"accent-orange","textColor":"canvas","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"typography":{"fontSize":"13px","fontWeight":"600"}},"className":"hover:bg-orange-700 shadow-xs w-full text-center"} -->
          <div class="wp-block-button hover:bg-orange-700 shadow-xs w-full text-center"><a class="wp-block-button__link has-canvas-color has-accent-orange-background-color has-text-color has-background wp-element-button w-full justify-center" href="https://cal.com" target="_blank" rel="noopener noreferrer" style="border-radius:9999px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;font-size:13px;font-weight:600">Open Live Calendar ↗</a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->

      <!-- Direct Contact Channels -->
      <!-- wp:group {"className":"bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs space-y-3 text-xs font-mono"} -->
      <div class="wp-block-group bg-white rounded-3xl p-6 border border-neutral-200/90 shadow-xs space-y-3 text-xs font-mono">
        <!-- wp:paragraph {"className":"text-neutral-400 uppercase tracking-widest font-semibold"} -->
        <p class="text-neutral-400 uppercase tracking-widest font-semibold">DIRECT CHANNELS</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"className":"text-neutral-700"} -->
        <p class="text-neutral-700">Email: <a href="mailto:kausar.build@gmail.com" class="text-neutral-900 font-semibold hover:text-orange-600 underline">kausar.build@gmail.com</a></p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"className":"text-neutral-700"} -->
        <p class="text-neutral-700">Telegram: <a href="https://t.me" target="_blank" rel="noopener noreferrer" class="text-neutral-900 font-semibold hover:text-orange-600 underline">@kausarbuild</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"text-neutral-700"} -->
        <p class="text-neutral-700">Response time: <span class="text-emerald-700 font-semibold">&lt; 12 hours</span></p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:column -->

    <!-- Right Column: Interactive Inquiry Form -->
    <!-- wp:column {"width":"60%"} -->
    <div class="wp-block-column" style="flex-basis:60%">
      
      <!-- wp:group {"className":"bg-white rounded-3xl p-8 border border-neutral-200/90 shadow-xs space-y-6"} -->
      <div class="wp-block-group bg-white rounded-3xl p-8 border border-neutral-200/90 shadow-xs space-y-6">
        <!-- wp:paragraph {"className":"text-xs font-mono uppercase tracking-widest text-neutral-400 font-medium"} -->
        <p class="text-xs font-mono uppercase tracking-widest text-neutral-400 font-medium">PROJECT INQUIRY FORM</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":3,"className":"text-2xl font-bold text-neutral-900 tracking-tight m-0"} -->
        <h3 class="text-2xl font-bold text-neutral-900 tracking-tight m-0">Tell me about your project</h3>
        <!-- /wp:heading -->

        <!-- wp:html -->
        <form class="space-y-4 pt-2" onsubmit="event.preventDefault(); alert('Thank you! Your message has been sent to Kausar.'); this.reset();">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1">
              <label class="block text-xs font-mono font-medium text-neutral-700">YOUR NAME *</label>
              <input type="text" required placeholder="Jane Doe" class="w-full px-3.5 py-2.5 rounded-xl border border-neutral-200 bg-[#FAF9F6] text-sm focus:outline-none focus:ring-2 focus:ring-neutral-900 transition-all" />
            </div>
            <div class="space-y-1">
              <label class="block text-xs font-mono font-medium text-neutral-700">YOUR EMAIL *</label>
              <input type="email" required placeholder="jane@company.com" class="w-full px-3.5 py-2.5 rounded-xl border border-neutral-200 bg-[#FAF9F6] text-sm focus:outline-none focus:ring-2 focus:ring-neutral-900 transition-all" />
            </div>
          </div>

          <div class="space-y-1">
            <label class="block text-xs font-mono font-medium text-neutral-700">SERVICE NEEDED</label>
            <select class="w-full px-3.5 py-2.5 rounded-xl border border-neutral-200 bg-[#FAF9F6] text-sm focus:outline-none focus:ring-2 focus:ring-neutral-900 transition-all">
              <option>Web Design &amp; Prototyping</option>
              <option>Full-Stack Web Development</option>
              <option>Design Systems &amp; Tokens</option>
              <option>Performance &amp; SEO Audit</option>
              <option>Custom Full Retainer</option>
            </select>
          </div>

          <div class="space-y-1">
            <label class="block text-xs font-mono font-medium text-neutral-700">ESTIMATED BUDGET (USD)</label>
            <div class="grid grid-cols-3 gap-2">
              <label class="flex items-center justify-center p-2 rounded-xl border border-neutral-200 text-xs font-mono cursor-pointer hover:bg-neutral-50 text-neutral-700 has-[:checked]:border-neutral-900 has-[:checked]:bg-neutral-900 has-[:checked]:text-white transition-all">
                <input type="radio" name="budget" value="3k-5k" class="sr-only" checked />
                <span>$3k – $5k</span>
              </label>
              <label class="flex items-center justify-center p-2 rounded-xl border border-neutral-200 text-xs font-mono cursor-pointer hover:bg-neutral-50 text-neutral-700 has-[:checked]:border-neutral-900 has-[:checked]:bg-neutral-900 has-[:checked]:text-white transition-all">
                <input type="radio" name="budget" value="5k-10k" class="sr-only" />
                <span>$5k – $10k</span>
              </label>
              <label class="flex items-center justify-center p-2 rounded-xl border border-neutral-200 text-xs font-mono cursor-pointer hover:bg-neutral-50 text-neutral-700 has-[:checked]:border-neutral-900 has-[:checked]:bg-neutral-900 has-[:checked]:text-white transition-all">
                <input type="radio" name="budget" value="10k+" class="sr-only" />
                <span>$10k+</span>
              </label>
            </div>
          </div>

          <div class="space-y-1">
            <label class="block text-xs font-mono font-medium text-neutral-700">PROJECT DETAILS &amp; GOALS *</label>
            <textarea required rows="4" placeholder="Describe your product, desired launch date, and any links or reference sites..." class="w-full px-3.5 py-2.5 rounded-xl border border-neutral-200 bg-[#FAF9F6] text-sm focus:outline-none focus:ring-2 focus:ring-neutral-900 transition-all"></textarea>
          </div>

          <button type="submit" class="w-full py-3.5 px-6 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white font-semibold text-sm shadow-md transition-all">
            Send Project Inquiry →
          </button>
        </form>
        <!-- /wp:html -->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->

</div>
<!-- /wp:group -->
