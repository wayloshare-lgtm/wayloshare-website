<?php
/**
 * WayloShare Contact Page (/contact)
 */

require_once __DIR__ . '/includes/functions.php';

$cfg = config();
$errors = [];
$values = [
    'name'    => '',
    'phone'   => '',
    'email'   => '',
    'topic'   => 'A ride or booking',
    'message' => ''
];
$sent = (isset($_GET['sent']) && $_GET['sent'] === '1');

// Process Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Honeypot check
    if (!empty($_POST['website_url'])) {
        // Silent bot discard
        header('Location: ' . url('/contact?sent=1'));
        exit;
    }

    // 2. Minimum fill time check (3 seconds)
    $formStart = isset($_POST['form_time']) ? (int)$_POST['form_time'] : 0;
    if ($formStart === 0 || (time() - $formStart) < 3) {
        $errors['form'] = 'Please take a moment before submitting the form.';
    }

    // 3. CSRF Verification
    if (!verify_csrf($_POST['csrf_token'] ?? '')) {
        $errors['form'] = 'Security session expired. Please refresh and try again.';
    }

    // 4. Rate Limiting (5 messages per hour per session)
    if (!isset($_SESSION['contact_attempts'])) {
        $_SESSION['contact_attempts'] = [];
    }
    // Remove attempts older than 1 hour
    $oneHourAgo = time() - 3600;
    $_SESSION['contact_attempts'] = array_filter(
        $_SESSION['contact_attempts'],
        fn($t) => $t > $oneHourAgo
    );
    if (count($_SESSION['contact_attempts']) >= 5) {
        $errors['form'] = 'Too many messages sent. Please wait an hour before submitting again, or email us directly.';
    }

    // 5. Read and Sanitize Inputs
    $values['name']    = trim(strip_tags($_POST['name'] ?? ''));
    $values['phone']   = trim(strip_tags($_POST['phone'] ?? ''));
    $values['email']   = trim(strip_tags($_POST['email'] ?? ''));
    $values['topic']   = trim(strip_tags($_POST['topic'] ?? ''));
    $values['message'] = trim(strip_tags($_POST['message'] ?? ''));

    // 6. Validation
    if ($values['name'] === '') {
        $errors['name'] = 'Please enter your name.';
    }

    if ($values['message'] === '') {
        $errors['message'] = 'Please enter your message.';
    } elseif (mb_strlen($values['message']) > 2000) {
        $errors['message'] = 'Message must be under 2,000 characters.';
    }

    $hasValidEmail = false;
    if ($values['email'] !== '') {
        if (filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
            $hasValidEmail = true;
        } else {
            $errors['email'] = 'Please enter a valid email address.';
        }
    }

    $hasValidPhone = false;
    if ($values['phone'] !== '') {
        // Strip out spaces, dashes, parentheses and +91
        $cleanPhone = preg_replace('/[\s\-\(\)]+/', '', $values['phone']);
        $cleanPhone = preg_replace('/^(\+91|91|0)/', '', $cleanPhone);
        if (preg_match('/^[6-9]\d{9}$/', $cleanPhone)) {
            $hasValidPhone = true;
        } else {
            $errors['phone'] = 'Please enter a valid 10-digit Indian phone number.';
        }
    }

    if (!$hasValidEmail && !$hasValidPhone && !isset($errors['email']) && !isset($errors['phone'])) {
        $errors['email'] = 'Please provide either a valid email address or phone number.';
    }

    // 7. If No Errors: Send Email & Backup to CSV
    if (empty($errors)) {
        // Log to CSV
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';
        $csvRow = [
            date('c'),
            $values['name'],
            $values['phone'],
            $values['email'],
            $values['topic'],
            $values['message'],
            $ip,
            $ua
        ];
        storage_append_csv('messages.csv', $csvRow);

        // Record timestamp for rate limiting
        $_SESSION['contact_attempts'][] = time();

        // Send Email via mail()
        $to = $cfg['email_to'];
        $subject = 'New WayloShare Message: ' . $values['topic'] . ' from ' . $values['name'];
        $body = "Name: " . $values['name'] . "\n"
              . "Phone: " . $values['phone'] . "\n"
              . "Email: " . $values['email'] . "\n"
              . "Topic: " . $values['topic'] . "\n\n"
              . "Message:\n" . $values['message'] . "\n\n"
              . "Submitted at: " . date('Y-m-d H:i:s') . "\n"
              . "IP Address: " . $ip . "\n";

        $fromDomain = parse_url($cfg['base_url'], PHP_URL_HOST) ?: 'wayloshare.com';
        $fromEmail = 'no-reply@' . preg_replace('/^www\./', '', $fromDomain);

        $headers = [
            'From'         => "WayloShare Website <{$fromEmail}>",
            'X-Mailer'     => 'PHP/' . phpversion(),
            'Content-Type' => 'text/plain; charset=UTF-8'
        ];
        if ($hasValidEmail) {
            $headers['Reply-To'] = $values['email'];
        }

        $headerStr = '';
        foreach ($headers as $k => $v) {
            $headerStr .= "{$k}: {$v}\r\n";
        }

        @mail($to, $subject, $body, $headerStr);

        // PRG Pattern Redirect
        header('Location: ' . url('/contact?sent=1'), true, 303);
        exit;
    }
}

