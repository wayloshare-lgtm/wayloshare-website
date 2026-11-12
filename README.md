# WayloShare PHP Website

Production-ready website built in **plain PHP 8.2** for **Hostinger shared hosting** (Apache + PHP, no database, no Composer, no Node.js build step required). Converted directly from the approved design file (`wayloshare-website.html`).

---

## 1. Project Structure

```text
public_html/
  .htaccess                           # Canonical HTTPS/www, clean URLs, security headers, Gzip, 1-yr asset caching
  index.php                           # Home page (search hero, MoRTH calculator, verified circle, app tour)
  pink-ride.php                       # Pink Ride (women-only carpooling lane, driver/rider switcher)
  download.php                        # Download app (device detection, QR code, app walkthrough)
  about.php                           # About page (Jammu HQ, values, route coverage, team)
  contact.php                         # Contact form (CSRF, honeypot, rate limiting, mail sending, CSV backup)
  blog.php                            # Road Journal blog listing (live JS + server-rendered topic filtering)
  post.php                            # Single article reader (/blog/{slug}, reading bar, feedback API)
  get.php                             # Smart App link (/get: device detection, store redirection, click analytics)
  sitemap.php                         # Dynamic XML Sitemap (/sitemap.xml)
  404.php                             # Branded 404 error page
  robots.txt                          # Search crawler instructions
  includes/
    config.php                        # Central site configuration, store URLs, placeholders
    functions.php                     # Core helpers: e(), url(), asset(), csrf, detect_device(), format_inr()
    head.php                          # Global HTML <head>, Open Graph, Twitter, and JSON-LD schemas
    nav.php                           # Liquid-glass island bar + full-screen route-map menu
    footer.php                        # Unified navy footer (dark plum on Pink Ride)
    sticky-bar.php                    # Dismissible "Get WayloShare" bar (persists 7 days in localStorage)
  data/
    posts.php                         # Array of blog posts, full Jammu→Chandigarh article HTML
    routes.php                        # Pre-calculated routes, MoRTH rate caps per km, popular routes
  assets/
    css/
      base.css                        # Global tokens, glass utilities, island bar, route menu, footer, fix-css
      home.css                        # Home page specific styles
      pink-ride.css                   # Pink Ride specific styles
      download.css                    # Download page specific styles
      about.css                       # About page specific styles
      contact.css                     # Contact page specific styles
      blog.css                        # Blog listing styles
      post.css                        # Blog post reader styles
      404.css                         # 404 page styles
    js/
      site.js                         # Global: route menu Esc/fallback, sticky bar 7-day dismiss, smooth scroll
      home.js                         # Home: hero tabs, app store modal, MoRTH calculator, verified circle, tour
      pink-ride.js                    # Pink Ride: ride/drive switcher
      download.js                     # Download: device preview tabs & store button highlighting
      blog.js                         # Blog: instant client-side topic filtering
      post.js                         # Post: useful vote logging via fetch, reading progress fallback
    img/
      logo.png                        # WayloShare brand logo
      qr.png                          # App download QR code
      screen-home.jpg                 # App screenshot: Home
      screen-post.jpg                 # App screenshot: Post a ride
      screen-time.jpg                 # App screenshot: Pick a time
      og.jpg                          # 1200x630 Open Graph sharing preview (brand blue with logo)
  storage/
    .htaccess                         # Denies direct web access ("Require all denied")
    messages.csv                      # Backup log of all contact form submissions
    get-clicks.csv                    # Analytics log of all /get smart link clicks
    feedback.csv                      # Feedback log for article usefulness votes
```

---

## 2. Hostinger Deployment Steps

1. **Configure PHP and SSL in hPanel:**
   - Log into your Hostinger hPanel.
   - Go to **Websites** → **Manage** for `wayloshare.com`.
   - Under **Advanced** → **PHP Configuration**, set the PHP version to **PHP 8.2** (or 8.3).
   - Under **Security** → **SSL**, verify that the Let's Encrypt SSL certificate is active.

2. **Create Mailboxes:**
   - Go to **Emails** → **Email Accounts**.
   - Create the primary mailbox: `info@wayloshare.com`.
   - (Optional) Create `no-reply@wayloshare.com` if using Hostinger SMTP.

3. **Upload Files:**
   - In **Files** → **File Manager**, navigate into the `public_html/` directory.
   - Upload all files from the `public_html/` folder of this project into Hostinger's `public_html/`.

4. **Update Configuration:**
   - Open `public_html/includes/config.php` in File Manager.
   - Fill in client-confirmed values:
     - `phone`: Customer care phone number.
     - `whatsapp`: WhatsApp business number.
     - `app_store`: Official Apple App Store URL when live.
     - `play_store`: Official Google Play Store URL.
     - `smtp`: If using Hostinger SMTP rather than `mail()`, provide mailbox username and password.

