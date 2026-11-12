/**
 * WayloShare Download Page JavaScript (download.js)
 * Manages device switcher tabs and highlighted store button states.
 */
(function () {
  'use strict';

  const tabs = document.querySelectorAll('#device-tabs .dev-btn');
  const detectText = document.querySelector('#detect-msg .detect-text');
  const iosBtn = document.getElementById('btn-ios-store');
  const andBtn = document.getElementById('btn-and-store');

  const messages = {
    android: 'Android phone detected — opening Google Play…',
    ios: 'iPhone detected — opening the App Store…',
    desktop: 'You’re on a laptop — scan the QR code with your phone'
  };

  tabs.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const dev = btn.getAttribute('data-dev');

      // Update button visual styles
      tabs.forEach(function (b) {
        const isCurrent = (b === btn);
        b.setAttribute('aria-pressed', isCurrent ? 'true' : 'false');
        b.style.border = isCurrent ? '0' : '1px solid rgba(255,255,255,0.4)';
        b.style.fontWeight = isCurrent ? '700' : '600';
        b.style.background = isCurrent ? '#ffffff' : 'transparent';
        b.style.color = isCurrent ? '#13294B' : '#ffffff';
      });

      // Update detected text
      if (detectText && messages[dev]) {
        detectText.textContent = messages[dev];
      }

      // Update store buttons highlighting
      if (iosBtn && andBtn) {
        if (dev === 'ios') {
          iosBtn.style.background = '#13294B';
          iosBtn.style.opacity = '1';
          andBtn.style.background = 'rgba(19,41,75,0.45)';
          andBtn.style.opacity = '0.6';
        } else if (dev === 'android') {
          andBtn.style.background = '#13294B';
          andBtn.style.opacity = '1';
          iosBtn.style.background = 'rgba(19,41,75,0.45)';
          iosBtn.style.opacity = '0.6';
        } else {
          // Desktop: both equal opacity
          iosBtn.style.background = '#13294B';
          iosBtn.style.opacity = '1';
          andBtn.style.background = '#13294B';
          andBtn.style.opacity = '1';
        }
      }
    });
  });
})();

