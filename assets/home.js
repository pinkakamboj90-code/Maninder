/**
 * Maninder English — Homepage JS
 * Handles: scroll progress, nav scroll, typewriter, intersection reveals,
 *          count-up, WOTD carousel, hamburger menu, YouTube lazy load
 */

(function () {
  'use strict';

  /* ── SCROLL PROGRESS BAR ───────────────────────────────────── */
  const spb = document.getElementById('spb');
  if (spb) {
    window.addEventListener('scroll', () => {
      const s = document.documentElement;
      spb.style.width = (s.scrollTop / (s.scrollHeight - s.clientHeight) * 100) + '%';
    }, { passive: true });
  }

  /* ── NAV SCROLL SHADOW ─────────────────────────────────────── */
  const nav = document.getElementById('me-nav');
  if (nav) {
    window.addEventListener('scroll', () => {
      nav.classList.toggle('scrolled', window.scrollY > 20);
    }, { passive: true });
  }

  /* ── HAMBURGER MENU ────────────────────────────────────────── */
  const burger = document.getElementById('me-hamburger');
  const navLinks = document.getElementById('me-nav-links');
  if (burger && navLinks) {
    burger.addEventListener('click', () => {
      const isOpen = navLinks.style.display === 'flex';
      navLinks.style.display = isOpen ? 'none' : 'flex';
      navLinks.style.flexDirection = 'column';
      navLinks.style.position = 'absolute';
      navLinks.style.top = '68px';
      navLinks.style.left = '0';
      navLinks.style.right = '0';
      navLinks.style.background = '#fff';
      navLinks.style.padding = '12px 20px 16px';
      navLinks.style.borderBottom = '1px solid #E4E1D9';
      navLinks.style.zIndex = '399';
      burger.setAttribute('aria-expanded', !isOpen);
    });
    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!e.target.closest('#me-nav')) {
        navLinks.style.display = '';
      }
    });
  }

  /* ── INTERSECTION OBSERVER — REVEAL ────────────────────────── */
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (!e.isIntersecting) return;
      const el = e.target;
      el.classList.add('in');
      // Trigger count-up on stat numbers
      el.querySelectorAll('.cnt').forEach(c => countUp(c));
      io.unobserve(el);
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.fade').forEach(el => io.observe(el));

  /* ── COUNT-UP ANIMATION ─────────────────────────────────────── */
  function countUp(el) {
    const target = parseInt(el.dataset.c, 10);
    const suffix = el.dataset.s || '';
    const duration = 1400;
    const t0 = performance.now();
    (function tick(now) {
      const p = Math.min((now - t0) / duration, 1);
      const ease = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.floor(ease * target) + suffix;
      if (p < 1) requestAnimationFrame(tick);
    })(t0);
  }

  /* ── TYPEWRITER — Hero correction card ─────────────────────── */
  const twEl = document.getElementById('tw');
  const twhEl = document.getElementById('twh');

  const sentences = [
    { en: "She doesn't likes coffee.",      hi: "गलती — 'doesn't' के बाद verb में 's' नहीं।",        ok: false },
    { en: "She doesn't like coffee.",       hi: "सही — grammar को brain से जोड़ो।",                   ok: true  },
    { en: "I will revert back to you.",     hi: "गलती — 'revert' में already 'back' है।",             ok: false },
    { en: "I will get back to you.",        hi: "सही — British office standard।",                    ok: true  },
    { en: "Myself Rahul from Delhi.",       hi: "गलती — Hindi का direct translation।",               ok: false },
    { en: "I'm Rahul, from Delhi.",         hi: "सही — clean और confident।",                        ok: true  },
    { en: "I am having a doubt.",           hi: "गलती — possession के लिए 'having' नहीं।",           ok: false },
    { en: "I have a question.",             hi: "सही — 'have' for ownership।",                       ok: true  },
    { en: "Please do the needful.",         hi: "गलती — Indian English only, confusing abroad।",     ok: false },
    { en: "Please let me know what you need.", hi: "सही — clear और professional।",                  ok: true  },
  ];

  if (twEl) {
    let si = 0, ci = 0, deleting = false;
    function typeLoop() {
      const c = sentences[si];
      const color = c.ok ? 'var(--green)' : 'var(--red)';
      twEl.innerHTML = `<span style="color:${color}">${c.en.slice(0, ci)}</span><span class="tw-cur"></span>`;
      if (!deleting) {
        if (twhEl) twhEl.textContent = '';
        if (ci < c.en.length) {
          ci++;
          setTimeout(typeLoop, 52);
        } else {
          if (twhEl) {
            twhEl.textContent = c.hi;
            twhEl.style.color = c.ok ? 'var(--saffron)' : 'var(--red)';
          }
          deleting = true;
          setTimeout(typeLoop, 2800);
        }
      } else {
        if (ci > 0) {
          ci--;
          setTimeout(typeLoop, 22);
        } else {
          deleting = false;
          si = (si + 1) % sentences.length;
          setTimeout(typeLoop, 340);
        }
      }
    }
    typeLoop();
  }

  /* ── WORD OF THE DAY CAROUSEL ───────────────────────────────── */
  const words = [
    {
      type: 'Phrasal Verb', word: 'Touch base', ph: '/tʌtʃ beɪs/',
      meaning: 'To briefly contact someone to check in or share a quick update. Heard in virtually every British office.',
      hindi: 'किसी से थोड़ा संपर्क करना — \'चलो बात करते हैं\' जैसा',
      ex: '"Let\'s touch base tomorrow morning before the presentation."'
    },
    {
      type: 'Noun', word: 'Bottleneck', ph: '/ˈbɒt.əl.nek/',
      meaning: 'A point where work slows down because of a limitation or problem in a process.',
      hindi: 'वो जगह जहाँ काम रुक जाए — problem point',
      ex: '"The bottleneck in our process is the approval stage."'
    },
    {
      type: 'Phrasal Verb', word: 'Chase up', ph: '/tʃeɪs ʌp/',
      meaning: 'To contact someone to remind them about something they promised to do. More direct than "follow up".',
      hindi: 'किसी को याद दिलाना — follow-up करना',
      ex: '"Could you chase up the invoice with the accounts team?"'
    },
    {
      type: 'Expression', word: 'On the same page', ph: '/ɒn ðə seɪm peɪdʒ/',
      meaning: 'To have the same understanding or agreement about something. Used constantly in British team meetings.',
      hindi: 'एक जैसी समझ होना — दोनों एक ही बात समझ रहे हैं',
      ex: '"Let\'s make sure we\'re all on the same page about the deadline."'
    },
    {
      type: 'Adjective', word: 'Forthcoming', ph: '/ˌfɔːθˈkʌmɪŋ/',
      meaning: 'About to happen soon. Also: willing to give information when asked. Both uses are common in British professional communication.',
      hindi: 'आने वाला — जल्द होने वाला, या बताने के लिए तैयार',
      ex: '"Please review the forthcoming changes to the company policy."'
    },
    {
      type: 'Idiom', word: 'Bite the bullet', ph: '/baɪt ðə ˈbʊlɪt/',
      meaning: 'To endure a painful or difficult situation that is unavoidable. Common in British workplace conversations.',
      hindi: 'मुश्किल काम को हिम्मत से करना — difficult situation face करना',
      ex: '"We\'ll just have to bite the bullet and deliver the bad news in person."'
    },
  ];

  const we = {
    tag:  document.getElementById('wtag'),
    word: document.getElementById('wword'),
    ph:   document.getElementById('wph'),
    mean: document.getElementById('wmean'),
    hi:   document.getElementById('whi'),
    ex:   document.getElementById('wex'),
    dots: document.getElementById('wdots'),
  };

  let wi = 0;

  function renderWord(i) {
    const w = words[i];
    if (!we.tag) return;
    // Animate change
    [we.word, we.mean, we.hi, we.ex].forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(8px)';
    });
    setTimeout(() => {
      we.tag.textContent  = w.type;
      we.word.textContent = w.word;
      we.ph.textContent   = w.ph;
      we.mean.textContent = w.meaning;
      we.hi.textContent   = w.hindi;
      we.ex.textContent   = w.ex;
      [we.word, we.mean, we.hi, we.ex].forEach(el => {
        el.style.transition = 'opacity .35s ease, transform .35s ease';
        el.style.opacity    = '1';
        el.style.transform  = 'none';
      });
      // Update dots
      if (we.dots) {
        we.dots.querySelectorAll('.wotd-dot').forEach((d, idx) => {
          d.classList.toggle('on', idx === i);
        });
      }
    }, 180);
  }

  if (we.dots) {
    words.forEach((_, i) => {
      const d = document.createElement('span');
      d.className = 'wotd-dot' + (i === 0 ? ' on' : '');
      d.addEventListener('click', () => { wi = i; renderWord(wi); });
      we.dots.appendChild(d);
    });
    renderWord(0);
  }

  const wnext = document.getElementById('wnext');
  const wprev = document.getElementById('wprev');
  if (wnext) wnext.addEventListener('click', () => { wi = (wi + 1) % words.length; renderWord(wi); });
  if (wprev) wprev.addEventListener('click', () => { wi = (wi - 1 + words.length) % words.length; renderWord(wi); });

  /* ── LEVEL CARDS — Keyboard accessible ─────────────────────── */
  document.querySelectorAll('.level-card').forEach(card => {
    card.setAttribute('tabindex', '0');
    card.setAttribute('role', 'button');
    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const link = card.querySelector('a');
        if (link) link.click();
      }
    });
  });

  /* ── YOUTUBE LAZY LOAD ──────────────────────────────────────── */
  // Loads iframe only when user clicks play — saves page load time
  window.loadVideo = function(el) {
    const vid = el.dataset.vid;
    if (!vid || vid.startsWith('REPLACE')) {
      // Placeholder — redirect to channel
      window.open('https://www.youtube.com/@englishwithmaninder', '_blank');
      return;
    }
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube.com/embed/${vid}?autoplay=1&rel=0`;
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.allowFullscreen = true;
    iframe.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:none';
    el.style.position = 'relative';
    el.appendChild(iframe);
    // Hide placeholder elements
    el.querySelector('.play-btn-yt').style.display = 'none';
    el.querySelector('.lesson-level-badge') && (el.querySelector('.lesson-level-badge').style.display = 'none');
  };

  /* ── SMOOTH ACTIVE NAV LINK ─────────────────────────────────── */
  const currentPath = window.location.pathname;
  document.querySelectorAll('.me-nav-links a').forEach(a => {
    if (a.getAttribute('href') === currentPath ||
        (currentPath === '/' && a.getAttribute('href') === '/')) {
      a.classList.add('active');
    }
  });

})();
