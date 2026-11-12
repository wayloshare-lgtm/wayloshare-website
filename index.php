<?php
/**
 * WayloShare Homepage (index.php)
 * Production plain PHP implementation of the approved design.
 */

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/data/routes.php';

$cfg = config();
$routesData = require __DIR__ . '/data/routes.php';

$page_title = 'WayloShare | Why Go Solo? · Verified carpooling for India';
$page_description = 'WayloShare is verified carpooling for India: share a seat, split the cost with fares capped per km, and ride women-only with Pink Ride. Free on iPhone and Android.';
$current_page = 'home';
$page_css = 'home.css';
$page_js = 'home.js';

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #13294B; background: #F3F7FB; min-height: 100vh; position: relative">

<!-- HERO -->
<header id="top" style="position: relative; background: #2775BA; color: #ffffff; overflow: hidden; padding-bottom: 230px">
  <div class="blob" style="position: absolute; width: 620px; height: 620px; border-radius: 50%; background: #13294B; opacity: 0.55; filter: blur(90px); left: -180px; top: 120px" aria-hidden="true"></div>
  <div class="blob" style="position: absolute; width: 520px; height: 520px; border-radius: 50%; background: #2D7E3C; opacity: 0.45; filter: blur(100px); right: -120px; top: -80px; animation-delay: -6s" aria-hidden="true"></div>

  <!-- sticky glass nav -->
  <div style="height: 88px" aria-hidden="true"></div>

  <div style="position: relative; z-index: 2; max-width: 1280px; margin: 0 auto; padding: 56px clamp(16px, 4vw, 48px) 0; display: flex; flex-wrap: wrap; gap: 48px; align-items: center">
    <div style="flex: 999 1 560px; min-width: 0; display: flex; flex-direction: column; gap: 26px">
      <div class="glass rise" style="align-self: flex-start; border-radius: 999px; padding: 8px 18px 8px 12px; display: inline-flex; align-items: center; gap: 10px; font-size: 15px; font-weight: 700; box-shadow: none">
        <span class="pulse" style="width: 10px; height: 10px; border-radius: 50%; background: #7FD28F"></span>
        <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 15px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: #F2C14E">WHY GO SOLO?</span>
        <span style="opacity: 0.4">·</span>
        <span style="color: #ffffff; font-weight: 600">Carpooling across India</span>
      </div>
      <h1 class="rise2" style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(48px, 7vw, 96px); line-height: 0.96; letter-spacing: -2.5px">Same route.<br>Shared seat.<br><span style="color: #BFE3C6">Half the cost.</span></h1>
      <p class="rise3" style="margin: 0; font-size: 21px; line-height: 1.5; max-width: 560px; color: #E3EEF8">Find a verified driver heading your way, or fill the empty seats in your car. From city commutes to highway trips, from Jammu to Kanyakumari.</p>

      <!-- SEARCH -->
      <div class="glass rise3" style="border-radius: 28px; padding: 14px; display: flex; flex-direction: column; gap: 12px">
        <div role="tablist" style="display: flex; gap: 6px; flex-wrap: wrap">
          
        <div role="tablist" style="display: flex; gap: 6px; flex-wrap: wrap" id="hero-tabs">
          <button type="button" role="tab" data-tab="find" aria-selected="true" style="border: 0; cursor: pointer; font: 700 16px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 14px; background: #ffffff; color: #13294B; display: flex; align-items: center; gap: 8px"><span style="width: 8px; height: 8px; border-radius: 50%; background: #2775BA"></span>Find a ride</button>
          <button type="button" role="tab" data-tab="offer" aria-selected="false" style="border: 0; cursor: pointer; font: 600 16px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 14px; background: transparent; color: #ffffff; display: flex; align-items: center; gap: 8px"><span style="width: 8px; height: 8px; border-radius: 50%; background: #2D7E3C"></span>Offer a ride</button>
          <button type="button" role="tab" data-tab="pink" aria-selected="false" style="border: 0; cursor: pointer; font: 600 16px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 14px; background: transparent; color: #ffffff; display: flex; align-items: center; gap: 8px"><span style="width: 8px; height: 8px; border-radius: 50%; background: #E8417A"></span>Pink Ride</button>
        </div>
        </div>
        
        <form id="hero-search-form" method="get" action="<?= url('/get') ?>" style="display: flex; flex-wrap: wrap; gap: 8px">
          <input type="hidden" name="mode" id="hero-mode" value="find">
          <div class="field"><label for="from">Leaving from</label><input id="from" name="from" placeholder="Delhi, Connaught Place"></div>
          <div class="field"><label for="to">Going to</label><input id="to" name="to" placeholder="Jaipur, Sindhi Camp"></div>
          <div class="field" style="flex: 1 1 130px"><label for="date">Date</label><input id="date" name="date" type="date"></div>
          <div class="field" style="flex: 0 1 110px"><label for="seats" id="hero-seat-label">Seats</label><select id="seats" name="seats"><option>1</option><option>2</option><option>3</option><option>4</option></select></div>
          <button type="submit" id="hero-submit-btn" class="btn-shine" style="flex: 1 1 170px; border: 0; cursor: pointer; border-radius: 16px; background: #13294B; color: #ffffff; font: 700 19px 'Familjen Grotesk', sans-serif; padding: 16px 22px; display: flex; align-items: center; justify-content: center; gap: 10px; min-height: 64px">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-4-4"></path></svg><span id="hero-submit-text">Search rides</span>
          </button>
        </form>
        
        <div id="hero-pink-note" style="display: none; align-items: center; gap: 10px; padding: 4px 8px 2px; font-size: 15px; color: #FFE1EC">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF8FB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6z"></path></svg>
          Pink Ride is for women only. Every seat verified.
        </div>
      </div>

      <p style="margin: 0; font-size: 16px; color: #E3EEF8">Why go solo when you can share? Verified riders &amp; drivers · MoRTH-capped fares · Women-only Pink Ride</p>
    </div>

    <!-- phone + floating glass chips -->
    <div class="hero-phone" style="flex: 1 1 340px; min-width: 0; display: flex; justify-content: center; position: relative; padding: 0 0 40px">
      <div class="device floaty" style="width: 296px; z-index: 2">
        <img src="<?= asset('assets/img/screen-home.jpg') ?>" alt="WayloShare app home screen">
      </div>
      <div class="glass floaty2 hero-chip" style="position: absolute; left: calc(50% - 260px); bottom: 90px; z-index: 3; border-radius: 20px; padding: 14px 18px; display: flex; flex-direction: column; gap: 2px">
        <span style="font-size: 14px; color: #E3EEF8">Jammu → Chandigarh</span>
        <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 28px; font-weight: 700">₹1,103 <span style="font-size: 16px; font-weight: 500">/ seat</span></span>
        <span style="font-size: 13px; color: #BFE3C6; font-weight: 600">Suggested fair price</span>
      </div>
    </div>
  </div>

  <!-- moving cars on the winding road -->
  <div style="position: absolute; left: 0; right: 0; bottom: 0; height: 240px; overflow: hidden; z-index: 1" aria-hidden="true">
    <div style="position: absolute; left: 50%; bottom: 0; width: 4800px; height: 240px; transform: translateX(-50%)">
      <svg width="4800" height="240" viewBox="0 0 4800 240" style="position: absolute; inset: 0; display: block">
        <path d="M0,80 C100,80 140,180 240,180 C340,180 380,80 480,80 C580,80 620,180 720,180 C820,180 860,80 960,80 C1060,80 1100,180 1200,180 C1300,180 1340,80 1440,80 C1540,80 1580,180 1680,180 C1780,180 1820,80 1920,80 C2020,80 2060,180 2160,180 C2260,180 2300,80 2400,80 C2500,80 2540,180 2640,180 C2740,180 2780,80 2880,80 C2980,80 3020,180 3120,180 C3220,180 3260,80 3360,80 C3460,80 3500,180 3600,180 C3700,180 3740,80 3840,80 C3940,80 3980,180 4080,180 C4180,180 4220,80 4320,80 C4420,80 4460,180 4560,180 C4660,180 4700,80 4800,80 L4800,240 L0,240 Z" fill="#2D7E3C"></path>
        <path d="M0,80 C100,80 140,180 240,180 C340,180 380,80 480,80 C580,80 620,180 720,180 C820,180 860,80 960,80 C1060,80 1100,180 1200,180 C1300,180 1340,80 1440,80 C1540,80 1580,180 1680,180 C1780,180 1820,80 1920,80 C2020,80 2060,180 2160,180 C2260,180 2300,80 2400,80 C2500,80 2540,180 2640,180 C2740,180 2780,80 2880,80 C2980,80 3020,180 3120,180 C3220,180 3260,80 3360,80 C3460,80 3500,180 3600,180 C3700,180 3740,80 3840,80 C3940,80 3980,180 4080,180 C4180,180 4220,80 4320,80 C4420,80 4460,180 4560,180 C4660,180 4700,80 4800,80" fill="none" stroke="#ffffff" stroke-width="40"></path>
        <path class="road-dash" d="M0,80 C100,80 140,180 240,180 C340,180 380,80 480,80 C580,80 620,180 720,180 C820,180 860,80 960,80 C1060,80 1100,180 1200,180 C1300,180 1340,80 1440,80 C1540,80 1580,180 1680,180 C1780,180 1820,80 1920,80 C2020,80 2060,180 2160,180 C2260,180 2300,80 2400,80 C2500,80 2540,180 2640,180 C2740,180 2780,80 2880,80 C2980,80 3020,180 3120,180 C3220,180 3260,80 3360,80 C3460,80 3500,180 3600,180 C3700,180 3740,80 3840,80 C3940,80 3980,180 4080,180 C4180,180 4220,80 4320,80 C4420,80 4460,180 4560,180 C4660,180 4700,80 4800,80" fill="none" stroke="#C9D6E6" stroke-width="3"></path>
        <g fill="#245F31"><circle cx="120" cy="215" r="18"></circle><circle cx="370" cy="222" r="20"></circle><circle cx="600" cy="215" r="18"></circle><circle cx="850" cy="222" r="20"></circle><circle cx="1080" cy="215" r="18"></circle><circle cx="1330" cy="222" r="20"></circle><circle cx="1560" cy="215" r="18"></circle><circle cx="1810" cy="222" r="20"></circle><circle cx="2040" cy="215" r="18"></circle><circle cx="2290" cy="222" r="20"></circle><circle cx="2520" cy="215" r="18"></circle><circle cx="2770" cy="222" r="20"></circle><circle cx="3000" cy="215" r="18"></circle><circle cx="3250" cy="222" r="20"></circle><circle cx="3480" cy="215" r="18"></circle><circle cx="3730" cy="222" r="20"></circle><circle cx="3960" cy="215" r="18"></circle><circle cx="4210" cy="222" r="20"></circle><circle cx="4440" cy="215" r="18"></circle><circle cx="4690" cy="222" r="20"></circle></g>
      </svg>
      <div class="car">
        <svg width="68" height="46" viewBox="0 0 68 46"><rect x="4" y="18" width="60" height="22" rx="8" fill="#13294B"></rect><path d="M14 18l7-13h26l7 13z" fill="#13294B"></path><path d="M20 17l5-9h9v9z M37 17v-9h8l5 9z" fill="#9CC8F0"></path><rect x="56" y="24" width="8" height="5" rx="2" fill="#F2C14E"></rect><g class="wheel"><circle cx="18" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M18 35v10M13 40h10" stroke="#ffffff" stroke-width="1.5"></path></g><g class="wheel"><circle cx="50" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M50 35v10M45 40h10" stroke="#ffffff" stroke-width="1.5"></path></g></svg>
      </div>
      <div class="car car2">
        <svg width="68" height="46" viewBox="0 0 68 46"><rect x="4" y="18" width="60" height="22" rx="8" fill="#E8417A"></rect><path d="M14 18l7-13h26l7 13z" fill="#E8417A"></path><path d="M20 17l5-9h9v9z M37 17v-9h8l5 9z" fill="#FFE1EC"></path><rect x="56" y="24" width="8" height="5" rx="2" fill="#F2C14E"></rect><g class="wheel"><circle cx="18" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M18 35v10M13 40h10" stroke="#ffffff" stroke-width="1.5"></path></g><g class="wheel"><circle cx="50" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M50 35v10M45 40h10" stroke="#ffffff" stroke-width="1.5"></path></g></svg>
      </div>
    </div>
  </div>
