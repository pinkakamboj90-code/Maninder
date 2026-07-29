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
$youtube_url  = get_post_meta( $post_id, '_me_youtube_url',    true ) ?: 'https://www.youtube.com/@englishwithmaninder';
$hindi_sub    = get_post_meta( $post_id, '_me_hindi_subtitle', true ) ?: '';
$quiz_count   = get_post_meta( $post_id, '_me_quiz_count',     true ) ?: '';

// Taxonomy data
$topics  = get_the_terms( $post_id, 'grammar_topic' );
$levels  = get_the_terms( $post_id, 'grammar_level' );
$topic   = ( $topics && ! is_wp_error( $topics ) ) ? $topics[0] : null;
$level   = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : 'Professional';

$topic_label = $topic ? wp_specialchars_decode( $topic->name, ENT_QUOTES ) : 'Grammar';
$topic_url   = $topic ? get_term_link( $topic ) : home_url( '/grammar/' );

// Lesson number: derived from this post's actual position within its topic
// (same query/order as page-grammar-hub.php), never a manually-typed field —
// this is what keeps the hub badge and this page's badge from ever disagreeing.
$lesson_num = 1;
if ( $topic ) {
  $siblings = get_posts( array(
    'post_type'      => 'grammar_lesson',
    'posts_per_page' => -1,
    'orderby'        => 'meta_value_num',
    'meta_key'       => '_me_lesson_number',
    'order'          => 'ASC',
    'fields'         => 'ids',
    'tax_query'      => array( array(
      'taxonomy' => 'grammar_topic',
      'field'    => 'term_id',
      'terms'    => $topic->term_id,
    ) ),
  ) );
  $pos = array_search( $post_id, $siblings, true );
  $lesson_num = ( $pos !== false ) ? $pos + 1 : 1;
}

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
.example-pair{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin:28px 0}
.example-card{border-radius:14px;padding:22px 24px;background:#fff;
  border:1.5px solid var(--border);border-left:4px solid transparent;
  box-shadow:0 4px 16px rgba(26,37,64,.05);transition:transform .2s,box-shadow .2s}
.example-card:hover{transform:translateY(-2px);box-shadow:0 10px 26px rgba(26,37,64,.09)}
.ex-wrong{border-left-color:var(--r-solid)}
.ex-right{border-left-color:var(--g-solid)}
.ex-label{font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;
  margin-bottom:14px;display:inline-flex;align-items:center;gap:6px;
  padding:5px 12px;border-radius:50px}
