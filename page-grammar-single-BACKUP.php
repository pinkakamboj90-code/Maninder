<?php
/**
 * Template: Maninder English — Grammar Lesson Single
 * Routes: grammar_lesson CPT → /grammar/[topic]/[slug]/
 * Reusable: content comes from WP editor (Code Editor view)
 * Meta fields: _me_read_time, _me_lesson_number, _me_youtube_url,
 *              _me_hindi_subtitle, _me_quiz_count
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$post_id      = get_the_ID();
$read_time    = get_post_meta( $post_id, '_me_read_time',      true ) ?: '8 min';
$lesson_num   = get_post_meta( $post_id, '_me_lesson_number',  true ) ?: '01';
$youtube_url  = get_post_meta( $post_id, '_me_youtube_url',    true ) ?: 'https://www.youtube.com/@englishwithmaninder';
$hindi_sub    = get_post_meta( $post_id, '_me_hindi_subtitle', true ) ?: '';
$quiz_count   = get_post_meta( $post_id, '_me_quiz_count',     true ) ?: '';

// Taxonomy data
$topics  = get_the_terms( $post_id, 'grammar_topic' );
$levels  = get_the_terms( $post_id, 'grammar_level' );
$topic   = ( $topics && ! is_wp_error( $topics ) ) ? $topics[0] : null;
$level   = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : 'Professional';

$topic_label = $topic ? $topic->name : 'Grammar';
$topic_url   = $topic ? get_term_link( $topic ) : home_url( '/grammar/' );

$lesson_num_pad = str_pad( $lesson_num, 2, '0', STR_PAD_LEFT );
$quiz_meta      = $quiz_count ? "{$quiz_count} practice questions" : '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php the_title(); ?> — Maninder English</title>
<?php wp_head(); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&family=Lora:ital,wght@0,400;0,600;1,400;1,600&display=swap');

/* ══════════════════════════════════════════════════════
   MANINDER ENGLISH — GRAMMAR LESSON TEMPLATE v1.0
   Inherits design tokens from existing lesson system.
   ══════════════════════════════════════════════════════ */
:root{
  --white:#FFFFFF;
  --off:#F8F7F4;
  --navy:#1A2540;
  --border:#E8E4DC;
  --violet:#6633DD;
  --vm:#8B6CF6;
  --vl:#EDE8FB;
  --vd:#5220C8;
  --sfdeep:#B5470F;
  --sbg:#FEF3C7;
  --b-solid:#2563EB;
  --b-tint:#EFF6FF;
  --b-card:#E8F0FE;
  --b-pill:#BFDBFE;
  --b-deep:#1E3A8A;
  --g-solid:#059669;
  --g-tint:#ECFDF5;
  --g-card:#E6F4EE;
  --r-solid:#DC2626;
  --r-tint:#FEF2F2;
  --r-card:#FEE2E2;
  --a-solid:#D97706;
  --a-tint:#FFFBEB;
  --a-card:#FEF3E2;
  --muted:#64748B;
  --d:'Plus Jakarta Sans',sans-serif;
  --b:'Inter',sans-serif;
  --h:'Noto Sans Devanagari',sans-serif;
  --s:'Lora',serif;
  --e2:cubic-bezier(.4,0,.2,1);
  --e3:cubic-bezier(.16,1,.3,1);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:var(--b);background:#fff;color:#111;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{text-decoration:none;color:inherit}
.wrap{width:100%;max-width:740px;margin:0 auto;padding:0 28px}
.wrap-wide{width:100%;max-width:1100px;margin:0 auto;padding:0 28px}

/* ── READING PROGRESS ── */
#read-bar{position:fixed;top:0;left:0;height:3px;width:0;z-index:9999;
  background:linear-gradient(90deg,var(--violet),var(--vm));
  transition:width .05s linear;border-radius:0 2px 2px 0}

/* ── NAV ── */
.me-nav{position:sticky;top:0;z-index:400;background:rgba(255,255,255,.97);
  backdrop-filter:blur(20px);border-bottom:1px solid var(--border);
  transition:box-shadow .28s}