</header>

<!-- STORY: BOOK → ARRIVE → HOP IN → BENEFITS -->
<section style="background: #2775BA; color: #ffffff; padding: 90px clamp(16px, 4vw, 48px) 100px; position: relative; overflow: hidden">
  <div class="blob" style="position: absolute; width: 560px; height: 560px; border-radius: 50%; background: #13294B; opacity: 0.5; filter: blur(110px); left: -160px; top: -60px" aria-hidden="true"></div>
  <div style="max-width: 1280px; margin: 0 auto; position: relative; display: flex; flex-direction: column; gap: 36px">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap">
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(38px, 5vw, 66px); line-height: 1; letter-spacing: -1.6px; max-width: 760px">4 steps. One shared ride.</h2>
      <a href="<?= url('/download') ?>" style="color: #ffffff; font-weight: 700; font-size: 18px; border-bottom: 3px solid #F2C14E; text-decoration: none; padding-bottom: 2px">Get the app →</a>
    </div>

    <!-- 4 steps -->
    <ol class="steps4" style="list-style: none; margin: 0; padding: 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px">
      <li><div class="stepbar"><span class="fill f1"></span></div><span class="sn">01</span><span class="st">Book a seat</span><span class="sd">Search your route and book in the app.</span></li>
      <li><div class="stepbar"><span class="fill f2"></span></div><span class="sn">02</span><span class="st">Driver arrives</span><span class="sd">A KYC-verified driver reaches your pickup.</span></li>
      <li><div class="stepbar"><span class="fill f3"></span></div><span class="sn">03</span><span class="st">Hop in</span><span class="sd">Everyone in the car is verified.</span></li>
      <li><div class="stepbar"><span class="fill f4"></span></div><span class="sn">04</span><span class="st">Share the cost</span><span class="sd">Fare capped per km. Pay by UPI.</span></li>
    </ol>

    <div class="stage" style="position: relative; border-radius: 32px; overflow: hidden; background: #DCEBF8; border: 3px solid #13294B; aspect-ratio: 1200 / 460; min-height: 260px" role="img" aria-label="Animation: Arjun books a seat in the app, a verified driver arrives, he gets in, and they drive off together.">
      <svg viewBox="0 0 1200 460" width="100%" height="100%" preserveAspectRatio="xMaxYMid slice" style="position: absolute; inset: 0; display: block">
        <!-- sky + skyline -->
        <rect width="1200" height="460" fill="#DCEBF8"></rect>
        <circle cx="1040" cy="90" r="46" fill="#F2C14E"></circle>
        <g class="parallax" fill="#B9D4EE">
          <rect x="40" y="170" width="70" height="150"></rect><rect x="120" y="130" width="54" height="190"></rect><rect x="190" y="190" width="90" height="130"></rect>
          <rect x="420" y="150" width="60" height="170"></rect><rect x="490" y="200" width="110" height="120"></rect>
          <rect x="760" y="160" width="70" height="160"></rect><rect x="840" y="120" width="46" height="200"></rect><rect x="900" y="190" width="100" height="130"></rect>
          <rect x="1240" y="170" width="70" height="150"></rect><rect x="1320" y="130" width="54" height="190"></rect>
        </g>
        <!-- road -->
        <rect y="320" width="1200" height="140" fill="#2D7E3C"></rect>
        <rect y="336" width="1200" height="86" fill="#ffffff"></rect>
        <path class="road-dash" d="M0 379 H1200" stroke="#C9D6E6" stroke-width="4"></path>
        <!-- pickup pin -->
        <g transform="translate(700 236)">
          <path d="M0 0c-14 0-24 10-24 23 0 17 24 37 24 37s24-20 24-37C24 10 14 0 0 0z" fill="#E8417A"></path><circle cx="0" cy="23" r="8" fill="#ffffff"></circle>
          <text x="0" y="-12" text-anchor="middle" font-family="Mukta" font-weight="700" font-size="17" fill="#13294B">Pickup</text>
        </g>

        <!-- Arjun -->
        <g class="guy">
          <g transform="translate(820 228)">
            <circle cx="0" cy="0" r="16" fill="#8A5A3B"></circle>
            <path d="M-16 -4c2-14 30-16 32 0" fill="#13294B"></path>
            <rect x="-18" y="20" width="36" height="58" rx="14" fill="#F2C14E"></rect>
            <rect x="-14" y="74" width="12" height="44" rx="5" fill="#13294B"></rect><rect x="2" y="74" width="12" height="44" rx="5" fill="#13294B"></rect>
            <rect x="16" y="30" width="10" height="34" rx="5" fill="#8A5A3B" transform="rotate(-30 16 30)"></rect>
            <rect x="28" y="18" width="14" height="22" rx="3" fill="#13294B"></rect>
            <rect x="20" y="78" width="26" height="30" rx="6" fill="#2775BA"></rect>
          </g>
        </g>
        <!-- phone bubbles -->
        <g class="bub1"><rect x="840" y="120" width="190" height="58" rx="18" fill="#ffffff" stroke="#13294B" stroke-width="3"></rect><text x="935" y="156" text-anchor="middle" font-family="Mukta" font-weight="700" font-size="20" fill="#13294B">Booking seat…</text></g>
        <g class="bub2"><rect x="840" y="120" width="210" height="58" rx="18" fill="#2D7E3C"></rect><text x="945" y="156" text-anchor="middle" font-family="Mukta" font-weight="700" font-size="20" fill="#ffffff">✓ Booked · Seat 2</text></g>

        <!-- car -->
        <g class="carmove">
          <g transform="translate(0 250)">
            <rect x="10" y="40" width="230" height="64" rx="22" fill="#13294B"></rect>
            <path d="M50 42 L82 4 H172 L206 42 Z" fill="#13294B"></path>
            <path d="M70 38 L92 12 H126 V38 Z" fill="#9CC8F0"></path><path d="M134 38 V12 H166 L190 38 Z" fill="#9CC8F0"></path>
            <circle class="inside" cx="150" cy="28" r="10" fill="#8A5A3B"></circle>
            <circle cx="104" cy="28" r="10" fill="#4A3426"></circle>
            <rect x="226" y="58" width="14" height="10" rx="3" fill="#F2C14E"></rect>
            <g class="wheel"><circle cx="62" cy="104" r="22" fill="#13294B" stroke="#ffffff" stroke-width="7"></circle><path d="M62 88v32M46 104h32" stroke="#ffffff" stroke-width="3"></path></g>
            <g class="wheel"><circle cx="190" cy="104" r="22" fill="#13294B" stroke="#ffffff" stroke-width="7"></circle><path d="M190 88v32M174 104h32" stroke="#ffffff" stroke-width="3"></path></g>
            <g class="kyc"><rect x="44" y="-52" width="160" height="40" rx="20" fill="#2D7E3C"></rect><text x="124" y="-26" text-anchor="middle" font-family="Mukta" font-weight="700" font-size="18" fill="#ffffff">✓ KYC-verified driver</text></g>
          </g>
        </g>
      </svg>

      <!-- benefits -->
      <div style="position: absolute; inset: 0; display: flex; flex-wrap: wrap; align-content: center; justify-content: center; gap: 12px; padding: 24px; pointer-events: none">
        <span class="benefit" style="animation-delay: 0s">Fare capped per km</span>
        <span class="benefit" style="animation-delay: .2s; background: #2D7E3C">Less CO₂ per person</span>
        <span class="benefit" style="animation-delay: .4s">Verified co-riders only</span>
        <span class="benefit" style="animation-delay: .6s; background: #C72561">Women-only Pink Ride</span>
        <span class="benefit" style="animation-delay: .8s">Fewer cars on the road</span>
      </div>
    </div>
  </div>
