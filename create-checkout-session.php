<?php

require 'vendor/autoload.php';
// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
\Stripe\Stripe::setApiKey('sk_test_51KbygNJUYI9UC2nIgD2mCwc5WgAaoravJfW7JKac70426zvew2PJA57ge8PWryE1xCXigUvNQq04VjrWeqtpb5Vt00YUaF8nUE');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/stripe';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1Kbz6bJUYI9UC2nILtEBzzmD',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

