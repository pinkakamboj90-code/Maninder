<?php
/**
 * page-quiz-single.php — /quiz/[slug]/
 * Standalone single quiz template.
 * Upload to: /wp-content/themes/maninderenglish-child/page-quiz-single.php
 *
 * Quiz data stored as JSON in post meta key: me_quiz_data
 * Format:
 * [
 *   {
 *     "q": "Question text here",
 *     "options": ["Option A", "Option B", "Option C", "Option D"],
 *     "answer": 1,          // 0-indexed correct option
 *     "explanation": "English explanation of why this is correct",
 *     "hindi": "Hindi explanation यहाँ"
 *   },
 *   ...
 * ]
 *
 * Other meta keys:
 *   me_quiz_desc       — short description shown on hub card
 *   me_quiz_difficulty — beginner | intermediate | professional
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── Load quiz post ─────────────────────────────────────────────────────────
if ( ! have_posts() ) { wp_redirect( home_url('/quizzes/') ); exit; }
the_post();

$quiz_title  = get_the_title();
$quiz_id     = get_the_ID();
$raw_data    = get_post_meta( $quiz_id, 'me_quiz_data', true );
$questions   = json_decode( $raw_data, true );
$difficulty  = get_post_meta( $quiz_id, 'me_quiz_difficulty', true ) ?: 'beginner';
$description = get_post_meta( $quiz_id, 'me_quiz_desc', true );

// Get topic
$topics      = get_the_terms( $quiz_id, 'quiz_topic' );
$topic       = ( $topics && ! is_wp_error( $topics ) ) ? $topics[0] : null;

// Validate questions
$has_questions = is_array( $questions ) && count( $questions ) > 0;
$q_count       = $has_questions ? count( $questions ) : 0;

// Difficulty display
$diff_labels = array(
    'beginner'     => array( 'label' => 'Beginner',     'class' => 'diff-beginner' ),
    'intermediate' => array( 'label' => 'Intermediate', 'class' => 'diff-intermediate' ),
    'professional' => array( 'label' => 'Professional', 'class' => 'diff-professional' ),
);
$diff_info = $diff_labels[ $difficulty ] ?? $diff_labels['beginner'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo esc_html( $quiz_title ); ?> — Maninder English</title>
<?php wp_head(); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');

:root {
  --navy:    #1A2540;
  --violet:  #6633DD;
  --vm:      #8B6CF6;
  --vl:      #EDE8FB;
  --vd:      #5220C8;
  --border:  #E8E4DC;
  --off:     #F8F7F4;
  --muted:   #64748B;
  --correct:        #0D7A52;
  --correct-bg:     #D4F5E6;
  --correct-border: #52C99A;
  --correct-text:   #064E35;
  --wrong:          #C0271A;
  --wrong-bg:       #FFE4E1;
  --wrong-border:   #F07068;
  --wrong-text:     #7A150E;
  --d: 'Plus Jakarta Sans', sans-serif;
  --b: 'Inter', sans-serif;
  --h: 'Noto Sans Devanagari', sans-serif;
  --e2: cubic-bezier(.22,1,.36,1);
  --e3: cubic-bezier(.16,1,.3,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: var(--b); background: #F8F7F4; color: #111;
  -webkit-font-smoothing: antialiased; overflow-x: hidden; min-height: 100vh; }
a { text-decoration: none; color: inherit; }
.wrap { width: 100%; max-width: 1100px; margin: 0 auto; padding: 0 28px; }

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

/* ── QUIZ HEADER ── */
.qs-header { background: #0D1530; padding: 48px 0 40px; position: relative; overflow: hidden; }
.qs-header::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 50% 80% at 5% 50%, rgba(102,51,221,.2) 0%, transparent 65%);
  pointer-events: none;
}
.qs-header-inner { position: relative; }
.qs-back { display: inline-flex; align-items: center; gap: 8px; font-size: 13px;
  font-weight: 600; color: rgba(255,255,255,.55); margin-bottom: 24px;
  transition: color .2s; }
