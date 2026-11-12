<?php
/**
 * WayloShare About Page (/about)
 */

require_once __DIR__ . '/includes/functions.php';

$cfg = config();

$page_title = 'About WayloShare | Started in Jammu, built for Indian roads';
$page_description = 'WayloShare is verified carpooling for India. Started in Jammu, J&K, we connect verified drivers with passengers sharing the same highway route.';
$current_page = 'about';
$page_css = 'about.css';

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #13294B; background: #F3F7FB; min-height: 100vh">

<header style="position: relative; background: #13294B; color: #ffffff; overflow: hidden; padding-bottom: 110px">
  <div class="blob" style="position: absolute; width: 620px; height: 620px; border-radius: 50%; background: #2775BA; opacity: 0.55; filter: blur(110px); right: -140px; top: 40px" aria-hidden="true"></div>
  <div style="height: 88px" aria-hidden="true"></div>
  <div style="position: relative; max-width: 1280px; margin: 0 auto; padding: 80px clamp(16px, 4vw, 48px) 0; display: flex; flex-direction: column; gap: 26px">
    <span style="font-size: 16px; font-weight: 700; letter-spacing: 1px; color: #9CC8F0">ABOUT WAYLOSHARE</span>
    <h1 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(48px, 7.4vw, 104px); line-height: 0.95; letter-spacing: -2.6px; max-width: 1100px">Started in Jammu.<br>Built for every road in India.</h1>
    <p style="margin: 0; font-size: 22px; line-height: 1.55; max-width: 720px; color: #C9D6E6">Every day, cars leave Indian cities with empty seats while people wait for buses, pay for full cabs, or skip the trip. WayloShare puts those seats to use.</p>
  </div>
  <div style="position: absolute; left: 0; right: 0; bottom: 0; height: 70px; background: #2D7E3C" aria-hidden="true">
    <div style="position: absolute; left: 0; right: 0; top: 8px; height: 48px; background: #ffffff"></div>
    <div class="lane" style="position: absolute; left: 0; right: 0; top: 31px; height: 3px"></div>
    <div class="crosser">
      <svg width="68" height="46" viewBox="0 0 68 46" aria-hidden="true">
        <rect x="4" y="18" width="60" height="22" rx="8" fill="#2775BA"></rect>
        <path d="M14 18l7-13h26l7 13z" fill="#2775BA"></path>
        <path d="M20 17l5-9h9v9z M37 17v-9h8l5 9z" fill="#9CC8F0"></path>
        <g class="wheel">
          <circle cx="18" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle>
          <path d="M18 35v10M13 40h10" stroke="#ffffff" stroke-width="1.5"></path>
        </g>
        <g class="wheel">
          <circle cx="50" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle>
          <path d="M50 35v10M45 40h10" stroke="#ffffff" stroke-width="1.5"></path>
        </g>
      </svg>
    </div>
  </div>
</header>

<!-- STORY -->
<section style="padding: 120px clamp(16px, 4vw, 48px)">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 64px">
    <h2 style="margin: 0; flex: 1 1 360px; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.6vw, 60px); line-height: 1.02; letter-spacing: -1.5px">Our story</h2>
    <div style="flex: 999 1 560px; min-width: 0; display: flex; flex-direction: column; gap: 20px; font-size: 20px; line-height: 1.65; color: #34465F">
      <p style="margin: 0">[FOUNDER STORY — 2–3 short paragraphs: who started WayloShare, the trip or moment that sparked it (for example, the Jammu–Chandigarh drive), and why carpooling needed a version built for India.]</p>
      <p style="margin: 0">Today <?= e($cfg['company']) ?> is a team in Jammu building ride sharing for Indian roads, Indian payments and Indian families — with a women-only Pink Ride and KYC-verified drivers from day one.</p>
    </div>
  </div>
</section>