// Meta details for head.php
$page_title = 'Contact WayloShare | Talk to our team in Jammu';
$page_description = 'Have questions about a ride, payment, driver verification or Pink Ride? Talk to a real person from the WayloShare team in Jammu.';
$current_page = 'contact';
$page_css = 'contact.css';

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<div style="font-family: 'Mukta', system-ui, sans-serif; color: #13294B; background: #F3F7FB; min-height: 100vh">

<header style="position: relative; background: #2775BA; color: #ffffff; overflow: hidden; padding-bottom: 220px">
  <div class="blob" style="position: absolute; width: 600px; height: 600px; border-radius: 50%; background: #13294B; opacity: 0.55; filter: blur(100px); left: -160px; top: 60px" aria-hidden="true"></div>
  <div style="height: 88px" aria-hidden="true"></div>
  <div style="position: relative; max-width: 1280px; margin: 0 auto; padding: 64px clamp(16px, 4vw, 48px) 0; display: flex; flex-direction: column; gap: 20px">
    <h1 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-weight: 700; font-size: clamp(48px, 7vw, 96px); line-height: 0.96; letter-spacing: -2.4px">Talk to a real person.</h1>
    <p style="margin: 0; font-size: 21px; line-height: 1.5; max-width: 600px; color: #E3EEF8">Questions about a ride, a payment, driver verification or a partnership — the WayloShare team in Jammu reads every message.</p>
  </div>
</header>

