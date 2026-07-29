<?php
/**
 * Template Name: Vocabulary Hub
 * page-vocabulary.php — /vocabulary/
 * Standalone template (no get_header/footer) matching grammar hub pattern.
 *
 * Two states:
 *   Hub view  — /vocabulary/
 *   Deck view — /vocabulary/?deck=slug
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── State resolution ───────────────────────────────────────────────────────
$active_deck_slug = isset( $_GET['deck'] ) ? sanitize_title( $_GET['deck'] ) : '';
$active_deck_term = null;

if ( $active_deck_slug ) {
    $active_deck_term = get_term_by( 'slug', $active_deck_slug, 'vocabulary_deck' );
    if ( ! $active_deck_term ) $active_deck_slug = '';
}

// ── All decks for hub ──────────────────────────────────────────────────────
$all_decks = get_terms( array(
    'taxonomy'   => 'vocabulary_deck',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
) );

// ── Per-deck display metadata (keyed by slug) ──────────────────────────────
$deck_meta = array(
    'meeting-pushback-phrases' => array(
        'emoji'   => '🗣️',
        'tagline' => 'Disagree without damaging the room',
        'level'   => 'Professional',
    ),
    'diplomatic-emails' => array(
        'emoji'   => '✉️',
        'tagline' => 'Write emails that get replies, not silence',
        'level'   => 'Professional',
    ),
    'performance-reviews' => array(
        'emoji'   => '📊',
        'tagline' => 'Sound confident when it matters most',
        'level'   => 'Advanced',
    ),
);

// ── Live counts ────────────────────────────────────────────────────────────
$total_words = wp_count_posts( 'vocabulary_word' )->publish ?? 0;
$total_decks = ( is_array( $all_decks ) && ! is_wp_error( $all_decks ) ) ? count( $all_decks ) : 0;
$is_logged_in = is_user_logged_in();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $active_deck_term ? esc_html( $active_deck_term->name ) . ' — ' : ''; ?>Vocabulary — Maninder English</title>
<?php wp_head(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');

:root {
  --white:   #FFFFFF;
  --off:     #F8F7F4;
  --navy:    #1A2540;
  --border:  #E8E4DC;
  --violet:  #6633DD;
  --vm:      #8B6CF6;
  --vl:      #EDE8FB;
  --vd:      #5220C8;
  --muted:   #64748B;
  --sfdeep:  #B5470F;
  --d: 'Plus Jakarta Sans', sans-serif;
  --b: 'Inter', sans-serif;
  --h: 'Noto Sans Devanagari', sans-serif;
  --e2: cubic-bezier(.22,1,.36,1);
  --e3: cubic-bezier(.16,1,.3,1);
}

*,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: var(--b); background: #fff; color: #111; -webkit-font-smoothing: antialiased; overflow-x: hidden; }
a { text-decoration: none; color: inherit; }
.wrap { width: 100%; max-width: 1100px; margin: 0 auto; padding: 0 28px; }

/* ── SCROLL REVEAL ── */
.fade { opacity: 0; transform: translateY(22px) scale(.98);
  transition: opacity .7s var(--e2), transform .7s var(--e2); }
.fade.in { opacity: 1; transform: none; }

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: var(--b); background: #fff; color: #111; -webkit-font-smoothing: antialiased; overflow-x: hidden; }
a { text-decoration: none; color: inherit; }
.wrap { width: 100%; max-width: 1100px; margin: 0 auto; padding: 0 28px; }

/* ── NAV ── */
.me-nav { position: sticky; top: 0; z-index: 400; background: rgba(255,255,255,.97);
  backdrop-filter: blur(20px); border-bottom: 1px solid var(--border);
  transition: box-shadow .28s; }
.me-nav.scrolled { box-shadow: 0 2px 20px rgba(26,37,64,.08); }
.me-nav-inner { display: flex; align-items: center; height: 68px; max-width: 1100px;
  margin: 0 auto; padding: 0 28px; gap: 32px; }
