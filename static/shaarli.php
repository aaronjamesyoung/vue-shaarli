<?php
// Move this config somewhere else??

// **** CONFIG **** //
$baseUrl = 'https://example.com/shaarli';
$secret = '12345abcdef';
// **** End Config **** //


function base64url_encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function generateToken($secret) {
  $header = base64url_encode('{
      "typ": "JWT",
      "alg": "HS512"
  }');
  $payload = base64url_encode('{
      "iat": '. time() .'
  }');
  $signature = base64url_encode(hash_hmac('sha512', $header .'.'. $payload , $secret, true));
  return $header . '.' . $payload . '.' . $signature;
}


function getInfo($baseUrl, $secret) {
  $token = generateToken($secret);
  $endpoint = rtrim($baseUrl, '/') . '/api/v1/info';

  $headers = [
      'Content-Type: text/plain; charset=UTF-8',
      'Authorization: Bearer ' . $token,
  ];

  $ch = curl_init($endpoint);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
  curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

  $result = curl_exec($ch);
  curl_close($ch);

  return $result;
}

function getLinks($baseUrl, $secret) {
  $token = generateToken($secret);
  $endpoint = rtrim($baseUrl, '/') . '/api/v1/links?limit=all';

  $headers = [
      'Content-Type: text/plain; charset=UTF-8',
      'Authorization: Bearer ' . $token,
  ];

  $ch = curl_init($endpoint);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
  curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

  $result = curl_exec($ch);
  curl_close($ch);

  return $result;
}

// Run it
echo getLinks($baseUrl, $secret);