.ex-label-wrong{color:var(--r-solid);background:var(--r-tint)}
.ex-label-right{color:var(--g-solid);background:var(--g-tint)}
.ex-label-icon{font-size:12px}
.ex-sentence{font-family:var(--d);font-size:18px;font-weight:700;line-height:1.35;
  margin-bottom:10px;color:#111}
.ex-explanation{font-size:14px;color:#666;line-height:1.6}
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

/* ── RULE BOX (light, violet-tinted) ── */
.rule-box{background:var(--vl);border-left:4px solid var(--violet);border-radius:14px;
  padding:26px 30px;margin:32px 0;color:var(--navy)}
.rule-box-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.14em;color:var(--violet);margin-bottom:14px}
.rule-box h3{font-family:var(--d);font-size:20px;font-weight:800;color:var(--navy);
  margin-bottom:12px;line-height:1.25}
.rule-box p{font-size:16px;color:#1f2937;line-height:1.72;margin-bottom:12px}
.rule-box p:last-child{margin:0}
.rule-box strong{color:var(--navy);font-weight:700}
.rule-formula{font-family:var(--d);font-size:18px;font-weight:800;
  color:var(--vd);background:rgba(255,255,255,.6);border-radius:10px;
  padding:14px 18px;margin:16px 0;display:block;line-height:1.5;
  border:1px solid rgba(102,51,221,.22)}
.rule-formula span{color:var(--navy)}
.rule-formula em{font-style:normal;color:#059669}

/* ── PROFESSIONAL CONTEXT BOX (light, steel-blue tinted) ── */
.pro-context{background:#F3F6FA;border-left:4px solid #2C4870;
  border-radius:14px;padding:24px 28px;margin:22px 0;color:var(--navy)}
.pc-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.14em;color:#2C4870;margin-bottom:12px}
.pc-scenario{font-family:var(--d);font-size:17px;font-weight:700;
  color:var(--navy);margin-bottom:8px;line-height:1.4}
.pc-why{font-size:15px;color:#1f2937;line-height:1.65}

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
.pq-opt.correct{border-color:var(--g-solid);background:#fff;color:#111;font-weight:700}
.pq-opt.correct .pq-opt-icon{color:var(--g-solid)}
.pq-opt.wrong{border-color:var(--r-solid);background:#fff;color:#111}
.pq-opt.wrong .pq-opt-icon{color:var(--r-solid)}
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

/* ══════════════════════════════════════════════════════
   LESSON BUILDER v2 — INTERACTIVE COMPONENTS
   Added: tone-demo, three-futures, pro-context-dark,
          hindi-note-body, memory-trick updates
   ══════════════════════════════════════════════════════ */

/* ── TONE DEMO (Will vs Going To interactive cards) ── */
.tone-demo{background:var(--navy);border-radius:16px;padding:22px 24px;margin:28px 0}
.tone-demo-label{font-size:13px;color:rgba(255,255,255,.55);margin-bottom:16px;font-weight:500}
.tone-cards{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.tone-card{background:rgba(255,255,255,.07);border:1.5px solid rgba(255,255,255,.1);
  border-radius:12px;padding:16px 18px;cursor:pointer;transition:all .2s var(--e3)}
.tone-card:hover{background:rgba(255,255,255,.13);transform:translateY(-2px);
  border-color:rgba(255,255,255,.2)}
.tone-card-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
.tone-badge{font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;
  padding:3px 10px;border-radius:20px}
.tone-badge-will{background:#2563EB;color:#fff}
.tone-badge-going{background:var(--violet);color:#fff}
.tone-arrow{color:rgba(255,255,255,.25);font-size:18px;transition:color .2s}
.tone-card:hover .tone-arrow{color:rgba(255,255,255,.5)}
.tone-sentence{font-size:15px;font-weight:700;color:#fff;margin-bottom:10px;line-height:1.4}
.tone-reaction{background:rgba(255,255,255,.09);border-radius:8px;padding:12px;
  font-size:13px;color:rgba(255,255,255,.72);line-height:1.55;
  display:flex;align-items:flex-start;gap:8px}
.tone-emoji{font-size:20px;flex-shrink:0;line-height:1.3}
@media(max-width:600px){.tone-cards{grid-template-columns:1fr}}

/* ── THREE FUTURES (expandable accordion cards) ── */
.three-futures{display:flex;flex-direction:column;gap:10px;margin:24px 0}
.future-card{border:1.5px solid var(--border);border-radius:14px;overflow:hidden;
  cursor:pointer;transition:border-color .2s,box-shadow .2s;background:#fff}
.future-card:hover{border-color:var(--vm);box-shadow:0 4px 20px rgba(102,51,221,.08)}
.future-card.open{border-color:var(--violet);box-shadow:0 4px 20px rgba(102,51,221,.12)}
.future-card-header{display:flex;align-items:center;padding:14px 18px;gap:12px}
.future-tag{font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;
  padding:4px 12px;border-radius:20px;white-space:nowrap;flex-shrink:0}
.future-tag-will{background:var(--b-tint);color:var(--b-deep)}
.future-tag-going{background:var(--vl);color:var(--violet)}
.future-tag-present{background:var(--g-tint);color:#065F46}
.future-title{font-size:14px;font-weight:600;color:var(--navy);flex:1;line-height:1.35}
.future-expand{font-size:22px;color:var(--violet);font-weight:300;
  transition:transform .22s var(--e3);width:24px;text-align:center;flex-shrink:0;line-height:1}
.future-card.open .future-expand{transform:rotate(45deg)}
.future-detail{padding:0 18px 18px;
  animation:futureSlide .25s var(--e3)}
@keyframes futureSlide{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:none}}
.future-detail p{font-size:14px;color:var(--muted);margin-bottom:12px;line-height:1.65}
.future-example{background:var(--off);border-radius:10px;padding:12px 14px;margin-bottom:12px}
.fe-good{font-size:13px;color:var(--g-solid);margin-bottom:6px;line-height:1.55;font-weight:500}
.fe-bad{font-size:13px;color:var(--r-solid);line-height:1.55;font-weight:500}
.future-hindi{font-family:var(--h);font-size:13px;color:var(--sfdeep);font-weight:600;
  background:var(--sbg);padding:8px 12px;border-radius:8px;margin-top:4px}

/* ── HINDI NOTE BODY (updated structure) ── */
.hindi-note-body{flex:1}
.hindi-note-body .hindi-note-label{font-size:11px;font-weight:800;text-transform:uppercase;
  letter-spacing:.1em;color:var(--a-solid);margin-bottom:8px}
.hindi-note-body p{font-family:var(--h);font-size:16px;color:#333;
  line-height:1.65;margin-bottom:8px;font-weight:600}
.hindi-note-body p.en-note{font-family:var(--b);font-size:14px;color:#78350F;
  font-weight:400;line-height:1.65;margin-top:4px}
.hindi-note-body strong{font-weight:700;color:#111}

/* ── PRO CONTEXT (light, steel-blue — supersedes earlier dark definition) ── */
.pro-context{background:#F3F6FA;border-left:4px solid #2C4870;
  border-radius:14px;padding:22px 26px;margin-bottom:14px;color:var(--navy)}
.pro-context:last-of-type{margin-bottom:0}
.pc-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.12em;color:#2C4870;margin-bottom:10px}
.pc-scenario{font-family:var(--d);font-size:17px;font-weight:700;
  color:var(--navy);margin-bottom:12px;line-height:1.4}
.pc-why{font-size:14px;color:#1f2937;line-height:1.75}
.pc-why em{color:var(--violet);font-style:normal;font-weight:600}

/* ── MEMORY TRICK (light violet wash — matches rule-box/pro-context family) ── */
.memory-trick{background:var(--vl);border-left:4px solid var(--violet);
  border-radius:16px;padding:26px 28px;margin:28px 0;color:var(--navy);position:relative;overflow:hidden}
.memory-trick::before{content:'🧠';position:absolute;right:22px;top:18px;
  font-size:40px;opacity:.22;pointer-events:none}
.mt-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.12em;color:var(--violet);margin-bottom:10px}
.mt-text{font-family:var(--d);font-size:19px;font-weight:800;
  color:var(--navy);margin-bottom:10px;line-height:1.3}
.mt-sub{font-size:14px;color:#1f2937;line-height:1.75}

/* ── SVG DIAGRAM CAPTION UPDATE ── */
.svg-caption strong{color:var(--navy);font-weight:700}
.svg-caption em{font-style:italic}

/* ══════════════════════════════════════════════════════
   LESSON BUILDER v3 — CONDITIONAL BUILDER
   New reusable component: tabbed structure-formula switcher.
   Added for "If Sentences & Conditionals" — reusable for any
   topic with 2-4 distinct grammatical patterns to compare.
   ══════════════════════════════════════════════════════ */
.cond-builder{border:1.5px solid var(--border);border-radius:18px;background:#fff;
  padding:8px;margin:28px 0;box-shadow:0 4px 20px rgba(26,37,64,.06)}
.cond-tabs{display:flex;gap:6px;padding:6px;background:var(--off);border-radius:14px;margin-bottom:4px}
.cond-tab{flex:1;background:transparent;border:none;border-radius:10px;padding:12px 10px;
  cursor:pointer;text-align:center;transition:background .2s var(--e3),color .2s}
.cond-tab-name{display:block;font-family:var(--d);font-weight:800;font-size:14px;color:var(--navy)}
.cond-tab-sub{display:block;font-size:11px;color:var(--muted);margin-top:2px}
.cond-tab:hover{background:rgba(255,255,255,.7)}
.cond-tab.on{background:var(--violet);box-shadow:0 6px 16px rgba(102,51,221,.28)}
.cond-tab.on .cond-tab-name,.cond-tab.on .cond-tab-sub{color:#fff}
.cond-display{padding:28px 26px 26px}
.cond-formula{display:flex;flex-wrap:wrap;align-items:center;gap:8px;margin-bottom:20px;
  font-family:var(--d);font-weight:700;font-size:17px}
.cond-if{color:var(--violet);font-weight:800}
.cond-clause{padding:7px 14px;border-radius:9px;font-size:14px;font-weight:700;
  transition:background .3s var(--e3),color .3s var(--e3)}
.cond-clause-if{background:var(--vl);color:var(--vd)}
.cond-clause-result{background:var(--off);color:var(--navy)}
.cond-comma{color:var(--muted);font-weight:400}
.cond-example{font-family:var(--d);font-size:19px;font-weight:700;color:var(--navy);
  margin-bottom:10px;line-height:1.4;transition:opacity .2s}
.cond-meaning{font-size:14px;color:var(--muted);line-height:1.65;transition:opacity .2s}
.cond-fade{animation:condFade .35s var(--e3)}
@keyframes condFade{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}
@media(max-width:600px){
  .cond-tab-sub{display:none}
  .cond-formula{font-size:15px}
  .cond-example{font-size:17px}
}

/* ══════════════════════════════════════════════════════
   LESSON BUILDER v4 — VOICE FLIPPER
   New reusable component: two-state sentence transformer with
   colour-coded parts (agent/verb/patient) that morph on toggle.
   Built for Active ↔ Passive Voice; reusable anywhere a lesson
   needs to show one sentence restructuring into another.
   ══════════════════════════════════════════════════════ */
.voice-flipper{border:1.5px solid var(--border);border-radius:18px;background:#fff;
  padding:8px;margin:28px 0;box-shadow:0 4px 20px rgba(26,37,64,.06)}
.vf-toggle{display:flex;gap:6px;padding:6px;background:var(--off);border-radius:14px;margin-bottom:4px}
.vf-btn{flex:1;background:transparent;border:none;border-radius:10px;padding:12px 10px;
  cursor:pointer;font-family:var(--d);font-weight:800;font-size:14px;color:var(--navy);
  transition:background .2s var(--e3),color .2s}
.vf-btn:hover{background:rgba(255,255,255,.7)}
.vf-btn.on{background:var(--violet);color:#fff;box-shadow:0 6px 16px rgba(102,51,221,.28)}
.vf-display{padding:28px 26px 26px}
.vf-sentence{font-family:var(--d);font-weight:700;font-size:19px;line-height:1.9;margin-bottom:14px}
.vf-part{padding:4px 10px;border-radius:8px;margin:0 3px;display:inline-block;
  transition:background .3s var(--e3),color .3s var(--e3)}
.vf-agent{background:var(--b-tint);color:var(--b-deep)}
.vf-verb{background:var(--vl);color:var(--vd)}
.vf-patient{background:var(--g-tint);color:#065F46}
.vf-note{font-size:14px;color:var(--muted);line-height:1.65}
.vf-legend{display:flex;flex-wrap:wrap;gap:14px;margin-top:16px;padding-top:16px;border-top:1px solid var(--border)}
.vf-legend-item{display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);font-weight:600}
.vf-legend-dot{width:9px;height:9px;border-radius:50%}
@media(max-width:600px){
  .vf-sentence{font-size:16px;line-height:2.1}
}

/* ── SOUND TILE GRID (reusable — flip cards for letter/sound drills) ── */
.tile-toggle{display:inline-flex;flex-wrap:wrap;background:var(--off);border:1.5px solid var(--border);
  border-radius:14px;padding:4px;margin-bottom:20px}
.tile-toggle-btn{font-family:var(--d);font-weight:700;font-size:15px;color:var(--navy);
  background:transparent;border:none;padding:9px 18px;border-radius:10px;cursor:pointer;
  transition:background .2s,color .2s}
.tile-toggle-btn.on{background:var(--b-solid);color:#fff}
.tile-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(92px,1fr));gap:12px;margin:20px 0}
.stile{perspective:800px;height:106px;cursor:pointer}
.stile-inner{position:relative;width:100%;height:100%;transition:transform .5s var(--e3);
  transform-style:preserve-3d}
.stile.flipped .stile-inner{transform:rotateY(180deg)}
.stile-face{position:absolute;inset:0;border-radius:14px;display:flex;flex-direction:column;
  align-items:center;justify-content:center;backface-visibility:hidden;padding:8px;text-align:center}
.stile-front{background:#fff;border:1.5px solid var(--border);border-top:3px solid var(--b-pill);
  box-shadow:0 4px 14px rgba(26,37,64,.07)}
.stile:hover .stile-front{box-shadow:0 10px 24px rgba(26,37,64,.12);border-top-color:var(--violet)}
.stile-front .stile-letter{font-family:var(--d);font-weight:800;font-size:26px;color:#1A1A1A}
.stile-front .stile-tap{font-size:9px;text-transform:uppercase;letter-spacing:.06em;
  color:#fff;background:var(--b-deep);padding:2px 9px;border-radius:50px;margin-top:6px}
.stile-say{position:absolute;top:8px;right:8px;width:26px;height:26px;border-radius:50%;
  background:#fff;border:1.5px solid var(--border);display:flex;align-items:center;
  justify-content:center;font-size:12px;cursor:pointer;transition:background .15s,border-color .15s}
.stile-say:hover{background:var(--b-tint);border-color:var(--b-pill)}
.stile-say.speaking{background:var(--violet);border-color:var(--violet)}
.stile-back{background:var(--b-deep);color:#fff;transform:rotateY(180deg)}
.stile-back .stile-sound{font-family:var(--d);font-weight:700;font-size:14px}
.stile-back .stile-hi{font-family:var(--h);font-size:12px;color:#FDBA74;margin-top:2px}
.stile-back .stile-ex{font-size:10.5px;color:rgba(255,255,255,.72);margin-top:2px}
.stile:hover .stile-inner{transform:translateY(-3px)}
.stile.flipped:hover .stile-inner{transform:rotateY(180deg) translateY(-3px)}

/* ── VOWEL / TAP-TO-REVEAL CARDS (reusable) ── */
.reveal-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:14px;margin:20px 0}
.reveal-card{background:#fff;border:1.5px solid var(--border);border-radius:14px;
  padding:20px 18px;text-align:center;cursor:pointer;transition:box-shadow .3s,border-color .3s}
.reveal-card:hover{box-shadow:0 12px 28px rgba(26,37,64,.08);border-color:var(--b-pill)}
.reveal-word{font-family:var(--d);font-weight:800;font-size:23px;color:#111}
.reveal-body{display:none;font-size:13.5px;color:#666;margin-top:10px;padding-top:10px;
  border-top:1px dashed var(--border);line-height:1.6}
.reveal-card.open .reveal-body{display:block}
.reveal-hi{font-family:var(--h);font-size:12.5px;color:var(--sfdeep);font-weight:700;
  display:block;margin-top:4px}

/* ── TAP WORDS (word list, tap after reading aloud) ── */
.tap-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:12px;margin:20px 0}
.tap-word{background:var(--off);border:1.5px solid var(--border);border-radius:12px;
  padding:14px 16px;cursor:pointer;transition:background .25s,border-color .25s}
.tap-word.done{background:var(--b-tint);border-color:var(--b-pill)}
.tap-word-en{font-family:var(--d);font-weight:700;font-size:16px;display:flex;
  align-items:center;justify-content:space-between;gap:8px}
.tap-word-hi{font-family:var(--h);font-size:13px;color:var(--sfdeep);display:none;margin-top:4px}
.tap-word.done .tap-word-hi{display:block}
.tap-word-hint{font-size:10px;text-transform:uppercase;letter-spacing:.05em;color:#999;margin-top:2px}
.tap-word.done .tap-word-hint{display:none}

/* ── FACT ACCORDION (reusable expand/collapse) ── */
.fact-acc{border:1.5px solid var(--border);border-radius:14px;overflow:hidden;
  margin-bottom:10px;background:#fff}
.fact-head{display:flex;align-items:center;justify-content:space-between;padding:16px 18px;
  cursor:pointer;gap:12px}
.fact-head h4{font-size:15.5px;font-weight:700;color:#111}
.fact-plus{font-size:19px;color:var(--b-solid);transition:transform .3s var(--e3);flex-shrink:0}
.fact-acc.open .fact-plus{transform:rotate(45deg)}
.fact-body{max-height:0;overflow:hidden;transition:max-height .4s var(--e3)}
.fact-body-in{padding:0 18px 18px;color:#666;font-size:14.5px;line-height:1.6}
.fact-body-in .hi-line{font-family:var(--h);color:var(--sfdeep);display:block;margin-top:6px}

/* ── SPEAK BUTTON (browser text-to-speech, female voice preferred) ── */
.say-btn{display:inline-flex;align-items:center;gap:6px;font-family:var(--d);font-weight:700;
  font-size:12px;color:var(--b-deep);background:var(--b-tint);border:1.5px solid var(--b-pill);
  padding:6px 12px;border-radius:50px;cursor:pointer;transition:background .2s;margin-left:8px}
.say-btn:hover{background:var(--b-pill)}
.say-btn.speaking{background:var(--violet);border-color:var(--violet);color:#fff}

/* ── VOCAB POP CARDS — tap-to-hear picture vocabulary (fruits/colors/animals/etc)
     Reuses the .say-btn[data-say] click-to-speak JS below — no separate JS needed
     for speech. Category filtering reuses .tile-toggle, same mechanism as any
     other All/Vowels/Consonants-style filter elsewhere on the site.

     NOTE: uses .say-btn.vcard (compound selector), not .vcard alone — .say-btn
     already defines display:inline-flex for small pill buttons elsewhere; a
     bare .vcard rule of equal specificity can lose that cascade fight depending
     on source order and squash the card into a sliver. The compound selector
     always wins regardless of order. ── */
.vcard-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(148px,1fr));gap:16px;margin:20px 0}
@media(max-width:600px){
  .vcard-grid{grid-template-columns:repeat(2,1fr);gap:12px}
  .vcard-icon{width:56px;height:56px}
  .vcard-img{width:34px;height:34px}
}
.say-btn.vcard{
  display:flex;flex-direction:column;align-items:center;gap:0;
  background:var(--white,#fff);border:1.5px solid var(--border);border-radius:22px;
  padding:26px 14px 20px;text-align:center;cursor:pointer;position:relative;
  transition:transform .2s var(--e3),box-shadow .25s ease,border-color .25s ease;
}
.say-btn.vcard:hover{transform:translateY(-5px) rotate(-1deg);box-shadow:0 18px 34px rgba(26,37,64,.10)}
.say-btn.vcard:nth-child(even):hover{transform:translateY(-5px) rotate(1deg)}
.say-btn.vcard .vcard-word{display:block;font-family:var(--d);font-weight:800;font-size:17px;color:var(--navy);margin-top:12px}
.say-btn.vcard .vcard-hi{display:block;font-family:var(--h);color:var(--sfdeep);font-size:14px;margin-top:2px}
.say-btn.vcard.speaking{border-color:var(--vc,var(--violet))}
.vcard-img.pop,.vcard-icon-num.pop,.vcard-emoji-fallback.pop{animation:vcard-pop .6s cubic-bezier(.34,1.56,.64,1)}
@keyframes vcard-pop{
  0%{transform:scale(1) rotate(0)}
  30%{transform:scale(1.4) rotate(-8deg)}
  55%{transform:scale(.92) rotate(6deg)}
  78%{transform:scale(1.1) rotate(-2deg)}
  100%{transform:scale(1) rotate(0)}
}
@media(prefers-reduced-motion:reduce){.vcard-img.pop,.vcard-icon-num.pop,.vcard-emoji-fallback.pop{animation:none}}

.vcard-icon{
  width:68px;height:68px;position:relative;
  display:flex;align-items:center;justify-content:center;
  animation:vcard-float 3.2s ease-in-out infinite;
  transition:transform .3s var(--e3);
}
.say-btn.vcard:hover .vcard-icon{transform:scale(1.1) rotate(-6deg)}
@keyframes vcard-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
@media(prefers-reduced-motion:reduce){.vcard-icon{animation:none}}
.vcard-img{width:60px;height:60px;object-fit:contain;filter:drop-shadow(0 6px 10px rgba(26,37,64,.22))}
.vcard-emoji-fallback{display:none;font-size:46px;line-height:1;filter:drop-shadow(0 6px 10px rgba(26,37,64,.18))}
.vcard-icon-num{font-family:var(--d);font-weight:800;font-size:30px;color:var(--vc,var(--violet))}

.say-btn.vcard.learned{border-color:var(--vc,var(--violet))}
.say-btn.vcard.learned::after{content:'✓';position:absolute;top:10px;right:12px;width:20px;height:20px;
  border-radius:50%;background:var(--g-solid);color:#fff;font-size:11px;font-weight:800;
  box-shadow:0 2px 6px rgba(0,0,0,.2);
  display:flex;align-items:center;justify-content:center}

.vgame{margin:8px 0}
.vgame-tracker{display:flex;align-items:center;gap:14px;background:var(--off);
  border:1.5px solid var(--border);border-radius:14px;padding:12px 18px;margin:16px 0 20px}
.vgame-tracker-label{font-family:var(--d);font-weight:700;font-size:13px;color:var(--navy);white-space:nowrap}
.vgame-tracker-bar{flex:1;height:8px;border-radius:6px;background:var(--border);overflow:hidden}
.vgame-tracker-fill{height:100%;border-radius:6px;background:var(--violet);width:0%;transition:width .5s var(--e3)}
.vgame-celebrate{display:none;align-items:center;gap:10px;background:var(--g-tint);
  border:1.5px solid var(--g-solid);border-radius:14px;padding:14px 18px;margin:0 0 20px;
  font-family:var(--d);font-weight:700;color:var(--g-solid);animation:vgame-in .4s var(--e3)}
.vgame-celebrate.show{display:flex}
@keyframes vgame-in{0%{opacity:0;transform:translateY(-6px)}100%{opacity:1;transform:translateY(0)}}

/* ── FILL-THE-BLANK EXERCISE (reusable — active-recall checkpoint, not just an end quiz) ── */
.fill-item{background:#fff;border:1.5px solid var(--border);border-radius:14px;
  padding:20px 22px;margin-bottom:14px}
.fill-sentence{font-family:var(--d);font-size:16.5px;font-weight:600;color:#111;
  margin-bottom:14px;line-height:1.6}
.fill-blank{display:inline-block;min-width:64px;text-align:center;border-bottom:2.5px dashed var(--muted);
  padding:0 4px;font-weight:800;color:var(--muted)}
.fill-item.answered .fill-blank{border-bottom-style:solid}
.fill-item.correct .fill-blank{color:var(--g-solid);border-color:var(--g-solid)}
.fill-item.wrong .fill-blank{color:var(--r-solid);border-color:var(--r-solid)}
.fill-opts{display:flex;flex-wrap:wrap;gap:8px}
.fill-opt{font-family:var(--d);font-weight:700;font-size:13.5px;color:#333;
  background:var(--off);border:1.5px solid var(--border);padding:8px 16px;
  border-radius:9px;cursor:pointer;transition:all .15s}
.fill-opt:hover{border-color:var(--b-pill)}
.fill-opt.correct{background:#fff;border-color:var(--g-solid);border-left:4px solid var(--g-solid);color:#111;font-weight:800}
.fill-opt.wrong{background:#fff;border-color:var(--r-solid);border-left:4px solid var(--r-solid);color:#111}
.fill-item.answered .fill-opt:not(.correct):not(.wrong){opacity:.4;cursor:default}
.fill-note{font-size:13px;color:#666;margin-top:12px;padding-top:12px;
  border-top:1px dashed var(--border);display:none;line-height:1.6}
.fill-item.answered .fill-note{display:block}
.fill-note .hi-line{color:var(--sfdeep);display:block;margin-top:4px}

/* ── RUNNING SCORE STRIP (reusable — visible progress across scattered exercises) ── */
.lesson-score{position:sticky;top:64px;z-index:120;display:flex;align-items:center;
  gap:10px;background:rgba(255,255,255,.97);backdrop-filter:blur(10px);
  border:1.5px solid var(--border);border-radius:50px;padding:8px 18px;
  font-family:var(--d);font-size:12.5px;font-weight:700;color:#555;
  width:fit-content;margin:0 auto 28px;box-shadow:0 6px 20px rgba(26,37,64,.06)}
.lesson-score-fill{width:70px;height:6px;border-radius:4px;background:var(--border);overflow:hidden}
.lesson-score-fill span{display:block;height:100%;background:var(--violet);width:0%;transition:width .4s var(--e3)}
.lesson-score-num{color:var(--violet)}
</style>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/lesson-premium.css' ); ?>?ver=<?php echo esc_attr( file_exists( get_stylesheet_directory() . '/assets/lesson-premium.css' ) ? filemtime( get_stylesheet_directory() . '/assets/lesson-premium.css' ) : '1.0.0' ); ?>">
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
      <a href="<?php echo esc_url( $topic_url ); ?>"><?php echo esc_html( $topic_label ); ?></a>
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

  /* Safety net: very tall / image-heavy sections (e.g. large vocab grids)
     can fail to register as "intersecting" on some mobile browsers,
     leaving content stuck at opacity:0 forever. Force-reveal anything
     still hidden shortly after load so nothing can go permanently blank. */
  window.addEventListener('load', () => {
    setTimeout(() => {
      sections.forEach(s => { if(!s.classList.contains('in')) s.classList.add('in'); });
    }, 1200);
  });

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

  /* ── TONE DEMO (Will vs Going To tap cards) ── */
  document.querySelectorAll('.tone-card').forEach(card => {
    card.addEventListener('click', function(){
      const reaction = this.querySelector('.tone-reaction');
      if(!reaction) return;
      const isVisible = reaction.style.display !== 'none' && reaction.style.display !== '';
      // Close all reactions first
      document.querySelectorAll('.tone-reaction').forEach(r => {
        r.style.display = 'none';
        r.closest('.tone-card').style.borderColor = 'rgba(255,255,255,0.1)';
      });
      // Toggle this one
      if(!isVisible){
        reaction.style.display = 'flex';
        this.style.borderColor = 'rgba(255,255,255,0.35)';
      }
    });
  });

  /* ── THREE FUTURES (expandable accordion) ── */
  document.querySelectorAll('.future-card').forEach(card => {
    card.addEventListener('click', function(){
      const detail  = this.querySelector('.future-detail');
      const expand  = this.querySelector('.future-expand');
      const isOpen  = this.classList.contains('open');
      // Close all
      document.querySelectorAll('.future-card').forEach(c => {
        c.classList.remove('open');
        const d = c.querySelector('.future-detail');
        const e = c.querySelector('.future-expand');
        if(d) d.style.display = 'none';
        if(e) e.textContent  = '+';
      });
      // Open clicked one if it was closed
      if(!isOpen && detail){
        this.classList.add('open');
        detail.style.display = 'block';
        if(expand) expand.textContent = '×';
      }
    });
    // Hide detail by default
    const d = card.querySelector('.future-detail');
    if(d) d.style.display = 'none';
  });

  /* ── CONDITIONAL BUILDER (tabbed formula switcher) ── */
  document.querySelectorAll('.cond-builder').forEach(builder => {
    const tabs    = builder.querySelectorAll('.cond-tab');
    const ifC     = builder.querySelector('.cond-clause-if');
    const resC    = builder.querySelector('.cond-clause-result');
    const example = builder.querySelector('.cond-example');
    const meaning = builder.querySelector('.cond-meaning');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        if(tab.classList.contains('on')) return;
        tabs.forEach(t => t.classList.remove('on'));
        tab.classList.add('on');

        const data = {
          if:      tab.dataset.if,
          result:  tab.dataset.result,
          example: tab.dataset.example,
          meaning: tab.dataset.meaning
        };
        [ifC, resC, example, meaning].forEach(el => el && el.classList.remove('cond-fade'));
        void builder.offsetWidth; /* restart animation */
        if(ifC)      { ifC.textContent = data.if; ifC.classList.add('cond-fade'); }
        if(resC)     { resC.textContent = data.result; resC.classList.add('cond-fade'); }
        if(example)  { example.textContent = data.example; example.classList.add('cond-fade'); }
        if(meaning)  { meaning.textContent = data.meaning; meaning.classList.add('cond-fade'); }
      });
    });
  });

  /* ── VOICE FLIPPER (active/passive or any two-state sentence toggle) ── */
  document.querySelectorAll('.voice-flipper').forEach(flipper => {
    const btns    = flipper.querySelectorAll('.vf-btn');
    const agentEl = flipper.querySelector('.vf-agent');
    const verbEl  = flipper.querySelector('.vf-verb');
    const patEl   = flipper.querySelector('.vf-patient');
    const noteEl  = flipper.querySelector('.vf-note');

    btns.forEach(btn => {
      btn.addEventListener('click', () => {
        if(btn.classList.contains('on')) return;
        btns.forEach(b => b.classList.remove('on'));
        btn.classList.add('on');

        const voice = btn.dataset.voice; // "active" or "passive"
        const agent = flipper.dataset[voice + 'Agent'] || '';
        const verb  = flipper.dataset[voice + 'Verb']  || '';
        const pat   = flipper.dataset[voice + 'Patient'] || '';
        const note  = flipper.dataset[voice + 'Note']  || '';

        [agentEl, verbEl, patEl, noteEl].forEach(el => el && el.classList.remove('cond-fade'));
        void flipper.offsetWidth;
        if(agentEl){ agentEl.textContent = agent; agentEl.style.display = agent ? '' : 'none'; agentEl.classList.add('cond-fade'); }
        if(verbEl) { verbEl.textContent  = verb;  verbEl.classList.add('cond-fade'); }
        if(patEl)  { patEl.textContent   = pat;   patEl.classList.add('cond-fade'); }
        if(noteEl) { noteEl.textContent  = note;  noteEl.classList.add('cond-fade'); }
      });
    });
  });

  /* ── SOUND TILE GRID (flip on click/keyboard) ── */
  document.querySelectorAll('.stile').forEach(t => {
    t.setAttribute('tabindex','0');
    t.setAttribute('role','button');
    function flip(){ t.classList.toggle('flipped'); }
    t.addEventListener('click', flip);
    t.addEventListener('keydown', e => { if(e.key==='Enter'||e.key===' '){ e.preventDefault(); flip(); } });

    // Speak button on the front face — uses the tile's own label text
    const letterEl = t.querySelector('.stile-letter');
    const frontFace = t.querySelector('.stile-front');
    if (letterEl && frontFace && 'speechSynthesis' in window) {
      const btn = document.createElement('span');
      btn.className = 'stile-say';
      btn.setAttribute('role', 'button');
      btn.setAttribute('aria-label', 'Hear this word');
      btn.textContent = '🔊';
      frontFace.appendChild(btn);
      btn.addEventListener('click', e => {
        e.stopPropagation(); // don't also flip the tile
        speechSynthesis.cancel();
        const u = new SpeechSynthesisUtterance(letterEl.textContent.trim());
        const voice = pickFemaleVoice();
        if (voice) u.voice = voice;
        u.rate = 0.92;
        btn.classList.add('speaking');
        u.onend = () => btn.classList.remove('speaking');
        speechSynthesis.speak(u);
      });
    }
  });

  /* ── TILE TOGGLE FILTER (e.g. All / Vowels / Consonants) ── */
  document.querySelectorAll('.tile-toggle').forEach(group => {
    const grid = group.nextElementSibling;
    group.querySelectorAll('.tile-toggle-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        group.querySelectorAll('.tile-toggle-btn').forEach(b => b.classList.remove('on'));
        btn.classList.add('on');
        const set = btn.dataset.set;
        if(grid){
          grid.querySelectorAll('.stile, .vcard').forEach(tile => {
            tile.style.display = (set === 'all' || tile.dataset.type === set) ? '' : 'none';
          });
        }
      });
    });
  });

  /* ── REVEAL CARDS (tap to expand explanation) ── */
  document.querySelectorAll('.reveal-card').forEach(card => {
    card.addEventListener('click', () => card.classList.toggle('open'));
  });

  /* ── TAP WORDS (tap after reading aloud) ── */
  document.querySelectorAll('.tap-word').forEach(word => {
    word.addEventListener('click', () => word.classList.toggle('done'));
  });

  /* ── FACT ACCORDION ── */
  document.querySelectorAll('.fact-acc').forEach(acc => {
    const head = acc.querySelector('.fact-head');
    const body = acc.querySelector('.fact-body');
    if(!head || !body) return;
    head.addEventListener('click', () => {
      const isOpen = acc.classList.contains('open');
      document.querySelectorAll('.fact-acc').forEach(a => {
        a.classList.remove('open');
        a.querySelector('.fact-body').style.maxHeight = null;
      });
      if(!isOpen){ acc.classList.add('open'); body.style.maxHeight = body.scrollHeight + 'px'; }
    });
  });

  /* ── SPEAK BUTTON — browser text-to-speech, prefers a female voice.
       Placeholder until real recorded audio (e.g. ElevenLabs) is wired in via <audio> tags. ── */
  function pickFemaleVoice(){
    const voices = speechSynthesis.getVoices();
    return voices.find(v => /female/i.test(v.name))
        || voices.find(v => /^(Samantha|Google UK English Female|Google US English|Zira|Susan|Karen)$/i.test(v.name))
        || voices.find(v => v.lang && v.lang.startsWith('en'))
        || voices[0];
  }
  document.querySelectorAll('.say-btn[data-say]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      if(!('speechSynthesis' in window)) return;
      speechSynthesis.cancel();
      const u = new SpeechSynthesisUtterance(btn.dataset.say);
      const voice = pickFemaleVoice();
      if(voice) u.voice = voice;
      u.rate = 0.92;
      btn.classList.add('speaking');
      u.onend = () => btn.classList.remove('speaking');
      speechSynthesis.speak(u);

      if(btn.classList.contains('vcard')){
        markLearned(btn);
        const graphic = btn.querySelector('.vcard-img, .vcard-icon-num, .vcard-emoji-fallback');
        if(graphic){
          graphic.classList.remove('pop');
          void graphic.offsetWidth; // force reflow so animation restarts even on rapid re-taps
          graphic.classList.add('pop');
          setTimeout(() => graphic.classList.remove('pop'), 650);
        }
      }
    });
  });

  /* ── VOCAB GAME — progress tracker + completion celebration ── */
  function markLearned(card){
    if(card.classList.contains('learned')) return;
    card.classList.add('learned');
    const vgame = card.closest('.vgame');
    if(!vgame) return;
    const grid = vgame.querySelector('.vcard-grid');
    const total = grid.querySelectorAll('.vcard').length;
    const learned = grid.querySelectorAll('.vcard.learned').length;
    const fill = vgame.querySelector('.vgame-tracker-fill');
    const label = vgame.querySelector('.vgame-tracker-label');
    if(fill) fill.style.width = Math.round((learned / total) * 100) + '%';
    if(label) label.textContent = learned + ' / ' + total + ' words explored';
    if(learned === total){
      const celebrate = vgame.querySelector('.vgame-celebrate');
      if(celebrate) celebrate.classList.add('show');
    }
  }

  /* ── FILL-THE-BLANK EXERCISE ── */
  const scoreFill = document.querySelector('.lesson-score-fill span');
  const scoreNum  = document.querySelector('.lesson-score-num');
  const fillItems = document.querySelectorAll('.fill-item');
  let fillCorrect = 0;
  const fillTotal = fillItems.length;

  function updateLessonScore(){
    if(!scoreNum || !fillTotal) return;
    scoreNum.textContent = fillCorrect + '/' + fillTotal;
    if(scoreFill) scoreFill.style.width = Math.round((fillCorrect / fillTotal) * 100) + '%';
  }
  updateLessonScore();

  fillItems.forEach(item => {
    const blank = item.querySelector('.fill-blank');
    item.querySelectorAll('.fill-opt').forEach(opt => {
      opt.addEventListener('click', () => {
        if(item.classList.contains('answered')) return;
        const isCorrect = opt.dataset.correct === '1';
        item.classList.add('answered', isCorrect ? 'correct' : 'wrong');
        opt.classList.add(isCorrect ? 'correct' : 'wrong');
        if(blank) blank.textContent = opt.textContent.trim();
        if(!isCorrect){
          const rightOpt = item.querySelector('.fill-opt[data-correct="1"]');
          if(rightOpt) rightOpt.classList.add('correct');
        }
        if(isCorrect){ fillCorrect++; updateLessonScore(); }
      });
    });
  });

})();
</script>

<?php wp_footer(); ?>
</body>
</html>
