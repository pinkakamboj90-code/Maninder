/**
 * srs.js — Spaced Repetition System Flashcards
 * Upload to: /wp-content/themes/maninderenglish-child/assets/srs.js
 */
var meSRS = (function () {
  'use strict';

  var currentIndex = 0;
  var cards = [];
  var ratedCards = [];

  function init() {
    cards = Array.from(document.querySelectorAll('.me-srs-card'));
    updateProgress();
    addCardAnimStyle();
  }

  function reveal(btn) {
    var card = btn.closest('.me-srs-card');
    var front = card.querySelector('.me-srs-front');
    var back  = card.querySelector('.me-srs-back');
    front.style.display = 'none';
    back.style.display  = 'block';
    // Animate back in
    back.style.opacity   = '0';
    back.style.transform = 'translateY(10px)';
    back.style.transition = 'opacity .35s ease, transform .35s ease';
    setTimeout(function () {
      back.style.opacity   = '1';
      back.style.transform = 'none';
    }, 10);
  }

  function rate(cardId, rating, btn) {
    // Disable buttons to prevent double-click
    var btns = btn.closest('.me-srs-btns').querySelectorAll('button');
    btns.forEach(function (b) { b.disabled = true; });

    btn.style.opacity = '0.6';
    btn.textContent = rating === 'again' ? 'Noted!' : rating === 'good' ? 'Got it!' : 'Excellent!';

    if (meSRSConfig.isLoggedIn === '1') {
      // Send to server
      var data = new FormData();
      data.append('action',  'me_srs_review');
      data.append('nonce',   meSRSConfig.nonce);
      data.append('card_id', cardId);
      data.append('rating',  rating);

      fetch(meSRSConfig.ajaxurl, { method: 'POST', body: data })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (res.success) {
            showToast(res.data.message);
          }
          nextCard();
        })
        .catch(function () { nextCard(); });
    } else {
      // Guest — just advance
      showToast(guestMessage(rating));
      nextCard();
    }

    ratedCards.push({ id: cardId, rating: rating });
  }

  function nextCard() {
    var current = cards[currentIndex];

    setTimeout(function () {
      // Slide current card out
      current.style.transition = 'opacity .3s ease, transform .3s ease';
      current.style.opacity    = '0';
      current.style.transform  = 'translateX(-24px)';

      setTimeout(function () {
        current.style.display = 'none';
        currentIndex++;
        updateProgress();

        if (currentIndex < cards.length) {
          var next = cards[currentIndex];
          next.style.display   = 'block';
          next.style.opacity   = '0';
          next.style.transform = 'translateX(24px)';
          next.style.transition = 'opacity .35s ease, transform .35s ease';
          setTimeout(function () {
            next.style.opacity   = '1';
            next.style.transform = 'none';
          }, 20);
        } else {
          showComplete();
        }
      }, 300);
    }, 600);
  }

  function showComplete() {
    var deck     = document.getElementById('me-srs-deck');
    var complete = document.getElementById('me-srs-complete');
    if (deck)     deck.style.display     = 'none';
    if (complete) complete.style.display = 'flex';

    var msg = document.getElementById('me-srs-complete-msg');
    if (msg) {
      var easy  = ratedCards.filter(function (c) { return c.rating === 'easy';  }).length;
      var good  = ratedCards.filter(function (c) { return c.rating === 'good';  }).length;
      var again = ratedCards.filter(function (c) { return c.rating === 'again'; }).length;
      msg.textContent = 'You reviewed ' + ratedCards.length + ' cards: '
        + easy + ' easy, ' + good + ' good, ' + again + ' to review again. Bahut achha!';
    }
  }

  function restart() {
    currentIndex = 0;
    ratedCards   = [];

    var complete = document.getElementById('me-srs-complete');
    var deck     = document.getElementById('me-srs-deck');
    if (complete) complete.style.display = 'none';
    if (deck)     deck.style.display     = 'block';

    cards.forEach(function (card, i) {
      // Reset each card to front
      var front = card.querySelector('.me-srs-front');
      var back  = card.querySelector('.me-srs-back');
      if (front) front.style.display = 'block';
      if (back)  back.style.display  = 'none';
      // Restore buttons
      var btns = card.querySelectorAll('.me-srs-btn');
      btns.forEach(function (b) {
        b.disabled = false;
        b.style.opacity = '1';
      });
      // Reset button text
      var again = card.querySelector('.me-srs-again');
      var good  = card.querySelector('.me-srs-good');
      var easy  = card.querySelector('.me-srs-easy');
      if (again) again.textContent = '🔄 Review Again';
      if (good)  good.textContent  = '😄 Good';
      if (easy)  easy.textContent  = '⭐ Easy!';

      card.style.display   = i === 0 ? 'block' : 'none';
      card.style.opacity   = '1';
      card.style.transform = 'none';
    });

    updateProgress();
  }

  function updateProgress() {
    var el = document.getElementById('me-srs-progress');
    if (!el || !cards.length) return;
    var done = currentIndex;
    var total = cards.length;
    var pct = Math.round((done / total) * 100);
    el.innerHTML = '<div style="text-align:right;font-size:13px;color:#888;margin-bottom:4px">' + done + ' / ' + total + ' cards</div>'
      + '<div style="background:#E8E4DC;border-radius:50px;height:6px;width:140px"><div style="background:linear-gradient(90deg,#6633DD,#8B6CF6);height:6px;border-radius:50px;width:' + pct + '%;transition:width .4s ease"></div></div>';
  }

  function showToast(msg) {
    var toast = document.createElement('div');
    toast.textContent = msg;
    toast.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%);background:#1A2540;color:#fff;padding:12px 24px;border-radius:50px;font-size:14px;font-weight:600;z-index:9999;opacity:0;transition:opacity .3s ease;pointer-events:none;font-family:"Inter",sans-serif;white-space:nowrap';
    document.body.appendChild(toast);
    setTimeout(function () { toast.style.opacity = '1'; }, 10);
    setTimeout(function () {
      toast.style.opacity = '0';
      setTimeout(function () { toast.remove(); }, 300);
    }, 2500);
  }

  function guestMessage(rating) {
    var msgs = {
      'again': 'Keep practising! Log in to save your progress.',
      'good':  'Good work! Log in to track your review schedule.',
      'easy':  'Excellent! Log in to build your personal deck.'
    };
    return msgs[rating] || '';
  }

  function addCardAnimStyle() {
    if (document.getElementById('me-srs-style')) return;
    var s = document.createElement('style');
    s.id = 'me-srs-style';
    s.textContent = '#me-srs-complete{display:none;flex-direction:column;align-items:center;text-align:center;padding:48px 24px;gap:16px}';
    document.head.appendChild(s);
  }

  // Auto-init
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  return { reveal: reveal, rate: rate, restart: restart };

})();