</section>

<!-- MEGA: scroll-driven statement -->
<section class="mega" aria-label="Why share a car">
  <div class="mega-lines" aria-hidden="true">
    <div class="ml ml1">ONE CAR<span style="color: #F2C14E">.</span></div>
    <div class="ml ml2">FOUR VERIFIED</div>
    <div class="ml ml3">ONE FAIR FARE<span style="color: #7FD28F">.</span></div>
  </div>
  <p class="mega-sr">One car, four verified people, one fair fare.</p>
  <div style="max-width: 1280px; margin: 0 auto; padding: 0 clamp(16px, 4vw, 48px); display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; position: relative; z-index: 2">
    <div class="mstat"><span class="mnum">₹2.50–3.80</span><span class="mlab">Fare cap per km, by car type, under MoRTH carpooling guidelines</span></div>
    <div class="mstat"><span class="mnum">~155 kg</span><span class="mlab">CO₂ kept out of the air on one Jammu → Chandigarh sedan trip with 3 co-riders</span></div>
    <div class="mstat"><span class="mnum">100%</span><span class="mlab">of people in the car verified: driver, you and every co-rider</span></div>
  </div>
  <div class="mega-road" aria-hidden="true">
    <div class="mega-lane"></div>
    <div class="mega-car">
      <svg width="150" height="100" viewBox="0 0 68 46"><rect x="4" y="18" width="60" height="22" rx="8" fill="#F2C14E"></rect><path d="M14 18l7-13h26l7 13z" fill="#F2C14E"></path><path d="M20 17l5-9h9v9z M37 17v-9h8l5 9z" fill="#13294B"></path><circle cx="29" cy="12" r="2.6" fill="#BFE3C6"></circle><circle cx="41" cy="12" r="2.6" fill="#FF8FB8"></circle><g class="wheel"><circle cx="18" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M18 35v10M13 40h10" stroke="#ffffff" stroke-width="1.5"></path></g><g class="wheel"><circle cx="50" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M50 35v10M45 40h10" stroke="#ffffff" stroke-width="1.5"></path></g></svg>
    </div>
  </div>
