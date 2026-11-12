<?php
/**
 * WayloShare Smart App Link Redirector (/get)
 * Detects visitor device, logs click metrics, and redirects to appropriate app store or download page.
 */

require_once __DIR__ . '/includes/functions.php';

// Prevent search engines from indexing the redirect endpoint
header('X-Robots-Tag: noindex, nofollow', true);

// 1. Read & Sanitise Parameters
$from     = trim(filter_input(INPUT_GET, 'from', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$to       = trim(filter_input(INPUT_GET, 'to', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$date     = trim(filter_input(INPUT_GET, 'date', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$seats    = trim(filter_input(INPUT_GET, 'seats', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$mode     = trim(filter_input(INPUT_GET, 'mode', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'find');
if (!in_array($mode, ['find', 'offer', 'pink'], true)) {
    $mode = 'find';
}

$utmSource   = trim(filter_input(INPUT_GET, 'utm_source', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$utmMedium   = trim(filter_input(INPUT_GET, 'utm_medium', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
$utmCampaign = trim(filter_input(INPUT_GET, 'utm_campaign', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

// 2. Detect Device Type
$deviceType = detect_device(); // 'ios', 'android', or 'desktop'

// 3. Log the Click
$ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
$ua = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
$logRow = [
    date('c'),
    $mode,
    $deviceType,
    $from,
    $to,
    $date,
    $seats,
    $utmSource,
    $utmMedium,
    $utmCampaign,
    $ip,
    $ua
];
storage_append_csv('get-clicks.csv', $logRow);

// 4. Determine Destination URL
$cfg = config();
$appStoreUrl  = $cfg['app_store'];
$playStoreUrl = $cfg['play_store'];

/*
 * =========================================================================
 * DEEP LINKING INTEGRATION NOTE:
 * Where to plug in Branch, AppsFlyer OneLink, or Adjust later:
 * 
 * If you adopt an attribution provider (such as Branch.io or AppsFlyer OneLink),
 * replace the direct store links below with your generated Smart OneLink URL:
 * e.g., $oneLink = "https://wayloshare.onelink.me/XXXX?" . http_build_query($_GET);
 * 
 * (Note: Firebase Dynamic Links has been deprecated/shut down by Google and
 * should not be used.)
 * =========================================================================
 */

$destination = '';

if ($deviceType === 'ios') {
    // iPhone / iPad / iPod: Send straight to App Store
    $destination = $appStoreUrl;
} elseif ($deviceType === 'android') {
    // Android: Google Play Store with Install Referrer payload
    // The Android app can parse this referrer string on first launch to restore the search query.
    $referrerParams = array_filter([
        'utm_source'   => $utmSource ?: 'smartlink',
        'utm_medium'   => $utmMedium ?: 'web',
        'utm_campaign' => $utmCampaign ?: 'wayloshare_get',
        'mode'         => $mode,
        'from'         => $from,
        'to'           => $to,
        'date'         => $date,
        'seats'        => $seats
    ]);
    $referrerQuery = http_build_query($referrerParams);
    $separator = (strpos($playStoreUrl, '?') !== false) ? '&' : '?';
    $destination = $playStoreUrl . $separator . 'referrer=' . urlencode($referrerQuery);
} else {
    // Desktop / Laptop / Other: Send to Download page preserving query string
    $passParams = array_filter([
        'mode'         => $mode,
        'from'         => $from,
        'to'           => $to,
        'date'         => $date,
        'seats'        => $seats,
        'utm_source'   => $utmSource,
        'utm_medium'   => $utmMedium,
        'utm_campaign' => $utmCampaign
    ]);
    $queryString = !empty($passParams) ? ('?' . http_build_query($passParams)) : '';
    $destination = url('/download') . $queryString;
}

// 5. Perform 302 Non-Cached Redirect
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
header('Location: ' . $destination, true, 302);
exit;

