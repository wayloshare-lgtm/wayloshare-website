# Prompt: build the WayloShare website in simple PHP for Hostinger

Copy everything below this line into your AI coding tool (Claude, Cursor, etc.) and attach `wayloshare-website.html`.

---

You are a senior PHP developer. Convert the attached file `wayloshare-website.html` into a production-ready website in **plain PHP 8.2**. It will run on **Hostinger shared hosting** (Apache + PHP, no Node, no Composer requirement, no build step, no framework, no database). The client must be able to upload a zip to `public_html` and have the site work.

## 1. Source material

`wayloshare-website.html` is the approved design. It is a single file that holds all seven pages:

- **Page templates:** each page is a `<template id="tpl-{route}">`.
- **Page CSS:** each page's CSS sits in `PAGES[route].css` inside the second `<script>`.
- **Page behaviour:** each page's interactive logic sits in `PAGES[route].Comp`, a small class whose `renderVals()` returns the values the template binds to.
- **Template syntax:** `{{value}}` inserts a value, `<sc-for list="{{x}}" as="item">` repeats a block, `<sc-if value="{{x}}">` shows a block conditionally, and `onClick="{{fn}}"` attaches a handler.
- **Images:** they are base64 strings in `var IMGS = {...}` (logo, qr, home, post, time). Templates reference them as `%%IMG_name%%`.
- **Responsive fixes:** global fixes are in `<style id="fix-css">`. Keep every one of them.

**Reproduce the design exactly.** Keep the same layout, colours, fonts, spacing, copy, animations, glass effects, kilometre stones, the moving cars on the road, the route-map menu and every breakpoint. Do not restyle anything, and do not add frameworks such as Bootstrap or Tailwind. Replace the template engine with real server-rendered HTML plus small vanilla JS for the interactive parts.

## 2. Pages and clean URLs

| Route in source | Public URL | PHP file |
|---|---|---|
| home | `/` | `index.php` |
| pink-ride | `/pink-ride` | `pink-ride.php` |
| download | `/download` | `download.php` |
| about | `/about` | `about.php` |
| contact | `/contact` | `contact.php` |
| blog | `/blog` | `blog.php` |
| blog-post | `/blog/{slug}` (first post: `jammu-to-chandigarh-shared-car-guide`) | `post.php` |
| (smart app link) | `/get` | `get.php` |
| (sitemap) | `/sitemap.xml` | `sitemap.php` |

In-page anchors such as `#fare` and `#app-tour` on Home, and `#route` and `#price` in the article, must keep working. Turn every `href="#home"`-style link from the single file into the real URL. For example, the footer link "Fare calculator" becomes `/#fare`.

## 3. Folder structure (deliver every file in full)

```
public_html/
  .htaccess
  index.php  pink-ride.php  download.php  about.php  contact.php
  blog.php   post.php       get.php       sitemap.php  404.php
  robots.txt
  includes/
    config.php        site settings (below)
    functions.php     e(), url(), active(), csrf helpers, asset() with ?v=filemtime
    head.php          <head>: meta, OG, canonical, JSON-LD, fonts, CSS
    nav.php           liquid-glass island bar + full-screen route-map menu
    footer.php        unified footer (navy; dark plum on Pink Ride)
    sticky-bar.php    dismissible "Get WayloShare" bar
  data/
    posts.php         blog posts as a PHP array
    routes.php        calculator routes and MoRTH caps
  assets/
    css/base.css      shared tokens, glass, island, menu, footer, fixes
    css/{page}.css    one file per page, extracted from PAGES[route].css
    js/site.js        shared: menu Esc, sticky bar dismiss (localStorage), smooth anchors
    js/{page}.js      only for pages that need interaction
    img/              logo.png, qr.png, screen-home.jpg, screen-post.jpg, screen-time.jpg, plus .webp copies
    fonts/            optional self-hosted Familjen Grotesk, Mukta, Kalam (woff2)
  storage/            outside the web root if Hostinger allows, otherwise protect it with .htaccess "Require all denied"
    messages.csv      contact form backup log
```

## 4. includes/config.php

```php
return [
  'site_name'   => 'WayloShare',
  'base_url'    => 'https://www.wayloshare.com',
  'email_to'    => 'info@wayloshare.com',
  'phone'       => '[PHONE]',            // leave the placeholder until the client confirms
  'whatsapp'    => '[WHATSAPP]',
  'app_store'   => 'https://apps.apple.com/app/[APP-STORE-ID]',
  'play_store'  => 'https://play.google.com/store/apps/details?id=com.waylo.share',
  'address'     => 'Sec-2 Model Town Gangyal, Jammu, J&K 180010',
  'company'     => 'Wayloshare Private Limited',
  'smtp' => ['host' => 'smtp.hostinger.com', 'port' => 465, 'user' => '', 'pass' => '', 'secure' => 'ssl'],
];
```

Use these values everywhere. Never hard-code store links or the email address in templates.

## 5. Interactive parts (vanilla JS, no libraries)

