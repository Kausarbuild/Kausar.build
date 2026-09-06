import React, { useState } from 'react';
import { ArrowRight, Check, RotateCcw, Calendar, Github, Linkedin, Instagram, Twitter, Mail } from 'lucide-react';
import { BookingConsultationService, ThemeSettings } from '../types';

interface BookingSectionProps {
  services: BookingConsultationService[];
  settings: ThemeSettings;
}

export const BookingSection: React.FC<BookingSectionProps> = ({ services, settings }) => {
  const [currentStep, setCurrentStep] = useState<1 | 2 | 3>(1);
  const [selectedServiceId, setSelectedServiceId] = useState<string>(services[0]?.id || 'booking-1');
  const [clientName, setClientName] = useState('');
  const [clientEmail, setClientEmail] = useState('');
  const [clientNotes, setClientNotes] = useState('');
  const [preferredDateTime, setPreferredDateTime] = useState('');
  const [errorMessage, setErrorMessage] = useState('');

  const selectedService = services.find((s) => s.id === selectedServiceId) || services[0];

  const renderPrice = (price: number | string) => {
    if (typeof price === 'string') {
      return price.toLowerCase() === 'free' || price === '0' || !price ? 'Free' : price;
    }
    return price === 0 ? 'Free' : `$${price}`;
  };

  const handleNext = (e: React.FormEvent) => {
    e.preventDefault();
    setErrorMessage('');

    if (currentStep === 1) {
      setCurrentStep(2);
    } else if (currentStep === 2) {
      if (!clientName.trim() || !clientEmail.trim()) {
        setErrorMessage('Please enter both your name and a valid email address.');
        return;
      }
      setCurrentStep(3);
    }
  };

  const handleReset = () => {
    setCurrentStep(1);
    setClientName('');
    setClientEmail('');
    setClientNotes('');
    setPreferredDateTime('');
    setErrorMessage('');
  };

  // Only show social icons if URL is set and non-empty
  const hasSocials = Boolean(
    settings.socialGitHub ||
    settings.socialLinkedIn ||
    settings.socialInstagram ||
    settings.socialTwitter ||
    (settings.socialEmail && settings.socialEmail !== 'mailto:')
  );

  return (
    <section id="book" className="space-y-8">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: settings.accentColor }}
        >
          // Consultation
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          Book a conversation
        </h2>
        <p className="text-neutral-600 text-xs sm:text-sm max-w-xl">
          Pick a topic, select a time that suits you, and let’s talk through your project.
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

        {/* Right: 3-Step Interactive Booking Card */}
        <div
          id="booking-interactive-card"
          className="lg:col-span-7 bg-white rounded-3xl border border-neutral-200/80 shadow-soft p-5 sm:p-7 flex flex-col justify-between"
        >
          <form onSubmit={handleNext} className="space-y-5">
            {/* Step Header with rich terracotta background */}
            <div
              className="p-4 rounded-2xl flex items-center justify-between text-white transition-colors"
              style={{
                backgroundColor: settings.accentColor,
              }}
            >
              <div>
                <h3 className="font-display font-bold text-base">
                  {currentStep === 1
                    ? 'Select Consultation Topic'
                    : currentStep === 2
                    ? 'Contact & Details'
                    : 'Request Confirmed'}
                </h3>
                <p className="text-[11px] text-orange-100 font-mono">
                  Step {currentStep} of 3
                </p>
              </div>

              {/* Progress Dots */}
              <div className="flex items-center gap-1.5">
                <span
                  className={`w-2 h-2 rounded-full transition-all ${
                    currentStep === 1 ? 'bg-white scale-110' : 'bg-white/40'
                  }`}
                />
                <span
                  className={`w-2 h-2 rounded-full transition-all ${
                    currentStep === 2 ? 'bg-white scale-110' : 'bg-white/40'
                  }`}
                />
                <span
                  className={`w-2 h-2 rounded-full transition-all ${
                    currentStep === 3 ? 'bg-white scale-110' : 'bg-white/40'
                  }`}
                />
              </div>
            </div>

            {/* Step 1: Radio Selection */}
            {currentStep === 1 && (
              <div className="space-y-3 animate-in fade-in duration-200">
                <fieldset className="space-y-3">
                  <legend className="sr-only">Choose consultation option</legend>
                  {services.map((serv) => {
                    const isSelected = selectedServiceId === serv.id;
                    return (
                      <label
                        key={serv.id}
                        className={`flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-4 p-3.5 sm:p-4 rounded-2xl border transition-all cursor-pointer ${
                          isSelected
                            ? 'border-orange-500 bg-orange-50/40 shadow-xs ring-1 ring-orange-500/20'
                            : 'border-neutral-200 bg-neutral-50/60 hover:bg-neutral-100/70 hover:border-neutral-300'
                        }`}
                      >
                        <div className="flex items-start gap-3 min-w-0">
                          <input
                            type="radio"
                            name="booking_service"
                            checked={isSelected}
                            onChange={() => setSelectedServiceId(serv.id)}
                            className="mt-0.5 text-orange-600 focus:ring-orange-500 shrink-0"
                          />
                          <div className="min-w-0">
                            <p className="text-xs sm:text-sm font-semibold text-neutral-900 leading-snug">
                              {serv.title}
                            </p>
                            <p className="text-[11px] text-neutral-500 font-mono mt-0.5 leading-normal">
                              {serv.duration} · {serv.description}
                            </p>
                          </div>
                        </div>
                        <span className="font-display font-bold text-xs sm:text-sm text-neutral-900 shrink-0 self-end sm:self-center pl-7 sm:pl-2">
                          {renderPrice(serv.price)}
                        </span>
                      </label>
                    );
                  })}
                </fieldset>
              </div>
            )}

            {/* Step 2: Name & Email & Details inputs */}
            {currentStep === 2 && (
              <div className="space-y-3 animate-in fade-in duration-200">
                <div className="p-3 bg-neutral-50 rounded-xl border border-neutral-200/80 text-xs text-neutral-600 flex justify-between items-center font-mono">
                  <span>Selected: <strong>{selectedService.title}</strong></span>
                  <span className="font-bold text-neutral-900">{renderPrice(selectedService.price)}</span>
                </div>

                <div className="space-y-3">
                  <div>
                    <label className="block text-[11px] font-mono text-neutral-600 mb-1">
                      Name *
                    </label>
                    <input
                      type="text"
                      required
                      value={clientName}
                      onChange={(e) => setClientName(e.target.value)}
                      placeholder="Your name"
                      className="w-full text-xs rounded-xl border border-neutral-300 bg-white p-2.5 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-hidden"
                    />
                  </div>
                  <div>
                    <label className="block text-[11px] font-mono text-neutral-600 mb-1">
                      Email *
                    </label>
                    <input
                      type="email"
                      required
                      value={clientEmail}
                      onChange={(e) => setClientEmail(e.target.value)}
                      placeholder="your@email.com"
                      className="w-full text-xs rounded-xl border border-neutral-300 bg-white p-2.5 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-hidden"
                    />
                  </div>
                  <div>
                    <label className="block text-[11px] font-mono text-neutral-600 mb-1">
                      Project Details
                    </label>
                    <textarea
                      rows={2}
                      value={clientNotes}
                      onChange={(e) => setClientNotes(e.target.value)}
                      placeholder="Tell me briefly about what you’d like to build..."
                      className="w-full text-xs rounded-xl border border-neutral-300 bg-white p-2.5 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-hidden"
                    />
                  </div>
                  <div>
                    <label className="block text-[11px] font-mono text-neutral-600 mb-1">
                      Preferred Date & Time
                    </label>
                    <input
                      type="text"
                      value={preferredDateTime}
                      onChange={(e) => setPreferredDateTime(e.target.value)}
                      placeholder="e.g. Next Tuesday morning or afternoon"
                      className="w-full text-xs rounded-xl border border-neutral-300 bg-white p-2.5 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-hidden"
                    />
                  </div>
                </div>

                {errorMessage && (
                  <p className="text-xs text-red-600 font-medium">{errorMessage}</p>
                )}
              </div>
            )}

            {/* Step 3: Confirmation Summary */}
            {currentStep === 3 && (
              <div className="text-center py-5 space-y-4 animate-in zoom-in-95 duration-200">
                <div className="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-xl shadow-xs">
                  <Check className="w-6 h-6" />
                </div>
                <div className="space-y-1">
                  <h4 className="font-display font-bold text-base text-neutral-900">
                    Conversation Request Sent
                  </h4>
                  <p className="text-xs text-neutral-500 max-w-sm mx-auto leading-relaxed">
                    Thank you, <strong className="text-neutral-800">{clientName}</strong>. Your
                    request for <strong>{selectedService.title}</strong> has been received. I'll
                    be in touch at <strong className="text-neutral-800">{clientEmail}</strong>.
                  </p>
                </div>

                <div className="p-3 bg-neutral-50 rounded-2xl border border-neutral-100 text-left text-[11px] space-y-1 font-mono text-neutral-600 max-w-xs mx-auto">
                  <div className="flex justify-between">
                    <span>Topic:</span>
                    <span className="text-neutral-900 font-semibold">{selectedService.title}</span>
                  </div>
                  <div className="flex justify-between">
                    <span>Duration:</span>
                    <span>{selectedService.duration}</span>
                  </div>
                  <div className="flex justify-between">
                    <span>Fee:</span>
                    <span className="text-neutral-900 font-bold">{renderPrice(selectedService.price)}</span>
                  </div>
                </div>

                <button
                  type="button"
                  onClick={handleReset}
                  className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-neutral-100 hover:bg-neutral-200 text-neutral-700 text-xs font-mono transition-colors"
                >
                  <RotateCcw className="w-3.5 h-3.5" /> Book Another Session
                </button>
              </div>
            )}

            {/* Action Buttons */}
            {currentStep < 3 && (
              <div className="pt-4 flex items-center justify-between border-t border-neutral-100">
                <div className="text-[11px] text-neutral-400 font-mono">
                  Straightforward & direct communication
                </div>
                {currentStep === 1 ? (
                  <button
                    type="submit"
                    className="w-10 h-10 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white flex items-center justify-center shadow-sm transition-all group shrink-0"
                    aria-label="Proceed to contact details"
                  >
                    <ArrowRight className="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" />
                  </button>
                ) : (
                  <button
                    type="submit"
                    className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 hover:bg-neutral-800 text-white text-xs sm:text-sm font-medium shadow-sm transition-all group shrink-0"
                  >
                    <span>Request time</span>
                    <ArrowRight className="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" />
                  </button>
                )}
              </div>
            )}
          </form>
        </div>
      </div>
    </section>
  );
};