5. **Set Storage Permissions:**
   - Ensure the `public_html/storage/` folder has directory permissions `755`.
   - Ensure the `.csv` files inside `storage/` have file permissions `644`.

6. **Verify the Live Deployment:**
   - Visit `https://www.wayloshare.com/` — test the route-map menu, the hero tabs, and the fare calculator.
   - Submit a test inquiry on `https://www.wayloshare.com/contact` and verify receipt in `info@wayloshare.com` and in `storage/messages.csv`.
   - Test `https://www.wayloshare.com/get` on an iPhone, an Android phone, and a laptop to confirm correct redirection.
   - Visit `https://www.wayloshare.com/sitemap.xml` to verify valid XML output.

7. **Google Search Console:**
   - Add property `https://www.wayloshare.com/` in [Google Search Console](https://search.google.com/search-console).
   - Submit `https://www.wayloshare.com/sitemap.xml`.

---

## 3. Section 5 Verification Checklist

| # | Feature | Verification Steps |
|---|---|---|
| **1** | **Hero Search & Modal** | Click between *Find a ride*, *Offer a ride*, and *Pink Ride*. Check that the CTA text, background colour, and seat labels update immediately. On desktop, click *Search rides* to verify the glass modal opens with QR code and store buttons. On mobile or narrow screens (<=640px), verify form posts directly to `/get`. |
| **2** | **Fare & CO₂ Calculator** | Click each route chip (Jammu→Chandigarh, Delhi→Jaipur, etc.) and verify that the kilometre stone updates city names (English/Hindi), NH number, and distance. Move the km slider or click −/+ 25 to verify that seat fare (`km × rate`), cost shared, CO₂ saved (`riders × km × 0.14`), trees, and per-person emission values update accurately with Indian number formatting (`1,103`). |
| **3** | **Verified Circle** | Click *Rider*, *Driver*, and *Pink Ride* tabs. Confirm that the ID card updates (name, checks, status stamp) and the top-view car SVG updates seat labels and seat colors. |
| **4** | **App Tour** | Scroll down to `#app-tour`. Verify that as steps come into view, the phone mockup transitions through the matching screens (1 to 5). Click any step button (01 to 05) to confirm it immediately displays the respective screen. |
| **5** | **Pink Ride Toggle** | On `/pink-ride`, click *I want a ride* and *I’m driving*. Verify that the button switches and the CTA label changes from *Find Pink rides* to *Post a Pink ride*. |
| **6** | **Download Page Detection** | Visit `/download` on iPhone, Android, and desktop. Confirm that PHP detects the device user-agent and sets the initial message and store button highlighting. Click the *Android*, *iPhone*, and *Laptop* tabs to verify visual state toggles. |
| **7** | **Blog Topic Filter** | Visit `/blog`. Click topic chips (*Routes*, *Safety*, *Pink Ride*, etc.). Verify that post cards filter instantly without a page reload and the URL updates with `?cat=...`. Reload with `?cat=Safety` to verify server-side filtering works without JS. |
| **8** | **Article & Feedback** | Visit `/blog/jammu-to-chandigarh-shared-car-guide`. Confirm reading progress bar moves with scrolling. In the *Was this guide useful?* widget, click *Yes* or *Not really*. Confirm the prompt disappears and shows the hand-written thanks message. Check that a row was appended to `public_html/storage/feedback.csv`. |
| **9** | **Route-Map Menu** | Click *Menu* in the island bar. Confirm full-screen overlay opens with current stop highlighted by the car icon and "You are here · ". Press <kbd>Esc</kbd> or click the close button to confirm it closes cleanly. |
| **10** | **Sticky Download Bar** | On Home, Pink Ride, or Post, observe the floating download bar at the bottom. Click the `<svg>` close button. Confirm the bar disappears and does not reappear on page refresh (dismissed for 7 days in `localStorage`). |

---

## 4. Design & Performance Notes

- **Preserved Design Integrity**: Every color, animation, breakpoint, font, glass blur effect, road car animation, and kilometre stone has been ported directly from `wayloshare-website.html`.
- **Zero Framework Bloat**: No Bootstrap, no Tailwind, no jQuery, no Node dependencies. Built strictly with semantic HTML5, modern CSS, and lightweight vanilla JavaScript.
- **Security**: Includes strict CSRF tokens, honeypot spam protection, fill-time verification, session rate limiting, and Apache rules denying direct web access to sensitive directories (`includes/`, `data/`, `storage/`).

