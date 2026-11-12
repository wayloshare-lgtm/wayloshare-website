<?php
/**
 * WayloShare Blog Posts Data
 * Educational, App Promotional, and Technical Articles
 */

$posts = [
    [
        'slug'        => "two-way-verification-explained",
        'title'       => "Two-Way Verification Explained: Why Both Driver and Rider Must Complete KYC",
        'excerpt'     => "How WayloShare closes the dangerous verification gap on Indian highways using DigiLocker, Government ID checks, driving licence validation, and facial matching.",
        'category'    => "Safety",
        'tag'         => "KYC & Trust",
        'type'        => "Educational Guide",
        'minutes'     => 6,
        'date'        => "2026-11-10",
        'author'      => "Amarjit Singh",
        'author_role' => "Founder & Head of Trust Architecture",
        'cover_style' => [
            'bg'     => "#13294B",
            'ink'    => "#7FD28F",
            'catInk' => "#13294B",
            'path'   => "M20 170 C 90 120, 140 160, 200 100 S 320 40, 380 30",
        ],
        'toc'         => [
            'gap' => "The verification gap on Indian highways",
            'twoway' => "Why one-way verification fails",
            'fourpillars' => "The four pillars of WayloShare KYC",
            'privacy' => "Data privacy & zero plaintext storage",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">When you step into a car travelling at 100 km/h down a national highway, trust is not an optional luxury. It is an absolute, non-negotiable prerequisite.</p>
      
      <p>For years, ride-sharing platforms in India operated on a flawed assumption: they either checked only the driver's commercial documentation, or allowed anyone to post and book highway seats with nothing more than an unverified prepaid phone number. This created a profound systemic vulnerability that made carpooling feel unsafe—particularly for women, students, and first-time travelers.</p>

      <h2 id="gap">The verification gap on Indian highways</h2>
      <p>When founders Amarjit Singh and Anit Paul Singh began studying highway mobility across Northern and Central India, they observed a striking paradox. Millions of commuters wanted to share highway rides to avoid crowded trains and overpriced solitary cabs, but hesitation remained high. The reason was always the same: <em>“Who am I actually sitting with in that car?”</em></p>
      
      <p>Traditional platforms created what we call the <strong>Verification Gap</strong>. Drivers could upload forged documents with zero real-time registry verification, while co-riders could join under aliases without identity authentication. If an incident occurred or property went missing, there was no verified paper trail.</p>

      <div style="margin: 32px 0; padding: 24px 28px; border-left: 5px solid #2775BA; background: #EAF2F9; border-radius: 0 20px 20px 0">
        <h3 style="margin: 0 0 8px; font-family: 'Familjen Grotesk', sans-serif; font-size: 22px; color: #13294B">The WayloShare Principle</h3>
        <p style="margin: 0; font-size: 17px; line-height: 1.6; color: #34465F">Nobody gets in the car unless they are verified. Both the person holding the steering wheel and the passenger sitting in the back seat undergo identical, rigorous identity verification before any seat is confirmed.</p>
      </div>

      <h2 id="twoway">Why one-way verification fails</h2>
      <p>Many legacy apps only focus on the driver. But drivers are equally vulnerable: picking up anonymous hitchhikers or unverified passengers on long inter-city routes exposes car owners to safety risks, theft, and disputes. By demanding two-way verification, WayloShare creates a symmetric circle of accountability.</p>

      <h2 id="fourpillars">The four pillars of WayloShare KYC</h2>
      <p>Our verification workflow combines state-of-the-art digital infrastructure with strict statutory checks:</p>

      <div style="display: flex; flex-direction: column; gap: 16px; margin: 28px 0">
        <div style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 18px; padding: 20px">
          <strong style="color: #13294B; font-size: 18px">1. Mobile Number Binding (OTP)</strong>
          <p style="margin: 6px 0 0; color: #52627A; font-size: 16px">Every account must be authenticated with an active Indian mobile number via secure SMS OTP. Virtual and VOIP numbers are blocked automatically.</p>
        </div>
        <div style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 18px; padding: 20px">
          <strong style="color: #13294B; font-size: 18px">2. Government ID via DigiLocker Integration</strong>
          <p style="margin: 6px 0 0; color: #52627A; font-size: 16px">Users verify their identity directly through Government-authorized DigiLocker protocols. We validate the legal name and date of birth while masking sensitive document numbers.</p>
        </div>
        <div style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 18px; padding: 20px">
          <strong style="color: #13294B; font-size: 18px">3. Driving Licence &amp; RC Verification (For Drivers)</strong>
          <p style="margin: 6px 0 0; color: #52627A; font-size: 16px">Driver profiles are checked against official Parivahan national databases to ensure the Driving Licence is active and the vehicle RC matches the make, model, and registration plate declared in the app.</p>
        </div>
        <div style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 18px; padding: 20px">
          <strong style="color: #13294B; font-size: 18px">4. Facial Biometric Match &amp; Liveness Detection</strong>
          <p style="margin: 6px 0 0; color: #52627A; font-size: 16px">To prevent impersonation, a live selfie check matches facial features against the Government ID record, ensuring the person booking the seat is the verified individual travelling.</p>
        </div>
      </div>

      <h2 id="privacy">Data privacy &amp; zero plaintext storage</h2>
      <p>Security must never come at the expense of user privacy. WayloShare employs 256-bit encryption for all data in transit and at rest. Government identifiers (such as Aadhaar or PAN numbers) are processed through tokenized zero-knowledge proofs and are <strong>never stored in plaintext</strong> on our application servers.</p>
      
      <p>When you browse seats, co-riders only see your first name, verified badge status, and community ratings. Your phone number remains completely masked behind an in-app calling and messaging proxy.</p>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #13294B; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 22px; flex-shrink: 0">AS</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">Amarjit Singh</b><span style="color: #52627A">Founder at WayloShare · Architect of two-way verification protocols.</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "morth-carpooling-guidelines-india",
        'title'       => "MoRTH Guidelines & Legal Carpooling in India: What Every Commuter Should Know",
        'excerpt'     => "Everything you need to know about non-commercial highway cost sharing: per-km fare caps, tax rules, and how carpooling legally differs from commercial taxis.",
        'category'    => "Savings",
        'tag'         => "MoRTH Law",
        'type'        => "Educational Guide",
        'minutes'     => 7,
        'date'        => "2026-11-05",
        'author'      => "WayloShare Policy Council",
        'author_role' => "Mobility & Regulatory Compliance",
        'cover_style' => [
            'bg'     => "#B8862B",
            'ink'    => "#ffffff",
            'catInk' => "#8A6215",
            'path'   => "M20 170 C 90 120, 140 160, 200 100 S 320 40, 380 30",
        ],
        'toc'         => [
            'framework' => "The statutory framework for carpooling in India",
            'commercialvsnon' => "Private carpool vs commercial yellow-board cabs",
            'perkmcaps' => "How statutory per-km price caps work",
            'taxinsurance' => "Tax treatment and motor insurance validity",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">One of the most frequent questions car owners and highway commuters ask is simple: <em>“Is carpooling legally permitted in India, and can I share ride costs without running an illegal commercial taxi?”</em></p>

      <p>The short answer is an emphatic <strong>YES</strong>—provided the platform strictly adheres to the Ministry of Road Transport and Highways (MoRTH) guidelines governing non-commercial cost recovery. Understanding this legal distinction is vital for every driver offering seats and every passenger booking them.</p>

      <h2 id="framework">The statutory framework for carpooling in India</h2>
      <p>The Motor Vehicles Act and MoRTH policy directives draw a crystalline boundary between commercial transport and non-commercial ride sharing. Under official central guidelines, private white-plate vehicle owners are encouraged to carpool to reduce traffic congestion, lower carbon emissions, and optimize highway road usage.</p>

      <p>However, the law imposes three fundamental conditions:</p>
      <ul>
        <li><strong>No Commercial Profit:</strong> The vehicle owner cannot operate for commercial profit; they may only recover actual shared journey expenses (fuel, tolls, vehicle wear).</li>
        <li><strong>Capped Number of Daily Rides:</strong> Private carpoolers cannot ply routes continuously like commercial cabs. WayloShare caps driver posts to a maximum of 2 to 4 intercity trips per day.</li>
        <li><strong>Transparent Digital Cost Splitting:</strong> Fares must be calculated using verifiable per-kilometre limits rather than speculative surge pricing.</li>
      </ul>

      <h2 id="commercialvsnon">Private carpool vs commercial yellow-board cabs</h2>
      <p>The table below summarizes the operational and legal differences under Indian transport regulations:</p>

      <div style="overflow-x: auto; margin: 24px 0">
        <table style="width: 100%; border-collapse: collapse; font-size: 16px; background: #ffffff; border-radius: 14px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.06)">
          <thead>
            <tr style="background: #13294B; color: #ffffff; text-align: left">
              <th style="padding: 14px 18px">Parameter</th>
              <th style="padding: 14px 18px">Commercial Taxi (Ola/Uber/Cab)</th>
              <th style="padding: 14px 18px">WayloShare Carpool</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid #EAE2D0">
              <td style="padding: 12px 18px; font-weight: 700">Number Plate</td>
              <td style="padding: 12px 18px">Yellow Board (Commercial)</td>
              <td style="padding: 12px 18px; color: #2D7E3C; font-weight: 700">White Board (Private)</td>
            </tr>
            <tr style="border-bottom: 1px solid #EAE2D0">
              <td style="padding: 12px 18px; font-weight: 700">Pricing Mechanism</td>
              <td style="padding: 12px 18px">Dynamic Surge Pricing (For-profit)</td>
              <td style="padding: 12px 18px; color: #2D7E3C; font-weight: 700">Capped per-km (Cost-recovery)</td>
            </tr>
            <tr style="border-bottom: 1px solid #EAE2D0">
              <td style="padding: 12px 18px; font-weight: 700">Driver Motivation</td>
              <td style="padding: 12px 18px">Full-time Commercial Driving</td>
              <td style="padding: 12px 18px">Already travelling the highway route</td>
            </tr>
            <tr>
              <td style="padding: 12px 18px; font-weight: 700">Toll Splitting</td>
              <td style="padding: 12px 18px">Billed entirely to passenger</td>
              <td style="padding: 12px 18px; color: #2D7E3C; font-weight: 700">Equitably divided among riders</td>
            </tr>
          </tbody>
        </table>
      </div>

      <h2 id="perkmcaps">How statutory per-km price caps work</h2>
      <p>To eliminate any ambiguity and protect drivers from regulatory scrutiny, WayloShare hardcodes the statutory maximum rate per kilometre into our pricing engine:</p>
      <ul>
        <li><strong>Hatchbacks:</strong> Capped at ₹2.50 per seat per km</li>
        <li><strong>Sedans:</strong> Capped at ₹3.20 per seat per km</li>
        <li><strong>Compact SUVs:</strong> Capped at ₹3.50 per seat per km</li>
        <li><strong>Large MUVs (7-seaters):</strong> Capped at ₹3.80 per seat per km</li>
      </ul>
      <p>A driver heading from Delhi to Jaipur or Jammu to Chandigarh cannot inflate fares during holidays, rainy weather, or peak festival rushes. This guarantees fairness for the passenger and full statutory compliance for the driver.</p>

      <h2 id="taxinsurance">Tax treatment and motor insurance validity</h2>
      <p>Because carpool contributions constitute direct expense reimbursement (cost sharing) rather than income or profit, they do not trigger commercial GST registration for car owners. Furthermore, sharing your fuel cost with verified co-riders does not invalidate your comprehensive private motor vehicle insurance policy, as confirmed by regulatory circulars on non-commercial ridesharing.</p>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #B8862B; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0">PC</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">WayloShare Policy Council</b><span style="color: #52627A">Authored in consultation with automotive legal consultants and transport policy analysts.</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "first-time-carpooler-handbook",
        'title'       => "The First-Time Carpooler's Handbook: 8 Rules for a Smooth Highway Ride",
        'excerpt'     => "Essential habits for first-time highway ride sharers: in-app chat privacy, luggage etiquette, pre-trip vehicle checks, verifying the number plate, and live ride tracking.",
        'category'    => "Guides",
        'tag'         => "Rider Guide",
        'type'        => "Practical Handbook",
        'minutes'     => 5,
        'date'        => "2026-10-28",
        'author'      => "WayloShare Safety Team",
        'author_role' => "Operations & Community Trust",
        'cover_style' => [
            'bg'     => "#2D7E3C",
            'ink'    => "#F2C14E",
            'catInk' => "#1F6B32",
            'path'   => "M10 90 C 100 30, 200 170, 280 110 S 360 50, 395 60",
        ],
        'toc'         => [
            'rules1to3' => "Rules 1–3: Pre-ride preparation & pickup",
            'rules4to6' => "Rules 4–6: On-road etiquette & comfort",
            'rules7to8' => "Rules 7–8: Payment & emergency security",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">Booking your first inter-city carpool seat can feel exciting and unfamiliar at the same time. You're sharing a comfortable car with verified peers instead of boarding a noisy bus or waiting for a delayed train.</p>

      <p>To ensure every journey is smooth, respectful, and safe, here is our definitive 8-point handbook formulated from thousands of highway trips across India.</p>

      <h2 id="rules1to3">Rules 1–3: Pre-ride preparation &amp; pickup</h2>
      <div style="display: flex; flex-direction: column; gap: 18px; margin: 20px 0">
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 1: Always verify the number plate before boarding</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">When your car arrives at the pickup spot, verify the registration number and driver's face against the details shown in your WayloShare active ride screen. Never enter a car whose plate or driver does not match the app.</p>
        </div>
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 2: Keep communication strictly inside the app</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">Use the built-in in-app messaging and call masking. You never need to give out your personal WhatsApp or telephone number to strangers. In-app communication also maintains an audited record in case of support queries.</p>
        </div>
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 3: Arrive 5 minutes before departure at the designated pin</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">Highway cars cannot idle in congested intersections or toll plazas. Pick an easily accessible landmark (a fuel station, metro gate, or flyover service lane) and be on site ready to roll.</p>
        </div>
      </div>

      <h2 id="rules4to6">Rules 4–6: On-road etiquette &amp; comfort</h2>
      <div style="display: flex; flex-direction: column; gap: 18px; margin: 20px 0">
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 4: Pack one medium bag that fits the boot</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">Boot space is shared among 3 or 4 passengers. Unless you have coordinated extra luggage with the driver beforehand, stick to one cabin trolley or duffel bag and a personal backpack.</p>
        </div>
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 5: Share live tracking with your family</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">WayloShare generates a real-time web tracking link for every trip. Send it to family members so they can watch your car progress along the highway in real time without needing to install the app.</p>
        </div>
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 6: Respect the shared acoustic space</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">Keep earphones handy for personal media and video calls. If the car agrees on highway radio or a communal playlist, enjoy the banter, but always respect co-riders who prefer to nap or read quietly.</p>
        </div>
      </div>

      <h2 id="rules7to8">Rules 7–8: Payment &amp; emergency security</h2>
      <div style="display: flex; flex-direction: column; gap: 18px; margin: 20px 0">
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 7: Seamless digital payments via UPI</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">No cash disputes or awkward change requests at toll plazas. Seat fares are calculated upfront within statutory MoRTH caps and paid securely through UPI upon booking or completion.</p>
        </div>
        <div style="padding: 20px; background: #ffffff; border-radius: 18px; border: 1.5px solid #D5E0EC">
          <strong style="color: #13294B; font-size: 18px">Rule 8: Familiarize yourself with the in-app SOS button</strong>
          <p style="margin: 6px 0 0; color: #45566E; font-size: 16px">During any active ride, the WayloShare app displays a persistent emergency SOS button. Tapping it notifies our 24/7 Rapid Response Desk, shares current GPS coordinates with your emergency contacts, and connects you directly to national emergency lines.</p>
        </div>
      </div>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #2D7E3C; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0">ST</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">WayloShare Safety Team</b><span style="color: #52627A">Curated guidelines from our Community Standards and Driver Onboarding teams.</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "pink-ride-transforming-women-travel",
        'title'       => "Pink Ride: Transforming Highway Travel for Women Across India",
        'excerpt'     => "Why women travelers shouldn't have to compromise on safety. How WayloShare created an exclusive, verified community of women drivers and co-riders.",
        'category'    => "Pink Ride",
        'tag'         => "Pink Ride",
        'type'        => "App Feature Spotlight",
        'minutes'     => 6,
        'date'        => "2026-10-20",
        'author'      => "Anit Paul Singh",
        'author_role' => "Founder & Head of Operations",
        'cover_style' => [
            'bg'     => "#C72561",
            'ink'    => "#FFE1EC",
            'catInk' => "#C72561",
            'path'   => "M10 120 C 80 120, 100 40, 180 50 S 280 170, 390 90",
        ],
        'toc'         => [
            'reality' => "The solo travel challenge for women in India",
            'howitworks' => "How Pink Ride verification works",
            'safetyfeatures' => "Triple-layer security ecosystem",
            'voices' => "Real feedback from women commuters",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">Mobility is independence. But for millions of women in India—students travelling home for festivals, working professionals commuting between city clusters, and solo travelers—inter-city highway journeys have historically triggered apprehension.</p>

      <p>Night buses with uncurtained berths, crowded railway waitlists, and stepping into highway cabs driven by unverified strangers have forced women to plan their schedules around daylight hours or pay exorbitant rates for private cabs. WayloShare created <strong>Pink Ride</strong> to change this equation permanently.</p>

      <h2 id="reality">The solo travel challenge for women in India</h2>
      <p>When women travel alone on national highways, safety concerns are not abstract—they are immediate and tangible. Standard ride-hailing apps do not permit riders to choose the gender profile of co-passengers. A woman booking an empty seat in a standard shared taxi has zero control over who occupies the seat next to her for the next five hours.</p>

      <p>Pink Ride was designed from scratch as an exclusive, segregated network where <strong>women drive women</strong>, and every single seat in the vehicle is occupied exclusively by verified women co-riders.</p>

      <h2 id="howitworks">How Pink Ride verification works</h2>
      <p>Pink Ride is not just a marketing filter; it is an independent, gated trust corridor backed by rigorous checks:</p>
      
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin: 24px 0">
        <div style="background: #FFF5F9; border: 1.5px solid #F4C7D7; border-radius: 18px; padding: 20px">
          <span style="font-size: 13px; font-weight: 700; color: #C72561; letter-spacing: 1px">01 · MULTI-POINT ID CHECK</span>
          <p style="margin: 8px 0 0; color: #5C2340; font-size: 15px; line-height: 1.5">Government photo ID and DigiLocker validation verify legal identity and gender before Pink Ride mode unlocks.</p>
        </div>
        <div style="background: #FFF5F9; border: 1.5px solid #F4C7D7; border-radius: 18px; padding: 20px">
          <span style="font-size: 13px; font-weight: 700; color: #C72561; letter-spacing: 1px">02 · ZERO MALE BOOKINGS</span>
          <p style="margin: 8px 0 0; color: #5C2340; font-size: 15px; line-height: 1.5">Accounts registered to male users cannot see, browse, or request seats on Pink Ride routes. No exceptions.</p>
        </div>
        <div style="background: #FFF5F9; border: 1.5px solid #F4C7D7; border-radius: 18px; padding: 20px">
          <span style="font-size: 13px; font-weight: 700; color: #C72561; letter-spacing: 1px">03 · VERIFIED WOMEN DRIVERS</span>
          <p style="margin: 8px 0 0; color: #5C2340; font-size: 15px; line-height: 1.5">Car owners offering Pink Rides undergo comprehensive licence, vehicle registration, and background KYC checks.</p>
        </div>
      </div>

      <h2 id="safetyfeatures">Triple-layer security ecosystem</h2>
      <p>Inside every Pink Ride, passengers and drivers benefit from dedicated technological safeguards:</p>
      <ul>
        <li><strong>Masked In-App Proxy:</strong> Direct personal mobile numbers are never revealed. All calls and pre-pickup messages route through our secure in-app communication bridge.</li>
        <li><strong>Live Family Sharing:</strong> A single tap generates an authenticated live tracking link. Parents, spouses, or roommates can track your exact car location, highway speed, and estimated arrival time on any browser.</li>
        <li><strong>24/7 Rapid Response Desk:</strong> Pink Ride trips are monitored with proactive geofencing. Any unexpected route deviation or prolonged unscheduled stop triggers an immediate alert from our safety center.</li>
      </ul>

      <h2 id="voices">Real feedback from women commuters</h2>
      <div style="margin: 32px 0; padding: 24px 28px; background: #ffffff; border: 2px solid #F4C7D7; border-radius: 20px; box-shadow: 0 4px 14px rgba(199,37,97,0.08)">
        <blockquote style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px; line-height: 1.3; color: #7A1840">“I used to dread festival travel from college back home. Getting into a Pink Ride with two other women who were also heading to the same city completely eliminated the anxiety. We listened to music and reached home relaxed.”</blockquote>
        <span style="display: block; margin-top: 12px; font-size: 15px; font-weight: 700; color: #C72561">— Verified Pink Ride Commuter, Delhi-Chandigarh Corridor</span>
      </div>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #C72561; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 22px; flex-shrink: 0">AP</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">Anit Paul Singh</b><span style="color: #52627A">Founder at WayloShare · Championing women-only highway mobility across India.</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "why-go-solo-cut-travel-costs",
        'title'       => "Why Go Solo? How Sharing Empty Highway Seats Cuts Travel Expenses by 70%",
        'excerpt'     => "Between surge pricing on private taxis, expensive flights, and packed train waitlists, carpooling on WayloShare is the smarter, eco-friendly way to travel between Indian cities.",
        'category'    => "Savings",
        'tag'         => "Why Go Solo?",
        'type'        => "Economic Analysis",
        'minutes'     => 5,
        'date'        => "2026-10-15",
        'author'      => "WayloShare Economics",
        'author_role' => "Growth & Commuter Insights",
        'cover_style' => [
            'bg'     => "#2775BA",
            'ink'    => "#F2C14E",
            'catInk' => "#1B5A93",
            'path'   => "M20 170 C 90 120, 140 160, 200 100 S 320 40, 380 30",
        ],
        'toc'         => [
            'travelcostcrisis' => "The soaring cost of intercity transit in India",
            'mathofemptyseats' => "The economic math of an empty car seat",
            'costbreakdown' => "Real cost comparison: Delhi to Chandigarh & beyond",
            'greendividend' => "The environmental dividend: cutting 150+ kg CO2",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">Every weekend, thousands of highway cars cruise between major Indian cities with 3 or 4 completely empty passenger seats. At the exact same time, travelers are paying exorbitant surge fares for private cabs or struggling with waitlisted train tickets.</p>

      <p>Our core philosophy asks one simple question: <strong>Why Go Solo?</strong> When you share seats with verified co-riders, everyone wins: drivers recover their fuel and toll bills, passengers save up to 70% compared to private transit, and fewer cars choke our highways.</p>

      <h2 id="travelcostcrisis">The soaring cost of intercity transit in India</h2>
      <p>Inter-city travel expenses have steadily escalated over the past few years. Consider the typical options available for a 300 to 500 km trip:</p>
      <ul>
        <li><strong>Commercial Private Cabs:</strong> ₹4,000 to ₹7,000 for a one-way trip, plus driver night allowances and return toll charges.</li>
        <li><strong>Flights:</strong> Often ₹4,500 to ₹8,000 per passenger, plus travel time and airport taxi expenses at both departure and arrival.</li>
        <li><strong>Shatabdi &amp; Vande Bharat Trains:</strong> Highly convenient, but frequently fully booked weeks in advance, leaving commuters stranded on waitlists.</li>
      </ul>

      <h2 id="mathofemptyseats">The economic math of an empty car seat</h2>
      <p>When a car owner drives alone from Delhi to Jaipur, Chandigarh to Jammu, or Mumbai to Pune, they bear 100% of the financial burden: ₹2,500 in petrol/diesel plus ₹600 in expressway FASTag tolls. That is ₹3,100 spent out of pocket for a single journey.</p>
      
      <p>By posting 3 empty seats on WayloShare at a transparent, MoRTH-capped rate of ₹750–₹950 per seat, the driver recovers between ₹2,250 and ₹2,850 of their trip expenses. Their net travel cost drops to almost zero, while three co-riders travel in air-conditioned comfort for less than the cost of a basic AC bus ticket.</p>

      <h2 id="costbreakdown">Real cost comparison: Delhi to Chandigarh &amp; beyond</h2>
      <div style="overflow-x: auto; margin: 24px 0">
        <table style="width: 100%; border-collapse: collapse; font-size: 16px; background: #ffffff; border-radius: 14px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.06)">
          <thead>
            <tr style="background: #13294B; color: #ffffff; text-align: left">
              <th style="padding: 14px 18px">Travel Mode</th>
              <th style="padding: 14px 18px">Typical Fare</th>
              <th style="padding: 14px 18px">Door-to-Door Convenience</th>
              <th style="padding: 14px 18px">Availability</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid #EAE2D0">
              <td style="padding: 12px 18px; font-weight: 700">Solo Private Cab</td>
              <td style="padding: 12px 18px">₹4,500 – ₹6,000</td>
              <td style="padding: 12px 18px">High</td>
              <td style="padding: 12px 18px">Instant (High surge)</td>
            </tr>
            <tr style="border-bottom: 1px solid #EAE2D0">
              <td style="padding: 12px 18px; font-weight: 700">Executive Train</td>
              <td style="padding: 12px 18px">₹1,200 – ₹1,800</td>
              <td style="padding: 12px 18px">Medium (Station to station)</td>
              <td style="padding: 12px 18px">Frequent waitlists</td>
            </tr>
            <tr style="background: #EAF2F9; border-bottom: 1px solid #EAE2D0">
              <td style="padding: 12px 18px; font-weight: 700; color: #2775BA">WayloShare Seat</td>
              <td style="padding: 12px 18px; font-weight: 700; color: #2D7E3C">₹550 – ₹950</td>
              <td style="padding: 12px 18px; font-weight: 700; color: #2775BA">High (Flexible pickup)</td>
              <td style="padding: 12px 18px; font-weight: 700; color: #2775BA">Real-time verified routes</td>
            </tr>
          </tbody>
        </table>
      </div>

      <h2 id="greendividend">The environmental dividend: cutting 150+ kg CO2</h2>
      <p>The benefits extend far beyond personal savings. Every four people who share a single sedan take three vehicles completely off the expressway. For an average 350-kilometre intercity trip, this keeps approximately <strong>155 kg of CO₂</strong> out of the atmosphere—equivalent to what 7 mature trees absorb in an entire year.</p>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #2775BA; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0">WE</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">WayloShare Economics Desk</b><span style="color: #52627A">Analyzing cost-efficiency, consumer mobility trends, and carbon reduction metrics.</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "engineering-trust-kyc-architecture",
        'title'       => "Engineering Trust: The Architecture Behind WayloShare's Two-Way KYC System",
        'excerpt'     => "A deep technical dive into our verification pipeline: automated document OCR, anti-spoofing facial liveness detection, DigiLocker API integration, and encrypted data isolation.",
        'category'    => "Technical",
        'tag'         => "Architecture",
        'type'        => "Engineering Deep Dive",
        'minutes'     => 8,
        'date'        => "2026-10-08",
        'author'      => "WayloShare Engineering",
        'author_role' => "Platform & Security Architecture",
        'cover_style' => [
            'bg'     => "#13294B",
            'ink'    => "#9CC8F0",
            'catInk' => "#13294B",
            'path'   => "M20 40 C 120 60, 140 150, 220 140 S 330 70, 390 160",
        ],
        'toc'         => [
            'overview' => "System overview & security goals",
            'pipeline' => "The 4-stage automated KYC pipeline",
            'indrastack' => "IndiaStack integration: DigiLocker & Parivahan",
            'cryptography' => "Zero plaintext storage & tokenized isolation",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">Building a consumer carpooling platform for Indian highways requires solving a difficult distributed systems challenge: how do you verify thousands of documents in seconds with banking-grade reliability while safeguarding user privacy?</p>

      <p>This technical overview outlines the system architecture powering WayloShare's Two-Way KYC Engine, our asynchronous microservice pipeline, and how we leverage IndiaStack APIs for real-time document validation.</p>

      <h2 id="overview">System overview &amp; security goals</h2>
      <p>The WayloShare verification service was engineered around three strict technical tenets:</p>
      <ul>
        <li><strong>Sub-90-second Verification Latency:</strong> Users expect onboarding to complete rapidly without waiting hours for manual agent approval.</li>
        <li><strong>Zero Plaintext Storage:</strong> Government document numbers (UIDAI Aadhaar tokens, Driving Licence IDs) must never be stored unencrypted in application databases.</li>
        <li><strong>Anti-Spoofing &amp; Liveness Assurance:</strong> The engine must reject pre-recorded videos, static photo screenshots, and deepfake camera injections.</li>
      </ul>

      <h2 id="pipeline">The 4-stage automated KYC pipeline</h2>
      <p>When a user initiates profile verification, the client SDK opens a secure TLS 1.3 session with our Verification Gateway. The request flows through an event-driven state machine:</p>

      <div style="background: #0B1626; color: #E3EEF8; padding: 24px; border-radius: 18px; font-family: monospace; font-size: 14px; line-height: 1.6; margin: 24px 0; overflow-x: auto">
Client Upload (Mobile OTP Bound)<br>
&nbsp;&nbsp;│<br>
&nbsp;&nbsp;▼<br>
[Stage 1: Document OCR Ingestion] ──► Extracts Name, DOB, Gender, Reg No<br>
&nbsp;&nbsp;│<br>
&nbsp;&nbsp;▼<br>
[Stage 2: IndiaStack Gateway] ──► Validates DigiLocker / Parivahan Registry<br>
&nbsp;&nbsp;│<br>
&nbsp;&nbsp;▼<br>
[Stage 3: Biometric Liveness] ──► Passive Face Liveness &amp; 3D Depth Check<br>
&nbsp;&nbsp;│<br>
&nbsp;&nbsp;▼<br>
[Stage 4: Tokenization &amp; Vault] ──► Issues Verified Badge Token; Masks PII
      </div>

      <h2 id="indrastack">IndiaStack integration: DigiLocker &amp; Parivahan</h2>
      <p>Rather than relying on unverified image uploads that can be tampered with in image editors, WayloShare interfaces directly with authorized Open APIs:</p>
      <ul>
        <li><strong>DigiLocker OAuth Gateway:</strong> Fetches cryptographically signed XML documents directly from the issuing authority, eliminating document forgery.</li>
        <li><strong>Parivahan Vahan &amp; Sarathi Connectors:</strong> Real-time lookup of commercial vs private vehicle class, road-worthiness fitness certificate, and valid driving license categories (LMV / Transport).</li>
      </ul>

      <h2 id="cryptography">Zero plaintext storage &amp; tokenized isolation</h2>
      <p>To adhere to the Digital Personal Data Protection (DPDP) Act, user documents are segregated in hardware-isolated vaults. Sensitive document numbers are hashed using salted SHA-256 and stored as non-reversible verification tokens.</p>
      
      <p>Once a profile is confirmed, client-facing microservices only receive a boolean verification flag (<code>is_verified: true</code>, <code>kyc_tier: full</code>). Personal identifiers are never returned in public API payloads, keeping user identities safe from scraping or unauthorized access.</p>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #13294B; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0">ENG</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">WayloShare Engineering</b><span style="color: #52627A">Authored by the Core Platform &amp; Distributed Systems Infrastructure Team.</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "algorithms-route-matching-fare-engine",
        'title'       => "Algorithms of the Road: How WayloShare Matches Routes and Calculates Fair Fares",
        'excerpt'     => "How geospatial waypoint deviation, corridor clustering, and MoRTH-compliant per-km rate curves power real-time seat matching and transparent cost recovery.",
        'category'    => "Technical",
        'tag'         => "Route Engine",
        'type'        => "Engineering Deep Dive",
        'minutes'     => 7,
        'date'        => "2026-10-01",
        'author'      => "WayloShare Engineering",
        'author_role' => "Routing & Algorithmic Systems",
        'cover_style' => [
            'bg'     => "#2775BA",
            'ink'    => "#7FD28F",
            'catInk' => "#1B5A93",
            'path'   => "M30 180 L 120 120 L 200 140 L 290 60 L 380 40",
        ],
        'toc'         => [
            'theproblem' => "The national highway routing problem",
            'geospatialmatching' => "Waypoint buffering & corridor deviation limits",
            'faremathematics' => "Fare calculation mathematics & MoRTH caps",
            'concurrency' => "Atomic seat allocation & concurrency control",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">Urban ride-hailing algorithms are optimized for short, radial trips: assign the nearest cab to a waiting rider. But inter-city highway carpooling is a fundamentally different mathematical problem.</p>

      <p>A driver travelling 400 kilometres on NH44 is not a taxi looking for random diversions; they have a scheduled departure, a fixed destination, and limited willingness to detour. Here is how our Routing and Fare Engines coordinate highway matching at scale.</p>

      <h2 id="theproblem">The national highway routing problem</h2>
      <p>When a driver posts a route from Delhi to Jaipur, prospective riders may wish to board in Gurugram, Dharuhera, or Neemrana, and disembark at Shahpura, Amer, or Jaipur Bypass. The matching algorithm must calculate whether an intermediate pickup is economically and temporally viable without disrupting the primary travel schedule.</p>

      <h2 id="geospatialmatching">Waypoint buffering &amp; corridor deviation limits</h2>
      <p>WayloShare utilizes an adaptive polyline buffering algorithm. When a driver enters their route, the system constructs a corridor polygon with dynamic radius thresholds:</p>
      <ul>
        <li><strong>Urban Origins &amp; Terminals:</strong> 8 to 12 km tolerance radius around major transit ring roads and metro interchanges.</li>
        <li><strong>Highway Corridors:</strong> Strict 2.5 km lateral deviation limit along expressways and national highways.</li>
        <li><strong>Maximum Detour Time Threshold:</strong> No intermediate pickup can add more than 15 minutes of total detour time to the driver's journey.</li>
      </ul>

      <h2 id="faremathematics">Fare calculation mathematics &amp; MoRTH caps</h2>
      <p>Unlike commercial ride apps that use opaque surge multipliers, WayloShare's fare calculation engine is deterministic and completely transparent:</p>

      <div style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 18px; padding: 22px; margin: 24px 0">
        <code style="font-size: 16px; color: #13294B; font-weight: 700">Seat_Fare = Min( (Distance × Rate_Per_Km) + Prorated_Toll, MoRTH_Statutory_Cap )</code>
        <p style="margin: 10px 0 0; color: #52627A; font-size: 15px; line-height: 1.5">Where <code>Rate_Per_Km</code> is determined by vehicle efficiency category (₹2.50 to ₹3.80/km) and <code>Prorated_Toll</code> evenly divides national highway FASTag tolls across occupied seats.</p>
      </div>

      <h2 id="concurrency">Atomic seat allocation &amp; concurrency control</h2>
      <p>Because multiple co-riders along different segments of the same highway may attempt to book overlapping legs simultaneously (e.g. Rider A booking Delhi→Ambala and Rider B booking Ambala→Chandigarh), seat allocation requires strict ACID transactional semantics. WayloShare utilizes Redis-backed distributed locks with PostgreSQL row-level versioning to ensure zero double-booking across multi-stop journeys.</p>

      <div style="margin-top: 36px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; background: #ffffff; border: 1.5px solid #D5E0EC">
        <span style="width: 60px; height: 60px; border-radius: 50%; background: #2775BA; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0">ENG</span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 16px; line-height: 1.45"><b style="font-size: 19px; color: #13294B">WayloShare Engineering</b><span style="color: #52627A">Authored by the Algorithmic Routing &amp; Geospatial Infrastructure Group.</span></span>
      </div>
    </article>
HTML
    ],
];

/**
 * Get all blog posts.
 */
function get_all_posts(): array {
    global $posts;
    return $posts;
}

/**
 * Find a blog post by slug.
 */
function get_post_by_slug(string $slug): ?array {
    global $posts;
    foreach ($posts as $post) {
        if ($post['slug'] === $slug) {
            return $post;
        }
    }
    return null;
}

/**
 * Get related posts for the "Keep reading" section.
 * Prefers the same category, falls back to other posts.
 */
function get_related_posts(string $current_slug, string $category, int $limit = 3): array {
    global $posts;
    $sameCat = [];
    $otherCat = [];

    foreach ($posts as $post) {
        if ($post['slug'] === $current_slug) {
            continue;
        }
        if ($post['category'] === $category) {
            $sameCat[] = $post;
        } else {
            $otherCat[] = $post;
        }
    }

    $result = array_merge($sameCat, $otherCat);
    return array_slice($result, 0, $limit);
}

return $posts;
