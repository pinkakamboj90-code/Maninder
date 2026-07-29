═══════════════════════════════════════════════════════
  MANINDER ENGLISH — WordPress Child Theme
  Complete Setup Guide for Hostinger
  Version 1.0 — maninderenglish.com
═══════════════════════════════════════════════════════

This guide takes you from ZIP file to live website.
Read every step before starting. It takes about 20 minutes.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 1: UPLOAD THE CHILD THEME TO WORDPRESS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1. Log in to your WordPress dashboard
   Go to: https://maninderenglish.com/wp-admin

2. In the left sidebar, click:
   Appearance → Themes

3. Click the "Add New Theme" button (top left area)

4. Click "Upload Theme" button

5. Click "Choose File" and select the ZIP file:
   maninderenglish-child.zip

6. Click "Install Now"

7. After it installs, click "Activate"

   ✓ You should now see "Maninder English Child" as
     your active theme in Appearance → Themes.

   ✓ Your site will still look the same — the homepage
     template needs to be assigned (next step).


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 2: CREATE AND SET UP YOUR PAGES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

CREATE THE HOMEPAGE:
1. Go to: Pages → Add New Page
2. Title: "Home"
3. On the RIGHT side panel, look for "Page Attributes"
4. Under "Template", select:
   "Maninder English — Homepage"
5. Click "Publish"

SET AS THE ACTUAL HOMEPAGE:
1. Go to: Settings → Reading
2. Under "Your homepage displays", select:
   "A static page"
3. For "Homepage", select: "Home" (the page you just made)
4. Click "Save Changes"

CREATE THESE ADDITIONAL PAGES (all use Default Template):
- Levels       (slug: /levels/)
- Lessons      (slug: /lessons/)
- Grammar      (slug: /grammar/)
- Vocabulary   (slug: /vocabulary/)
- Quizzes      (slug: /quizzes/)
- About        (slug: /about/)
- Contact      (slug: /contact/)

