/**
 * WayloShare Home Page JavaScript (home.js)
 * Implements hero tabs & search modal, MoRTH fare/CO2 calculator, verified circle, and app tour.
 */
(function () {
  'use strict';

  function formatInr(num) {
    num = Math.round(num);
    return num.toLocaleString('en-IN');
  }

  // =========================================================================
  // 1. HERO TABS & SEARCH FORM / MODAL
  // =========================================================================
  const heroTabs = document.querySelectorAll('#hero-tabs button');
  const heroMode = document.getElementById('hero-mode');
  const heroSubmitBtn = document.getElementById('hero-submit-btn');
  const heroSubmitText = document.getElementById('hero-submit-text');
  const heroSeatLabel = document.getElementById('hero-seat-label');
  const heroPinkNote = document.getElementById('hero-pink-note');
  const heroSearchForm = document.getElementById('hero-search-form');

  const desktopModal = document.getElementById('desktop-modal');
  const modalCloseBtn = document.getElementById('modal-close-btn');
  const modalAppLink = document.getElementById('modal-app-link');

  const TAB_SETTINGS = {
    find:  { label: 'Search rides',   color: '#13294B', seatLabel: 'Seats',      pink: false },
    offer: { label: 'Post your ride', color: '#2D7E3C', seatLabel: 'Seats free', pink: false },
    pink:  { label: 'Search rides',   color: '#C72561', seatLabel: 'Seats',      pink: true }
  };

  function selectHeroTab(tabId) {
    const s = TAB_SETTINGS[tabId] || TAB_SETTINGS.find;
    if (heroMode) heroMode.value = tabId;

    heroTabs.forEach(function (btn) {
      const isCur = (btn.getAttribute('data-tab') === tabId);
      btn.setAttribute('aria-selected', isCur ? 'true' : 'false');
      btn.style.background = isCur ? '#ffffff' : 'transparent';
      btn.style.color = isCur ? s.color : '#ffffff';
      btn.style.fontWeight = isCur ? '700' : '600';
    });

    if (heroSubmitBtn) heroSubmitBtn.style.background = s.color;
    if (heroSubmitText) heroSubmitText.textContent = s.label;
    if (heroSeatLabel) heroSeatLabel.textContent = s.seatLabel;
    if (heroPinkNote) heroPinkNote.style.display = s.pink ? 'flex' : 'none';
  }

  heroTabs.forEach(function (btn) {
    btn.addEventListener('click', function () {
      selectHeroTab(btn.getAttribute('data-tab'));
    });
  });

  function openDesktopModal() {
    if (!desktopModal) return;
    // Build query params
    const formData = new FormData(heroSearchForm);
    const params = new URLSearchParams(formData);
    if (modalAppLink) {
      modalAppLink.href = '/get?' + params.toString();
    }
    desktopModal.style.display = 'flex';
  }

  function closeDesktopModal() {
    if (desktopModal) desktopModal.style.display = 'none';
  }

  if (heroSearchForm) {
    heroSearchForm.addEventListener('submit', function (e) {
      const isPhone = window.innerWidth <= 640 || /Android|iPhone|iPod|Mobile/i.test(navigator.userAgent);
      if (!isPhone) {
        e.preventDefault();
        openDesktopModal();
      }
    });
  }

  if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeDesktopModal);
  if (desktopModal) {
    desktopModal.addEventListener('click', function (e) {
      if (e.target === desktopModal) closeDesktopModal();
    });
  }
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && desktopModal && desktopModal.style.display === 'flex') {
      closeDesktopModal();
    }
  });


  // =========================================================================
  // 2. MoRTH FARE & CO2 CALCULATOR (#fare)
  // =========================================================================
  const ROUTES = [
    { label: 'Jammu → Chandigarh', km: 368, en: 'CHANDIGARH', hi: 'चंडीगढ़', nh: 'NH 44' },
    { label: 'Delhi → Jaipur',       km: 280, en: 'JAIPUR',      hi: 'जयपुर',   nh: 'NH 48' },
    { label: 'Jammu → Srinagar',     km: 250, en: 'SRINAGAR',    hi: 'श्रीनगर', nh: 'NH 44' },
    { label: 'Mumbai → Pune',        km: 150, en: 'PUNE',        hi: 'पुणे',    nh: 'NH 48' },
    { label: 'Bengaluru → Mysuru',   km: 145, en: 'MYSURU',      hi: 'मैसूरु',  nh: 'NH 275' }
  ];

  const CARS = [
    { id: 'hatch', label: 'Hatchback',        rate: 2.50, seats: 3, co2: 0.13 },
    { id: 'sedan', label: 'Sedan',            rate: 3.20, seats: 3, co2: 0.15 },
    { id: 'suv',   label: 'Compact SUV (5)',  rate: 3.50, seats: 4, co2: 0.17 },
    { id: 'muv',   label: 'MUV (7-seater)',   rate: 3.80, seats: 6, co2: 0.19 }
  ];

  const NOTES = {
    1: 'tolls sorted.',
    2: 'now it’s a road trip.',
    3: 'full car, full playlist.',
    4: 'gang’s all here.',
    5: 'family trip energy.',
    6: 'basically a bus, but better.'
  };

  let calcState = {
    routeIdx: 0,
    km: 368,
    carId: 'sedan',
    riders: 3
  };

  const mstoneEn   = document.getElementById('mstone-en');
  const mstoneKm   = document.getElementById('mstone-km');
  const mstoneNh   = document.getElementById('mstone-nh');
  const mstoneHi   = document.getElementById('mstone-hi');

  const kmSlider   = document.getElementById('calc-km-slider');
  const kmDownBtn  = document.getElementById('calc-km-down');
  const kmUpBtn    = document.getElementById('calc-km-up');

  const seatFareEl = document.getElementById('calc-seat-fare');
  const rateTxtEl  = document.getElementById('calc-rate-txt');
  const recoveredEl= document.getElementById('calc-recovered');
  const ridersNumEl= document.getElementById('calc-riders-num');
  const co2SavedEl = document.getElementById('calc-co2-saved');
  const treesEl    = document.getElementById('calc-trees');
  const co2EachEl  = document.getElementById('calc-co2-each');
  const co2SoloEl  = document.getElementById('calc-co2-solo');
  const noteEl     = document.getElementById('calc-note');

  const routePills = document.querySelectorAll('#calc-routes .pill');
  const carButtons = document.querySelectorAll('#calc-cars .cartype');
  const ridersWrap = document.getElementById('calc-riders');

  function renderCalculator() {
    const car = CARS.find(c => c.id === calcState.carId) || CARS[1];
    calcState.riders = Math.min(calcState.riders, car.seats);

    const km = calcState.km;
    const riders = calcState.riders;
    const seatFare = Math.round(km * car.rate);
    const recovered = seatFare * riders;
    const tripCo2 = km * car.co2;
    const saved = riders * km * 0.14;
    const trees = Math.max(1, Math.round(saved / 21));

    // Update Milestone Stone
    if (calcState.routeIdx >= 0 && ROUTES[calcState.routeIdx]) {
      const rt = ROUTES[calcState.routeIdx];
      if (mstoneEn) mstoneEn.textContent = rt.en;
      if (mstoneHi) mstoneHi.textContent = rt.hi;
      if (mstoneNh) mstoneNh.textContent = rt.nh;
    } else {
      if (mstoneEn) mstoneEn.textContent = 'YOUR ROUTE';
      if (mstoneHi) mstoneHi.textContent = 'आपका रूट';
      if (mstoneNh) mstoneNh.textContent = 'NH';
    }
    if (mstoneKm) mstoneKm.textContent = km;
    if (kmSlider) kmSlider.value = km;

    // Update Live Calculation Displays
    if (seatFareEl)  seatFareEl.textContent  = formatInr(seatFare);
    if (rateTxtEl)   rateTxtEl.textContent   = car.rate.toFixed(2);
    if (recoveredEl) recoveredEl.textContent = formatInr(recovered);
    if (ridersNumEl) ridersNumEl.textContent = riders;
    if (co2SavedEl)  co2SavedEl.textContent  = formatInr(Math.round(saved));
    if (treesEl)     treesEl.textContent     = trees;
    if (co2EachEl)   co2EachEl.textContent   = (tripCo2 / (riders + 1)).toFixed(1);
    if (co2SoloEl)   co2SoloEl.textContent   = tripCo2.toFixed(1);
    if (noteEl)      noteEl.textContent      = NOTES[riders] || NOTES[1];

    // Update Route Pills
    routePills.forEach(function (pill) {
      const idx = Number(pill.getAttribute('data-idx'));
      pill.setAttribute('aria-pressed', idx === calcState.routeIdx ? 'true' : 'false');
    });

    // Update Car Type Buttons
    carButtons.forEach(function (btn) {
      const id = btn.getAttribute('data-car');
      btn.setAttribute('aria-pressed', id === car.id ? 'true' : 'false');
    });

    // Render Co-Rider Buttons dynamically based on car.seats
    if (ridersWrap) {
      ridersWrap.innerHTML = '';
      for (let n = 1; n <= car.seats; n++) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'seatbtn';
        btn.setAttribute('data-seats', n);
        btn.setAttribute('aria-pressed', n === riders ? 'true' : 'false');
        btn.textContent = n;
        btn.addEventListener('click', function () {
          calcState.riders = n;
          renderCalculator();
        });
        ridersWrap.appendChild(btn);
      }
    }
  }

  function setKm(val) {
    calcState.km = Math.max(20, Math.min(1200, Math.round(val)));
    calcState.routeIdx = -1; // user set custom distance
    renderCalculator();
  }

  routePills.forEach(function (pill) {
    pill.addEventListener('click', function () {
      const idx = Number(pill.getAttribute('data-idx'));
      if (ROUTES[idx]) {
        calcState.routeIdx = idx;
        calcState.km = ROUTES[idx].km;
        renderCalculator();
      }
    });
  });

  carButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      calcState.carId = btn.getAttribute('data-car');
      renderCalculator();
    });
  });

  if (kmSlider) {
    kmSlider.addEventListener('input', function () {
      setKm(Number(kmSlider.value));
    });
  }
  if (kmDownBtn) {
    kmDownBtn.addEventListener('click', function () {
      setKm(calcState.km - 25);
    });
  }
  if (kmUpBtn) {
    kmUpBtn.addEventListener('click', function () {
      setKm(calcState.km + 25);
    });
  }

  renderCalculator();


  // =========================================================================
  // 3. VERIFIED CIRCLE (#verified)
  // =========================================================================
  const vtabs = document.querySelectorAll('#vcircle-tabs .vtab');
  const vcardRider = document.getElementById('vcard-rider');
  const vcardDriver = document.getElementById('vcard-driver');
  const vcardPink = document.getElementById('vcard-pink');

  const seatLabels = [
    document.getElementById('vseat-1'),
    document.getElementById('vseat-2'),
    document.getElementById('vseat-3'),
    document.getElementById('vseat-4')
  ];
  const seatRects = document.querySelectorAll('.vcar-seat');

  const VROLE_CONFIG = {
    rider:  { color: '#2775BA', seats: ['Driver', 'You', 'Co-rider', 'Co-rider'] },
    driver: { color: '#2D7E3C', seats: ['You', 'Rider', 'Rider', 'Rider'] },
    pink:   { color: '#C72561', seats: ['Driver ♀', 'You ♀', 'Rider ♀', 'Rider ♀'] }
  };

  function selectVRole(role) {
    const cfg = VROLE_CONFIG[role] || VROLE_CONFIG.rider;

    vtabs.forEach(function (btn) {
      btn.setAttribute('aria-selected', (btn.getAttribute('data-vrole') === role) ? 'true' : 'false');
    });

    if (vcardRider)  vcardRider.style.display  = (role === 'rider') ? 'block' : 'none';
    if (vcardDriver) vcardDriver.style.display = (role === 'driver') ? 'block' : 'none';
    if (vcardPink)   vcardPink.style.display   = (role === 'pink') ? 'block' : 'none';

    // Update car seats
    seatRects.forEach(function (rect) {
      rect.setAttribute('fill', cfg.color);
    });
    seatLabels.forEach(function (el, idx) {
      if (el && cfg.seats[idx]) el.textContent = cfg.seats[idx];
    });
  }

  vtabs.forEach(function (btn) {
    btn.addEventListener('click', function () {
      selectVRole(btn.getAttribute('data-vrole'));
    });
  });


  // =========================================================================
  // 4. APP TOUR (#app-tour)
  // =========================================================================
  const tourSteps = document.querySelectorAll('.tour-steps .tstep button');
  const tourScreens = document.querySelectorAll('.tscreens .scr');

  function setTourStep(stepNum) {
    tourSteps.forEach(function (btn) {
      const match = (Number(btn.getAttribute('data-step')) === stepNum);
      btn.setAttribute('aria-pressed', match ? 'true' : 'false');
    });

    tourScreens.forEach(function (scr, idx) {
      if (idx === (stepNum - 1)) {
        scr.classList.add('on');
      } else {
        scr.classList.remove('on');
      }
    });
  }

  tourSteps.forEach(function (btn) {
    btn.addEventListener('click', function () {
      setTourStep(Number(btn.getAttribute('data-step')));
    });
  });

  // IntersectionObserver fallback for browsers without scroll-timeline
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          const stepBtn = entry.target.querySelector('button');
          if (stepBtn) {
            setTourStep(Number(stepBtn.getAttribute('data-step')));
          }
        }
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('.tour-steps .tstep').forEach(function (li) {
      observer.observe(li);
    });
  }
})();

