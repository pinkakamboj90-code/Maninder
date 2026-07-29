<?php
/**
 * page-about.php — /about/
 * Standalone About template matching grammar/vocabulary/quiz hub pattern.
 * Upload to: /wp-content/themes/maninderenglish-child/page-about.php
 *
 * SureForms contact form: replace [YOUR_SUREFORMS_SHORTCODE] with your actual shortcode
 * e.g. [sureforms id="1"] — find the ID in SureForms → Forms
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Maninder — Maninder English</title>
<?php wp_head(); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');

:root {
  --navy:   #1A2540;
  --violet: #6633DD;
  --vm:     #8B6CF6;
  --vl:     #EDE8FB;
  --vd:     #5220C8;
  --border: #E8E4DC;
  --off:    #F8F7F4;
  --muted:  #64748B;
  --sfdeep: #B5470F;
  --d: 'Plus Jakarta Sans', sans-serif;
  --b: 'Inter', sans-serif;
  --h: 'Noto Sans Devanagari', sans-serif;
  --e2: cubic-bezier(.22,1,.36,1);
  --e3: cubic-bezier(.16,1,.3,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: var(--b); background: #fff; color: #111;
  -webkit-font-smoothing: antialiased; overflow-x: hidden; }
a { text-decoration: none; color: inherit; }
.wrap { width: 100%; max-width: 1100px; margin: 0 auto; padding: 0 28px; }
.wrap-narrow { width: 100%; max-width: 760px; margin: 0 auto; padding: 0 28px; }

/* ── SCROLL REVEAL ── */
.fade { opacity: 0; transform: translateY(22px) scale(.98);
  transition: opacity .7s var(--e2), transform .7s var(--e2); }
.fade.in { opacity: 1; transform: none; }

/* ── NAV ── */
.me-nav { position: sticky; top: 0; z-index: 400; background: rgba(255,255,255,.97);
  backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); transition: box-shadow .28s; }
.me-nav.scrolled { box-shadow: 0 2px 20px rgba(26,37,64,.08); }
.me-nav-inner { display: flex; align-items: center; height: 68px; max-width: 1100px;
  margin: 0 auto; padding: 0 28px; gap: 32px; }
