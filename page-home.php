<?php
/**
 * Template Name: Maninder English — Homepage
 * Description: Full-width animated homepage. No Astra header/footer (XPRO handles those).
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<style>
/* ══════════════════════════════════════════════════
   MANINDER ENGLISH — HOMEPAGE STYLES v10
   Cream base · BBC-clarity · Psychology edge
   ══════════════════════════════════════════════════ */
:root {
  --bg:      #F7F4EE;
  --white:   #FFFFFF;
  --card:    #F2F1ED;
  --navy:    #1A2540;
  --navy2:   #263354;
  --violet:  #6633DD;
  --vd:      #5220C8;
  --vl:      #EDE8FB;
  --vm:      #8B6CF6;
  --saffron: #C97A10;
  --sfdeep:  #B5470F;
  --sbg:     #FEF3C7;
  --green:   #047857;
  --gbg:     #ECFDF5;
  --red:     #C81C1C;
  --rbg:     #FEF2F2;
  --border:  #E4E1D9;
  --muted:   #64748B;
  --d: 'Plus Jakarta Sans', sans-serif;
  --b: 'Inter', sans-serif;
  --h: 'Noto Sans Devanagari', sans-serif;
  --e1: cubic-bezier(.22,.68,0,1.2);
  --e2: cubic-bezier(.4,0,.2,1);
  --e3: cubic-bezier(.16,1,.3,1);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;font-size:16px}
body{font-family:var(--b);background:var(--bg);color:var(--navy);-webkit-font-smoothing:antialiased;overflow-x:hidden;line-height:1.65}
a{text-decoration:none;color:inherit}
img{display:block;max-width:100%}
button{font-family:var(--b);cursor:pointer}
h1,h2,h3,h4{font-family:var(--d);line-height:1.15;letter-spacing:-.02em;color:var(--navy)}
p{color:var(--muted);line-height:1.72}
.hn{font-family:var(--h);color:var(--saffron)}

.wrap{width:100%;max-width:1160px;margin:0 auto;padding:0 36px}
section{padding:80px 0}
.sh{margin-bottom:48px}
.sh .eye{display:inline-block;font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--violet);margin-bottom:10px}
.sh h2{font-size:clamp(28px,3.2vw,42px);font-weight:800;margin-bottom:12px}
.sh p{font-size:17px;max-width:560px;color:var(--muted)}
.sh-center{text-align:center}.sh-center p{margin:0 auto}

/* ── SCROLL PROGRESS ── */
#spb{position:fixed;top:0;left:0;height:3px;width:0;z-index:9999;background:linear-gradient(90deg,var(--violet),var(--vm));transition:width .07s linear;border-radius:0 2px 2px 0}

