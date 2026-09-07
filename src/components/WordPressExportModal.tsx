import React, { useState } from 'react';
import {
  X,
  Download,
  FileCode,
  Check,
  Copy,
  BookOpen,
  FolderTree,
  ExternalLink,
  ShieldCheck,
} from 'lucide-react';
import { wpThemeFiles } from '../data/wpThemeFiles';
import { generateWordPressThemeZip, downloadBlob } from '../utils/zipGenerator';

interface WordPressExportModalProps {
  isOpen: boolean;
  onClose: () => void;
}

export const WordPressExportModal: React.FC<WordPressExportModalProps> = ({
  isOpen,
  onClose,
}) => {
  const [activeTab, setActiveTab] = useState<'download' | 'files' | 'guide'>('download');
  const [selectedFileIndex, setSelectedFileIndex] = useState<number>(0);
  const [copied, setCopied] = useState(false);
  const [isZipping, setIsZipping] = useState(false);

  if (!isOpen) return null;

  const currentFile = wpThemeFiles[selectedFileIndex] || wpThemeFiles[0];

  const handleDownloadZip = async () => {
    try {
      setIsZipping(true);
      const zipBlob = await generateWordPressThemeZip();
      downloadBlob(zipBlob, 'kausar-build-theme.zip');
    } catch (err) {
      console.error('Error generating zip:', err);
      alert('Failed to generate ZIP archive.');
    } finally {
      setIsZipping(false);
    }
  };

  const handleCopyCode = () => {
    navigator.clipboard.writeText(currentFile.content);
    setCopied(true);
    setTimeout(() => setCopied(false), 2000);
  };

  return (
    <div
      id="wp-export-modal-backdrop"
      className="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 bg-black/60 backdrop-blur-xs animate-in fade-in duration-200"
    >
      <div
        id="wp-export-modal-container"
        className="bg-white rounded-3xl border border-neutral-200 shadow-2xl max-w-5xl w-full max-h-[92vh] flex flex-col overflow-hidden animate-in zoom-in-95 duration-200"
      >
        {/* Modal Header */}
        <div className="p-4 sm:p-6 border-b border-neutral-200 flex flex-wrap sm:flex-nowrap items-center justify-between gap-3 bg-neutral-50/80 shrink-0">
          <div className="flex items-center gap-3 min-w-0">
            <div className="w-10 h-10 rounded-2xl bg-neutral-900 text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
              W
            </div>
            <div className="min-w-0">
              <h2 className="font-display font-bold text-sm sm:text-lg text-neutral-900 truncate">
                WordPress Theme Package & Export
              </h2>
              <p className="text-[11px] sm:text-xs text-neutral-500 font-mono truncate">
                kausar-build-theme.zip · Production Ready Theme
              </p>
            </div>
          </div>

          <div className="flex items-center gap-2 shrink-0">
            <button
              type="button"
              onClick={handleDownloadZip}
              disabled={isZipping}
              className="inline-flex items-center gap-1.5 sm:gap-2 px-3.5 sm:px-4 py-2 rounded-full bg-[#E8590C] hover:bg-[#c94a08] text-white text-xs font-semibold tracking-wide transition-colors shadow-sm disabled:opacity-50"
            >
              <Download className="w-3.5 h-3.5 sm:w-4 sm:h-4" />
              <span>{isZipping ? 'Creating...' : 'Download (.zip)'}</span>
            </button>
            <button
              type="button"
              onClick={onClose}
              className="p-1.5 sm:p-2 rounded-full hover:bg-neutral-200 text-neutral-400 hover:text-neutral-700 transition-colors"
              aria-label="Close modal"
            >
              <X className="w-5 h-5" />
            </button>
          </div>
        </div>

        {/* Modal Tabs */}
        <div className="flex border-b border-neutral-200 bg-neutral-50/40 px-4 sm:px-6 pt-2 gap-2 text-xs font-medium shrink-0 overflow-x-auto no-scrollbar">
          <button
            type="button"
            onClick={() => setActiveTab('download')}
            className={`pb-3 px-3 border-b-2 font-mono text-xs flex items-center gap-1.5 transition-colors ${
              activeTab === 'download'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-800'
            }`}
          >
            <FolderTree className="w-3.5 h-3.5" />
            Overview & Download
          </button>
          <button
            type="button"
            onClick={() => setActiveTab('files')}
            className={`pb-3 px-3 border-b-2 font-mono text-xs flex items-center gap-1.5 transition-colors ${
              activeTab === 'files'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-800'
            }`}
          >
            <FileCode className="w-3.5 h-3.5" />
            Theme Code Inspector ({wpThemeFiles.length} files)
          </button>
          <button
            type="button"
            onClick={() => setActiveTab('guide')}
            className={`pb-3 px-3 border-b-2 font-mono text-xs flex items-center gap-1.5 transition-colors ${
              activeTab === 'guide'
                ? 'border-[#E8590C] text-[#E8590C] font-semibold'
                : 'border-transparent text-neutral-500 hover:text-neutral-800'
            }`}
          >
            <BookOpen className="w-3.5 h-3.5" />
            Installation & Editing Guide
          </button>
        </div>

        {/* Tab 1: Download & Summary */}
        {activeTab === 'download' && (
          <div className="flex-1 overflow-y-auto p-6 sm:p-8 space-y-6 text-neutral-700">
            {/* Hero card */}
            <div className="bg-gradient-to-br from-neutral-900 to-neutral-800 text-white rounded-3xl p-6 sm:p-8 space-y-4 shadow-md">
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 border border-orange-500/30 text-xs font-mono">
                <ShieldCheck className="w-3.5 h-3.5" /> WordPress 6.0+ Certified Theme
              </div>
              <h3 className="text-xl sm:text-2xl font-display font-bold">
                recreated-wordpress-site.zip
              </h3>
              <p className="text-neutral-300 text-xs sm:text-sm max-w-2xl leading-relaxed">
                A complete, independent, and fully editable WordPress theme replicating the
                exact layout, typography, proportions, 3D hanging badge physics, bento widgets,
                archive grids, and 3-step booking flow from the reference Framer website.
              </p>
              <div className="pt-2 flex flex-wrap gap-3">
                <button
                  type="button"
                  onClick={handleDownloadZip}
                  disabled={isZipping}
                  className="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#E8590C] hover:bg-[#c94a08] text-white font-medium text-xs sm:text-sm transition-all shadow-sm"
                >
                  <Download className="w-4 h-4" />
                  <span>{isZipping ? 'Generating Package...' : 'Download kausar-build-theme.zip'}</span>
                </button>
                <button
                  type="button"
                  onClick={() => setActiveTab('files')}
                  className="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white font-medium text-xs sm:text-sm transition-colors border border-white/15"
                >
                  <FileCode className="w-4 h-4" />
                  <span>Inspect Source Code</span>
                </button>
              </div>
            </div>

            {/* Architecture Highlights */}
            <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div className="p-4 rounded-2xl bg-neutral-50 border border-neutral-200/80 space-y-1.5">
                <p className="font-mono text-xs font-bold text-neutral-900">Custom Post Types</p>
                <p className="text-xs text-neutral-500">
                  Projects, Services, Testimonials, and Consultation Booking options registered natively in WP Admin.
                </p>
              </div>
              <div className="p-4 rounded-2xl bg-neutral-50 border border-neutral-200/80 space-y-1.5">
                <p className="font-mono text-xs font-bold text-neutral-900">WP Customizer Panels</p>
                <p className="text-xs text-neutral-500">
                  Live controls for Hero bio, Lanyard portrait, Profile stats, Retainer fees, and Accent colors.
                </p>
              </div>
              <div className="p-4 rounded-2xl bg-neutral-50 border border-neutral-200/80 space-y-1.5">
                <p className="font-mono text-xs font-bold text-neutral-900">1-Click Demo Content</p>
                <p className="text-xs text-neutral-500">
                  Auto-seeds placeholder content, projects, and consultation pricing upon theme activation.
                </p>
              </div>
            </div>

            {/* File Structure Manifest */}
            <div className="space-y-3">
              <h4 className="font-display font-bold text-sm text-neutral-900">
                Included Theme Files ({wpThemeFiles.length})
              </h4>
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-2 font-mono text-xs">
                {wpThemeFiles.map((file, idx) => (
                  <div
                    key={file.path}
                    onClick={() => {
                      setSelectedFileIndex(idx);
                      setActiveTab('files');
                    }}
                    className="p-2.5 rounded-xl bg-white border border-neutral-200 hover:border-orange-400 flex items-center justify-between cursor-pointer transition-colors group"
                  >
                    <span className="text-neutral-800 font-semibold group-hover:text-[#E8590C]">
                      {file.path}
                    </span>
                    <span className="text-[10px] text-neutral-400 uppercase">{file.category}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        )}

        {/* Tab 2: Theme Code Inspector */}
        {activeTab === 'files' && (
          <div className="flex-1 overflow-hidden flex flex-col md:flex-row">
            {/* Sidebar file list */}
            <div className="w-full md:w-64 border-r border-neutral-200 bg-neutral-50/70 p-3 overflow-y-auto shrink-0 space-y-1 text-xs font-mono">
              <p className="text-[10px] uppercase font-bold text-neutral-400 px-2 py-1">
                Theme Files
              </p>
              {wpThemeFiles.map((file, idx) => (
                <button
                  key={file.path}
                  type="button"
                  onClick={() => setSelectedFileIndex(idx)}
                  className={`w-full text-left px-2.5 py-2 rounded-xl transition-colors flex items-center justify-between ${
                    selectedFileIndex === idx
                      ? 'bg-neutral-900 text-white font-semibold'
                      : 'text-neutral-700 hover:bg-neutral-200/60'
                  }`}
                >
                  <span className="truncate">{file.path}</span>
                  <span className="text-[9px] opacity-70 uppercase">{file.category}</span>
                </button>
              ))}
            </div>

            {/* Code view area */}
            <div className="flex-1 flex flex-col bg-neutral-950 text-neutral-200 overflow-hidden">
              <div className="p-3 bg-neutral-900 border-b border-neutral-800 flex items-center justify-between text-xs font-mono">
                <div>
                  <span className="text-white font-semibold">{currentFile.path}</span>
                  <span className="text-neutral-400 text-[11px] ml-3 hidden sm:inline">
                    — {currentFile.description}
                  </span>
                </div>
                <button
                  type="button"
                  onClick={handleCopyCode}
                  className="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-neutral-800 hover:bg-neutral-700 text-neutral-300 hover:text-white transition-colors text-[11px]"
                >
                  {copied ? <Check className="w-3.5 h-3.5 text-emerald-400" /> : <Copy className="w-3.5 h-3.5" />}
                  <span>{copied ? 'Copied!' : 'Copy Code'}</span>
                </button>
              </div>

              <pre className="flex-1 p-4 overflow-auto font-mono text-xs leading-relaxed text-neutral-300 select-text">
                <code>{currentFile.content}</code>
              </pre>
            </div>
          </div>
        )}

        {/* Tab 3: Installation Guide */}
        {activeTab === 'guide' && (
          <div className="flex-1 overflow-y-auto p-6 sm:p-8 space-y-6 text-neutral-700 text-xs sm:text-sm leading-relaxed">
            <div className="space-y-4">
              <h3 className="font-display font-bold text-base sm:text-lg text-neutral-900">
                1. Theme Installation (Standard WordPress)
              </h3>
              <ol className="list-decimal pl-5 space-y-2">
                <li>
                  Click the <strong>"Download (.zip)"</strong> button above to download{' '}
                  <code className="bg-neutral-100 px-1.5 py-0.5 rounded font-mono text-xs">
                    kausar-build-theme.zip
                  </code>.
                </li>
                <li>Log in to your WordPress administrative dashboard.</li>
                <li>
                  Go to <strong>Appearance → Themes → Add New → Upload Theme</strong>.
                </li>
                <li>
                  Choose <code className="bg-neutral-100 px-1.5 py-0.5 rounded font-mono text-xs">kausar-build-theme.zip</code> and click{' '}
                  <strong>Install Now</strong>.
                </li>
                <li>
                  Click <strong>Activate</strong>.
                </li>
                <li>
                  <em>Automatic Seeding:</em> The theme automatically populates demo projects, services, testimonials, and consultation pricing!
                </li>
              </ol>
            </div>

            <div className="space-y-4 pt-4 border-t border-neutral-200">
              <h3 className="font-display font-bold text-base sm:text-lg text-neutral-900">
                2. Replacing Content & Customizing
              </h3>
              <ul className="list-disc pl-5 space-y-2">
                <li>
                  <strong>Homepage Bio, Lanyard Photo & Retainer Rate:</strong> Open{' '}
                  <strong>Appearance → Customize → Kausar.Build Portfolio Settings</strong>.
                </li>
                <li>
                  <strong>Portfolio Projects (Design Archive):</strong> Go to{' '}
                  <strong>Projects → Add New</strong>. Upload your project screenshot (16:10 ratio recommended), category badge, year, and tech stack tags.
                </li>
                <li>
                  <strong>Services:</strong> Go to <strong>Services</strong> in WP Admin. Add, edit, or reorder accordion items.
                </li>
                <li>
                  <strong>Testimonials:</strong> Go to <strong>Testimonials</strong> to add client reviews, roles, and avatar images.
                </li>
                <li>
                  <strong>Consultation Services:</strong> Go to <strong>Booking Options</strong> to adjust consultation pricing ($240, $120, $160) and session lengths.
                </li>
              </ul>
            </div>

            <div className="space-y-4 pt-4 border-t border-neutral-200">
              <h3 className="font-display font-bold text-base sm:text-lg text-neutral-900">
                3. Image Replacement Ratio Guide
              </h3>
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                <div className="p-3 bg-neutral-50 rounded-xl border border-neutral-200">
                  <p className="font-mono font-bold text-neutral-900">Hero Lanyard Card</p>
                  <p className="text-neutral-500">4:5 portrait ratio (e.g. 800 × 1000 px)</p>
                </div>
                <div className="p-3 bg-neutral-50 rounded-xl border border-neutral-200">
                  <p className="font-mono font-bold text-neutral-900">About Me Tall Portrait</p>
                  <p className="text-neutral-500">3:4 or 4:5 portrait ratio (e.g. 900 × 1200 px)</p>
                </div>
                <div className="p-3 bg-neutral-50 rounded-xl border border-neutral-200">
                  <p className="font-mono font-bold text-neutral-900">Project Cards</p>
                  <p className="text-neutral-500">16:10 landscape ratio (e.g. 1280 × 800 px)</p>
                </div>
                <div className="p-3 bg-neutral-50 rounded-xl border border-neutral-200">
                  <p className="font-mono font-bold text-neutral-900">Moments Photos</p>
                  <p className="text-neutral-500">4:3 snapshot ratio (e.g. 800 × 600 px)</p>
                </div>
              </div>
            </div>

            <div className="space-y-4 pt-4 border-t border-neutral-200">
              <h3 className="font-display font-bold text-base sm:text-lg text-neutral-900">
                4. Connecting External Calendars (Calendly / Cal.com / Stripe)
              </h3>
              <p className="text-xs text-neutral-600">
                The theme provides a native WordPress action hook inside{' '}
                <code className="bg-neutral-100 px-1.5 py-0.5 rounded font-mono text-xs">functions.php</code>:
              </p>
              <pre className="p-3 bg-neutral-900 text-neutral-200 rounded-xl font-mono text-xs overflow-x-auto">
{`add_action( 'studio_build_after_booking_submit', function( $booking_data ) {
    // $booking_data includes 'service_title', 'service_price', 'name', 'email', 'notes'
    // Send to webhook, Cal.com API, or Stripe checkout session!
} );`}
              </pre>
            </div>
          </div>
        )}
      </div>
    </div>
  );
};
