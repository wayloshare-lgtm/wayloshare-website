<?php
/**
 * WayloShare Global Navigation (Liquid-Glass Island Bar + Full-Screen Route-Map Menu)
 */

$cfg = config();
$currentPage = $current_page ?? 'home';

// Page labels and dot colors
$pageDetails = [
    'home'       => ['label' => 'Home',        'dot' => '#7FD28F'],
    'pink-ride'  => ['label' => 'Pink Ride',   'dot' => '#FF8FB8'],
    'about'      => ['label' => 'About',       'dot' => '#7FD28F'],
    'blog'       => ['label' => 'Road Journal','dot' => '#7FD28F'],
    'blog-post'  => ['label' => 'Road Journal','dot' => '#7FD28F'],
    'contact'    => ['label' => 'Contact',     'dot' => '#7FD28F'],
    'download'   => ['label' => 'Get the app', 'dot' => '#7FD28F'],
    '404'        => ['label' => 'Not Found',   'dot' => '#F2C14E']
];

$curInfo = $pageDetails[$currentPage] ?? ['label' => 'WayloShare', 'dot' => '#7FD28F'];

// Route stops for the full-screen route-map menu
$menuStops = [
    [
        'id'    => 'home',
        'km'    => '0',
        'url'   => url('/'),
        'name'  => 'Home',
        'desc'  => 'Search and book a shared seat',
        'match' => ($currentPage === 'home')
    ],
    [
        'id'    => 'pink-ride',
        'km'    => '2',
        'url'   => url('/pink-ride'),
        'name'  => 'Pink Ride',
        'desc'  => 'Women-only rides, every seat verified',
        'match' => ($currentPage === 'pink-ride')
    ],
    [
        'id'    => 'about',
        'km'    => '4',
        'url'   => url('/about'),
        'name'  => 'About',
        'desc'  => 'Our story, building for India',
        'match' => ($currentPage === 'about')
    ],
    [
        'id'    => 'blog',
        'km'    => '6',
        'url'   => url('/blog'),
        'name'  => 'Road Journal',
        'desc'  => 'Route guides and safety notes',
        'match' => ($currentPage === 'blog' || $currentPage === 'blog-post')
    ],
    [
        'id'    => 'contact',
        'km'    => '8',
        'url'   => url('/contact'),
        'name'  => 'Contact',
        'desc'  => 'Talk to the team',
        'match' => ($currentPage === 'contact')
    ],
    [
        'id'    => 'download',
        'km'    => '10',
        'url'   => url('/download'),
        'name'  => 'Get the app',
        'desc'  => 'Free on iPhone and Android',
        'match' => ($currentPage === 'download')
    ]
];
?>

<input type="checkbox" id="navt" class="navt" aria-label="Open menu">
<div class="island-wrap">
  <nav class="island" aria-label="Main">
    <a href="<?= url('/') ?>" class="isl-logo" aria-label="WayloShare home"><img src="<?= asset('assets/img/logo.png') ?>" alt="WayloShare"></a>
    <span class="isl-now"><span class="isl-dot" style="background: <?= e($curInfo['dot']) ?>"></span><?= e($curInfo['label']) ?></span>
    <a href="<?= url('/get') ?>" class="isl-cta">Get app</a>
    <label for="navt" class="isl-menu"><span class="bars" aria-hidden="true"></span><span class="isl-menu-t">Menu</span></label>
  </nav>
</div>

<div class="rmenu" role="dialog" aria-label="Site menu">
  <div class="rm-in">
    <div class="rm-top">
      <span class="rm-kick">Why Go Solo? · Where to?</span>
      <label for="navt" class="rm-close" aria-label="Close menu"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"></path></svg></label>
    </div>
    <div class="rm-grid">
      <ol class="rm-road">
        <?php foreach ($menuStops as $i => $stop): ?>
        <li class="rm-stop<?= $stop['match'] ? ' here' : '' ?>" style="--i: <?= $i ?>">
          <a href="<?= e($stop['url']) ?>"<?= $stop['match'] ? ' aria-current="page"' : '' ?>>
            <span class="rm-stone"><b><?= e($stop['km']) ?></b><small>KM</small></span>
            <?php if ($stop['match']): ?>
            <svg class="rm-car" width="34" height="50" viewBox="0 0 36 52" aria-hidden="true">
              <rect x="3" y="3" width="30" height="46" rx="11" fill="#F2C14E"></rect>
              <rect x="7" y="9" width="22" height="11" rx="4" fill="#13294B"></rect>
              <rect x="7" y="34" width="22" height="8" rx="3" fill="#13294B" opacity=".7"></rect>
            </svg>
            <?php endif; ?>
            <span class="rm-txt">
              <span class="rm-name"><?= e($stop['name']) ?></span>
              <span class="rm-desc"><?= $stop['match'] ? 'You are here · ' : '' ?><?= e($stop['desc']) ?></span>
            </span>
            <svg class="rm-arrow" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M5 12h14M13 6l6 6-6 6"></path>
            </svg>
          </a>
        </li>
        <?php endforeach; ?>
      </ol>
      <aside class="rm-side">
        <div class="rm-card">
          <span class="rm-card-k">Why Go Solo? · Verified rides</span>
          <span class="rm-card-h">Every driver, rider and co-rider is verified.</span>
          <div class="rm-stores">
            <a href="<?= e($cfg['app_store']) ?>" target="_blank" rel="noopener">App Store</a>
            <a href="<?= e($cfg['play_store']) ?>" target="_blank" rel="noopener">Google Play</a>
          </div>
        </div>
        <div class="rm-meta">
          <a href="mailto:<?= e($cfg['email_to']) ?>"><?= e($cfg['email_to']) ?></a>
          <span>Made in India with love</span>
        </div>
      </aside>
    </div>
  </div>
</div>