.qs-back:hover { color: #fff; }
.qs-back svg { width: 15px; height: 15px; fill: none; stroke: currentColor;
  stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }
.qs-header-meta { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; flex-wrap: wrap; }
.qs-topic-tag { font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .1em; color: var(--vm); background: rgba(139,108,246,.15);
  border: 1px solid rgba(139,108,246,.3); padding: 4px 12px; border-radius: 20px; }
.qs-diff-tag { font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .06em; padding: 4px 12px; border-radius: 20px; }
.qs-diff-beginner     { color: #0A5C3B; background: rgba(10,92,59,.12); border: 1px solid rgba(109,207,167,.3); }
.qs-diff-intermediate { color: #BFDBFE; background: rgba(191,219,254,.12); border: 1px solid rgba(147,180,245,.2); }
.qs-diff-professional { color: #FCD34D; background: rgba(252,211,77,.12); border: 1px solid rgba(245,192,122,.2); }
.qs-title { font-family: var(--d); font-size: clamp(24px,3.5vw,38px); font-weight: 800;
  color: #fff; line-height: 1.1; letter-spacing: -.03em; margin-bottom: 8px; }
.qs-desc { font-size: 15px; color: rgba(255,255,255,.55); max-width: 560px; line-height: 1.65; }

/* ── PROGRESS BAR ── */
.qs-progress-wrap { background: #fff; border-bottom: 1px solid var(--border); padding: 16px 0; }
.qs-progress-inner { display: flex; align-items: center; gap: 16px; }
.qs-progress-label { font-family: var(--d); font-size: 13px; font-weight: 700;
  color: var(--navy); white-space: nowrap; min-width: 120px; }
.qs-progress-track { flex: 1; height: 6px; background: var(--border); border-radius: 50px; overflow: hidden; }
.qs-progress-fill { height: 100%; background: linear-gradient(90deg, var(--violet), var(--vm));
  border-radius: 50px; width: 0%; transition: width .4s var(--e2); }
.qs-progress-pct { font-size: 12px; font-weight: 600; color: var(--muted); min-width: 32px; text-align: right; }

/* ── QUIZ BODY ── */
.qs-body { padding: 40px 0 80px; }
.qs-body-inner { max-width: 720px; margin: 0 auto; }

/* ── QUESTION CARD ── */
.qs-question-card {
  background: #fff;
  border: 1.5px solid var(--border);
  border-radius: 20px;
  padding: 40px 40px 36px;
  margin-bottom: 20px;
  display: none;
  animation: qIn .35s var(--e3);
}
.qs-question-card.active { display: block; }
@keyframes qIn { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: none; } }

.qs-q-num { font-size: 12px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .1em; color: var(--violet); margin-bottom: 16px; }
.qs-q-text { font-family: var(--d); font-size: clamp(19px,2.2vw,23px); font-weight: 800;
  color: #111; line-height: 1.45; letter-spacing: -.02em; margin-bottom: 32px; }

/* ── OPTIONS ── */
.qs-options { display: flex; flex-direction: column; gap: 12px; margin-bottom: 0; }
.qs-option { display: flex; align-items: flex-start; gap: 14px; padding: 18px 20px;
  border: 1.5px solid var(--border); border-radius: 12px; cursor: pointer;
  transition: border-color .2s var(--e2), background .2s var(--e2), transform .2s var(--e2);
  background: #fff; text-align: left; width: 100%; font-family: var(--b); }
.qs-option:hover:not(.answered) { border-color: var(--vm); background: var(--vl);
  transform: translateX(4px); }
.qs-option-letter { width: 30px; height: 30px; border-radius: 50%; background: var(--off);
  border: 1.5px solid var(--border); display: flex; align-items: center; justify-content: center;
  font-family: var(--d); font-size: 13px; font-weight: 800; color: var(--muted);
  flex-shrink: 0; transition: background .18s, border-color .18s, color .18s; }
.qs-option-text { font-size: 16px; font-weight: 500; line-height: 1.6; color: #1A1A1A; padding-top: 4px; }

/* Option states */
.qs-option.correct { border-color: var(--correct-border); background: #fff;
  cursor: default; border-left: 4px solid var(--correct); }
.qs-option.correct .qs-option-letter { background: var(--correct); border-color: var(--correct); color: #fff; }
.qs-option.correct .qs-option-text { color: #1A1A1A; font-weight: 700; }

.qs-option.wrong { border-color: var(--wrong-border); background: #fff;
  cursor: default; border-left: 4px solid var(--wrong); }
.qs-option.wrong .qs-option-letter { background: var(--wrong); border-color: var(--wrong); color: #fff; }
.qs-option.wrong .qs-option-text { color: #1A1A1A; font-weight: 600; }

.qs-option.dimmed { opacity: .32; cursor: default; filter: grayscale(.3); }
.qs-option.answered { pointer-events: none; }

/* ── FEEDBACK BOX ── */
.qs-feedback {
  margin-top: 20px;
  border-radius: 14px;
  padding: 20px 22px;
  display: none;
  animation: fbIn .3s var(--e3);
}
.qs-feedback.show { display: block; }
@keyframes fbIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: none; } }

.qs-feedback.fb-correct {
  background: #fff;
  border: 1.5px solid var(--correct-border);
  border-left: 5px solid var(--correct);
}
.qs-feedback.fb-wrong {
  background: #fff;
  border: 1.5px solid var(--wrong-border);
  border-left: 5px solid var(--wrong);
}

.qs-feedback-verdict { display: flex; align-items: center; gap: 8px;
  font-family: var(--d); font-size: 15px; font-weight: 800;
  letter-spacing: -.01em; margin-bottom: 10px; }
.fb-correct .qs-feedback-verdict { color: var(--correct-text); }
.fb-wrong   .qs-feedback-verdict { color: var(--wrong-text); }

.qs-feedback-explanation { font-size: 15px; font-weight: 500; color: #1A1A1A;
  line-height: 1.75; margin-bottom: 14px; }
.qs-feedback-hindi {
  font-family: var(--h);
  font-size: 15px;
  font-weight: 600;
  color: #6B3E00;
  background: rgba(212,160,23,.12);
  border-left: 3px solid #D4A017;
  padding: 12px 16px;
  border-radius: 0 8px 8px 0;
  line-height: 1.8;
}

/* ── NEXT BUTTON ── */
.qs-next-wrap { display: none; justify-content: flex-end; margin-top: 20px; }
.qs-next-wrap.show { display: flex; }
.qs-next-btn { display: inline-flex; align-items: center; gap: 8px; background: var(--violet);
  color: #fff; font-family: var(--d); font-size: 14px; font-weight: 800;
  padding: 12px 28px; border-radius: 50px; border: none; cursor: pointer;
  transition: background .2s, transform .15s; }
.qs-next-btn:hover { background: var(--vd); transform: translateX(3px); }

/* ── RESULTS SCREEN ── */
.qs-results { display: none; background: #fff; border: 1.5px solid var(--border);
  border-radius: 20px; padding: 48px 36px; text-align: center;
  animation: qIn .4s var(--e3); }
.qs-results.show { display: block; }
.qs-results-icon { font-size: 56px; display: block; margin-bottom: 20px;
  font-family: "Apple Color Emoji","Segoe UI Emoji","Noto Color Emoji",sans-serif; }
.qs-results-title { font-family: var(--d); font-size: clamp(24px,3vw,34px); font-weight: 800;
  color: #111; letter-spacing: -.03em; margin-bottom: 8px; }
.qs-results-sub { font-size: 15px; color: var(--muted); margin-bottom: 32px; line-height: 1.6; }

.qs-score-display { display: inline-flex; align-items: baseline; gap: 8px;
  background: var(--vl); border: 2px solid var(--vm); border-radius: 16px;
  padding: 20px 40px; margin-bottom: 32px; }
.qs-score-num { font-family: var(--d); font-size: 52px; font-weight: 800;
  color: var(--violet); line-height: 1; letter-spacing: -.04em; }
.qs-score-denom { font-family: var(--d); font-size: 22px; font-weight: 600; color: var(--vm); }

.qs-results-msg { font-family: var(--h); font-size: 18px; font-weight: 700;
  color: #D4A017; margin-bottom: 36px; }

.qs-result-actions { display: flex; align-items: center; justify-content: center;
  gap: 12px; flex-wrap: wrap; }
.qs-retry-btn { display: inline-flex; align-items: center; gap: 6px; background: var(--violet);
  color: #fff; font-family: var(--d); font-size: 14px; font-weight: 700;
  padding: 12px 28px; border-radius: 50px; border: none; cursor: pointer;
  transition: background .2s; }
.qs-retry-btn:hover { background: var(--vd); }
.qs-hub-btn { display: inline-flex; align-items: center; gap: 6px;
  background: transparent; color: var(--violet); font-family: var(--d);
  font-size: 14px; font-weight: 700; padding: 12px 28px; border-radius: 50px;
  border: 2px solid var(--violet); cursor: pointer; transition: background .2s, color .2s; }
.qs-hub-btn:hover { background: var(--violet); color: #fff; }

/* ── ERROR / NO DATA ── */
.qs-no-data { text-align: center; padding: 64px 24px; }
.qs-no-data h2 { font-family: var(--d); font-size: 24px; font-weight: 800; color: #111; margin-bottom: 12px; }
.qs-no-data p { font-size: 15px; color: var(--muted); margin-bottom: 24px; }
.qs-no-data a { color: var(--violet); font-weight: 600; }

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
@media (max-width: 640px) {
  .wrap { padding: 0 18px; }
  .me-nav-links { display: none; }
  .nav-hamburger { display: flex; }
  .qs-question-card { padding: 28px 22px; }
  .qs-results { padding: 36px 24px; }
  .foot-grid { grid-template-columns: 1fr 1fr; padding: 0 18px 32px; }
  .qs-progress-label { min-width: auto; }
}
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
}
</style>
</head>
<body <?php body_class('quiz-single'); ?>>
<?php wp_body_open(); ?>

<!-- NAV -->
<nav class="me-nav" id="me-nav" style="position:relative">
  <div class="me-nav-inner">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="me-logo">Maninder<em>English</em></a>
    <div class="me-nav-links">
      <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
      <a href="<?php echo esc_url( home_url('/levels/') ); ?>">Levels</a>
      <a href="<?php echo esc_url( home_url('/lessons/') ); ?>">Lessons</a>
      <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a>
      <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Vocabulary</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
      <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>" class="active">Quizzes</a>
    </div>
    <a href="https://www.youtube.com/@englishwithmaninder" target="_blank" rel="noopener" class="nav-yt">▶ YouTube</a>
    <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="me-nav-mobile" id="me-nav-mobile">
    <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
    <a href="<?php echo esc_url( home_url('/levels/') ); ?>">Levels</a>
    <a href="<?php echo esc_url( home_url('/lessons/') ); ?>">Lessons</a>
    <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a>
    <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Vocabulary</a>
    <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
    <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>" class="active">Quizzes</a>
  </div>
</nav>

<!-- QUIZ HEADER -->
<div class="qs-header">
  <div class="wrap qs-header-inner">
    <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>" class="qs-back">
      <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
      All Quizzes
    </a>
    <div class="qs-header-meta">
      <?php if ( $topic ) : ?>
        <span class="qs-topic-tag"><?php echo esc_html( $topic->name ); ?></span>
      <?php endif; ?>
      <span class="qs-diff-tag qs-diff-<?php echo esc_attr( $difficulty ); ?>"><?php echo esc_html( $diff_info['label'] ); ?></span>
    </div>
    <h1 class="qs-title"><?php echo esc_html( $quiz_title ); ?></h1>
    <?php if ( $description ) : ?>
      <p class="qs-desc"><?php echo esc_html( $description ); ?></p>
    <?php endif; ?>
  </div>
</div>

<!-- PROGRESS BAR -->
<?php if ( $has_questions ) : ?>
<div class="qs-progress-wrap">
  <div class="wrap">
    <div class="qs-progress-inner">
      <span class="qs-progress-label" id="qs-progress-label">Question 1 of <?php echo $q_count; ?></span>
      <div class="qs-progress-track">
        <div class="qs-progress-fill" id="qs-progress-fill"></div>
      </div>
      <span class="qs-progress-pct" id="qs-progress-pct">0%</span>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- QUIZ BODY -->
<div class="qs-body">
<div class="wrap">
<div class="qs-body-inner">

<?php if ( ! $has_questions ) : ?>

  <div class="qs-no-data">
    <h2>Quiz coming soon</h2>
    <p>This quiz is being built. Check back shortly, or <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>">browse other quizzes</a>.</p>
  </div>

<?php else : ?>

  <!-- QUESTION CARDS -->
  <?php foreach ( $questions as $i => $q ) :
    $letters = array( 'A', 'B', 'C', 'D', 'E' );
    $options  = $q['options'] ?? array();
    $answer   = (int) ( $q['answer'] ?? 0 );
    $expl     = $q['explanation'] ?? '';
    $hindi    = $q['hindi'] ?? '';
  ?>
  <div class="qs-question-card <?php echo $i === 0 ? 'active' : ''; ?>"
       id="qs-card-<?php echo $i; ?>"
       data-index="<?php echo $i; ?>"
       data-answer="<?php echo $answer; ?>">

    <div class="qs-q-num">Question <?php echo $i + 1; ?> of <?php echo $q_count; ?></div>
    <div class="qs-q-text"><?php echo esc_html( $q['q'] ?? '' ); ?></div>

    <div class="qs-options" id="qs-opts-<?php echo $i; ?>">
      <?php foreach ( $options as $j => $opt ) : ?>
      <button class="qs-option"
              onclick="qsSelectOption(<?php echo $i; ?>, <?php echo $j; ?>)"
              data-idx="<?php echo $j; ?>">
        <span class="qs-option-letter"><?php echo $letters[ $j ] ?? $j; ?></span>
        <span class="qs-option-text"><?php echo esc_html( $opt ); ?></span>
      </button>
      <?php endforeach; ?>
    </div>

    <!-- Feedback box -->
    <div class="qs-feedback" id="qs-fb-<?php echo $i; ?>">
      <div class="qs-feedback-verdict" id="qs-verdict-<?php echo $i; ?>"></div>
      <?php if ( $expl ) : ?>
        <div class="qs-feedback-explanation"><?php echo esc_html( $expl ); ?></div>
      <?php endif; ?>
      <?php if ( $hindi ) : ?>
        <div class="qs-feedback-hindi"><?php echo esc_html( $hindi ); ?></div>
      <?php endif; ?>
    </div>

  </div>
  <?php endforeach; ?>

  <!-- NEXT button (shared, moved per question) -->
  <div class="qs-next-wrap" id="qs-next-wrap">
    <button class="qs-next-btn" onclick="qsNext()">
      <span id="qs-next-label">Next Question</span>
      <span>→</span>
    </button>
  </div>

  <!-- RESULTS -->
  <div class="qs-results" id="qs-results">
    <span class="qs-results-icon" id="qs-results-icon">🎉</span>
    <h2 class="qs-results-title" id="qs-results-title">Quiz Complete!</h2>
    <p class="qs-results-sub" id="qs-results-sub"></p>
    <div class="qs-score-display">
      <span class="qs-score-num" id="qs-score-num">0</span>
      <span class="qs-score-denom">/ <?php echo $q_count; ?></span>
    </div>
    <div class="qs-results-msg" id="qs-results-msg"></div>
    <div class="qs-result-actions">
      <button class="qs-retry-btn" onclick="qsRestart()">🔄 Try Again</button>
      <button class="qs-hub-btn" onclick="window.location.href='<?php echo esc_url( home_url('/quizzes/') ); ?>'">Browse Quizzes</button>
    </div>
  </div>

<?php endif; ?>

</div>
</div>
</div>

<!-- FOOTER -->
<footer class="me-footer">
  <div class="foot-grid">
    <div>
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="foot-logo">Maninder<em>English</em></a>
      <div class="foot-hi">English + Psychology = Fluency</div>
      <p class="foot-desc">Psychology-based English for Indian professionals. 7 years of real British workplace experience.</p>
    </div>
    <div class="foot-col"><h4>Learn</h4><ul>
      <li><a href="<?php echo esc_url( home_url('/levels/') ); ?>">Choose Your Level</a></li>
      <li><a href="<?php echo esc_url( home_url('/lessons/') ); ?>">All Lessons</a></li>
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

<?php if ( $has_questions ) : ?>
<script>
(function(){
  'use strict';

  var TOTAL      = <?php echo $q_count; ?>;
  var current    = 0;
  var score      = 0;
  var answered   = new Array(TOTAL).fill(false);

  // ── Progress ──────────────────────────────────────────────────────────────
  function updateProgress(idx) {
    var done  = idx;
    var pct   = Math.round((done / TOTAL) * 100);
    var label = document.getElementById('qs-progress-label');
    var fill  = document.getElementById('qs-progress-fill');
    var pctEl = document.getElementById('qs-progress-pct');
    if (label) label.textContent = 'Question ' + (idx + 1) + ' of ' + TOTAL;
    if (fill)  fill.style.width  = pct + '%';
    if (pctEl) pctEl.textContent = pct + '%';
  }

  // ── Select option ─────────────────────────────────────────────────────────
  window.qsSelectOption = function(qIdx, optIdx) {
    if (answered[qIdx]) return;
    answered[qIdx] = true;

    var card    = document.getElementById('qs-card-' + qIdx);
    var correct = parseInt(card.dataset.answer, 10);
    var isRight = (optIdx === correct);
    if (isRight) score++;

    // Style all options
    var opts = card.querySelectorAll('.qs-option');
    opts.forEach(function(opt, j) {
      opt.classList.add('answered');
      if (j === correct) {
        opt.classList.add('correct');
      } else if (j === optIdx && !isRight) {
        opt.classList.add('wrong');
      } else {
        opt.classList.add('dimmed');
      }
    });

    // Show feedback
    var fb      = document.getElementById('qs-fb-' + qIdx);
    var verdict = document.getElementById('qs-verdict-' + qIdx);
    fb.classList.add('show');
    fb.classList.add(isRight ? 'fb-correct' : 'fb-wrong');
    if (verdict) {
      verdict.textContent = isRight ? '✓ Correct!' : '✗ Not quite';
    }

    // Show next button
    var nextWrap = document.getElementById('qs-next-wrap');
    var nextLabel = document.getElementById('qs-next-label');
    if (nextWrap) {
      nextWrap.classList.add('show');
      if (nextLabel) {
        nextLabel.textContent = (qIdx + 1 >= TOTAL) ? 'See Results' : 'Next Question';
      }
      // Scroll next button into view on mobile
      setTimeout(function() {
        nextWrap.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }, 200);
    }
  };

  // ── Next question ─────────────────────────────────────────────────────────
  window.qsNext = function() {
    var nextWrap = document.getElementById('qs-next-wrap');
    if (nextWrap) nextWrap.classList.remove('show');

    current++;

    if (current >= TOTAL) {
      showResults();
      return;
    }

    // Hide current, show next
    var cards = document.querySelectorAll('.qs-question-card');
    cards.forEach(function(c) { c.classList.remove('active'); });
    var nextCard = document.getElementById('qs-card-' + current);
    if (nextCard) nextCard.classList.add('active');

    updateProgress(current);
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  // ── Results ───────────────────────────────────────────────────────────────
  function showResults() {
    document.querySelectorAll('.qs-question-card').forEach(function(c) {
      c.classList.remove('active');
    });

    var results = document.getElementById('qs-results');
    if (!results) return;
    results.classList.add('show');

    var pct   = Math.round((score / TOTAL) * 100);
    var icon  = score === TOTAL ? '🏆' : score >= TOTAL * 0.7 ? '🎉' : score >= TOTAL * 0.4 ? '💪' : '📚';
    var title = score === TOTAL ? 'Perfect Score!' : score >= TOTAL * 0.7 ? 'Well Done!' : score >= TOTAL * 0.4 ? 'Good Effort!' : 'Keep Practising!';
    var sub   = 'You got ' + score + ' out of ' + TOTAL + ' correct (' + pct + '%).';
    var hindi = score === TOTAL ? 'शानदार! आप बहुत अच्छे हैं!' : score >= TOTAL * 0.7 ? 'बहुत अच्छा! थोड़ी और practice करो।' : score >= TOTAL * 0.4 ? 'अच्छी कोशिश! दोबारा try करो।' : 'कोई बात नहीं — फिर से try करो!';

    var scoreEl = document.getElementById('qs-score-num');
    var iconEl  = document.getElementById('qs-results-icon');
    var titleEl = document.getElementById('qs-results-title');
    var subEl   = document.getElementById('qs-results-sub');
    var hindiEl = document.getElementById('qs-results-msg');

    if (scoreEl)  scoreEl.textContent  = score;
    if (iconEl)   iconEl.textContent   = icon;
    if (titleEl)  titleEl.textContent  = title;
    if (subEl)    subEl.textContent    = sub;
    if (hindiEl)  hindiEl.textContent  = hindi;

    // Progress bar to 100%
    var fill  = document.getElementById('qs-progress-fill');
    var pctEl = document.getElementById('qs-progress-pct');
    var label = document.getElementById('qs-progress-label');
    if (fill)  fill.style.width   = '100%';
    if (pctEl) pctEl.textContent  = '100%';
    if (label) label.textContent  = 'Complete!';

    results.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  // ── Restart ───────────────────────────────────────────────────────────────
  window.qsRestart = function() {
    current  = 0;
    score    = 0;
    answered = new Array(TOTAL).fill(false);

    // Reset all cards
    document.querySelectorAll('.qs-question-card').forEach(function(card, i) {
      card.classList.remove('active');
      card.querySelectorAll('.qs-option').forEach(function(opt) {
        opt.classList.remove('correct','wrong','dimmed','answered');
      });
      var fb = document.getElementById('qs-fb-' + i);
      if (fb) { fb.classList.remove('show','fb-correct','fb-wrong'); }
    });

    var results = document.getElementById('qs-results');
    if (results) results.classList.remove('show');

    var firstCard = document.getElementById('qs-card-0');
    if (firstCard) firstCard.classList.add('active');

    updateProgress(0);
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  // ── Nav scroll ────────────────────────────────────────────────────────────
  var nav = document.getElementById('me-nav');
  window.addEventListener('scroll', function() {
    nav.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });
  var hbtn = document.getElementById('nav-hamburger');
  var hmob = document.getElementById('me-nav-mobile');
  if (hbtn && hmob) {
    hbtn.addEventListener('click', function() {
      hbtn.classList.toggle('open');
      hmob.classList.toggle('open');
    });
  }

  // Init
  updateProgress(0);

})();
</script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
