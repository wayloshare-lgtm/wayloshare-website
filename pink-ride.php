<?php
/**
 * WayloShare Pink Ride Page (/pink-ride)
 */

require_once __DIR__ . '/includes/functions.php';

$cfg = config();

$page_title = 'Pink Ride | Women-only verified rides on WayloShare';
$page_description = 'Pink Ride is a women-only carpooling space inside WayloShare. Every woman driver and co-passenger is verified. Safe, cost-effective intercity travel across India.';
$current_page = 'pink-ride';
$page_css = 'pink-ride.css';
$page_js = 'pink-ride.js';

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #3D0F24; background: #FFF5F9; min-height: 100vh">

<header style="position: relative; background: #C72561; color: #ffffff; overflow: hidden; padding-bottom: 230px">
  <div class="blob" style="position: absolute; width: 640px; height: 640px; border-radius: 50%; background: #7A1840; opacity: 0.7; filter: blur(100px); left: -200px; top: 120px" aria-hidden="true"></div>
  <div class="blob" style="position: absolute; width: 520px; height: 520px; border-radius: 50%; background: #FF8FB8; opacity: 0.6; filter: blur(100px); right: -100px; top: -60px; animation-delay: -5s" aria-hidden="true"></div>

  <div style="height: 88px" aria-hidden="true"></div>

  <div style="position: relative; z-index: 2; max-width: 1280px; margin: 0 auto; padding: 56px clamp(16px, 4vw, 48px) 0; display: flex; flex-wrap: wrap; gap: 48px; align-items: center">
    <div style="flex: 999 1 560px; min-width: 0; display: flex; flex-direction: column; gap: 24px">
      <span class="glass rise" style="align-self: flex-start; border-radius: 999px; padding: 8px 16px; font-size: 15px; font-weight: 700; letter-spacing: .5px; box-shadow: none">WOMEN-ONLY RIDES, ACROSS INDIA</span>
      <h1 class="rise2" style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(50px, 7.4vw, 104px); line-height: 0.94; letter-spacing: -2.6px">Her ride.<br>Her rules.</h1>
      <p style="margin: 0; font-size: 21px; line-height: 1.5; max-width: 560px; color: #FFE1EC">Pink Ride is a women-only space inside WayloShare. Every driver is a verified woman, and only women can book the seats.</p>

      <div class="glass" style="border-radius: 28px; padding: 14px; display: flex; flex-direction: column; gap: 12px">
        <div style="display: flex; gap: 6px" id="pink-roles" role="tablist">
          <button type="button" role="tab" id="role-ride" aria-selected="true" style="border: 0; cursor: pointer; font: 700 16px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 14px; background: #ffffff; color: #C72561">I want a ride</button>
          <button type="button" role="tab" id="role-drive" aria-selected="false" style="border: 0; cursor: pointer; font: 600 16px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 14px; background: transparent; color: #ffffff">I’m driving</button>
        </div>
        
        <form method="get" action="<?= url('/get') ?>" id="pink-search-form" style="display: flex; flex-wrap: wrap; gap: 8px">
          <input type="hidden" name="mode" value="pink">
          <div class="field"><label for="pf">From</label><input id="pf" name="from" placeholder="Noida Sector 62"></div>
          <div class="field"><label for="pt">To</label><input id="pt" name="to" placeholder="Gurugram Cyber City"></div>
          <div class="field" style="flex: 1 1 130px"><label for="pd">Date</label><input id="pd" name="date" type="date"></div>
          <button type="submit" id="pink-submit-btn" style="flex: 1 1 170px; border: 0; cursor: pointer; border-radius: 16px; background: #3D0F24; color: #ffffff; text-decoration: none; font: 700 19px 'Familjen Grotesk', sans-serif; padding: 16px 22px; display: flex; align-items: center; justify-content: center; gap: 10px; min-height: 64px">
            Find Pink rides
          </button>
        </form>
      </div>
    </div>

    <div style="flex: 1 1 340px; min-width: 0; display: flex; justify-content: center; position: relative; padding-bottom: 30px">
      <div class="device floaty" style="width: 290px; background: #3D0F24; box-shadow: inset 0 0 0 2px rgba(255,255,255,.08), 0 0 0 2px #5C1B38, 0 40px 80px rgba(61,15,36,0.5); z-index: 2; display: flex; flex-direction: column">
        <div style="flex-grow: 1; border-radius: 36px; background: #FFF5F9; padding: 52px 18px 22px; display: flex; flex-direction: column; gap: 12px; color: #3D0F24">
          <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 22px">Pink rides today</span>
          <div style="background: #ffffff; border-radius: 18px; padding: 14px; display: flex; flex-direction: column; gap: 6px; border: 1px solid #F4B6CC">
            <span style="font-weight: 700">Noida → Gurugram</span>
            <span style="font-size: 14px; color: #7A3A55">8:15 AM · 2 seats · <?= e($cfg['pink_price']) ?></span>
            <span style="font-size: 13px; color: #C72561; font-weight: 700">Woman driver · Verified</span>
          </div>
          <div style="background: #ffffff; border-radius: 18px; padding: 14px; display: flex; flex-direction: column; gap: 6px; border: 1px solid #F4B6CC">
            <span style="font-weight: 700">Pune → Mumbai</span>
            <span style="font-size: 14px; color: #7A3A55">6:30 PM · 1 seat · <?= e($cfg['pink_price']) ?></span>
            <span style="font-size: 13px; color: #C72561; font-weight: 700">Woman driver · Verified</span>
          </div>
          <div style="background: #ffffff; border-radius: 18px; padding: 14px; display: flex; flex-direction: column; gap: 6px; border: 1px solid #F4B6CC">
            <span style="font-weight: 700">Jammu → Chandigarh</span>
            <span style="font-size: 14px; color: #7A3A55">Tomorrow 7:00 AM · <?= e($cfg['pink_price']) ?></span>
            <span style="font-size: 13px; color: #C72561; font-weight: 700">Pink Ride · 3 seats free</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- PILLARS -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 110px; margin-top: -150px; position: relative; z-index: 3">
  <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 18px">
    <div class="glass-light lift" style="border-radius: 28px; padding: 34px; display: flex; flex-direction: column; gap: 12px; min-height: 260px">
      <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 40px; font-weight: 700; color: #C72561; line-height: 1">01</span>
      <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 28px; line-height: 1.1">Only women in the car</h3>
      <p style="margin: 0; font-size: 17px; line-height: 1.55; color: #5C2340">Driver, co-riders, everyone. Every woman on Pink Ride is ID-checked before booking.</p>
    </div>

    <div class="glass-light lift" style="border-radius: 28px; padding: 34px; display: flex; flex-direction: column; gap: 12px; min-height: 260px">
      <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 40px; font-weight: 700; color: #C72561; line-height: 1">02</span>
      <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 28px; line-height: 1.1">Driver KYC verified</h3>
      <p style="margin: 0; font-size: 17px; line-height: 1.55; color: #5C2340">Driving licence, vehicle RC and phone number matched before any ride goes live.</p>
    </div>

    <div class="glass-light lift" style="border-radius: 28px; padding: 34px; display: flex; flex-direction: column; gap: 12px; min-height: 260px">
      <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 40px; font-weight: 700; color: #C72561; line-height: 1">03</span>
      <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 28px; line-height: 1.1">Trip sharing &amp; SOS</h3>
      <p style="margin: 0; font-size: 17px; line-height: 1.55; color: #5C2340">Live tracking link for your family, plus a quick-access emergency help button inside the app.</p>
    </div>
  </div>
