import fs from 'fs';

fs.mkdirSync('wordpress-theme/assets/docs', { recursive: true });
fs.mkdirSync('public/assets/docs', { recursive: true });

const pdfBody = `%PDF-1.4
1 0 obj
<< /Type /Catalog /Pages 2 0 R >>
endobj
2 0 obj
<< /Type /Pages /Kids [3 0 R] /Count 1 >>
endobj
3 0 obj
<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Contents 4 0 R /Resources << /Font << /F1 5 0 R /F2 6 0 R >> >> >>
endobj
4 0 obj
<< /Length 820 >>
stream
BT
/F1 22 Tf
50 720 Td
(KAUSAR - CURRICULUM VITAE) Tj
/F2 12 Tf
0 -26 Td
(Design Engineer | Websites & Digital Products) Tj
0 -18 Td
(Location: India | Email: hello@kausar.build) Tj
0 -30 Td
/F1 14 Tf
(PROFESSIONAL SUMMARY) Tj
/F2 11 Tf
0 -20 Td
(Design engineer specializing in crafting fast, elegant, and high-conversion) Tj
0 -16 Td
(digital products. I combine refined aesthetics with clean, modern engineering.) Tj
0 -30 Td
/F1 14 Tf
(CORE DISCIPLINES) Tj
/F2 11 Tf
0 -20 Td
(1. Web Design & Visual Systems) Tj
0 -16 Td
(2. UI / Product Design & Wireframing) Tj
0 -16 Td
(3. Web Development - React, Vite, Tailwind CSS) Tj
0 -16 Td
(4. Native WordPress & Elementor Custom Development) Tj
0 -16 Td
(5. Interaction, Motion & Conversion Engineering) Tj
0 -30 Td
/F1 14 Tf
(CONTACT DIRECTLY) Tj
/F2 11 Tf
0 -20 Td
(WhatsApp: +916002357235 | Call: +916002357235) Tj
0 -16 Td
(Instagram: @Kausar.build) Tj
ET
endstream
endobj
5 0 obj
<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>
endobj
6 0 obj
<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>
endobj
xref
0 7
0000000000 65535 f 
0000000009 00000 n 
0000000058 00000 n 
0000000115 00000 n 
0000000244 00000 n 
0000001118 00000 n 
0000001195 00000 n 
trailer
<< /Size 7 /Root 1 0 R >>
startxref
1267
%%EOF
`;

fs.writeFileSync('wordpress-theme/assets/docs/kausar-cv.pdf', pdfBody.trim());
fs.writeFileSync('public/assets/docs/kausar-cv.pdf', pdfBody.trim());
console.log('CV PDF created successfully in theme and public directory!');
