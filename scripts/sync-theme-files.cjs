const fs = require('fs');
const path = require('path');

const themeDir = path.resolve(__dirname, '../wordpress-theme');
const outputFile = path.resolve(__dirname, '../src/data/wpThemeFiles.ts');
const publicSvgDir = path.resolve(__dirname, '../public/assets/projects');

function getCategory(relPath) {
  if (relPath.startsWith('assets/')) return 'asset';
  if (relPath.startsWith('inc/')) return 'include';
  if (relPath.startsWith('template-parts/')) return 'template';
  if (['style.css', 'functions.php', 'index.php'].includes(relPath)) return 'core';
  return 'template';
}

function getDescription(relPath) {
  const map = {
    'style.css': 'Theme stylesheet & WordPress theme registration header',
    'functions.php': 'Theme setup, asset enqueues, scripts, and AJAX endpoints',
    'index.php': 'Universal fallback & main post loop template (renders front page if homepage)',
    'front-page.php': 'Homepage template rendering all reference sections modularly',
    'header.php': 'Document head, Google Fonts, Tailwind Play CDN, and floating navigation',
    'footer.php': 'Footer template with social icons, wax seal, handwriting signature & copyright',
    'page.php': 'Standard single page template with container styling',
    'single.php': 'Single post & project article detail template',
    '404.php': '404 Not Found error page template',
    'assets/css/main.css': 'Base styling, dot patterns, animations, and lanyard physics',
    'assets/js/main.js': 'Lanyard 3D tilt, accordion logic, testimonial slider, booking wizard',
    'template-parts/hero/section-hero.php': 'Hero section with mobile-first lanyard pass and interactive greeting',
    'template-parts/about/section-about.php': 'Bento about grid with 1:1 square workstation & music cards',
    'template-parts/projects/section-projects.php': '2x2 project grid with SVG fallback and hover overlays',
    'template-parts/services/section-services.php': 'Services accordion (01 to 05) with deliverables pills',
    'template-parts/testimonials/section-testimonials.php': 'Client testimonials carousel with next/previous controls',
    'template-parts/process/section-process.php': '4-step approach, verified persona ID card, and retainer package',
    'template-parts/booking/section-booking.php': 'Consultation booking section with 3-step wizard and status badge',
    'inc/image-helpers.php': 'Helper functions for resolving WordPress dynamic media and fallback image URLs',
    'inc/custom-post-types.php': 'Registers Projects, Services, Testimonials, and Booking CPTs',
    'inc/custom-fields.php': 'Custom meta boxes and media fields for homepage, projects, and testimonials',
    'inc/theme-settings.php': 'WordPress Customizer image controls and panels for brand, colors, and content',
    'inc/demo-importer.php': 'Auto-seeds all demo projects, services, and testimonials upon activation',
    'assets/js/admin-media.js': 'Native WordPress media uploader modal integration for image meta boxes',
    'assets/css/admin.css': 'Admin dashboard styling for media management meta boxes and image previews',
    'README.md': 'Theme installation instructions, file structure, and image customization documentation'
  };
  return map[relPath] || `Theme file: ${relPath}`;
}

function walk(dir, rootDir, fileList = []) {
  const files = fs.readdirSync(dir);
  for (const file of files) {
    const fullPath = path.join(dir, file);
    const relPath = path.relative(rootDir, fullPath).replace(/\\/g, '/');
    const stat = fs.statSync(fullPath);
    if (stat.isDirectory()) {
      walk(fullPath, rootDir, fileList);
    } else {
      fileList.push(relPath);
    }
  }
  return fileList;
}

const allRelPaths = walk(themeDir, themeDir);

// Sort so core files come first
const order = ['style.css', 'functions.php', 'index.php', 'front-page.php', 'header.php', 'footer.php', 'page.php', 'single.php', '404.php'];
allRelPaths.sort((a, b) => {
  const idxA = order.indexOf(a);
  const idxB = order.indexOf(b);
  if (idxA !== -1 && idxB !== -1) return idxA - idxB;
  if (idxA !== -1) return -1;
  if (idxB !== -1) return 1;
  return a.localeCompare(b);
});

const themeFiles = allRelPaths.map((relPath) => {
  const content = fs.readFileSync(path.join(themeDir, relPath), 'utf8');
  return {
    path: relPath,
    filename: path.basename(relPath),
    category: getCategory(relPath),
    description: getDescription(relPath),
    content: content,
  };
});

// Also include README.md if not present
if (!themeFiles.find(f => f.path === 'README.md')) {
  themeFiles.push({
    path: 'README.md',
    filename: 'README.md',
    category: 'core',
    description: 'Documentation & quickstart guide for the Studio Build WordPress theme',
    content: `# Studio Build - WordPress Portfolio Theme

A precision-engineered, single-page portfolio theme for WordPress matching the high-craft React experience with 100% visual fidelity.

## Installation
1. Download the \`studio-build.zip\` package from the web app.
2. In your WordPress Admin Dashboard, navigate to **Appearance > Themes > Add New > Upload Theme**.
3. Choose \`studio-build.zip\` and click **Install Now**.
4. Click **Activate**.

## Features
- **Zero-config Demo Seeder**: Automatically generates sample projects, services, testimonials, and booking services upon activation.
- **Direct Image Replacement**: Replace EVERY image directly from the WordPress dashboard using the native Media Library without touching any code!
  1. **Appearance > Customize > 🖼️ All Website Images & Media**: One-click media pickers for Hero lanyard badge, About tall portrait, Spotify album cover, Workstation rig, Profile verification avatar, Consultation portrait, Wax seal, and Signature.
  2. **Page Edit Screen (Meta Boxes)**: Direct visual image uploader meta boxes with instant thumbnail preview, "Select Image", and "Remove" buttons.
  3. **Projects & Testimonials (Custom Post Types)**: Custom artwork and client avatars directly editable from the post edit sidebar.
- **Tailwind CSS Engine**: Embedded Play CDN ensures responsive layouts, shadows, and typography work immediately with zero build step.
- **3D Interactive Lanyard Badge**: Physics-based cursor and gyroscope tilt on desktop and mobile.
- **Interactive Consultation Wizard**: 3-step booking experience with AJAX endpoints.
- **Live Customizer**: Real-time preview for all images, texts, and color accents.
`
  });
}

// Generate the TypeScript file
const tsContent = `// Auto-generated synchronized WordPress theme files definition
export interface ThemeFile {
  path: string;
  filename: string;
  category: 'core' | 'template' | 'include' | 'asset';
  description: string;
  content: string;
}

export const wpThemeFiles: ThemeFile[] = ${JSON.stringify(themeFiles, null, 2)};
`;

fs.writeFileSync(outputFile, tsContent, 'utf8');
console.log(`Successfully wrote ${themeFiles.length} files to ${outputFile}`);
