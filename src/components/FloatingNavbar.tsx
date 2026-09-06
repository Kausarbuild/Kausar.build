import React, { useState } from 'react';
import { Download, Sliders, Menu, X, Sparkles } from 'lucide-react';
import { ThemeSettings } from '../types';

interface FloatingNavbarProps {
  settings: ThemeSettings;
  onOpenCustomizer: () => void;
  onOpenExport: () => void;
}

export const FloatingNavbar: React.FC<FloatingNavbarProps> = ({
  settings,
  onOpenCustomizer,
  onOpenExport,
}) => {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  return (
    <>
      <header
        id="site-header"
        className="fixed top-3 sm:top-4 inset-x-0 z-50 flex justify-center px-3 sm:px-4 pointer-events-none"
      >
        <nav
          id="nav-pill"
          className="pointer-events-auto bg-white/90 backdrop-blur-md border border-neutral-200/90 shadow-sm rounded-full px-3.5 sm:px-6 py-2 sm:py-2.5 flex items-center justify-between gap-2 sm:gap-6 text-sm font-medium transition-all hover:shadow-md max-w-4xl w-full"
        >
          {/* Brand & Availability Pulse */}
          <a
            id="nav-brand-link"
            href="#hero"
            className="flex items-center gap-1.5 sm:gap-2.5 group shrink min-w-0"
          >
            <div className="leading-tight truncate">
              <span className="font-display font-bold tracking-tight text-neutral-900 text-sm sm:text-base block truncate">
                {settings.siteName}
              </span>
            </div>
            <span
              id="nav-status-badge"
              className="inline-flex items-center gap-1.5 px-2 sm:px-2.5 py-0.5 rounded-full bg-emerald-50 text-[10px] sm:text-[11px] font-mono text-emerald-700 border border-emerald-200/70 shrink-0"
            >
              <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse shrink-0" />
              <span className="hidden min-[420px]:inline">{settings.statusBadge}</span>
            </span>
          </a>

          {/* Desktop Nav Links */}
          <div
            id="nav-desktop-links"
            className="hidden md:flex items-center gap-5 text-neutral-600 text-xs sm:text-sm font-medium shrink-0"
          >
            <a
              id="nav-link-work"
              href="#work"
              className="hover:text-neutral-900 transition-colors"
            >
              Projects
            </a>
            <a
              id="nav-link-about"
              href="#about"
              className="hover:text-neutral-900 transition-colors"
            >
              About
            </a>
            <a
              id="nav-link-services"
              href="#services"
              className="hover:text-neutral-900 transition-colors"
            >
              Services
            </a>
            <a
              id="nav-link-testimonials"
              href="#testimonials"
              className="hover:text-neutral-900 transition-colors"
            >
              Testimonial
            </a>
            <a
              id="nav-link-contact"
              href="#book"
              className="hover:text-neutral-900 transition-colors"
            >
              Contact
            </a>
          </div>

          {/* Action CTAs */}
          <div id="nav-actions" className="flex items-center gap-1.5 sm:gap-2 shrink-0">
            {/* Live Customizer Drawer Trigger */}
            <button
              id="btn-open-customizer"
              type="button"
              onClick={onOpenCustomizer}
              className="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 rounded-full bg-neutral-100 hover:bg-neutral-200 text-neutral-700 text-xs font-mono transition-colors"
              title="Open WordPress Theme Customizer"
              aria-label="Open WordPress Theme Customizer"
            >
              <Sliders className="w-3.5 h-3.5 text-neutral-600" />
              <span className="hidden lg:inline ml-1.5">WP Customizer</span>
            </button>

            {/* WP Theme Files / Export ZIP Trigger */}
            <button
              id="btn-open-export"
              type="button"
              onClick={onOpenExport}
              className="inline-flex items-center justify-center p-2 sm:px-3 sm:py-1.5 rounded-full bg-orange-50 hover:bg-orange-100 border border-orange-200 text-[#E8590C] text-xs font-mono transition-colors"
              title="Download & inspect WordPress Theme package"
              aria-label="Download WordPress Theme package"
            >
              <Download className="w-3.5 h-3.5" />
              <span className="hidden lg:inline ml-1.5">Theme (.zip)</span>
            </button>

            {/* Let's connect CTA (Desktop/Tablet) */}
            <a
              id="nav-btn-book-call"
              href="#book"
              className="hidden sm:inline-flex bg-neutral-900 text-white hover:bg-neutral-800 px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium tracking-wide transition-all shadow-sm shrink-0"
            >
              Let's connect
            </a>

            {/* Mobile menu toggle */}
            <button
              id="btn-mobile-menu-toggle"
              type="button"
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="md:hidden p-1.5 rounded-full hover:bg-neutral-100 text-neutral-700"
              aria-label="Toggle navigation menu"
            >
              {mobileMenuOpen ? <X className="w-4 h-4" /> : <Menu className="w-4 h-4" />}
            </button>
          </div>
        </nav>
      </header>

      {/* Mobile Nav Overlay */}
      {mobileMenuOpen && (
        <div
          id="mobile-nav-menu"
          className="fixed inset-x-4 top-16 z-40 bg-white/98 backdrop-blur-lg border border-neutral-200 rounded-3xl p-5 shadow-xl md:hidden space-y-4 text-center"
        >
          <div className="flex flex-col gap-3 font-medium text-neutral-700 text-sm">
            <a
              href="#work"
              onClick={() => setMobileMenuOpen(false)}
              className="py-1.5 hover:text-neutral-900"
            >
              Projects
            </a>
            <a
              href="#about"
              onClick={() => setMobileMenuOpen(false)}
              className="py-1.5 hover:text-neutral-900"
            >
              About
            </a>
            <a
              href="#services"
              onClick={() => setMobileMenuOpen(false)}
              className="py-1.5 hover:text-neutral-900"
            >
              Services
            </a>
            <a
              href="#testimonials"
              onClick={() => setMobileMenuOpen(false)}
              className="py-1.5 hover:text-neutral-900"
            >
              Testimonials
            </a>
            <a
              href="#pricing"
              onClick={() => setMobileMenuOpen(false)}
              className="py-1.5 hover:text-neutral-900"
            >
              How It Works
            </a>
            <a
              href="#book"
              onClick={() => setMobileMenuOpen(false)}
              className="py-1.5 hover:text-neutral-900"
            >
              Book Consultation
            </a>

            <div className="pt-2 border-t border-neutral-100 flex flex-col gap-2">
              <a
                href="#book"
                onClick={() => setMobileMenuOpen(false)}
                className="py-2.5 bg-neutral-900 text-white rounded-full text-xs font-medium"
              >
                Let's connect
              </a>
            </div>
          </div>
        </div>
      )}
    </>
  );
};