</section>

<!-- APP TOUR: sticky phone, screens change on scroll -->
<section class="tour" id="app-tour" aria-labelledby="tour-h">
  <div class="tour-in">
    <div class="tour-head">
      <span class="tour-kicker">INSIDE THE APP</span>
      <h2 id="tour-h">From search to seat in five taps.</h2>
      <p>Scroll, or tap a step, to see each screen.</p>
    </div>
    <div class="tour-grid">
      <ol class="tour-steps">
        <li class="tstep t1"><button type="button" data-step="1" aria-pressed="true"><span class="tnum">01</span><span class="ttl">Open WayloShare</span><span class="tdesc">Choose to find a ride or post one. Your home screen shows both, plus how it works.</span></button></li>
        <li class="tstep t2"><button type="button" data-step="2" aria-pressed="false"><span class="tnum">02</span><span class="ttl">Set your route</span><span class="tdesc">Jammu to Chandigarh: 367.6 km, about 6 h 50 min. Add popular stops, and the app suggests a fair seat price.</span></button></li>
        <li class="tstep t3"><button type="button" data-step="3" aria-pressed="false"><span class="tnum">03</span><span class="ttl">Pick date and time</span><span class="tdesc">Set when you're leaving. Riders see exact departure times, not vague windows.</span></button></li>
        <li class="tstep t4"><button type="button" data-step="4" aria-pressed="false"><span class="tnum">04</span><span class="ttl">Get verified once</span><span class="tdesc">OTP, ID, and for drivers licence and RC. Only verified people can book or offer seats.</span></button></li>
        <li class="tstep t5"><button type="button" data-step="5" aria-pressed="false"><span class="tnum">05</span><span class="ttl">Book, ride, pay by UPI</span><span class="tdesc">See your verified driver, the car and a fare within the MoRTH cap. Pay in the app.</span></button></li>
      </ol>

      <div class="tour-phone-col">
        <div class="tour-sticky">
          <div class="device tour-device">
            <div class="tscreens">
              <img class="scr s1 on" src="<?= asset('assets/img/screen-home.jpg') ?>" alt="App home screen: Post a ride or find one">
              <img class="scr s2" src="<?= asset('assets/img/screen-post.jpg') ?>" alt="Post a ride: Jammu to Chandigarh, 367.6 km, suggested ₹1,103 per seat">
              <img class="scr s3" src="<?= asset('assets/img/screen-time.jpg') ?>" alt="Choose departure date and time">
              <div class="scr s4 app" role="img" aria-label="Verification screen with all checks complete">
                <div class="a-top"><span class="a-back">←</span><span><b>Verify profile</b><small>Takes about 2 minutes</small></span></div>
                <div class="a-badge"><span>✓</span></div>
                <div class="a-h">You're verified</div>
                <div class="a-card">
                  <div class="a-row"><span class="a-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 2h8a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM11 18h2"></path></svg></span><span>Mobile number<small>OTP confirmed</small></span><b>✓</b></div>
                  <div class="a-row"><span class="a-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18v12H3zM7 10h4M7 14h6M15 10h2v4h-2z"></path></svg></span><span>Government ID<small>Matched</small></span><b>✓</b></div>
                  <div class="a-row"><span class="a-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 16h14v-4l-2-5H7l-2 5zM7 16v2M17 16v2"></path></svg></span><span>Licence + RC<small>Drivers only</small></span><b>✓</b></div>
                </div>
                <div class="a-note">Only verified riders can book a seat with you.</div>
              </div>
              <div class="scr s5 app" role="img" aria-label="Ride booked: Jammu to Chandigarh, verified driver, ₹1,103, pay with UPI">
                <div class="a-top"><span class="a-back">←</span><span><b>Ride booked</b><small>Seat 2 of 3</small></span></div>
                <div class="a-card a-route">
                  <div class="a-stop"><i class="d1"></i><span>Jammu<small>Tue · 7:30 AM</small></span></div>
                  <div class="a-line"></div>
                  <div class="a-stop"><i class="d2"></i><span>Chandigarh<small>≈ 2:20 PM</small></span></div>
                </div>
                <div class="a-card a-driver"><span class="a-av"></span><span>Rakesh K.<small>Sedan · KYC verified</small></span><b class="a-ver">✓</b></div>
                <div class="a-card a-fare"><span>Seat fare<small>Within MoRTH cap</small></span><b>₹1,103</b></div>
                <div class="a-btn">Pay with UPI</div>
              </div>
            </div>
          </div>
          <div class="tour-dots" aria-hidden="true"><i class="d d1"></i><i class="d d2"></i><i class="d d3"></i><i class="d d4"></i><i class="d d5"></i></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- VERIFIED CIRCLE (USP) -->