<!-- VALUES -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 120px">
  <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 18px">
    <div class="lift" style="background: #2775BA; color: #ffffff; border-radius: 28px; padding: 38px; display: flex; flex-direction: column; gap: 14px; min-height: 280px">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6z"></path></svg>
      <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 32px; line-height: 1.05">Trust first</h3>
      <p style="margin: 0; font-size: 18px; line-height: 1.55; color: #E3EEF8">Verified drivers, honest prices and a women-only option, because nobody shares a car with a stranger.</p>
    </div>

    <div class="lift" style="background: #2D7E3C; color: #ffffff; border-radius: 28px; padding: 38px; display: flex; flex-direction: column; gap: 14px; min-height: 280px">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22c5-3 8-7 8-12a8 8 0 0 0-16 0c0 5 3 9 8 12z"></path></svg>
      <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 32px; line-height: 1.05">Fewer empty seats</h3>
      <p style="margin: 0; font-size: 18px; line-height: 1.55; color: #E4F1E6">Every shared seat is one less car, less traffic and less fuel burned on the same road.</p>
    </div>

    <div class="lift" style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 28px; padding: 38px; display: flex; flex-direction: column; gap: 14px; min-height: 280px">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#13294B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
      <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 32px; line-height: 1.05">Cost sharing, not cabs</h3>
      <p style="margin: 0; font-size: 18px; line-height: 1.55; color: #45566E">Capped per-km fares under MoRTH carpool rules keep it fair and transparent for driver and rider.</p>
    </div>
  </div>
</section>

<!-- MAP OF CITIES -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 120px">
  <div style="max-width: 1280px; margin: 0 auto; background: #13294B; color: #ffffff; border-radius: 36px; padding: clamp(36px, 5vw, 64px); display: flex; flex-wrap: wrap; gap: 48px; position: relative; overflow: hidden">
    <div style="flex: 1 1 360px; min-width: 0; display: flex; flex-direction: column; gap: 20px">
      <span style="font-size: 15px; font-weight: 700; letter-spacing: 1px; color: #7FD28F">CITIES &amp; HIGHWAYS</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.4vw, 56px); line-height: 1; letter-spacing: -1.4px">Where WayloShare is on the road</h2>
      <p style="margin: 0; font-size: 18px; line-height: 1.55; color: #C9D6E6">Starting from our home in Jammu across NH44 and the north, and expanding to major inter-city routes nationwide.</p>
      <span style="font-size: 14px; color: #9CC8F0"><?= e($cfg['launch_cities']) ?></span>
    </div>

    <div style="flex: 999 1 480px; min-width: 0; min-height: 380px; position: relative" role="img" aria-label="Map illustration showing WayloShare routes from Jammu southwards">
      <svg width="100%" height="100%" viewBox="0 0 500 400" aria-hidden="true" style="position: absolute; inset: 0">
        <path d="M220 50 L 240 120 L 260 160 L 220 220 L 320 210 L 160 300 L 270 320 L 280 380" fill="none" stroke="rgba(255,255,255,0.22)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="6 8"></path>
      </svg>
      <div style="position: absolute; left: 40%; top: 10%; display: flex; align-items: center; gap: 8px; font-weight: 700"><span style="position: relative; width: 14px; height: 14px; border-radius: 50%; background: #7FD28F"><span class="ping"></span></span>Jammu</div>
      <div style="position: absolute; left: 44%; top: 26%; display: flex; align-items: center; gap: 8px; font-weight: 700"><span style="width: 12px; height: 12px; border-radius: 50%; background: #9CC8F0"></span>Chandigarh</div>
      <div style="position: absolute; left: 48%; top: 34%; display: flex; align-items: center; gap: 8px; font-weight: 700"><span style="width: 12px; height: 12px; border-radius: 50%; background: #9CC8F0"></span>Delhi NCR</div>
      <div style="position: absolute; left: 36%; top: 47%; display: flex; align-items: center; gap: 8px; font-weight: 700"><span style="width: 12px; height: 12px; border-radius: 50%; background: #9CC8F0"></span>Jaipur</div>
      <div style="position: absolute; left: 70%; top: 45%; display: flex; align-items: center; gap: 8px; font-weight: 700"><span style="width: 12px; height: 12px; border-radius: 50%; background: #9CC8F0"></span>Lucknow</div>
      <div style="position: absolute; left: 25%; top: 67%; display: flex; align-items: center; gap: 8px; font-weight: 700; color: #C9D6E6"><span style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid #9CC8F0"></span>Mumbai · next</div>
      <div style="position: absolute; left: 52%; top: 74%; display: flex; align-items: center; gap: 8px; font-weight: 700; color: #C9D6E6"><span style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid #9CC8F0"></span>Hyderabad · next</div>
      <div style="position: absolute; left: 54%; top: 90%; display: flex; align-items: center; gap: 8px; font-weight: 700; color: #C9D6E6"><span style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid #9CC8F0"></span>Bengaluru · next</div>
    </div>
  </div>
