/**
 * Maninder English shared motion helpers.
 * Keeps scroll reveals lightweight and native-scroll friendly.
 */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function markVisible(el) {
    el.classList.add('is-visible', 'in', 'hs-visible');
  }

  function initReveals() {
    var nodes = Array.from(document.querySelectorAll('.me-reveal, .fade, .hs-reveal'));
    if (!nodes.length) return;

    if (reduceMotion || !('IntersectionObserver' in window)) {
      nodes.forEach(markVisible);
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        markVisible(entry.target);
        observer.unobserve(entry.target);
      });
    }, {
      rootMargin: '0px 0px -8% 0px',
      threshold: 0.12
    });

    nodes.forEach(function (el, index) {
      if (!el.style.getPropertyValue('--me-delay') && !hasDelayClass(el)) {
        el.style.setProperty('--me-delay', Math.min(index % 6, 5) * 70 + 'ms');
      }
      observer.observe(el);
    });
  }

  function hasDelayClass(el) {
    return /\b(d[1-6]|hs-d[1-6])\b/.test(el.className);
  }

  function initNavState() {
    var nav = document.getElementById('me-nav');
    if (!nav) return;

    function update() {
      nav.classList.toggle('scrolled', window.scrollY > 16);
    }

    update();
    window.addEventListener('scroll', update, { passive: true });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initReveals();
      initNavState();
    });
  } else {
    initReveals();
    initNavState();
  }
})();
