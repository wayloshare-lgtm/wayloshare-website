<?php
/**
 * WayloShare Configuration
 * Production settings for Hostinger deployment.
 */
return [
  'site_name'     => 'WayloShare',
  'base_url'      => 'https://www.wayloshare.com',
  'email_to'      => 'info@wayloshare.com',
  'phone'         => '[PHONE]',            // leave the placeholder until the client confirms
  'whatsapp'      => '[WHATSAPP]',
  'app_store'     => 'https://apps.apple.com/us/app/wayloshare/id6811060692',
  'play_store'    => 'https://play.google.com/store/apps/details?id=com.waylo.share',
  'address'       => 'Sec-2 Model Town Gangyal, Jammu, J&K 180010',
  'company'       => 'Wayloshare Private Limited',
  'smtp'          => [
    'host'   => 'smtp.hostinger.com',
    'port'   => 465,
    'user'   => '',
    'pass'   => '',
    'secure' => 'ssl'
  ],
  // Placeholders from section 12 (client customizable)
  'support_email' => '[SUPPORT EMAIL]',
  'office_hours'  => '[OFFICE HOURS]',
  'response_time' => '[RESPONSE TIME]',
  'launch_cities' => '[CONFIRM LAUNCH CITIES]',
  'languages'     => '[CONFIRM LANGUAGES]',
  'pink_price'    => '[PRICE]',
  'pink_features' => '[CONFIRM]',
];