For each: Pages → Add New → give it the title → Publish
(Leave content blank for now — we'll fill them in Phase 2)


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 3: SET UP THE NAVIGATION MENU
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1. Go to: Appearance → Menus
2. Click "Create a new menu"
3. Name it: "Primary Menu"
4. On the left, under "Pages", select and add:
   - Home
   - Levels
   - Lessons
   - Grammar
   - Vocabulary
   - Quizzes
   - About
   (add Contact to Footer menu instead)

5. Under "Menu Settings" at the bottom, tick:
   ☑ Primary Navigation

6. Click "Save Menu"

CREATE FOOTER MENU:
1. Click "Create a new menu"
2. Name it: "Footer Links"
3. Add: About, Contact, Levels, Lessons
4. Tick: ☑ Footer
5. Save Menu


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 4: SET UP XPRO HEADER
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

XPRO Theme Builder lets you create a custom header that
appears on every page. Here's how to set it up:

1. In left sidebar, find "XPRO" or "Theme Builder"
   (it may also be under Appearance → XPRO)

2. Click "Header" → "Add New"

3. Name it: "Maninder English Header"

4. In the builder, add these elements:

   ROW 1 — Full width row:
   ┌─────────────────────────────────────────────────┐
   │ LOGO TEXT │        NAV MENU        │  YT BUTTON │
   └─────────────────────────────────────────────────┘

   LOGO (use "Site Logo" or "Heading" widget):
   - Text: Maninder English
   - Font: Plus Jakarta Sans, 800 weight, 21px
   - Color: #1A2540
   - Make "English" violet #6633DD using HTML:
     Maninder <span style="color:#6633DD">English</span>

   NAV MENU (use "Nav Menu" widget):
   - Select: Primary Menu
   - Font: Inter, 14px, 500 weight
   - Color: #64748B
   - Hover color: #1A2540
   - Active color: #6633DD
   - Item padding: 8px 14px
   - Item border radius: 8px

   BUTTON (use "Button" widget):
   - Text: ▶ YouTube
   - Link: https://www.youtube.com/@englishwithmaninder
   - Open in new tab: Yes
   - Background: #FF0000
   - Text color: #FFFFFF
   - Border radius: 9px
   - Padding: 9px 18px
   - Font size: 13px, bold

   HEADER STYLING:
   - Background: #FFFFFF
   - Height: 68px
   - Enable sticky: Yes
   - Border bottom: 1px solid #E4E1D9

5. Click "Publish"

6. Set display conditions:
   - Show on: Entire Website
   Click "Save & Close"

7. The XPRO header will now replace the fallback nav
   on all pages including the homepage.


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 5: SET UP XPRO FOOTER
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Note: The homepage has its own built-in footer (dark navy).
The XPRO footer will appear on inner pages (About, Contact,
Lessons, etc.) where there's no custom template.

1. XPRO → Footer → Add New
2. Name it: "Maninder English Footer"
3. Layout: 4 columns
4. Column 1 — Brand:
   - Logo text: Maninder English (same styling as header)
   - Tagline: "English + Psychology = Fluency" (Hindi font)
   - Short description paragraph

5. Column 2 — Learn:
   Nav Menu widget → Footer Links menu

6. Column 3 — About:
   Text links to About, Contact, YouTube

7. Column 4 — Social:
   Social Icons widget:
   - YouTube: https://www.youtube.com/@englishwithmaninder
   - Instagram: (your handle)
   - Facebook: (your handle)

8. FOOTER STYLING:
   - Background: #1A2540 (dark navy)
   - Text color: rgba(255,255,255,0.55)
   - Link hover: #FFFFFF

9. Publish → Display: Entire Website → Save


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 6: SET UP SUREFORMS CONTACT FORM
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1. In left sidebar, find "SureForms" and click it

2. Click "Add New Form"

3. Add these fields:
   - Name (required)
   - Email (required)
   - Subject (dropdown: General Enquiry / Lesson Feedback / Business / Other)
   - Message (textarea, required)
   - Submit button: "Send Message"

4. Under Form Settings:
   - Success message: "Shukriya! I'll reply within 48 hours. — Maninder"
   - Email notifications: Enter your email address

5. Click "Publish"

6. Note the FORM ID shown in the URL or list
   (e.g. if URL shows post=123, your ID is 123)

7. Open: wp-content/themes/maninderenglish-child/functions.php
   Find this line:
     define( 'ME_CONTACT_FORM_ID', 1 );
   Change 1 to your actual form ID.

8. Go to your Contact page (Pages → Contact → Edit)
   Add this shortcode in the content area:
   [sureforms id="YOUR_FORM_ID"]
   Publish.


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 7: ADD YOUR YOUTUBE VIDEO IDs
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

When you upload videos to YouTube:

1. Go to your video on YouTube
2. Look at the URL: youtube.com/watch?v=XXXXXXXXXXX
   The part after v= is your video ID (11 characters)

3. Open: page-home.php (via Appearance → Theme File Editor
   or via FTP/Hostinger File Manager)

4. Find these lines (around line 350):
   'video_id' => 'REPLACE_VIDEO_ID_1',
   'video_id' => 'REPLACE_VIDEO_ID_2',
   'video_id' => 'REPLACE_VIDEO_ID_3',

5. Replace REPLACE_VIDEO_ID_1 etc with your actual video IDs
   Example: 'video_id' => 'dQw4w9WgXcQ',

6. Also update lesson titles, descriptions, and levels
   to match your actual videos.

Until you add real video IDs, clicking play will redirect
visitors to your YouTube channel — which is fine for now.


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STEP 8: VERIFY EVERYTHING IS WORKING
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Visit maninderenglish.com and check:

✓ Homepage loads with the custom design (not Astra default)
✓ Typewriter animation works in the hero card
✓ Level cards all visible with correct colours
✓ Word of the Day shows and prev/next buttons work
✓ Scroll progress bar appears at very top
✓ Navigation links go to correct pages
✓ YouTube button opens your channel in a new tab
✓ Footer links work
✓ Site looks correct on mobile (resize browser window)

If homepage shows the Astra default instead of your design:
→ Go to Settings → Reading → make sure "Home" page is selected
→ Go to Pages → Home → check Template is set to
  "Maninder English — Homepage"
→ Go to Appearance → Themes → confirm child theme is ACTIVE


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
PHASE 2 — CONTENT SYSTEM (When you're ready)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

When you want to add lessons, grammar articles, and more:

1. LESSONS SYSTEM:
   - Uncomment the CPT code in functions.php
   - Each lesson becomes a WordPress post with:
     Title, Video ID, Level (taxonomy), Topic, Hindi title
   - The lessons grid on homepage pulls from these automatically
   - Inner lesson pages use Elementor (simple layout)

2. GRAMMAR PAGES:
   - Each grammar topic (Tenses, Phrasal Verbs, etc.) gets
     its own page built with Elementor
   - Add content, examples, exercises
   - Link from the Grammar Topics grid on homepage

3. VOCABULARY:
   - Word of the Day managed from WP dashboard (not hardcoded)
   - Vocabulary archive page with searchable word bank
   - Level-filtered vocabulary lists

4. QUIZ SYSTEM (for interactive quizzes):
   - Install: "Quiz and Survey Master" (free plugin)
   - OR use custom HTML/JS quiz pages (faster, more animated)
   - Claude can build the full quiz system when ready

5. BLOG / RESEARCH SECTION:
   - Standard WordPress posts
   - Categories: Grammar Tips, British Culture, Psychology,
     Pronunciation, Vocabulary
   - Featured on homepage "Latest Posts" widget


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
PHASE 3 — PLATFORM FEATURES (Advanced)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Prepare for this in advance by keeping these in mind:

1. USER ACCOUNTS & PROGRESS TRACKING:
   Plugin to install: "LearnDash" (paid, ~$199/yr) — best LMS
   OR: "LifterLMS" (free tier available)
   - Students log in, track completed lessons
   - Progress bars per level
   - Certificates on level completion

   START PREPARING NOW:
   → Keep all lesson content in WordPress CPTs (not hardcoded)
   → Use consistent Level taxonomies (Beginner/Intermediate/etc.)
   → This makes migration to LMS seamless later

2. ADVANCED ANIMATIONS (GSAP):
   - GSAP (GreenSock) replaces basic CSS transitions
   - ScrollTrigger for cinematic scroll-based reveals
   - Text split animations (each letter animates in)
   - Smooth page transitions between sections
   Claude builds these as standalone JS files you enqueue.

3. LOTTIE ANIMATIONS:
   - Export animations from After Effects as Lottie JSON
   - Use your existing AE workflow from CSL
   - Embed on lesson pages as explainer animations
   - Much lighter than video, fully scalable

4. INTERACTIVE QUIZZES WITH SCORING:
   - Claude builds custom HTML/JS quiz pages
   - Animated progress bar, score reveal, feedback
   - Level recommendation based on score
   - No plugin needed — pure JS, fully branded

5. MULTILINGUAL (Hindi interface):
   Plugin: "Polylang" (free)
   - English and Hindi versions of all pages
   - URL structure: /en/ and /hi/
   - WOTD and grammar explanations in both

6. SEO FOUNDATIONS (do this early):
   Plugin: "Rank Math" (free — better than Yoast)
   - Each lesson gets optimised title + description
   - Schema markup for educational content
   - XML sitemap auto-generated
   Key terms to target:
   → "learn English for Indian students"
   → "English grammar in Hindi"
   → "British English for Indian professionals"
   → "phrasal verbs in Hindi"


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
FILES IN THIS PACKAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

maninderenglish-child/
├── style.css                  ← Theme declaration + Astra overrides
├── functions.php              ← Styles, menus, template registration
├── page-home.php              ← Full homepage template (all sections)
├── xpro-header-reference.php  ← XPRO header configuration guide
├── assets/
│   └── home.js               ← All JS: typewriter, reveals, WOTD, etc.
└── README.txt                 ← This file


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
NEED HELP?
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

If anything doesn't work, bring the error message back to
Claude and it will fix it immediately. Always include:
- What you did
- What you expected
- What actually happened (screenshot if possible)

Common issues:
- Homepage shows wrong template → Check Settings → Reading
- Fonts not loading → Check internet connection on server
- JS animations not working → Check browser console (F12)
- XPRO header not showing → Check display conditions