.me-logo { font-family: var(--d); font-weight: 800; font-size: 20px;
  letter-spacing: -.03em; color: #111; }
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
.vh-hero { padding: 72px 0 56px; border-bottom: 1px solid var(--border); }
.vh-eyebrow { display: inline-flex; align-items: center; gap: 8px;
  font-family: var(--d); font-size: 11px; font-weight: 800; text-transform: uppercase;
  letter-spacing: .12em; color: var(--violet); background: var(--vl);
  padding: 6px 16px; border-radius: 50px; margin-bottom: 24px; }
.vh-hero h1 { font-family: var(--d); font-size: clamp(36px,5vw,58px); font-weight: 800;
  color: #111; line-height: 1.08; letter-spacing: -.04em; margin-bottom: 14px; }
.vh-hero h1 em { font-style: normal; color: var(--violet); }
.vh-hero-hindi { font-family: var(--h); font-size: 18px; font-weight: 700;
  color: var(--sfdeep); border-left: 3px solid var(--sfdeep); padding-left: 14px;
  display: block; margin-bottom: 24px; line-height: 1.5; }
.vh-hero-sub { font-size: 18px; line-height: 1.75; color: #555;
  max-width: 600px; margin-bottom: 36px; }
.vh-hero-stats { display: flex; align-items: center; gap: 32px; flex-wrap: wrap; }
.vh-stat { display: flex; flex-direction: column; gap: 4px; }
.vh-stat-num { font-family: var(--d); font-size: 28px; font-weight: 800;
  color: #111; letter-spacing: -.03em; }
.vh-stat-label { font-size: 13px; color: var(--muted); font-weight: 500; }

/* ── HUB: section header ── */
.vh-section-header { padding: 56px 0 40px; }
.vh-section-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: .12em;
  text-transform: uppercase; color: var(--violet); margin-bottom: 12px; }
.vh-section-title { font-family: var(--d); font-size: clamp(26px,3.5vw,40px);
  font-weight: 800; color: #111; line-height: 1.12; letter-spacing: -.03em;
  margin-bottom: 10px; }
.vh-section-desc { font-size: 16px; color: var(--muted); max-width: 520px; line-height: 1.65; }

/* ── DECK GRID ── */
.vh-deck-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 24px; padding-bottom: 80px; }

.vh-deck-card { border: 1.5px solid var(--border); border-radius: 16px; overflow: hidden;
  text-decoration: none; display: block; background: #fff;
  opacity: 0; transform: translateY(14px) scale(.97);
  transition: opacity .7s var(--e2), transform .7s var(--e2),
              box-shadow .22s var(--e2), border-color .22s; }
.vh-deck-card.in { opacity: 1; transform: none; }
.vh-deck-card:hover { transform: translateY(-4px) scale(1.01);
  box-shadow: 0 16px 40px rgba(102,51,221,.12); border-color: var(--vm); }

.vh-deck-top { padding: 28px 24px 20px; border-bottom: 1px solid var(--off); }
.vh-deck-emoji { font-size: 36px; display: block; margin-bottom: 16px; line-height: 1; }
.vh-deck-name { font-family: var(--d); font-size: 18px; font-weight: 800;
  color: #111; margin-bottom: 7px; line-height: 1.25; letter-spacing: -.02em; }
.vh-deck-tagline { font-size: 13px; color: var(--muted); line-height: 1.55; }
.vh-deck-bottom { padding: 14px 24px; display: flex; align-items: center;
  justify-content: space-between; background: var(--off); }
.vh-deck-count { font-size: 13px; font-weight: 700; color: var(--violet); }
.vh-deck-level { font-size: 11px; font-weight: 600; letter-spacing: .06em;
  text-transform: uppercase; color: #aaa; }
.vh-deck-arrow { width: 30px; height: 30px; border-radius: 50%; background: #fff;
  border: 1.5px solid var(--border); display: flex; align-items: center;
  justify-content: center; color: var(--violet); font-size: 15px;
  transition: background .2s, border-color .2s; }
.vh-deck-card:hover .vh-deck-arrow { background: var(--violet); border-color: var(--violet); color: #fff; }

/* ── EMPTY STATE ── */
.vh-empty { grid-column: 1/-1; padding: 56px 40px; border: 1.5px dashed var(--border);
  border-radius: 16px; text-align: center; }
.vh-empty-icon { font-size: 44px; display: block; margin-bottom: 16px; }
.vh-empty p { font-size: 15px; color: var(--muted); line-height: 1.65; }
.vh-empty a { color: var(--violet); font-weight: 600; }

/* ── DECK VIEW ── */
.vh-deck-view { padding: 48px 0 80px; }
.vh-back { display: inline-flex; align-items: center; gap: 8px; font-size: 13px;
  font-weight: 700; color: var(--violet); margin-bottom: 40px;
  transition: gap .2s; }
.vh-back:hover { gap: 12px; }
.vh-back svg { width: 16px; height: 16px; fill: none; stroke: currentColor;
  stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }
.vh-deck-view-title { font-family: var(--d); font-size: clamp(28px,4vw,44px);
  font-weight: 800; color: #111; letter-spacing: -.03em; margin-bottom: 8px; }
.vh-deck-view-meta { display: flex; align-items: center; gap: 16px;
  flex-wrap: wrap; margin-bottom: 36px; }
.vh-deck-view-count { font-size: 14px; font-weight: 700; color: var(--violet); }
.vh-deck-view-tagline { font-size: 14px; color: var(--muted); }

/* ── PROGRESS NUDGE (guest) ── */
.vh-nudge { background: linear-gradient(135deg, var(--vl) 0%, #E4DDFA 100%);
  border: 1.5px solid #C4B0F5; border-radius: 14px; padding: 20px 24px;
  display: flex; align-items: center; justify-content: space-between;
  gap: 16px; margin-bottom: 40px; flex-wrap: wrap; }
.vh-nudge-text strong { font-family: var(--d); font-weight: 800; color: #111;
  display: block; margin-bottom: 3px; font-size: 14px; }
.vh-nudge-text span { font-size: 13px; color: #5A4490; line-height: 1.5; }
.vh-nudge-btn { display: inline-block; background: var(--violet); color: #fff;
  font-family: var(--d); font-size: 13px; font-weight: 800; padding: 11px 22px;
  border-radius: 50px; white-space: nowrap; transition: background .2s; }
.vh-nudge-btn:hover { background: var(--vd); color: #fff; }

/* ── SRS WIDGET WRAPPER ── */
.vh-srs-wrap { max-width: 660px; }

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
  .vh-deck-grid { grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); }
}
@media (max-width: 640px) {
  .wrap { padding: 0 18px; }
  .vh-hero { padding: 48px 0 48px; }
  .vh-hero h1 { font-size: 34px; }
  .vh-hero-stats { gap: 24px; }
  .vh-stat-divider { display: none; }
  .me-nav-links { display: none; }
  .nav-hamburger { display: flex; }
  .foot-grid { grid-template-columns: 1fr 1fr; padding: 0 18px 32px; }
  .vh-nudge { flex-direction: column; align-items: flex-start; }
}
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
}
</style>
</head>
<body <?php body_class('vocabulary-hub'); ?>>
<?php wp_body_open(); ?>

<!-- ── NAV ── -->
<nav class="me-nav" id="me-nav" style="position:relative">
  <div class="me-nav-inner">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="me-logo">Maninder<em>English</em></a>
    <div class="me-nav-links">
      <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
      <a href="<?php echo esc_url( home_url('/levels/') ); ?>">Levels</a>
    
      <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a>
      <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>" class="active">Vocabulary</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
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
    <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>" class="active">Vocabulary</a>
    <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
    <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>">Quizzes</a>
  </div>
</nav>

<!-- ── HERO ── -->
<section class="vh-hero">
  <div class="wrap vh-hero-inner">
    <div class="vh-eyebrow">🃏 Vocabulary</div>
    <h1>Words that<br><em>actually get used</em></h1>
    <span class="vh-hero-hindi">असली काम की vocabulary — Hindi में समझो, दिमाग में बसाओ</span>
    <p class="vh-hero-sub">Curated decks of real professional English — explained in Hindi, practised with spaced repetition.</p>
    <div class="vh-hero-stats">
      <div class="vh-stat">
        <span class="vh-stat-num"><?php echo $total_decks ?: '—'; ?></span>
        <span class="vh-stat-label">Curated Decks</span>
      </div>
      <div class="vh-stat">
        <span class="vh-stat-num"><?php echo $total_words ?: '—'; ?></span>
        <span class="vh-stat-label">Words & Phrases</span>
      </div>
      <div class="vh-stat">
        <span class="vh-stat-num">Free</span>
        <span class="vh-stat-label">Always</span>
      </div>
      <div class="vh-stat">
        <span class="vh-stat-num">Hindi</span>
        <span class="vh-stat-label">Explanations</span>
      </div>
    </div>
  </div>
</section>

<!-- ── MAIN CONTENT ── -->
<div style="min-height:60vh">
<div class="wrap">

<?php if ( $active_deck_slug && $active_deck_term ) : ?>

  <!-- ════════ DECK VIEW ════════ -->
  <div class="vh-deck-view">

    <a href="<?php echo esc_url( get_permalink() ); ?>" class="vh-back">
      <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
      All Decks
    </a>

    <?php
    $meta    = $deck_meta[ $active_deck_term->slug ] ?? array();
    $emoji   = $meta['emoji']   ?? '📚';
    $tagline = $meta['tagline'] ?? '';
    ?>
    <div style="font-size:44px;margin-bottom:14px;line-height:1"><?php echo $emoji; ?></div>
    <h2 class="vh-deck-view-title"><?php echo esc_html( $active_deck_term->name ); ?></h2>
    <div class="vh-deck-view-meta">
      <span class="vh-deck-view-count"><?php echo $active_deck_term->count; ?> words</span>
      <?php if ( $tagline ) : ?>
        <span class="vh-deck-view-tagline"><?php echo esc_html( $tagline ); ?></span>
      <?php endif; ?>
    </div>

    <?php if ( ! $is_logged_in ) : ?>
    <div class="vh-nudge">
      <div class="vh-nudge-text">
        <strong>Log in to save your progress</strong>
        <span>SRS will remember which words you know and schedule reviews automatically.</span>
      </div>
      <a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" class="vh-nudge-btn">Log In Free →</a>
    </div>
    <?php endif; ?>

    <div class="vh-srs-wrap">
      <?php echo do_shortcode( '[me_flashcards deck="' . esc_attr( $active_deck_term->slug ) . '"]' ); ?>
    </div>

  </div>

<?php else : ?>

  <!-- ════════ HUB VIEW ════════ -->
  <div class="vh-section-header">
    <p class="vh-section-eyebrow">Choose your deck</p>
    <h2 class="vh-section-title">What do you want to<br>sound better at?</h2>
    <p class="vh-section-desc">Each deck is built around a real professional situation. Flip cards, learn the phrases, log in to track what sticks.</p>
  </div>

  <div class="vh-deck-grid">
    <?php if ( ! empty( $all_decks ) && ! is_wp_error( $all_decks ) ) :
      foreach ( $all_decks as $i => $deck ) :
        $meta     = $deck_meta[ $deck->slug ] ?? array();
        $emoji    = $meta['emoji']   ?? '📚';
        $tagline  = $meta['tagline'] ?? ( $deck->description ?: '' );
        $level    = $meta['level']   ?? 'Professional';
        $deck_url = add_query_arg( 'deck', $deck->slug, get_permalink() );
    ?>
    <a href="<?php echo esc_url( $deck_url ); ?>" class="vh-deck-card">
      <div class="vh-deck-top">
        <span class="vh-deck-emoji"><?php echo $emoji; ?></span>
        <div class="vh-deck-name"><?php echo esc_html( $deck->name ); ?></div>
        <?php if ( $tagline ) : ?>
          <div class="vh-deck-tagline"><?php echo esc_html( $tagline ); ?></div>
        <?php endif; ?>
      </div>
      <div class="vh-deck-bottom">
        <div>
          <span class="vh-deck-count"><?php echo $deck->count; ?> words</span>
          &nbsp;&nbsp;
          <span class="vh-deck-level"><?php echo esc_html( $level ); ?></span>
        </div>
        <div class="vh-deck-arrow">→</div>
      </div>
    </a>
    <?php
      endforeach;
    else : ?>
      <div class="vh-empty">
        <span class="vh-empty-icon">📚</span>
        <p>Decks are being built. In the meantime, <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">start with Grammar</a>.</p>
      </div>
    <?php endif; ?>
  </div>

<?php endif; ?>

</div><!-- .wrap -->
</div>

<!-- ── FOOTER ── -->
<footer class="me-footer">
  <div class="foot-grid">
    <div>
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="foot-logo">Maninder<em>English</em></a>
      <div class="foot-hi">English + Psychology = Fluency</div>
      <p class="foot-desc">Psychology-based English for Indian professionals. 7 years of real British workplace experience.</p>
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
  'use strict';
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
      const siblings = Array.from((el.parentElement || {}).children || [])
        .filter(c => c.classList.contains('vh-deck-card'));
      const idx = siblings.indexOf(el);
      if (idx > 0) el.style.transitionDelay = (idx * 0.1) + 's';
      el.classList.add('in');
      obs.unobserve(el);
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
  document.querySelectorAll('.vh-deck-card').forEach(el => revealObs.observe(el));
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
