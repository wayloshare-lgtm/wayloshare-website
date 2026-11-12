<?php
/**
 * WayloShare Blog Article Page (/blog/{slug})
 */

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/data/posts.php';

$cfg = config();

// 1. Handle Feedback POST API
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_GET['feedback']) || isset($_POST['vote']))) {
    header('Content-Type: application/json');
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true) ?? $_POST;

    $slug = trim($data['slug'] ?? $_GET['slug'] ?? 'unknown');
    $vote = trim($data['vote'] ?? '');
    if (!in_array($vote, ['yes', 'no'], true)) {
        $vote = 'unknown';
    }

    $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';

    storage_append_csv('feedback.csv', [
        date('c'),
        $slug,
        $vote,
        $ip,
        $ua
    ]);

    echo json_encode(['ok' => true]);
    exit;
}

// 2. Lookup Post by Slug
$slug = trim($_GET['slug'] ?? '');
$post = get_post_by_slug($slug);

if (!$post) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}

$relatedPosts = get_related_posts($post['slug'], $post['category'], 3);

$page_title = $post['title'] . ' | Road Journal';
$page_description = $post['excerpt'];
$current_page = 'blog-post';
$canonical_url = rtrim($cfg['base_url'], '/') . '/blog/' . $post['slug'];
$page_css = 'post.css';
$page_js = 'post.js';

// Article & Breadcrumbs Schema
$extra_schema = [
    [
        "@context"      => "https://schema.org",
        "@type"         => "BlogPosting",
        "headline"      => $post['title'],
        "description"   => $post['excerpt'],
        "datePublished" => $post['date'],
        "author"        => [
            "@type" => "Person",
            "name"  => $post['author']
        ],
        "publisher"     => [
            "@type" => "Organization",
            "name"  => $cfg['company'],
            "logo"  => [
                "@type" => "ImageObject",
                "url"   => rtrim($cfg['base_url'], '/') . '/assets/img/logo.png'
            ]
        ],
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id"   => $canonical_url
        ]
    ],
    [
        "@context"        => "https://schema.org",
        "@type"           => "BreadcrumbList",
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
            ],
            [
                "@type"    => "ListItem",
                "position" => 3,
                "name"     => $post['title'],
                "item"     => $canonical_url
            ]
        ]
    ]
];

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #13294B; background: #FBF7EE; min-height: 100vh">

<!-- Reading Progress Bar -->
<div class="progress" id="read-progress" aria-hidden="true"></div>

<!-- HERO -->
<header style="background: #13294B; color: #ffffff; position: relative; overflow: hidden">
  <div style="height: 88px" aria-hidden="true"></div>

  <div style="max-width: 1280px; margin: 0 auto; padding: 50px clamp(16px, 4vw, 48px) 90px; display: flex; flex-direction: column; gap: 22px; position: relative">
    <a href="<?= url('/blog') ?>" style="color: #9CC8F0; font-weight: 700; text-decoration: none; font-size: 16px">← Road Journal</a>
    
    <div style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap">
      <span class="stone" style="width: 52px; height: 64px; font-size: 14px"><?= e($post['tag']) ?></span>
      <span style="font-weight: 700; letter-spacing: 1px; color: #7FD28F"><?= e(strtoupper($post['category'])) ?> · <?= e(strtoupper($post['type'] ?? 'ARTICLE')) ?></span>
    </div>

    <h1 class="rise" style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(44px, 6.4vw, 92px); line-height: 0.96; letter-spacing: -2.4px; max-width: 1060px">
      <?= e($post['title']) ?>
    </h1>

    <div style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap; font-size: 17px; color: #C9D6E6">
      <span style="width: 46px; height: 46px; border-radius: 50%; background: #13294B; border: 2px solid #ffffff; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 16px">WS</span>
      <span><b style="color: #ffffff"><?= e($post['author']) ?></b> · <?= e($post['author_role']) ?></span>
      <span>·</span>
      <span><?= date('d M Y', strtotime($post['date'])) ?></span>
      <span>·</span>
      <span><?= e($post['minutes']) ?> min read</span>
    </div>

    <span class="hand" style="position: absolute; right: clamp(16px, 4vw, 48px); bottom: 30px; font-size: 26px; color: #F2C14E; transform: rotate(-4deg)">verified highway rides ✎</span>
  </div>
</header>