<section id="verified" style="background: #13294B; color: #ffffff; padding: 120px clamp(16px, 4vw, 48px); position: relative; overflow: hidden">
  <div class="blob" id="vcircle-glow" style="position: absolute; width: 520px; height: 520px; border-radius: 50%; background: #2775BA; opacity: 0.35; filter: blur(120px); -webkit-filter: blur(120px); right: -120px; top: 60px; pointer-events: none" aria-hidden="true"></div>
  <div style="max-width: 1280px; margin: 0 auto; position: relative; display: flex; flex-direction: column; gap: 50px">
    <div style="display: flex; flex-direction: column; gap: 14px; max-width: 900px">
      <span style="font-size: 16px; font-weight: 700; letter-spacing: 1.4px; color: #7FD28F">THE WAYLOSHARE VERIFIED CIRCLE</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(42px, 6vw, 84px); line-height: 0.96; letter-spacing: -2.2px">Nobody gets in the car<br>unless they're verified.</h2>
      <p style="margin: 0; font-size: 20px; line-height: 1.55; color: #C9D6E6; max-width: 640px">Riders are verified. Drivers are verified. You only ever share a car with verified people, and Pink Ride adds women verification on top.</p>
    </div>

    <div style="display: flex; gap: 8px; flex-wrap: wrap">
      <div role="tablist" id="vcircle-tabs" aria-label="Who is being verified" style="display: inline-flex; gap: 8px; flex-wrap: wrap; background: rgba(255,255,255,0.06); padding: 8px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.12)">
        <button type="button" role="tab" data-vrole="rider" class="vtab" aria-selected="true" style="--tc: #2775BA"><span class="vtab-dot"></span>Rider</button>
        <button type="button" role="tab" data-vrole="driver" class="vtab" aria-selected="false" style="--tc: #2D7E3C"><span class="vtab-dot"></span>Driver</button>
        <button type="button" role="tab" data-vrole="pink" class="vtab" aria-selected="false" style="--tc: #E8417A"><span class="vtab-dot"></span>Pink Ride (women)</button>
      </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 36px; align-items: center">
      <!-- scanning ID card -->
      <div style="flex: 1 1 380px; min-width: 0; display: flex; justify-content: center">
        
      <div id="vcard-rider" class="vcard-view">
        <div class="idcard">
          <div class="scan" aria-hidden="true"></div>
          <div style="display: flex; gap: 16px; align-items: center">
            <svg width="84" height="84" viewBox="0 0 84 84" aria-hidden="true"><rect width="84" height="84" rx="20" fill="#E4EEF8"></rect><circle cx="42" cy="34" r="14" fill="#2775BA"></circle><path d="M18 74c0-14 24-14 24-14s24 0 24 14" fill="#2775BA"></path></svg>
            <div style="display: flex; flex-direction: column; gap: 4px"><span style="font-size: 13px; font-weight: 700; letter-spacing: 1px; color: #2775BA">VERIFIED RIDER</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; font-weight: 700">Aarav S.</span><span style="font-size: 15px; color: #52627A">Joined 2026 · 14 rides</span></div>
          </div>
          <div class="check" style="animation-delay: 0.40s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Mobile number</span><span style="font-size: 13px; color: #6B7A8F">OTP</span></div>
          <div class="check" style="animation-delay: 0.75s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Government ID</span><span style="font-size: 13px; color: #6B7A8F">[CONFIRM]</span></div>
          <div class="check" style="animation-delay: 1.10s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Profile photo</span><span style="font-size: 13px; color: #6B7A8F">matched</span></div>
          <div class="check" style="animation-delay: 1.45s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Ready to book</span><span style="font-size: 13px; color: #6B7A8F">verified only</span></div>
          <span class="stamp" style="color: #2775BA; border-color: #2775BA">RIDER VERIFIED</span>
        </div>
      </div>

      <div id="vcard-driver" class="vcard-view" style="display: none">
        <div class="idcard">
          <div class="scan" aria-hidden="true"></div>
          <div style="display: flex; gap: 16px; align-items: center">
            <svg width="84" height="84" viewBox="0 0 84 84" aria-hidden="true"><rect width="84" height="84" rx="20" fill="#E4F1E6"></rect><circle cx="42" cy="34" r="14" fill="#2D7E3C"></circle><path d="M18 74c0-14 24-14 24-14s24 0 24 14" fill="#2D7E3C"></path></svg>
            <div style="display: flex; flex-direction: column; gap: 4px"><span style="font-size: 13px; font-weight: 700; letter-spacing: 1px; color: #2D7E3C">VERIFIED DRIVER</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; font-weight: 700">Rakesh K.</span><span style="font-size: 15px; color: #52627A">Honda City · JK 02</span></div>
          </div>
          <div class="check" style="animation-delay: 0.40s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Mobile number</span><span style="font-size: 13px; color: #6B7A8F">OTP</span></div>
          <div class="check" style="animation-delay: 0.75s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Driving licence</span><span style="font-size: 13px; color: #6B7A8F">checked</span></div>
          <div class="check" style="animation-delay: 1.10s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Vehicle RC</span><span style="font-size: 13px; color: #6B7A8F">checked</span></div>
          <div class="check" style="animation-delay: 1.45s"><span class="tick" style="background: #2D7E3C">✓</span><span style="flex: 1">Government ID</span><span style="font-size: 13px; color: #6B7A8F">[CONFIRM]</span></div>
          <span class="stamp" style="color: #2D7E3C; border-color: #2D7E3C">KYC DONE</span>
        </div>
      </div>

      <div id="vcard-pink" class="vcard-view" style="display: none">
        <div class="idcard" style="border-color: #C72561; box-shadow: 10px 10px 0 #C72561">
          <div class="scan" style="background: #FF8FB8; box-shadow: 0 0 22px #FF8FB8" aria-hidden="true"></div>
          <div style="display: flex; gap: 16px; align-items: center">
            <svg width="84" height="84" viewBox="0 0 84 84" aria-hidden="true"><rect width="84" height="84" rx="20" fill="#FCE4EE"></rect><path d="M24 44c0-26 36-26 36 0v12H24z" fill="#3D0F24"></path><circle cx="42" cy="36" r="14" fill="#A8714F"></circle><path d="M16 84c2-18 50-18 52 0" fill="#E8417A"></path></svg>
            <div style="display: flex; flex-direction: column; gap: 4px"><span style="font-size: 13px; font-weight: 700; letter-spacing: 1px; color: #C72561">PINK RIDE</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; font-weight: 700">Priya M.</span><span style="font-size: 15px; color: #52627A">Women-only rides</span></div>
          </div>
          <div class="check" style="animation-delay: 0.40s"><span class="tick" style="background: #C72561">✓</span><span style="flex: 1">Mobile number</span><span style="font-size: 13px; color: #6B7A8F">OTP</span></div>
          <div class="check" style="animation-delay: 0.75s"><span class="tick" style="background: #C72561">✓</span><span style="flex: 1">Women verification</span><span style="font-size: 13px; color: #6B7A8F">[CONFIRM]</span></div>
          <div class="check" style="animation-delay: 1.10s"><span class="tick" style="background: #C72561">✓</span><span style="flex: 1">Woman driver</span><span style="font-size: 13px; color: #6B7A8F">verified</span></div>
          <div class="check" style="animation-delay: 1.45s"><span class="tick" style="background: #C72561">✓</span><span style="flex: 1">Women co-riders</span><span style="font-size: 13px; color: #6B7A8F">verified</span></div>
          <span class="stamp" style="color: #C72561; border-color: #C72561">WOMEN VERIFIED</span>
        </div>
      </div>
      </div>

      <!-- the verified car -->
      <div class="vcar" style="flex: 1 1 400px; min-width: 0; display: flex; flex-direction: column; gap: 22px; align-items: center">
        <div style="position: relative; width: 300px; height: 420px" role="img" aria-label="Top view of a car where every seat shows a verified badge"><svg width="300" height="420" viewBox="0 0 300 420" aria-hidden="true" style="position: absolute; inset: 0">
          <rect x="40" y="10" width="220" height="400" rx="80" fill="#1D3A63" stroke="rgba(255,255,255,0.3)" stroke-width="3"></rect>
          <rect x="66" y="46" width="168" height="66" rx="22" fill="#9CC8F0" opacity=".85"></rect>
          <rect x="66" y="330" width="168" height="50" rx="20" fill="#9CC8F0" opacity=".6"></rect>
          <rect x="70" y="140" width="76" height="76" rx="20" class="vcar-seat" fill="#2775BA"></rect>
          <g class="badge" style="animation-delay: 0.15s"><circle cx="140" cy="146" r="15" fill="#7FD28F" stroke="#13294B" stroke-width="3"></circle><path d="M134 146 l4 4 l8 -8" fill="none" stroke="#13294B" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path></g>
          <rect x="154" y="140" width="76" height="76" rx="20" class="vcar-seat" fill="#2775BA"></rect>
          <g class="badge" style="animation-delay: 0.40s"><circle cx="224" cy="146" r="15" fill="#7FD28F" stroke="#13294B" stroke-width="3"></circle><path d="M218 146 l4 4 l8 -8" fill="none" stroke="#13294B" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path></g>
          <rect x="70" y="236" width="76" height="76" rx="20" class="vcar-seat" fill="#2775BA"></rect>
          <g class="badge" style="animation-delay: 0.65s"><circle cx="140" cy="242" r="15" fill="#7FD28F" stroke="#13294B" stroke-width="3"></circle><path d="M134 242 l4 4 l8 -8" fill="none" stroke="#13294B" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path></g>
          <rect x="154" y="236" width="76" height="76" rx="20" class="vcar-seat" fill="#2775BA"></rect>
          <g class="badge" style="animation-delay: 0.90s"><circle cx="224" cy="242" r="15" fill="#7FD28F" stroke="#13294B" stroke-width="3"></circle><path d="M218 242 l4 4 l8 -8" fill="none" stroke="#13294B" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path></g>
        </svg><span style="position: absolute; left: 70px; top: 158px; width: 76px; text-align: center; font: 700 14px 'Mukta', sans-serif; color: #ffffff; line-height: 1.2" id="vseat-1">Driver</span><span style="position: absolute; left: 154px; top: 158px; width: 76px; text-align: center; font: 700 14px 'Mukta', sans-serif; color: #ffffff; line-height: 1.2" id="vseat-2">You</span><span style="position: absolute; left: 70px; top: 254px; width: 76px; text-align: center; font: 700 14px 'Mukta', sans-serif; color: #ffffff; line-height: 1.2" id="vseat-3">Co-rider</span><span style="position: absolute; left: 154px; top: 254px; width: 76px; text-align: center; font: 700 14px 'Mukta', sans-serif; color: #ffffff; line-height: 1.2" id="vseat-4">Co-rider</span></div>
      </div>
    </div>

    <span style="font-size: 13px; color: #9CA9BC">Card details never stored beyond the last 4 digits. Data encrypted in transit; delete on request. [CONFIRM exact ID and women-verification methods]</span>
  </div>
