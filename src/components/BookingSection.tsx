import React from 'react';
import { Phone, Instagram, ArrowUpRight, Github, Linkedin, Twitter, Mail, MessageCircle } from 'lucide-react';
import { BookingConsultationService, ThemeSettings } from '../types';

interface BookingSectionProps {
  services?: BookingConsultationService[];
  settings: ThemeSettings;
}

export const BookingSection: React.FC<BookingSectionProps> = ({ settings }) => {
  const whatsappNumber = '+916002357235';
  const whatsappClean = '916002357235';
  const phoneNumber = '+916002357235';
  const instagramUsername = 'Kausar.build';

  const whatsappUrl = `https://wa.me/${whatsappClean}`;
  const instagramUrl = `https://instagram.com/${instagramUsername}`;
  const telUrl = `tel:${phoneNumber}`;

  // Only show social icons if URL is set and non-empty
  const hasSocials = Boolean(
    settings.socialGitHub ||
    settings.socialLinkedIn ||
    settings.socialInstagram ||
    settings.socialTwitter ||
    (settings.socialEmail && settings.socialEmail !== 'mailto:')
  );

  return (
    <section id="book" className="space-y-8 scroll-mt-24">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: settings.accentColor }}
        >
          // Connect
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          Let’s talk
        </h2>
        <p className="text-neutral-600 text-xs sm:text-sm max-w-xl">
          Direct communication, zero friction. Reach out directly via WhatsApp, Instagram, or give me a call.
        </p>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        {/* Left Visual: Portrait card with bottom identity */}
        <div
          id="booking-portrait-card"
          className="lg:col-span-5 bg-white rounded-3xl border border-neutral-200/80 p-4 sm:p-5 shadow-soft flex flex-col justify-between"
        >
          {/* Portrait with floating AVAILABLE pill */}
          <div className="relative w-full aspect-[4/5] rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/60 shadow-xs mb-4">
            <img
              src={settings.heroImage}
              alt={settings.profileName || 'Kausar'}
              className="w-full h-full object-cover"
            />
            {/* Floating Available badge at bottom center */}
            <div className="absolute bottom-3 left-1/2 -translate-x-1/2 bg-neutral-900/90 backdrop-blur-xs px-3.5 py-1 rounded-full text-[10px] font-mono tracking-wider text-white shadow-md flex items-center gap-1.5 border border-white/10 whitespace-nowrap">
              <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse" />
              <span>AVAILABLE</span>
            </div>
          </div>

          {/* Identity & Conditional Socials */}
          <div className="text-center space-y-3 pb-1">
            <p className="text-xs sm:text-sm font-semibold text-neutral-800 font-display flex items-center justify-center gap-1.5 flex-wrap">
              <span>{settings.profileName || 'Kausar'}</span>
              <span className="text-neutral-400 text-xs">●</span>
              <span className="text-neutral-500 font-normal">Design + Development</span>
            </p>
            {hasSocials && (
              <div className="flex items-center justify-center gap-2 text-neutral-600">
                {settings.socialGitHub && (
                  <a
                    href={settings.socialGitHub}
                    target="_blank"
                    rel="noreferrer"
                    className="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs"
                    aria-label="GitHub"
                  >
                    <Github className="w-4 h-4" />
                  </a>
                )}
                {settings.socialLinkedIn && (
                  <a
                    href={settings.socialLinkedIn}
                    target="_blank"
                    rel="noreferrer"
                    className="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs"
                    aria-label="LinkedIn"
                  >
                    <Linkedin className="w-4 h-4" />
                  </a>
                )}
                {settings.socialInstagram && (
                  <a
                    href={settings.socialInstagram}
                    target="_blank"
                    rel="noreferrer"
                    className="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs"
                    aria-label="Instagram"
                  >
                    <Instagram className="w-4 h-4" />
                  </a>
                )}
                {settings.socialTwitter && (
                  <a
                    href={settings.socialTwitter}
                    target="_blank"
                    rel="noreferrer"
                    className="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs"
                    aria-label="Twitter"
                  >
                    <Twitter className="w-4 h-4" />
                  </a>
                )}
                {settings.socialEmail && (
                  <a
                    href={settings.socialEmail.startsWith('mailto:') ? settings.socialEmail : `mailto:${settings.socialEmail}`}
                    className="w-8 h-8 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-xs text-neutral-700 transition-colors shadow-2xs"
                    aria-label="Email"
                  >
                    <Mail className="w-4 h-4" />
                  </a>
                )}
              </div>
            )}
          </div>
        </div>

        {/* Right: Clean 3-Option Contact Section */}
        <div
          id="contact-options-card"
          className="lg:col-span-7 bg-white rounded-3xl border border-neutral-200/80 shadow-soft p-5 sm:p-7 flex flex-col justify-between space-y-6"
        >
          {/* Section Card Header */}
          <div
            className="p-4 sm:p-5 rounded-2xl flex items-center justify-between text-white transition-colors"
            style={{ backgroundColor: settings.accentColor }}
          >
            <div>
              <h3 className="font-display font-bold text-base sm:text-lg">
                Direct Contact
              </h3>
              <p className="text-[11px] text-orange-100 font-mono mt-0.5">
                Fast response · Open for collaborations & consultations
              </p>
            </div>
            <div className="flex items-center gap-1.5 bg-white/20 backdrop-blur-xs px-3 py-1 rounded-full text-[10px] font-mono tracking-wider text-white border border-white/10">
              <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse" />
              <span>ONLINE</span>
            </div>
          </div>

          {/* Three Functional Contact Options */}
          <div className="space-y-3.5">
            {/* Option 1: WhatsApp */}
            <a
              id="contact-whatsapp-btn"
              href={whatsappUrl}
              target="_blank"
              rel="noopener noreferrer"
              className="group relative flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-2xl border border-neutral-200 bg-neutral-50/70 hover:bg-emerald-50/40 hover:border-emerald-300 hover:shadow-xs transition-all cursor-pointer"
            >
              <div className="flex items-center gap-3.5 min-w-0">
                <div className="w-11 h-11 rounded-2xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-200/60 group-hover:scale-105 transition-transform">
                  {/* WhatsApp SVG Icon */}
                  <svg className="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c4.52 0 8.24 3.72 8.24 8.24 0 2.2-.86 4.27-2.42 5.82a8.196 8.196 0 0 1-5.82 2.42c-1.48 0-2.93-.39-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.188 8.188 0 0 1-1.25-4.38c0-4.52 3.72-8.24 8.24-8.24m4.53 11.53c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.514 7.514 0 0 1-1.4-1.73c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.1-.23-.17-.48-.29" />
                  </svg>
                </div>
                <div className="min-w-0">
                  <div className="flex items-center gap-2">
                    <p className="font-display font-bold text-sm text-neutral-900 leading-snug group-hover:text-emerald-950 transition-colors">
                      WhatsApp
                    </p>
                    <span className="font-mono text-[10px] text-emerald-700 bg-emerald-100/70 px-2 py-0.5 rounded-full border border-emerald-200/50">
                      Fastest
                    </span>
                  </div>
                  <p className="text-xs font-mono font-semibold text-emerald-800 mt-0.5">
                    {whatsappNumber}
                  </p>
                  <p className="text-[11px] text-neutral-500 font-mono mt-0.5">
                    Click to open direct chat in WhatsApp
                  </p>
                </div>
              </div>
              <span className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-900 text-white text-xs font-medium group-hover:bg-emerald-700 transition-colors shadow-2xs shrink-0 self-start sm:self-center">
                <span>Chat on WhatsApp</span>
                <ArrowUpRight className="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" />
              </span>
            </a>

            {/* Option 2: Instagram */}
            <a
              id="contact-instagram-btn"
              href={instagramUrl}
              target="_blank"
              rel="noopener noreferrer"
              className="group relative flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-2xl border border-neutral-200 bg-neutral-50/70 hover:bg-fuchsia-50/40 hover:border-fuchsia-300 hover:shadow-xs transition-all cursor-pointer"
            >
              <div className="flex items-center gap-3.5 min-w-0">
                <div className="w-11 h-11 rounded-2xl bg-fuchsia-100/80 text-fuchsia-700 flex items-center justify-center shrink-0 border border-fuchsia-200/60 group-hover:scale-105 transition-transform">
                  <Instagram className="w-5 h-5" />
                </div>
                <div className="min-w-0">
                  <div className="flex items-center gap-2">
                    <p className="font-display font-bold text-sm text-neutral-900 leading-snug group-hover:text-fuchsia-950 transition-colors">
                      Instagram
                    </p>
                    <span className="font-mono text-[10px] text-fuchsia-700 bg-fuchsia-100/70 px-2 py-0.5 rounded-full border border-fuchsia-200/50">
                      Profile & DM
                    </span>
                  </div>
                  <p className="text-xs font-mono font-semibold text-fuchsia-800 mt-0.5">
                    @{instagramUsername}
                  </p>
                  <p className="text-[11px] text-neutral-500 font-mono mt-0.5">
                    Click to open Instagram profile and message
                  </p>
                </div>
              </div>
              <span className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-900 text-white text-xs font-medium group-hover:bg-fuchsia-700 transition-colors shadow-2xs shrink-0 self-start sm:self-center">
                <span>View @{instagramUsername}</span>
                <ArrowUpRight className="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" />
              </span>
            </a>

            {/* Option 3: Call Me */}
            <a
              id="contact-call-btn"
              href={telUrl}
              className="group relative flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-2xl border border-neutral-200 bg-neutral-50/70 hover:bg-orange-50/40 hover:border-orange-300 hover:shadow-xs transition-all cursor-pointer"
            >
              <div className="flex items-center gap-3.5 min-w-0">
                <div className="w-11 h-11 rounded-2xl bg-orange-100/80 text-orange-700 flex items-center justify-center shrink-0 border border-orange-200/60 group-hover:scale-105 transition-transform">
                  <Phone className="w-5 h-5" />
                </div>
                <div className="min-w-0">
                  <div className="flex items-center gap-2">
                    <p className="font-display font-bold text-sm text-neutral-900 leading-snug group-hover:text-orange-950 transition-colors">
                      Call Me
                    </p>
                    <span className="font-mono text-[10px] text-orange-700 bg-orange-100/70 px-2 py-0.5 rounded-full border border-orange-200/50">
                      Direct Line
                    </span>
                  </div>
                  <p className="text-xs font-mono font-semibold text-orange-800 mt-0.5">
                    {phoneNumber}
                  </p>
                  <p className="text-[11px] text-neutral-500 font-mono mt-0.5">
                    Click to launch device phone dialer
                  </p>
                </div>
              </div>
              <span className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-900 text-white text-xs font-medium group-hover:bg-orange-700 transition-colors shadow-2xs shrink-0 self-start sm:self-center">
                <span>Call Now</span>
                <Phone className="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" />
              </span>
            </a>
          </div>

          {/* Bottom Card Footer */}
          <div className="pt-4 border-t border-neutral-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-[11px] font-mono text-neutral-500">
            <div className="flex items-center gap-2">
              <span className="w-2 h-2 rounded-full bg-emerald-500 animate-pulse" />
              <span>Typically replies within 1–2 hours</span>
            </div>
            <div className="text-neutral-400">
              Direct & confidential communication
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
