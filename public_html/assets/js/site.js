/**
 * WayloShare Global JavaScript (site.js)
 * Handles route-map menu fallback & Esc key, sticky download bar dismissal, and smooth scrolling.
 */
(function () {
  'use strict';

  // --- 1. Sticky Download Bar Dismissal (7 days persistence) ---
  const stickyBar = document.getElementById('sticky-bar');
  const stickyClose = document.getElementById('sticky-bar-close');

  if (stickyBar && stickyClose) {
    const STORAGE_KEY = 'waylo_sticky_dismissed_until';
    try {
      const dismissedUntil = localStorage.getItem(STORAGE_KEY);
      if (dismissedUntil && Date.now() < Number(dismissedUntil)) {
        stickyBar.style.display = 'none';
      }
    } catch (e) {
      // LocalStorage blocked or unavailable
    }

    stickyClose.addEventListener('click', function () {
      stickyBar.style.display = 'none';
      try {
        const sevenDays = 7 * 24 * 60 * 60 * 1000;
        localStorage.setItem(STORAGE_KEY, String(Date.now() + sevenDays));
      } catch (e) {}
    });
  }

  // --- 2. Route-Map Menu Enhancements & Fallback ---
  const navCheckbox = document.getElementById('navt');
  const htmlEl = document.documentElement;

  if (navCheckbox) {
    // Check if browser supports :has selector
    let hasSupported = false;
    try {
      hasSupported = CSS.supports('selector(:has(*))');
    } catch (e) {
      hasSupported = false;
    }

    function syncMenuState() {
      if (!hasSupported) {
        if (navCheckbox.checked) {
          htmlEl.classList.add('menu-open');
        } else {
          htmlEl.classList.remove('menu-open');
        }
      }
    }

    navCheckbox.addEventListener('change', syncMenuState);

    // Close menu on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && navCheckbox.checked) {
        navCheckbox.checked = false;
        syncMenuState();
      }
    });

    // Close menu when clicking any menu link
    const menuLinks = document.querySelectorAll('.rmenu a');
    menuLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        navCheckbox.checked = false;
        syncMenuState();
      });
    });
  }

  // --- 3. Smooth Anchor Scrolling for on-page targets ---
  document.addEventListener('click', function (e) {
    const a = e.target.closest && e.target.closest('a[href*="#"]');
    if (!a) return;
    const url = new URL(a.href, window.location.href);
    if (url.pathname === window.location.pathname && url.hash) {
      const target = document.querySelector(url.hash);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
        history.pushState(null, '', url.hash);
      }
    }
  });
})();

