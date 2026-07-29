/**
 * ai-tutor.js — AI Hinglish Grammar Tutor
 * Upload to: /wp-content/themes/maninderenglish-child/assets/ai-tutor.js
 */
(function () {
  'use strict';

  const input    = document.getElementById('me-ai-input');
  const submit   = document.getElementById('me-ai-submit');
  const result   = document.getElementById('me-ai-result');
  const btnText  = document.getElementById('me-ai-btn-text');
  const charCount = document.getElementById('me-ai-charcount');

  if (!input || !submit) return;

  // Character counter
  input.addEventListener('input', function () {
    const len = this.value.length;
    charCount.textContent = len + ' / 1000 characters';
    charCount.style.color = len > 900 ? '#C81C1C' : '#aaa';
  });

  // Focus style
  input.addEventListener('focus', function () {
    this.style.borderColor = '#6633DD';
  });
  input.addEventListener('blur', function () {
    this.style.borderColor = '#E8E4DC';
  });

  // Submit handler
  submit.addEventListener('click', function () {
    const text = input.value.trim();
    if (!text) {
      showResult('error', 'Please type some English text first.');
      return;
    }
    if (text.length > 1000) {
      showResult('error', 'Please keep your text under 1000 characters.');
      return;
    }
    runCheck(text);
  });

  // Allow Ctrl+Enter to submit
  input.addEventListener('keydown', function (e) {
    if (e.ctrlKey && e.key === 'Enter') submit.click();
  });

  function runCheck(text) {
    // Show loading state
    setLoading(true);
    showResult('loading', '');

    const data = new FormData();
    data.append('action',    'me_grammar_check');
    data.append('nonce',     meAI.nonce);
    data.append('user_text', text);

    fetch(meAI.ajaxurl, { method: 'POST', body: data })
      .then(function (res) { return res.json(); })
      .then(function (res) {
        setLoading(false);
        if (res.success) {
          showResult('success', res.data.reply);
        } else {
          showResult('error', res.data.message || 'Something went wrong. Please try again.');
        }
      })
      .catch(function () {
        setLoading(false);
        showResult('error', 'Connection error. Please check your internet and try again.');
      });
  }

  function setLoading(on) {
    submit.disabled = on;
    submit.style.opacity = on ? '0.7' : '1';
    btnText.textContent = on ? 'Checking...' : 'Check My English ✓';
    submit.style.transform = on ? 'none' : '';
  }

  function showResult(type, message) {
    result.style.display = 'block';

    if (type === 'loading') {
      result.innerHTML = '<div style="background:#fff;border:1.5px solid #E8E4DC;border-radius:16px;padding:28px;display:flex;align-items:center;gap:14px">'
        + '<div class="me-ai-spinner" style="width:28px;height:28px;border:3px solid #EDE8FB;border-top-color:#6633DD;border-radius:50%;animation:meSpin .7s linear infinite;flex-shrink:0"></div>'
        + '<div><strong style="color:#111;font-size:15px">Analysing your English...</strong><br><span style="color:#888;font-size:13px">GPT-4o is checking your grammar</span></div>'
        + '</div>';
      addSpinnerStyle();
      return;
    }

    if (type === 'error') {
      result.innerHTML = '<div style="background:#FEF2F2;border:1.5px solid #FECACA;border-radius:16px;padding:24px;color:#C81C1C;display:flex;gap:12px;align-items:flex-start">'
        + '<span style="font-size:22px;flex-shrink:0">⚠️</span>'
        + '<div><strong>Oops!</strong> ' + escapeHtml(message) + '</div>'
        + '</div>';
      return;
    }

    // Success — format the AI response nicely
    const formatted = formatAIResponse(message);
    result.innerHTML = '<div style="background:#fff;border:1.5px solid #E8E4DC;border-radius:16px;overflow:hidden">'
      + '<div style="background:linear-gradient(135deg,#6633DD,#8B6CF6);padding:16px 24px;display:flex;align-items:center;gap:10px">'
      + '<span style="font-size:20px">🤖</span>'
      + '<strong style="color:#fff;font-size:15px;font-family:\'Plus Jakarta Sans\',sans-serif">AI Feedback</strong>'
      + '</div>'
      + '<div style="padding:24px;font-size:15px;line-height:1.75;color:#222">' + formatted + '</div>'
      + '<div style="padding:0 24px 20px;border-top:1px solid #F0EDE8;margin-top:8px;padding-top:16px">'
      + '<button onclick="document.getElementById(\'me-ai-input\').value=\'\';document.getElementById(\'me-ai-result\').style.display=\'none\';document.getElementById(\'me-ai-charcount\').textContent=\'0 / 1000 characters\'" style="background:none;border:1.5px solid #E8E4DC;border-radius:10px;padding:9px 18px;font-size:13px;font-weight:600;color:#666;cursor:pointer">Check Another Sentence</button>'
      + '</div>'
      + '</div>';

    // Smooth scroll to result
    setTimeout(function () {
      result.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }, 100);
  }

  function formatAIResponse(text) {
    // Convert plain text to readable HTML
    return text
      .split('\n')
      .filter(function (l) { return l.trim(); })
      .map(function (line) {
        line = escapeHtml(line);
        // Highlight correction markers
        if (line.match(/^(mistake|error|wrong|incorrect|correction|corrected)/i)) {
          return '<p style="background:#FEF3C7;border-left:3px solid #D97706;padding:8px 12px;border-radius:0 8px 8px 0;margin:8px 0">' + line + '</p>';
        }
        if (line.match(/^(correct|right|better|improvement)/i)) {
          return '<p style="background:#ECFDF5;border-left:3px solid #059669;padding:8px 12px;border-radius:0 8px 8px 0;margin:8px 0">' + line + '</p>';
        }
        if (line.match(/^(shabash|wah|excellent|great job|acha|bahut)/i)) {
          return '<p style="background:#EDE8FB;border-left:3px solid #6633DD;padding:8px 12px;border-radius:0 8px 8px 0;margin:8px 0">' + line + '</p>';
        }
        return '<p style="margin:6px 0">' + line + '</p>';
      })
      .join('');
  }

  function escapeHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  function addSpinnerStyle() {
    if (document.getElementById('me-ai-spinner-style')) return;
    const s = document.createElement('style');
    s.id = 'me-ai-spinner-style';
    s.textContent = '@keyframes meSpin{to{transform:rotate(360deg)}}';
    document.head.appendChild(s);
  }

})();
