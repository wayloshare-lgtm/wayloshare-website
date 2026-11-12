<?php
/**
 * WayloShare Core Helper Functions
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Global configuration instance.
 */
function config(?string $key = null, $default = null) {
    static $config = null;
    if ($config === null) {
        $configFile = __DIR__ . '/config.php';
        $config = file_exists($configFile) ? require $configFile : [];
    }
    if ($key === null) {
        return $config;
    }
    return $config[$key] ?? $default;
}

/**
 * Escape output for HTML context.
 */
function e(?string $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate clean site URL.
 */
function url(string $path = '/'): string {
    $path = trim($path);
    if ($path === '' || $path === '/') {
        return '/';
    }
    if (preg_match('#^https?://#', $path)) {
        return $path;
    }
    return '/' . ltrim($path, '/');
}

/**
 * Check if the current page matches given route.
 */
function is_page(string $page, string $current): bool {
    return $page === $current;
}

/**
 * Generate asset URL with cache-busting filemtime query parameter.
 */
function asset(string $path): string {
    $cleanPath = ltrim($path, '/');
    $webRoot = dirname(__DIR__);
    $fullPath = $webRoot . '/' . $cleanPath;
    $v = file_exists($fullPath) ? filemtime($fullPath) : '1';
    return '/' . $cleanPath . '?v=' . $v;
}

/**
 * Generate or retrieve CSRF token from session.
 */
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Output a hidden CSRF token input field.
 */
function csrf_field(): string {
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

/**
 * Verify submitted CSRF token.
 */
function verify_csrf(?string $token): bool {
    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Detect client device type based on User-Agent.
 * Returns 'ios', 'android', or 'desktop'.
 */
function detect_device(): string {
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (preg_match('/(iPhone|iPad|iPod)/i', $ua)) {
        return 'ios';
    }
    if (preg_match('/Android/i', $ua)) {
        return 'android';
    }
    return 'desktop';
}

/**
 * Format numbers using Indian numbering system (e.g. 1,103, 2,50,000).
 */
function format_inr(float|int $num): string {
    $num = round($num);
    $str = (string)abs($num);
    $sign = $num < 0 ? '-' : '';
    
    if (strlen($str) <= 3) {
        return $sign . $str;
    }
    
    $lastThree = substr($str, -3);
    $remaining = substr($str, 0, -3);
    
    // Add commas every 2 digits for Indian numbering
    $remaining = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $remaining);
    
    return $sign . $remaining . ',' . $lastThree;
}

/**
 * Append row to CSV file in storage safely with flock.
 */
function storage_append_csv(string $filename, array $row): bool {
    $dir = dirname(__DIR__) . '/storage';
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    $path = $dir . '/' . $filename;
    $fp = @fopen($path, 'a');
    if (!$fp) {
        return false;
    }
    flock($fp, LOCK_EX);
    fputcsv($fp, $row);
    flock($fp, LOCK_UN);
    fclose($fp);
    return true;
}

