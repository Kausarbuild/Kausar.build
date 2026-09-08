import React, { useState, useEffect, useRef } from 'react';
import { FileText, ArrowDown } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';
import { ThemeSettings } from '../types';

interface HeroSectionProps {
  settings: ThemeSettings;
  onOpenCV?: () => void;
}

const GREETING_LANGUAGES = ['Hello', 'Bonjour', 'Hola', 'Ciao', 'Namaste'];

export const HeroSection: React.FC<HeroSectionProps> = ({ settings, onOpenCV }) => {
  const [langIndex, setLangIndex] = useState(0);

  useEffect(() => {
    const timer = setInterval(() => {
      setLangIndex((prev) => (prev + 1) % GREETING_LANGUAGES.length);
    }, 2500);
    return () => clearInterval(timer);
  }, []);

  const cardRef = useRef<HTMLDivElement>(null);
  const [transformStyle, setTransformStyle] = useState<string>(
    'perspective(700px) rotateX(0deg) rotateY(0deg)'
  );

  // Derive the trailing text (e.g. ", I’m Kausar.") while keeping only "Hello" cycling
  const getGreetingSuffix = () => {
    const text = (settings.heroGreeting || '').trim();
    if (text.toLowerCase() === 'hello' || text.toLowerCase() === 'hi') {
      return '';
    }
    const stripped = text.replace(/^(Hello|Hi|Hey|Bonjour|Hola|Ciao|Namaste)[,\s]*/i, '').trim();
    if (!stripped) {
      return `, I’m ${settings.profileName || 'Kausar'}.`;
    }
    return stripped.startsWith(',') ? stripped : `, ${stripped}`;
  };

  const suffix = getGreetingSuffix();

  const handleMouseMove = (e: React.MouseEvent<HTMLDivElement>) => {
    if (!cardRef.current) return;
    const rect = cardRef.current.getBoundingClientRect();
    const x = e.clientX - rect.left - rect.width / 2;
    const y = e.clientY - rect.top - rect.height / 2;
    const tiltX = (y / (rect.height / 2)) * -12;
    const tiltY = (x / (rect.width / 2)) * 14;
    setTransformStyle(
      `perspective(700px) rotateX(${tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg) translateY(-4px)`
    );
  };

  const handleMouseLeave = () => {
    setTransformStyle('perspective(700px) rotateX(0deg) rotateY(0deg) translateY(0px)');
  };

  return (
    <section id="hero" className="relative pt-8 sm:pt-14">
      <div className="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-14 items-center">
        {/* Left Column: Greeting, Headline & Bio (order-2 on mobile, order-1 on desktop) */}
        <div id="hero-content" className="order-2 md:order-1 md:col-span-7 lg:col-span-8 space-y-6">
          {/* Status Badge */}
          <div
            id="hero-status-pill"
            className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-mono tracking-tight shadow-2xs"
          >
            <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
            <span>{settings.statusBadge}</span>
          </div>

          {/* Headline cluster */}
          <div className="space-y-1.5">
            <h1
              id="hero-greeting-heading"
              className="text-3xl sm:text-5xl lg:text-6xl font-display font-extrabold tracking-tight text-neutral-900 leading-[1.14]"
            >
              <span className="inline-block relative overflow-hidden align-bottom py-1 -my-1">
                <AnimatePresence mode="wait" initial={false}>
                  <motion.span
                    key={GREETING_LANGUAGES[langIndex]}
                    initial={{ y: 28, opacity: 0, filter: 'blur(3px)' }}
                    animate={{ y: 0, opacity: 1, filter: 'blur(0px)' }}
                    exit={{ y: -28, opacity: 0, filter: 'blur(3px)' }}
                    transition={{ duration: 0.38, ease: [0.16, 1, 0.3, 1] }}
                    className="inline-block text-neutral-900"
                  >
                    {GREETING_LANGUAGES[langIndex]}
                  </motion.span>
                </AnimatePresence>
              </span>
              {suffix && <span className="text-neutral-900">{suffix}</span>}
            </h1>
            <p
              id="hero-headline-sub"
              className="text-xl sm:text-3xl lg:text-4xl font-display font-semibold text-neutral-400 tracking-tight leading-snug"
            >
              {settings.heroHeadline}
            </p>
          </div>

          {/* Description */}
          <p
            id="hero-bio-description"
            className="text-neutral-600 text-sm sm:text-base lg:text-lg leading-relaxed max-w-xl font-normal"
          >
            {settings.heroDescription}
          </p>

          {/* CTAs */}
          <div id="hero-cta-buttons" className="flex flex-wrap items-center gap-3 pt-2">
            {/* Download CV */}
            <a
              id="btn-download-cv"
              href={settings.cvUrl || '/assets/docs/kausar-cv.pdf'}
              download={settings.cvUrl?.endsWith('.pdf') ? 'Kausar-CV.pdf' : undefined}
              onClick={(e) => {
                if (!settings.cvUrl || settings.cvUrl.startsWith('#')) {
                  e.preventDefault();
                  if (onOpenCV) onOpenCV();
                }
              }}
              target={settings.cvUrl && !settings.cvUrl.startsWith('#') ? '_blank' : undefined}
              rel={settings.cvUrl && !settings.cvUrl.startsWith('#') ? 'noreferrer' : undefined}
              className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-neutral-300 text-neutral-800 text-xs sm:text-sm font-medium hover:border-neutral-400 hover:bg-neutral-50 transition-all shadow-xs cursor-pointer"
            >
              <FileText className="w-4 h-4 text-neutral-500" />
              <span>Download CV</span>
            </a>

            {/* Let's connect */}
            <a
              id="btn-hero-connect"
              href="#book"
              className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 text-white text-xs sm:text-sm font-medium hover:bg-neutral-800 transition-all shadow-sm"
            >
              <span
                className="w-2 h-2 rounded-full"
                style={{ backgroundColor: settings.accentColor }}
              />
              <span>Let's connect</span>
            </a>
          </div>
        </div>

        {/* Right Column: Physical Hanging Lanyard Pass Graphic (order-1 on mobile so badge is first screen) */}
        <div
          id="hero-lanyard-stage"
          className="order-1 md:order-2 md:col-span-5 lg:col-span-4 flex justify-center md:justify-end select-none pt-12 sm:pt-16 md:pt-0 relative overflow-visible"
        >
          <div
            ref={cardRef}
            onMouseMove={handleMouseMove}
            onMouseLeave={handleMouseLeave}
            className="relative w-52 sm:w-60 flex flex-col items-center cursor-grab active:cursor-grabbing transition-transform duration-150 ease-out"
            style={{ transform: transformStyle }}
          >
            {/* Realistic Lanyard Strap going upwards */}
            <div className="absolute -top-36 w-12 h-36 lanyard-strap rounded-b shadow-inner z-10 opacity-95">
              <div className="w-full h-full bg-gradient-to-b from-transparent via-transparent to-black/30" />
            </div>

            {/* Hanging Clip Hardware */}
            <div className="absolute -top-7 w-14 h-7 bg-neutral-800 rounded-t-md flex items-center justify-center z-20 border-b border-neutral-700 shadow-md">
              <div className="w-7 h-2 bg-neutral-400 rounded-xs" />
            </div>
            {/* Metallic Loop Hook */}
            <div className="absolute -top-2.5 w-9 h-3.5 bg-neutral-300 rounded-xs z-20 shadow-sm border border-neutral-400" />

            {/* Lanyard Pass Badge Card */}
            <div
              id="hero-lanyard-badge"
              className="w-full bg-white rounded-3xl p-2.5 shadow-2xl border border-neutral-200/90 relative z-20"
            >
              {/* Slot Hole for hook */}
              <div className="w-10 h-1.5 bg-neutral-900 mx-auto rounded-full mb-2 shadow-inner" />

              {/* Badge Image Frame */}
              <div className="w-full aspect-[4/5] rounded-2xl overflow-hidden bg-neutral-900 relative shadow-md flex flex-col justify-between">
                <img
                  src={settings.heroImage}
                  alt={settings.badgeName}
                  className="w-full h-full object-cover pointer-events-none"
                  loading="eager"
                />
                {/* Understated Personal Design Detail */}
                <div className="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-3 pt-6 text-white text-left">
                  <p className="font-display font-bold text-xs tracking-wider uppercase">
                    {settings.badgeName || 'KAUSAR'}
                  </p>
                  <p className="text-[10px] font-mono text-neutral-300 tracking-tight">
                    {settings.badgeRole || 'DESIGN + DEVELOPMENT'}
                  </p>
                  <p className="text-[9px] font-mono text-neutral-400 mt-0.5">
                    {settings.badgePassId || 'BUILD #01'}
                  </p>
                </div>
              </div>
            </div>

            {/* Soft Ambient Cast Shadow */}
            <div className="w-48 h-8 bg-black/25 blur-xl rounded-full absolute -bottom-5 z-0 pointer-events-none" />
          </div>
        </div>
      </div>
    </section>
  );
};
