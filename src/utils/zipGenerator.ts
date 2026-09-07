import JSZip from 'jszip';
import { wpThemeFiles } from '../data/wpThemeFiles';

export async function generateWordPressThemeZip(): Promise<Blob> {
  const zip = new JSZip();

  // Root theme folder inside the ZIP so uploading to WordPress works directly
  const themeFolder = zip.folder('studio-build');

  if (!themeFolder) {
    throw new Error('Could not initialize ZIP folder');
  }

  // Populate theme files
  for (const file of wpThemeFiles) {
    themeFolder.file(file.path, file.content);
  }

  // Generate a high-resolution screenshot.png for the WordPress Appearance > Themes preview
  try {
    if (typeof document !== 'undefined') {
      const canvas = document.createElement('canvas');
      canvas.width = 1200;
      canvas.height = 900;
      const ctx = canvas.getContext('2d');
      if (ctx) {
        // Canvas background
        ctx.fillStyle = '#FAF9F6';
        ctx.fillRect(0, 0, 1200, 900);

        // Header bar
        ctx.fillStyle = '#FFFFFF';
        ctx.fillRect(0, 0, 1200, 90);
        ctx.strokeStyle = '#E5E7EB';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(0, 90);
        ctx.lineTo(1200, 90);
        ctx.stroke();

        // Brand
        ctx.fillStyle = '#121212';
        ctx.font = 'bold 32px sans-serif';
        ctx.fillText('kausar.build', 70, 56);

        // Availability pill
        ctx.fillStyle = '#DCFCE7';
        ctx.fillRect(940, 30, 190, 32);
        ctx.fillStyle = '#15803D';
        ctx.font = 'bold 13px monospace';
        ctx.fillText('● AVAILABLE NOW', 965, 51);

        // Hero headline
        ctx.fillStyle = '#121212';
        ctx.font = 'bold 52px sans-serif';
        ctx.fillText('Design Engineer & UI Architect', 70, 185);

        ctx.fillStyle = '#6B7280';
        ctx.font = '22px sans-serif';
        ctx.fillText('Precision-crafted portfolio theme with Customizer panels & booking engine', 70, 230);

        // Accent tag
        ctx.fillStyle = '#E8590C';
        ctx.fillRect(70, 265, 140, 30);
        ctx.fillStyle = '#FFFFFF';
        ctx.font = 'bold 13px monospace';
        ctx.fillText('WORDPRESS THEME', 82, 285);

        // Bento Cards preview
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle = '#E5E7EB';
        ctx.lineWidth = 2;

        // Card 1
        ctx.fillRect(70, 330, 510, 500);
        ctx.strokeRect(70, 330, 510, 500);
        ctx.fillStyle = '#121212';
        ctx.font = 'bold 24px sans-serif';
        ctx.fillText('Interactive Bento Grid', 100, 380);
        ctx.fillStyle = '#6B7280';
        ctx.font = '16px sans-serif';
        ctx.fillText('Spotify Player · Workstation Rig · Travel Snapshots', 100, 415);

        // Card 2
        ctx.fillStyle = '#FFFFFF';
        ctx.fillRect(620, 330, 510, 500);
        ctx.strokeRect(620, 330, 510, 500);
        ctx.fillStyle = '#121212';
        ctx.font = 'bold 24px sans-serif';
        ctx.fillText('Consultation Booking Engine', 650, 380);
        ctx.fillStyle = '#6B7280';
        ctx.font = '16px sans-serif';
        ctx.fillText('3-Step Booking Wizard · AJAX Calendar & Retainers', 650, 415);

        const dataUrl = canvas.toDataURL('image/png');
        const base64Data = dataUrl.split(',')[1];
        if (base64Data) {
          themeFolder.file('screenshot.png', base64Data, { base64: true });
        }
      }
    }
  } catch (e) {
    console.warn('Could not generate screenshot.png:', e);
  }

  const content = await zip.generateAsync({
    type: 'blob',
    compression: 'DEFLATE',
    compressionOptions: {
      level: 9,
    },
  });

  return content;
}

export function downloadBlob(blob: Blob, filename: string) {
  const url = URL.createObjectURL(blob);
  const anchor = document.createElement('a');
  anchor.href = url;
  anchor.download = filename;
  document.body.appendChild(anchor);
  anchor.click();
  document.body.removeChild(anchor);
  URL.revokeObjectURL(url);
}

