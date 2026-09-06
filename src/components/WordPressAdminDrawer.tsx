import React, { useState } from 'react';
import { X, RotateCcw, Check, Palette, User, Briefcase, DollarSign, Sliders } from 'lucide-react';
import { ThemeSettings } from '../types';

interface WordPressAdminDrawerProps {
  isOpen: boolean;
  onClose: () => void;
  settings: ThemeSettings;
  onUpdateSettings: (newSettings: Partial<ThemeSettings>) => void;
  onResetDefaults: () => void;
}

const colorPresets = [
  { name: 'Signal Orange (Reference)', hex: '#E8590C' },
  { name: 'Forest Emerald', hex: '#2B8A3E' },
  { name: 'Electric Cobalt', hex: '#1971C2' },
  { name: 'Royal Violet', hex: '#7950F2' },
  { name: 'Minimal Charcoal', hex: '#212529' },
];

export const WordPressAdminDrawer: React.FC<WordPressAdminDrawerProps> = ({
  isOpen,
  onClose,
  settings,
  onUpdateSettings,
  onResetDefaults,
}) => {
  const [activeTab, setActiveTab] = useState<'hero' | 'profile' | 'retainer' | 'styling'>('hero');

  if (!isOpen) return null;

  return (
    <div
      id="wp-admin-drawer-backdrop"
      className="fixed inset-0 z-50 flex justify-end bg-black/40 backdrop-blur-2xs animate-in fade-in duration-200"
    >
      <aside
        id="wp-admin-drawer-panel"
        className="w-full max-w-md bg-white h-full shadow-2xl flex flex-col justify-between border-l border-neutral-200 animate-in slide-in-from-right duration-300"
      >
        {/* Drawer Header */}
        <div className="p-5 border-b border-neutral-200 flex items-center justify-between bg-neutral-50/80">
          <div className="flex items-center gap-2">
            <div className="w-6 h-6 rounded-full bg-neutral-900 text-white flex items-center justify-center text-xs font-bold">
              W
            </div>
            <div>
              <h3 className="font-display font-bold text-sm text-neutral-900">
                WordPress Theme Customizer
              </h3>
              <p className="text-[10px] text-neutral-500 font-mono">
                Appearance → Customize → Live Settings
              </p>
            </div>
          </div>
          <button
            type="button"
            onClick={onClose}
            className="p-1.5 rounded-full hover:bg-neutral-200 text-neutral-500 transition-colors"
            aria-label="Close Customizer"
          >
            <X className="w-4 h-4" />
          </button>
        </div>

        {/* Tab Navigation */}
        <div className="flex border-b border-neutral-200 text-xs font-medium text-neutral-600 bg-neutral-50/40 px-3 pt-2 gap-1 overflow-x-auto no-scrollbar">
          <button
            type="button"
            onClick={() => setActiveTab('hero')}
            className={`pb-2.5 px-3 border-b-2 font-mono text-[11px] whitespace-nowrap transition-colors ${
              activeTab === 'hero'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-900'
            }`}
          >
            Hero & Lanyard
          </button>
          <button
            type="button"
            onClick={() => setActiveTab('profile')}
            className={`pb-2.5 px-3 border-b-2 font-mono text-[11px] whitespace-nowrap transition-colors ${
              activeTab === 'profile'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-900'
            }`}
          >
            Profile & Stats
          </button>
          <button
            type="button"
            onClick={() => setActiveTab('retainer')}
            className={`pb-2.5 px-3 border-b-2 font-mono text-[11px] whitespace-nowrap transition-colors ${
              activeTab === 'retainer'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-900'
            }`}
          >
            Retainer
          </button>
          <button
            type="button"
            onClick={() => setActiveTab('styling')}
            className={`pb-2.5 px-3 border-b-2 font-mono text-[11px] whitespace-nowrap transition-colors ${
              activeTab === 'styling'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-900'
            }`}
          >
            Aesthetics
          </button>
        </div>

        {/* Drawer Body Form */}
        <div className="flex-1 overflow-y-auto p-5 space-y-4 text-xs">
          {activeTab === 'hero' && (
            <div className="space-y-4">
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Site Name / Brand
                </label>
                <input
                  type="text"
                  value={settings.siteName}
                  onChange={(e) => onUpdateSettings({ siteName: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 focus:border-orange-500 outline-hidden"
                />
              </div>

              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Availability Pill Status
                </label>
                <input
                  type="text"
                  value={settings.statusBadge}
                  onChange={(e) => onUpdateSettings({ statusBadge: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 focus:border-orange-500 outline-hidden"
                />
              </div>

              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Hero Greeting
                </label>
                <input
                  type="text"
                  value={settings.heroGreeting}
                  onChange={(e) => onUpdateSettings({ heroGreeting: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 focus:border-orange-500 outline-hidden"
                />
                <p className="text-[10px] text-neutral-400 mt-1 font-mono">
                  Word "Hello" cycles smoothly through 5 languages with entrance animation.
                </p>
              </div>

              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Hero Sub-Headline
                </label>
                <input
                  type="text"
                  value={settings.heroHeadline}
                  onChange={(e) => onUpdateSettings({ heroHeadline: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 focus:border-orange-500 outline-hidden"
                />
              </div>

              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Hero Bio Description
                </label>
                <textarea
                  rows={3}
                  value={settings.heroDescription}
                  onChange={(e) => onUpdateSettings({ heroDescription: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 focus:border-orange-500 outline-hidden"
                />
              </div>

              <div className="pt-2 border-t border-neutral-100 space-y-3">
                <p className="font-mono text-[11px] font-semibold text-neutral-900 uppercase">
                  Lanyard Physical ID Badge
                </p>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Badge Name
                  </label>
                  <input
                    type="text"
                    value={settings.badgeName}
                    onChange={(e) => onUpdateSettings({ badgeName: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Badge Role
                  </label>
                  <input
                    type="text"
                    value={settings.badgeRole}
                    onChange={(e) => onUpdateSettings({ badgeRole: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Badge ID Serial
                  </label>
                  <input
                    type="text"
                    value={settings.badgePassId}
                    onChange={(e) => onUpdateSettings({ badgePassId: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Badge Image URL (4:5 Aspect Ratio)
                  </label>
                  <input
                    type="url"
                    value={settings.heroImage}
                    onChange={(e) => onUpdateSettings({ heroImage: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
              </div>
            </div>
          )}

          {activeTab === 'profile' && (
            <div className="space-y-4">
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Profile Name
                </label>
                <input
                  type="text"
                  value={settings.profileName}
                  onChange={(e) => onUpdateSettings({ profileName: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                />
              </div>
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Location Tag
                </label>
                <input
                  type="text"
                  value={settings.profileLocation}
                  onChange={(e) => onUpdateSettings({ profileLocation: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                />
              </div>
              <div className="grid grid-cols-3 gap-2">
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Total Hours
                  </label>
                  <input
                    type="text"
                    value={settings.profileHours}
                    onChange={(e) => onUpdateSettings({ profileHours: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 text-center"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">Rating</label>
                  <input
                    type="text"
                    value={settings.profileRating}
                    onChange={(e) => onUpdateSettings({ profileRating: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 text-center"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Completed Jobs
                  </label>
                  <input
                    type="text"
                    value={settings.profileJobs}
                    onChange={(e) => onUpdateSettings({ profileJobs: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 text-center"
                  />
                </div>
              </div>
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Profile Bio Summary
                </label>
                <textarea
                  rows={3}
                  value={settings.profileBio}
                  onChange={(e) => onUpdateSettings({ profileBio: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                />
              </div>

              <div className="pt-3 border-t border-neutral-200/60 space-y-3">
                <div className="flex items-center justify-between">
                  <p className="font-mono text-[11px] font-semibold text-neutral-900 uppercase">
                    Personal Life & Ritual Card
                  </p>
                  <span className="text-[10px] font-mono text-neutral-500">Behind the Pixels</span>
                </div>

                {/* Quick Presets */}
                <div>
                  <label className="block text-[10px] font-mono text-neutral-500 mb-1.5">
                    Quick Studio Environment Themes
                  </label>
                  <div className="grid grid-cols-2 gap-1.5">
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          personalTitle: 'Workstation Rig',
                          personalSubtitle: 'Calibrated 4K displays, tactile mechanical switches & zero cable clutter.',
                          personalImage: 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80',
                          personalTag: 'Studio Rig',
                          personalBadge: 'Studio Setup',
                          personalNote: 'M3 Max · Studio Display · Custom Oak',
                          personalTime: 'Setup v4',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      🖥️ Studio Workstation
                    </button>
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          personalTitle: 'Design Library',
                          personalSubtitle: 'Grid Systems, typography theory & rational Swiss graphic design principles.',
                          personalImage: 'https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=800&q=80',
                          personalTag: 'Design Archive',
                          personalBadge: 'Monograph',
                          personalNote: 'Josef Müller-Brockmann & Dieter Rams',
                          personalTime: 'Essential Theory',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      📐 Design Library
                    </button>
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          personalTitle: 'Spatial & Fluid UI',
                          personalSubtitle: 'Exploring tactile web motion, spring physics and zero-latency layout transitions.',
                          personalImage: 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80',
                          personalTag: 'Active R&D',
                          personalBadge: 'Lab 2026',
                          personalNote: 'Motion physics · WebGL shaders',
                          personalTime: 'Experimental',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      ⚡ Creative Lab
                    </button>
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          personalTitle: 'Typeface Specimen',
                          personalSubtitle: 'Grotesk geometric letterforms with optical kerning and high-contrast numerals.',
                          personalImage: 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=800&q=80',
                          personalTag: 'Typography',
                          personalBadge: 'Font In Use',
                          personalNote: 'Plus Jakarta Sans & JetBrains Mono',
                          personalTime: 'Specimen',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      🔤 Type Specimen
                    </button>
                  </div>
                </div>

                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Card Title
                  </label>
                  <input
                    type="text"
                    value={settings.personalTitle || ''}
                    onChange={(e) => onUpdateSettings({ personalTitle: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Photo URL (16:11 Aspect Ratio)
                  </label>
                  <input
                    type="url"
                    value={settings.personalImage || ''}
                    onChange={(e) => onUpdateSettings({ personalImage: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
                <div className="grid grid-cols-2 gap-2">
                  <div>
                    <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                      Top Pill Tag
                    </label>
                    <input
                      type="text"
                      value={settings.personalTag || ''}
                      onChange={(e) => onUpdateSettings({ personalTag: e.target.value })}
                      className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                    />
                  </div>
                  <div>
                    <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                      Badge Pill (e.g. Studio Setup)
                    </label>
                    <input
                      type="text"
                      value={settings.personalBadge || ''}
                      onChange={(e) => onUpdateSettings({ personalBadge: e.target.value })}
                      className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                    />
                  </div>
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Personal Story / Subtitle
                  </label>
                  <textarea
                    rows={2}
                    value={settings.personalSubtitle || ''}
                    onChange={(e) => onUpdateSettings({ personalSubtitle: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden resize-none"
                  />
                </div>
                <div className="grid grid-cols-2 gap-2">
                  <div>
                    <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                      Footer Note
                    </label>
                    <input
                      type="text"
                      value={settings.personalNote || ''}
                      onChange={(e) => onUpdateSettings({ personalNote: e.target.value })}
                      className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                    />
                  </div>
                  <div>
                    <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                      Time / Timestamp
                    </label>
                    <input
                      type="text"
                      value={settings.personalTime || ''}
                      onChange={(e) => onUpdateSettings({ personalTime: e.target.value })}
                      className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                    />
                  </div>
                </div>
              </div>

              {/* Guiding Philosophy & Manifesto Card */}
              <div className="pt-3 border-t border-neutral-200/60 space-y-3">
                <div className="flex items-center justify-between">
                  <p className="font-mono text-[11px] font-semibold text-neutral-900 uppercase">
                    Guiding Philosophy Card
                  </p>
                  <span className="text-[10px] font-mono text-neutral-500">Core Manifesto</span>
                </div>

                {/* Quick Presets */}
                <div>
                  <label className="block text-[10px] font-mono text-neutral-500 mb-1.5">
                    Quick Philosophy Presets
                  </label>
                  <div className="grid grid-cols-2 gap-1.5">
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          manifestoTitle: '// Guiding Philosophy',
                          manifestoQuote: 'Simplicity is not the lack of clutter, but the presence of purpose. Build digital products that respect human attention, load instantly, and endure.',
                          manifestoAuthor: '— Kausar · Design Engineer',
                          manifestoSub: 'Zero bloat · 100% independent craft',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      🎯 Craft Manifesto
                    </button>
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          manifestoTitle: '// Core Standard',
                          manifestoQuote: 'Fast software is respectful software. Eliminate bloated abstractions, optimize every interaction, and ship tools people love using.',
                          manifestoAuthor: '— Kausar · Independent Coder',
                          manifestoSub: 'Sub-100ms interactions · Pure utility',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      ⚡ Speed & Utility
                    </button>
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          manifestoTitle: '// Client Commitment',
                          manifestoQuote: 'No junior handoffs, no middle management bloat. Direct founder-level collaboration from first wireframe to production deployment.',
                          manifestoAuthor: '— Kausar · Solo Partner',
                          manifestoSub: 'Direct access · Complete ownership',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      🤝 Client Promise
                    </button>
                    <button
                      type="button"
                      onClick={() =>
                        onUpdateSettings({
                          manifestoTitle: '// Design Creed',
                          manifestoQuote: 'Great design is not simply how it looks, but how seamlessly it works. Visual elegance and rigorous engineering synthesized into one.',
                          manifestoAuthor: '— Kausar · Product Builder',
                          manifestoSub: 'Form follows function · High craft',
                        })
                      }
                      className="px-2 py-1.5 rounded-xl border border-neutral-200 bg-white text-left hover:border-neutral-400 transition-colors text-xs font-medium text-neutral-800 cursor-pointer"
                    >
                      💡 Form & Function
                    </button>
                  </div>
                </div>

                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Tag Pill Label
                  </label>
                  <input
                    type="text"
                    value={settings.manifestoTitle || ''}
                    onChange={(e) => onUpdateSettings({ manifestoTitle: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                  />
                </div>
                <div>
                  <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                    Focal Statement / Quote
                  </label>
                  <textarea
                    rows={2}
                    value={settings.manifestoQuote || ''}
                    onChange={(e) => onUpdateSettings({ manifestoQuote: e.target.value })}
                    className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden resize-none"
                  />
                </div>
                <div className="grid grid-cols-2 gap-2">
                  <div>
                    <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                      Author Attribution
                    </label>
                    <input
                      type="text"
                      value={settings.manifestoAuthor || ''}
                      onChange={(e) => onUpdateSettings({ manifestoAuthor: e.target.value })}
                      className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                    />
                  </div>
                  <div>
                    <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                      Sub-tagline
                    </label>
                    <input
                      type="text"
                      value={settings.manifestoSub || ''}
                      onChange={(e) => onUpdateSettings({ manifestoSub: e.target.value })}
                      className="w-full text-xs rounded-xl border border-neutral-300 p-2 outline-hidden"
                    />
                  </div>
                </div>
              </div>
            </div>
          )}

          {activeTab === 'retainer' && (
            <div className="space-y-4">
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Retainer Title
                </label>
                <input
                  type="text"
                  value={settings.retainerTitle}
                  onChange={(e) => onUpdateSettings({ retainerTitle: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2"
                />
              </div>
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Monthly Price ($ USD)
                </label>
                <input
                  type="number"
                  value={settings.retainerPrice}
                  onChange={(e) =>
                    onUpdateSettings({ retainerPrice: parseInt(e.target.value, 10) || 0 })
                  }
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2"
                />
              </div>
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Retainer Tagline
                </label>
                <textarea
                  rows={2}
                  value={settings.retainerDescription}
                  onChange={(e) => onUpdateSettings({ retainerDescription: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2"
                />
              </div>
              <div>
                <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                  Badge Text
                </label>
                <input
                  type="text"
                  value={settings.retainerBadge}
                  onChange={(e) => onUpdateSettings({ retainerBadge: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2"
                />
              </div>
            </div>
          )}

          {activeTab === 'styling' && (
            <div className="space-y-4">
              <label className="block text-[11px] font-mono text-neutral-700 font-semibold mb-1">
                Accent Brand Color
              </label>
              <div className="grid grid-cols-1 gap-2">
                {colorPresets.map((preset) => (
                  <button
                    key={preset.hex}
                    type="button"
                    onClick={() => onUpdateSettings({ accentColor: preset.hex })}
                    className={`flex items-center justify-between p-2.5 rounded-xl border transition-all text-xs ${
                      settings.accentColor === preset.hex
                        ? 'border-neutral-900 bg-neutral-100 font-semibold'
                        : 'border-neutral-200 hover:bg-neutral-50'
                    }`}
                  >
                    <div className="flex items-center gap-2">
                      <span
                        className="w-4 h-4 rounded-full border border-black/10"
                        style={{ backgroundColor: preset.hex }}
                      />
                      <span>{preset.name}</span>
                    </div>
                    <span className="font-mono text-[10px] text-neutral-400">{preset.hex}</span>
                  </button>
                ))}
              </div>

              <div className="pt-2">
                <label className="block text-[10px] font-mono text-neutral-600 mb-1">
                  Or enter custom hex:
                </label>
                <input
                  type="text"
                  value={settings.accentColor}
                  onChange={(e) => onUpdateSettings({ accentColor: e.target.value })}
                  className="w-full text-xs rounded-xl border border-neutral-300 p-2 font-mono"
                />
              </div>
            </div>
          )}
        </div>

        {/* Drawer Footer Actions */}
        <div className="p-4 border-t border-neutral-200 bg-neutral-50 flex items-center justify-between">
          <button
            type="button"
            onClick={onResetDefaults}
            className="inline-flex items-center gap-1.5 text-xs text-neutral-600 hover:text-neutral-900 font-mono transition-colors"
          >
            <RotateCcw className="w-3.5 h-3.5" /> Reset Defaults
          </button>
          <button
            type="button"
            onClick={onClose}
            className="px-4 py-1.5 rounded-full bg-neutral-900 text-white text-xs font-medium hover:bg-neutral-800 transition-colors shadow-xs"
          >
            Done
          </button>
        </div>
      </aside>
    </div>
  );
};
