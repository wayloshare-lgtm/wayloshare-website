<?php
/**
 * WayloShare Blog Listing (/blog)
 */

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/data/posts.php';

$cfg = config();
$allPosts = get_all_posts();

// Category filter
$validCategories = ['All', 'Safety', 'Pink Ride', 'Technical', 'Savings', 'Guides'];
$selectedCat = trim($_GET['cat'] ?? 'All');
if (!in_array($selectedCat, $validCategories, true)) {
    $selectedCat = 'All';
}

$displayPosts = ($selectedCat === 'All') 
    ? $allPosts 
    : array_values(array_filter($allPosts, fn($p) => $p['category'] === $selectedCat));

$page_title = 'Road Journal | Highway guides and verified travel notes';
$page_description = 'Road Journal by WayloShare: Route guides, travel tips, cost breakdowns and safety notes from people sharing cars across India.';
$current_page = 'blog';
$page_css = 'blog.css';
$page_js = 'blog.js';

// Breadcrumbs Schema
$extra_schema = [
    "@context" => "https://schema.org",
    "@type"    => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type"    => "ListItem",
            "position" => 1,
            "name"     => "Home",
            "item"     => rtrim($cfg['base_url'], '/') . '/'
        ],
        [
            "@type"    => "ListItem",
            "position" => 2,
            "name"     => "Road Journal",
            "item"     => rtrim($cfg['base_url'], '/') . '/blog'
        ]
    ]
];

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #13294B; background: #FBF7EE; min-height: 100vh">

<header style="background: #2775BA; position: relative; z-index: 5">
  <div style="height: 88px" aria-hidden="true"></div>
  <div style="position: relative; height: 70px; margin-top: 18px; overflow: hidden" aria-hidden="true">
    <div style="position: absolute; left: 0; right: 0; bottom: 0; height: 30px; background: #2D7E3C"></div>
    <div style="position: absolute; left: 0; right: 0; bottom: 30px; height: 26px; background: #ffffff"></div>
    <div style="position: absolute; left: 0; right: 0; bottom: 41px; height: 3px; background-image: linear-gradient(90deg, #C9D6E6 0 18px, transparent 18px 34px); background-size: 34px 3px; animation: dash 1.2s linear infinite"></div>
    <div style="position: absolute; left: 0; bottom: 34px; animation: cross 13s linear infinite">
      <svg width="58" height="40" viewBox="0 0 68 46">
        <rect x="4" y="18" width="60" height="22" rx="8" fill="#13294B"></rect>
        <path d="M14 18l7-13h26l7 13z" fill="#13294B"></path>
        <path d="M20 17l5-9h9v9z M37 17v-9h8l5 9z" fill="#9CC8F0"></path>
        <g class="wheel"><circle cx="18" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M18 35v10M13 40h10" stroke="#ffffff" stroke-width="1.5"></path></g>
        <g class="wheel"><circle cx="50" cy="40" r="7" fill="#13294B" stroke="#ffffff" stroke-width="3"></circle><path d="M50 35v10M45 40h10" stroke="#ffffff" stroke-width="1.5"></path></g>
      </svg>
    </div>
  </div>
</header>

<!-- MASTHEAD -->
<section style="padding: 80px clamp(16px, 4vw, 48px) 40px">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; gap: 18px">
    <div style="display: flex; justify-content: space-between; gap: 16px; flex-wrap: wrap; border-bottom: 3px solid #13294B; padding-bottom: 12px; font-size: 16px; font-weight: 700; letter-spacing: 1px">
      <span>THE ROAD JOURNAL</span>
      <span>NOTES FROM INDIA'S HIGHWAYS</span>
      <span>ISSUE 01 · OCT 2026</span>
    </div>
    <div style="position: relative">
      <h1 class="rise" style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(64px, 13vw, 190px); line-height: 0.84; letter-spacing: -6px">Road Journal</h1>
      <span class="hand" style="position: absolute; right: 2%; bottom: -14px; font-size: clamp(22px, 2.4vw, 32px); color: #C72561; transform: rotate(-4deg)">safar ki baatein ✎</span>
    </div>
    <p style="margin: 18px 0 0; font-size: 21px; line-height: 1.5; max-width: 640px; color: #34465F">Route guides, safety notes, and what we learn from people sharing cars every day, across the highways of India.</p>
  </div>
