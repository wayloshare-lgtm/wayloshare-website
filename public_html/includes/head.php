<?php
/**
 * WayloShare Global Head Template
 */

$cfg = config();
$baseUrl = rtrim($cfg['base_url'] ?? 'https://www.wayloshare.com', '/');

$pageTitle = !empty($page_title) ? $page_title : ($cfg['site_name'] . ' | Verified carpooling for India');
$pageDesc = !empty($page_description) ? $page_description : 'WayloShare is verified carpooling for India: share a seat, split the cost with fares capped per km, and ride women-only with Pink Ride. Free on iPhone and Android.';
$canonical = !empty($canonical_url) ? $canonical_url : ($baseUrl . ($current_page === 'home' ? '/' : '/' . ltrim($current_page ?? '', '/')));
$ogImg = !empty($og_image) ? $og_image : ($baseUrl . '/assets/img/og.jpg');
$themeColor = ($current_page === 'pink-ride') ? '#C72561' : (($current_page === 'blog' || $current_page === 'blog-post') ? '#13294B' : '#2775BA');
?>
<!DOCTYPE html>
<html lang="en" data-page="<?= e($current_page ?? 'home') ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDesc) ?>">
<meta name="theme-color" content="<?= e($themeColor) ?>">
<?php if (!empty($noindex)): ?>
<meta name="robots" content="noindex, nofollow">
<?php else: ?>
<meta name="robots" content="index, follow">
<?php endif; ?>
<link rel="canonical" href="<?= e($canonical) ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="<?= ($current_page === 'blog-post') ? 'article' : 'website' ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDesc) ?>">
<meta property="og:image" content="<?= e($ogImg) ?>">
<meta property="og:site_name" content="<?= e($cfg['site_name']) ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?= e($canonical) ?>">
<meta name="twitter:title" content="<?= e($pageTitle) ?>">
<meta name="twitter:description" content="<?= e($pageDesc) ?>">
<meta name="twitter:image" content="<?= e($ogImg) ?>">

<!-- Favicon -->
<link rel="icon" type="image/png" href="<?= asset('assets/img/logo.png') ?>">
<link rel="apple-touch-icon" href="<?= asset('assets/img/logo.png') ?>">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:wght@500;600;700&family=Mukta:wght@400;500;600;700&family=Kalam:wght@400;700&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" href="<?= asset('assets/css/base.css') ?>">
<?php if (!empty($page_css)): ?>
<link rel="stylesheet" href="<?= asset('assets/css/' . $page_css) ?>">
<?php endif; ?>

<!-- JSON-LD Schemas -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "<?= e($cfg['company']) ?>",
  "alternateName": "<?= e($cfg['site_name']) ?>",
  "url": "<?= e($baseUrl) ?>",
  "logo": "<?= e($baseUrl) ?>/assets/img/logo.png",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Sec-2 Model Town Gangyal",
    "addressLocality": "Jammu",
    "addressRegion": "Jammu & Kashmir",
    "postalCode": "180010",
    "addressCountry": "IN"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "email": "<?= e($cfg['email_to']) ?>",
    "contactType": "customer service"
  }
}
</script>

<?php if (in_array($current_page, ['home', 'download'])): ?>
<script type="application/ld+json">
[
  {
    "@context": "https://schema.org",
    "@type": "MobileApplication",
    "name": "WayloShare",
    "operatingSystem": "iOS",
    "applicationCategory": "TravelApplication",
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "INR"
    },
    "downloadUrl": "<?= e($cfg['app_store']) ?>"
  },
  {
    "@context": "https://schema.org",
    "@type": "MobileApplication",
    "name": "WayloShare",
    "operatingSystem": "Android",
    "applicationCategory": "TravelApplication",
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "INR"
    },
    "downloadUrl": "<?= e($cfg['play_store']) ?>"
  }
]
</script>
<?php endif; ?>

<?php if ($current_page === 'home'): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Is WayloShare a taxi service?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. Drivers are people already making the trip who share empty seats and split travel costs with passengers."
      }
    },
    {
      "@type": "Question",
      "name": "How is the seat price decided?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Fares are capped per kilometre by car type under MoRTH carpooling guidelines. Drivers only recover costs; they don’t make a profit."
      }
    },
    {
      "@type": "Question",
      "name": "Who can use Pink Ride?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pink Ride is for women only — both the driver and every co-passenger."
      }
    },
    {
      "@type": "Question",
      "name": "Is it on iPhone and Android?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes — on the App Store and Google Play."
      }
    }
  ]
}
</script>
<?php endif; ?>

<?php if (!empty($extra_schema)): ?>
<script type="application/ld+json">
<?= json_encode($extra_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
</script>
<?php endif; ?>

</head>
<body>

