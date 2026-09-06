import React, { useState } from 'react';
import { ChevronLeft, ChevronRight } from 'lucide-react';
import { TestimonialItem } from '../types';

interface TestimonialsSectionProps {
  testimonials: TestimonialItem[];
  accentColor: string;
}

export const TestimonialsSection: React.FC<TestimonialsSectionProps> = ({
  testimonials,
  accentColor,
}) => {
  const [currentIndex, setCurrentIndex] = useState(0);

  const handlePrev = () => {
    setCurrentIndex((prev) => (prev === 0 ? testimonials.length - 1 : prev - 1));
  };

  const handleNext = () => {
    setCurrentIndex((prev) => (prev === testimonials.length - 1 ? 0 : prev + 1));
  };

  const current = testimonials[currentIndex] || testimonials[0];

  return (
    <section id="testimonials" className="space-y-8">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: accentColor }}
        >
          // good words
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          some good words from people I've worked with
        </h2>
      </div>

      {/* Main Testimonial Card */}
      <div className="bg-white rounded-3xl border border-neutral-200/80 p-6 sm:p-10 lg:p-12 shadow-soft relative overflow-hidden">
        {/* Subtle dot pattern background */}
        <div className="absolute inset-0 bg-grid-dots opacity-30 pointer-events-none" />

        <div className="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center relative z-10">
          {/* Left: Stacked polaroids avatar */}
          <div className="md:col-span-4 flex items-center justify-center">
            <div className="relative w-36 h-36 sm:w-44 sm:h-44 select-none">
              <div className="absolute inset-0 bg-neutral-100 rounded-2xl rotate-6 border border-neutral-200 shadow-2xs" />
              <div className="absolute inset-0 bg-neutral-200 rounded-2xl -rotate-4 border border-neutral-200 shadow-xs" />
              <div className="absolute inset-0 rounded-2xl overflow-hidden shadow-md border-3 border-white">
                <img
                  src={current.avatar}
                  alt={current.name}
                  referrerPolicy="no-referrer"
                  className="w-full h-full object-cover"
                />
              </div>
            </div>
          </div>

          {/* Right: Quote, Author info, and Next/Prev Controls */}
          <div className="md:col-span-8 space-y-5">
            <span
              className="text-5xl font-serif font-black leading-none block select-none -mb-3"
              style={{ color: accentColor }}
            >
              “
            </span>

            <p className="text-base sm:text-lg lg:text-xl text-neutral-800 font-medium leading-relaxed">
              {current.quote}
            </p>

            <div className="pt-3 flex flex-wrap sm:flex-nowrap items-center justify-between gap-3 border-t border-neutral-100">
              <div className="min-w-0 flex-1">
                <p className="font-display font-bold text-neutral-900 text-sm sm:text-base truncate">
                  {current.name}
                </p>
                <p className="text-neutral-500 text-xs sm:text-sm font-mono truncate">
                  {current.role}, {current.company}
                </p>
              </div>

              {/* Slider Arrow Controls */}
              <div className="flex items-center gap-2 shrink-0">
                <button
                  type="button"
                  onClick={handlePrev}
                  className="w-9 h-9 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-neutral-600 hover:text-neutral-900 transition-colors shadow-2xs"
                  aria-label="Previous testimonial"
                >
                  <ChevronLeft className="w-4 h-4" />
                </button>
                <button
                  type="button"
                  onClick={handleNext}
                  className="w-9 h-9 rounded-full border border-neutral-200 hover:border-neutral-400 flex items-center justify-center text-neutral-600 hover:text-neutral-900 transition-colors shadow-2xs"
                  aria-label="Next testimonial"
                >
                  <ChevronRight className="w-4 h-4" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
