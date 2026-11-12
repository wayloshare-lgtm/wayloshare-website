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
    <div style="display: inline-flex; align-items: center; gap: 10px; font-size: 15px; font-weight: 800; letter-spacing: 2px; color: #F2C14E; text-transform: uppercase">
      <span class="pulse" style="width: 8px; height: 8px; border-radius: 50%; background: #7FD28F"></span>
      WHY GO SOLO? · THE WAYLOSHARE STORY
    </div>
    <h1 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(48px, 7.4vw, 104px); line-height: 0.95; letter-spacing: -2.6px; max-width: 1100px">Started in Jammu.<br>Built for every road in India.</h1>
    <p style="margin: 0; font-size: 22px; line-height: 1.55; max-width: 720px; color: #C9D6E6">Every day, cars leave Indian cities with empty seats while commuters struggle with surge fares, packed trains, or unvetted strangers. WayloShare bridges the verification gap.</p>
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
    <div style="flex: 1 1 360px; display: flex; flex-direction: column; gap: 16px">
      <span style="font-size: 15px; font-weight: 800; letter-spacing: 2px; color: #2775BA; text-transform: uppercase">THE PROBLEM &amp; THE VISION</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.6vw, 60px); line-height: 1.02; letter-spacing: -1.5px">Why we started WayloShare</h2>
      <p style="margin: 0; font-size: 19px; line-height: 1.6; color: #52627A">Closing the dangerous verification gap on Indian roads, so no one ever has to ask: <em>“Is this car safe?”</em></p>
    </div>

    <div style="flex: 999 1 560px; min-width: 0; display: flex; flex-direction: column; gap: 24px; font-size: 19px; line-height: 1.7; color: #34465F">
      <p style="margin: 0">
        Every single day, hundreds of thousands of personal cars travel between Indian cities—Jammu to Chandigarh, Delhi to Jaipur, Lucknow to Kanpur—carrying a single driver while 3 or 4 passenger seats sit completely empty. At the same time, students, professionals, and daily commuters face packed train waitlists, expensive private taxis, or uncomfortable transit.
      </p>

      <div style="border-left: 4px solid #E8417A; background: #FFF5F9; border-radius: 0 18px 18px 0; padding: 22px 26px">
        <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px; color: #7A1840">The Verification Gap in the Market</h3>
        <p style="margin: 0; font-size: 18px; line-height: 1.65; color: #5C2340">
          When founders <strong>Amarjit Singh</strong> and <strong>Anit Paul Singh</strong> studied existing carpooling and ride-sharing apps, they uncovered an alarming systemic issue: <strong>on most open ride platforms, virtually any driver can post an intercity highway ride without rigorous identity verification, genuine license validation, or vehicle scrutiny.</strong> Passengers were expected to step into high-speed highway cars with complete strangers whose identities were essentially unverified. For women travelers, parents, and commuters, this lack of security made carpooling an enormous gamble.
        </p>
      </div>

      <p style="margin: 0">
        Amarjit and Anit founded <strong><?= e($cfg['company']) ?></strong> with an uncompromising mandate: <em>fix the verification gap from both sides</em>. No unvetted drivers, no anonymous riders, and no safety compromises.
      </p>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin: 10px 0">
        <div style="background: #ffffff; border: 1.5px solid #D5E0EC; border-radius: 18px; padding: 20px; display: flex; flex-direction: column; gap: 8px">
          <span style="font-size: 14px; font-weight: 700; color: #2775BA; letter-spacing: 1px">01 · TWO-WAY VERIFICATION</span>
          <strong style="font-size: 18px; color: #13294B">Rider &amp; Driver KYC</strong>
          <span style="font-size: 15px; color: #52627A; line-height: 1.5">Government ID, mobile OTP, and facial selfie verification required for both driver and rider before any seat is booked.</span>
        </div>
        <div style="background: #ffffff; border: 1.5px solid #D5E0EC; border-radius: 18px; padding: 20px; display: flex; flex-direction: column; gap: 8px">
          <span style="font-size: 14px; font-weight: 700; color: #E8417A; letter-spacing: 1px">02 · PINK RIDE NETWORK</span>
          <strong style="font-size: 18px; color: #7A1840">Women-Only Verified Rides</strong>
          <span style="font-size: 15px; color: #52627A; line-height: 1.5">An exclusive safe-space community where women drive women, backed by multi-point gender and identity checks.</span>
        </div>
        <div style="background: #ffffff; border: 1.5px solid #D5E0EC; border-radius: 18px; padding: 20px; display: flex; flex-direction: column; gap: 8px">
          <span style="font-size: 14px; font-weight: 700; color: #2D7E3C; letter-spacing: 1px">03 · MoRTH-CAPPED FARES</span>
          <strong style="font-size: 18px; color: #13294B">Fair Cost Sharing</strong>
          <span style="font-size: 15px; color: #52627A; line-height: 1.5">Strict per-km price ceilings under official carpooling rules. No surge pricing, no commercial taxis, just honest cost-sharing.</span>
        </div>
      </div>

      <p style="margin: 0">
        Today, WayloShare is head-quartered in Jammu, J&amp;K, connecting verified commuters across NH44 and the North, with expansion underway across India. Why go solo when you can share the journey safely, save money, and cut highway emissions?
      </p>
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
    <div style="display: flex; flex-direction: column; gap: 10px">
      <span style="font-size: 15px; font-weight: 800; letter-spacing: 2px; color: #2775BA; text-transform: uppercase">LEADERSHIP</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.6vw, 60px); line-height: 1.02; letter-spacing: -1.5px">The people behind the wheel</h2>
      <p style="margin: 0; font-size: 19px; color: #52627A; max-width: 680px">Founded in Jammu with an uncompromising commitment to safe, trusted, and verified highway carpooling.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px">
      <!-- Amarjit Singh (FIRST) -->
      <div class="glass-light lift" style="border-radius: 28px; padding: 22px; display: flex; flex-direction: column; gap: 16px; border: 1.5px solid rgba(19,41,75,0.12)">
        <div style="height: 340px; border-radius: 20px; overflow: hidden; background: #0B1626; box-shadow: 0 12px 30px rgba(19,41,75,0.12)">
          <img src="<?= asset('assets/img/amarjit-singh.jpg') ?>" alt="Amarjit Singh - Founder" style="width: 100%; height: 100%; object-fit: cover; object-position: center top; display: block">
        </div>
        <div style="display: flex; flex-direction: column; gap: 4px">
          <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; font-weight: 700; color: #13294B">Amarjit Singh</span>
          <span style="font-size: 16px; font-weight: 700; color: #2775BA; letter-spacing: 0.5px">Founder</span>
          <p style="margin: 8px 0 0; font-size: 15px; line-height: 1.55; color: #52627A">Leading the vision to eliminate unverified rides across Indian highways, driving trust architecture and two-way verification for every shared seat.</p>
        </div>
      </div>

      <!-- Anit Paul Singh (SECOND) -->
      <div class="glass-light lift" style="border-radius: 28px; padding: 22px; display: flex; flex-direction: column; gap: 16px; border: 1.5px solid rgba(19,41,75,0.12)">
        <div style="height: 340px; border-radius: 20px; overflow: hidden; background: #0B1626; box-shadow: 0 12px 30px rgba(19,41,75,0.12)">
          <img src="<?= asset('assets/img/anit-paul-singh.jpg') ?>" alt="Anit Paul Singh - Founder" style="width: 100%; height: 100%; object-fit: cover; object-position: center top; display: block">
        </div>
        <div style="display: flex; flex-direction: column; gap: 4px">
          <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; font-weight: 700; color: #13294B">Anit Paul Singh</span>
          <span style="font-size: 16px; font-weight: 700; color: #2775BA; letter-spacing: 0.5px">Founder</span>
          <p style="margin: 8px 0 0; font-size: 15px; line-height: 1.55; color: #52627A">Driving operational excellence, route expansion starting from NH44, and championing the women-only Pink Ride network across Indian cities.</p>
        </div>
      </div>

      <!-- Join Us card -->
      <div style="border-radius: 28px; padding: 32px; display: flex; flex-direction: column; justify-content: space-between; gap: 20px; background: linear-gradient(135deg, #13294B 0%, #2775BA 100%); color: #ffffff; min-height: 340px; box-shadow: 0 16px 40px rgba(19,41,75,0.2)">
        <div style="display: flex; flex-direction: column; gap: 12px">
          <span style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #7FD28F"><span class="pulse" style="width: 8px; height: 8px; border-radius: 50%; background: #7FD28F"></span>WHY GO SOLO?</span>
          <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 32px; font-weight: 700; line-height: 1.1">Build the future of Indian mobility with us.</h3>
          <p style="margin: 0; font-size: 16px; line-height: 1.55; color: #E3EEF8">We are looking for passionate engineers, community builders, and safety leaders to join our mission in Jammu.</p>
        </div>
        <a href="mailto:<?= e($cfg['email_to']) ?>" style="align-self: flex-start; background: #ffffff; color: #13294B; text-decoration: none; font-weight: 700; font-size: 16px; padding: 13px 24px; border-radius: 14px; transition: transform .2s" class="lift">Get in touch →</a>
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