/* ── ANIMATIONS ── */
@keyframes floatY{0%,100%{transform:translateY(0)}50%{transform:translateY(-14px)}}
@keyframes blink{50%{opacity:0}}
@keyframes livepulse{0%{box-shadow:0 0 0 0 rgba(239,68,68,.6)}70%{box-shadow:0 0 0 8px rgba(239,68,68,0)}100%{box-shadow:0 0 0 0 rgba(239,68,68,0)}}
@keyframes navpulse{0%{box-shadow:0 0 0 0 rgba(201,122,16,.6)}70%{box-shadow:0 0 0 8px rgba(201,122,16,0)}100%{box-shadow:0 0 0 0 rgba(201,122,16,0)}}
@keyframes marquee{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@keyframes wordIn{from{opacity:0;transform:translateY(7px)}to{opacity:1;transform:none}}
@keyframes badgePop{0%{transform:scale(.82);opacity:0}70%{transform:scale(1.04)}100%{transform:scale(1);opacity:1}}

/* ── REVEAL ── */
.fade{opacity:0;transform:translateY(24px);transition:opacity .65s var(--e2),transform .65s var(--e2)}
.fade.in{opacity:1;transform:none}
.fade.fromLeft{transform:translateX(-24px)}.fade.fromLeft.in{transform:none}
.fade.fromRight{transform:translateX(24px)}.fade.fromRight.in{transform:none}
.d1{transition-delay:.07s}.d2{transition-delay:.14s}.d3{transition-delay:.21s}
.d4{transition-delay:.28s}.d5{transition-delay:.35s}.d6{transition-delay:.42s}

/* ── Scroll-reveal upgrade: scale-pop for cards, uses existing --e3 curve ── */
.level-card.fade,
.lesson-card.fade{
  transform: translateY(24px) scale(.95);
  transition: opacity .65s var(--e3), transform .65s var(--e3);
}
.level-card.fade.in,
.lesson-card.fade.in{
  transform: none;
}
@media (prefers-reduced-motion: reduce){
  .fade,.fade.fromLeft,.fade.fromRight,.level-card.fade,.lesson-card.fade{
    transition:none!important;opacity:1!important;transform:none!important
  }
}

/* ── BUTTONS ── */
.btn{display:inline-flex;align-items:center;gap:8px;font-family:var(--d);font-weight:700;font-size:15px;padding:13px 26px;border-radius:11px;border:1.5px solid transparent;transition:transform .2s var(--e2),box-shadow .2s var(--e2),background .18s,color .18s;white-space:nowrap;cursor:pointer;letter-spacing:-.01em}
.btn-v{background:var(--violet);color:#fff;box-shadow:0 4px 18px rgba(102,51,221,.3)}
.btn-v:hover{background:var(--vd);transform:translateY(-2px);box-shadow:0 10px 30px rgba(102,51,221,.4)}
.btn-outline{background:var(--white);color:var(--navy);border-color:var(--border)}
.btn-outline:hover{border-color:var(--violet);color:var(--violet);transform:translateY(-1px)}
.btn-lg{padding:15px 32px;font-size:16px;border-radius:12px}
.btn-sm{padding:9px 18px;font-size:13px;border-radius:9px}
.btn-yt{background:#FF0000;color:#fff;box-shadow:0 4px 18px rgba(255,0,0,.25)}
.btn-yt:hover{background:#cc0000;transform:translateY(-2px);box-shadow:0 10px 30px rgba(255,0,0,.35)}

/* ══════════════════════════════════════
   NAV (XPRO handles this — nav below is
   a fallback if XPRO not yet configured)
   ══════════════════════════════════════ */
.me-nav{position:sticky;top:0;z-index:400;background:rgba(255,255,255,.96);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid var(--border);transition:box-shadow .28s var(--e2)}
.me-nav.scrolled{box-shadow:0 2px 24px rgba(26,37,64,.08)}
.me-nav-wrap{display:flex;align-items:center;height:68px;gap:0;max-width:1160px;margin:0 auto;padding:0 36px}
.me-logo{font-family:var(--d);font-weight:800;font-size:21px;letter-spacing:-.035em;color:var(--navy);flex-shrink:0;margin-right:auto}
.me-logo em{font-style:normal;color:var(--violet)}
.me-nav-links{display:flex;align-items:center;gap:2px;list-style:none}
.me-nav-links a{font-size:14px;font-weight:500;color:var(--muted);padding:8px 14px;border-radius:8px;display:block;transition:color .18s,background .18s}
.me-nav-links a:hover{color:var(--navy);background:var(--card)}
.me-nav-links a.active{color:var(--violet)}
.me-nav-right{display:flex;align-items:center;gap:10px;flex-shrink:0;margin-left:18px}
.me-hamburger{display:none;background:none;border:none;font-size:22px;color:var(--navy);cursor:pointer}

/* ══════════════════════════════════════
   HERO
   ══════════════════════════════════════ */
.hero-outer{background:var(--white);padding:56px 0 68px;border-bottom:1px solid var(--border)}
.hero-grid{display:grid;grid-template-columns:1.25fr 1fr;gap:56px;align-items:center}
.hero-badge{display:inline-flex;align-items:center;gap:8px;background:var(--vl);color:var(--violet);font-size:13px;font-weight:600;padding:7px 16px;border-radius:50px;margin-bottom:24px;border:1px solid rgba(102,51,221,.15);animation:badgePop .6s .1s both}
.hero-badge .hb-dot{width:6px;height:6px;border-radius:50%;background:var(--violet)}
.hero-h1{font-size:clamp(38px,4.8vw,60px);font-weight:800;margin-bottom:14px;line-height:1.07}
.hero-h1 em{font-style:normal;background:linear-gradient(130deg,var(--violet) 0%,var(--vm) 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.hero-hindi{font-family:var(--h);font-size:19px;font-weight:700;color:var(--sfdeep);border-left:4px solid var(--sfdeep);padding-left:14px;margin-bottom:22px;line-height:1.6}
.hero-sub{font-size:18px;margin-bottom:34px;max-width:480px;line-height:1.72;color:var(--muted)}
.hero-sub strong{color:var(--navy);font-weight:600}
.hero-ctas{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:44px}
.hero-stats{display:flex;gap:0;padding-top:28px;border-top:1px solid var(--border)}
.hstat{flex:1}
.hstat+.hstat{padding-left:24px;border-left:1px solid var(--border)}
.hstat .n{font-family:var(--d);font-size:28px;font-weight:800;color:var(--navy);line-height:1}
.hstat .l{font-size:12px;color:var(--muted);margin-top:4px}

/* Hero right — violet card */
.hero-r{background:var(--violet);border-radius:28px;padding:36px 28px;min-height:480px;position:relative;overflow:hidden;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:18px;box-shadow:0 28px 64px rgba(102,51,221,.24)}
.hero-r::before{content:'';position:absolute;top:-80px;right:-80px;width:240px;height:240px;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none}
.hero-r::after{content:'';position:absolute;bottom:-70px;left:-50px;width:190px;height:190px;border-radius:50%;background:rgba(255,255,255,.05);pointer-events:none}

/* Floating correction card */
.lcard{background:#fff;border-radius:18px;box-shadow:0 24px 52px rgba(0,0,0,.22);width:100%;max-width:320px;overflow:hidden;animation:floatY 5.5s ease-in-out infinite;position:relative;z-index:2}
.lcard-head{padding:16px 20px 13px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}
.lcard-tag{font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--violet);background:var(--vl);padding:4px 11px;border-radius:50px}
.lcard-live{display:flex;align-items:center;gap:5px;font-size:11px;font-weight:600;color:#ef4444}
.lcard-live-dot{width:6px;height:6px;border-radius:50%;background:#ef4444;animation:livepulse 1.4s infinite}
.lcard-body{padding:16px 20px}
.tw-line{font-family:var(--d);font-size:15px;font-weight:600;min-height:24px;color:var(--navy)}
.tw-cur{display:inline-block;width:2px;height:15px;background:var(--violet);vertical-align:middle;margin-left:2px;animation:blink 1s step-end infinite}
.tw-hi{font-family:var(--h);font-size:12px;min-height:18px;margin-top:6px;font-weight:500}
.lcard-div{height:1px;background:var(--border);margin:12px 0}
.lcard-row{display:flex;align-items:center;gap:10px;padding:10px 13px;border-radius:10px;font-family:var(--d);font-size:13.5px;font-weight:600;margin-bottom:7px}
.lcard-ico{width:19px;height:19px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800;color:#fff;flex-shrink:0}
.lc-w{background:var(--rbg);color:var(--red)}.lc-w .lcard-ico{background:var(--red)}
.lc-r{background:var(--gbg);color:var(--green)}.lc-r .lcard-ico{background:var(--green)}

/* Mini stat bar inside hero */
.hero-mini{display:flex;width:100%;max-width:320px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.16);border-radius:14px;overflow:hidden;position:relative;z-index:2}
.hm{flex:1;text-align:center;padding:14px 8px;color:#fff}
.hm+.hm{border-left:1px solid rgba(255,255,255,.15)}
.hm .n{font-family:var(--d);font-size:19px;font-weight:800}
.hm .l{font-size:10px;opacity:.72;margin-top:2px}

/* ══════════════════════════════════════
   MARQUEE — Social proof
   ══════════════════════════════════════ */
.marquee-strip{background:var(--white);border-top:1px solid var(--border);border-bottom:1px solid var(--border);overflow:hidden;position:relative}
.marquee-strip::before,.marquee-strip::after{content:'';position:absolute;top:0;bottom:0;width:80px;z-index:2;pointer-events:none}
.marquee-strip::before{left:0;background:linear-gradient(to right,#fff,transparent)}
.marquee-strip::after{right:0;background:linear-gradient(to left,#fff,transparent)}
.marquee-track{display:flex;animation:marquee 42s linear infinite;width:max-content}
.marquee-track:hover{animation-play-state:paused}
.mq-item{display:flex;align-items:center;gap:14px;padding:16px 32px;border-right:1px solid var(--border);flex-shrink:0;min-width:280px}
.mq-av{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--vl),#ddd6fe);display:flex;align-items:center;justify-content:center;font-family:var(--d);font-weight:800;font-size:13px;color:var(--violet);flex-shrink:0}
.mq-t{font-size:13px;color:var(--muted);line-height:1.4}
.mq-t strong{color:var(--navy);font-weight:600}
.mq-stars{color:var(--saffron);font-size:10px;margin-top:1px}
.mq-city{font-size:11px;color:#9CA3AF;margin-top:1px}

/* ══════════════════════════════════════
   CHOOSE YOUR LEVEL
   White section bg · pastel cards · premium dark text
   Colours: exact hex from approved palette
   ══════════════════════════════════════ */
.levels-section{background:#FFFFFF;padding:96px 0}
.level-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:12px;
  margin-top:52px;
}

/* ── BASE CARD ── */
.level-card{
  border-radius:28px;
  padding:0;
  position:relative;overflow:hidden;
  display:flex;flex-direction:column;
  text-decoration:none;
  border:1.5px solid transparent;
  box-shadow:
    0 1px 2px rgba(0,0,0,.04),
    0 4px 16px rgba(0,0,0,.06),
    0 16px 40px rgba(0,0,0,.07);
  transition:
    transform .12s ease-out,
    box-shadow .4s cubic-bezier(.22,1,.36,1),
    border-color .3s ease;
  will-change:transform;
  transform-style:preserve-3d;
}
.level-card:hover{
  box-shadow:
    0 2px 4px rgba(0,0,0,.03),
    0 12px 32px rgba(0,0,0,.10),
    0 36px 72px rgba(0,0,0,.14);
}
/* Shine sweep — diagonal highlight that travels across on hover */
.level-card::after{
  content:'';
  position:absolute;inset:0;
  background:linear-gradient(115deg,transparent 30%,rgba(255,255,255,.35) 45%,transparent 60%);
  transform:translateX(-120%);
  transition:transform .7s cubic-bezier(.22,1,.36,1);
  pointer-events:none;
  z-index:2;
}
.level-card:hover::after{transform:translateX(120%)}

/* ── EXACT PALETTE (approved colour table) ── */
/* Beginner = Sky Blue */
.lv-beginner{background:#C8E4F8;border-color:#93C8EF}
.lv-beginner:hover{border-color:#5AAAD8}

/* Intermediate = Peach */
.lv-intermediate{background:#FAD5CF;border-color:#F4A89E}
.lv-intermediate:hover{border-color:#E07A70}

/* Advanced = Lavender */
.lv-advanced{background:#DDD6FF;border-color:#B8A8F8}
.lv-advanced:hover{border-color:#9080E8}

/* Business = Mint */
.lv-business{background:#C8E8D4;border-color:#90CFA8}
.lv-business:hover{border-color:#60B880}

/* ── ICON ZONE — layered composition, Webflow-style depth ── */
.lv-icon-wrap{
  width:100%;
  padding:26px 0 18px;
  display:flex;align-items:center;justify-content:center;
  position:relative;z-index:3;
  perspective:800px;
}
.lv-icon-stage{
  position:relative;width:130px;height:100px;
  transform-style:preserve-3d;
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}

/* Layer 1 — back shape, offset behind-left, rotated */
.lv-layer-back{
  position:absolute;
  width:88px;height:88px;border-radius:24px;
  top:6px;left:0;
  transform:rotate(-8deg) translateZ(0px);
  box-shadow:0 8px 20px rgba(0,0,0,.14);
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}
/* Layer 2 — front shape, offset right, holds the main icon */
.lv-layer-front{
  position:absolute;
  width:92px;height:92px;border-radius:26px;
  top:0;left:34px;
  display:flex;align-items:center;justify-content:center;
  transform:rotate(5deg) translateZ(20px);
  box-shadow:0 14px 32px rgba(0,0,0,.20),0 3px 8px rgba(0,0,0,.10);
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}
/* Layer 3 — small accent badge, floats top-right corner */
.lv-layer-accent{
  position:absolute;
  width:38px;height:38px;border-radius:12px;
  top:-8px;right:6px;
  display:flex;align-items:center;justify-content:center;
  background:#fff;
  box-shadow:0 6px 16px rgba(0,0,0,.18);
  transform:rotate(-6deg) translateZ(40px);
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}

/* On hover — layers separate further, stage tilts subtly */
.level-card:hover .lv-layer-back{transform:rotate(-14deg) translateY(4px) translateZ(0px)}
.level-card:hover .lv-layer-front{transform:rotate(9deg) translateY(-6px) translateZ(30px)}
.level-card:hover .lv-layer-accent{transform:rotate(4deg) translateY(-10px) translateZ(60px) scale(1.1)}

/* Per-card colours — back/front layers use card's deep + mid tone */
.lv-beginner .lv-layer-back{background:#5A94C8}
.lv-beginner .lv-layer-front{background:#1A5C96}
.lv-beginner .lv-layer-accent svg{stroke:#1A5C96}

.lv-intermediate .lv-layer-back{background:#E08868}
.lv-intermediate .lv-layer-front{background:#B04020}
.lv-intermediate .lv-layer-accent svg{stroke:#B04020}

.lv-advanced .lv-layer-back{background:#8F72E8}
.lv-advanced .lv-layer-front{background:#5520CC}
.lv-advanced .lv-layer-accent svg{stroke:#5520CC}

.lv-business .lv-layer-back{background:#4C9068}
.lv-business .lv-layer-front{background:#1A5C38}
.lv-business .lv-layer-accent svg{stroke:#1A5C38}

/* ── TEXT BODY ── */
.lv-body{
  padding:6px 30px 24px;
  display:flex;flex-direction:column;flex:1;
  text-align:left;
  position:relative;z-index:3;
}
.lv-title{
  font-family:var(--d);
  font-size:22px;font-weight:800;
  color:#101010;
  margin-bottom:5px;letter-spacing:-.02em;
}
/* Hindi — solid near-black, no accent mix */
.lv-hindi{
  font-family:var(--h);font-size:12.5px;font-weight:700;
  color:#101010;opacity:.65;
  display:block;margin-bottom:13px;letter-spacing:.01em;
}
/* Body — near-black for premium readability */
.lv-desc{
  font-size:14px;color:#1a1a1a;
  line-height:1.72;flex:1;
}
/* CTA pill — per-card accent colour, ties identity together */
.lv-cta{
  margin-top:24px;
  display:inline-flex;align-items:center;gap:8px;
  font-size:11.5px;font-weight:700;
  letter-spacing:.07em;text-transform:uppercase;
  border-radius:50px;padding:9px 20px;
  width:fit-content;
  border:1.5px solid transparent;
  transition:background .25s ease,gap .25s ease;
}
.lv-beginner   .lv-cta{border-color:#1A5C96;color:#1A5C96}
.lv-intermediate .lv-cta{border-color:#B04020;color:#B04020}
.lv-advanced   .lv-cta{border-color:#5520CC;color:#5520CC}
.lv-business   .lv-cta{border-color:#1A5C38;color:#1A5C38}

.lv-beginner:hover   .lv-cta{background:rgba(26,92,150,.1);gap:13px}
.lv-intermediate:hover .lv-cta{background:rgba(176,64,32,.1);gap:13px}
.lv-advanced:hover   .lv-cta{background:rgba(85,32,204,.1);gap:13px}
.lv-business:hover   .lv-cta{background:rgba(26,92,56,.1);gap:13px}

/* ══════════════════════════════════════
   LATEST LESSONS — YouTube Embeds
   ══════════════════════════════════════ */
.lessons-section{background:var(--white);padding:80px 0;border-top:1px solid var(--border)}
.lessons-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.lesson-card{
  background:#FFFFFF;border:1.5px solid transparent;border-radius:20px;overflow:hidden;
  box-shadow:0 1px 3px rgba(26,37,64,.05),0 6px 16px rgba(26,37,64,.07),0 14px 28px rgba(26,37,64,.05);
  transition:transform .12s ease-out,box-shadow .4s cubic-bezier(.22,1,.36,1),border-color .3s ease;
  will-change:transform;position:relative;transform-style:preserve-3d;
}
.lesson-card:hover{
  box-shadow:0 2px 4px rgba(26,37,64,.04),0 12px 32px rgba(102,51,221,.12),0 32px 64px rgba(26,37,64,.14);
  border-color:rgba(102,51,221,.22);
}
/* Shine sweep — consistent with level/explore cards */
.lesson-card::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(115deg,transparent 30%,rgba(255,255,255,.35) 45%,transparent 60%);
  transform:translateX(-120%);
  transition:transform .7s cubic-bezier(.22,1,.36,1);
  pointer-events:none;z-index:5;
}
.lesson-card:hover::after{transform:translateX(120%)}

/* ── THUMBNAIL — richer treatment with pattern + icon watermark ── */
.lesson-thumb{position:relative;aspect-ratio:16/9;overflow:hidden;cursor:pointer}
.lesson-thumb iframe{width:100%;height:100%;border:none;display:block}
.lesson-thumb-placeholder{
  position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
  overflow:hidden;
}
/* Base gradient per topic — set inline per card via data attribute fallback handled in PHP below */
.lt-grammar{background:linear-gradient(150deg,#2A1B5E 0%,#1A1040 100%)}
.lt-phrasal{background:linear-gradient(150deg,#5A2E0E 0%,#331A08 100%)}
.lt-pronun{background:linear-gradient(150deg,#0E3D2E 0%,#08221A 100%)}

/* Dot-grid texture overlay */
.lesson-thumb-placeholder::before{
  content:'';position:absolute;inset:0;
  background-image:radial-gradient(rgba(255,255,255,.10) 1.5px,transparent 1.5px);
  background-size:22px 22px;
  opacity:.6;
}
/* Large faded watermark icon, bottom-right, rotated */
.lt-watermark{
  position:absolute;bottom:-18px;right:-14px;
  opacity:.14;transform:rotate(-8deg);
  transition:transform .5s cubic-bezier(.22,1,.36,1),opacity .5s ease;
}
.lesson-card:hover .lt-watermark{transform:rotate(-4deg) scale(1.08);opacity:.20}

/* Play button — pulsing ring on hover */
.play-btn-wrap{position:relative;z-index:2;display:flex;align-items:center;justify-content:center}
.play-btn-ring{
  position:absolute;width:56px;height:56px;border-radius:50%;
  border:2px solid rgba(255,255,255,.5);
  opacity:0;transform:scale(1);
}
.lesson-thumb:hover .play-btn-ring{
  animation:playPulse 1.4s cubic-bezier(.22,1,.36,1) infinite;
}
@keyframes playPulse{
  0%{opacity:.6;transform:scale(1)}
  100%{opacity:0;transform:scale(1.6)}
}
.play-btn-yt{width:56px;height:56px;border-radius:50%;background:#FF0000;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(255,0,0,.4);transition:transform .3s cubic-bezier(.22,1,.36,1);position:relative;z-index:2}
.lesson-thumb:hover .play-btn-yt{transform:scale(1.14)}
.play-btn-yt svg{width:22px;height:22px;fill:#fff;margin-left:3px}

.lesson-level-badge{position:absolute;top:12px;left:12px;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;padding:5px 12px;border-radius:50px;z-index:3;backdrop-filter:blur(4px)}
.lb-b{background:rgba(239,246,255,.95);color:#1E40AF;border:1px solid #BFDBFE}
.lb-i{background:rgba(255,251,235,.95);color:#92400E;border:1px solid #FDE68A}
.lb-a{background:rgba(237,232,251,.95);color:#4C1D95;border:1px solid #DDD6FE}

.lesson-body{padding:20px;position:relative;z-index:3}
.lesson-topic{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--violet);margin-bottom:8px}
.lesson-body h3{font-size:18px;font-weight:700;margin-bottom:6px;line-height:1.3;color:var(--navy)}
.lesson-hindi{font-family:var(--h);font-size:13px;color:var(--sfdeep);font-weight:700;display:block;margin-bottom:8px}
.lesson-body p{font-size:14px;color:var(--muted)}

/* YT channel CTA — premium redesign */
.yt-channel-cta{
  margin-top:40px;
  background:linear-gradient(135deg,#1A0F3D 0%,#2D1B69 100%);
  border-radius:20px;padding:32px 36px;
  display:flex;align-items:center;justify-content:space-between;gap:24px;
  position:relative;overflow:hidden;
  box-shadow:0 12px 32px rgba(45,27,105,.25);
}
.yt-channel-cta::before{
  content:'';position:absolute;top:-40%;right:-8%;
  width:280px;height:280px;border-radius:50%;
  background:radial-gradient(circle,rgba(255,0,0,.18),transparent 70%);
  pointer-events:none;
}
.yt-channel-cta-l{position:relative;z-index:2}
.yt-channel-cta-l h4{font-size:19px;font-weight:800;color:#fff;margin-bottom:6px}
.yt-channel-cta-l p{font-size:14px;color:rgba(255,255,255,.68)}
.yt-channel-cta-l code{background:rgba(255,255,255,.12);color:#fff;padding:2px 9px;border-radius:5px;font-size:13px;font-family:monospace}
.yt-channel-cta .btn-yt{position:relative;z-index:2;flex-shrink:0}

/* ══════════════════════════════════════
   EXPLORE — 3 PILLARS
   Layered icon composition + 3D tilt (shares [data-tilt] JS)
   ══════════════════════════════════════ */
.explore-section{background:#F0EDE8;padding:88px 0}
.explore-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}

.explore-card{
  background:#FFFFFF;
  border:1.5px solid transparent;
  border-radius:24px;
  padding:0;
  display:flex;flex-direction:column;
  text-decoration:none;color:inherit;
  position:relative;overflow:hidden;
  box-shadow:
    0 1px 3px rgba(26,37,64,.06),
    0 6px 16px rgba(26,37,64,.08),
    0 16px 32px rgba(26,37,64,.06);
  transition:
    transform .12s ease-out,
    box-shadow .4s cubic-bezier(.22,1,.36,1),
    border-color .3s ease;
  will-change:transform;
  transform-style:preserve-3d;
}
.explore-card:hover{
  box-shadow:
    0 2px 4px rgba(26,37,64,.04),
    0 12px 32px rgba(102,51,221,.10),
    0 32px 64px rgba(26,37,64,.13);
}
/* Per-card border tint on hover */
.ex-grammar:hover{border-color:rgba(102,51,221,.24)}
.ex-vocab:hover{border-color:rgba(201,122,16,.24)}
.ex-quiz:hover{border-color:rgba(4,120,87,.24)}

/* Shine sweep — same language as level cards */
.explore-card::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(115deg,transparent 30%,rgba(255,255,255,.4) 45%,transparent 60%);
  transform:translateX(-120%);
  transition:transform .7s cubic-bezier(.22,1,.36,1);
  pointer-events:none;z-index:2;
}
.explore-card:hover::after{transform:translateX(120%)}

/* ── LAYERED ICON COMPOSITION ── */
.ex-icon-wrap{
  padding:32px 30px 16px;
  position:relative;z-index:3;
  perspective:700px;
}
.ex-icon-stage{
  position:relative;width:104px;height:82px;
  transform-style:preserve-3d;
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}
.ex-layer-back{
  position:absolute;width:66px;height:66px;border-radius:19px;
  top:6px;left:0;
  transform:rotate(-7deg);
  box-shadow:0 6px 16px rgba(0,0,0,.12);
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}
.ex-layer-front{
  position:absolute;width:70px;height:70px;border-radius:20px;
  top:0;left:26px;
  display:flex;align-items:center;justify-content:center;
  transform:rotate(5deg) translateZ(16px);
  box-shadow:0 10px 24px rgba(0,0,0,.16),0 2px 6px rgba(0,0,0,.08);
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}
.ex-layer-accent{
  position:absolute;width:30px;height:30px;border-radius:10px;
  top:-6px;right:2px;
  display:flex;align-items:center;justify-content:center;
  background:#fff;
  box-shadow:0 5px 14px rgba(0,0,0,.16);
  transform:rotate(-5deg) translateZ(32px);
  transition:transform .5s cubic-bezier(.22,1,.36,1);
}
.explore-card:hover .ex-layer-back{transform:rotate(-12deg) translateY(3px)}
.explore-card:hover .ex-layer-front{transform:rotate(8deg) translateY(-5px) translateZ(24px)}
.explore-card:hover .ex-layer-accent{transform:rotate(4deg) translateY(-8px) translateZ(48px) scale(1.1)}

/* Per-card colours */
.ex-grammar .ex-layer-back{background:#9B7FE8}
.ex-grammar .ex-layer-front{background:#6633DD}
.ex-grammar .ex-layer-accent svg{stroke:#6633DD}

.ex-vocab .ex-layer-back{background:#E0A855}
.ex-vocab .ex-layer-front{background:#C97A10}
.ex-vocab .ex-layer-accent svg{stroke:#C97A10}

.ex-quiz .ex-layer-back{background:#4CAF82}
.ex-quiz .ex-layer-front{background:#047857}
.ex-quiz .ex-layer-accent svg{stroke:#047857}

/* ── BODY ── */
.explore-body{display:flex;flex-direction:column;flex:1;padding:8px 30px 30px;position:relative;z-index:3}
.explore-body h3{font-size:20px;font-weight:800;color:#101010;margin-bottom:6px;letter-spacing:-.01em}
.explore-hi{font-family:var(--h);font-size:12px;color:#101010;opacity:.65;display:block;margin-bottom:12px;font-weight:700}
.explore-body p{font-size:14px;color:#333;line-height:1.7;margin-bottom:0;flex:1}
.explore-meta{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-top:22px}
.explore-count{
  font-size:11px;font-weight:700;color:#64748B;
  background:#F1F5F9;padding:5px 13px;border-radius:50px;
  border:1px solid #E2E8F0;letter-spacing:.02em;
}
.explore-arrow{
  font-size:12.5px;font-weight:700;
  display:flex;align-items:center;gap:4px;
  transition:gap .2s ease;
}
.ex-grammar .explore-arrow{color:#6633DD}
.ex-vocab .explore-arrow{color:#C97A10}
.ex-quiz .explore-arrow{color:#047857}
.explore-card:hover .explore-arrow{gap:8px}



/* ══════════════════════════════════════
   QUIZ / LEVEL TEST CTA — two-column, interactive preview
   ══════════════════════════════════════ */
.quiz-section{background:linear-gradient(135deg,var(--navy) 0%,#3A2378 55%,var(--violet) 100%);padding:96px 0;position:relative;overflow:hidden}
/* Dot-grid texture, consistent with lesson thumbnails */
.quiz-section::before{
  content:'';position:absolute;inset:0;
  background-image:radial-gradient(rgba(255,255,255,.08) 1.5px,transparent 1.5px);
  background-size:26px 26px;
  pointer-events:none;
}
/* Floating orbs — slow drift animation instead of static blur circles */
.q-orb{position:absolute;border-radius:50%;pointer-events:none;filter:blur(2px)}
.q-orb1{top:-100px;left:-60px;width:320px;height:320px;background:rgba(255,255,255,.05);animation:qFloat1 14s ease-in-out infinite}
.q-orb2{bottom:-90px;right:-70px;width:280px;height:280px;background:rgba(110,231,183,.06);animation:qFloat2 17s ease-in-out infinite}
.q-orb3{top:35%;right:8%;width:120px;height:120px;background:rgba(255,255,255,.04);animation:qFloat1 11s ease-in-out infinite reverse}
@keyframes qFloat1{0%,100%{transform:translate(0,0)}50%{transform:translate(24px,30px)}}
@keyframes qFloat2{0%,100%{transform:translate(0,0)}50%{transform:translate(-20px,-26px)}}

.quiz-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:56px;align-items:center;position:relative;z-index:2}
.quiz-l{text-align:left}
.quiz-badge{display:inline-flex;align-items:center;gap:7px;background:rgba(4,120,87,.18);border:1px solid rgba(4,120,87,.42);color:#6ee7b7;font-size:12px;font-weight:700;padding:7px 16px;border-radius:50px;margin-bottom:22px;text-transform:uppercase;letter-spacing:.07em}
.quiz-l h2{color:#fff;font-size:clamp(28px,3.2vw,42px);margin-bottom:10px;line-height:1.12}
.quiz-hi{font-family:var(--h);font-size:18px;font-weight:700;color:var(--saffron);display:block;margin-bottom:30px}

.quiz-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;max-width:440px;margin-bottom:34px}
.qs{
  background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.13);border-radius:16px;
  padding:18px 10px;text-align:center;
  transition:transform .3s cubic-bezier(.22,1,.36,1),background .3s ease,border-color .3s ease;
}
.qs:hover{transform:translateY(-5px);background:rgba(255,255,255,.12);border-color:rgba(255,255,255,.22)}
.qs .qs-icon{margin-bottom:8px;display:flex;justify-content:center;opacity:.85}
.qs .n{font-family:var(--d);font-size:26px;font-weight:800;color:#fff}
.qs .l{font-size:11.5px;color:rgba(255,255,255,.55);margin-top:4px}

.quiz-ctas{display:flex;gap:14px;flex-wrap:wrap}

/* ── INTERACTIVE QUIZ PREVIEW CARD (mirrors hero's Live Correction panel) ── */
.quiz-preview{
  background:#fff;border-radius:22px;padding:0;overflow:hidden;
  box-shadow:0 20px 50px rgba(0,0,0,.35),0 4px 16px rgba(0,0,0,.2);
  transition:transform .12s ease-out;
  will-change:transform;
}
.qp-head{
  display:flex;align-items:center;justify-content:space-between;
  padding:18px 22px;border-bottom:1px solid #EEE;
}
.qp-badge{font-size:11px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;color:var(--violet);background:var(--vl);padding:5px 12px;border-radius:50px}
.qp-progress-label{font-size:12px;color:#888;font-weight:600}
.qp-progress-track{height:4px;background:#F1F5F9;position:relative}
.qp-progress-fill{position:absolute;left:0;top:0;bottom:0;width:47%;background:linear-gradient(90deg,var(--violet),var(--vm));border-radius:0 4px 4px 0}

.qp-body{padding:26px 24px 24px}
.qp-question{font-size:16px;font-weight:700;color:var(--navy);margin-bottom:18px;line-height:1.5}
.qp-question em{color:var(--violet);font-style:normal}
.qp-options{display:flex;flex-direction:column;gap:10px}
.qp-opt{
  display:flex;align-items:center;gap:12px;
  padding:12px 14px;border-radius:12px;border:1.5px solid #E5E7EB;
  font-size:14.5px;color:#374151;font-weight:600;
  position:relative;overflow:hidden;
}
.qp-opt-letter{
  width:24px;height:24px;border-radius:50%;border:1.5px solid #D1D5DB;
  display:flex;align-items:center;justify-content:center;
  font-size:11px;font-weight:700;color:#9CA3AF;flex-shrink:0;
}
.qp-opt.qp-correct{
  border-color:#6ee7b7;background:#ECFDF5;color:#065F46;
}
.qp-opt.qp-correct .qp-opt-letter{
  background:#10B981;border-color:#10B981;color:#fff;
}
.qp-opt.qp-correct::after{
  content:'';position:absolute;right:14px;top:50%;transform:translateY(-50%);
  width:18px;height:18px;
  background:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2310B981' stroke-width='3'%3E%3Cpath d='M4 12l5 5L20 6'/%3E%3C/svg%3E") no-repeat center/contain;
}
.qp-footer{
  display:flex;align-items:center;justify-content:space-between;
  padding:16px 24px;background:#FAFAFA;border-top:1px solid #EEE;
}
.qp-footer-label{font-size:12px;color:#9CA3AF;font-weight:600}
.qp-result-pill{font-size:12px;font-weight:700;color:#10B981;background:#ECFDF5;padding:5px 12px;border-radius:50px;display:flex;align-items:center;gap:5px}

/* ══════════════════════════════════════
   TESTIMONIALS — Marquee strip
   ══════════════════════════════════════ */
.test-section{background:#F0EDE8;padding:88px 0;border-top:1px solid var(--border)}
.test-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.ttest{
  background:#FFFFFF;border:1.5px solid transparent;border-radius:20px;padding:30px 28px 28px;
  position:relative;overflow:hidden;
  box-shadow:0 1px 3px rgba(26,37,64,.05),0 6px 16px rgba(26,37,64,.07),0 14px 28px rgba(26,37,64,.05);
  transition:transform .36s cubic-bezier(.22,1,.36,1),box-shadow .36s cubic-bezier(.22,1,.36,1),border-color .3s ease;
  will-change:transform;
}
/* Accent top bar — colour matches each reviewer's avatar, grows on hover */
.ttest::before{
  content:'';position:absolute;top:0;left:0;right:0;height:4px;
  background:var(--tc,var(--violet));
  transform:scaleX(0);transform-origin:left;
  transition:transform .4s cubic-bezier(.22,1,.36,1);
}
.ttest:hover::before{transform:scaleX(1)}
/* Shine sweep — consistent with the rest of the page */
.ttest::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(115deg,transparent 30%,rgba(255,255,255,.4) 45%,transparent 60%);
  transform:translateX(-120%);
  transition:transform .7s cubic-bezier(.22,1,.36,1);
  pointer-events:none;
}
.ttest:hover::after{transform:translateX(120%)}
.ttest:hover{
  transform:translateY(-8px) scale(1.012);
  box-shadow:0 2px 4px rgba(26,37,64,.04),0 12px 30px rgba(0,0,0,.09),0 28px 56px rgba(26,37,64,.12);
  border-color:var(--tc-fade,rgba(102,51,221,.18));
}
/* Large faded quote-mark watermark, top-right */
.tt-quotemark{
  position:absolute;top:12px;right:16px;
  font-family:Georgia,serif;font-size:64px;font-weight:800;line-height:1;
  color:var(--tc,var(--violet));opacity:.09;
  pointer-events:none;user-select:none;
  transition:opacity .4s ease,transform .4s cubic-bezier(.22,1,.36,1);
}
.ttest:hover .tt-quotemark{opacity:.16;transform:scale(1.06) translateY(-2px)}

.tt-stars{color:var(--saffron);font-size:14px;letter-spacing:2px;margin-bottom:14px;position:relative;z-index:2}
.tt-quote{font-size:15px;color:var(--muted);line-height:1.78;margin-bottom:20px;position:relative;z-index:2}
.tt-quote strong{color:var(--navy)}
.tt-person{display:flex;align-items:center;gap:12px;position:relative;z-index:2}
.tt-av{
  width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;
  font-family:var(--d);font-size:16px;font-weight:800;color:#fff;flex-shrink:0;
  box-shadow:0 4px 12px rgba(0,0,0,.18);
  transition:transform .3s cubic-bezier(.22,1,.36,1);
}
.ttest:hover .tt-av{transform:scale(1.08)}
.tt-name{font-size:15px;font-weight:700;color:var(--navy)}
.tt-role{font-size:12px;color:var(--muted)}

/* ══════════════════════════════════════
   FOOTER
   ══════════════════════════════════════ */
footer.me-footer{background:var(--navy);color:rgba(255,255,255,.55);padding:60px 0 0}
.foot-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr;gap:40px;padding-bottom:44px;border-bottom:1px solid rgba(255,255,255,.08);margin-bottom:24px}
.foot-logo{font-family:var(--d);font-size:20px;font-weight:800;letter-spacing:-.025em;color:#fff;margin-bottom:9px;display:block}
.foot-logo em{font-style:normal;color:var(--vm)}
.foot-hi{font-family:var(--h);font-size:13px;color:rgba(201,122,16,.78);margin-bottom:11px}
.foot-desc{font-size:13px;line-height:1.72;max-width:260px;color:rgba(255,255,255,.5)}
.foot-col h4{font-family:var(--d);font-size:13px;font-weight:700;color:#fff;margin-bottom:16px}
.foot-col ul{list-style:none}
.foot-col li{margin-bottom:10px}
.foot-col a{font-size:13px;color:rgba(255,255,255,.55);transition:color .18s}
.foot-col a:hover{color:#fff}
.foot-bottom{display:flex;align-items:center;justify-content:space-between;padding-bottom:24px;flex-wrap:wrap;gap:14px}
.foot-copy{font-size:12px;color:rgba(255,255,255,.4)}
.me-socials{display:flex;gap:9px}
.me-soc{width:36px;height:36px;border-radius:9px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;transition:background .2s,transform .2s}
.me-soc:hover{background:var(--violet);transform:translateY(-2px)}
.me-soc svg{width:16px;height:16px;fill:#fff}

/* ══════════════════════════════════════
   RESPONSIVE
   ══════════════════════════════════════ */
@media(max-width:1040px){
  .hero-grid{grid-template-columns:1fr;gap:36px}
  .level-grid{grid-template-columns:repeat(2,1fr)}
  .lessons-grid{grid-template-columns:repeat(2,1fr)}
  .explore-grid{grid-template-columns:1fr}
  .quiz-grid{grid-template-columns:1fr;gap:40px}
  .quiz-l{text-align:center}
  .quiz-stats{margin-left:auto;margin-right:auto}
  .quiz-ctas{justify-content:center}
  .test-grid{grid-template-columns:1fr}
  .foot-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:768px){
  .me-nav-links{display:none}
  .me-hamburger{display:block}
  .level-grid{grid-template-columns:repeat(2,1fr)}
  .lessons-grid{grid-template-columns:1fr}
  .quiz-stats{grid-template-columns:repeat(3,1fr)}
  .yt-channel-cta{flex-direction:column;text-align:center}
  .wrap{padding:0 20px}
}
@media(max-width:500px){
  .level-grid{grid-template-columns:1fr}
  .foot-grid{grid-template-columns:1fr}
  .hero-ctas{flex-direction:column}
  .quiz-stats{grid-template-columns:repeat(3,1fr)}
}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}}
</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- SCROLL PROGRESS BAR -->
<div id="spb" aria-hidden="true"></div>

<!-- ══════════════════════════════════════
     NAV — Fallback (XPRO replaces this)
     ══════════════════════════════════════ -->
<nav class="me-nav" id="me-nav" role="navigation" aria-label="Main navigation">
  <div class="me-nav-wrap">
    <a href="<?php echo home_url('/'); ?>" class="me-logo">Maninder<em>English</em></a>
    <ul class="me-nav-links" id="me-nav-links">
      <li><a href="<?php echo home_url('/'); ?>" class="active">Home</a></li>
      <li><a href="<?php echo home_url('/levels/'); ?>">Levels</a></li>
    
      <li><a href="<?php echo home_url('/grammar/'); ?>">Grammar</a></li>
      <li><a href="<?php echo home_url('/vocabulary/'); ?>">Vocabulary</a></li>
      <li><a href="<?php echo home_url('/quizzes/'); ?>">Quizzes</a></li>
      <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
    </ul>
    <div class="me-nav-right">
      <a href="<?php echo ME_YT_CHANNEL; ?>" target="_blank" rel="noopener" class="btn btn-yt btn-sm">▶ YouTube</a>
      <button class="me-hamburger" id="me-hamburger" aria-label="Open menu">☰</button>
    </div>
  </div>
</nav>

<!-- ══════════════════════════════════════
     HERO
     ══════════════════════════════════════ -->
<section class="hero-outer" aria-label="Hero">
  <div class="wrap">
    <div class="hero-grid">
      <!-- LEFT -->
      <div class="hero-l">
        <div class="hero-l-inner">
          <div class="hero-badge fade"><span class="hb-dot"></span>Psychology-Based English Learning</div>
          <h1 class="hero-h1 fade d1">Stop Translating.<br><em>Start Speaking.</em></h1>
          <p class="hero-hindi fade d2">सोचो English में — बोलो confidence से</p>
          <p class="hero-sub fade d3">Learn English the way your brain actually works. <strong>Real British experience.</strong> Real psychology. Built for Indian learners who are serious about fluency.</p>
          <div class="hero-ctas fade d4">
            <a href="<?php echo home_url('/levels/'); ?>" class="btn btn-v btn-lg">Choose Your Level →</a>
            <a href="<?php echo home_url('/quizzes/'); ?>" class="btn btn-outline btn-lg">Test Your English</a>
          </div>
          <div class="hero-stats fade d5">
            <div class="hstat"><div class="n cnt" data-c="7" data-s="+">0+</div><div class="l">Years in British workplaces</div></div>
            <div class="hstat"><div class="n">Free</div><div class="l">All content, always</div></div>
            <div class="hstat"><div class="n cnt" data-c="500" data-s="+">0+</div><div class="l">Learners helped</div></div>
          </div>
        </div>
      </div>
      <!-- RIGHT — Floating correction card -->
      <div class="hero-r fade fromRight">
        <div class="lcard">
          <div class="lcard-head">
            <span class="lcard-tag">Live Correction</span>
            <span class="lcard-live"><span class="lcard-live-dot"></span>Analysing</span>
          </div>
          <div class="lcard-body">
            <div class="tw-line" id="tw"><span class="tw-cur"></span></div>
            <div class="tw-hi" id="twh"></div>
            <div class="lcard-div"></div>
            <div class="lcard-row lc-w"><span class="lcard-ico">✗</span>Common mistake</div>
            <div class="lcard-row lc-r"><span class="lcard-ico">✓</span>British standard</div>
          </div>
        </div>
        <div class="hero-mini">
          <div class="hm"><div class="n">7</div><div class="l">Years British office</div></div>
          <div class="hm"><div class="n">100%</div><div class="l">Free lessons</div></div>
          <div class="hm"><div class="n">Hindi</div><div class="l">Explanations</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     SOCIAL PROOF MARQUEE
     ══════════════════════════════════════ -->
<div class="marquee-strip" aria-label="Student testimonials">
  <div class="marquee-track">
    <?php
    $testimonials = [
      ['init'=>'R','name'=>'Rahul Sharma','city'=>'Delhi','quote'=>'Finally understood why "I am having doubt" is wrong!','stars'=>'★★★★★'],
      ['init'=>'P','name'=>'Priya Singh','city'=>'Mumbai','quote'=>'The British office phrases changed how I speak at work.','stars'=>'★★★★★'],
      ['init'=>'A','name'=>'Arjun Mehta','city'=>'Bangalore','quote'=>'Hindi explanations make complex grammar actually stick.','stars'=>'★★★★★'],
      ['init'=>'S','name'=>'Sneha Patel','city'=>'Ahmedabad','quote'=>'I got promoted after improving my professional English here.','stars'=>'★★★★★'],
      ['init'=>'V','name'=>'Vikram Nair','city'=>'Chennai','quote'=>'The psychology approach is completely different — it works.','stars'=>'★★★★★'],
      ['init'=>'N','name'=>'Nisha Gupta','city'=>'Pune','quote'=>'Finally speaking in meetings without that mental translation pause.','stars'=>'★★★★★'],
    ];
    // Duplicate for seamless loop
    $all = array_merge($testimonials, $testimonials);
    foreach($all as $t): ?>
    <div class="mq-item">
      <div class="mq-av"><?php echo esc_html($t['init']); ?></div>
      <div>
        <div class="mq-t"><strong><?php echo esc_html($t['name']); ?></strong> — <?php echo esc_html($t['quote']); ?></div>
        <div class="mq-stars"><?php echo $t['stars']; ?></div>
        <div class="mq-city"><?php echo esc_html($t['city']); ?></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ══════════════════════════════════════
     CHOOSE YOUR LEVEL
     ══════════════════════════════════════ -->
<section class="levels-section" aria-labelledby="levels-heading">
  <div class="wrap">
    <div class="sh">
      <span class="eye">Start Here</span>
      <h2 id="levels-heading">Choose Your Level</h2>
      <p>Find exactly where you are and go from there. Every level has dedicated lessons, grammar, and vocabulary.</p>
    </div>
    <div class="level-grid">
      <!-- BEGINNER — Sky Blue -->
      <a href="<?php echo home_url('/levels/?level=beginner'); ?>" class="level-card lv-beginner fade d1" data-tilt>
        <div class="lv-icon-wrap">
          <div class="lv-icon-stage">
            <div class="lv-layer-back"></div>
            <div class="lv-layer-front">
              <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                <path d="M21 12v20M21 12C21 12 15 9.5 9 12v18c6-2.2 12 0 12 0M21 12c0 0 6-2.5 12 0v18c-6-2.2-12 0-12 0" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="lv-layer-accent">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M9 1.5l2.1 4.3 4.7.7-3.4 3.3.8 4.7L9 12.2l-4.2 2.3.8-4.7L2.2 6.5l4.7-.7L9 1.5z" stroke-width="1.4" stroke-linejoin="round" fill="none"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="lv-body">
          <div class="lv-title">Beginner</div>
          <span class="lv-hindi">शुरुआत यहाँ से</span>
          <div class="lv-desc">Basic sentences, everyday vocabulary, simple tenses. Build a solid foundation from scratch.</div>
          <div class="lv-cta">Start Learning →</div>
        </div>
      </a>

      <!-- INTERMEDIATE — Peach -->
      <a href="<?php echo home_url('/levels/?level=intermediate'); ?>" class="level-card lv-intermediate fade d2" data-tilt>
        <div class="lv-icon-wrap">
          <div class="lv-icon-stage">
            <div class="lv-layer-back"></div>
            <div class="lv-layer-front">
              <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                <path d="M10 14a3 3 0 013-3h11a3 3 0 013 3v7a3 3 0 01-3 3h-2l-3 3-3-3h-2a3 3 0 01-3-3v-7z" stroke="#fff" stroke-width="2.4" stroke-linejoin="round"/>
                <path d="M21 23.5v.8a3 3 0 003 3h1.5l3 3 3-3h.8a3 3 0 003-3v-5.5a3 3 0 00-3-3h-5.4" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="lv-layer-accent">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <circle cx="9" cy="9" r="6.5" stroke-width="1.4" fill="none"/>
                <path d="M9 5.5v4l2.8 2" stroke-width="1.4" stroke-linecap="round"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="lv-body">
          <div class="lv-title">Intermediate</div>
          <span class="lv-hindi">अगला कदम</span>
          <div class="lv-desc">Phrasal verbs, conversational English, grammar that clicks. For learners who understand but struggle to speak.</div>
          <div class="lv-cta">Keep Growing →</div>
        </div>
      </a>

      <!-- ADVANCED — Lavender -->
      <a href="<?php echo home_url('/levels/?level=advanced'); ?>" class="level-card lv-advanced fade d3" data-tilt>
        <div class="lv-icon-wrap">
          <div class="lv-icon-stage">
            <div class="lv-layer-back"></div>
            <div class="lv-layer-front">
              <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                <path d="M24 8L13.5 22.5h9L18 34l13.5-15.5h-9L24 8z" fill="rgba(255,255,255,0.95)"/>
              </svg>
            </div>
            <div class="lv-layer-accent">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M3 13l3.5-3.5L9 12l6-6" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                <path d="M11.5 6H15v3.5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="lv-body">
          <div class="lv-title">Advanced</div>
          <span class="lv-hindi">Fluency की तरफ</span>
          <div class="lv-desc">Idioms, British expressions, nuanced writing. For those who want to sound truly native.</div>
          <div class="lv-cta">Go Further →</div>
        </div>
      </a>

      <!-- BUSINESS ENGLISH — Mint -->
      <a href="<?php echo home_url('/levels/?level=business'); ?>" class="level-card lv-business fade d4" data-tilt>
        <div class="lv-icon-wrap">
          <div class="lv-icon-stage">
            <div class="lv-layer-back"></div>
            <div class="lv-layer-front">
              <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                <rect x="7" y="18" width="28" height="17" rx="3" stroke="#fff" stroke-width="2.4"/>
                <path d="M15.5 18v-3a5.5 5.5 0 0111 0v3" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/>
                <line x1="7" y1="26" x2="35" y2="26" stroke="#fff" stroke-width="2.4"/>
                <circle cx="21" cy="26" r="2.3" fill="#fff"/>
              </svg>
            </div>
            <div class="lv-layer-accent">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M3 9.5l4 4 8-8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="lv-body">
          <div class="lv-title">Business English</div>
          <span class="lv-hindi">Office के लिए</span>
          <div class="lv-desc">Emails, meetings, presentations — real British workplace language from 7 years in London offices.</div>
          <div class="lv-cta">Work Smarter →</div>
        </div>
      </a>
    </div>
    <div style="text-align:center;margin-top:36px">
      <a href="<?php echo home_url('/quizzes/'); ?>" class="btn btn-outline fade">Not sure? Test your level in 2 minutes →</a>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     LATEST LESSONS — YouTube
     ══════════════════════════════════════ -->
<section class="lessons-section" aria-labelledby="lessons-heading">
  <div class="wrap">
    <div class="sh" style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:16px">
      <div>
        <span class="eye">Latest Lessons</span>
        <h2 id="lessons-heading">Learn From YouTube</h2>
        <p>New lessons every week. Subscribe so you never miss one.</p>
      </div>
      <a href="<?php echo ME_YT_CHANNEL; ?>" target="_blank" rel="noopener" class="btn btn-yt fade">▶ View All on YouTube</a>
    </div>
    <div class="lessons-grid">
      <!-- LESSON CARDS — Replace video IDs with your actual YouTube video IDs -->
      <?php
      $lessons = [
        [
          'video_id'  => 'REPLACE_VIDEO_ID_1',  // e.g. dQw4w9WgXcQ
          'level'     => 'Beginner', 'level_class' => 'lb-b',
          'thumb_class' => 'lt-grammar',
          'topic'     => 'Grammar',
          'title'     => 'Why "I am having a doubt" is wrong',
          'hindi'     => '"Doubt" का सही use',
          'desc'      => 'One of the most common mistakes Indian English speakers make — and the psychology behind why your brain defaults to it.',
          'watermark' => '<svg width="90" height="90" viewBox="0 0 90 90" fill="none"><path d="M13 19h64M13 34h44M13 49h54M13 64h30" stroke="#fff" stroke-width="6" stroke-linecap="round"/></svg>',
        ],
        [
          'video_id'  => 'REPLACE_VIDEO_ID_2',
          'level'     => 'Intermediate', 'level_class' => 'lb-i',
          'thumb_class' => 'lt-phrasal',
          'topic'     => 'Phrasal Verbs',
          'title'     => '10 British Office Phrases That Sound Native',
          'hindi'     => 'Office English — British style',
          'desc'      => 'Real phrases used in London workplaces every single day. With Hindi explanations and example sentences.',
          'watermark' => '<svg width="90" height="90" viewBox="0 0 90 90" fill="none"><path d="M18 25a9 9 0 019-9h36a9 9 0 019 9v20a9 9 0 01-9 9h-6l-9 9-9-9h-12a9 9 0 01-9-9V25z" stroke="#fff" stroke-width="5"/></svg>',
        ],
        [
          'video_id'  => 'REPLACE_VIDEO_ID_3',
          'level'     => 'Advanced', 'level_class' => 'lb-a',
          'thumb_class' => 'lt-pronun',
          'topic'     => 'Pronunciation',
          'title'     => 'How to Stop Your Indian Accent From Holding You Back',
          'hindi'     => 'Accent improvement — practical tips',
          'desc'      => 'Accent is not a problem — unclear pronunciation is. Here\'s the difference and how to fix it.',
          'watermark' => '<svg width="90" height="90" viewBox="0 0 90 90" fill="none"><path d="M45 15a15 15 0 0115 15v15a15 15 0 01-30 0V30a15 15 0 0115-15z" stroke="#fff" stroke-width="5"/><path d="M25 45a20 20 0 0040 0M45 65v12M35 77h20" stroke="#fff" stroke-width="5" stroke-linecap="round"/></svg>',
        ],
      ];
      foreach($lessons as $l): ?>
      <div class="lesson-card fade" data-tilt>
        <div class="lesson-thumb">
          <div class="lesson-thumb-placeholder <?php echo esc_attr($l['thumb_class']); ?>" id="thumb-<?php echo esc_attr($l['video_id']); ?>" data-vid="<?php echo esc_attr($l['video_id']); ?>" onclick="loadVideo(this)">
            <div class="lt-watermark"><?php echo $l['watermark']; ?></div>
            <div class="play-btn-wrap">
              <div class="play-btn-ring"></div>
              <div class="play-btn-yt">
                <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
              </div>
            </div>
          </div>
          <span class="lesson-level-badge <?php echo esc_attr($l['level_class']); ?>"><?php echo esc_html($l['level']); ?></span>
        </div>
        <div class="lesson-body">
          <div class="lesson-topic"><?php echo esc_html($l['topic']); ?></div>
          <h3><?php echo esc_html($l['title']); ?></h3>
          <span class="lesson-hindi"><?php echo esc_html($l['hindi']); ?></span>
          <p><?php echo esc_html($l['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="yt-channel-cta fade">
      <div class="yt-channel-cta-l">
        <h4>All lessons are free on YouTube</h4>
        <p>Subscribe to <code><?php echo ME_YT_HANDLE; ?></code> for new lessons every week. Enable notifications so you never miss one.</p>
      </div>
      <a href="<?php echo ME_YT_CHANNEL; ?>" target="_blank" rel="noopener" class="btn btn-yt btn-lg">▶ Subscribe Free</a>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     EXPLORE — 3 Pillars
     ══════════════════════════════════════ -->
<section class="explore-section" aria-labelledby="explore-heading">
  <div class="wrap">
    <div class="sh">
      <span class="eye">What's Inside</span>
      <h2 id="explore-heading">Everything You Need to Sound British</h2>
      <p>Three ways to learn. All free. All explained in Hindi.</p>
    </div>
    <div class="explore-grid">

      <a href="<?php echo home_url('/grammar/'); ?>" class="explore-card ex-grammar fade d1" data-tilt>
        <div class="ex-icon-wrap">
          <div class="ex-icon-stage">
            <div class="ex-layer-back"></div>
            <div class="ex-layer-front">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M7 10h18M7 16h12M7 22h15" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="ex-layer-accent">
              <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M2.5 8l2.8 2.8L12.5 3.5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="explore-body">
          <h3>Grammar</h3>
          <span class="explore-hi">हर गलती जो matter करती है — ठीक करो</span>
          <p>Real British English mistakes Indian professionals make — explained in Hindi with psychology behind why your brain defaults to them.</p>
          <div class="explore-meta">
            <span class="explore-count">2 lessons live</span>
            <span class="explore-arrow">Go to Grammar →</span>
          </div>
        </div>
      </a>

      <a href="<?php echo home_url('/vocabulary/'); ?>" class="explore-card ex-vocab fade d2" data-tilt>
        <div class="ex-icon-wrap">
          <div class="ex-icon-stage">
            <div class="ex-layer-back"></div>
            <div class="ex-layer-front">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <rect x="6" y="6" width="20" height="20" rx="3.5" stroke="#fff" stroke-width="2.4"/>
                <path d="M11 13h10M11 18h6" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="ex-layer-accent">
              <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M7.5 2v3M7.5 10v3M2 7.5h3M10 7.5h3" stroke-width="1.6" stroke-linecap="round" fill="none"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="explore-body">
          <h3>Vocabulary</h3>
          <span class="explore-hi">असली काम की vocabulary — दिमाग में बसाओ</span>
          <p>Curated decks of real professional English words — explained in Hindi, practised with spaced repetition so they actually stick.</p>
          <div class="explore-meta">
            <span class="explore-count">3 decks ready</span>
            <span class="explore-arrow">Go to Vocabulary →</span>
          </div>
        </div>
      </a>

      <a href="<?php echo home_url('/quizzes/'); ?>" class="explore-card ex-quiz fade d3" data-tilt>
        <div class="ex-icon-wrap">
          <div class="ex-icon-stage">
            <div class="ex-layer-back"></div>
            <div class="ex-layer-front">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <circle cx="16" cy="16" r="10.5" stroke="#fff" stroke-width="2.4"/>
                <path d="M12 16l2.8 2.8L20.5 12.5" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="ex-layer-accent">
              <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M8 1.5L3.5 7.8h4l-1 5.7L11 7h-3.8l0.8-5.5z" stroke-width="1.3" stroke-linejoin="round" fill="none"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="explore-body">
          <h3>Quizzes</h3>
          <span class="explore-hi">गलती पकड़ो — Hindi में समझो — दोबारा मत करो</span>
          <p>Quick quizzes on real English mistakes. Instant feedback with Hindi explanations — so you understand why, not just what.</p>
          <div class="explore-meta">
            <span class="explore-count">3 quizzes ready</span>
            <span class="explore-arrow">Go to Quizzes →</span>
          </div>
        </div>
      </a>

    </div>
  </div>
</section>



<!-- ══════════════════════════════════════
     QUIZ / LEVEL TEST CTA
     ══════════════════════════════════════ -->
<section class="quiz-section" aria-labelledby="quiz-heading">
  <div class="q-orb q-orb1"></div>
  <div class="q-orb q-orb2"></div>
  <div class="q-orb q-orb3"></div>
  <div class="wrap">
    <div class="quiz-grid">

      <div class="quiz-l">
        <div class="quiz-badge fade">✓ Free · No sign-up · 2 minutes</div>
        <h2 id="quiz-heading" class="fade d1">What's Your Real English Level?</h2>
        <span class="quiz-hi fade d2">अपना असली level जानो — 2 minutes में</span>
        <div class="quiz-stats fade d3">
          <div class="qs">
            <div class="qs-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M6 8h8M6 12h5" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/><rect x="3" y="3" width="14" height="14" rx="3" stroke="#fff" stroke-width="1.6"/></svg></div>
            <div class="n cnt" data-c="15">0</div><div class="l">Questions</div>
          </div>
          <div class="qs">
            <div class="qs-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="7" stroke="#fff" stroke-width="1.6"/><path d="M10 6v4l3 2" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/></svg></div>
            <div class="n cnt" data-c="2" data-s=" min">0</div><div class="l">To complete</div>
          </div>
          <div class="qs">
            <div class="qs-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M3 15l3-3 3 2 4-5 4 3" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <div class="n cnt" data-c="4">0</div><div class="l">Levels tested</div>
          </div>
        </div>
        <div class="quiz-ctas fade d4">
          <a href="<?php echo home_url('/quizzes/'); ?>" class="btn btn-v btn-lg">Start Level Test →</a>
          <a href="<?php echo home_url('/quizzes/'); ?>" class="btn btn-lg" style="color:#fff;border:2px solid rgba(255,255,255,0.7);background:rgba(255,255,255,0.12);backdrop-filter:blur(8px)">Browse All Quizzes</a>
        </div>
      </div>

      <div class="fade fromRight d2">
        <div class="quiz-preview" data-tilt id="quizPreview">
          <div class="qp-head">
            <span class="qp-badge">Level Check</span>
            <span class="qp-progress-label">Question 7 of 15</span>
          </div>
          <div class="qp-progress-track"><div class="qp-progress-fill"></div></div>
          <div class="qp-body">
            <div class="qp-question">She <em>_____</em> to the office every day.</div>
            <div class="qp-options">
              <div class="qp-opt"><span class="qp-opt-letter">A</span> go</div>
              <div class="qp-opt qp-correct"><span class="qp-opt-letter">B</span> goes</div>
              <div class="qp-opt"><span class="qp-opt-letter">C</span> going</div>
              <div class="qp-opt"><span class="qp-opt-letter">D</span> gone</div>
            </div>
          </div>
          <div class="qp-footer">
            <span class="qp-footer-label">Present Simple — 3rd person</span>
            <span class="qp-result-pill">✓ Correct</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     TESTIMONIALS
     ══════════════════════════════════════ -->
<section class="test-section" aria-labelledby="test-heading">
  <div class="wrap">
    <div class="sh sh-center">
      <span class="eye">Student Stories</span>
      <h2 id="test-heading">Real Results From Real Learners</h2>
      <p>What happens when psychology meets English learning.</p>
    </div>
    <div class="test-grid">
      <?php
      $reviews = [
        ['av'=>'R','col'=>'#6633DD','name'=>'Rahul Mehta','role'=>'Software Engineer, Hyderabad','stars'=>'★★★★★','quote'=>'I\'ve been learning English for 10 years but never understood <strong>why</strong> I make the mistakes I do. Maninder\'s psychology approach finally connected the dots.'],
        ['av'=>'P','col'=>'#047857','name'=>'Priya Sharma','role'=>'HR Manager, Mumbai','stars'=>'★★★★★','quote'=>'The Business English section is gold. I used the email phrases in my very next meeting and my manager actually commented on how polished I sounded.'],
        ['av'=>'A','col'=>'#C97A10','name'=>'Arjun Nair','role'=>'MBA Student, Delhi','stars'=>'★★★★★','quote'=>'The Hindi explanations are the secret weapon. I\'d tried 5 other platforms — none of them explain <em>why</em> the grammar works the way it does.'],
      ];
      foreach($reviews as $r): ?>
      <div class="ttest fade" style="--tc:<?php echo esc_attr($r['col']); ?>;--tc-fade:<?php echo esc_attr($r['col']); ?>2e">
        <span class="tt-quotemark">"</span>
        <div class="tt-stars"><?php echo $r['stars']; ?></div>
        <p class="tt-quote"><?php echo $r['quote']; ?></p>
        <div class="tt-person">
          <div class="tt-av" style="background:<?php echo esc_attr($r['col']); ?>"><?php echo esc_html($r['av']); ?></div>
          <div>
            <div class="tt-name"><?php echo esc_html($r['name']); ?></div>
            <div class="tt-role"><?php echo esc_html($r['role']); ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     FOOTER
     ══════════════════════════════════════ -->
<footer class="me-footer" role="contentinfo">
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <a href="<?php echo home_url('/'); ?>" class="foot-logo">Maninder<em>English</em></a>
        <div class="foot-hi">English + Psychology = Fluency</div>
        <p class="foot-desc">Psychology-based English learning for Indian learners. Built on 7 years of real British workplace experience.</p>
      </div>
      <div class="foot-col">
        <h4>Learn</h4>
        <ul>
          <li><a href="<?php echo home_url('/levels/'); ?>">Choose Your Level</a></li>
         
          <li><a href="<?php echo home_url('/grammar/'); ?>">Grammar</a></li>
          <li><a href="<?php echo home_url('/vocabulary/'); ?>">Vocabulary</a></li>
          <li><a href="<?php echo home_url('/quizzes/'); ?>">Quizzes</a></li>
        </ul>
      </div>
      <div class="foot-col">
        <h4>About</h4>
        <ul>
          <li><a href="<?php echo home_url('/about/'); ?>">About Maninder</a></li>
          <li><a href="<?php echo home_url('/about/#approach'); ?>">Our Approach</a></li>
          <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
          <li><a href="<?php echo ME_YT_CHANNEL; ?>" target="_blank" rel="noopener">YouTube Channel</a></li>
        </ul>
      </div>
      <div class="foot-col">
        <h4>Connect</h4>
        <ul>
          <li><a href="<?php echo ME_YT_CHANNEL; ?>" target="_blank" rel="noopener">▶ YouTube</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="<?php echo home_url('/contact/'); ?>">Contact Maninder</a></li>
          <li><a href="<?php echo home_url('/'); ?>">maninderenglish.com</a></li>
        </ul>
      </div>
    </div>
    <div class="foot-bottom">
      <span class="foot-copy">© <?php echo date('Y'); ?> Maninder English · maninderenglish.com · Built for Indian learners · Ludhiana, Punjab</span>
      <div class="me-socials">
        <a class="me-soc" href="<?php echo ME_YT_CHANNEL; ?>" target="_blank" rel="noopener" aria-label="YouTube">
          <svg viewBox="0 0 24 24"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.9 12 4.9 12 4.9s-7 0-8.9.5A3 3 0 0 0 1 7.5 31 31 0 0 0 .5 12 31 31 0 0 0 1 16.5a3 3 0 0 0 2.1 2.1c1.9.5 8.9.5 8.9.5s7 0 8.9-.5A3 3 0 0 0 23 16.5 31 31 0 0 0 23.5 12 31 31 0 0 0 23 7.5ZM9.8 15.3V8.7l5.7 3.3Z"/></svg>
        </a>
        <a class="me-soc" href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 3.3.1 4.8 1.7 4.9 4.9.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 3.2-1.6 4.8-4.9 4.9-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1C3.8 21.8 2.2 20.2 2.1 17c-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9C2.2 3.8 3.8 2.2 7.1 2.1 8.4 2.2 8.8 2.2 12 2.2Zm0 1.8c-3.1 0-3.5 0-4.7.1-2.2.1-3.2 1.1-3.3 3.3C4 8.6 4 9 4 12s0 3.4.1 4.7c.1 2.2 1.1 3.2 3.3 3.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c2.2-.1 3.2-1.1 3.3-3.3.1-1.2.1-1.6.1-4.7s0-3.4-.1-4.7c-.1-2.2-1.1-3.2-3.3-3.3C15.5 4 15.1 4 12 4Zm0 3.1a4.9 4.9 0 1 1 0 9.8 4.9 4.9 0 0 1 0-9.8Zm0 8a3.1 3.1 0 1 0 0-6.2 3.1 3.1 0 0 0 0 6.2Zm6.3-8.2a1.1 1.1 0 1 1-2.3 0 1.1 1.1 0 0 1 2.3 0Z"/></svg>
        </a>
        <a class="me-soc" href="#" aria-label="Facebook">
          <svg viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12Z"/></svg>
        </a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<script>
(function(){
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ── SCROLL PROGRESS BAR ── */
  var spb = document.getElementById('spb');
  function updateSPB(){
    var s = document.documentElement;
    var pct = s.scrollTop / (s.scrollHeight - s.clientHeight) * 100;
    if(spb) spb.style.width = Math.min(pct,100)+'%';
  }

  /* ── NAV SHADOW ON SCROLL ── */
  var nav = document.getElementById('me-nav');
  function updateNav(){
    if(nav) nav.classList.toggle('scrolled', window.scrollY > 30);
  }

  /* ── HERO PARALLAX (subtle — hero-r floats up slightly as user scrolls) ── */
  var heroR = document.querySelector('.hero-r');
  function updateParallax(){
    if(!heroR) return;
    var sy = window.scrollY;
    var maxShift = 40;
    var shift = Math.min(sy * 0.18, maxShift);
    heroR.style.transform = 'translateY(-'+shift+'px)';
  }

  /* ── SCROLL HANDLER ── */
  var ticking = false;
  window.addEventListener('scroll', function(){
    if(!ticking){
      requestAnimationFrame(function(){
        updateSPB();
        updateNav();
        if(!reducedMotion) updateParallax();
        ticking = false;
      });
      ticking = true;
    }
  }, {passive:true});

  if(reducedMotion){
    document.querySelectorAll('.fade').forEach(function(el){ el.classList.add('in'); });
    return;
  }

  /* ── 3D CURSOR TILT — level cards respond to mouse position ── */
  var isCoarsePointer = window.matchMedia('(pointer: coarse)').matches;
  if(!isCoarsePointer){
    document.querySelectorAll('[data-tilt]').forEach(function(card){
      var rect, raf = null;
      var MAX_TILT = 7;      // degrees
      var LIFT     = 14;     // px translateY on hover
      var SCALE    = 1.02;

      function onMove(e){
        if(raf) return;
        raf = requestAnimationFrame(function(){
          rect = card.getBoundingClientRect();
          var px = (e.clientX - rect.left) / rect.width;   // 0..1
          var py = (e.clientY - rect.top)  / rect.height;  // 0..1
          var rotY = (px - 0.5) * MAX_TILT * 2;
          var rotX = (0.5 - py) * MAX_TILT * 2;
          card.style.transform =
            'perspective(900px) translateY(-'+LIFT+'px) scale('+SCALE+') '+
            'rotateX('+rotX.toFixed(2)+'deg) rotateY('+rotY.toFixed(2)+'deg)';
          raf = null;
        });
      }
      function onLeave(){
        card.style.transform = '';
      }
      card.addEventListener('mousemove', onMove);
      card.addEventListener('mouseleave', onLeave);
    });
  }

  /* ── AUTO-STAGGER GRID CHILDREN ── */
  var STAGGER_MS = 80;
  var MAX_STEPS  = 6;
  document.querySelectorAll('.level-grid, .lessons-grid, .explore-grid, .test-grid').forEach(function(grid){
    Array.prototype.filter.call(grid.children, function(el){
      return el.classList.contains('fade');
    }).forEach(function(el, i){
      if(!/\bd[1-6]\b/.test(el.className) && i > 0){
        el.style.transitionDelay = (Math.min(i, MAX_STEPS) * STAGGER_MS)+'ms';
      }
    });
  });

  /* ── INTERSECTION OBSERVER — reveal .fade elements ── */
  var io = new IntersectionObserver(function(entries, obs){
    entries.forEach(function(entry){
      if(entry.isIntersecting){
        entry.target.classList.add('in');
        obs.unobserve(entry.target);
      }
    });
  },{
    rootMargin:'0px 0px -12% 0px',
    threshold:0.04
  });

  document.querySelectorAll('.fade').forEach(function(el){ io.observe(el); });

  /* ── COUNTER ANIMATION (hero stats) ── */
  var counters = document.querySelectorAll('.cnt');
  var cObs = new IntersectionObserver(function(entries, obs){
    entries.forEach(function(entry){
      if(!entry.isIntersecting) return;
      var el  = entry.target;
      var end = parseInt(el.dataset.c, 10);
      var sfx = el.dataset.s || '';
      var dur = 1200;
      var start = performance.now();
      function tick(now){
        var p = Math.min((now-start)/dur, 1);
        var ease = 1-Math.pow(1-p, 3); // ease-out cubic
        el.textContent = Math.round(ease * end) + sfx;
        if(p < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
      obs.unobserve(el);
    });
  },{threshold:0.5});
  counters.forEach(function(c){ cObs.observe(c); });

})();
</script>
</body>
</html>
