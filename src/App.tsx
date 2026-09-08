/**
 * @license
 * SPDX-License-Identifier: Apache-2.0
 */

import React, { useState, useEffect } from 'react';
import { FloatingNavbar } from './components/FloatingNavbar';
import { HeroSection } from './components/HeroSection';
import { AboutSection } from './components/AboutSection';
import { ProjectsSection } from './components/ProjectsSection';
import { ServicesSection } from './components/ServicesSection';
import { TestimonialsSection } from './components/TestimonialsSection';
import { HowItWorksSection } from './components/HowItWorksSection';
import { BookingSection } from './components/BookingSection';
import { FooterSection } from './components/FooterSection';
import { ResumeModal } from './components/ResumeModal';
import { WordPressAdminDrawer } from './components/WordPressAdminDrawer';
import { WordPressExportModal } from './components/WordPressExportModal';
import {
  initialThemeSettings,
  initialProjects,
  initialServices,
  initialTestimonials,
  initialBookingServices,
} from './data/defaultData';
import { ThemeSettings, ProjectItem, ServiceItem, TestimonialItem, BookingConsultationService } from './types';
import { Download, Sliders, CheckCircle2 } from 'lucide-react';

export default function App() {
  const [settings, setSettings] = useState<ThemeSettings>(() => {
    const saved = localStorage.getItem('kausar_portfolio_theme_v4') || localStorage.getItem('kausar_portfolio_theme_v3');
    if (saved) {
      try {
        const parsed = JSON.parse(saved);
        // Replace outdated/cringe coffee ritual values with new workstation rig defaults
        if (
          !parsed.personalTitle ||
          parsed.personalTitle === 'Coffee Ritual' ||
          parsed.personalTag === 'Daily Fuel' ||
          parsed.personalTag?.toLowerCase().includes('fuel') ||
          parsed.personalTitle?.toLowerCase().includes('coffee')
        ) {
          parsed.personalTitle = initialThemeSettings.personalTitle;
          parsed.personalSubtitle = initialThemeSettings.personalSubtitle;
          parsed.personalImage = initialThemeSettings.personalImage;
          parsed.personalTag = initialThemeSettings.personalTag;
          parsed.personalBadge = initialThemeSettings.personalBadge;
          parsed.personalNote = initialThemeSettings.personalNote;
          parsed.personalTime = initialThemeSettings.personalTime;
        }
        if (parsed.heroGreeting === 'Hi, I’m Kausar.') {
          parsed.heroGreeting = initialThemeSettings.heroGreeting;
        }
        return { ...initialThemeSettings, ...parsed };
      } catch (e) {
        return initialThemeSettings;
      }
    }
    try {
      localStorage.removeItem('studio_theme_settings');
      localStorage.removeItem('kausar_portfolio_theme_v3');
    } catch (e) {
      // Ignore
    }
    return initialThemeSettings;
  });

  const [projects] = useState<ProjectItem[]>(initialProjects);
  const [services] = useState<ServiceItem[]>(initialServices);
  const [testimonials] = useState<TestimonialItem[]>(initialTestimonials);
  const [bookingServices] = useState<BookingConsultationService[]>(initialBookingServices);

  const [isCustomizerOpen, setIsCustomizerOpen] = useState(false);
  const [isExportOpen, setIsExportOpen] = useState(false);
  const [isCVOpen, setIsCVOpen] = useState(false);

  useEffect(() => {
    localStorage.setItem('kausar_portfolio_theme_v4', JSON.stringify(settings));
  }, [settings]);

  const handleUpdateSettings = (newSettings: Partial<ThemeSettings>) => {
    setSettings((prev) => ({ ...prev, ...newSettings }));
  };

  const handleResetDefaults = () => {
    setSettings(initialThemeSettings);
    localStorage.removeItem('studio_theme_settings');
  };

  return (
    <div className="min-h-screen bg-[#FAF9F6] text-[#121212] flex flex-col selection:bg-orange-100 selection:text-[#E8590C]">
      {/* Floating Pill Navigation */}
      <FloatingNavbar
        settings={settings}
        onOpenCustomizer={() => setIsCustomizerOpen(true)}
        onOpenExport={() => setIsExportOpen(true)}
      />

      {/* Main Single-View Layout matching Reference Proportions */}
      <main className="flex-1 max-w-4xl w-full mx-auto px-4 sm:px-6 pt-20 sm:pt-28 pb-16 sm:pb-24 space-y-20 sm:space-y-28">
        {/* 1. Hero Section with 3D Hanging Lanyard Pass */}
        <HeroSection settings={settings} onOpenCV={() => setIsCVOpen(true)} />

        {/* 2. About Me Bento Grid */}
        <AboutSection settings={settings} />

        {/* 3. Design Archive (Projects) */}
        <ProjectsSection projects={projects} accentColor={settings.accentColor} />

        {/* 4. Services Accordions 01-05 */}
        <ServicesSection services={services} accentColor={settings.accentColor} />

        {/* 5. Good Words (Testimonials Slider) */}
        <TestimonialsSection testimonials={testimonials} accentColor={settings.accentColor} />

        {/* 6. How It Works (Profile Verification & Monthly Retainer) */}
        <HowItWorksSection settings={settings} />

        {/* 7. Instant Consultation Booking UI */}
        <BookingSection services={bookingServices} settings={settings} />
      </main>

      {/* Footer Section */}
      <FooterSection settings={settings} />

      {/* Curriculum Vitae Modal */}
      <ResumeModal
        isOpen={isCVOpen}
        onClose={() => setIsCVOpen(false)}
        settings={settings}
      />

      {/* WordPress Customizer Live Drawer */}
      <WordPressAdminDrawer
        isOpen={isCustomizerOpen}
        onClose={() => setIsCustomizerOpen(false)}
        settings={settings}
        onUpdateSettings={handleUpdateSettings}
        onResetDefaults={handleResetDefaults}
      />

      {/* WordPress Theme Export & Code Inspector Modal */}
      <WordPressExportModal
        isOpen={isExportOpen}
        onClose={() => setIsExportOpen(false)}
      />
    </div>
  );
}

