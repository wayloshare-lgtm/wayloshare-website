<?php
/**
 * WayloShare Global Footer
 */

$cfg = config();
$isPink = ($current_page === 'pink-ride');
$isPost = ($current_page === 'blog-post');

$fb = $isPink ? '#3D0F24' : '#13294B';
$fm = $isPink ? '#F4C7D7' : '#C9D6E6';
$fa = $isPink ? '#FF8FB8' : '#7FD28F';
$pb = $isPink ? '110px' : ($isPost ? '40px' : '120px');
?>
<footer class="site-foot" style="--fb: <?= $fb ?>; --fm: <?= $fm ?>; --fa: <?= $fa ?>; padding-bottom: <?= $pb ?>">
  <div class="sf-in">
    <div class="sf-brand">
      <a href="<?= url('/') ?>" class="sf-logo">
        <img src="<?= asset('assets/img/logo.png') ?>" alt="WayloShare Logo">
        <span>WayloShare</span>
      </a>
      <p>Verified carpooling for India. Fares capped per km, every seat verified, and a women-only Pink Ride.</p>
      <span class="sf-made"><i></i>Made in Jammu, J&amp;K</span>
    </div>
    <nav class="sf-cols" aria-label="Footer">
      <div>
        <span>Ride</span>
        <a href="<?= url('/#fare') ?>">Fare calculator</a>
        <a href="<?= url('/#app-tour') ?>">How the app works</a>
        <a href="<?= url('/pink-ride') ?>">Pink Ride</a>
        <a href="<?= url('/download') ?>">Download</a>
      </div>
      <div>
        <span>Company</span>
        <a href="<?= url('/about') ?>">About us</a>
        <a href="<?= url('/blog') ?>">Road Journal</a>
        <a href="<?= url('/contact') ?>">Contact</a>
        <a href="<?= url('/privacy') ?>">Privacy policy</a>
      </div>
    </nav>
    <div class="sf-app">
      <img src="<?= asset('assets/img/qr.png') ?>" alt="QR code to download WayloShare" width="80" height="80">
      <span><b>Scan to get the app</b>iPhone and Android</span>
    </div>
  </div>
  <div class="sf-legal">
    <span>© <?= date('Y') ?> <?= e($cfg['company']) ?> · <?= e($cfg['address']) ?></span>
    <a href="mailto:<?= e($cfg['email_to']) ?>"><?= e($cfg['email_to']) ?></a>
  </div>
</footer>

<!-- Shared JavaScript -->
<script src="<?= asset('assets/js/site.js') ?>" defer></script>
<?php if (!empty($page_js)): ?>
<script src="<?= asset('assets/js/' . $page_js) ?>" defer></script>
<?php endif; ?>
</body>
</html>

