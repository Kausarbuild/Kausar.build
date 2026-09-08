const fs = require('fs');
const path = require('path');

const svgDir = path.resolve(__dirname, '../public/assets/projects');
const outputFile = path.resolve(__dirname, '../src/data/projectSvgs.ts');

const svgs = {};
const files = [
  'project-1-one-job.svg',
  'project-2-trust-business.svg',
  'project-3-convert-dashboard.svg',
  'project-4-premium-perform.svg',
];

for (const f of files) {
  const filePath = path.join(svgDir, f);
  if (fs.existsSync(filePath)) {
    svgs[f] = fs.readFileSync(filePath, 'utf8');
  }
}

const content = `// Embedded SVG project visual assets for offline and zero-latency packaging
export const projectSvgs: Record<string, string> = ${JSON.stringify(svgs, null, 2)};
`;

fs.writeFileSync(outputFile, content, 'utf8');
console.log('Synchronized SVG assets to', outputFile);