.me-logo { font-family: var(--d); font-weight: 800; font-size: 20px; letter-spacing: -.03em; color: #111; }
.me-logo em { font-style: normal; color: var(--violet); }
.me-nav-links { display: flex; align-items: center; gap: 24px; flex: 1; }
.me-nav-links a { font-size: 14px; font-weight: 500; color: #555; transition: color .18s; }
.me-nav-links a:hover, .me-nav-links a.active { color: var(--violet); }
.nav-yt { display: inline-flex; align-items: center; gap: 6px; background: #FF0000;
  color: #fff; font-family: var(--d); font-weight: 700; font-size: 13px;
  padding: 8px 18px; border-radius: 8px; transition: background .2s; margin-left: auto; }
.nav-yt:hover { background: #cc0000; }
.nav-hamburger { display: none; flex-direction: column; gap: 5px; background: none;
  border: none; cursor: pointer; padding: 4px; margin-left: 12px; flex-shrink: 0; }
.nav-hamburger span { display: block; width: 22px; height: 2px; background: #111;
  border-radius: 2px; transition: all .25s; }
.nav-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-hamburger.open span:nth-child(2) { opacity: 0; }
.nav-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
.me-nav-mobile { display: none; position: absolute; top: 68px; left: 0; right: 0;
  background: #fff; border-bottom: 1px solid var(--border);
  box-shadow: 0 8px 24px rgba(0,0,0,.08); z-index: 399; padding: 16px 28px 20px;
  flex-direction: column; }
.me-nav-mobile.open { display: flex; }
.me-nav-mobile a { font-size: 15px; font-weight: 600; color: #333; padding: 12px 0;
  border-bottom: 1px solid var(--border); transition: color .18s; }
.me-nav-mobile a:last-child { border-bottom: none; }
.me-nav-mobile a:hover, .me-nav-mobile a.active { color: var(--violet); }

/* ── HERO ── */
.ab-hero { padding: 72px 0 56px; border-bottom: 1px solid var(--border); }
.ab-hero-inner { display: grid;
  grid-template-columns: 1fr auto; gap: 56px; align-items: center; }
.ab-hero-left {}
.ab-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-family: var(--d);
  font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: .12em;
  color: var(--violet); background: var(--vl);
  padding: 6px 16px; border-radius: 50px; margin-bottom: 24px; }
.ab-hero h1 { font-family: var(--d); font-size: clamp(36px,5vw,58px); font-weight: 800;
  color: #111; line-height: 1.06; letter-spacing: -.04em; margin-bottom: 20px; }
.ab-hero h1 em { font-style: normal; color: var(--violet); }
.ab-hero-hindi { font-family: var(--h); font-size: 16px; font-weight: 700; color: var(--sfdeep);
  border-left: 3px solid var(--sfdeep); padding-left: 14px; display: block; margin-bottom: 16px; line-height: 1.6; }
.ab-hero-sub { font-size: 18px; line-height: 1.8; color: #555;
  max-width: 520px; }

/* Photo placeholder */
.ab-photo-wrap { width: 200px; flex-shrink: 0; }
.ab-photo-placeholder { width: 200px; height: 240px; border-radius: 20px;
  background: var(--vl);
  border: 1.5px solid var(--border);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  gap: 12px; text-align: center; padding: 20px; }
.ab-photo-icon { font-size: 40px; opacity: .7; }
.ab-photo-label { font-size: 11px; color: var(--muted); font-weight: 600;
  text-transform: uppercase; letter-spacing: .1em; line-height: 1.4; }

/* ── CREDENTIAL BAR ── */
.ab-credentials { background: var(--off); border-bottom: 1px solid var(--border); padding: 20px 0; }
.ab-cred-inner { display: flex; align-items: center; gap: 40px; flex-wrap: wrap; justify-content: center; }
.ab-cred-item { display: flex; align-items: center; gap: 10px; }
.ab-cred-icon { font-size: 20px; }
.ab-cred-text { font-size: 13px; font-weight: 600; color: var(--navy); }
.ab-cred-text span { color: var(--muted); font-weight: 400; }
.ab-cred-divider { width: 1px; height: 24px; background: var(--border); }

/* ── SECTIONS SHARED ── */
.ab-section { padding: 72px 0; }
.ab-section + .ab-section { border-top: 1px solid var(--border); }
.ab-section-eyebrow { font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .12em; color: var(--violet); margin-bottom: 14px; }
.ab-section-title { font-family: var(--d); font-size: clamp(24px,3vw,36px); font-weight: 800;
  color: #111; line-height: 1.12; letter-spacing: -.03em; margin-bottom: 20px; }
.ab-section-body { font-size: 16px; line-height: 1.85; color: #333; }
.ab-section-body p + p { margin-top: 16px; }
.ab-section-body strong { color: #111; font-weight: 700; }

/* ── LONDON SECTION ── */
.ab-london { background: #fff; }
.ab-london-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }
.ab-london-stat-block { display: flex; flex-direction: column; gap: 28px; margin-top: 8px; }
.ab-london-stat { padding: 24px; background: var(--off); border: 1.5px solid var(--border);
  border-radius: 14px; border-left: 4px solid var(--violet);
  opacity: 0; transform: translateX(20px);
  transition: opacity .7s var(--e2), transform .7s var(--e2); }
.ab-london-stat.in { opacity: 1; transform: none; }
.ab-london-stat-num { font-family: var(--d); font-size: 36px; font-weight: 800;
  color: var(--violet); letter-spacing: -.04em; line-height: 1; margin-bottom: 6px; }
.ab-london-stat-label { font-size: 13px; color: var(--muted); line-height: 1.5; }

/* ── METHODOLOGY ── */
.ab-method { background: var(--off); }
.ab-method-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 24px; margin-top: 48px; }
.ab-method-card { background: #fff; border: 1.5px solid var(--border); border-radius: 16px;
  padding: 28px 24px;
  opacity: 0; transform: translateY(16px) scale(.97);
  transition: opacity .7s var(--e2), transform .7s var(--e2),
              box-shadow .22s var(--e2); }
.ab-method-card.in { opacity: 1; transform: none; }
.ab-method-card:hover { box-shadow: 0 8px 24px rgba(102,51,221,.1); transform: translateY(-3px) scale(1.01); }
.ab-method-icon { font-size: 32px; display: block; margin-bottom: 16px;
  font-family: "Apple Color Emoji","Segoe UI Emoji","Noto Color Emoji",sans-serif; }
.ab-method-title { font-family: var(--d); font-size: 16px; font-weight: 800;
  color: #111; margin-bottom: 10px; letter-spacing: -.01em; }
.ab-method-desc { font-size: 14px; color: var(--muted); line-height: 1.7; }

/* ── YOUTUBE CTA ── */
.ab-yt { background: var(--navy); padding: 72px 0; position: relative; overflow: hidden; }
.ab-yt::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(255,0,0,.08) 0%, transparent 70%);
  pointer-events: none;
}
.ab-yt-inner { position: relative; text-align: center; }
.ab-yt-eyebrow { display: inline-block; font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .12em; color: rgba(255,255,255,.5); margin-bottom: 20px; }
.ab-yt-title { font-family: var(--d); font-size: clamp(26px,3.5vw,42px); font-weight: 800;
  color: #fff; letter-spacing: -.03em; line-height: 1.1; margin-bottom: 16px; }
.ab-yt-sub { font-size: 16px; color: rgba(255,255,255,.55); max-width: 480px;
  margin: 0 auto 36px; line-height: 1.7; }
.ab-yt-hindi { font-family: var(--h); font-size: 14px; color: #C97A10;
  margin-bottom: 36px; display: block; }
.ab-yt-btn { display: inline-flex; align-items: center; gap: 10px;
  background: #FF0000; color: #fff; font-family: var(--d); font-size: 16px; font-weight: 800;
  padding: 16px 36px; border-radius: 50px; transition: background .2s, transform .15s; }
.ab-yt-btn:hover { background: #CC0000; color: #fff; transform: translateY(-2px); }
.ab-yt-btn svg { width: 20px; height: 20px; fill: #fff; }
.ab-yt-stats { display: flex; justify-content: center; gap: 40px; margin-top: 40px; flex-wrap: wrap; }
.ab-yt-stat-num { font-family: var(--d); font-size: 24px; font-weight: 800; color: #fff; display: block; }
.ab-yt-stat-label { font-size: 12px; color: rgba(255,255,255,.4); text-transform: uppercase; letter-spacing: .08em; }

/* ── CONTACT ── */
.ab-contact { background: #fff; padding: 72px 0 80px; }
.ab-contact-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 64px; align-items: start; }
.ab-contact-left {}
.ab-contact-taglines { margin-top: 24px; display: flex; flex-direction: column; gap: 14px; }
.ab-contact-tagline { display: flex; align-items: flex-start; gap: 12px;
  font-size: 14px; color: var(--muted); line-height: 1.6; }
.ab-contact-tagline-icon { font-size: 18px; flex-shrink: 0; margin-top: 1px; }
.ab-contact-form-wrap { background: var(--off); border: 1.5px solid var(--border);
  border-radius: 20px; padding: 36px; }
.ab-contact-form-title { font-family: var(--d); font-size: 18px; font-weight: 800;
  color: #111; margin-bottom: 6px; }
.ab-contact-form-sub { font-size: 14px; color: var(--muted); margin-bottom: 28px; line-height: 1.6; }

/* ── FOOTER ── */
footer.me-footer { background: var(--navy); padding: 52px 0 0; }
.foot-grid { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr; gap: 40px;
  max-width: 1100px; margin: 0 auto; padding: 0 28px 40px;
  border-bottom: 1px solid rgba(255,255,255,.08); }
.foot-logo { font-family: var(--d); font-size: 20px; font-weight: 800; color: #fff;
  margin-bottom: 8px; display: block; letter-spacing: -.025em; }
.foot-logo em { font-style: normal; color: var(--vm); }
.foot-hi { font-family: var(--h); font-size: 13px; color: rgba(201,122,16,.78); margin-bottom: 10px; }
.foot-desc { font-size: 13px; line-height: 1.7; max-width: 260px; color: rgba(255,255,255,.5); }
.foot-col h4 { font-family: var(--d); font-size: 13px; font-weight: 700; color: #fff; margin-bottom: 14px; }
.foot-col ul { list-style: none; }
.foot-col li { margin-bottom: 9px; }
.foot-col a { font-size: 13px; color: rgba(255,255,255,.55); transition: color .18s; }
.foot-col a:hover { color: #fff; }
.foot-bottom { display: flex; align-items: center; justify-content: space-between;
  max-width: 1100px; margin: 0 auto; padding: 20px 28px; flex-wrap: wrap; gap: 12px; }
.foot-copy { font-size: 12px; color: rgba(255,255,255,.4); }

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
  .ab-hero-inner { grid-template-columns: 1fr; }
  .ab-photo-wrap { display: none; }
  .ab-london-grid { grid-template-columns: 1fr; gap: 40px; }
  .ab-method-grid { grid-template-columns: 1fr 1fr; }
  .ab-contact-grid { grid-template-columns: 1fr; gap: 40px; }
}
@media (max-width: 640px) {
  .wrap, .wrap-narrow { padding: 0 18px; }
  .me-nav-links { display: none; }
  .nav-hamburger { display: flex; }
  .ab-hero { padding: 52px 0 48px; }
  .ab-section { padding: 52px 0; }
  .ab-method-grid { grid-template-columns: 1fr; }
  .ab-cred-divider { display: none; }
  .ab-cred-inner { gap: 20px; justify-content: flex-start; }
  .foot-grid { grid-template-columns: 1fr 1fr; padding: 0 18px 32px; }
  .ab-contact-form-wrap { padding: 24px 20px; }
}
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
}
</style>
</head>
<body <?php body_class('about-page'); ?>>
<?php wp_body_open(); ?>

<!-- NAV -->
<nav class="me-nav" id="me-nav" style="position:relative">
  <div class="me-nav-inner">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="me-logo">Maninder<em>English</em></a>
    <div class="me-nav-links">
      <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
      <a href="<?php echo esc_url( home_url('/levels/') ); ?>">Levels</a>
    
      <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a>
      <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Vocabulary</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="active">About</a>
      <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>">Quizzes</a>
    </div>
    <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="nav-yt">▶ YouTube</a>
    <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="me-nav-mobile" id="me-nav-mobile">
    <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
    <a href="<?php echo esc_url( home_url('/levels/') ); ?>">Levels</a>
   
    <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a>
    <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Vocabulary</a>
    <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="active">About</a>
    <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>">Quizzes</a>
  </div>
</nav>

<!-- HERO -->
<section class="ab-hero">
  <div class="wrap">
    <div class="ab-hero-inner">
      <div class="ab-hero-left">
        <div class="ab-eyebrow">👋 About Maninder</div>
        <h1>English +<br>Psychology<br>= <em>Fluency</em></h1>
        <span class="ab-hero-hindi">मैंने London में 13 साल काम किया — यह platform उसी experience से बना है</span>
        <p class="ab-hero-sub">I spent 13 years navigating British corporate culture as an Indian professional. I built this platform so you don't have to figure it out alone.</p>
      </div>
      <div class="ab-photo-wrap">
        <div class="ab-photo-placeholder">
          <span class="ab-photo-icon">📷</span>
          <span class="ab-photo-label">Add your photo here</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CREDENTIAL BAR -->
<div class="ab-credentials">
  <div class="wrap">
    <div class="ab-cred-inner">
      <div class="ab-cred-item">
        <span class="ab-cred-icon">🎓</span>
        <span class="ab-cred-text">Psychology & Economics <span>Graduate</span></span>
      </div>
      <div class="ab-cred-divider"></div>
      <div class="ab-cred-item">
        <span class="ab-cred-icon">🇬🇧</span>
        <span class="ab-cred-text">13 Years <span>London Corporate</span></span>
      </div>
      <div class="ab-cred-divider"></div>
      <div class="ab-cred-item">
        <span class="ab-cred-icon">🧠</span>
        <span class="ab-cred-text">Cognitive Psychology <span>Based Method</span></span>
      </div>
      <div class="ab-cred-divider"></div>
      <div class="ab-cred-item">
        <span class="ab-cred-icon">🇮🇳</span>
        <span class="ab-cred-text">Built for <span>Indian Professionals</span></span>
      </div>
    </div>
  </div>
</div>

<!-- THE LONDON EXPERIENCE -->
<section class="ab-section ab-london">
  <div class="wrap">
    <div class="ab-london-grid">
      <div>
        <p class="ab-section-eyebrow">The London Experience</p>
        <h2 class="ab-section-title">I saw the ceiling. I understood why.</h2>
        <div class="ab-section-body">
          <p>Over 13 years working in British corporate environments, I watched brilliant Indian professionals consistently hit an invisible ceiling — not because they lacked intelligence, skill, or ambition, but because they were mentally translating from Hindi to English in real time.</p>
          <p>They were saying the right words but missing the cultural and psychological nuances that define British professional communication. The hesitation before speaking. The overly formal phrasing in casual meetings. The literal translation that landed differently than intended.</p>
          <p><strong>The gap wasn't grammar. It was psychology.</strong> And nobody was addressing it directly, in a language and context that made sense to an Indian learner.</p>
        </div>
      </div>
      <div class="ab-london-stat-block">
        <div class="ab-london-stat">
          <div class="ab-london-stat-num">13</div>
          <div class="ab-london-stat-label">Years working in British corporate environments in London</div>
        </div>
        <div class="ab-london-stat">
          <div class="ab-london-stat-num">1</div>
          <div class="ab-london-stat-label">Core insight: the problem is translation habit, not vocabulary</div>
        </div>
        <div class="ab-london-stat">
          <div class="ab-london-stat-num">0</div>
          <div class="ab-london-stat-label">Platforms addressing British English through a psychology + Hindi lens — so I built one</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- THE METHODOLOGY -->
<section class="ab-section ab-method">
  <div class="wrap">
    <p class="ab-section-eyebrow">The Methodology</p>
    <h2 class="ab-section-title">Why psychology changes everything</h2>
    <p class="ab-section-body" style="max-width:620px">My background in Psychology and Economics isn't just a credential — it's the engine behind how this platform is designed. Every lesson, quiz, and flashcard is built around how the brain actually learns language.</p>

    <div class="ab-method-grid">
      <div class="ab-method-card">
        <span class="ab-method-icon">🔄</span>
        <div class="ab-method-title">Breaking the Translation Habit</div>
        <div class="ab-method-desc">Most Indian learners think in Hindi and translate. This site is built to interrupt that pattern — teaching you to feel the correct phrase, not calculate it. Hindi explanations are a bridge, not a crutch.</div>
      </div>
      <div class="ab-method-card">
        <span class="ab-method-icon">🧠</span>
        <div class="ab-method-title">Cognitive Load Theory</div>
        <div class="ab-method-desc">Lessons are short, focused, and built around one mistake at a time. Your working memory can only hold so much. We reduce noise and maximise what sticks — the psychology of fluency, not the grammar of exams.</div>
      </div>
      <div class="ab-method-card">
        <span class="ab-method-icon">⏱️</span>
        <div class="ab-method-title">Spaced Repetition (SRS)</div>
        <div class="ab-method-desc">The vocabulary flashcard system uses the SM-2 algorithm — the same science behind Anki. Your brain is shown words at the exact moment they're about to fade, building durable long-term memory rather than short-term recognition.</div>
      </div>
    </div>
  </div>
</section>

<!-- YOUTUBE CTA -->
<section class="ab-yt">
  <div class="wrap ab-yt-inner">
    <span class="ab-yt-eyebrow">YouTube Channel</span>
    <h2 class="ab-yt-title">Watch the lessons.<br>Hear the English.</h2>
    <p class="ab-yt-sub">Every lesson on this site has a companion video on YouTube — explained in the same psychology-first, Hindi-clarity style. Free. Always.</p>
    <span class="ab-yt-hindi">YouTube पर Hindi में English सीखो — free, हमेशा</span>
    <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="ab-yt-btn">
      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
      Subscribe — English with Maninder
    </a>
    <div class="ab-yt-stats">
      <div>
        <span class="ab-yt-stat-num">Free</span>
        <span class="ab-yt-stat-label">All videos</span>
      </div>
      <div>
        <span class="ab-yt-stat-num">Hindi</span>
        <span class="ab-yt-stat-label">Explanations</span>
      </div>
      <div>
        <span class="ab-yt-stat-num">Real</span>
        <span class="ab-yt-stat-label">British English</span>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT / WORK WITH ME -->
<section class="ab-contact">
  <div class="wrap">
    <div class="ab-contact-grid">
      <div class="ab-contact-left">
        <p class="ab-section-eyebrow">Get in Touch</p>
        <h2 class="ab-section-title">Work with me</h2>
        <div class="ab-section-body">
          <p>Whether you're interested in collaboration, content partnership, or have a question about the platform — I read every message.</p>
        </div>
        <div class="ab-contact-taglines">
          <div class="ab-contact-tagline">
            <span class="ab-contact-tagline-icon">🤝</span>
            <span>Content collaborations and partnerships</span>
          </div>
          <div class="ab-contact-tagline">
            <span class="ab-contact-tagline-icon">🎓</span>
            <span>Corporate English training for teams</span>
          </div>
          <div class="ab-contact-tagline">
            <span class="ab-contact-tagline-icon">📹</span>
            <span>YouTube collaboration and guest appearances</span>
          </div>
          <div class="ab-contact-tagline">
            <span class="ab-contact-tagline-icon">💬</span>
            <span>General questions about the platform</span>
          </div>
        </div>
      </div>
      <div>
        <div class="ab-contact-form-wrap">
          <div class="ab-contact-form-title">Send a message</div>
          <div class="ab-contact-form-sub">I'll get back to you within 48 hours.</div>
          <?php
          // Replace the shortcode below with your actual SureForms shortcode
          // Find it in WP Admin → SureForms → Forms → hover the form → note the ID
          // Example: echo do_shortcode('[sureforms id="1"]');
          echo do_shortcode('[sureforms id="1"]');
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="me-footer">
  <div class="foot-grid">
    <div>
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="foot-logo">Maninder<em>English</em></a>
      <div class="foot-hi">English + Psychology = Fluency</div>
      <p class="foot-desc">Psychology-based English for Indian professionals. 13 years of real British workplace experience.</p>
    </div>
    <div class="foot-col"><h4>Learn</h4><ul>
      <li><a href="<?php echo esc_url( home_url('/levels/') ); ?>">Choose Your Level</a></li>
    
      <li><a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a></li>
      <li><a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Vocabulary</a></li>
    </ul></div>
    <div class="foot-col"><h4>Tools</h4><ul>
      <li><a href="<?php echo esc_url( home_url('/grammar-checker/') ); ?>">Grammar Checker</a></li>
      <li><a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Flashcards</a></li>
      <li><a href="<?php echo esc_url( home_url('/quizzes/') ); ?>">Quizzes</a></li>
    </ul></div>
    <div class="foot-col"><h4>Connect</h4><ul>
      <li><a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener">▶ YouTube</a></li>
      <li><a href="<?php echo esc_url( home_url('/about/') ); ?>">About Maninder</a></li>
      <li><a href="<?php echo esc_url( home_url('/contact/') ); ?>">Contact</a></li>
    </ul></div>
  </div>
  <div class="foot-bottom">
    <span class="foot-copy">© <?php echo date('Y'); ?> Maninder English · maninderenglish.com</span>
  </div>
</footer>

<script>
(function(){
  const nav = document.getElementById('me-nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });
  const btn = document.getElementById('nav-hamburger');
  const mob = document.getElementById('me-nav-mobile');
  if (btn && mob) {
    btn.addEventListener('click', () => {
      btn.classList.toggle('open');
      mob.classList.toggle('open');
    });
  }
  /* ── Scroll reveal with stagger ── */
  const revealObs = new IntersectionObserver((entries, obs) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      // Stagger siblings in same parent
      const siblings = Array.from((el.parentElement || {}).children || [])
        .filter(c => c.classList.contains('ab-method-card') ||
                     c.classList.contains('ab-london-stat'));
      const idx = siblings.indexOf(el);
      if (idx > 0) el.style.transitionDelay = (idx * 0.12) + 's';
      el.classList.add('in');
      obs.unobserve(el);
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.ab-method-card, .ab-london-stat').forEach(el => {
    revealObs.observe(el);
  });
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
