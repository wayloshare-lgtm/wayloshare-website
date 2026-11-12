<?php
/**
 * WayloShare Sticky Download Bar
 * Dismissible, remembers dismissal for 7 days via localStorage in site.js.
 */
?>
<div id="sticky-bar" style="position: sticky; bottom: 16px; z-index: 40; padding: 0 16px; display: flex; justify-content: center; margin-top: -88px">
  <div class="glass-dark" style="border-radius: 22px; padding: 10px 10px 10px 14px; display: flex; align-items: center; gap: 14px; flex-wrap: wrap; color: #ffffff; box-shadow: 0 20px 50px rgba(8,30,60,0.35); background: rgba(19,41,75,0.78)">
    <img src="<?= asset('assets/img/logo.png') ?>" alt="" style="width: 40px; height: 40px; border-radius: 10px" width="40" height="40">
    <span style="display: flex; flex-direction: column; line-height: 1.15">
      <span style="font-weight: 700; font-size: 16px">Get WayloShare</span>
      <span style="font-size: 13px; color: #C9D6E6">Free on iOS and Android</span>
    </span>
    <a href="<?= url('/get') ?>" class="btn-shine" style="background: #ffffff; color: #13294B; text-decoration: none; font-weight: 700; font-size: 16px; padding: 11px 18px; border-radius: 14px">Download app</a>
    <button type="button" aria-label="Hide download bar" id="sticky-bar-close" style="width: 44px; height: 44px; border: 0; border-radius: 12px; background: rgba(255,255,255,0.12); color: #ffffff; cursor: pointer; display: flex; align-items: center; justify-content: center">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" aria-hidden="true">
        <path d="M6 6l12 12M18 6L6 18"></path>
      </svg>
    </button>
  </div>
</div>

