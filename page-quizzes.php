<?php
/**
 * page-quizzes.php — /quizzes/
 * Standalone quiz hub. Upload to /wp-content/themes/maninderenglish-child/
 * WordPress picks it up automatically via slug match.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── Topic metadata ─────────────────────────────────────────────────────────
$topic_meta = array(
    'everyday-tense-mistakes' => array(
        'emoji'   => '⏱️',
        'tagline' => 'Present, past, or future — get it right every time',
        'color'   => '#6633DD',
    ),
    'common-prepositions' => array(
        'emoji'   => '📍',
        'tagline' => 'In, on, at, by — the small words that trip everyone up',
        'color'   => '#1A2540',
    ),
    'daily-conversations' => array(
        'emoji'   => '💬',
        'tagline' => 'Sound natural in real everyday English situations',
        'color'   => '#2D6A4F',
    ),
);

// ── Query all published quizzes ────────────────────────────────────────────
$all_quizzes = get_posts( array(
    'post_type'      => 'quiz',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

// ── Group by topic ─────────────────────────────────────────────────────────
$quizzes_by_topic = array();
foreach ( $all_quizzes as $quiz ) {
    $topics = get_the_terms( $quiz->ID, 'quiz_topic' );
    if ( $topics && ! is_wp_error( $topics ) ) {
        foreach ( $topics as $topic ) {
            $quizzes_by_topic[ $topic->slug ][] = array(
                'post'  => $quiz,
                'topic' => $topic,
            );
        }
    } else {
        $quizzes_by_topic['_uncategorised'][] = array(
            'post'  => $quiz,
            'topic' => null,
        );
    }
}

$total_quizzes = count( $all_quizzes );
$total_topics  = count( array_filter( array_keys( $quizzes_by_topic ), fn($k) => $k !== '_uncategorised' ) );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizzes — Maninder English</title>
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
  --e2: cubic-bezier(.4,0,.2,1);
  --e3: cubic-bezier(.16,1,.3,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: var(--b); background: #fff; color: #111; -webkit-font-smoothing: antialiased; overflow-x: hidden; }
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

/* ── HERO ── */
.qh-hero { padding: 72px 0 56px; border-bottom: 1px solid var(--border); }
.qh-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-family: var(--d);
  font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: .12em;
  color: var(--violet); background: var(--vl);
  padding: 6px 16px; border-radius: 50px; margin-bottom: 24px; }
