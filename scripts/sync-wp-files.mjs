import fs from 'fs';
import path from 'path';

const baseDir = path.resolve('wordpress-theme');

function getCategory(relPath) {
  if (relPath.startsWith('template-parts') || relPath.startsWith('page-') || relPath.startsWith('template-')) {
    return 'template';
  }
  if (relPath.startsWith('inc/')) {
    return 'include';
  }
  if (relPath.startsWith('assets/')) {
    return 'asset';
  }
  return 'core';
}

function getDescription(relPath) {
  if (relPath === 'style.css') return 'Theme stylesheet & WordPress theme registration header';
  if (relPath === 'functions.php') return 'Theme setup, asset enqueues, scripts, and Elementor integration';
  if (relPath === 'front-page.php') return 'Main homepage template assembling all portfolio sections';
  if (relPath === 'header.php') return 'Global site header template';
  if (relPath === 'footer.php') return 'Global site footer template';
  if (relPath === 'README.md') return 'Elementor & WordPress installation and setup instructions';
  if (relPath.includes('class-widget-booking.php')) return 'Elementor Widget: Direct Contact (WhatsApp, Instagram, Call Me)';
  if (relPath.includes('class-widget-hero.php')) return 'Elementor Widget: Hero section with live status pill and CTAs';
  if (relPath.includes('class-widget-about.php')) return 'Elementor Widget: Interactive ID Badge, bio, and experience timeline';
  if (relPath.includes('class-widget-projects.php')) return 'Elementor Widget: Featured projects portfolio grid';
  if (relPath.includes('class-widget-services.php')) return 'Elementor Widget: Services accordion with deliverables';
  if (relPath.includes('class-widget-process.php')) return 'Elementor Widget: 4-step creative workflow process';
  if (relPath.includes('class-widget-testimonials.php')) return 'Elementor Widget: Testimonials slider with ratings and avatars';
  if (relPath.includes('class-widget-header.php')) return 'Elementor Widget: Floating navigation bar with status and actions';
  if (relPath.includes('class-widget-footer.php')) return 'Elementor Widget: Footer signature, social links, and copyright';
  if (relPath.includes('class-widget-cv-modal.php')) return 'Elementor Widget: Interactive CV modal with experience tabs';
  if (relPath.includes('class-elementor-manager.php')) return 'Elementor Manager: Widget and category registration';
  if (relPath.includes('section-booking.php')) return 'Direct contact section with WhatsApp, Instagram, and Call Me';
  return `WordPress theme file: ${relPath}`;
}

const files = [];

function walk(dir) {
  const entries = fs.readdirSync(dir, { withFileTypes: true });
  for (const entry of entries) {
    const fullPath = path.join(dir, entry.name);
    if (entry.isDirectory()) {
      walk(fullPath);
    } else {
      const ext = path.extname(entry.name).toLowerCase();
      if (['.jpg', '.jpeg', '.png', '.gif', '.webp'].includes(ext)) {
        continue; // Binary image files handled separately
      }
      const relPath = path.relative(baseDir, fullPath);
      const content = fs.readFileSync(fullPath, 'utf8');
      files.push({
        path: relPath,
        filename: entry.name,
        category: getCategory(relPath),
        description: getDescription(relPath),
        content,
      });
    }
  }
}

walk(baseDir);

// Sort files alphabetically by path
files.sort((a, b) => a.path.localeCompare(b.path));

const fileContent = `// Auto-generated synchronized WordPress theme files definition
export interface ThemeFile {
  path: string;
  filename: string;
  category: 'core' | 'template' | 'include' | 'asset';
  description: string;
  content: string;
}

export const wpThemeFiles: ThemeFile[] = ${JSON.stringify(files, null, 2)};
`;

fs.writeFileSync(path.resolve('src/data/wpThemeFiles.ts'), fileContent, 'utf8');
console.log(`Successfully synced ${files.length} WordPress files to src/data/wpThemeFiles.ts`);
