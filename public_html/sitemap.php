<?php
/**
 * Dynamic XML Sitemap Generator (sitemap.php)
 * Outputs standard XML sitemap for search engine indexing.
 */

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/data/posts.php';

$cfg = config();
$baseUrl = rtrim($cfg['base_url'], '/');

header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <!-- Core Static Pages -->
  <url>
    <loc><?= e($baseUrl) ?>/</loc>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc><?= e($baseUrl) ?>/pink-ride</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc><?= e($baseUrl) ?>/download</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc><?= e($baseUrl) ?>/about</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc><?= e($baseUrl) ?>/contact</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc><?= e($baseUrl) ?>/blog</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>

  <!-- Blog Posts -->
  <?php foreach (get_all_posts() as $post): ?>
  <url>
    <loc><?= e($baseUrl . '/blog/' . $post['slug']) ?></loc>
    <lastmod><?= date('Y-m-d', strtotime($post['date'])) ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <?php endforeach; ?>
</urlset>