<!-- ARTICLE & SIDEBAR -->
<main style="padding: 70px clamp(16px, 4vw, 48px) 90px">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 56px; align-items: flex-start">

    <!-- ARTICLE BODY -->
    <article class="prose" style="flex: 999 1 620px; min-width: 0; max-width: 760px">
      <?= $post['body_html'] ?>

      <!-- WAS THIS USEFUL FEEDBACK -->
      <div id="feedback-widget" style="margin: 48px 0 20px; padding: 26px 30px; border-radius: 24px; background: #13294B; color: #ffffff; display: flex; flex-direction: column; gap: 14px" data-slug="<?= e($post['slug']) ?>">
        <div id="fb-prompt" style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap">
          <span style="font-size: 19px; font-weight: 700">Was this guide useful?</span>
          <button type="button" id="btn-vote-yes" style="border: 0; background: #2D7E3C; color: #ffffff; font: 700 17px 'Mukta', sans-serif; padding: 10px 18px; border-radius: 12px; cursor: pointer">Yes</button>
          <button type="button" id="btn-vote-no" style="border: 2px solid rgba(255,255,255,0.4); background: transparent; color: #ffffff; font: 700 17px 'Mukta', sans-serif; padding: 8px 18px; border-radius: 12px; cursor: pointer">Not really</button>
        </div>
        <div id="fb-thanks" style="display: none">
          <span class="hand" id="fb-thanks-txt" style="font-size: 26px; color: #F2C14E">thanks! see you on the road.</span>
        </div>
        <div style="display: flex; gap: 8px; align-items: center">
          <span style="font-size: 14px; color: #9CC8F0">Feedback is private and helps us keep guides accurate.</span>
        </div>
      </div>
    </article>

    <!-- STICKY SIDEBAR -->
    <aside style="flex: 1 1 300px; min-width: 0; position: sticky; top: 110px; display: flex; flex-direction: column; gap: 22px">
      <?php if (!empty($post['toc'])): ?>
      <nav class="toc" aria-label="In this article" style="display: flex; flex-direction: column; gap: 6px; background: #ffffff; padding: 22px; border-radius: 20px; border: 1.5px solid #D5E0EC">
        <span style="font-size: 13px; font-weight: 800; letter-spacing: 1.2px; color: #2775BA; text-transform: uppercase">IN THIS ARTICLE</span>
        <?php foreach ($post['toc'] as $anchor => $label): ?>
        <a href="#<?= e($anchor) ?>" style="color: #13294B; text-decoration: none; font-size: 15px; line-height: 1.4; padding: 3px 0"><?= e($label) ?></a>
        <?php endforeach; ?>
      </nav>
      <?php endif; ?>

      <div style="border-radius: 26px; background: #13294B; color: #ffffff; padding: 26px; display: flex; flex-direction: column; gap: 14px; position: relative; overflow: hidden">
        <div style="position: absolute; width: 260px; height: 260px; border-radius: 50%; background: #2775BA; filter: blur(70px); right: -90px; bottom: -110px; opacity: .7" aria-hidden="true"></div>
        <span style="position: relative; font-size: 13px; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; color: #7FD28F">WHY GO SOLO?</span>
        <span style="position: relative; font-family: 'Familjen Grotesk', sans-serif; font-size: 26px; font-weight: 700; line-height: 1.15">Travel verified across Indian highways.</span>
        <p style="position: relative; margin: 0; font-size: 15px; line-height: 1.5; color: #C9D6E6">Join thousands of verified commuters saving money and travelling safely on WayloShare.</p>
        <a href="<?= url('/download') ?>" class="glass" style="position: relative; color: #ffffff; text-decoration: none; text-align: center; font-weight: 700; font-size: 17px; padding: 13px; border-radius: 14px; background: #2775BA">Get the WayloShare App</a>
        <span class="hand" style="position: relative; font-size: 18px; color: #F2C14E">free on iOS &amp; Android</span>
      </div>
    </aside>

  </div>
</main>

<!-- KEEP READING -->
<section style="padding: 0 clamp(16px, 4vw, 48px) 110px">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; gap: 26px; border-top: 3px solid #13294B; padding-top: 40px">
    <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 36px; letter-spacing: -.8px">Keep reading</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px">
      <?php foreach ($relatedPosts as $rel): ?>
      <a href="<?= url('/blog/' . $rel['slug']) ?>" class="rel">
        <span style="font-size: 14px; font-weight: 700; letter-spacing: .8px; color: <?= e($rel['cover_style']['catInk']) ?>">
          <?= e(strtoupper($rel['category'])) ?>
        </span>
        <span style="font-family: 'Familjen Grotesk', sans-serif; font-size: 24px; font-weight: 700; line-height: 1.15">
          <?= e($rel['title']) ?>
        </span>
        <span style="font-size: 15px; color: #52627A">
          <?= e($rel['minutes']) ?> min read
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</div>

<?php
require_once __DIR__ . '/includes/sticky-bar.php';
require_once __DIR__ . '/includes/footer.php';
?>

