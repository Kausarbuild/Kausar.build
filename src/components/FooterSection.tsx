import React from 'react';
import { Mail, Github, Linkedin, Instagram, Twitter } from 'lucide-react';
import { ThemeSettings } from '../types';

interface FooterSectionProps {
  settings: ThemeSettings;
}

export const FooterSection: React.FC<FooterSectionProps> = ({ settings }) => {
  const hasSocials = Boolean(
    settings.socialGitHub ||
    settings.socialLinkedIn ||
    settings.socialInstagram ||
    settings.socialTwitter ||
    (settings.socialEmail && settings.socialEmail !== 'mailto:')
  );

  return (
    <footer
      id="site-footer"
      className="pt-16 pb-20 border-t border-neutral-200/80 text-center space-y-8 max-w-4xl mx-auto px-4"
    >
      {/* Social Buttons - only rendered if URL is set and non-empty */}
      {hasSocials && (
        <div id="footer-social-links" className="flex items-center justify-center gap-3">
          {settings.socialGitHub && (
            <a
              href={settings.socialGitHub}
              target="_blank"
              rel="noopener noreferrer"
              className="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
              aria-label="GitHub Profile"
            >
              <Github className="w-4 h-4" />
            </a>
          )}
          {settings.socialEmail && settings.socialEmail !== 'mailto:' && (
            <a
              href={settings.socialEmail.startsWith('mailto:') ? settings.socialEmail : `mailto:${settings.socialEmail}`}
              className="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
              aria-label="Send Email"
            >
              <Mail className="w-4 h-4" />
            </a>
          )}
          {settings.socialLinkedIn && (
            <a
              href={settings.socialLinkedIn}
              target="_blank"
              rel="noopener noreferrer"
              className="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
              aria-label="LinkedIn Profile"
            >
              <Linkedin className="w-4 h-4" />
            </a>
          )}
          {settings.socialInstagram && (
            <a
              href={settings.socialInstagram}
              target="_blank"
              rel="noopener noreferrer"
              className="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
              aria-label="Instagram Profile"
            >
              <Instagram className="w-4 h-4" />
            </a>
          )}
          {settings.socialTwitter && (
            <a
              href={settings.socialTwitter}
              target="_blank"
              rel="noopener noreferrer"
              className="w-10 h-10 rounded-2xl bg-[#141414] hover:bg-neutral-800 text-white flex items-center justify-center transition-all shadow-xs hover:scale-105"
              aria-label="X Profile"
            >
              <Twitter className="w-4 h-4" />
            </a>
          )}
        </div>
      )}

      {/* Greeting & Decorative Wax Seal Badge */}
      <div className="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 text-xs sm:text-sm text-neutral-600 font-medium">
        <span>{settings.footerGreeting}</span>
        {/* Neutral Kausar.Build Wax Seal Badge */}
        <div className="w-10 h-10 relative select-none hover:rotate-12 transition-transform cursor-pointer flex items-center justify-center">
          {settings.waxSealImage ? (
            <img
              src={settings.waxSealImage}
              alt="Kausar.Build Seal"
              referrerPolicy="no-referrer"
              className="w-full h-full object-contain"
            />
          ) : (
            <div className="w-10 h-10 rounded-full bg-gradient-to-br from-[#c94a08] to-[#9c3405] text-white flex items-center justify-center shadow-md border border-[#e8590c]/40">
              <span className="font-display font-black text-[10px] tracking-widest uppercase">
                KB
              </span>
            </div>
          )}
        </div>
        <span>{settings.footerTagline}</span>
      </div>

      {/* Stylized Signature */}
      <div className="pt-2 flex flex-col items-center space-y-1">
        {settings.signatureImage ? (
          <img
            src={settings.signatureImage}
            alt={settings.profileName || 'Kausar'}
            referrerPolicy="no-referrer"
            className="h-12 sm:h-14 object-contain select-none"
          />
        ) : (
          <p className="font-handwriting text-4xl sm:text-5xl lg:text-6xl text-neutral-900 -rotate-2 select-none">
            {settings.profileName || 'Kausar'}
          </p>
        )}
        <p className="text-xs text-neutral-500 font-mono tracking-tight">
          {settings.signatureName}
        </p>
      </div>

      {/* Copyright Notice */}
      <div className="text-[11px] font-mono text-neutral-400 pt-3">
        <p>{settings.copyrightText}</p>
      </div>
    </footer>
  );
};