.qh-hero h1 { font-family: var(--d); font-size: clamp(36px,5vw,58px); font-weight: 800;
  color: #111; line-height: 1.08; letter-spacing: -.04em; margin-bottom: 14px; }
.qh-hero h1 em { font-style: normal; color: var(--violet); }
.qh-hero-hindi { font-family: var(--h); font-size: 18px; font-weight: 700; color: var(--sfdeep);
  border-left: 3px solid var(--sfdeep); padding-left: 14px; display: block; margin-bottom: 24px; line-height: 1.5; }
.qh-hero-sub { font-size: 18px; line-height: 1.75; color: #555;
  max-width: 600px; margin-bottom: 36px; }
.qh-stats { display: flex; align-items: center; gap: 32px; flex-wrap: wrap; }
.qh-stat { display: flex; flex-direction: column; gap: 4px; }
.qh-stat-num { font-family: var(--d); font-size: 28px; font-weight: 800; color: #111; letter-spacing: -.03em; }
.qh-stat-label { font-size: 13px; color: var(--muted); font-weight: 500; }

/* ── BODY ── */
.qh-body { padding: 64px 0 80px; }

/* ── TOPIC BLOCK ── */
.qh-topic-block { margin-bottom: 64px; opacity: 0; transform: translateY(20px);
  transition: opacity .6s var(--e2), transform .6s var(--e2); }
.qh-topic-block.in { opacity: 1; transform: none; }

.qh-topic-header { display: flex; align-items: flex-start; justify-content: space-between;
  gap: 16px; margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1.5px solid var(--border); }
.qh-topic-left { display: flex; align-items: center; gap: 16px; }
.qh-topic-emoji { font-size: 32px; line-height: 1;
  font-family: "Apple Color Emoji","Segoe UI Emoji","Noto Color Emoji",sans-serif; }
.qh-topic-name { font-family: var(--d); font-size: clamp(20px,2.5vw,26px); font-weight: 800;
  color: #111; letter-spacing: -.02em; margin-bottom: 4px; }
.qh-topic-tagline { font-size: 14px; color: var(--muted); }
.qh-topic-count { font-size: 12px; font-weight: 700; color: var(--violet);
  background: var(--vl); padding: 4px 12px; border-radius: 20px;
  white-space: nowrap; align-self: center; }

/* ── TOPIC COLUMNS (desktop: 3 side by side) ── */
.qh-topics-columns { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; padding-bottom: 80px; }
.qh-topic-col { display: flex; flex-direction: column; }
.qh-topic-col-header { padding: 22px 22px 18px; background: var(--off);
  border: 1.5px solid var(--border); border-radius: 14px 14px 0 0; border-bottom: 2px solid var(--violet); }
.qh-topic-col-emoji { font-size: 28px; line-height: 1; display: block; margin-bottom: 10px;
  font-family: "Apple Color Emoji","Segoe UI Emoji","Noto Color Emoji",sans-serif; }
.qh-topic-col-name { font-family: var(--d); font-size: 15px; font-weight: 800;
  color: #111; letter-spacing: -.02em; margin-bottom: 4px; line-height: 1.2; }
.qh-topic-col-tagline { font-size: 12px; color: var(--muted); line-height: 1.5; }
.qh-topic-col-count { display: inline-block; font-size: 11px; font-weight: 700;
  color: var(--violet); background: var(--vl); padding: 3px 10px;
  border-radius: 20px; margin-top: 8px; }

/* ── QUIZ CARDS ── */
.qh-quiz-grid { display: flex; flex-direction: column; gap: 0; }

.qh-quiz-card { display: flex; flex-direction: column; padding: 20px 22px; background: #fff;
  border: 1.5px solid var(--border); border-top: none; border-radius: 0;
  transition: background .18s;
  opacity: 0; transform: translateY(6px);
  animation: cardIn .45s var(--e3) forwards; }
.qh-quiz-card:last-child { border-radius: 0 0 14px 14px; }
.qh-quiz-card:hover { background: var(--off); }

@keyframes cardIn { to { opacity: 1; transform: translateY(0); } }

.qh-card-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; }
.qh-card-q-count { font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .08em; color: var(--muted); background: var(--off);
  padding: 3px 10px; border-radius: 20px; border: 1px solid var(--border); }
.qh-card-difficulty { font-size: 11px; font-weight: 700; text-transform: uppercase;
  letter-spacing: .06em; padding: 3px 10px; border-radius: 20px; }
.qh-diff-beginner   { color: #0A5C3B; background: #E6F7F0; border: 1px solid #6DCFA7; }
.qh-diff-intermediate { color: #1B3D8F; background: #E8EFFE; border: 1px solid #93B4F5; }
.qh-diff-professional { color: #7C3A00; background: #FFF0DC; border: 1px solid #F5C07A; }

.qh-card-title { font-family: var(--d); font-size: 17px; font-weight: 800; color: #111;
  line-height: 1.25; margin-bottom: 8px; letter-spacing: -.015em; }
.qh-card-desc { font-size: 13px; color: var(--muted); line-height: 1.6; flex: 1; margin-bottom: 20px; }
.qh-card-footer { display: flex; align-items: center; justify-content: space-between; margin-top: auto; }
.qh-start-btn { display: inline-flex; align-items: center; gap: 6px; background: var(--violet);
  color: #fff; font-family: var(--d); font-size: 13px; font-weight: 700;
  padding: 9px 18px; border-radius: 50px; transition: background .2s; }
.qh-start-btn:hover { background: var(--vd); color: #fff; }
.qh-card-time { font-size: 12px; color: var(--muted); }

/* ── EMPTY STATE ── */
.qh-empty { padding: 64px 24px; text-align: center; border: 1.5px dashed var(--border);
  border-radius: 16px; }
.qh-empty-icon { font-size: 44px; display: block; margin-bottom: 16px; }
.qh-empty p { font-size: 15px; color: var(--muted); line-height: 1.65; }

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
  .qh-topics-columns { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 640px) {
  .wrap { padding: 0 18px; }
  .qh-hero { padding: 48px 0 48px; }
  .me-nav-links { display: none; }
  .nav-hamburger { display: flex; }
  .qh-topics-columns { grid-template-columns: 1fr; gap: 32px; }
  .qh-quiz-card { border: 1.5px solid var(--border); border-top: none; }
  .foot-grid { grid-template-columns: 1fr 1fr; padding: 0 18px 32px; }
  .qh-stats { gap: 24px; }
}
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
}
</style>
</head>
<body <?php body_class('quiz-hub'); ?>>
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

    <a href="<?php echo esc_url( home_url('/grammar/') ); ?>">Grammar</a>
    <a href="<?php echo esc_url( home_url('/vocabulary/') ); ?>">Vocabulary</a>
    <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
    <a href="<?php echo esc_url( home_url('/quizzes/') ); ?>" class="active">Quizzes</a>
  </div>
</nav>

<!-- HERO -->
<section class="qh-hero">
  <div class="wrap qh-hero-inner">
    <div class="qh-eyebrow">✏️ Quizzes</div>
    <h1>Test what you<br><em>actually know</em></h1>
    <span class="qh-hero-hindi">गलती पकड़ो — Hindi में समझो — दोबारा मत करो</span>
    <p class="qh-hero-sub">Quick quizzes on real English mistakes. Instant feedback with Hindi explanations — so you understand why, not just what.</p>
    <div class="qh-stats">
      <div class="qh-stat">
        <span class="qh-stat-num"><?php echo $total_quizzes ?: '—'; ?></span>
        <span class="qh-stat-label">Quizzes</span>
      </div>
      <div class="qh-stat">
        <span class="qh-stat-num"><?php echo $total_topics ?: '—'; ?></span>
        <span class="qh-stat-label">Topics</span>
      </div>
      <div class="qh-stat">
        <span class="qh-stat-num">Free</span>
        <span class="qh-stat-label">Always</span>
      </div>
      <div class="qh-stat">
        <span class="qh-stat-num">Hindi</span>
        <span class="qh-stat-label">Explanations</span>
      </div>
    </div>
  </div>
</section>

<!-- BODY -->
<div class="qh-body">
<div class="wrap">

<?php if ( empty( $all_quizzes ) ) : ?>
  <div class="qh-empty">
    <span class="qh-empty-icon">✏️</span>
    <p>Quizzes are being built. In the meantime, <a href="<?php echo esc_url( home_url('/grammar/') ); ?>" style="color:var(--violet);font-weight:600">start with Grammar</a>.</p>
  </div>

<?php else :
  $topic_order = array( 'everyday-tense-mistakes', 'common-prepositions', 'daily-conversations' );
  // Build ordered list + any extras
  $ordered = array();
  foreach ( $topic_order as $slug ) {
    if ( ! empty( $quizzes_by_topic[ $slug ] ) ) $ordered[] = $slug;
  }
  foreach ( $quizzes_by_topic as $slug => $items ) {
    if ( ! in_array( $slug, $ordered ) && $slug !== '_uncategorised' ) $ordered[] = $slug;
  }
?>

<div class="qh-topics-columns">
<?php foreach ( $ordered as $col_idx => $slug ) :
  $items        = $quizzes_by_topic[ $slug ];
  $sample_topic = $items[0]['topic'];
  $meta         = $topic_meta[ $slug ] ?? array();
  $emoji        = $meta['emoji']   ?? '📝';
  $tagline      = $meta['tagline'] ?? '';
  $count        = count( $items );
?>
  <div class="qh-topic-col">

    <!-- Column header -->
    <div class="qh-topic-col-header">
      <span class="qh-topic-col-emoji"><?php echo $emoji; ?></span>
      <div class="qh-topic-col-name"><?php echo esc_html( $sample_topic->name ); ?></div>
      <?php if ( $tagline ) : ?>
        <div class="qh-topic-col-tagline"><?php echo esc_html( $tagline ); ?></div>
      <?php endif; ?>
      <span class="qh-topic-col-count"><?php echo $count . ' ' . ( $count === 1 ? 'quiz' : 'quizzes' ); ?></span>
    </div>

    <!-- Quiz cards stacked inside column -->
    <div class="qh-quiz-grid">
      <?php foreach ( $items as $idx => $item ) :
        $quiz       = $item['post'];
        $q_data     = json_decode( get_post_meta( $quiz->ID, 'me_quiz_data', true ), true );
        $q_count    = is_array( $q_data ) ? count( $q_data ) : 0;
        $difficulty = get_post_meta( $quiz->ID, 'me_quiz_difficulty', true ) ?: 'beginner';
        $desc       = get_post_meta( $quiz->ID, 'me_quiz_desc', true ) ?: '';
        $mins       = $q_count ? ceil( $q_count * 0.5 ) : 0;
      ?>
      <a href="<?php echo esc_url( get_permalink( $quiz ) ); ?>"
         class="qh-quiz-card"
         style="animation-delay:<?php echo ( $col_idx * 0.1 + $idx * 0.06 ); ?>s">
        <div class="qh-card-top">
          <span class="qh-card-q-count"><?php echo $q_count; ?> questions</span>
          <span class="qh-card-difficulty qh-diff-<?php echo esc_attr( $difficulty ); ?>"><?php echo esc_html( ucfirst( $difficulty ) ); ?></span>
        </div>
        <div class="qh-card-title"><?php echo esc_html( $quiz->post_title ); ?></div>
        <?php if ( $desc ) : ?>
          <div class="qh-card-desc"><?php echo esc_html( wp_trim_words( $desc, 16 ) ); ?></div>
        <?php endif; ?>
        <div class="qh-card-footer">
          <span class="qh-start-btn">Start Quiz →</span>
          <?php if ( $mins ) : ?>
            <span class="qh-card-time">~<?php echo $mins; ?> min</span>
          <?php endif; ?>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

  </div>
<?php endforeach; ?>
</div>

<?php endif; ?>

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
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