</section>

<?php $featured = $allPosts[0] ?? null; ?>
<?php if ($featured): ?>
<!-- FEATURED GUIDE -->
<section style="padding: 20px clamp(16px, 4vw, 48px) 70px">
  <a href="<?= url('/blog/' . $featured['slug']) ?>" class="feat card" style="max-width: 1280px; margin: 0 auto; flex-direction: row; flex-wrap: wrap; border-color: #13294B; border-width: 3px; text-decoration: none; color: inherit">
    <div style="flex: 999 1 560px; min-width: 0; min-height: 420px; background: #13294B; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 40px">
      <svg viewBox="0 0 700 420" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" style="position: absolute; inset: 0" aria-hidden="true">
        <defs>
          <pattern id="fg" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M40 0H0V40" fill="none" stroke="rgba(255,255,255,0.06)" stroke-width="2"></path>
          </pattern>
        </defs>
        <rect width="700" height="420" fill="url(#fg)"></rect>
        <path d="M80 350 C 150 300, 160 250, 230 230 S 330 170, 380 150 S 520 120, 620 70" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="22" stroke-linecap="round"></path>
        <path class="route" d="M80 350 C 150 300, 160 250, 230 230 S 330 170, 380 150 S 520 120, 620 70" fill="none" stroke="#7FD28F" stroke-width="6" stroke-linecap="round" stroke-dasharray="900"></path>
      </svg>
      <div style="position: relative; z-index: 2; display: flex; flex-direction: column; gap: 16px; max-width: 480px; color: #ffffff">
        <span style="font-size: 14px; font-weight: 800; letter-spacing: 2px; color: #7FD28F; text-transform: uppercase">FEATURED · TRUST ARCHITECTURE</span>
        <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(28px, 3.2vw, 42px); line-height: 1.05">Two-way verification: closing the safety gap on Indian highways.</h3>
        <span style="font-size: 16px; color: #C9D6E6">DigiLocker Government ID + Driving Licence + Facial match for both driver and rider.</span>
      </div>
      <span class="hand" style="position: absolute; left: 24px; top: 20px; font-size: 24px; color: #F2C14E; transform: rotate(-3deg)">must-read ↓</span>
    </div>
    <div style="flex: 1 1 380px; min-width: 0; padding: clamp(24px, 3vw, 44px); display: flex; flex-direction: column; gap: 16px; justify-content: center">
      <div style="display: flex; align-items: center; gap: 12px">
        <span class="stone"><?= e($featured['tag']) ?></span>
        <span style="font-weight: 700; color: #2D7E3C; font-size: 16px; letter-spacing: .6px">FEATURED · <?= strtoupper(e($featured['category'])) ?></span>
      </div>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(32px, 3.4vw, 46px); line-height: 1.02; letter-spacing: -1px"><?= e($featured['title']) ?></h2>
      <p style="margin: 0; font-size: 18px; line-height: 1.55; color: #45566E"><?= e($featured['excerpt']) ?></p>
      <div style="display: flex; align-items: center; gap: 12px; font-size: 15px; color: #52627A">
        <span style="width: 36px; height: 36px; border-radius: 50%; background: #13294B; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px">AS</span>
        <span><b style="color: #13294B"><?= e($featured['author']) ?></b> · <?= e($featured['minutes']) ?> min read · <?= date('d M Y', strtotime($featured['date'])) ?></span>
      </div>
      <span style="align-self: flex-start; font-weight: 700; font-size: 17px; color: #13294B; border-bottom: 3px solid #F2C14E">Read the full article →</span>
    </div>
  </a>
</section>
<?php endif; ?>

