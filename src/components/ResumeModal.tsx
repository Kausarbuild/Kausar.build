import React from 'react';
import { X, Printer, Download, Mail, MapPin, ExternalLink, Briefcase, Award, GraduationCap, Code } from 'lucide-react';
import { ThemeSettings } from '../types';

interface ResumeModalProps {
  isOpen: boolean;
  onClose: () => void;
  settings: ThemeSettings;
}

export const ResumeModal: React.FC<ResumeModalProps> = ({ isOpen, onClose, settings }) => {
  if (!isOpen) return null;

  const handlePrint = () => {
    window.print();
  };

  return (
    <div
      id="cv-modal-backdrop"
      className="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-neutral-900/60 backdrop-blur-xs animate-in fade-in duration-200"
      onClick={onClose}
    >
      <div
        id="cv-modal-card"
        className="bg-white rounded-3xl border border-neutral-200 shadow-float max-w-2xl w-full max-h-[90vh] flex flex-col overflow-hidden text-neutral-900 animate-in zoom-in-95 duration-200"
        onClick={(e) => e.stopPropagation()}
      >
        {/* Modal Bar */}
        <div className="flex items-center justify-between px-6 py-4 border-b border-neutral-100 bg-neutral-50/80">
          <div className="flex items-center gap-2">
            <span
              className="w-2.5 h-2.5 rounded-full"
              style={{ backgroundColor: settings.accentColor }}
            />
            <span className="font-mono text-xs font-semibold uppercase tracking-wider text-neutral-500">
              Curriculum Vitae
            </span>
          </div>
          <div className="flex items-center gap-2">
            <a
              href="/assets/docs/kausar-cv.pdf"
              download="Kausar-CV.pdf"
              className="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white text-xs font-medium transition-colors shadow-2xs cursor-pointer"
              title="Download CV PDF directly"
            >
              <Download className="w-3.5 h-3.5" />
              <span>Download PDF</span>
            </a>
            <button
              type="button"
              onClick={handlePrint}
              className="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white border border-neutral-200 hover:bg-neutral-100 text-neutral-700 text-xs font-medium transition-colors shadow-2xs cursor-pointer"
              title="Print or Save as PDF"
            >
              <Printer className="w-3.5 h-3.5 text-neutral-500" />
              <span>Print</span>
            </button>
            <button
              type="button"
              onClick={onClose}
              className="w-8 h-8 rounded-full border border-neutral-200 hover:bg-neutral-200 flex items-center justify-center text-neutral-500 hover:text-neutral-900 transition-colors cursor-pointer"
              aria-label="Close CV Modal"
            >
              <X className="w-4 h-4" />
            </button>
          </div>
        </div>

        {/* Modal Body / Printable Resume Sheet */}
        <div className="p-6 sm:p-8 overflow-y-auto space-y-6 text-xs sm:text-sm text-neutral-700 font-sans leading-relaxed">
          {/* Header Info */}
          <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-neutral-200">
            <div className="space-y-1">
              <h3 className="font-display font-bold text-2xl sm:text-3xl text-neutral-900 tracking-tight">
                {settings.profileName || 'Kausar'}
              </h3>
              <p className="font-display font-medium text-neutral-500 text-sm">
                Design Engineer · Websites & Digital Products
              </p>
            </div>
            <div className="space-y-1 font-mono text-[11px] text-neutral-500 sm:text-right">
              <p className="flex items-center sm:justify-end gap-1.5">
                <MapPin className="w-3 h-3 text-neutral-400" />
                <span>{settings.profileLocation || 'India'} (Remote Worldwide)</span>
              </p>
              <p className="flex items-center sm:justify-end gap-1.5">
                <Mail className="w-3 h-3 text-neutral-400" />
                <span>{settings.contactEmail || settings.socialEmail || 'hello@kausar.build'}</span>
              </p>
            </div>
          </div>

          {/* Overview */}
          <div className="space-y-2">
            <h4 className="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400">
              // Summary
            </h4>
            <p className="text-neutral-600 leading-relaxed">
              {settings.heroDescription ||
                'Design engineer specializing in crafting fast, elegant, and high-conversion digital products. I combine refined visual aesthetics with clean engineering to create websites that are thoughtful, enduring, and built to work.'}
            </p>
          </div>

          {/* Experience */}
          <div className="space-y-4">
            <h4 className="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400 flex items-center gap-1.5">
              <Briefcase className="w-3.5 h-3.5" />
              <span>Experience & Selected Roles</span>
            </h4>
            <div className="space-y-4 border-l-2 border-neutral-200 pl-4">
              <div className="space-y-1">
                <div className="flex items-baseline justify-between gap-2">
                  <h5 className="font-display font-bold text-neutral-900 text-sm sm:text-base">
                    Lead Product Designer & Developer
                  </h5>
                  <span className="font-mono text-[11px] text-neutral-400">2022 — Present</span>
                </div>
                <p className="text-neutral-500 text-xs">Independent Studio · Remote</p>
                <p className="text-neutral-600 text-xs leading-relaxed mt-1">
                  Partnering directly with founders and teams to build brand identities, bespoke web applications, and tailor-made CMS platforms with 100% responsiveness and micro-interactions.
                </p>
              </div>

              <div className="space-y-1">
                <div className="flex items-baseline justify-between gap-2">
                  <h5 className="font-display font-bold text-neutral-900 text-sm sm:text-base">
                    Senior UI/UX & Frontend Engineer
                  </h5>
                  <span className="font-mono text-[11px] text-neutral-400">2020 — 2022</span>
                </div>
                <p className="text-neutral-500 text-xs">Digital Agency · Global</p>
                <p className="text-neutral-600 text-xs leading-relaxed mt-1">
                  Led design-to-code implementations for high-traffic SaaS landing pages and design systems. Engineered scalable component architectures and improved Core Web Vitals to 98+.
                </p>
              </div>
            </div>
          </div>

          {/* Core Competencies Grid */}
          <div className="space-y-3">
            <h4 className="font-mono text-xs uppercase tracking-wider font-semibold text-neutral-400 flex items-center gap-1.5">
              <Code className="w-3.5 h-3.5" />
              <span>Core Skills & Technologies</span>
            </h4>
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-2">
              <div className="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                <p className="font-display font-bold text-xs text-neutral-900">UI/UX & Prototyping</p>
                <p className="font-mono text-[10px] text-neutral-500">Figma, Design Systems</p>
              </div>
              <div className="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                <p className="font-display font-bold text-xs text-neutral-900">Frontend Tech</p>
                <p className="font-mono text-[10px] text-neutral-500">React, TypeScript, Tailwind</p>
              </div>
              <div className="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                <p className="font-display font-bold text-xs text-neutral-900">WordPress & PHP</p>
                <p className="font-mono text-[10px] text-neutral-500">Custom Themes, CPTs, REST</p>
              </div>
              <div className="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                <p className="font-display font-bold text-xs text-neutral-900">Performance</p>
                <p className="font-mono text-[10px] text-neutral-500">Vitals 95+, SEO, A11y</p>
              </div>
              <div className="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                <p className="font-display font-bold text-xs text-neutral-900">Motion & Feel</p>
                <p className="font-mono text-[10px] text-neutral-500">Framer Motion, CSS3</p>
              </div>
              <div className="p-2.5 rounded-xl bg-neutral-50 border border-neutral-200/70">
                <p className="font-display font-bold text-xs text-neutral-900">Architecture</p>
                <p className="font-mono text-[10px] text-neutral-500">Clean Code, Git, CI/CD</p>
              </div>
            </div>
          </div>

          {/* Education & Values */}
          <div className="pt-2 border-t border-neutral-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs text-neutral-500">
            <p className="flex items-center gap-1.5">
              <GraduationCap className="w-3.5 h-3.5 text-neutral-400" />
              <span>Bachelor of Technology in Computer Science & Engineering</span>
            </p>
            <p className="font-mono text-[11px] text-emerald-600 font-semibold">
              ● Available for Selected Client Projects
            </p>
          </div>
        </div>

        {/* Footer Actions */}
        <div className="px-6 py-4 border-t border-neutral-100 bg-neutral-50/80 flex items-center justify-between gap-3">
          <a
            href="#book"
            onClick={onClose}
            className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white text-xs sm:text-sm font-medium transition-colors shadow-xs"
          >
            <span>Discuss a Project</span>
          </a>
          <button
            type="button"
            onClick={onClose}
            className="px-4 py-2 rounded-full border border-neutral-200 hover:bg-neutral-100 text-neutral-700 text-xs font-medium transition-colors"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  );
};
