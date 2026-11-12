<?php
/**
 * WayloShare Download Page (/download)
 */

require_once __DIR__ . '/includes/functions.php';

$cfg = config();
$detected = detect_device(); // 'ios', 'android', or 'desktop'

$detectMessages = [
    'android' => 'Android phone detected — opening Google Play…',
    'ios'     => 'iPhone detected — opening the App Store…',
    'desktop' => 'Scan the QR code with your phone camera to download'
];
$detectMsg = $detectMessages[$detected] ?? $detectMessages['desktop'];

$iosBg = ($detected === 'android') ? 'rgba(19,41,75,0.45)' : '#13294B';
$andBg = ($detected === 'ios') ? 'rgba(19,41,75,0.45)' : '#13294B';
$iosOp = ($detected === 'android') ? '0.6' : '1';
$andOp = ($detected === 'ios') ? '0.6' : '1';

$page_title = 'Download WayloShare | Free on iPhone and Android';
$page_description = 'WayloShare is verified carpooling for India. Get the free app on iOS and Android to find rides, share costs and travel safely.';
$current_page = 'download';
$page_css = 'download.css';
$page_js = 'download.js';

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #13294B; background: #F3F7FB; min-height: 100vh">

<header style="position: relative; background: #2775BA; color: #ffffff; overflow: hidden; padding-bottom: 100px">
  <div class="blob" style="position: absolute; width: 640px; height: 640px; border-radius: 50%; background: #13294B; opacity: 0.6; filter: blur(100px); left: -180px; top: 80px" aria-hidden="true"></div>
  <div class="blob" style="position: absolute; width: 480px; height: 480px; border-radius: 50%; background: #2D7E3C; opacity: 0.5; filter: blur(100px); right: -80px; bottom: -120px; animation-delay: -6s" aria-hidden="true"></div>

  <div style="height: 88px" aria-hidden="true"></div>

  <div style="position: relative; z-index: 2; max-width: 1280px; margin: 0 auto; padding: 56px clamp(16px, 4vw, 48px) 0; display: flex; flex-wrap: wrap; gap: 56px; align-items: center">
    <div style="flex: 999 1 540px; min-width: 0; display: flex; flex-direction: column; gap: 26px">
      <h1 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(48px, 7vw, 96px); line-height: 0.96; letter-spacing: -2.4px">One link.<br>The right store.</h1>
      <p style="margin: 0; font-size: 21px; line-height: 1.5; max-width: 540px; color: #E3EEF8">WayloShare is free on iPhone and Android. Open this page on your phone and we send you straight to your store.</p>

      <div class="glass" style="border-radius: 24px; padding: 18px 20px; display: flex; flex-direction: column; gap: 14px">
        <div id="detect-msg" style="display: flex; align-items: center; gap: 10px; font-size: 16px; font-weight: 600">
          <span class="pulse" style="width: 10px; height: 10px; border-radius: 50%; background: #7FD28F"></span>
          <span class="detect-text"><?= e($detectMsg) ?></span>
        </div>
        
        <div style="display: flex; gap: 6px; flex-wrap: wrap" role="group" aria-label="Select device" id="device-tabs">
          <button type="button" data-dev="android" aria-pressed="<?= $detected === 'android' ? 'true' : 'false' ?>" class="dev-btn" style="border: <?= $detected === 'android' ? '0' : '1px solid rgba(255,255,255,0.4)' ?>; cursor: pointer; font: <?= $detected === 'android' ? '700' : '600' ?> 15px 'Mukta', sans-serif; padding: 9px 16px; border-radius: 12px; background: <?= $detected === 'android' ? '#ffffff' : 'transparent' ?>; color: <?= $detected === 'android' ? '#13294B' : '#ffffff' ?>">Android</button>
          <button type="button" data-dev="ios" aria-pressed="<?= $detected === 'ios' ? 'true' : 'false' ?>" class="dev-btn" style="border: <?= $detected === 'ios' ? '0' : '1px solid rgba(255,255,255,0.4)' ?>; cursor: pointer; font: <?= $detected === 'ios' ? '700' : '600' ?> 15px 'Mukta', sans-serif; padding: 9px 16px; border-radius: 12px; background: <?= $detected === 'ios' ? '#ffffff' : 'transparent' ?>; color: <?= $detected === 'ios' ? '#13294B' : '#ffffff' ?>">iPhone</button>
        </div>

        <div style="display: flex; gap: 12px; flex-wrap: wrap">
          <a id="btn-ios-store" href="<?= e($cfg['app_store']) ?>" target="_blank" rel="noopener" style="flex: 1 1 200px; display: flex; align-items: center; gap: 12px; background: <?= $iosBg ?>; color: #ffffff; text-decoration: none; padding: 14px 20px; border-radius: 16px; border: 2px solid #ffffff; opacity: <?= $iosOp ?>; transition: all .25s ease">
            <svg width="26" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="6" y="2" width="12" height="20" rx="3"></rect>
              <path d="M11 18h2"></path>
            </svg>
            <span style="display: flex; flex-direction: column; line-height: 1.1">
              <span style="font-size: 12px; color: #C9D6E6">Download on the</span>
              <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 24px; font-weight: 600">App Store</span>
            </span>
          </a>

          <a id="btn-and-store" href="<?= e($cfg['play_store']) ?>" target="_blank" rel="noopener" style="flex: 1 1 200px; display: flex; align-items: center; gap: 12px; background: <?= $andBg ?>; color: #ffffff; text-decoration: none; padding: 14px 20px; border-radius: 16px; border: 2px solid #ffffff; opacity: <?= $andOp ?>; transition: all .25s ease">
            <svg width="26" height="28" viewBox="0 0 28 30" aria-hidden="true">
              <path d="M2 2l14 13L2 28z" fill="#7FD28F"></path>
              <path d="M2 2l19 10-5 3z" fill="#9CC8F0"></path>
              <path d="M2 28l19-10-5-3z" fill="#F2C14E"></path>
              <path d="M21 12l5 3-5 3-5-3z" fill="#F08A7E"></path>
            </svg>
            <span style="display: flex; flex-direction: column; line-height: 1.1">
              <span style="font-size: 12px; color: #C9D6E6">Get it on</span>
              <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 24px; font-weight: 600">Google Play</span>
            </span>
          </a>
        </div>
      </div>
    </div>

    <div style="flex: 1 1 340px; min-width: 0; display: flex; flex-direction: column; align-items: center; gap: 16px">
      <div class="glass floaty" style="border-radius: 34px; padding: 26px; display: flex; flex-direction: column; align-items: center; gap: 14px">
        <div style="position: relative; width: 240px; height: 240px; border-radius: 22px; background: #ffffff; padding: 14px; overflow: hidden">
          <img src="<?= asset('assets/img/qr.png') ?>" alt="QR code to download WayloShare" width="212" height="212" style="width: 100%; height: 100%; display: block">
          <span class="scanline" aria-hidden="true"></span>
        </div>
        <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 22px; font-weight: 700">Scan with your phone camera</span>
        <span style="font-size: 15px; color: #E3EEF8; text-align: center; max-width: 260px">Works on iPhone and Android — it opens the right store for you.</span>
      </div>
    </div>
  </div>