</section>

<!-- SIGNATURE: MoRTH FARE + CO2 CALCULATOR -->
<section id="fare" style="background: #FBF7EE; padding: 120px clamp(16px, 4vw, 48px); position: relative; overflow: hidden">
  <svg width="100%" height="100%" style="position: absolute; inset: 0; opacity: 0.5" aria-hidden="true"><defs><pattern id="paper" width="6" height="6" patternUnits="userSpaceOnUse"><circle cx="1" cy="1" r="0.6" fill="#E3DCCB"></circle></pattern></defs><rect width="100%" height="100%" fill="url(#paper)"></rect></svg>
  <div style="max-width: 1280px; margin: 0 auto; position: relative; display: flex; flex-direction: column; gap: 50px">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap">
      <div style="display: flex; flex-direction: column; gap: 10px; max-width: 800px">
        <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(40px, 5.6vw, 76px); line-height: 0.98; letter-spacing: -2px">Fair fares, by law.<br>Cleaner air, by sharing.</h2>
      </div>
      <p style="margin: 0; font-size: 19px; line-height: 1.55; max-width: 430px; color: #34465F">Drivers on WayloShare share costs and don't make a profit. Seat prices are capped per kilometre under MoRTH carpooling guidelines.</p>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 40px; align-items: stretch">
      <!-- live kilometre stone -->
      <div style="flex: 1 1 300px; min-width: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 18px; position: relative">
        <div class="wobble" style="position: relative; width: 280px; height: 380px" role="img" aria-label="Kilometre stone: {{destEn}}, {{km}} km">
          <svg width="280" height="380" viewBox="0 0 280 380" aria-hidden="true" style="position: absolute; inset: 0">
            <ellipse cx="140" cy="366" rx="130" ry="12" fill="#D9CFB8"></ellipse>
            <path d="M30 360 V150 A110 110 0 0 1 250 150 V360 Z" fill="#ffffff" stroke="#13294B" stroke-width="5"></path>
            <path d="M30 150 A110 110 0 0 1 250 150 Z" fill="#F2C14E" stroke="#13294B" stroke-width="5"></path>
            <path d="M30 360 H250" stroke="#13294B" stroke-width="5"></path>
          </svg>
          <div aria-hidden="true" style="position: absolute; left: 34px; right: 34px; top: 96px; text-align: center; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 30px; line-height: 1; color: #13294B" id="mstone-nh">NH 44</div>
          <div aria-hidden="true" style="position: absolute; left: 34px; right: 34px; top: 168px; display: flex; flex-direction: column; align-items: center; gap: 6px; text-align: center; color: #13294B">
            <span style="font-family: 'Mukta', sans-serif; font-weight: 700; font-size: 32px; line-height: 1.1" id="mstone-hi">चंडीगढ़</span>
            <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 24px; letter-spacing: 1px; line-height: 1" id="mstone-en">CHANDIGARH</span>
          </div>
          <div aria-hidden="true" style="position: absolute; left: 34px; right: 34px; top: 272px; text-align: center; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 58px; line-height: 1; color: #2D7E3C" id="mstone-km">368</div>
        </div>
      </div>

      <!-- calculator -->
      <div style="flex: 999 1 640px; min-width: 0; background: #ffffff; border: 2px solid #E3DCCB; border-radius: 30px; padding: clamp(22px, 3vw, 36px); display: flex; flex-direction: column; gap: 24px; box-shadow: 0 24px 60px rgba(19,41,75,0.12)">
        <div style="display: flex; flex-direction: column; gap: 10px">
          <span style="font-size: 15px; font-weight: 700; letter-spacing: 1px; color: #52627A">1 · PICK A ROUTE OR SET THE DISTANCE</span>
          <div style="display: flex; gap: 8px; flex-wrap: wrap">
            
            <div id="calc-routes" style="display: flex; gap: 6px; flex-wrap: wrap">
              <button type="button" class="pill" data-idx="0" aria-pressed="true">Jammu → Chandigarh</button>
              <button type="button" class="pill" data-idx="1" aria-pressed="false">Delhi → Jaipur</button>
              <button type="button" class="pill" data-idx="2" aria-pressed="false">Jammu → Srinagar</button>
              <button type="button" class="pill" data-idx="3" aria-pressed="false">Mumbai → Pune</button>
              <button type="button" class="pill" data-idx="4" aria-pressed="false">Bengaluru → Mysuru</button>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap; margin-top: 4px">
            <button type="button" class="step" aria-label="Minus 25 km" id="calc-km-down">−</button>
            <label for="kmr" style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">Distance in kilometres</label>
            <input id="kmr" type="range" min="20" max="1200" step="10" value="368" id="calc-km-slider" onChange="{{kmInput}}" style="flex: 1 1 200px; min-width: 0; accent-color: #2775BA; height: 28px">
            <button type="button" class="step" aria-label="Plus 25 km" id="calc-km-up">+</button>
            <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 26px; min-width: 110px; text-align: right">{{km}} km</span>
          </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px">
          <span style="font-size: 15px; font-weight: 700; letter-spacing: 1px; color: #52627A">2 · CAR TYPE · MoRTH CAP PER SEAT PER KM</span>
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 10px">
            
            <div id="calc-cars" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px">
              <button type="button" class="cartype" data-car="hatch" aria-pressed="false"><span style="font-size: 16px; font-weight: 700">Hatchback</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 20px; font-weight: 700">₹2.50<small style="font-size: 13px; font-weight: 500"> / km</small></span><span style="font-size: 13px; color: #52627A">Up to 3 co-riders</span></button>
              <button type="button" class="cartype" data-car="sedan" aria-pressed="true"><span style="font-size: 16px; font-weight: 700">Sedan</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 20px; font-weight: 700">₹3.20<small style="font-size: 13px; font-weight: 500"> / km</small></span><span style="font-size: 13px; color: #52627A">Up to 3 co-riders</span></button>
              <button type="button" class="cartype" data-car="suv" aria-pressed="false"><span style="font-size: 16px; font-weight: 700">Compact SUV (5)</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 20px; font-weight: 700">₹3.50<small style="font-size: 13px; font-weight: 500"> / km</small></span><span style="font-size: 13px; color: #52627A">Up to 4 co-riders</span></button>
              <button type="button" class="cartype" data-car="muv" aria-pressed="false"><span style="font-size: 16px; font-weight: 700">MUV (7-seater)</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 20px; font-weight: 700">₹3.80<small style="font-size: 13px; font-weight: 500"> / km</small></span><span style="font-size: 13px; color: #52627A">Up to 6 co-riders</span></button>
            </div>
          </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px">
          <span style="font-size: 15px; font-weight: 700; letter-spacing: 1px; color: #52627A">3 · CO-RIDERS IN THE CAR</span>
          <div style="display: flex; gap: 8px; flex-wrap: wrap" role="group" aria-label="Co-riders">
            
            <div id="calc-riders" style="display: flex; gap: 8px">
              <button type="button" class="seatbtn" data-seats="1" aria-pressed="false">1</button>
              <button type="button" class="seatbtn" data-seats="2" aria-pressed="false">2</button>
              <button type="button" class="seatbtn" data-seats="3" aria-pressed="true">3</button>
            </div>
          </div>
        </div>

        <!-- results -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; padding-top: 22px; border-top: 3px dashed #E3DCCB">
          <div style="background: #13294B; color: #ffffff; border-radius: 20px; padding: 18px 20px; display: flex; flex-direction: column; gap: 2px">
            <span style="font-size: 14px; color: #9CC8F0; font-weight: 700">MAX FARE PER SEAT</span>
            <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 44px; line-height: 1.05">₹<span id="calc-seat-fare">1,103</span></span>
            <span style="font-size: 14px; color: #C9D6E6">{{km}} km × ₹<span id="calc-rate-txt">3.20</span></span>
          </div>
          <div style="background: #E4EEF8; border-radius: 20px; padding: 18px 20px; display: flex; flex-direction: column; gap: 2px">
            <span style="font-size: 14px; color: #1B5A93; font-weight: 700">DRIVER'S COST SHARED</span>
            <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 44px; line-height: 1.05">₹<span id="calc-recovered">3,309</span></span>
            <span style="font-size: 14px; color: #45566E">{{riders}} seat(s), cost recovery only</span>
          </div>
          <div style="background: #2D7E3C; color: #ffffff; border-radius: 20px; padding: 18px 20px; display: flex; flex-direction: column; gap: 2px; position: relative">
            <span style="font-size: 14px; color: #D6EAD9; font-weight: 700">CO₂ KEPT OUT OF THE AIR</span>
            <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 44px; line-height: 1.05"><span id="calc-co2-saved">155</span> kg</span>
            <span style="font-size: 14px; color: #E4F1E6">≈ what {{trees}} trees absorb in a year</span>
          </div>
        </div>
        <div style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap">
          <span style="font-size: 16px; color: #34465F; flex: 1 1 300px">Per person, this trip emits about <b>{{co2Each}} kg CO₂</b> instead of {{co2Solo}} kg driving alone.</span>
        </div>
        <span style="font-size: 13px; color: #6B7A8F; line-height: 1.5">Estimates. Fare caps per seat per km for the car type, as set for WayloShare under MoRTH carpooling guidelines. CO₂ assumes petrol cars at 130–190 g/km by type and 21 kg absorbed per tree per year. [CONFIRM emission factors and legal wording]</span>
      </div>
    </div>
  </div>
