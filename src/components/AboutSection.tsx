import React from 'react';
import { Sparkles, Laptop, Cpu, Headphones, Music, ExternalLink } from 'lucide-react';
import { ThemeSettings } from '../types';

interface AboutSectionProps {
  settings: ThemeSettings;
}

export const AboutSection: React.FC<AboutSectionProps> = ({ settings }) => {
  return (
    <section id="about" className="space-y-8">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: settings.accentColor }}
        >
          {settings.aboutTitle}
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          {settings.aboutSubtitle}
        </h2>
      </div>

      {/* Bento Grid */}
      <div className="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">
        {/* Bento 1: Tall Portrait (Left 5 cols on lg) */}
        <div
          id="bento-portrait-card"
          className="lg:col-span-5 rounded-3xl overflow-hidden bg-neutral-100 border border-neutral-200/80 shadow-soft group relative aspect-[4/5] sm:aspect-[16/10] lg:aspect-auto min-h-[340px] lg:min-h-[420px]"
        >
          <img
            src={settings.aboutPortraitImage}
            alt="Kausar"
            referrerPolicy="no-referrer"
            className="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
          />
        </div>

        {/* Bento 2: Right Column (7 cols on lg) */}
        <div className="lg:col-span-7 flex flex-col gap-5 justify-between">
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-5 flex-1">
            {/* 2A: Music Player Widget (Veeran Sheher - 1:1 Layout) */}
            <a
              id="bento-music-card"
              href={settings.spotifyUrl || 'https://open.spotify.com/track/2U699aQLnplBGFGxWBIiDD'}
              target="_blank"
              rel="noopener noreferrer"
              className="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-soft flex flex-col justify-between group hover:border-neutral-300 transition-all cursor-pointer block text-inherit no-underline"
              title="Open track on Spotify"
            >
              {/* Photo Frame 1:1 Square */}
              <div className="w-full aspect-square rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group/img">
                <img
                  src={settings.musicCover}
                  alt={settings.musicTitle}
                  referrerPolicy="no-referrer"
                  className="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                />
                {/* Top overlay badge */}
                <div className="absolute top-2.5 left-2.5 bg-black/65 backdrop-blur-xs text-white px-2.5 py-1 rounded-full text-[10px] font-mono flex items-center gap-1.5 shadow-sm">
                  <Headphones className="w-3 h-3 text-emerald-400" />
                  <span>Now Playing</span>
                </div>
                {/* Bottom-right micro-pill */}
                <div className="absolute bottom-2.5 right-2.5 bg-white/90 group-hover:bg-white text-neutral-900 px-2.5 py-0.5 rounded-full text-[10px] font-mono border border-white/60 shadow-xs font-semibold flex items-center gap-1 transition-colors">
                  <span>Spotify</span>
                  <ExternalLink className="w-2.5 h-2.5 text-neutral-500 group-hover:text-neutral-900 transition-colors" />
                </div>
              </div>

              {/* Controls & Track Info */}
              <div className="space-y-2">
                <div className="flex items-center justify-between gap-2">
                  <div className="min-w-0 flex-1">
                    <h3 className="text-sm font-bold text-neutral-900 font-display truncate">
                      {settings.musicTitle}
                    </h3>
                    <p className="text-[11px] text-neutral-500 font-mono tracking-tight truncate">
                      {settings.musicArtist}
                    </p>
                  </div>
                  {/* Equalizer Wave / Audio indicator */}
                  <div className="flex items-end gap-0.5 h-3 shrink-0">
                    <span
                      className="w-0.5 h-2 animate-pulse rounded-full"
                      style={{ backgroundColor: settings.accentColor }}
                    />
                    <span
                      className="w-0.5 h-3 animate-pulse delay-75 rounded-full"
                      style={{ backgroundColor: settings.accentColor }}
                    />
                    <span
                      className="w-0.5 h-1.5 animate-pulse delay-150 rounded-full"
                      style={{ backgroundColor: settings.accentColor }}
                    />
                    <span
                      className="w-0.5 h-2.5 animate-pulse delay-100 rounded-full"
                      style={{ backgroundColor: settings.accentColor }}
                    />
                  </div>
                </div>

                {/* Progress bar */}
                <div className="space-y-1">
                  <div className="w-full bg-neutral-100 rounded-full h-1 overflow-hidden">
                    <div
                      className="h-full w-2/5 rounded-full transition-all duration-300"
                      style={{ backgroundColor: settings.accentColor }}
                    />
                  </div>
                  <div className="flex justify-between text-[10px] font-mono text-neutral-400">
                    <span>{settings.musicTimeCurrent}</span>
                    <span>{settings.musicTimeTotal}</span>
                  </div>
                </div>
              </div>

              {/* Card Footer Bar - Matching 1:1 with Workstation */}
              <div className="w-full flex items-center justify-between gap-2 pt-3 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                <span className="text-neutral-600 truncate flex items-center gap-1.5 font-medium">
                  <Music className="w-3 h-3 text-[#E8590C] shrink-0" />
                  <span className="truncate">Lo-Fi / Focus Beats · On Repeat</span>
                </span>
                <span className="text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                  Audio
                </span>
              </div>
            </a>

            {/* 2B: Studio Workstation Rig & Creative Environment (1:1 Layout) */}
            <div
              id="bento-workspace-card"
              className="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-soft flex flex-col justify-between group hover:border-neutral-300 transition-colors"
            >
              {/* Photo Frame 1:1 Square */}
              <div className="w-full aspect-square rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/70 shadow-xs mb-3 relative group/img">
                <img
                  src={settings.personalImage || 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80'}
                  alt={settings.personalTitle || 'Workstation Rig'}
                  referrerPolicy="no-referrer"
                  className="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500"
                />
                {/* Top overlay badge */}
                <div className="absolute top-2.5 left-2.5 bg-black/65 backdrop-blur-xs text-white px-2.5 py-1 rounded-full text-[10px] font-mono flex items-center gap-1.5 shadow-sm">
                  <Laptop className="w-3 h-3 text-sky-400" />
                  <span>{settings.personalTag || 'Studio Rig'}</span>
                </div>
                {/* Bottom-right micro-pill */}
                <div className="absolute bottom-2.5 right-2.5 bg-white/90 backdrop-blur-xs text-neutral-900 px-2.5 py-0.5 rounded-full text-[10px] font-mono border border-white/60 shadow-xs font-semibold">
                  {settings.personalBadge || 'Studio Setup'}
                </div>
              </div>

              {/* Title & Personal Bio Note */}
              <div className="space-y-1.5">
                <div className="flex items-center justify-between gap-2">
                  <h3 className="text-sm font-bold text-neutral-900 font-display truncate">
                    {settings.personalTitle || 'Workstation Rig'}
                  </h3>
                  <span className="text-[10px] font-mono text-neutral-400 shrink-0">
                    {settings.personalTime || 'Setup v4'}
                  </span>
                </div>
                <p className="text-[11px] text-neutral-500 leading-relaxed line-clamp-2">
                  {settings.personalSubtitle || 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.'}
                </p>
              </div>

              {/* Card Footer Bar */}
              <div className="w-full flex items-center justify-between gap-2 pt-3 mt-2 border-t border-neutral-100 text-[10px] font-mono">
                <span className="text-neutral-600 truncate flex items-center gap-1.5 font-medium">
                  <Cpu className="w-3 h-3 text-[#E8590C] shrink-0" />
                  <span className="truncate">{settings.personalNote || 'M3 Max · Studio Display · Custom Oak'}</span>
                </span>
                <span className="text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0 font-medium">
                  Hardware
                </span>
              </div>
            </div>
          </div>

          {/* 2C: Guiding Philosophy & Craft Manifesto Card */}
          <div
            id="bento-guiding-philosophy-card"
            className="bg-white border border-neutral-200/80 rounded-3xl p-5 sm:p-6 flex flex-col items-center justify-center text-center relative overflow-hidden group shadow-soft hover:border-neutral-300 transition-all duration-300"
          >
            {/* Top Pill Tag */}
            <div className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neutral-100/90 border border-neutral-200/80 text-neutral-700 text-[11px] font-mono tracking-tight mb-3 select-none">
              <Sparkles className="w-3 h-3 text-[#E8590C]" />
              <span>{settings.manifestoTitle || '// Guiding Philosophy'}</span>
            </div>

            {/* Central Focal Statement / Manifesto */}
            <blockquote className="max-w-lg mx-auto px-2">
              <p className="font-display font-semibold text-base sm:text-lg lg:text-xl text-neutral-900 tracking-tight leading-snug">
                "{settings.manifestoQuote || 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.'}"
              </p>
            </blockquote>

            {/* Author Attribution & Footer */}
            <div className="mt-3.5 flex flex-wrap items-center justify-center gap-2 text-xs font-mono">
              <span className="text-neutral-900 font-semibold font-display text-xs sm:text-sm">
                {settings.manifestoAuthor || '— Kausar · Design Engineer'}
              </span>
              <span className="text-neutral-300">·</span>
              <span className="text-neutral-500 text-[11px]">
                {settings.manifestoSub || 'Zero bloat · 100% independent craft'}
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
