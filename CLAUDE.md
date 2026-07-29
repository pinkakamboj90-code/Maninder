# ManinderEnglish.com — Project Reference

This file exists so any AI session (Claude Code or otherwise) working on this
theme understands the architecture and conventions *before* editing files.
Read this fully before making changes. Most bugs in this project's history
came from not knowing one of the things documented below.

## What this project is

maninderenglish.com — an English-learning platform for Hindi-speaking Indian
professionals, teaching British professional communication. Built on
WordPress, parent theme **Astra**, child theme **maninderenglish-child**.
Founder: Maninder (Psychology & Economics background, 13 years in London
corporate environments). Also runs two YouTube channels (Cognitive Strategy
Lab, Money Mind Lab) — separate from this site but shares design sensibility.

Brand positioning: "Stop Translating. Start Speaking." — psychology-based
English learning, British standard, Hindi explanations throughout.

## Architecture — read this before touching any template

- Every top-level page (`page-home.php`, `page-levels.php`,
  `page-grammar-hub.php`, `page-grammar-single.php`, `page-vocabulary.php`,
  `page-about.php`, `page-quizzes.php`, `page-lesson-single.php`) is a
  **standalone full HTML document**. None of them call `get_header()` or
  `get_footer()`. Each has its own `<html><head>...<body>` and its own inline
  `<style>` block with base CSS.
- **Astra's default header/footer must be explicitly suppressed per
  template.** This happens in `functions.php` via `me_maybe_remove_astra_chrome()`,
  hooked to `add_action('wp', ...)`. It checks a hardcoded array of template
  filenames and calls `remove_action('astra_header', 'astra_header_markup')`
  etc. **If you add a new standalone template, you MUST add its filename to
  that array**, or Astra's default header will render stacked underneath
  your custom nav, breaking layout in ways that look like a CSS bug but
  aren't.
- On top of each page's own base `<style>` block, there is a second,
  separate CSS layer: **per-page "premium" files** in `/assets/` —
  `home-premium.css`, `grammar-premium.css`, `levels-premium.css`,
  `lesson-premium.css` (targets `page-grammar-single.php`, NOT
  `page-lesson-single.php` — the naming is misleading, verify by body class,
  not filename), `vocabulary-premium.css`, `about-premium.css`,
  `quizzes-premium.css`. These are scoped with `body.<template-class>` and
  add the floating pill nav, hero grain texture, card hover-lift, etc. Base
  CSS = structure and layout. Premium CSS = the polish layer.
- There is also a **global token layer**, `design-system.css`, defining
  `--me-*` custom properties (violet-600, ink-800, cream-50, etc.) plus
  legacy aliases (`--violet: var(--me-violet-600)` and similar) so older
  inline styles keep working without rewriting them.
- `me-features.css` covers shared interactive components used across pages:
  search bar, lesson search cards, pagination, the SRS flashcard widget.
  Don't duplicate these styles per-page.

## Critical gotcha: how enqueues are gated

All premium CSS files are enqueued conditionally in `functions.php`, inside
`me_enqueue_styles()`, hooked to `wp_enqueue_scripts`. Each block looks like:

```php
if ( is_page_template( 'page-vocabulary.php' ) || is_page( 'vocabulary' ) ) {
    wp_enqueue_style( 'me-vocabulary-premium', ... );
}
```

**Why the `is_page()` fallback matters:** `is_page_template()` only returns
true if the page's `_wp_page_template` postmeta was explicitly set — which
only happens if the template file has a `Template Name:` header comment AND
someone manually selected it from the Page Attributes dropdown in wp-admin.
Files *without* a `Template Name` header (like `page-about.php` and
`page-quizzes.php` originally did) can only be picked up via WordPress's
automatic `page-{slug}.php` template-hierarchy matching — and that path
**never sets the postmeta**, so `is_page_template()` silently returns false
even though that file is definitely what's rendering. This caused a real,
hard-to-diagnose bug where premium CSS enqueue conditions looked correct but
never fired. Always include the `is_page()` slug fallback for any template
whose file lacks a `Template Name` header.

## Design tokens

```
--violet:      #6633DD   (primary brand color)
--violet-600:  #6633DD
--violet-700   (darker, used for CTA gradients / dark card accents)
--navy:        #1A2540   (footer, dark accent cards, headings)
--saffron/sfdeep: #B5470F or #C97A10 (Hindi accent text/border — two
                  slightly different values exist across files; #B5470F is
                  the "deep" variant used for hero Hindi tip boxes, #C97A10
                  is used for lighter Hindi accents on dark backgrounds)
--cream/off:   #F7F4EE / #F8F7F4 (page background tint)
--border:      #E8E4DC
--muted:       #64748B

Level colors (pastel cards on Home/Levels):
  Beginner:     #C8E4F8
  Intermediate: #FAD5CF
  Advanced:     #DDD6FF
  Business:     #C8E8D4
```

Fonts: **Plus Jakarta Sans** (headings, `var(--d)`), **Inter** (body,
`var(--b)`), **Noto Sans Devanagari** (Hindi text, `var(--h)`).

Motion: spring easing `cubic-bezier(.22, 1, .36, 1)` used for scroll-reveal
and hover transforms. Ambient float animations (e.g. `vcard-float` on vocab
icons) run continuously — **never attach a second animation to the same
element for a one-off effect** (a tap "pop," etc.); it will fight the
ambient animation and look janky. Target a child element instead, or an
element with no existing animation.