</section>

<!-- PINK RIDE BAND -->
<section style="background: #FCE4EE; padding: 100px clamp(16px, 4vw, 48px); position: relative; overflow: hidden">
  <div class="blob" style="position: absolute; width: 500px; height: 500px; border-radius: 50%; background: #E8417A; opacity: 0.25; filter: blur(100px); right: 5%; top: -100px" aria-hidden="true"></div>
  <div style="max-width: 1280px; margin: 0 auto; position: relative; display: flex; flex-wrap: wrap; gap: 48px; align-items: center">
    <div style="flex: 999 1 520px; min-width: 0; display: flex; flex-direction: column; gap: 22px">
      <span style="align-self: flex-start; background: #E8417A; color: #ffffff; font-weight: 700; font-size: 15px; padding: 7px 14px; border-radius: 999px; letter-spacing: .4px">PINK RIDE · WOMEN ONLY</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(38px, 5vw, 68px); line-height: 1; letter-spacing: -1.6px; color: #7A1840">Her ride. Her rules.</h2>
      <p style="margin: 0; font-size: 20px; line-height: 1.55; color: #5C2340; max-width: 560px">A separate space inside WayloShare where every driver and co-passenger is a verified woman. Commute to work, travel home for the festival, or head out for a weekend — together.</p>
      <div style="display: flex; gap: 14px; flex-wrap: wrap">
        <a href="<?= url('/pink-ride') ?>" style="background: #C72561; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 18px; padding: 16px 26px; border-radius: 16px">Discover Pink Ride</a>
        <a href="<?= url('/download') ?>" style="background: #ffffff; color: #7A1840; text-decoration: none; font-weight: 700; font-size: 18px; padding: 16px 26px; border-radius: 16px; border: 2px solid #F4B6CC">Get the app</a>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section style="padding: 110px clamp(16px, 4vw, 48px)">
  <div style="max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 28px">
    <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(34px, 4.4vw, 56px); line-height: 1.02; letter-spacing: -1.4px; text-align: center">Questions, answered</h2>
    <details class="glass-light" style="border-radius: 20px; padding: 22px 26px" open>
      <summary style="display: flex; justify-content: space-between; align-items: center; gap: 16px; font-size: 21px; font-weight: 700">Is WayloShare a taxi service?<span class="chev" style="transition: transform .25s; font-size: 28px; color: #2775BA">+</span></summary>
      <p style="margin: 12px 0 0; font-size: 18px; line-height: 1.55; color: #45566E">No. Drivers are people already making the trip who share empty seats and split travel costs with passengers.</p>
    </details>
    <details class="glass-light" style="border-radius: 20px; padding: 22px 26px">
      <summary style="display: flex; justify-content: space-between; align-items: center; gap: 16px; font-size: 21px; font-weight: 700">How is the seat price decided?<span class="chev" style="transition: transform .25s; font-size: 28px; color: #2775BA">+</span></summary>
      <p style="margin: 12px 0 0; font-size: 18px; line-height: 1.55; color: #45566E">Fares are capped per kilometre by car type under MoRTH carpooling guidelines. Drivers only recover costs; they don’t make a profit.</p>
    </details>
    <details class="glass-light" style="border-radius: 20px; padding: 22px 26px">
      <summary style="display: flex; justify-content: space-between; align-items: center; gap: 16px; font-size: 21px; font-weight: 700">Who can use Pink Ride?<span class="chev" style="transition: transform .25s; font-size: 28px; color: #2775BA">+</span></summary>
      <p style="margin: 12px 0 0; font-size: 18px; line-height: 1.55; color: #45566E">Pink Ride is for women only — both the driver and every co-passenger.</p>
    </details>
    <details class="glass-light" style="border-radius: 20px; padding: 22px 26px">
      <summary style="display: flex; justify-content: space-between; align-items: center; gap: 16px; font-size: 21px; font-weight: 700">Is it on iPhone and Android?<span class="chev" style="transition: transform .25s; font-size: 28px; color: #2775BA">+</span></summary>
      <p style="margin: 12px 0 0; font-size: 18px; line-height: 1.55; color: #45566E">Yes — on the App Store and Google Play. <a href="<?= url('/download') ?>">Get the app</a>.</p>
    </details>
  </div>
