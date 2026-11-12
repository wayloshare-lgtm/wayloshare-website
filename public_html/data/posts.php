<?php
/**
 * WayloShare Blog Posts Data
 */

$posts = [
    [
        'slug'        => "jammu-to-chandigarh-shared-car-guide",
        'title'       => "Jammu to Chandigarh by shared car: the 368 km guide",
        'excerpt'     => "Where to meet, where to stop for chai, what a seat costs under MoRTH caps, and how to make the six hours feel shorter.",
        'category'    => "Routes",
        'tag'         => "NH44",
        'minutes'     => 8,
        'date'        => "2026-10-14",
        'author'      => "[AUTHOR NAME]",
        'author_role' => "[ROLE]",
        'cover_style' => [
            'bg'     => "#2775BA",
            'ink'    => "#F2C14E",
            'catInk' => "#1B5A93",
            'path'   => "M20 170 C 90 120, 140 160, 200 100 S 320 40, 380 30",
        ],
        'body_html'   => <<<'HTML'
<article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <p class="lead">Every morning, cars leave Jammu for Chandigarh with one person in them. Same highway, same tolls, same six hours. This guide is for the people who would rather split that trip: where to meet, where to stop, what a seat should cost, and how to make the drive feel shorter.</p>
      <p>[SAMPLE ARTICLE — replace with your published copy. Distances below are approximate road distances along NH44 and should be checked before publishing.]</p>

      <h2 id="route">The route, stone by stone</h2>
      <p>Most shared rides take NH44 south through Kathua and Pathankot, then cut across Punjab towards Chandigarh.</p>

      <!-- kilometre-stone timeline with car driving down the road -->
      <div style="position: relative; margin: 30px 0 40px; padding-left: 92px">
        <div style="position: absolute; left: 22px; top: 0; bottom: 0; width: 34px; background: #ffffff; border: 3px solid #13294B; border-radius: 10px" aria-hidden="true">
          <div style="position: absolute; left: 50%; top: 8px; bottom: 8px; width: 3px; transform: translateX(-50%); background-image: linear-gradient(#C9D6E6 0 14px, transparent 14px 26px); background-size: 3px 26px"></div>
          <div style="position: absolute; left: -4px; animation: drive 9s ease-in-out infinite alternate">
            <svg width="36" height="46" viewBox="0 0 36 46"><rect x="4" y="2" width="28" height="42" rx="10" fill="#E8417A"></rect><rect x="8" y="8" width="20" height="10" rx="4" fill="#FFE1EC"></rect></svg>
          </div>
        </div>
        <div style="display: flex; flex-direction: column; gap: 22px">
          <sc-for list="{{stops}}" as="s" hint-placeholder-count="5">
            <div style="display: flex; gap: 18px; align-items: center">
              <span class="stone">{{s.km}}</span>
              <div style="display: flex; flex-direction: column; line-height: 1.35">
                <span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 24px; color: #13294B">{{s.name}}</span>
                <span style="font-size: 17px; color: #52627A">{{s.note}}</span>
              </div>
            </div>
          </sc-for>
        </div>
      </div>

      <h2 id="pickup">Where to meet your driver</h2>
      <p>Pick a pickup point that is easy to find and easy to stop at. Busy chowks work well early in the morning; the app shows the exact pin the driver set, and you can chat to adjust it before you leave.</p>

      <figure style="margin: 40px 0; padding: 0 0 0 24px; border-left: 6px solid #F2C14E; position: relative">
        <blockquote style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 34px; line-height: 1.2; color: #13294B; letter-spacing: -.5px">“The trip is the same six hours. With two strangers who turn into friends, it just doesn't feel like it.”</blockquote>
        <figcaption style="margin-top: 12px; font-size: 16px; color: #52627A">[RIDER NAME], regular on this route [REPLACE WITH A REAL QUOTE]</figcaption>
        <span class="hand" style="position: absolute; right: -10px; top: -28px; font-size: 22px; color: #C72561; transform: rotate(6deg)">true story</span>
      </figure>

      <h2 id="price">What a fair seat costs</h2>
      <p>WayloShare suggests a price per seat from distance, fuel and tolls. On Jammu to Chandigarh that comes to about <b>₹1,103 a seat</b>. Drivers can adjust it, but the suggestion keeps everyone in the same range, so nobody has to haggle at the pickup.</p>
      <div style="display: flex; flex-wrap: wrap; gap: 12px; margin: 26px 0">
        <div style="flex: 1 1 200px; background: #ffffff; border: 2px solid #EAE2D0; border-radius: 18px; padding: 20px"><span style="display: block; font-size: 15px; color: #52627A">Suggested seat price</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 38px; color: #2D7E3C">₹1,103</span></div>
        <div style="flex: 1 1 200px; background: #ffffff; border: 2px solid #EAE2D0; border-radius: 18px; padding: 20px"><span style="display: block; font-size: 15px; color: #52627A">Distance</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 38px">368 km</span></div>
        <div style="flex: 1 1 200px; background: #ffffff; border: 2px solid #EAE2D0; border-radius: 18px; padding: 20px"><span style="display: block; font-size: 15px; color: #52627A">Pay with</span><span style="font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 38px">UPI</span></div>
      </div>

      <h2 id="carry">What to carry</h2>
      <div style="background: #ffffff; border-radius: 22px; padding: 10px 24px 14px; border: 2px solid #EAE2D0; position: relative">
        <label class="chk"><input type="checkbox"><span>Phone charged, with the trip shared to someone at home</span></label>
        <label class="chk"><input type="checkbox"><span>A photo ID that matches your WayloShare profile</span></label>
        <label class="chk"><input type="checkbox"><span>Water and something to munch for the Punjab stretch</span></label>
        <label class="chk"><input type="checkbox"><span>One bag that fits the boot, so everyone's luggage fits too</span></label>
        <label class="chk" style="border-bottom: 0"><input type="checkbox"><span>Earphones, unless the car votes for a shared playlist</span></label>
        <span class="hand" style="position: absolute; right: 18px; top: -24px; font-size: 22px; color: #2775BA; transform: rotate(4deg)">tick as you pack ✓</span>
      </div>

      <h2 id="safety">Riding safely</h2>
      <p>Check that the car and number plate match what the app shows before you get in. Every driver's licence and RC are checked before they can offer seats. Women travelling alone can switch to <a href="<?= url('/pink-ride') ?>">Pink Ride</a> to see only women drivers and co-riders.</p>

      <!-- helpful + share -->
      <div style="margin-top: 50px; padding: 26px; border-radius: 22px; background: #13294B; color: #ffffff; display: flex; flex-wrap: wrap; gap: 18px; align-items: center; justify-content: space-between">
        <sc-if value="{{notVoted}}" hint-placeholder-val="{{true}}">
          <div style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap">
            <span style="font-size: 19px; font-weight: 700">Was this guide useful?</span>
            <button type="button" onClick="{{yes}}" style="border: 0; background: #2D7E3C; color: #ffffff; font: 700 17px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 12px; cursor: pointer">Yes</button>
            <button type="button" onClick="{{no}}" style="border: 2px solid rgba(255,255,255,0.4); background: transparent; color: #ffffff; font: 700 17px 'Mukta', sans-serif; padding: 8px 18px; border-radius: 12px; cursor: pointer">Not really</button>
          </div>
        </sc-if>
        <sc-if value="{{voted}}" hint-placeholder-val="{{false}}">
          <span class="hand" style="font-size: 26px; color: #F2C14E">{{thanks}}</span>
        </sc-if>
        <div style="display: flex; gap: 8px; align-items: center">
          <span style="font-size: 15px; color: #C9D6E6; margin-right: 4px">Share</span>
          <a href="https://wa.me/?text=Jammu%20to%20Chandigarh%20by%20shared%20car" aria-label="Share on WhatsApp" style="width: 44px; height: 44px; border-radius: 12px; background: rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z"></path></svg></a>
          <a href="https://twitter.com/intent/tweet" aria-label="Share on X" style="width: 44px; height: 44px; border-radius: 12px; background: rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center; color: #ffffff; text-decoration: none; font-weight: 700">X</a>
          <a href="https://www.linkedin.com/sharing/share-offsite/" aria-label="Share on LinkedIn" style="width: 44px; height: 44px; border-radius: 12px; background: rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center; color: #ffffff; text-decoration: none; font-weight: 700">in</a>
        </div>
      </div>

      <!-- author -->
      <div style="margin-top: 26px; display: flex; gap: 18px; align-items: center; padding: 22px; border-radius: 22px; border: 2px dashed #D9CFB8">
        <span style="width: 72px; height: 72px; border-radius: 50%; background: #BFE3C6; flex-shrink: 0"></span>
        <span style="display: flex; flex-direction: column; gap: 2px; font-size: 17px; line-height: 1.45"><b style="font-size: 20px">[AUTHOR NAME]</b><span style="color: #52627A">[One-line bio: who they are and how often they ride this route.]</span></span>
      </div>
    </article>
HTML
    ],
    [
        'slug'        => "how-we-verify-every-wayloshare-driver",
        'title'       => "How we verify every WayloShare driver",
        'excerpt'     => "Licence, RC and identity checks, step by step, and what happens when something does not match.",
        'category'    => "Safety",
        'tag'         => "KYC, explained",
        'minutes'     => 5,
        'date'        => "2026-10-10",
        'author'      => "WayloShare Safety Team",
        'author_role' => "Operations",
        'cover_style' => [
            'bg'     => "#13294B",
            'ink'    => "#7FD28F",
            'catInk' => "#13294B",
            'path'   => "M20 40 C 120 60, 140 150, 220 140 S 330 70, 390 160",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
HTML
    ],
    [
        'slug'        => "pink-ride-why-we-built-a-women-only-lane",
        'title'       => "Pink Ride: why we built a women-only lane",
        'excerpt'     => "What women riders told us, and the rules that keep every Pink Ride seat women-only.",
        'category'    => "Pink Ride",
        'tag'         => "Her ride",
        'minutes'     => 6,
        'date'        => "2026-10-07",
        'author'      => "Priya Sharma",
        'author_role' => "Community Lead",
        'cover_style' => [
            'bg'     => "#C72561",
            'ink'    => "#FFE1EC",
            'catInk' => "#C72561",
            'path'   => "M10 120 C 80 120, 100 40, 180 50 S 280 170, 390 90",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
HTML
    ],
    [
        'slug'        => "delhi-to-jaipur-nh48-chai-stops",
        'title'       => "Delhi to Jaipur on NH48: where to stop for chai",
        'excerpt'     => "Five stops co-riders actually agree on, and the one you should skip.",
        'category'    => "Routes",
        'tag'         => "NH48",
        'minutes'     => 7,
        'date'        => "2026-10-03",
        'author'      => "Rohan Mehra",
        'author_role' => "Route Explorer",
        'cover_style' => [
            'bg'     => "#2775BA",
            'ink'    => "#F2C14E",
            'catInk' => "#1B5A93",
            'path'   => "M30 180 L 120 120 L 200 140 L 290 60 L 380 40",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
HTML
    ],
    [
        'slug'        => "offering-seats-commute-first-timers-checklist",
        'title'       => "Offering seats on your commute: a first-timer’s checklist",
        'excerpt'     => "Set the pickup, set the rules, set the price. Ten minutes to your first booking.",
        'category'    => "Drivers",
        'tag'         => "First ride",
        'minutes'     => 4,
        'date'        => "2026-09-29",
        'author'      => "Aman Verma",
        'author_role' => "Driver Host",
        'cover_style' => [
            'bg'     => "#2D7E3C",
            'ink'    => "#F2C14E",
            'catInk' => "#1F6B32",
            'path'   => "M10 90 C 100 30, 200 170, 280 110 S 360 50, 395 60",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
HTML
    ],
    [
        'slug'        => "how-suggested-seat-price-is-calculated",
        'title'       => "How the suggested seat price is worked out",
        'excerpt'     => "Distance, fuel and tolls in, a fair number out, so nobody has to haggle at the pickup.",
        'category'    => "Savings",
        'tag'         => "₹ per seat",
        'minutes'     => 5,
        'date'        => "2026-09-24",
        'author'      => "WayloShare Team",
        'author_role' => "Economics & Policy",
        'cover_style' => [
            'bg'     => "#B8862B",
            'ink'    => "#ffffff",
            'catInk' => "#8A6215",
            'path'   => "M20 170 C 90 120, 140 160, 200 100 S 320 40, 380 30",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
HTML
    ],
    [
        'slug'        => "night-travel-9-habits-careful-co-riders",
        'title'       => "Night travel: 9 habits of careful co-riders",
        'excerpt'     => "Share your trip, check the plate, sit where you are comfortable. Small habits, big difference.",
        'category'    => "Safety",
        'tag'         => "After dark",
        'minutes'     => 6,
        'date'        => "2026-09-19",
        'author'      => "WayloShare Safety Team",
        'author_role' => "Safety & Trust",
        'cover_style' => [
            'bg'     => "#13294B",
            'ink'    => "#7FD28F",
            'catInk' => "#13294B",
            'path'   => "M20 40 C 120 60, 140 150, 220 140 S 330 70, 390 160",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
HTML
    ],
    [
        'slug'        => "bengaluru-to-mysuru-weekend-carpool-playbook",
        'title'       => "Bengaluru to Mysuru: the weekend carpool playbook",
        'excerpt'     => "Leave early, split the expressway toll, be back for Sunday dinner.",
        'category'    => "Routes",
        'tag'         => "Weekend",
        'minutes'     => 5,
        'date'        => "2026-09-12",
        'author'      => "Karthik Rao",
        'author_role' => "Community Contributor",
        'cover_style' => [
            'bg'     => "#2775BA",
            'ink'    => "#F2C14E",
            'catInk' => "#1B5A93",
            'path'   => "M10 120 C 80 120, 100 40, 180 50 S 280 170, 390 90",
        ],
        'body_html'   => <<<'HTML'
<div class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
  <p class="lead">Full article coming soon. Our team is writing and fact-checking route details, stops, and tips for this guide.</p>
  <p>In the meantime, you can search verified rides or download the WayloShare app to connect with co-riders right away.</p>
  <div style="margin: 40px 0; padding: 24px; border-radius: 20px; background: #ffffff; border: 2px solid #E3EEF8">
    <h3 style="margin: 0 0 10px; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px">Looking for rides on this route?</h3>
    <p style="margin: 0 0 18px; color: #52627A; font-size: 17px">Check available seats posted by verified drivers or offer empty seats in your car.</p>
    <a href="/get" style="display: inline-flex; align-items: center; gap: 8px; background: #13294B; color: #ffffff; padding: 12px 22px; border-radius: 14px; text-decoration: none; font-weight: 700">Open in WayloShare</a>
  </div>
</div>
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