.me-nav.scrolled{box-shadow:0 2px 20px rgba(26,37,64,.08)}
.me-nav-wrap{display:flex;align-items:center;height:64px;max-width:1100px;
  margin:0 auto;padding:0 28px;gap:16px}
.me-logo{font-family:var(--d);font-weight:800;font-size:20px;letter-spacing:-.03em;
  color:#111;flex-shrink:0}
.me-logo em{font-style:normal;color:var(--violet)}
.nav-sep{color:#ddd;flex-shrink:0}
.nav-lesson-title{font-size:13px;font-weight:500;color:#888;flex:1;
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.nav-yt{display:inline-flex;align-items:center;gap:6px;background:#FF0000;
  color:#fff;font-family:var(--d);font-weight:700;font-size:13px;
  padding:8px 16px;border-radius:8px;flex-shrink:0;transition:background .2s}
.nav-yt:hover{background:#cc0000}

/* ── GRAMMAR LESSON HERO ── */
.lesson-hero{padding:56px 0 48px;border-bottom:1px solid var(--border)}
.lh-breadcrumb{display:flex;align-items:center;gap:8px;font-size:13px;
  color:#888;margin-bottom:20px;flex-wrap:wrap}
.lh-breadcrumb a{color:var(--violet);font-weight:500}
.lh-breadcrumb span{color:#ccc}
.lh-pill{display:inline-flex;align-items:center;gap:6px;font-family:var(--d);
  font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;
  padding:5px 14px;border-radius:50px;margin-bottom:20px}
.lh-pill-grammar{background:var(--vl);color:var(--violet)}
.lh-pill-professional{background:#FEF3C7;color:#92400E}
.lesson-hero h1{font-family:var(--d);font-size:clamp(28px,4vw,44px);
  font-weight:800;color:#111;line-height:1.12;letter-spacing:-.03em;margin-bottom:12px}
.lesson-hero h1 em{font-style:normal;color:var(--r-solid)}
.lesson-hero h1 em.v{font-style:normal;color:var(--violet)}
.lh-hi{font-family:var(--h);font-size:17px;font-weight:700;color:var(--sfdeep);
  border-left:3px solid var(--sfdeep);padding-left:12px;display:block;
  margin-bottom:24px;line-height:1.5}
.lh-meta{display:flex;align-items:center;gap:20px;flex-wrap:wrap;margin-bottom:28px}
.lh-meta-item{display:flex;align-items:center;gap:6px;font-size:13px;
  color:#666;font-weight:500}
.lh-meta-dot{width:8px;height:8px;border-radius:50%}
.lh-intro{font-size:18px;line-height:1.78;color:#444;font-family:var(--b);
  max-width:640px}
.lh-yt-cta{display:inline-flex;align-items:center;gap:8px;background:#FF0000;
  color:#fff;font-family:var(--d);font-weight:700;font-size:15px;
  padding:13px 28px;border-radius:12px;margin-top:28px;
  transition:background .2s,transform .2s}
.lh-yt-cta:hover{background:#cc0000;transform:translateY(-2px)}

/* ── TWO-COLUMN LAYOUT ── */
.lesson-layout{display:grid;grid-template-columns:1fr 220px;gap:52px;
  max-width:1040px;margin:0 auto;padding:0 28px;align-items:start}
.lesson-content{min-width:0;padding:52px 0 80px}
.lesson-sidebar{padding:52px 0;position:sticky;top:80px}

/* ── SIDEBAR TOC ── */
.ls-toc{background:var(--off);border-radius:16px;padding:20px 22px;
  border:1px solid var(--border)}
.ls-toc h4{font-family:var(--d);font-size:11px;font-weight:800;text-transform:uppercase;
  letter-spacing:.1em;color:#888;margin-bottom:14px}
.toc-item{display:flex;align-items:center;gap:10px;padding:7px 0;
  border-bottom:1px solid var(--border);cursor:pointer;transition:color .18s}
.toc-item:last-child{border:none}
.toc-num{font-family:var(--d);font-size:11px;font-weight:800;color:#ccc;
  flex-shrink:0;min-width:18px}
.toc-label{font-size:13px;color:#666;line-height:1.35;transition:color .18s}
.toc-item:hover .toc-label,.toc-item.active .toc-label{color:var(--violet);font-weight:600}
.toc-item.active .toc-num{color:var(--violet)}
.ls-share{margin-top:20px}
.ls-share h4{font-family:var(--d);font-size:11px;font-weight:800;text-transform:uppercase;
  letter-spacing:.1em;color:#888;margin-bottom:12px}
.share-yt{display:flex;align-items:center;gap:8px;background:#FF0000;color:#fff;
  font-family:var(--d);font-weight:700;font-size:13px;padding:10px 16px;
  border-radius:10px;transition:background .2s;width:100%;
  justify-content:center;border:none;cursor:pointer;text-decoration:none}
.share-yt:hover{background:#cc0000}

/* ── LESSON SECTIONS — SCROLL REVEAL ── */
.l-section{margin-bottom:60px;opacity:0;transform:translateY(22px);
  transition:opacity .6s var(--e2),transform .6s var(--e2)}
.l-section.in{opacity:1;transform:none}

.l-section-label{display:flex;align-items:center;gap:10px;margin-bottom:18px}
.l-section-num{width:32px;height:32px;border-radius:10px;background:var(--vl);
  color:var(--violet);font-family:var(--d);font-size:13px;font-weight:800;
  display:flex;align-items:center;justify-content:center;flex-shrink:0}
.l-section-tag{font-size:11px;font-weight:800;text-transform:uppercase;
  letter-spacing:.1em;color:var(--violet)}

.l-section h2{font-family:var(--d);font-size:clamp(22px,3vw,30px);font-weight:800;
  color:#111;letter-spacing:-.025em;margin-bottom:16px;line-height:1.15}
.l-section p{font-size:17px;line-height:1.78;color:#444;margin-bottom:16px}
.l-section p:last-child{margin-bottom:0}
.l-section ul{padding-left:0;list-style:none;margin:16px 0}
.l-section ul li{font-size:17px;line-height:1.78;color:#444;padding:6px 0 6px 24px;
  position:relative}
.l-section ul li::before{content:'→';position:absolute;left:0;color:var(--violet);
  font-weight:700}

/* ── PULL QUOTE ── */
.pull-quote{margin:32px 0;padding:24px 28px 24px 24px;
  border-left:4px solid var(--violet);background:var(--vl);
  border-radius:0 12px 12px 0}
.pull-quote p{font-family:var(--s);font-size:19px;font-style:italic;
  color:#333;line-height:1.65;margin:0}
.pull-quote cite{font-family:var(--b);font-size:13px;font-weight:600;
  color:var(--violet);display:block;margin-top:10px;font-style:normal}

/* ── HINDI CALLOUT ── */
.hindi-note{background:var(--a-tint);border:1.5px solid #FDE68A;border-radius:12px;
  padding:18px 20px;margin:24px 0;display:flex;gap:14px;align-items:flex-start}
.hindi-note-icon{font-size:20px;flex-shrink:0;margin-top:2px}
.hindi-note-label{font-size:11px;font-weight:800;text-transform:uppercase;
  letter-spacing:.1em;color:var(--a-solid);margin-bottom:6px}
.hindi-note p{font-family:var(--h);font-size:16px;color:#333;line-height:1.65;
  margin:0;font-weight:600}
.hindi-note p.en-note{font-family:var(--b);font-size:14px;color:#666;
  line-height:1.6;margin-top:8px;font-weight:400}

/* ── CORRECT / WRONG EXAMPLE PAIR ── */
.example-pair{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin:28px 0}
.example-card{border-radius:14px;padding:20px 22px}
.ex-wrong{background:var(--r-tint);border:1.5px solid #FECACA}
.ex-right{background:var(--g-tint);border:1.5px solid #A7F3D0}
.ex-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.12em;margin-bottom:10px;display:flex;align-items:center;gap:6px}
.ex-label-wrong{color:var(--r-solid)}
.ex-label-right{color:var(--g-solid)}
.ex-sentence{font-family:var(--d);font-size:17px;font-weight:700;
  line-height:1.35;margin-bottom:8px}
.ex-wrong .ex-sentence{color:var(--r-solid)}
.ex-right .ex-sentence{color:var(--g-solid)}
.ex-explanation{font-size:14px;color:#555;line-height:1.55}
.ex-hindi{font-family:var(--h);font-size:13px;color:var(--sfdeep);
  font-weight:600;margin-top:6px}

/* ── SVG DIAGRAM CONTAINER ── */
.svg-diagram{margin:36px 0;border-radius:16px;overflow:hidden;
  background:#F8F7F4;border:1.5px solid var(--border)}
.svg-diagram-label{font-family:var(--d);font-size:11px;font-weight:800;
  text-transform:uppercase;letter-spacing:.12em;color:var(--muted);
  padding:14px 20px 0;display:block}
.svg-diagram svg{display:block;width:100%;height:auto}
.svg-caption{font-size:13px;color:var(--muted);padding:0 20px 14px;
  line-height:1.55;margin-top:-4px}

/* ── RULE BOX (dark) ── */
.rule-box{background:#111;border-radius:16px;padding:28px 32px;margin:32px 0;color:#fff}
.rule-box-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.14em;color:var(--vm);margin-bottom:14px}
.rule-box h3{font-family:var(--d);font-size:20px;font-weight:800;color:#fff;
  margin-bottom:12px;line-height:1.25}
.rule-box p{font-size:16px;color:rgba(255,255,255,.75);line-height:1.72;margin-bottom:12px}
.rule-box p:last-child{margin:0}
.rule-box strong{color:#fff;font-weight:700}
.rule-formula{font-family:var(--d);font-size:18px;font-weight:800;
  color:var(--vm);background:rgba(139,108,246,.15);border-radius:10px;
  padding:14px 18px;margin:16px 0;display:block;line-height:1.5;
  border:1px solid rgba(139,108,246,.3)}
.rule-formula span{color:#fff}
.rule-formula em{font-style:normal;color:#86EFAC}

/* ── PROFESSIONAL CONTEXT BOX ── */
.pro-context{background:linear-gradient(135deg,#1E3A8A 0%,#1e40af 100%);
  border-radius:16px;padding:24px 28px;margin:28px 0;color:#fff}
.pc-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.14em;color:#93C5FD;margin-bottom:12px}
.pc-scenario{font-family:var(--d);font-size:17px;font-weight:700;
  color:#fff;margin-bottom:8px;line-height:1.4}
.pc-why{font-size:15px;color:rgba(255,255,255,.72);line-height:1.65}

/* ── MEMORY TRICK ── */
.memory-trick{background:linear-gradient(135deg,#1A2540 0%,#2D3F6B 100%);
  border-radius:16px;padding:28px;margin:32px 0;position:relative;overflow:hidden}
.memory-trick::before{content:'💡';position:absolute;right:24px;top:20px;
  font-size:36px;opacity:.12}
.mt-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.14em;color:var(--vm);margin-bottom:12px}
.mt-text{font-family:var(--d);font-size:18px;font-weight:700;color:#fff;
  line-height:1.4;margin-bottom:10px}
.mt-sub{font-size:15px;color:rgba(255,255,255,.65);line-height:1.65}

/* ── PATTERN PROOF TABLE (shows rule fixing multiple errors) ── */
.pattern-table{width:100%;border-collapse:collapse;margin:28px 0;
  border-radius:14px;overflow:hidden;border:1.5px solid var(--border)}
.pattern-table thead th{background:var(--navy);color:#fff;font-family:var(--d);
  font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;
  padding:12px 16px;text-align:left}
.pattern-table tbody td{padding:14px 16px;font-size:15px;
  border-bottom:1px solid var(--border);vertical-align:top;line-height:1.5}
.pattern-table tbody tr:last-child td{border-bottom:none}
.pattern-table tbody tr:nth-child(even) td{background:var(--off)}
.pt-wrong{color:var(--r-solid);font-weight:600;font-family:var(--d)}
.pt-right{color:var(--g-solid);font-weight:600;font-family:var(--d)}
.pt-rule{font-size:13px;color:var(--muted)}

/* ── PRACTICE QUIZ ── */
.practice-section{background:var(--off);border-radius:20px;padding:32px;
  margin:40px 0;border:1.5px solid var(--border)}
.practice-label{font-size:11px;font-weight:800;text-transform:uppercase;
  letter-spacing:.12em;color:var(--violet);margin-bottom:6px}
.practice-section h3{font-family:var(--d);font-size:20px;font-weight:800;
  color:#111;margin-bottom:20px}
.pq-score-bar{display:flex;align-items:center;gap:12px;margin-bottom:24px;
  padding:14px 18px;background:#fff;border-radius:12px;border:1.5px solid var(--border)}
.pq-score-label{font-size:13px;font-weight:600;color:#888}
.pq-score-track{flex:1;height:6px;background:var(--border);border-radius:3px;overflow:hidden}
.pq-score-fill{height:100%;background:var(--g-solid);border-radius:3px;
  transition:width .5s var(--e3);width:0%}
.pq-score-num{font-family:var(--d);font-size:14px;font-weight:800;
  color:var(--violet);min-width:36px;text-align:right}
.practice-q{background:#fff;border-radius:14px;padding:22px;margin-bottom:16px;
  border:1.5px solid var(--border);transition:border-color .2s}
.pq-stem{font-size:16px;font-weight:600;color:#111;margin-bottom:14px;line-height:1.45}
.pq-options{display:flex;flex-direction:column;gap:8px}
.pq-opt{font-size:15px;padding:11px 16px;border-radius:10px;
  border:1.5px solid var(--border);cursor:pointer;transition:all .18s;
  display:flex;align-items:center;gap:10px;color:#333;background:#fff;
  font-family:var(--b);text-align:left;width:100%}
.pq-opt:hover:not([disabled]){border-color:var(--violet);background:var(--vl);color:var(--violet)}
.pq-opt.correct{border-color:var(--g-solid);background:var(--g-tint);
  color:var(--g-solid);font-weight:700}
.pq-opt.wrong{border-color:var(--r-solid);background:var(--r-tint);color:var(--r-solid)}
.pq-opt.dimmed{opacity:.38}
.pq-opt-icon{font-size:15px;flex-shrink:0;width:18px}
.pq-feedback{font-size:14px;margin-top:12px;padding:12px 14px;border-radius:8px;
  display:none;line-height:1.55;font-family:var(--h);font-size:15px}
.pq-feedback.correct{background:var(--g-card);color:#065F46;display:block}
.pq-feedback.wrong{background:var(--r-card);color:#991B1B;display:block}

/* ── KEY TAKEAWAYS ── */
.takeaways{margin:40px 0}
.takeaways h3{font-family:var(--d);font-size:20px;font-weight:800;
  color:#111;margin-bottom:20px}
.takeaway-item{display:flex;align-items:flex-start;gap:14px;margin-bottom:14px;
  padding:18px 20px;background:#fff;border-radius:12px;
  border:1.5px solid var(--border);transition:border-color .22s,transform .22s}
.takeaway-item:hover{border-color:var(--b-pill);transform:translateX(4px)}
.tk-num{width:28px;height:28px;border-radius:8px;background:var(--vl);
  color:var(--violet);font-family:var(--d);font-size:12px;font-weight:800;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px}
.tk-text{font-size:15px;color:#333;line-height:1.62;font-weight:500}

/* ── NEXT LESSON CTA ── */
.next-lesson{background:var(--navy);border-radius:20px;padding:36px 40px;
  margin:40px 0;display:flex;align-items:center;justify-content:space-between;
  gap:24px;flex-wrap:wrap}
.nl-left h3{font-family:var(--d);font-size:18px;font-weight:800;
  color:#fff;margin-bottom:6px}
.nl-left p{font-size:14px;color:rgba(255,255,255,.6);margin-bottom:0}
.nl-btn{display:inline-flex;align-items:center;gap:8px;background:var(--violet);
  color:#fff;font-family:var(--d);font-weight:700;font-size:15px;
  padding:12px 24px;border-radius:12px;transition:background .2s,transform .2s;
  white-space:nowrap}
.nl-btn:hover{background:var(--vm);transform:translateY(-2px)}

/* ── FOOTER ── */
footer.me-footer{background:var(--navy);padding:52px 0 0}
.foot-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr;gap:40px;
  max-width:1100px;margin:0 auto;padding:0 28px 40px;
  border-bottom:1px solid rgba(255,255,255,.08)}
.foot-logo{font-family:var(--d);font-size:20px;font-weight:800;color:#fff;
  margin-bottom:8px;display:block;letter-spacing:-.025em}
.foot-logo em{font-style:normal;color:var(--vm)}
.foot-hi{font-family:var(--h);font-size:13px;color:rgba(201,122,16,.78);margin-bottom:10px}
.foot-desc{font-size:13px;line-height:1.7;max-width:260px;color:rgba(255,255,255,.5)}
.foot-col h4{font-family:var(--d);font-size:13px;font-weight:700;
  color:#fff;margin-bottom:14px}
.foot-col ul{list-style:none}
.foot-col li{margin-bottom:9px}
.foot-col a{font-size:13px;color:rgba(255,255,255,.55);transition:color .18s}
.foot-col a:hover{color:#fff}
.foot-bottom{display:flex;align-items:center;justify-content:space-between;
  max-width:1100px;margin:0 auto;padding:20px 28px;flex-wrap:wrap;gap:12px}
.foot-copy{font-size:12px;color:rgba(255,255,255,.4)}

/* ── RESPONSIVE ── */
@media(max-width:860px){
  .lesson-layout{grid-template-columns:1fr}
  .lesson-sidebar{display:none}
}
@media(max-width:600px){
  .example-pair{grid-template-columns:1fr}
  .wrap,.wrap-wide{padding:0 18px}
  .lesson-hero{padding:36px 0 32px}
  .next-lesson{flex-direction:column;padding:28px}
  .foot-grid{grid-template-columns:1fr 1fr;padding:0 18px 32px}
  .rule-formula{font-size:15px}
  .pro-context{padding:20px}
}
@media(prefers-reduced-motion:reduce){
  *,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}
}
</style>
</head>
<body <?php body_class('grammar-lesson-single'); ?>>
<?php wp_body_open(); ?>
<div id="read-bar" aria-hidden="true"></div>

<!-- ── NAV ── -->
<nav class="me-nav" id="me-nav" aria-label="Site navigation">
  <div class="me-nav-wrap">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="me-logo">Maninder<em>English</em></a>
    <span class="nav-sep" aria-hidden="true">›</span>
    <span class="nav-lesson-title"><?php the_title(); ?></span>
    <?php if ( $youtube_url ) : ?>
    <a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" rel="noopener" class="nav-yt">▶ Watch on YouTube</a>
    <?php endif; ?>
  </div>
</nav>

<!-- ── HERO ── -->
<section class="lesson-hero">
  <div class="wrap">
    <nav class="lh-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url( home_url( '/grammar/' ) ); ?>">Grammar</a>
      <span aria-hidden="true">›</span>
      <?php if ( $topic ) : ?>
      <a href="<?php echo esc_url( $topic_url ); ?>"><?php echo esc_html( $topic->name ); ?></a>
      <span aria-hidden="true">›</span>
      <?php endif; ?>
      <span>Lesson <?php echo esc_html( $lesson_num_pad ); ?></span>
    </nav>

    <div class="lh-pill lh-pill-grammar">
      📖 <?php echo esc_html( $topic_label ); ?> · <?php echo esc_html( $level ); ?> · Lesson <?php echo esc_html( $lesson_num_pad ); ?>
    </div>

    <h1><?php the_title(); ?></h1>

    <?php if ( $hindi_sub ) : ?>
    <span class="lh-hi"><?php echo esc_html( $hindi_sub ); ?></span>
    <?php endif; ?>

    <div class="lh-meta">
      <div class="lh-meta-item">
        <div class="lh-meta-dot" style="background:#2563EB"></div>
        <?php echo esc_html( $read_time ); ?> read
      </div>
      <div class="lh-meta-item">
        <div class="lh-meta-dot" style="background:#059669"></div>
        <?php echo esc_html( $level ); ?>
      </div>
      <?php if ( $quiz_meta ) : ?>
      <div class="lh-meta-item">
        <div class="lh-meta-dot" style="background:#D97706"></div>
        <?php echo esc_html( $quiz_meta ); ?>
      </div>
      <?php endif; ?>
    </div>

    <?php
    $excerpt = get_the_excerpt();
    if ( $excerpt ) : ?>
    <p class="lh-intro"><?php echo esc_html( $excerpt ); ?></p>
    <?php endif; ?>

    <?php if ( $youtube_url ) : ?>
    <a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" rel="noopener" class="lh-yt-cta">▶ Watch the Video Lesson Free</a>
    <?php endif; ?>
  </div>
</section>

<!-- ── LESSON BODY ── -->
<div class="lesson-layout">
  <div class="lesson-content">
    <?php the_content(); ?>
  </div>

  <!-- ── SIDEBAR TOC (auto-populated by JS from .l-section elements) ── -->
  <div class="lesson-sidebar" id="lesson-sidebar">
    <div class="ls-toc">
      <h4>In this lesson</h4>
      <div id="toc-items"><!-- JS populates from .l-section[data-toc] elements --></div>
    </div>
    <?php if ( $youtube_url ) : ?>
    <div class="ls-share">
      <h4>Watch the lesson</h4>
      <a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" rel="noopener" class="share-yt">▶ Free on YouTube</a>
    </div>
    <?php endif; ?>
  </div>
</div>

<!-- ── FOOTER ── -->
<footer class="me-footer">
  <div class="foot-grid">
    <div>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="foot-logo">Maninder<em>English</em></a>
      <div class="foot-hi">English + Psychology = Fluency</div>
      <p class="foot-desc">Psychology-based English for Indian professionals. 7 years of real British workplace experience.</p>
    </div>
    <div class="foot-col"><h4>Learn</h4><ul>
      <li><a href="<?php echo esc_url( home_url( '/levels/' ) ); ?>">Choose Your Level</a></li>
      <li><a href="<?php echo esc_url( home_url( '/lessons/' ) ); ?>">All Lessons</a></li>
      <li><a href="<?php echo esc_url( home_url( '/grammar/' ) ); ?>">Grammar</a></li>
      <li><a href="<?php echo esc_url( home_url( '/vocabulary/' ) ); ?>">Vocabulary</a></li>
    </ul></div>
    <div class="foot-col"><h4>About</h4><ul>
      <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Maninder</a></li>
      <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
      <li><a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener">YouTube</a></li>
    </ul></div>
    <div class="foot-col"><h4>Connect</h4><ul>
      <li><a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener">▶ YouTube</a></li>
      <li><a href="#" aria-label="Instagram">Instagram</a></li>
      <li><a href="#" aria-label="Facebook">Facebook</a></li>
    </ul></div>
  </div>
  <div class="foot-bottom">
    <span class="foot-copy">© <?php echo date( 'Y' ); ?> Maninder English · maninderenglish.com</span>
  </div>
</footer>

<script>
(function(){
  'use strict';

  /* ── Reading progress bar ── */
  const bar = document.getElementById('read-bar');
  const nav = document.getElementById('me-nav');
  if(bar){
    window.addEventListener('scroll', ()=>{
      const s = document.documentElement;
      const pct = (s.scrollTop / (s.scrollHeight - s.clientHeight)) * 100;
      bar.style.width = Math.min(pct, 100) + '%';
      nav.classList.toggle('scrolled', window.scrollY > 20);
    }, {passive: true});
  }

  /* ── Auto-build TOC from .l-section[data-toc] elements ── */
  const tocContainer = document.getElementById('toc-items');
  const sections     = document.querySelectorAll('.l-section[data-toc]');

  if(tocContainer && sections.length){
    sections.forEach((sec, i) => {
      const label = sec.getAttribute('data-toc');
      const id    = sec.id || ('ls-' + (i + 1));
      sec.id      = id;
      const item  = document.createElement('div');
      item.className   = 'toc-item';
      item.dataset.target = id;
      item.innerHTML   = `<div class="toc-num">${String(i+1).padStart(2,'0')}</div>
                          <div class="toc-label">${label}</div>`;
      item.addEventListener('click', ()=>{
        document.getElementById(id)?.scrollIntoView({behavior:'smooth', block:'start'});
      });
      tocContainer.appendChild(item);
    });
  }

  /* ── Scroll reveal + TOC active state ── */
  const sectionObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){
        e.target.classList.add('in');
        document.querySelectorAll('.toc-item').forEach(t => {
          t.classList.toggle('active', t.dataset.target === e.target.id);
        });
      }
    });
  }, {threshold: 0.1, rootMargin: '-60px 0px -25% 0px'});
  sections.forEach(s => sectionObs.observe(s));

  /* ── SVG animation trigger on scroll ── */
  const svgObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){
        e.target.classList.add('svg-animate');
        svgObs.unobserve(e.target);
      }
    });
  }, {threshold: 0.25});
  document.querySelectorAll('.svg-diagram').forEach(d => svgObs.observe(d));

  /* ── Practice quiz engine ── */
  let totalQ  = 0;
  let correct = 0;

  function initQuiz(){
    const questions = document.querySelectorAll('.practice-q[data-qid]');
    totalQ = questions.length;
    updateScoreBar();

    questions.forEach(q => {
      q.querySelectorAll('.pq-opt').forEach(btn => {
        btn.addEventListener('click', () => handleAnswer(btn, q));
      });
    });
  }

  function handleAnswer(btn, q){
    if(q.dataset.answered) return;
    q.dataset.answered = '1';

    const isCorrect = btn.dataset.correct === '1';
    const feedback  = btn.dataset.feedback || '';

    // Style the clicked button
    btn.classList.add(isCorrect ? 'correct' : 'wrong');
    btn.querySelector('.pq-opt-icon').textContent = isCorrect ? '✓' : '✗';

    // Show correct answer if wrong
    if(!isCorrect){
      q.querySelectorAll('.pq-opt').forEach(o => {
        if(o !== btn) o.classList.add('dimmed');
        if(o.dataset.correct === '1') o.classList.add('correct');
      });
    }

    // Disable all options
    q.querySelectorAll('.pq-opt').forEach(o => o.setAttribute('disabled', '1'));

    // Show feedback
    const fb = q.querySelector('.pq-feedback');
    if(fb){
      fb.textContent = feedback;
      fb.className   = 'pq-feedback ' + (isCorrect ? 'correct' : 'wrong');
    }

    if(isCorrect){ correct++; updateScoreBar(); }
  }

  function updateScoreBar(){
    const fill  = document.querySelector('.pq-score-fill');
    const num   = document.querySelector('.pq-score-num');
    if(fill && totalQ > 0){
      fill.style.width = Math.round((correct / totalQ) * 100) + '%';
    }
    if(num) num.textContent = correct + '/' + totalQ;
  }

  initQuiz();

})();
</script>

<?php wp_footer(); ?>
</body>
</html>
