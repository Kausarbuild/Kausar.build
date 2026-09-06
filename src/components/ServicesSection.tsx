import React, { useState } from 'react';
import { Plus } from 'lucide-react';
import { ServiceItem } from '../types';

interface ServicesSectionProps {
  services: ServiceItem[];
  accentColor: string;
}

export const ServicesSection: React.FC<ServicesSectionProps> = ({ services, accentColor }) => {
  const [openServiceId, setOpenServiceId] = useState<string | null>('serv-1');

  const toggleService = (id: string) => {
    setOpenServiceId(openServiceId === id ? null : id);
  };

  return (
    <section id="services" className="space-y-8">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: accentColor }}
        >
          // Services i provide
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          I can help you with these things
        </h2>
      </div>

      {/* Accordion Rows */}
      <div className="border-t border-neutral-200 divide-y divide-neutral-200/90">
        {services.map((service) => {
          const isOpen = openServiceId === service.id;
          return (
            <div
              key={service.id}
              id={`service-row-${service.id}`}
              className="py-5 sm:py-6 transition-colors group cursor-pointer"
              onClick={() => toggleService(service.id)}
            >
              <div className="flex items-center justify-between gap-3">
                <div className="flex items-center gap-3 sm:gap-6 min-w-0">
                  <span className="font-mono text-xs sm:text-sm text-neutral-400 w-6 sm:w-8 shrink-0">
                    {service.number}
                  </span>
                  <h3 className="font-display font-semibold text-neutral-900 text-sm sm:text-lg lg:text-xl group-hover:text-neutral-700 transition-colors">
                    {service.title}
                  </h3>
                </div>
                <div
                  className={`w-7 h-7 rounded-full border border-neutral-200 flex items-center justify-center text-neutral-400 group-hover:border-neutral-400 transition-all duration-300 shrink-0 ${
                    isOpen ? 'rotate-45 text-neutral-900 border-neutral-900' : ''
                  }`}
                >
                  <Plus className="w-4 h-4" />
                </div>
              </div>

              {isOpen && (
                <div className="mt-2.5 pl-9 sm:pl-14 max-w-2xl animate-in fade-in duration-200">
                  <p className="text-xs sm:text-sm text-neutral-600 leading-relaxed font-normal">
                    {service.description}
                  </p>
                </div>
              )}
            </div>
          );
        })}
      </div>
    </section>
  );
};