</header>

<!-- SCREENS -->
<section style="padding: 110px clamp(16px, 4vw, 48px)">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; gap: 48px; align-items: center">
    <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.6vw, 60px); line-height: 1.02; letter-spacing: -1.5px; text-align: center; max-width: 760px">A look inside the app</h2>
    <div style="display: flex; gap: 32px; flex-wrap: wrap; justify-content: center">
      <figure style="margin: 0; display: flex; flex-direction: column; align-items: center; gap: 14px">
        <div class="device floaty lift" style="width: 250px; box-shadow: 0 30px 60px rgba(19,41,75,0.22)">
          <img src="<?= asset('assets/img/screen-home.jpg') ?>" alt="Home screen" width="250" height="500" loading="lazy">
        </div>
        <figcaption style="font-weight: 700; font-size: 18px">Home</figcaption>
      </figure>

      <figure style="margin: 0; display: flex; flex-direction: column; align-items: center; gap: 14px; padding-top: 60px">
        <div class="device floaty lift" style="width: 250px; box-shadow: 0 30px 60px rgba(19,41,75,0.22); animation-delay: -2s">
          <img src="<?= asset('assets/img/screen-post.jpg') ?>" alt="Posting a route with a suggested seat price" width="250" height="500" loading="lazy">
        </div>
        <figcaption style="font-weight: 700; font-size: 18px">Post a ride</figcaption>
      </figure>

      <figure style="margin: 0; display: flex; flex-direction: column; align-items: center; gap: 14px">
        <div class="device floaty lift" style="width: 250px; box-shadow: 0 30px 60px rgba(19,41,75,0.22); animation-delay: -4s">
          <img src="<?= asset('assets/img/screen-time.jpg') ?>" alt="Choosing date and time" width="250" height="500" loading="lazy">
        </div>
        <figcaption style="font-weight: 700; font-size: 18px">Pick a time</figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- INSTALL STEPS -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 140px">
  <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 18px">
    <div class="glass-light lift" style="border-radius: 26px; padding: 30px; display: flex; flex-direction: column; gap: 10px">
      <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 44px; font-weight: 700; color: #2775BA; line-height: 1">1</span>
      <span style="font-size: 22px; font-weight: 700">Install free</span>
      <span style="font-size: 17px; line-height: 1.5; color: #45566E">From the App Store or Google Play.</span>
    </div>
    <div class="glass-light lift" style="border-radius: 26px; padding: 30px; display: flex; flex-direction: column; gap: 10px">
      <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 44px; font-weight: 700; color: #2775BA; line-height: 1">2</span>
      <span style="font-size: 22px; font-weight: 700">Verify your number</span>
      <span style="font-size: 17px; line-height: 1.5; color: #45566E">One OTP and you're in.</span>
    </div>
    <div class="glass-light lift" style="border-radius: 26px; padding: 30px; display: flex; flex-direction: column; gap: 10px">
      <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 44px; font-weight: 700; color: #2D7E3C; line-height: 1">3</span>
      <span style="font-size: 22px; font-weight: 700">Book or post</span>
      <span style="font-size: 17px; line-height: 1.5; color: #45566E">Your website search opens where you left it.</span>
    </div>
  </div>
</section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

