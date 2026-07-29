/**
 * lesson-search.js — AJAX Lesson Search & Filter
 * Upload to: /wp-content/themes/maninderenglish-child/assets/lesson-search.js
 */
(function () {
  'use strict';

  const searchInput   = document.getElementById('me-search-input');
  const resultsContainer = document.getElementById('me-results-container');
  const loading       = document.querySelector('.me-search-loading');

  if (!searchInput || !resultsContainer) return;

  let searchTimer = null;
  let currentSearch   = '';
  let currentCategory = '';
  let currentLevel    = '';
  let currentPage     = 1;

  // Trigger initial load showing all lessons
  doSearch();

  // Search input — debounced 400ms
  searchInput.addEventListener('input', function () {
    clearTimeout(searchTimer);
    currentSearch = this.value.trim();
    currentPage   = 1;
    searchTimer   = setTimeout(doSearch, 400);
  });

  // Category filter buttons
  document.querySelectorAll('#me-cat-filters .me-filter-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('#me-cat-filters .me-filter-btn').forEach(function (b) {
        b.classList.remove('active');
      });
      this.classList.add('active');
      currentCategory = this.dataset.cat || '';
      currentPage     = 1;
      doSearch();
    });
  });

  // Level filter buttons
  document.querySelectorAll('#me-level-filters .me-filter-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('#me-level-filters .me-filter-btn').forEach(function (b) {
        b.classList.remove('active');
      });
      this.classList.add('active');
      currentLevel = this.dataset.level || '';
      currentPage  = 1;
      doSearch();
    });
  });

  // Pagination — delegated listener on results container
  resultsContainer.addEventListener('click', function (e) {
    if (e.target.classList.contains('me-pg-btn')) {
      currentPage = parseInt(e.target.dataset.page, 10);
      doSearch();
      // Scroll to top of results
      document.getElementById('me-lesson-search-wrap').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });

  function doSearch() {
    showLoading(true);

    const data = new FormData();
    data.append('action',   'me_lesson_search');
    data.append('nonce',    meSearch.nonce);
    data.append('search',   currentSearch);
    data.append('category', currentCategory);
    data.append('level',    currentLevel);
    data.append('paged',    currentPage);

    fetch(meSearch.ajaxurl, { method: 'POST', body: data })
      .then(function (res) { return res.json(); })
      .then(function (res) {
        showLoading(false);
        if (res.success) {
          resultsContainer.innerHTML = res.data.html;
          animateCards();
        } else {
          resultsContainer.innerHTML = '<div class="me-no-results"><span style="font-size:48px">⚠️</span><h3>Error loading lessons</h3><p>Please refresh and try again.</p></div>';
        }
      })
      .catch(function () {
        showLoading(false);
        resultsContainer.innerHTML = '<div class="me-no-results"><span style="font-size:48px">📡</span><h3>Connection error</h3><p>Please check your internet and try again.</p></div>';
      });
  }

  function showLoading(on) {
    if (loading) loading.style.display = on ? 'flex' : 'none';
    if (on) resultsContainer.innerHTML = '';
  }

  function animateCards() {
    // Stagger-animate cards as they appear
    const cards = resultsContainer.querySelectorAll('.me-lesson-card');
    cards.forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(16px)';
      card.style.transition = 'opacity .4s ease, transform .4s ease';
      card.style.transitionDelay = (i * 60) + 'ms';
      setTimeout(function () {
        card.style.opacity = '1';
        card.style.transform = 'none';
      }, 20);
    });
  }

})();