<!-- FILTER + GRID -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 110px">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; gap: 30px">
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap">
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 36px; letter-spacing: -.8px">Latest from the road</h2>
      <div role="group" aria-label="Filter by topic" style="display: flex; gap: 8px; flex-wrap: wrap" id="blog-chips">
        <?php foreach ($validCategories as $cat): ?>
        <a href="<?= url('/blog' . ($cat === 'All' ? '' : '?cat=' . urlencode($cat))) ?>" class="chip" data-cat="<?= e($cat) ?>" aria-pressed="<?= $selectedCat === $cat ? 'true' : 'false' ?>">
          <?= e($cat) ?>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

    <div id="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 22px">
      <?php foreach ($allPosts as $p): 
          $isVisible = ($selectedCat === 'All' || $p['category'] === $selectedCat);
      ?>
      <a href="<?= url('/blog/' . $p['slug']) ?>" class="card rise post-card" data-category="<?= e($p['category']) ?>" style="<?= $isVisible ? '' : 'display:none;' ?>">
        <div style="height: 200px; background: <?= e($p['cover_style']['bg']) ?>; position: relative; overflow: hidden">
          <svg viewBox="0 0 400 200" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
            <path d="<?= e($p['cover_style']['path']) ?>" fill="none" stroke="rgba(255,255,255,0.22)" stroke-width="16" stroke-linecap="round"></path>
            <path class="route" d="<?= e($p['cover_style']['path']) ?>" fill="none" stroke="<?= e($p['cover_style']['ink']) ?>" stroke-width="5" stroke-linecap="round"></path>
          </svg>
          <span style="position: absolute; left: 16px; bottom: 14px; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: 20px; color: #ffffff"><?= e($p['tag']) ?></span>
        </div>
        <div style="padding: 22px; display: flex; flex-direction: column; gap: 10px; flex: 1">
          <span style="font-size: 14px; font-weight: 700; letter-spacing: .8px; color: <?= e($p['cover_style']['catInk']) ?>"><?= e(strtoupper($p['category'])) ?></span>
          <h3 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 24px; line-height: 1.15"><?= e($p['title']) ?></h3>
          <p style="margin: 0; font-size: 17px; line-height: 1.5; color: #45566E; flex: 1"><?= e($p['excerpt']) ?></p>
          <span style="font-size: 15px; color: #52627A"><?= e($p['minutes']) ?> min read · <?= date('d M Y', strtotime($p['date'])) ?></span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <p id="empty-posts" style="margin: 0; font-size: 18px; color: #52627A; <?= empty($displayPosts) ? '' : 'display: none;' ?>">No posts in this topic yet.</p>
  </div>
</section>

<!-- NEWSLETTER -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 110px">
  <div style="max-width: 1280px; margin: 0 auto; background: #2D7E3C; color: #ffffff; border-radius: 32px; padding: clamp(28px, 4vw, 56px); display: flex; flex-wrap: wrap; gap: 30px; align-items: center; justify-content: space-between; position: relative; overflow: hidden">
    <div style="display: flex; flex-direction: column; gap: 10px; max-width: 560px">
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: clamp(32px, 3.6vw, 48px); line-height: 1.02">One route guide a month.<br>No spam, just roads.</h2>
      <span class="hand" style="font-size: 22px; color: #F2C14E; transform: rotate(-2deg); align-self: flex-start">(and the occasional dhaba tip)</span>
    </div>
    <form style="flex: 1 1 360px; max-width: 520px; display: flex; gap: 10px; flex-wrap: wrap" action="<?= url('/contact') ?>" method="get">
      <label for="nl" style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">Email address</label>
      <input id="nl" name="email" type="email" placeholder="you@example.com" style="flex: 1 1 240px; min-width: 0; font: 500 18px 'Mukta', sans-serif; padding: 16px 18px; border-radius: 16px; border: 0; outline: 3px solid transparent; color: #13294B">
      <button type="submit" style="border: 0; background: #13294B; color: #ffffff; font: 700 18px 'Familjen Grotesk', sans-serif; padding: 16px 24px; border-radius: 16px; cursor: pointer">Subscribe</button>
    </form>
  </div>
</section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

