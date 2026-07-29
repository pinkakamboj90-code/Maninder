<?php
/**
 * Template Name: Maninder English — Grammar Hub
 * URL: /grammar/
 * Shows topic index (auto-populated from grammar_lesson CPT via shortcode)
 * AI Grammar Tutor moved to secondary section below the content map
 *
 * HOW TO USE:
 * 1. Create a WordPress page with slug: grammar
 * 2. Set this as its template (Page Attributes → Template)
 * 3. Leave the page content blank — template handles everything
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Pull AI tutor shortcode output if plugin is active
$tutor_active = shortcode_exists( 'me_grammar_tutor' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grammar — Maninder English</title>
<?php wp_head(); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');

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
  --b-solid:#2563EB;
  --b-tint:#EFF6FF;
  --b-pill:#BFDBFE;
  --b-deep:#1E3A8A;
  --g-solid:#059669;
  --g-tint:#ECFDF5;
  --r-solid:#DC2626;
  --r-tint:#FEF2F2;
  --a-solid:#D97706;
  --a-tint:#FFFBEB;
  --muted:#64748B;
  --d:'Plus Jakarta Sans',sans-serif;
  --b:'Inter',sans-serif;
  --h:'Noto Sans Devanagari',sans-serif;
  --e2:cubic-bezier(.22,1,.36,1);
  --e3:cubic-bezier(.16,1,.3,1);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:var(--b);background:#fff;color:#111;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{text-decoration:none;color:inherit}
.wrap{width:100%;max-width:1100px;margin:0 auto;padding:0 28px}

/* ── SCROLL REVEAL ── */
.fade{opacity:0;transform:translateY(22px) scale(.98);
  transition:opacity .7s var(--e2),transform .7s var(--e2)}
.fade.from-left{transform:translateX(-28px) scale(.98)}
.fade.from-right{transform:translateX(28px) scale(.98)}
.fade.in{opacity:1;transform:none}
.fade.d1{transition-delay:.08s}
.fade.d2{transition-delay:.16s}
.fade.d3{transition-delay:.24s}
.fade.d4{transition-delay:.32s}
.fade.d5{transition-delay:.40s}
.fade.d6{transition-delay:.48s}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:var(--b);background:#fff;color:#111;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{text-decoration:none;color:inherit}
.wrap{width:100%;max-width:1100px;margin:0 auto;padding:0 28px}

/* ── NAV ── */
.me-nav{position:sticky;top:0;z-index:400;background:rgba(255,255,255,.97);
  backdrop-filter:blur(20px);border-bottom:1px solid var(--border);
  transition:box-shadow .28s}
.me-nav.scrolled{box-shadow:0 2px 20px rgba(26,37,64,.08)}
.me-nav-inner{display:flex;align-items:center;height:68px;max-width:1100px;
  margin:0 auto;padding:0 28px;gap:32px}