</section>

<!-- DOWNLOAD CTA -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 120px">
  <div style="max-width: 1280px; margin: 0 auto; background: #2775BA; color: #ffffff; border-radius: 36px; padding: clamp(36px, 5vw, 72px); display: flex; flex-wrap: wrap; gap: 40px; align-items: center; justify-content: space-between; position: relative; overflow: hidden">
    <div class="blob" style="position: absolute; width: 420px; height: 420px; border-radius: 50%; background: #2D7E3C; opacity: 0.5; filter: blur(90px); right: -80px; bottom: -160px" aria-hidden="true"></div>
    <div style="position: relative; flex: 999 1 460px; min-width: 0; display: flex; flex-direction: column; gap: 18px">
      <span style="align-self: flex-start; background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.35); color: #F2C14E; font-weight: 800; font-size: 14px; padding: 6px 14px; border-radius: 999px; letter-spacing: 1.8px; font-family: 'Familjen Grotesk', sans-serif">WHY GO SOLO?</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(38px, 5vw, 68px); line-height: 1; letter-spacing: -1.6px">Your next trip is already going your way.</h2>
      <div style="display: flex; gap: 12px; flex-wrap: wrap">
        <a href="<?= e($cfg['app_store']) ?>" target="_blank" rel="noopener" style="display: flex; align-items: center; gap: 12px; background: #13294B; color: #ffffff; text-decoration: none; padding: 12px 22px; border-radius: 14px; border: 2px solid #ffffff"><svg width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="6" y="2" width="12" height="20" rx="3"></rect><path d="M11 18h2"></path></svg><span style="display: flex; flex-direction: column; line-height: 1.1"><span style="font-size: 12px; color: #C9D6E6">Download on the</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 22px; font-weight: 600">App Store</span></span></a>
        <a href="https://play.google.com/store/apps/details?id=com.waylo.share" style="display: flex; align-items: center; gap: 12px; background: #13294B; color: #ffffff; text-decoration: none; padding: 12px 22px; border-radius: 14px; border: 2px solid #ffffff"><svg width="24" height="26" viewBox="0 0 28 30" aria-hidden="true"><path d="M2 2l14 13L2 28z" fill="#7FD28F"></path><path d="M2 2l19 10-5 3z" fill="#9CC8F0"></path><path d="M2 28l19-10-5-3z" fill="#F2C14E"></path><path d="M21 12l5 3-5 3-5-3z" fill="#F08A7E"></path></svg><span style="display: flex; flex-direction: column; line-height: 1.1"><span style="font-size: 12px; color: #C9D6E6">Get it on</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 22px; font-weight: 600">Google Play</span></span></a>
      </div>
    </div>
    <div class="glass" style="position: relative; border-radius: 26px; padding: 18px; display: flex; flex-direction: column; align-items: center; gap: 10px">
      <img src="<?= asset('assets/img/qr.png') ?>" alt="QR code to download WayloShare" style="width: 170px; height: 170px; border-radius: 14px; background: #ffffff">
      <span style="font-size: 15px; font-weight: 600">Scan to download</span>
    </div>
  </div>
</section>

<!-- STICKY DOWNLOAD BAR -->


</div>

<!-- Desktop Glass Modal for App Download -->
<div id="desktop-modal" style="display: none; position: fixed; inset: 0; z-index: 100; background: rgba(15,33,56,0.55); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); align-items: center; justify-content: center; padding: 16px">
  <div role="dialog" aria-modal="true" aria-labelledby="modal-title" class="glass-light rise" style="border-radius: 32px; padding: clamp(24px, 4vw, 44px); max-width: 540px; width: 100%; display: flex; flex-direction: column; gap: 20px; position: relative; box-shadow: 0 30px 80px rgba(8,30,60,0.35)">
    <button type="button" aria-label="Close dialog" id="modal-close-btn" style="position: absolute; right: 20px; top: 20px; width: 44px; height: 44px; border: 0; border-radius: 50%; background: rgba(19,41,75,0.08); color: #13294B; cursor: pointer; display: flex; align-items: center; justify-content: center">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"></path></svg>
    </button>
    <span style="align-self: flex-start; background: #E3F2E6; color: #1F6B32; font-weight: 700; font-size: 14px; padding: 6px 12px; border-radius: 999px">Your search is ready</span>
    <h2 id="modal-title" style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 34px; line-height: 1.05">Open it in the WayloShare app</h2>
    <p style="margin: 0; font-size: 17px; line-height: 1.5; color: #45566E">Booking happens in the app. On your phone we open the right store automatically, and after install your search is waiting.</p>
    <div style="display: flex; gap: 12px; flex-wrap: wrap">
      <a href="<?= e($cfg['app_store']) ?>" target="_blank" rel="noopener" id="modal-app-link" style="flex: 1 1 180px; display: flex; align-items: center; justify-content: center; gap: 10px; background: #13294B; color: #ffffff; text-decoration: none; padding: 14px; border-radius: 14px; font-weight: 700">
        <svg width="20" height="22" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="6" y="2" width="12" height="20" rx="3"></rect><path d="M11 18h2"></path></svg>
        App Store
      </a>
      <a href="<?= e($cfg['play_store']) ?>" target="_blank" rel="noopener" style="flex: 1 1 180px; display: flex; align-items: center; justify-content: center; gap: 10px; background: #2D7E3C; color: #ffffff; text-decoration: none; padding: 14px; border-radius: 14px; font-weight: 700">
        <svg width="20" height="22" viewBox="0 0 28 30" aria-hidden="true"><path d="M2 2l14 13L2 28z" fill="#7FD28F"></path><path d="M2 2l19 10-5 3z" fill="#9CC8F0"></path><path d="M2 28l19-10-5-3z" fill="#F2C14E"></path><path d="M21 12l5 3-5 3-5-3z" fill="#F08A7E"></path></svg>
        Google Play
      </a>
    </div>
    <div style="display: flex; align-items: center; gap: 16px; border-top: 1px solid rgba(19,41,75,0.1); padding-top: 16px">
      <img src="<?= asset('assets/img/qr.png') ?>" alt="QR code" width="70" height="70" style="width: 70px; height: 70px; border-radius: 10px; background: #ffffff; padding: 4px">
      <span style="font-size: 15px; color: #52627A">Scan with your phone camera to open your search in the app.</span>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/includes/sticky-bar.php';
require_once __DIR__ . '/includes/footer.php';
?>
