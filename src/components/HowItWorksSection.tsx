import React from 'react';
import { MapPin, ArrowRight } from 'lucide-react';
import { ThemeSettings } from '../types';

interface HowItWorksSectionProps {
  settings: ThemeSettings;
}

const processSteps = [
  {
    number: '01',
    title: 'Discovery & Direction',
    description: 'Understanding the goal, content, and the audience before designing.',
  },
  {
    number: '02',
    title: 'Design & Structure',
    description: 'Creating clear layouts, visual systems, and interactive prototypes.',
  },
  {
    number: '03',
    title: 'Development & Polish',
    description: 'Writing clean code, responsive testing, and finalizing the details.',
  },
  {
    number: '04',
    title: 'Launch & Support',
    description: 'Deploying the website and ensuring everything runs as expected.',
  },
];

export const HowItWorksSection: React.FC<HowItWorksSectionProps> = ({ settings }) => {
  return (
    <section id="pricing" className="space-y-8">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: settings.accentColor }}
        >
          // How it works
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          A considered approach to design & development
        </h2>
      </div>

      {/* Process 4 Steps */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {processSteps.map((step) => (
          <div
            key={step.number}
            className="bg-white rounded-3xl border border-neutral-200/80 p-5 shadow-soft space-y-2 flex flex-col justify-between"
          >
            <div className="space-y-1.5">
              <span className="font-mono text-xs text-neutral-400 font-semibold block">
                {step.number}
              </span>
              <h3 className="font-display font-bold text-neutral-900 text-base">
                {step.title}
              </h3>
            </div>
            <p className="text-xs text-neutral-600 leading-relaxed">
              {step.description}
            </p>
          </div>
        ))}
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        {/* Left: Profile Verification Card */}
        <div
          id="profile-verification-card"
          className="lg:col-span-5 bg-white rounded-3xl border border-neutral-200/80 p-5 sm:p-7 shadow-soft flex flex-col justify-between space-y-6 overflow-hidden"
        >
          {/* Tilted Profile ID Card */}
          <div className="bg-neutral-50/80 rounded-2xl p-4 border border-neutral-200/80 shadow-sm transform -rotate-1 hover:rotate-0 transition-transform duration-300">
            <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
              <div className="flex items-center gap-3">
                <div className="relative shrink-0">
                  <img
                    src={settings.profileAvatar}
                    alt={settings.profileName}
                    referrerPolicy="no-referrer"
                    className="w-12 h-12 rounded-full object-cover border border-white shadow-xs"
                  />
                  {/* Understated dot badge */}
                  <div className="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full flex items-center justify-center text-[9px] text-white shadow-2xs font-bold">
                    ✓
                  </div>
                </div>
                <div className="min-w-0">
                  <h4 className="font-display font-bold text-neutral-900 text-sm truncate">
                    {settings.profileName}
                  </h4>
                  <p className="text-neutral-500 text-[11px] font-mono flex items-center gap-1">
                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0" />
                    <span className="truncate">{settings.profileLocation}</span>
                  </p>
                </div>
              </div>

              {/* Neutral Stats on right */}
              <div className="flex items-center justify-between sm:justify-end gap-3.5 pt-2 sm:pt-0 border-t sm:border-t-0 border-neutral-200/60 shrink-0">
                <div className="text-left sm:text-right">
                  <p className="text-xs font-bold font-display text-neutral-900">
                    Design + Dev
                  </p>
                  <p className="text-[9px] text-neutral-400 uppercase font-mono">Experience</p>
                </div>
                <div className="text-center sm:text-right">
                  <p className="text-xs font-bold font-display text-neutral-900">
                    Websites
                  </p>
                  <p className="text-[9px] text-neutral-400 uppercase font-mono">Focus</p>
                </div>
                <div className="text-right">
                  <p className="text-xs font-bold font-display text-neutral-900 text-emerald-600">
                    Active
                  </p>
                  <p className="text-[9px] text-neutral-400 uppercase font-mono">Status</p>
                </div>
              </div>
            </div>
          </div>

          {/* Bottom Pitch */}
          <div className="space-y-3 pt-2">
            <div className="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200/70 text-emerald-700 text-[11px] font-mono">
              <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
              <span>Available for selected projects</span>
            </div>
            <h3 className="font-display font-bold text-xl sm:text-2xl text-neutral-900 leading-tight">
              Direct Collaboration
            </h3>
            <p className="text-xs sm:text-sm text-neutral-600 leading-relaxed">
              {settings.profileBio}
            </p>
          </div>
        </div>

        {/* Right: Monthly Retainer Card */}
        <div
          id="monthly-retainer-card"
          className="lg:col-span-7 bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-8 shadow-soft flex flex-col justify-between space-y-6"
        >
          <div className="space-y-4">
            <div className="space-y-1">
              <h3 className="font-display font-bold text-xl sm:text-2xl text-neutral-900">
                {settings.retainerTitle}
              </h3>
              <p className="text-neutral-600 text-xs sm:text-sm leading-relaxed max-w-lg">
                {settings.retainerDescription}
              </p>
            </div>

            {/* Pause or cancel badge */}
            <div className="inline-block">
              <span className="px-3 py-1 rounded-full bg-neutral-100 text-neutral-600 text-xs font-mono">
                {settings.retainerBadge}
              </span>
            </div>

            {/* Price display */}
            <div className="pt-2 flex items-baseline gap-1.5">
              <span className="text-3xl sm:text-4xl font-display font-extrabold text-neutral-900 tracking-tight">
                {typeof settings.retainerPrice === 'number'
                  ? `$${settings.retainerPrice.toLocaleString()}`
                  : settings.retainerPrice}
              </span>
              <span className="text-neutral-500 text-sm font-medium">
                {settings.retainerPeriod ? `· ${settings.retainerPeriod}` : ''}
              </span>
            </div>

            {/* Feature bullets */}
            <ul className="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-3 text-xs sm:text-sm text-neutral-600">
              {settings.retainerFeatures.map((feat, idx) => (
                <li key={idx} className="flex items-center gap-2">
                  <span
                    className="w-1.5 h-1.5 rounded-full shrink-0"
                    style={{ backgroundColor: settings.accentColor }}
                  />
                  <span>{feat}</span>
                </li>
              ))}
            </ul>
          </div>

          <div className="pt-4 border-t border-neutral-100">
            <a
              id="btn-retainer-connect"
              href="#book"
              className="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white font-medium text-xs sm:text-sm transition-all shadow-sm group"
            >
              <span
                className="w-2 h-2 rounded-full"
                style={{ backgroundColor: settings.accentColor }}
              />
              <span>Discuss a project</span>
            </a>
          </div>
        </div>
      </div>
    </section>
  );
};
