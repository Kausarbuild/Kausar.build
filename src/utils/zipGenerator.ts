import JSZip from 'jszip';
import { wpThemeFiles } from '../data/wpThemeFiles';

export async function generateWordPressThemeZip(): Promise<Blob> {
  const zip = new JSZip();

  // Root theme folder inside the ZIP so extracting or uploading to WordPress works directly
  const themeFolder = zip.folder('studio-build');

  if (!themeFolder) {
    throw new Error('Could not initialize ZIP folder');
  }

  for (const file of wpThemeFiles) {
    themeFolder.file(file.path, file.content);
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