.me-logo{font-family:var(--d);font-weight:800;font-size:20px;letter-spacing:-.03em;color:#111}
.me-logo em{font-style:normal;color:var(--violet)}
.me-nav-links{display:flex;align-items:center;gap:24px;flex:1}
.me-nav-links a{font-size:14px;font-weight:500;color:#555;transition:color .18s}
.me-nav-links a:hover,.me-nav-links a.active{color:var(--violet)}
.nav-yt{display:inline-flex;align-items:center;gap:6px;background:#FF0000;
  color:#fff;font-family:var(--d);font-weight:700;font-size:13px;
  padding:8px 18px;border-radius:8px;transition:background .2s;margin-left:auto}
.nav-yt:hover{background:#cc0000}
.nav-hamburger{display:none;flex-direction:column;gap:5px;background:none;
  border:none;cursor:pointer;padding:4px;margin-left:12px;flex-shrink:0}
.nav-hamburger span{display:block;width:22px;height:2px;background:#111;
  border-radius:2px;transition:all .25s}
.nav-hamburger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.nav-hamburger.open span:nth-child(2){opacity:0}
.nav-hamburger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.me-nav-mobile{display:none;position:absolute;top:68px;left:0;right:0;
  background:#fff;border-bottom:1px solid var(--border);
  box-shadow:0 8px 24px rgba(0,0,0,.08);z-index:399;padding:16px 28px 20px;
  flex-direction:column}
.me-nav-mobile.open{display:flex}
.me-nav-mobile a{font-size:15px;font-weight:600;color:#333;padding:12px 0;
  border-bottom:1px solid var(--border);transition:color .18s}
.me-nav-mobile a:last-child{border-bottom:none}
.me-nav-mobile a:hover,.me-nav-mobile a.active{color:var(--violet)}

/* ── HERO ── */
.gh-hero{padding:72px 0 56px;border-bottom:1px solid var(--border)}
.gh-tag{display:inline-flex;align-items:center;gap:8px;font-family:var(--d);
  font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.12em;
  color:var(--violet);background:var(--vl);padding:6px 16px;border-radius:50px;
  margin-bottom:24px}
.gh-hero h1{font-family:var(--d);font-size:clamp(36px,5vw,58px);font-weight:800;
  color:#111;line-height:1.08;letter-spacing:-.04em;margin-bottom:14px}
.gh-hero h1 em{font-style:normal;color:var(--violet)}
.gh-hi{font-family:var(--h);font-size:18px;font-weight:700;color:var(--sfdeep);
  border-left:3px solid var(--sfdeep);padding-left:14px;display:block;
  margin-bottom:24px;line-height:1.5}
.gh-hero-sub{font-size:18px;line-height:1.75;color:#555;max-width:600px;margin-bottom:36px}
.gh-hero-stats{display:flex;align-items:center;gap:32px;flex-wrap:wrap}
.gh-stat{display:flex;flex-direction:column;gap:4px}
.gh-stat-num{font-family:var(--d);font-size:28px;font-weight:800;color:#111;letter-spacing:-.03em}
.gh-stat-label{font-size:13px;color:var(--muted);font-weight:500}

/* ── TOPIC NAV (sticky jump bar) ── */
.gh-topic-nav{position:sticky;top:68px;z-index:300;background:rgba(255,255,255,.96);
  backdrop-filter:blur(16px);border-bottom:1px solid var(--border);
  padding:0;overflow-x:auto;-webkit-overflow-scrolling:touch;
  scrollbar-width:none;-ms-overflow-style:none;position:relative}
.gh-topic-nav::-webkit-scrollbar{display:none}
/* Fade hints on either edge — tells you there's more to scroll before you try */
.gh-topic-nav::before,.gh-topic-nav::after{content:'';position:absolute;top:0;
  bottom:0;width:32px;pointer-events:none;z-index:2}
.gh-topic-nav::before{left:0;background:linear-gradient(90deg,rgba(255,255,255,.96),transparent)}
.gh-topic-nav::after{right:0;background:linear-gradient(270deg,rgba(255,255,255,.96),transparent)}
.gh-topic-nav-inner{display:flex;align-items:center;gap:0;max-width:1100px;
  margin:0 auto;padding:0 28px;scroll-snap-type:x proximity}
.gh-tnav-item{display:flex;align-items:center;gap:8px;font-family:var(--d);
  font-size:13px;font-weight:600;color:#888;padding:14px 20px;
  border-bottom:2px solid transparent;white-space:nowrap;cursor:pointer;
  transition:color .18s,border-color .18s;scroll-snap-align:start}
.gh-tnav-item:hover{color:var(--violet)}
.gh-tnav-item.active{color:var(--violet);border-bottom-color:var(--violet)}

/* ── "More" overflow dropdown (desktop) ── */
.gh-tnav-more{position:relative;flex-shrink:0}
.gh-tnav-more-btn{display:flex;align-items:center;gap:6px;font-family:var(--d);
  font-size:13px;font-weight:600;color:#888;background:none;border:none;
  padding:14px 20px;cursor:pointer;border-bottom:2px solid transparent;
  transition:color .18s,border-color .18s;white-space:nowrap}
.gh-tnav-more-btn:hover,.gh-tnav-more.open .gh-tnav-more-btn{color:var(--violet)}
.gh-tnav-more.active .gh-tnav-more-btn{color:var(--violet);border-bottom-color:var(--violet)}
.gh-tnav-more-count{font-size:11px;background:var(--off);color:var(--muted);
  border-radius:50px;padding:1px 7px;font-weight:700}
.gh-tnav-more.active .gh-tnav-more-count{background:var(--vl);color:var(--violet)}
.gh-tnav-more-caret{font-size:9px;transition:transform .2s}
.gh-tnav-more.open .gh-tnav-more-caret{transform:rotate(180deg)}
.gh-tnav-more-panel{display:none;position:absolute;top:100%;left:0;
  background:#fff;border:1.5px solid var(--border);border-radius:12px;
  box-shadow:0 16px 40px rgba(26,37,64,.14);padding:6px;min-width:220px;
  z-index:400;margin-top:6px}
.gh-tnav-more.open .gh-tnav-more-panel{display:block}
.gh-tnav-more-item{display:flex;align-items:center;justify-content:space-between;
  gap:12px;font-family:var(--d);font-size:13.5px;font-weight:600;color:#333;
  padding:10px 14px;border-radius:8px;cursor:pointer;transition:background .15s}
.gh-tnav-more-item:hover{background:var(--vl);color:var(--violet)}
.gh-tnav-more-item.active{background:var(--vl);color:var(--violet)}
.gh-tnav-more-item-count{font-size:11px;color:var(--muted);font-weight:700}

/* ── Mobile select fallback ── */
.gh-tnav-select{display:none}
@media (max-width:720px){
  .gh-topic-nav-inner{display:none}
  .gh-topic-nav::before,.gh-topic-nav::after{display:none}
  .gh-tnav-select{display:block;width:100%;max-width:1100px;margin:0 auto;
    padding:12px 28px;font-family:var(--d);font-size:14px;font-weight:600;
    color:#333;background:#fff;border:none;border-radius:0}
}

/* ── MAIN CONTENT GRID ── */
.gh-body{padding:60px 0 80px}
.gh-grid{display:grid;grid-template-columns:1fr 300px;gap:48px;align-items:start}
.gh-main{min-width:0}
.gh-aside{position:sticky;top:120px}

/* ── TOPIC BLOCK ── */
.gh-topic-block{margin-bottom:64px;opacity:0;transform:translateY(20px) scale(.99);
  transition:opacity .7s var(--e2),transform .7s var(--e2)}
.gh-topic-block.in{opacity:1;transform:none}
.gh-topic-header{margin-bottom:28px}
.gh-topic-meta{display:flex;align-items:center;gap:12px;margin-bottom:12px}
.gh-topic-eye{font-family:var(--d);font-size:10px;font-weight:800;
  text-transform:uppercase;letter-spacing:.14em;color:var(--violet)}
.gh-topic-count{font-size:12px;color:var(--muted);font-weight:500;
  background:var(--off);padding:3px 10px;border-radius:20px;border:1px solid var(--border)}
.gh-topic-title{font-family:var(--d);font-size:clamp(24px,3vw,32px);font-weight:800;
  color:#111;letter-spacing:-.03em;margin-bottom:8px;line-height:1.15}
.gh-topic-desc{font-size:15px;color:var(--muted);line-height:1.65}

/* ── LESSON CARDS GRID ── */
.gh-lessons-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.gh-lessons-grid.single{grid-template-columns:minmax(0,380px)}

.gh-lesson-card{display:flex;flex-direction:column;padding:22px 24px;background:#fff;
  border:1.5px solid var(--border);border-radius:16px;
  transition:border-color .22s var(--e2),transform .22s var(--e2),box-shadow .22s var(--e2);
  opacity:0;transform:translateY(14px) scale(.97)}
.gh-lesson-card.in{opacity:1;transform:none}
.gh-lesson-card:hover{border-color:var(--vm);transform:translateY(-3px) scale(1.01);
  box-shadow:0 8px 32px rgba(102,51,221,.1)}

.gh-lc-top{display:flex;align-items:center;justify-content:space-between;
  margin-bottom:14px}
.gh-lc-num{font-family:var(--d);font-size:11px;font-weight:800;color:var(--muted);
  background:var(--off);padding:4px 10px;border-radius:20px;
  border:1px solid var(--border)}
.gh-lc-level{font-size:11px;font-weight:700;text-transform:uppercase;
  letter-spacing:.08em;padding:3px 10px;border-radius:20px}
.gh-lc-level-professional{color:#7C3A00;background:#FFF0DC;border:1px solid #F5C07A}
.gh-lc-level-beginner{color:#0A5C3B;background:#E6F7F0;border:1px solid #6DCFA7}
.gh-lc-level-intermediate{color:#1B3D8F;background:#E8EFFE;border:1px solid #93B4F5}
.gh-lc-level-advanced{color:#4A1FA8;background:#F0EBFF;border:1px solid #B49EF0}

.gh-lc-title{font-family:var(--d);font-size:16px;font-weight:800;color:#111;
  line-height:1.25;margin-bottom:8px;letter-spacing:-.015em}
.gh-lc-desc{font-size:13px;color:var(--muted);line-height:1.6;
  flex:1;margin-bottom:16px}
.gh-lc-footer{display:flex;align-items:center;justify-content:space-between;
  margin-top:auto}
.gh-lc-time{font-size:12px;color:var(--muted);font-weight:500}
.gh-lc-arrow{font-size:16px;color:var(--violet);font-weight:700;
  transition:transform .18s}
.gh-lesson-card:hover .gh-lc-arrow{transform:translateX(4px)}

/* ── EMPTY STATE (no lessons yet) ── */
.gh-empty{grid-column:1/-1;padding:40px;border:1.5px dashed var(--border);
  border-radius:16px;text-align:center}
.gh-empty-icon{font-size:32px;margin-bottom:12px}
.gh-empty-text{font-size:15px;color:var(--muted);line-height:1.65}
.gh-empty-text strong{color:#111;display:block;margin-bottom:4px;font-family:var(--d);font-size:16px}

/* ── SIDEBAR ── */
.gh-aside-section{background:var(--off);border-radius:16px;padding:24px;
  border:1px solid var(--border);margin-bottom:20px}
.gh-aside-label{font-family:var(--d);font-size:11px;font-weight:800;
  text-transform:uppercase;letter-spacing:.12em;color:var(--muted);margin-bottom:16px}
.gh-topic-list a{display:flex;align-items:center;justify-content:space-between;
  padding:9px 0;border-bottom:1px solid var(--border);font-size:14px;
  font-weight:500;color:#333;transition:color .18s}
.gh-topic-list a:last-child{border-bottom:none}
.gh-topic-list a:hover{color:var(--violet)}
.gh-topic-list-count{font-size:12px;color:var(--muted);background:#fff;
  padding:2px 8px;border-radius:12px;border:1px solid var(--border)}
.gh-progress-bar{height:4px;background:var(--border);border-radius:2px;
  margin-top:12px;overflow:hidden}
.gh-progress-fill{height:100%;background:linear-gradient(90deg,var(--violet),var(--vm));
  border-radius:2px;width:8%}

/* ── AI TUTOR CTA (sidebar) ── */
.gh-tutor-cta{background:linear-gradient(135deg,var(--violet),var(--vd));
  border-radius:16px;padding:24px;color:#fff;margin-bottom:20px}
.gh-tutor-cta-label{font-size:10px;font-weight:800;text-transform:uppercase;
  letter-spacing:.14em;color:rgba(255,255,255,.6);margin-bottom:10px}
.gh-tutor-cta h3{font-family:var(--d);font-size:16px;font-weight:800;
  color:#fff;margin-bottom:6px;line-height:1.3}
.gh-tutor-cta p{font-size:13px;color:rgba(255,255,255,.72);line-height:1.6;margin-bottom:16px}
.gh-tutor-btn{display:flex;align-items:center;justify-content:center;gap:8px;
  background:#fff;color:var(--violet);font-family:var(--d);font-weight:800;
  font-size:14px;padding:11px 20px;border-radius:10px;transition:opacity .18s}
.gh-tutor-btn:hover{opacity:.9}

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
.foot-col h4{font-family:var(--d);font-size:13px;font-weight:700;color:#fff;margin-bottom:14px}
.foot-col ul{list-style:none}
.foot-col li{margin-bottom:9px}
.foot-col a{font-size:13px;color:rgba(255,255,255,.55);transition:color .18s}
.foot-col a:hover{color:#fff}
.foot-bottom{display:flex;align-items:center;justify-content:space-between;
  max-width:1100px;margin:0 auto;padding:20px 28px;flex-wrap:wrap;gap:12px}
.foot-copy{font-size:12px;color:rgba(255,255,255,.4)}

/* ── RESPONSIVE ── */
@media(max-width:900px){
  .gh-grid{grid-template-columns:1fr}
  .gh-aside{position:static}
}
@media(max-width:640px){
  .gh-lessons-grid{grid-template-columns:1fr}
  .wrap{padding:0 18px}
  .gh-hero{padding:48px 0 40px}
  .gh-hero h1{font-size:36px}
  .me-nav-links{display:none}
  .nav-hamburger{display:flex}
  .foot-grid{grid-template-columns:1fr 1fr;padding:0 18px 32px}
}
@media(prefers-reduced-motion:reduce){
  *,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}
}
</style>
</head>
<body <?php body_class('grammar-hub'); ?>>
<?php wp_body_open(); ?>

<!-- ── NAV ── -->
<nav class="me-nav" id="me-nav" style="position:relative">
  <div class="me-nav-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="me-logo">Maninder<em>English</em></a>
    <div class="me-nav-links">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <a href="<?php echo esc_url( home_url( '/levels/' ) ); ?>">Levels</a>
   
      <a href="<?php echo esc_url( home_url( '/grammar/' ) ); ?>" class="active">Grammar</a>
      <a href="<?php echo esc_url( home_url( '/vocabulary/' ) ); ?>">Vocabulary</a>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
      <a href="<?php echo esc_url( home_url( '/quizzes/' ) ); ?>">Quizzes</a>
    </div>
    <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="nav-yt">▶ YouTube</a>
    <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="me-nav-mobile" id="me-nav-mobile">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
    <a href="<?php echo esc_url( home_url( '/levels/' ) ); ?>">Levels</a>
  
    <a href="<?php echo esc_url( home_url( '/grammar/' ) ); ?>" class="active">Grammar</a>
    <a href="<?php echo esc_url( home_url( '/vocabulary/' ) ); ?>">Vocabulary</a>
    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
    <a href="<?php echo esc_url( home_url( '/quizzes/' ) ); ?>">Quizzes</a>
  </div>
</nav>

<!-- ── HERO ── -->
<section class="gh-hero">
  <div class="wrap">
    <div class="gh-tag">📖 Grammar</div>
    <h1>Fix the mistakes<br>that <em>actually matter</em></h1>
    <span class="gh-hi">हर गलती जो आपकी professional image को नुकसान पहुँचाती है — एक-एक करके ठीक करो</span>
    <p class="gh-hero-sub">Not grammar rules for exams. Real British English mistakes that Indian professionals make — and the psychology behind why your brain keeps reaching for the wrong form.</p>

    <?php
    // Live stats from CPT
    $total_lessons = wp_count_posts( 'grammar_lesson' )->publish;
    $total_topics  = wp_count_terms( array( 'taxonomy' => 'grammar_topic', 'hide_empty' => true ) );
    ?>
    <div class="gh-hero-stats">
      <div class="gh-stat">
        <div class="gh-stat-num"><?php echo intval( $total_lessons ); ?></div>
        <div class="gh-stat-label">Grammar lessons</div>
      </div>
      <div class="gh-stat">
        <div class="gh-stat-num"><?php echo intval( $total_topics ); ?></div>
        <div class="gh-stat-label">Topics covered</div>
      </div>
      <div class="gh-stat">
        <div class="gh-stat-num">Free</div>
        <div class="gh-stat-label">Always</div>
      </div>
      <div class="gh-stat">
        <div class="gh-stat-num">Hindi</div>
        <div class="gh-stat-label">Explanations</div>
      </div>
    </div>
  </div>
</section>

<?php
// Build topic nav from live terms
$all_topics = get_terms( array(
  'taxonomy'   => 'grammar_topic',
  'hide_empty' => true,
  'orderby'    => 'menu_order',
  'order'      => 'ASC',
) );
?>

<?php if ( ! is_wp_error( $all_topics ) && ! empty( $all_topics ) ) :
  $max_visible     = 4; // pills shown before folding into "More"
  $visible_topics  = array_slice( $all_topics, 0, $max_visible );
  $overflow_topics = array_slice( $all_topics, $max_visible );
?>
<!-- ── TOPIC JUMP NAV ── -->
<nav class="gh-topic-nav" id="gh-topic-nav" aria-label="Jump to grammar topic">
  <div class="gh-topic-nav-inner">
    <div class="gh-tnav-item active" data-target="all">All Topics</div>
    <?php foreach ( $visible_topics as $topic ) : ?>
    <div class="gh-tnav-item" data-target="topic-<?php echo esc_attr( $topic->slug ); ?>">
      <?php echo esc_html( $topic->name ); ?>
    </div>
    <?php endforeach; ?>

    <?php if ( ! empty( $overflow_topics ) ) : ?>
    <div class="gh-tnav-more">
      <button class="gh-tnav-more-btn" id="gh-tnav-more-btn" type="button"
        aria-haspopup="true" aria-expanded="false">
        More <span class="gh-tnav-more-count"><?php echo count( $overflow_topics ); ?></span>
        <span class="gh-tnav-more-caret">▾</span>
      </button>
      <div class="gh-tnav-more-panel" id="gh-tnav-more-panel" role="menu">
        <?php foreach ( $overflow_topics as $topic ) : ?>
        <div class="gh-tnav-more-item" role="menuitem"
             data-target="topic-<?php echo esc_attr( $topic->slug ); ?>">
          <?php echo esc_html( $topic->name ); ?>
          <span class="gh-tnav-more-item-count"><?php echo (int) $topic->count; ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>

  <!-- Mobile fallback: a native dropdown scales to any number of topics without layout breakage -->
  <select class="gh-tnav-select" id="gh-tnav-select" aria-label="Jump to grammar topic">
    <option value="all">All Topics</option>
    <?php foreach ( $all_topics as $topic ) : ?>
    <option value="topic-<?php echo esc_attr( $topic->slug ); ?>">
      <?php echo esc_html( $topic->name ); ?> (<?php echo (int) $topic->count; ?>)
    </option>
    <?php endforeach; ?>
  </select>
</nav>
<?php endif; ?>

<!-- ── BODY ── -->
<div class="gh-body">
  <div class="wrap">
    <div class="gh-grid">

      <!-- ── MAIN: LESSON INDEX ── -->
      <div class="gh-main" id="gh-lesson-list">

        <?php if ( is_wp_error( $all_topics ) || empty( $all_topics ) ) : ?>
        <!-- Empty state: no lessons published yet -->
        <div class="gh-topic-block in" style="margin-bottom:0">
          <div class="gh-lessons-grid">
            <div class="gh-empty">
              <div class="gh-empty-icon">📝</div>
              <div class="gh-empty-text">
                <strong>First lesson coming soon</strong>
                Grammar lessons are being added. Check back shortly — or watch the YouTube channel for the latest content.
              </div>
            </div>
          </div>
        </div>

        <?php else :
          foreach ( $all_topics as $topic ) :
            $lessons = get_posts( array(
              'post_type'      => 'grammar_lesson',
              'posts_per_page' => -1,
              'orderby'        => 'meta_value_num',
              'meta_key'       => '_me_lesson_number',
              'order'          => 'ASC',
              'tax_query'      => array( array(
                'taxonomy' => 'grammar_topic',
                'field'    => 'term_id',
                'terms'    => $topic->term_id,
              ) ),
            ) );

            if ( empty( $lessons ) ) continue;
            $count = count( $lessons );
        ?>
        <div class="gh-topic-block" id="topic-<?php echo esc_attr( $topic->slug ); ?>">
          <div class="gh-topic-header">
            <div class="gh-topic-meta">
              <span class="gh-topic-eye"><?php echo esc_html( mb_strtoupper( html_entity_decode( $topic->name, ENT_QUOTES, get_bloginfo( 'charset' ) ) ) ); ?></span>
              <span class="gh-topic-count"><?php echo $count; ?> lesson<?php echo $count !== 1 ? 's' : ''; ?></span>
            </div>
            <h2 class="gh-topic-title"><?php echo esc_html( $topic->name ); ?></h2>
            <?php if ( $topic->description ) : ?>
            <p class="gh-topic-desc"><?php echo esc_html( $topic->description ); ?></p>
            <?php endif; ?>
          </div>

          <div class="gh-lessons-grid<?php echo $count === 1 ? ' single' : ''; ?>">
            <?php foreach ( $lessons as $i => $lesson ) :
              $levels     = get_the_terms( $lesson->ID, 'grammar_level' );
              $level_name = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : 'All Levels';
              $level_slug = ( $levels && ! is_wp_error( $levels ) ) ? sanitize_title( $levels[0]->name ) : 'all';
              $excerpt    = get_the_excerpt( $lesson );
              $read_time  = get_post_meta( $lesson->ID, '_me_read_time', true ) ?: '7 min';
              $lesson_num = $i + 1; // always derived from position within this topic — never manually typed, can't clash
            ?>
            <a href="<?php echo esc_url( get_permalink( $lesson ) ); ?>"
               class="gh-lesson-card fade"
               style="--delay:<?php echo $i * 0.07; ?>s">
              <div class="gh-lc-top">
                <span class="gh-lc-num"><?php printf( '%02d', $lesson_num ); ?></span>
                <span class="gh-lc-level gh-lc-level-<?php echo esc_attr( $level_slug ); ?>">
                  <?php echo esc_html( $level_name ); ?>
                </span>
              </div>
              <h3 class="gh-lc-title"><?php echo esc_html( $lesson->post_title ); ?></h3>
              <?php if ( $excerpt ) : ?>
              <p class="gh-lc-desc"><?php echo esc_html( wp_trim_words( $excerpt, 18 ) ); ?></p>
              <?php endif; ?>
              <div class="gh-lc-footer">
                <span class="gh-lc-time">⏱ <?php echo esc_html( $read_time ); ?> read</span>
                <span class="gh-lc-arrow">→</span>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php
          endforeach;
        endif;
        ?>

      </div><!-- .gh-main -->

      <!-- ── SIDEBAR ── -->
      <aside class="gh-aside">

        <!-- AI Tutor CTA — prominent but secondary -->
        <div class="gh-tutor-cta">
          <div class="gh-tutor-cta-label">AI Tool</div>
          <h3>Check Your English Instantly</h3>
          <p>Type any sentence. Get corrections in Hindi + English, powered by GPT-4o.</p>
          <a href="<?php echo esc_url( home_url( '/grammar-checker/' ) ); ?>" class="gh-tutor-btn">
            🤖 Open Grammar Checker
          </a>
        </div>

        <!-- Topic quick-nav -->
        <?php if ( ! is_wp_error( $all_topics ) && ! empty( $all_topics ) ) : ?>
        <div class="gh-aside-section">
          <div class="gh-aside-label">Topics</div>
          <nav class="gh-topic-list" aria-label="Grammar topics">
            <?php foreach ( $all_topics as $topic ) :
              $count = $topic->count;
            ?>
            <a href="#topic-<?php echo esc_attr( $topic->slug ); ?>">
              <?php echo esc_html( $topic->name ); ?>
              <span class="gh-topic-list-count"><?php echo $count; ?></span>
            </a>
            <?php endforeach; ?>
          </nav>
        </div>
        <?php endif; ?>

        <!-- Progress nudge -->
        <div class="gh-aside-section">
          <div class="gh-aside-label">Your Progress</div>
          <p style="font-size:14px;color:var(--muted);line-height:1.6;margin-bottom:12px">
            <?php echo intval( $total_lessons ); ?> lesson<?php echo $total_lessons !== 1 ? 's' : ''; ?> available.
            Start from Lesson 01 and work through each topic.
          </p>
          <div class="gh-progress-bar">
            <div class="gh-progress-fill"></div>
          </div>
          <p style="font-size:12px;color:var(--muted);margin-top:8px">Log in to track your progress</p>
        </div>

        <!-- YouTube nudge -->
        <div class="gh-aside-section" style="background:var(--navy);border-color:var(--navy)">
          <div class="gh-aside-label" style="color:rgba(255,255,255,.5)">Video Lessons</div>
          <p style="font-size:14px;color:rgba(255,255,255,.65);line-height:1.6;margin-bottom:14px">
            Every grammar lesson has a free YouTube video with the explanation. Watch + read for fastest learning.
          </p>
          <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener"
             style="display:flex;align-items:center;justify-content:center;gap:8px;background:#FF0000;color:#fff;font-family:var(--d);font-weight:700;font-size:13px;padding:10px 16px;border-radius:10px;transition:background .2s">
            ▶ Watch on YouTube
          </a>
        </div>

      </aside>

    </div><!-- .gh-grid -->
  </div><!-- .wrap -->
</div><!-- .gh-body -->

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
    
      <li><a href="<?php echo esc_url( home_url( '/grammar/' ) ); ?>">Grammar</a></li>
      <li><a href="<?php echo esc_url( home_url( '/vocabulary/' ) ); ?>">Vocabulary</a></li>
    </ul></div>
    <div class="foot-col"><h4>Tools</h4><ul>
      <li><a href="<?php echo esc_url( home_url( '/grammar-checker/' ) ); ?>">Grammar Checker</a></li>
      <li><a href="<?php echo esc_url( home_url( '/vocabulary/' ) ); ?>">Flashcards</a></li>
      <li><a href="<?php echo esc_url( home_url( '/quizzes/' ) ); ?>">Quizzes</a></li>
    </ul></div>
    <div class="foot-col"><h4>Connect</h4><ul>
      <li><a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener">▶ YouTube</a></li>
      <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Maninder</a></li>
      <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
    </ul></div>
  </div>
  <div class="foot-bottom">
    <span class="foot-copy">© <?php echo date( 'Y' ); ?> Maninder English · maninderenglish.com</span>
  </div>
</footer>

<script>
(function(){
  'use strict';

  /* ── Nav scroll shadow ── */
  const nav = document.getElementById('me-nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 10);
  }, {passive: true});

  /* ── Mobile hamburger ── */
  const hbtn = document.getElementById('nav-hamburger');
  const hmob = document.getElementById('me-nav-mobile');
  if (hbtn && hmob) {
    hbtn.addEventListener('click', () => {
      hbtn.classList.toggle('open');
      hmob.classList.toggle('open');
    });
  }

  /* ── Topic nav: active state on scroll ── */
  const tnav   = document.getElementById('gh-topic-nav');
  const blocks = document.querySelectorAll('.gh-topic-block[id]');
  const moreWrap  = document.querySelector('.gh-tnav-more');
  const moreBtn   = document.getElementById('gh-tnav-more-btn');
  const morePanel = document.getElementById('gh-tnav-more-panel');
  const tselect   = document.getElementById('gh-tnav-select');

  function jumpTo(target){
    if(target === 'all'){
      window.scrollTo({top: 0, behavior: 'smooth'});
      return;
    }
    const el = document.getElementById(target);
    if(el){
      const offset = tnav.offsetHeight + (nav?.offsetHeight || 68);
      const top    = el.getBoundingClientRect().top + window.scrollY - offset - 20;
      window.scrollTo({top, behavior: 'smooth'});
    }
  }

  if(tnav && blocks.length){
    const tnavObs = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if(e.isIntersecting){
          const id = e.target.id;
          let inOverflow = false;
          document.querySelectorAll('.gh-tnav-item').forEach(t => {
            t.classList.toggle('active', t.dataset.target === id || (id === '' && t.dataset.target === 'all'));
          });
          document.querySelectorAll('.gh-tnav-more-item').forEach(t => {
            const isMatch = t.dataset.target === id;
            t.classList.toggle('active', isMatch);
            if(isMatch) inOverflow = true;
          });
          if(moreWrap) moreWrap.classList.toggle('active', inOverflow);
          if(tselect) tselect.value = id || 'all';
        }
      });
    }, {rootMargin: '-68px 0px -60% 0px', threshold: 0});
    blocks.forEach(b => tnavObs.observe(b));

    /* Click to jump — visible pills */
    document.querySelectorAll('.gh-tnav-item').forEach(item => {
      item.addEventListener('click', () => jumpTo(item.dataset.target));
    });

    /* Click to jump — overflow dropdown items */
    document.querySelectorAll('.gh-tnav-more-item').forEach(item => {
      item.addEventListener('click', () => {
        jumpTo(item.dataset.target);
        if(moreWrap) moreWrap.classList.remove('open');
        if(moreBtn) moreBtn.setAttribute('aria-expanded', 'false');
      });
    });

    /* Mobile select */
    if(tselect){
      tselect.addEventListener('change', () => jumpTo(tselect.value));
    }
  }

  /* Toggle "More" panel */
  if(moreBtn && morePanel && moreWrap){
    moreBtn.addEventListener('click', () => {
      const isOpen = moreWrap.classList.toggle('open');
      moreBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
    document.addEventListener('click', (e) => {
      if(!moreWrap.contains(e.target)){
        moreWrap.classList.remove('open');
        moreBtn.setAttribute('aria-expanded', 'false');
      }
    });
    document.addEventListener('keydown', (e) => {
      if(e.key === 'Escape'){
        moreWrap.classList.remove('open');
        moreBtn.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ── Premium scroll reveal + stagger ── */
  const revealObs = new IntersectionObserver((entries, obs) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;

      const el = e.target;

      // Stagger siblings in same grid parent
      const parent = el.parentElement;
      if (parent) {
        const siblings = Array.from(parent.children).filter(
          c => c.classList.contains('gh-lesson-card') || c.classList.contains('gh-topic-block')
        );
        const idx = siblings.indexOf(el);
        if (idx > 0) {
          el.style.transitionDelay = (idx * 0.09) + 's';
        }
      }

      el.classList.add('in');
      obs.unobserve(el); // fire once only — no CPU waste on scroll up
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.gh-topic-block, .gh-lesson-card').forEach(el => {
    revealObs.observe(el);
  });

})();
</script>

<?php wp_footer(); ?>
</body>
</html>
