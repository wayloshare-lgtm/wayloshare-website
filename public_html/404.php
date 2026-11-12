<?php
/**
 * WayloShare 404 Not Found Page
 */

http_response_code(404);
require_once __DIR__ . '/includes/functions.php';

$page_title = 'Page Not Found (404) | WayloShare';
$page_description = 'The road ended here. The page you are looking for has moved, been deleted, or never existed.';
$current_page = '404';
$page_css = '404.css';
$noindex = true;

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main class="error-hero">
  <div style="max-width: 600px; display: flex; flex-direction: column; align-items: center">
    <span class="error-code">404</span>
    <h1 class="error-title">Wrong turn on the highway</h1>
    <p class="error-desc">We couldn't find the page you were looking for. It may have been moved, renamed, or perhaps you took a slight detour.</p>
    <div style="display: flex; gap: 14px; flex-wrap: wrap; justify-content: center">
      <a href="<?= url('/') ?>" class="error-cta">Back to Home</a>
      <a href="<?= url('/blog') ?>" style="display: inline-flex; align-items: center; gap: 8px; border: 2px solid #13294B; color: #13294B; text-decoration: none; font: 700 18px 'Familjen Grotesk', sans-serif; padding: 12px 24px; border-radius: 16px">Read Road Journal</a>
    </div>
  </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

