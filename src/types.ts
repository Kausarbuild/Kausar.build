export interface ThemeSettings {
  siteName: string;
  siteSubtitle: string;
  statusBadge: string;
  isAvailable: boolean;
  heroGreeting: string;
  heroHeadline: string;
  heroDescription: string;
  heroImage: string;
  badgeName: string;
  badgeRole: string;
  badgePassId: string;
  cvUrl: string;
  contactEmail: string;

  // About Section
  aboutTitle: string;
  aboutSubtitle: string;
  aboutPortraitImage: string;
  aboutPortraitTag: string;
  aboutPortraitSub: string;
  musicTitle: string;
  musicArtist: string;
  musicCover: string;
  spotifyUrl: string;
  musicTimeCurrent: string;
  musicTimeTotal: string;
  // Personal Ritual Bento (The person behind the pixels)
  personalTitle: string;
  personalSubtitle: string;
  personalImage: string;
  personalTag: string;
  personalBadge: string;
  personalNote: string;
  personalTime?: string;
  // Tech Arsenal Bento
  stackTitle?: string;
  stackSubtitle?: string;
  stackBadge?: string;
  stackHighlight?: string;
  momentsImage1?: string;
  momentsImage2?: string;
  momentsLocation?: string;
  momentsFlag?: string;
  momentsCount?: string;
  manifestoTitle?: string;
  manifestoQuote?: string;
  manifestoAuthor?: string;
  manifestoSub?: string;
  surpriseTitle?: string;
  surpriseSub?: string;
  surpriseImage?: string;

  // Process / How It Works & Profile
  profileName: string;
  profileLocation: string;
  profileAvatar: string;
  profileRating: string;
  profileHours: string;
  profileJobs: string;
  profileBio: string;
  verifiedText: string;

  // Retainer / Pricing
  retainerTitle: string;
  retainerDescription: string;
  retainerBadge: string;
  retainerPrice: number | string;
  retainerPeriod: string;
  retainerFeatures: string[];

  // Footer
  footerGreeting: string;
  footerTagline: string;
  waxSealImage: string;
  signatureName: string;
  signatureImage?: string;
  copyrightText: string;
  socialTwitter: string;
  socialLinkedIn: string;
  socialGitHub: string;
  socialInstagram?: string;
  socialEmail: string;

  // Color & Aesthetic Tokens
  accentColor: string; // e.g. '#E8590C'
}

export interface ProjectItem {
  id: string;
  title: string;
  category: string;
  description: string;
  image: string;
  year: string;
  tag: string;
  linkText: string;
  projectUrl: string;
}

export interface ServiceItem {
  id: string;
  number: string;
  title: string;
  description: string;
}

export interface TestimonialItem {
  id: string;
  name: string;
  role: string;
  company: string;
  quote: string;
  avatar: string;
}

export interface BookingConsultationService {
  id: string;
  title: string;
  duration: string;
  description: string;
  price: number | string;
}

export interface WordPressFileItem {
  path: string;
  filename: string;
  category: 'core' | 'template' | 'inc' | 'asset' | 'doc';
  description: string;
  content: string;
}