</section>

<!-- WHO USES PINK RIDE -->
<section style="padding: 120px clamp(16px, 4vw, 48px)">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; gap: 48px">
    <div style="max-width: 680px; display: flex; flex-direction: column; gap: 16px">
      <span style="font-size: 16px; font-weight: 700; letter-spacing: 1px; color: #C72561">WHO RIDES</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(36px, 4.8vw, 64px); line-height: 1.02; letter-spacing: -1.6px">Built for every journey women take</h2>
      <p style="margin: 0; font-size: 20px; line-height: 1.55; color: #5C2340">From daily office commutes across NCR to weekend highway drives between Indian cities.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 18px">
      <div class="glass-light lift" style="border-radius: 26px; padding: 30px; display: flex; flex-direction: column; gap: 12px; min-height: 230px">
        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#C72561" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
        <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; color: #7A1840">Daily commute</h3>
        <p style="margin: 0; font-size: 17px; line-height: 1.5; color: #5C2340">Skip crowded metro changes and shared autos with verified co-riders heading to your tech park.</p>
      </div>

      <div class="glass-light lift" style="border-radius: 26px; padding: 30px; display: flex; flex-direction: column; gap: 12px; min-height: 230px">
        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#C72561" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
        <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; color: #7A1840">College and coaching</h3>
        <p style="margin: 0; font-size: 17px; line-height: 1.5; color: #5C2340">Split the cost of the daily trip with other students.</p>
      </div>

      <div class="glass-light lift" style="border-radius: 26px; padding: 30px; display: flex; flex-direction: column; gap: 12px; min-height: 230px">
        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#C72561" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11l9-7 9 7v9a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"></path></svg>
        <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; color: #7A1840">Trips home</h3>
        <p style="margin: 0; font-size: 17px; line-height: 1.5; color: #5C2340">Festival weekends and long highway drives, with women you can talk to first.</p>
      </div>
    </div>
  </div>