<section style="padding: 0 clamp(16px, 4vw, 48px) 110px; margin-top: -170px; position: relative; z-index: 2">
  <div style="max-width: 1280px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 22px; align-items: flex-start">
    <div class="glass-light" style="flex: 999 1 560px; min-width: 0; border-radius: 30px; padding: clamp(24px, 3vw, 40px)">
      
      <?php if ($sent): ?>
      <!-- SUCCESS STATE -->
      <div class="rise" style="display: flex; flex-direction: column; align-items: flex-start; gap: 14px; padding: 40px 0">
        <span style="width: 64px; height: 64px; border-radius: 20px; background: #2D7E3C; display: flex; align-items: center; justify-content: center">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 6L9 17l-5-5"></path>
          </svg>
        </span>
        <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 36px">Message sent</h2>
        <p style="margin: 0; font-size: 18px; color: #45566E; line-height: 1.5">We'll reply to you within <?= e($cfg['response_time']) ?>. For anything urgent, call <?= e($cfg['phone']) ?>.</p>
        <a href="<?= url('/contact') ?>" style="display: inline-block; text-decoration: none; border: 2px solid #D5E0EC; background: #ffffff; color: #13294B; font: 700 17px 'Mukta', sans-serif; padding: 12px 20px; border-radius: 14px; cursor: pointer">Send another message</a>
      </div>
      <?php else: ?>

      <!-- FORM STATE -->
      <form method="post" action="<?= url('/contact') ?>" style="display: flex; flex-direction: column; gap: 18px" novalidate>
        <?= csrf_field() ?>
        <input type="hidden" name="form_time" value="<?= time() ?>">
        
        <!-- Honeypot field (hidden from real users) -->
        <div style="position: absolute; left: -9999px; top: -9999px" aria-hidden="true">
          <label for="website_url">Leave this empty</label>
          <input type="text" name="website_url" id="website_url" tabindex="-1" autocomplete="off">
        </div>

        <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 32px">Send us a message</h2>

        <?php if (!empty($errors['form'])): ?>
        <div style="padding: 12px 16px; border-radius: 12px; background: #FDE8E8; color: #9B1C1C; font-size: 15px; font-weight: 600">
          <?= e($errors['form']) ?>
        </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px">
          <div class="f">
            <label for="cn">Your name <span style="color:#C72561">*</span></label>
            <input id="cn" name="name" value="<?= e($values['name']) ?>" autocomplete="name" required <?= isset($errors['name']) ? 'aria-invalid="true" aria-describedby="cn-err"' : '' ?> style="<?= isset($errors['name']) ? 'border-color: #C72561;' : '' ?>">
            <?php if (isset($errors['name'])): ?>
            <span id="cn-err" style="color: #C72561; font-size: 13px; font-weight: 600"><?= e($errors['name']) ?></span>
            <?php endif; ?>
          </div>

          <div class="f">
            <label for="cp">Phone</label>
            <input id="cp" name="phone" type="tel" value="<?= e($values['phone']) ?>" autocomplete="tel" placeholder="+91" <?= isset($errors['phone']) ? 'aria-invalid="true" aria-describedby="cp-err"' : '' ?> style="<?= isset($errors['phone']) ? 'border-color: #C72561;' : '' ?>">
            <?php if (isset($errors['phone'])): ?>
            <span id="cp-err" style="color: #C72561; font-size: 13px; font-weight: 600"><?= e($errors['phone']) ?></span>
            <?php endif; ?>
          </div>

          <div class="f">
            <label for="ce">Email</label>
            <input id="ce" name="email" type="email" value="<?= e($values['email']) ?>" autocomplete="email" <?= isset($errors['email']) ? 'aria-invalid="true" aria-describedby="ce-err"' : '' ?> style="<?= isset($errors['email']) ? 'border-color: #C72561;' : '' ?>">
            <?php if (isset($errors['email'])): ?>
            <span id="ce-err" style="color: #C72561; font-size: 13px; font-weight: 600"><?= e($errors['email']) ?></span>
            <?php endif; ?>
          </div>

          <div class="f">
            <label for="ct">Topic</label>
            <select id="ct" name="topic">
              <?php
              $topics = [
                  'A ride or booking',
                  'Payment or refund',
                  'Driver verification',
                  'Pink Ride',
                  'Partnership or press',
                  'Something else'
              ];
              foreach ($topics as $t):
              ?>
              <option value="<?= e($t) ?>" <?= $values['topic'] === $t ? 'selected' : '' ?>><?= e($t) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="f">
          <label for="cm">Message <span style="color:#C72561">*</span></label>
          <textarea id="cm" name="message" rows="5" required <?= isset($errors['message']) ? 'aria-invalid="true" aria-describedby="cm-err"' : '' ?> style="<?= isset($errors['message']) ? 'border-color: #C72561;' : '' ?>"><?= e($values['message']) ?></textarea>
          <?php if (isset($errors['message'])): ?>
          <span id="cm-err" style="color: #C72561; font-size: 13px; font-weight: 600"><?= e($errors['message']) ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" style="align-self: flex-start; border: 0; background: #13294B; color: #ffffff; font: 700 19px 'Familjen Grotesk', sans-serif; padding: 16px 28px; border-radius: 16px; cursor: pointer; display: flex; align-items: center; gap: 10px">
          Send message 
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14M13 6l6 6-6 6"></path>
          </svg>
        </button>
      </form>
      <?php endif; ?>

    </div>

    <div style="flex: 1 1 340px; min-width: 0; display: flex; flex-direction: column; gap: 14px">
      <a href="tel:<?= e($cfg['phone']) ?>" class="lift" style="background: #13294B; color: #ffffff; text-decoration: none; border-radius: 24px; padding: 24px; display: flex; gap: 16px; align-items: center">
        <span style="width: 52px; height: 52px; flex-shrink: 0; border-radius: 16px; background: rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"></path>
          </svg>
        </span>
        <span style="display: flex; flex-direction: column">
          <span style="font-size: 15px; color: #C9D6E6">Call us</span>
          <span style="font-size: 22px; font-weight: 700"><?= e($cfg['phone']) ?></span>
        </span>
      </a>

      <a href="https://wa.me/<?= e($cfg['whatsapp']) ?>" target="_blank" rel="noopener" class="lift" style="background: #2D7E3C; color: #ffffff; text-decoration: none; border-radius: 24px; padding: 24px; display: flex; gap: 16px; align-items: center">
        <span style="width: 52px; height: 52px; flex-shrink: 0; border-radius: 16px; background: rgba(255,255,255,0.14); display: flex; align-items: center; justify-content: center">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z"></path>
          </svg>
        </span>
        <span style="display: flex; flex-direction: column">
          <span style="font-size: 15px; color: #E4F1E6">WhatsApp <?= e($cfg['whatsapp']) ?></span>
          <span style="font-size: 22px; font-weight: 700">Chat with support</span>
        </span>
      </a>

      <div class="lift" style="background: #ffffff; border: 2px solid #D5E0EC; border-radius: 24px; padding: 24px; display: flex; flex-direction: column; gap: 14px">
        <div style="display: flex; flex-direction: column">
          <span style="font-size: 15px; color: #52627A">App support</span>
          <a href="mailto:<?= e($cfg['email_to']) ?>" style="font-size: 20px; font-weight: 700; color: #1B5A93"><?= e($cfg['support_email']) ?></a>
        </div>
        <div style="display: flex; flex-direction: column">
          <span style="font-size: 15px; color: #52627A">General and press</span>
          <a href="mailto:<?= e($cfg['email_to']) ?>" style="font-size: 20px; font-weight: 700; color: #1B5A93"><?= e($cfg['email_to']) ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="padding: 0 clamp(16px, 4vw, 48px) 120px">
  <div style="max-width: 1280px; margin: 0 auto; border-radius: 32px; overflow: hidden; display: flex; flex-wrap: wrap; background: #13294B; color: #ffffff">
    <div style="flex: 1 1 380px; min-width: 0; padding: clamp(28px, 4vw, 52px); display: flex; flex-direction: column; gap: 14px">
      <span style="font-size: 16px; color: #9CC8F0; font-weight: 700; letter-spacing: .6px">VISIT US</span>
      <h2 style="margin: 0; font-family: 'Familjen Grotesk', sans-serif; font-size: 40px; line-height: 1.05">Jammu office</h2>
      <p style="margin: 0; font-size: 19px; line-height: 1.55; color: #C9D6E6">Sec-2 Model Town Gangyal,<br>Jammu, Jammu and Kashmir 180010</p>
      <p style="margin: 0; font-size: 17px; color: #C9D6E6"><?= e($cfg['office_hours']) ?></p>
      <a href="https://maps.google.com/?q=Model+Town+Gangyal+Jammu" target="_blank" rel="noopener" style="align-self: flex-start; background: #ffffff; color: #13294B; text-decoration: none; font-weight: 700; padding: 13px 20px; border-radius: 14px">Get directions</a>
    </div>
    <div style="flex: 999 1 480px; min-width: 0; min-height: 360px; position: relative; background: #1D3A63" role="img" aria-label="Map placeholder for the Jammu office">
      <svg width="100%" height="100%" style="position: absolute; inset: 0" aria-hidden="true">
        <defs>
          <pattern id="g" width="60" height="60" patternUnits="userSpaceOnUse">
            <path d="M60 0H0V60" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="2"></path>
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#g)"></rect>
        <path d="M-20 260 C 200 200, 300 320, 520 240 S 900 180, 1200 220" fill="none" stroke="rgba(255,255,255,0.25)" stroke-width="14"></path>
      </svg>
      <div style="position: absolute; left: 50%; top: 45%; transform: translate(-50%, -100%); display: flex; flex-direction: column; align-items: center; gap: 6px">
        <span style="background: #ffffff; color: #13294B; font-weight: 700; padding: 8px 14px; border-radius: 12px; font-size: 15px">WayloShare HQ</span>
        <svg width="34" height="44" viewBox="0 0 24 32" aria-hidden="true">
          <path d="M12 0C5.4 0 0 5.4 0 12c0 9 12 20 12 20s12-11 12-20C24 5.4 18.6 0 12 0z" fill="#2D7E3C"></path>
          <circle cx="12" cy="12" r="4.5" fill="#ffffff"></circle>
        </svg>
      </div>
      <span style="position: absolute; right: 16px; bottom: 14px; font-size: 13px; color: #C9D6E6">Embed Google Map here</span>
    </div>
  </div>
</section>

</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>