## Hero pattern (used identically across Home/Grammar/Levels/Vocabulary/
Quizzes/About)

Structure: floating pill nav (`position: sticky; top: 12px` on desktop,
adjusted per breakpoint) → light hero with pastel/violet gradient wash and
subtle dot-grid texture → violet pill badge/eyebrow → large headline with
`<em>` in gradient violet text → Hindi accent line in a filled cream box
with left border accent → subhead → stats row. **Heroes are never dark.**
A dark, `#0D1530`-style hero was a leftover from an earlier design pass and
was deliberately removed from every page — do not reintroduce it. Dark
backgrounds are reserved for intentional accent blocks (footer, YouTube CTA
cards, "next lesson" cards) using `var(--navy)`, never near-black.

## Grid layout rule

Any grid whose column count is hardcoded (e.g. `grid-template-columns: 1fr
1fr`) but whose item count is content-driven (e.g. one lesson per topic)
will leave a visible dead/empty column when the count doesn't divide evenly.
Fix pattern used on the Grammar Hub: PHP computes `$count` per group, adds a
`.single` modifier class when `$count === 1`, and CSS gives that modifier a
`max-width` cap instead of a fixed multi-column track. Apply the same
pattern anywhere a fixed-column grid meets variable content (Vocabulary
deck grid, Quiz topic columns currently rely on the count happening to
divide evenly — this is fragile and will break the day content changes).

## Vocab "Tap & Learn" game (injected fragment + page-grammar-single.php)

- Content is a standalone HTML fragment (e.g. `vocab-lesson-fragment-v4.html`)
  injected into a `grammar_lesson` CPT's `post_content` via `wp_update_post()`
  in functions.php — this bypasses `wp_kses_post` sanitization, which is
  necessary because custom classes and `data-*` attributes get stripped
  otherwise.
- Card markup: `.vcard` (the tappable button) → `.vcard-icon` (a floating
  frame, ambient `vcard-float` animation, NO border/circle — removed
  deliberately, keep it that way, graphics float free like the reference
  design) → `.vcard-img` (real 3D-style emoji PNG from
  `cdn.jsdelivr.net/gh/shuding/fluentui-emoji-unicode`) with
  `.vcard-emoji-fallback` (real unicode emoji, shown via `onerror` if the
  image fails) → `.vcard-word` / `.vcard-hi` (English/Hindi labels).
- Tap behavior: Web Speech API (`speechSynthesis`) says the word, `.speaking`
  class toggles for border highlight only. The actual "pop" animation is
  triggered as an **independent, fixed-duration JS event** (add class,
  `void el.offsetWidth` to force reflow, remove after a `setTimeout` — do
  NOT tie animation duration to `u.onend`, since short words finish speaking
  in well under half a second and will cut the animation off before it
  completes).
- No confetti/burst effects, no rings/halos around graphics — removed
  deliberately per design direction; keep pop effects to a clean transform
  animation on the graphic itself only.
- Progress tracker (`X / Y words explored`) is recalculated live from actual
  DOM card count on every tap — don't worry about hardcoding totals
  correctly elsewhere, but do keep the initial static text accurate for
  the pre-JS state.

## Content model / current inventory

- Grammar: 8 lessons across 8 topics (Alphabet & Sounds, Everyday Greetings,
  Future Tenses, Present Tenses, Sentence Building, Tenses, Vocabulary,
  Phrasal Verbs) — currently 1 lesson per topic.
- Vocabulary: 3 curated decks (Diplomatic Emails, Meeting Pushback Phrases,
  Performance Reviews) + the Tap & Learn vocab game (50 words: fruits,
  colours, animals, body parts, numbers, family).
- Quizzes: 3 quizzes across 3 topics (Everyday Tense Mistakes, Common
  Prepositions, Daily Conversations).

## Process conventions (non-negotiable, established through hard experience)

- **VS Code only** for file edits — not TextEdit or similar plain editors
  (encoding/formatting issues).
- **Never duplicate shared CSS classes with embedded per-lesson styles.**
  Shared classes (`.l-section`, `.reveal-card`, `.tap-word`, `.fact-acc`,
  `.rule-box`, `.hindi-note`, `.example-pair`, `.practice-q`, `.pq-opt`)
  live once in the shared stylesheet, never redefined per lesson.
- **Verify uploads actually landed** before assuming a code fix failed.
  Check the file's "Last modified" timestamp in the file manager, or
  View Page Source (not just Inspect) and search for the specific text/value
  that changed. A large fraction of "this didn't work" reports in this
  project's history turned out to be stale caching (browser or host-level)
  or an old file simply not having been re-uploaded — not an incorrect fix.
  When in doubt, purge Hostinger's Cache Manager and any caching plugin
  before re-editing code.
- **A WordPress child theme is not standalone** — Astra is the parent theme
  and is structurally present on every request whether or not a given
  template's markup makes that obvious.

## When making changes

1. Identify which layer the fix belongs in: base template `<style>` block
   (structure), premium CSS (polish), or `design-system.css` (global token).
2. Check whether the same pattern exists on sibling pages (Home, Grammar,
   Levels, Vocabulary, About, Quizzes) — fixes should usually be applied
   consistently across all of them, not just the one reported page.
3. If touching `functions.php`, check brace/paren balance before treating
   the file as done — a single broken file here can take down the entire
   site (every page hits this file on every request), unlike a CSS file
   which only affects the page it's enqueued on.
