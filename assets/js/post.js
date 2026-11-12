/**
 * WayloShare Article Page JavaScript (post.js)
 * Manages article reading progress bar fallback and "Was this guide useful?" feedback logging.
 */
(function () {
  'use strict';

  // --- 1. Feedback / Useful vote ---
  const fbWidget = document.getElementById('feedback-widget');
  const btnYes = document.getElementById('btn-vote-yes');
  const btnNo = document.getElementById('btn-vote-no');
  const fbPrompt = document.getElementById('fb-prompt');
  const fbThanks = document.getElementById('fb-thanks');
  const fbThanksTxt = document.getElementById('fb-thanks-txt');

  function sendVote(vote) {
    const slug = fbWidget ? (fbWidget.getAttribute('data-slug') || 'unknown') : 'unknown';

    // Show thanks state immediately
    if (fbPrompt) fbPrompt.style.display = 'none';
    if (fbThanks) {
      fbThanks.style.display = 'block';
      if (fbThanksTxt) {
        fbThanksTxt.textContent = (vote === 'yes') 
          ? 'thanks! see you on the road.' 
          : 'noted, we will make it better.';
      }
    }

    // POST via fetch; silent on error
    fetch(window.location.href, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify({ slug: slug, vote: vote })
    }).catch(function () {
      // Failure is silent per brief
    });
  }

  if (btnYes && btnNo) {
    btnYes.addEventListener('click', function () { sendVote('yes'); });
    btnNo.addEventListener('click', function () { sendVote('no'); });
  }

  // --- 2. Reading Progress Bar JS fallback ---
  const progressBar = document.getElementById('read-progress');
  if (progressBar) {
    let hasScrollTimeline = false;
    try {
      hasScrollTimeline = CSS.supports('animation-timeline', 'scroll()');
    } catch (e) {
      hasScrollTimeline = false;
    }

    if (!hasScrollTimeline) {
      window.addEventListener('scroll', function () {
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = docHeight > 0 ? (window.scrollY / docHeight) : 0;
        progressBar.style.transform = 'scaleX(' + Math.min(1, Math.max(0, scrolled)) + ')';
      }, { passive: true });
    }
  }
})();

