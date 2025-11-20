<?php

namespace App\Services;
use App\Enums\TaraPayEnums;
use Illuminate\Support\Carbon;

class TaraPayService
{
  private $timestamp, $nonce;

  public function __construct()
  {
    $this->timestamp = Carbon::now()->valueOf();;
    $this->nonce = self::generateUuid();
  }

  public function signature($content)
  {
      $privateKey = <<<EOD
  -----BEGIN PRIVATE KEY-----
  MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCs7Hnpn85dJaEj
  xNZq6BcAR0beZb5ouKVmc2n+Nzccsa7lafxKeF9YDHPHDxiyVYut/jfkTKdzR4Ly
  9KY2Ica0uVaEydX9Kr3WP5p/+QojKVoEDNfrRLfx4E78Hje38m4BPU5WiumWsY4B
  eg3L1ptWjKmgG5vg8PhB0EFPmvPzsTR79OOtAblvb1QX2z3V+EOyO9Bk9iSYWvMy
  zE9nKoi8xBJmYEU5oUXBMQ9SsOnGzijygat7ZQpubu2SDI0cAR2r75lr7qPM8n0d
  J2VVkoRDKP+OSz8ugAa/dsuv/h/ayKu9G7azcHhA+EAgQkMwzfoHhYr/ajJjR90I
  Yu8CYZBXAgMBAAECggEAAZSbvKXoRfOtGF2ZNBrw8uCz5h558g0V/ey6IEey6kE5
  fwFL/AZDoNNkT4J00FR11V5Idn643RXfPYc86au/XDGBd+88VHcKiyXDrL3C+PVM
  zFKtuonDQKOzNRy1l6nQlZRQ3fuhDO6MhLjv3VgVzWG1vy/hadnp+vgDUM3ywtxs
  7AhJTQ2Dhk8TimpCwPR7tngRKK9Xn9tsq2UJ8tdDF9DEnsYENDwWnx4xdl2sBh2N
  0I6QxbJUIfhSTLIzUvkXxvZqkfVxp8YMKDoANVPbWC2VxEpE0UmD3AbYhh+uplt7
  d/9VuV9/IGSywpEfGedmL+Fnnvvw0yJaEkBioAUccQKBgQDas6o5bLRDDmSHtzOj
  pLsYOMvC4WV1dHQO3NshpdPRHedtCayT1m5+xCLFoVELhfXv1LKVAK84g+AnHvC8
  K201F7/FqIAQBHJpFs7I9YsaGRtuZpPswDlQscZrY58+FlfkJ5K/rERoaYxc3NK3
  sVNNzsOHzO3WICM7hPVXzhvhOQKBgQDKai3jYAH/N1RfL5dKLiVg6smItH/iVyqe
  wA6Fa1h0fSiIfwwrgrMNavirwEZ8eXBmXwkSF/FMckUmmja7fyTlkEH6ETV5MVXM
  G6XH09Ih7Bz56pXwwDDaJizve7i6bnscbXIBaPKUYEHwZhqja5sdW4zNm87tHJp/
  64NwkSBODwKBgB+wWMHpVlVBCKABk6HqhJGF6UBbmG/kZ8yfg8DkXkS2qInMFQ12
  zJvhn4gzT6LzzibqEtY0Oy9dLGV+vjMFt9Uxk7/4IlYvzsQbYesMaRNm/+qHQnfT
  gnqGx9FXpgNBCYstkL3lICRg5s2t0Xp8Xy2u//X1Y6DbFz/QjBwk6TVBAoGBAKih
  CJWyeDdsmuepuDpec1logHlZFmk0ARe8HNzd7xUs58W/Qh5FhnGZOo2rY41zhkZi
  yiW+uJHdaOqd8xcE93IgWjbAe3H5veaK6fOt7hPApus1mbC2DHzQ7QKeaek2/W1T
  aHTwP5eJEaX7Cho3HUS57nWkZiF3gOctB5WR8f3VAoGAcJu3CV046cdJfk+QUnw3
  fXGhiXaMv37hnM41DsmXW3zPOaBtqXmDN1gbrW2lQCS9kzTMVoHXK4Q1b13V6W5w
  90ceBfCFp50QkcDCgRn90dxkwt9VoKnKt96IJM911ZlJH+3Sg+lUq3rZ/sGcuwH0
  1HWrFMU7529lnqhuSFDKciU=
  -----END PRIVATE KEY-----
  EOD;
  
      $keyResource = openssl_pkey_get_private($privateKey);
      if (!$keyResource) {
          throw new \Exception('Invalid private key');
      }
  
      openssl_sign($content, $signature, $keyResource, OPENSSL_ALGO_SHA256);
      return base64_encode($signature);
  }
  

  function sign($httpMethod, $httpRequestUri, $httpRequestBody, $timestamp) {
    $appId = TaraPayEnums::APP_ID;
    $nonce = $this->nonce;
    
    $authString = "app_id={$appId},nonce={$nonce},timestamp={$timestamp}";
    $content = "{$authString}\n{$httpMethod}\n{$httpRequestUri}\n";
    $content .= empty($httpRequestBody) ? "\n" : "{$httpRequestBody}\n";
    $signature = $this->signature($content);  

    $content = "{$authString}\n{$httpMethod}\n{$httpRequestUri}\n";
    $content .= empty($httpRequestBody) ? "\n" : "{$httpRequestBody}\n";

    $signature = $this->signature($content);
    $authorization = "TARAPAY-SHA256withRSA {$authString},sign={$signature}";
    return $authorization;
  }

  public function base_interface($body, $url) { 
    $httpMethod = 'POST';
    $appId = TaraPayEnums::APP_ID;
    $nonce = $this->nonce;
    $timestamp = $this->timestamp; 
    $authString = "app_id={$appId},nonce={$nonce},timestamp={$timestamp}";
    $bodyEncode = json_encode($body);
    $content = "{$authString}\n{$httpMethod}\n{$url}\n";
    $content .= empty($body) ? "\n" : "{$bodyEncode}\n";
    $auth = $this->sign("POST", $url, $bodyEncode, $timestamp);

    $defaultHeaders = array(
      'Content-Type: application/json',
      'Authorization: ' . $auth,
      'tarapay-request-id: '.self::generateRequestID()
    );

    $curl = curl_init();

    $url = TaraPayEnums::URL_PROD.$url;

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($body),
      CURLOPT_HTTPHEADER => $defaultHeaders,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }

  public function paymentProcess($body = []){
    $url = '/pay-in/create';
    $response = $this->base_interface($body, $url);
    return $response;
  }

  private function generateUuid()
  {
    $data = random_bytes(16);
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x50);
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);

    $hex = bin2hex($data);

    return sprintf(
        '%s-%s-%s-%s-%s',
        substr($hex, 0, 8),
        substr($hex, 8, 4),
        substr($hex, 12, 4),
        substr($hex, 16, 4),
        substr($hex, 20, 12)
    );
  }

  private function generateRequestID()
  {
    return bin2hex(random_bytes(16));
  }

}