</section>

<!-- SAFETY PROMISE -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 120px">
  <div style="max-width: 1280px; margin: 0 auto; background: #3D0F24; color: #ffffff; border-radius: 36px; padding: clamp(32px, 5vw, 64px); display: flex; flex-wrap: wrap; gap: 48px; position: relative; overflow: hidden">
    <div class="blob" style="position: absolute; width: 400px; height: 400px; border-radius: 50%; background: #E8417A; opacity: 0.4; filter: blur(100px); right: -60px; top: -120px" aria-hidden="true"></div>
    <div style="position: relative; flex: 999 1 420px; min-width: 0; display: flex; flex-direction: column; gap: 18px">
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(34px, 4.4vw, 56px); line-height: 1.02; letter-spacing: -1.4px">Our Pink Ride promise</h2>
      <p style="margin: 0; font-size: 19px; line-height: 1.55; color: #F4C7D7">If a ride ever doesn't feel right, report it from the app and our dedicated safety team will review it immediately.</p>
    </div>
    <ul style="position: relative; flex: 1 1 380px; min-width: 0; margin: 0; padding: 0; list-style: none; display: flex; flex-direction: column; gap: 14px; font-size: 18px">
      <li class="glass" style="border-radius: 18px; padding: 16px 18px; display: flex; gap: 12px; box-shadow: none">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF8FB8" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink: 0"><path d="M20 6L9 17l-5-5"></path></svg>
        Every driver KYC-verified
      </li>
      <li class="glass" style="border-radius: 18px; padding: 16px 18px; display: flex; gap: 12px; box-shadow: none">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF8FB8" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink: 0"><path d="M20 6L9 17l-5-5"></path></svg>
        Women-only bookings, no exceptions
      </li>
      <li class="glass" style="border-radius: 18px; padding: 16px 18px; display: flex; gap: 12px; box-shadow: none">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF8FB8" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink: 0"><path d="M20 6L9 17l-5-5"></path></svg>
        Phone numbers stay masked inside in-app chat
      </li>
      <li class="glass" style="border-radius: 18px; padding: 16px 18px; display: flex; gap: 12px; box-shadow: none">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF8FB8" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink: 0"><path d="M20 6L9 17l-5-5"></path></svg>
        Direct 24/7 in-app emergency SOS button
      </li>
    </ul>
  </div>
</section>

<!-- CTA -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 140px">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 32px; align-items: center; justify-content: space-between">
    <h2 style="margin: 0; flex: 999 1 460px; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(38px, 5vw, 68px); line-height: 1; letter-spacing: -1.6px; color: #7A1840">Ride with women. Download WayloShare.</h2>
    <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap">
      <img src="<?= asset('assets/img/qr.png') ?>" alt="QR code to download WayloShare" width="130" height="130" style="width: 130px; height: 130px; border-radius: 14px; border: 2px solid #F4B6CC; background: #ffffff">
      <div style="display: flex; flex-direction: column; gap: 10px">
        <a href="<?= e($cfg['app_store']) ?>" target="_blank" rel="noopener" style="background: #C72561; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 18px; padding: 15px 26px; border-radius: 16px; text-align: center">App Store</a>
        <a href="<?= e($cfg['play_store']) ?>" target="_blank" rel="noopener" style="background: #3D0F24; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 18px; padding: 15px 26px; border-radius: 16px; text-align: center">Google Play</a>
      </div>
    </div>
  </div>
</section>

</div>

<?php
require_once __DIR__ . '/includes/sticky-bar.php';
require_once __DIR__ . '/includes/footer.php';
?>