Port each behaviour from the matching `Comp` class in the source.

1. **Home hero search:**
   - The three tabs (Find a ride / Offer a ride / Pink Ride) change the button label and colour.
   - The form is a real `<form method="get" action="/get">` with fields `from`, `to`, `date`, `seats` and `mode` (`find`, `offer` or `pink`).
   - On desktop, show the "Open it in the WayloShare app" glass modal with store buttons and the QR code instead of redirecting. On phones, submit straight to `/get`.
2. **Fare and CO₂ calculator (`#fare`):**
   - Route chips: Jammu→Chandigarh 368 km, Delhi→Jaipur 280, Jammu→Srinagar 250, Mumbai→Pune 150, Bengaluru→Mysuru 145. Also a km slider (20–1200, step 10) with −/+ 25 buttons.
   - Car types with MoRTH caps per seat per km: Hatchback ₹2.50 (3 seats), Sedan ₹3.20 (3), Compact SUV ₹3.50 (4), MUV ₹3.80 (6). Co-rider buttons go from 1 to the car's seat count.
   - Calculations:
     - Seat fare = round(km × rate).
     - Driver's cost shared = seat fare × riders.
     - CO₂ saved = riders × km × 0.14 kg.
     - Trees = max(1, round(saved / 21)).
     - Per person = km × car factor / (riders + 1), where the car factors are 0.13, 0.15, 0.17 and 0.19 kg/km.
   - Use Indian number formatting via `toLocaleString('en-IN')`.
   - The kilometre stone updates its NH number, Hindi and English city name, and km.
3. **Verified circle:** the Rider / Driver / Pink Ride tabs swap the ID card, its checks and stamp, plus the seat labels and colours in the top-view car.
4. **App tour (`#app-tour`):**
   - Keep the CSS scroll-driven version (`animation-timeline`).
   - Add a fallback for browsers without scroll timelines: an `IntersectionObserver` that sets `aria-pressed` on the step in view and the `.on` class on the matching screen.
   - Tapping a step also switches the screen.
   - Keep the phone layout from fix-css, where the phone is pinned at the top and the steps scroll underneath it.
5. **Pink Ride:** the "I want a ride" / "I'm driving" toggle. Its form also submits to `/get`, with `mode=pink`.
6. **Download page:**
   - Detect the device on the server in PHP (`HTTP_USER_AGENT`) and use it as the initial highlighted store.
   - The Android / iPhone / Laptop buttons still switch the demo.
7. **Blog:** the topic filter chips work without JS through `?cat=Safety`, and are enhanced with JS so filtering happens without a page reload.
8. **Article:** the reading-progress bar is CSS. The "Was this useful?" Yes/No buttons POST via fetch to a tiny endpoint and append to `storage/feedback.csv`; failure is silent.
9. **Route-map menu:** keep the checkbox + `:has()` version. Add a JS fallback that toggles `class="menu-open"` on `<html>` for browsers without `:has()`. Pressing Esc closes it.
10. **Sticky download bar:** the close button hides it and remembers that for 7 days in `localStorage`, with every read and write wrapped in try/catch.

## 6. /get smart link (get.php)

- **Read parameters:** `from`, `to`, `date`, `seats`, `mode`, and any `utm_*`. Sanitise them all.
- **Choose the store from the user agent:**
  - iPhone/iPad/iPod → App Store.
  - Android → Play Store, adding `&referrer=` holding the URL-encoded search parameters, so the app can read them through the Install Referrer API.
  - Anything else (desktop) → `/download?` with the same query string.
- **Redirect:** use a 302 with no caching.
- **Log the click:** append the date/time, mode, device type and UTM source to `storage/get-clicks.csv`.
- **Deep links:** add a commented section explaining where to plug in Branch, AppsFlyer OneLink or Adjust later, so the app can open on the same search after install. Do not use Firebase Dynamic Links; it has been shut down.

## 7. Contact form (contact.php)

- **Form:** server-rendered, posting back to itself, with fields name, phone, email, topic (select) and message.
- **Security:** a CSRF token in the session, a hidden honeypot field, a minimum fill time of 3 seconds, and a session rate limit of 5 messages per hour.
- **Validation:** required name and message, a valid email *or* a 10-digit Indian phone number, and a message of at most 2,000 characters. Show errors inline under each field, keep what the visitor typed, and add `aria-invalid` to fields with errors.
- **Sending:** send to `email_to` with PHP `mail()`, using a proper From address on the domain (`no-reply@wayloshare.com`) and Reply-To set to the visitor. If SMTP credentials are set in config, send via SMTP instead, using a small SMTP function or PHPMailer dropped into `includes/` (no Composer).
- **Backup:** always append the message to `storage/messages.csv` as well.
- **Success:** show the existing "Message sent" state from the design, using the PRG pattern (redirect to `?sent=1`).

## 8. Blog data

`data/posts.php` returns an array of posts with these fields: `slug, title, excerpt, category, tag, minutes, date (Y-m-d), author, cover_style (bg, ink, path), body_html`.

