import React from 'react';
import { ProjectItem } from '../types';

interface ProjectsSectionProps {
  projects: ProjectItem[];
  accentColor: string;
}

export const ProjectsSection: React.FC<ProjectsSectionProps> = ({ projects, accentColor }) => {
  return (
    <section id="work" className="space-y-8">
      {/* Header */}
      <div className="space-y-1">
        <span
          className="font-mono text-xs font-semibold uppercase tracking-wider block"
          style={{ color: accentColor }}
        >
          // Design Archive
        </span>
        <h2 className="text-2xl sm:text-3xl lg:text-4xl font-display font-bold text-neutral-900 tracking-tight">
          Digital Product Design
        </h2>
        <p className="text-neutral-500 text-xs sm:text-sm">
          A collection of digital work, visual studies, and website concepts.
        </p>
      </div>

      {/* 2x2 Project Grid */}
      <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
        {projects.map((project) => (
          <article
            key={project.id}
            id={`project-card-${project.id}`}
            className="group bg-white rounded-3xl border border-neutral-200/80 overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 flex flex-col justify-between"
          >
            {/* Image Box: 1:1 Aspect Ratio */}
            <div className="aspect-square w-full overflow-hidden bg-neutral-900 relative block">
              <img
                src={project.image}
                alt={project.title}
                referrerPolicy="no-referrer"
                className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                loading="lazy"
              />
              <div className="absolute top-3 right-3 bg-white/90 backdrop-blur-xs px-2.5 py-1 rounded-full text-[10px] font-mono uppercase text-neutral-800 border border-white/60 shadow-2xs">
                {project.category}
              </div>
            </div>

            {/* Content Details */}
            <div className="p-6 flex-1 flex flex-col justify-between space-y-4">
              <div>
                <h3 className="font-display font-bold text-neutral-900 text-lg leading-snug">
                  {project.title}
                </h3>
                <p className="text-neutral-500 text-xs sm:text-sm mt-1.5 leading-relaxed">
                  {project.description}
                </p>
              </div>

              <div className="pt-4 border-t border-neutral-100 flex items-center justify-between gap-2 text-xs">
                <span className="font-mono text-neutral-400 truncate">
                  {project.year} · {project.tag}
                </span>
                <span className="font-mono text-[10px] text-neutral-500 bg-neutral-100 px-2.5 py-0.5 rounded-full border border-neutral-200/60 shrink-0">
                  {project.category}
                </span>
              </div>
            </div>
          </article>
        ))}
      </div>
    </section>
  );
};