</section>

<!-- TEAM -->
<section style="padding: 120px clamp(16px, 4vw, 48px)">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; gap: 40px">
    <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.6vw, 60px); line-height: 1.02; letter-spacing: -1.5px">The people behind the wheel</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 18px">
      <div class="glass-light lift" style="border-radius: 26px; padding: 18px; display: flex; flex-direction: column; gap: 12px">
        <div style="height: 240px; border-radius: 18px; background: #E4EEF8; display: flex; align-items: center; justify-content: center; color: #52627A; font-size: 15px">[FOUNDER PHOTO]</div>
        <span style="font-size: 22px; font-weight: 700">[Founder name]</span>
        <span style="font-size: 16px; color: #52627A">Co-founder &amp; CEO</span>
      </div>
      <div class="glass-light lift" style="border-radius: 26px; padding: 18px; display: flex; flex-direction: column; gap: 12px">
        <div style="height: 240px; border-radius: 18px; background: #E4EEF8; display: flex; align-items: center; justify-content: center; color: #52627A; font-size: 15px">[PHOTO]</div>
        <span style="font-size: 22px; font-weight: 700">[Name]</span>
        <span style="font-size: 16px; color: #52627A">Co-founder &amp; CTO</span>
      </div>
      <div class="glass-light lift" style="border-radius: 26px; padding: 18px; display: flex; flex-direction: column; gap: 12px">
        <div style="height: 240px; border-radius: 18px; background: #E4EEF8; display: flex; align-items: center; justify-content: center; color: #52627A; font-size: 15px">[PHOTO]</div>
        <span style="font-size: 22px; font-weight: 700">[Name]</span>
        <span style="font-size: 16px; color: #52627A">[Role]</span>
      </div>
      <div style="border-radius: 26px; padding: 28px; display: flex; flex-direction: column; gap: 12px; justify-content: flex-end; background: #2775BA; color: #ffffff">
        <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 28px; font-weight: 700; line-height: 1.1">Want to build this with us?</span>
        <a href="mailto:<?= e($cfg['email_to']) ?>" style="color: #ffffff; font-weight: 700; font-size: 18px"><?= e($cfg['email_to']) ?></a>
      </div>
    </div>
  </div>
</section>

<section style="padding: 0 clamp(16px, 4vw, 48px) 120px">
  <div style="max-width: 1280px; margin: 0 auto; border-radius: 32px; background: #E4EEF8; padding: clamp(28px, 4vw, 52px); display: flex; flex-wrap: wrap; gap: 32px; justify-content: space-between; align-items: center">
    <div style="display: flex; flex-direction: column; gap: 6px">
      <span style="font-size: 16px; color: #52627A">Registered office</span>
      <span style="font-size: 22px; font-weight: 700; line-height: 1.4"><?= e($cfg['company']) ?><br><?= e($cfg['address']) ?></span>
    </div>
    <a href="<?= url('/contact') ?>" style="background: #13294B; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 18px; padding: 16px 26px; border-radius: 16px">Contact the team</a>
  </div>
</section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