- Include the 8 sample posts from the listing page.
- Write the full Jammu→Chandigarh article as `body_html`, copied from the article template, including the kilometre-stone route timeline, quote, fare boxes, checklist and safety section.
- Keep the `[SAMPLE ARTICLE]`, `[AUTHOR NAME]` and `[RIDER NAME]` placeholders visible.
- The other 7 posts get a short placeholder body that says "Full article coming soon".
- `post.php` returns a 404 page for an unknown slug.
- The "Keep reading" block shows 3 other posts, preferring the same category.

## 9. SEO and sharing

- **Per page:** a unique `<title>` and meta description, a canonical URL, Open Graph and Twitter tags, and `lang="en"`. For the OG image, generate a 1200×630 JPG from the logo on brand blue, or leave a clearly named placeholder file `assets/img/og.jpg`.
- **JSON-LD:**
  - `Organization` (name, logo, address, email) on every page.
  - `MobileApplication` (Android and iOS, free) on Home and Download.
  - `FAQPage` from the Home FAQ.
  - `BlogPosting` on articles.
  - `BreadcrumbList` on blog pages.
- **sitemap.php:** outputs XML for every page and post.
- **robots.txt:** allows everything and points to `/sitemap.xml`.
- **Indexing:** add `noindex` to `get.php` responses and the 404 page.

## 10. .htaccess

- Force HTTPS and `www`, using one consistent canonical host.
- Clean URLs: map `/pink-ride` to `pink-ride.php` and so on, `/blog/{slug}` to `post.php?slug=`, and `/sitemap.xml` to `sitemap.php`. Also 301-redirect any `.php` URL to its clean version.
- `ErrorDocument 404 /404.php`.
- Compression: gzip/deflate for HTML, CSS, JS, SVG and JSON.
- Caching: `Cache-Control` of 1 year for `/assets/*`, made safe by the `?v=filemtime` cache-busting from `asset()`.
- Security headers: `X-Content-Type-Options`, `Referrer-Policy: strict-origin-when-cross-origin`, `X-Frame-Options: SAMEORIGIN` and a sensible `Permissions-Policy`.
- Deny web access to `includes/`, `data/` and `storage/`.

## 11. Performance and quality bar

- **Fonts:** load Google Fonts with `display=swap` and preconnect, or self-host them in `assets/fonts`.
- **Assets:** only the current page's CSS and JS are loaded, all JS with `defer`.
- **Images:** real files with `width`/`height`, `loading="lazy"` below the fold, and `<picture>` with WebP.
- **Lighthouse targets on mobile:** Performance ≥ 90, Accessibility ≥ 95, Best Practices ≥ 95, SEO 100.
- **Responsive:** test at 320, 360, 390, 430, 768, 834, 1024, 1180, 1280, 1440 and 1920 px. There must be no horizontal scrolling at any width. Keep all rules from `fix-css`, including the 2×2 steps on tablet, the hero side by side from 860 to 1240 px, the pinned phone in the app tour on phones and the one-row sticky bar on phones.
- **Accessibility:** every input has a label, focus states are visible, `prefers-reduced-motion` turns off animation, the menu is keyboard-accessible, and touch targets are at least 44 px.
- **PHP hygiene:** escape all output with `htmlspecialchars` via `e()`. No PHP notices or warnings (test with `error_reporting(E_ALL)` and then turn display off for production). No inline secrets.

## 12. Placeholders to keep visible (do not invent values)

`[APP-STORE-ID]`, `[PHONE]`, `[WHATSAPP]`, `[SUPPORT EMAIL]`, `[OFFICE HOURS]`, `[RESPONSE TIME]`, `[FOUNDER STORY]`, founder and team names and photos, `[CONFIRM LAUNCH CITIES]`, `[CONFIRM LANGUAGES]`, `[PRICE]` on Pink Ride, `[CONFIRM]` on Pink Ride features (SOS, trip sharing, women-verification method), CO₂ emission factors, and the MoRTH legal wording. Put them in `config.php` or the data files where possible, so the client can edit them in one place.

## 13. Deliverables

1. Every file listed in section 3, in full, ready to paste. Write out the CSS in full, extracted from the source.
2. A `README.md` with these Hostinger deployment steps:
   1. In hPanel, go to Websites → Manage, set the PHP version to 8.2, and enable SSL.
   2. Create the mailbox `info@wayloshare.com`, plus `no-reply@` if you're using SMTP.
   3. In File Manager, upload the zip to `public_html` and extract it.
   4. Edit `includes/config.php`.
   5. Make `storage/` writable (755 for the folder, 644 for the files).
   6. Test the contact form, `/get` from an iPhone, an Android phone and a desktop, and `/sitemap.xml`.
   7. Submit the sitemap in Google Search Console.
3. A short test checklist that maps each item in section 5 to how to verify it.

Work section by section. Don't skip or summarise any file. Where the source's behaviour is ambiguous, follow the design file exactly and note your choice in the README.
