<html>
<head>
<title>[+] Subdomain Scanner [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>Subdomain Scanner</font><br><font size="3">mencari sub-domain dengan instan</font><hr>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 100%;
width: 100%;
height: 50%;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
max-height: 100%;
}

button {
  background: transparent;
    font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

asu {
  color: orange;
}

pre {
  text-align: left;
}

select {
  background: transparent;
  color: #ffffff;
}

select option {
  background-color: #1e1e1e}
input {
  background: transparent;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

font {
  font-family: Staatliches;
}

body::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

body::-webkit-scrollbar-track {
  background: #1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: #1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}

oren {
  color: orange;
}
</style>
<script type="text/javascript">
function adjustTextareaHeight(element) {
    element.style.height = 'auto';
    element.style.height = element.scrollHeight + 'px';
}
function select_all() {
    var text_val = document.getElementById('select');
    text_val.focus(); // Focus on textarea 
    text_val.select();// Select all text  
    document.execCommand("Copy");
    document.getElementById('select').focus();
}
</script>
<center><form method="post">
<input type="text" name="url" height="20" placeholder="https://google.com" style="padding-left: 5px; margin: 10px;" size="40" required></textarea><br>
<input type="submit" name="go" value="Gaskeun" onclick="ngeklik()">
<?php
if (isset($_POST['go'])) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $web = $_POST['url'];
  $url = htmlspecialchars($web);
  if (preg_match("/http/i", $web)) {
    $a = parse_url($web);
    $web = $a['host'];
  }
  $browserless = array("74ffa1ed-25cd-45a7-a7ab-4c22bf5305bb", "66a6d25f-a397-4d1a-af27-be8ff8b571ca", "6e106a93-2784-4463-8548-9308e2360a43", "dddd9420-90b2-4602-b214-9b63b53db2d8", "e31e7b01-bdd8-4820-a444-646fadc84040");
  $scrapingant = array("ec6935b4785e4e028db9fb38c0e7a037", "5afc3d1c8f694316a56e921643afb9d3");
  $scrapeops = array("8f3655b6-f80f-4e22-889a-642e1158d04b", "b54118c2-5e1e-4f43-8379-9e36201d74cc");
  $scrapeowl = array("d0b8c147bb7ef473bb93dc04715e45", "9ffad322826e1df47384abbbd01558");
  $scrapingbee = array("S4U03X9HYS1PUJ5TQUUMQ0FM7EYN4V2IG6L7DK013YYXBEFCJC9CGTZG7ILR1HA1FETSO049PH5QJL4G", "L69AGGHMS16Z1SVXWC1FVP0MGX6C7T4T188VYBE247R5SI3N644LNPT54G9HLDR9DBO8GRT3T5SSUHFJ");

  ob_implicit_flush();ob_end_flush();
  $listapi = array("scrapingant", "scrapeops");
  foreach ($listapi as $api) {
    if (strstr($api, "scrapingant")) {
      $key = randomkey($scrapingant);
      $cek = get("https://api.scrapingant.com/v2/general?url=https://api.hackertarget.com/hostsearch/?q=".$web."&x-api-key=".$key);
      if (strstr($cek, 'white-space: pre-wrap;">')) {
        $data = extractline($cek, 'white-space: pre-wrap;">', "</pre></body>");
        echo "[Method 1] Total Domain : <oren>".count(explode("\n", $data))."</oren> | [ <oren style='cursor: pointer;' onclick='select_all();'>Select All & Copy</oren> ]<br><br>";
        echo "<textarea oninput='adjustTextareaHeight(this)' id='select'>";
        foreach (explode("\n", $data) as $url) {
          echo extractDomain($url)."\n";
        }
        echo "</textarea>";
        break;
      }
    }
    if (strstr($api, "scrapeops")) {
      $key = randomkey($scrapeops);
      $cek = get("https://proxy.scrapeops.io/v1/?api_key=".$key."&url=https://api.hackertarget.com/hostsearch/?q=".$web);
      if (strstr($cek, "You have consumed all your API credits") || strstr($cek, "To use the ScrapeOps Proxy API")) {
        echo "[Tools Error] Silahkan hubungi owner tools ini !";
        @get("https://api.telegram.org/bot6986295909:AAELG7p_bOxdctkmG97vlHo9HTNs7KF8eSA/sendMessage?chat_id=5531153063&text=".urlencode("[Reverse IP] Error, Kehabisan API !"));
      } else {
        echo "[Method 2] Total Domain : <oren>".count(explode("\n", $cek))."</oren> | [ <oren style='cursor: pointer;' onclick='select_all();'>Select All & Copy</oren> ]<br><br>";
        echo "<textarea oninput='adjustTextareaHeight(this)' id='select'>";
        foreach (explode("\n", $cek) as $url) {
          echo extractDomain($url)."\n";
        }
        echo "</textarea>";
      }
    }
  }
}
echo "</pre>";

if (!file_exists("/tmp/tempku/subdomain")) {
  @mkdir("/tmp/tempku/subdomain");
}

function get($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  return htmlspecialchars_decode($ekse);
}

function extractDomain($input) {
    $parts = explode(',', $input);
    return trim($parts[0]);
}

function randomkey($array) {
    $randomKey = array_rand($array);
    return $array[$randomKey];
}

function extractline($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function subdodikit($array) {
  if (count($array) < 2 || count($array) == 2) {
      return "<br><br>[?] Cuma Satu Domain ? Masukkan Target Domain bukan Subdomain !<br>[+] Contoh : https://google.com bukan https://subdo.google.com";
    }
}

function browserless($web, $token) {
    $url = 'https://chrome.browserless.io/content?token='.$token;
    $headers = array(
        'Cache-Control: no-cache',
        'Content-Type: application/json'
    );
    $data = array(
        'url' => 'https://api.hackertarget.com/hostsearch/?q='.$web
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($ch);
    $result = str_replace('">', "\n", $response);
    curl_close($ch);

    return $result;
}

function browless($url, $token) {
    $apiUrl = "https://chrome.browserless.io/content?token=" . urlencode($token);
    $headers = array(
        'Cache-Control: no-cache',
        'Content-Type: application/json'
    );
    $data = array(
        'url' => 'https://api.hackertarget.com/hostsearch/?q='.$url
    );

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);
    $result = str_replace('">', "\n", $response);

    // Return the response
    return $result;
}
/*
http://api.proxiesapi.com/?auth_key=8b15b41b8c311517efacbcf44966c57c_sr98766_ooPq87&url=https://api.hackertarget.com/hostsearch/?q=example.com
https://api.scrapingant.com/v2/general?url=https%3A%2F%2Fexample.com&x-api-key=83d3f482fb7e4396bbddbdb4b03da1f4
https://proxy.scrapeops.io/v1/?api_key=e04561ce-d23c-40b2-bfb2-a005141f5c68&url=https://api.hackertarget.com/hostsearch/?q=example.com
https://api.scrapeowl.com/v1/scrape?api_key=964ac5d7c48e9fec45dba0464771f8&url=https://api.hackertarget.com/hostsearch/?q=example.com
https://app.scrapingbee.com/api/v1/?api_key=7VLLVPLFIRPHK1YLUHI1ZXGPF4JEWEPUPXCYOVYLOL397ND2YVGHT91D88NIZJV5S4OGMO5SX2VR6C6J&url=https://api.hackertarget.com/hostsearch/?q=example.com


https://scrapeup.com/
curl --location --request POST 'https://api.scrape-it.cloud/scrape' \
--header 'x-api-key: b085e031-be80-443c-94c6-07b95b8686b5' \
--header 'Content-Type: application/json' \
--data-raw '{
  "url": "https://api.hackertarget.com/hostsearch/?q=example.com",
  "block_resources": false,
  "wait": 0,
  "screenshot": true
}'
http://api.scrapestack.com/scrape?access_key=8ba2d0e1fb3e0ece20a9f2f44e973dfa&url=https://api.hackertarget.com/hostsearch/?q=example.com
curl -X POST   https://chrome.browserless.io/content?token=74ffa1ed-25cd-45a7-a7ab-4c22bf5305bb   -H 'Cache-Control: no-cache'   -H 'Content-Type: application/json'   -d '
{
  "url": "https://api.hackertarget.com/hostsearch/?q=example.com"
}'



http://api.scrape.do?token=4f61414b71e44902a793dd8e2f27a20321f660f892c&url=http://api.hackertarget.com/hostsearch/?q=example.com
http://api.scraperapi.com?api_key=efce41b0a76d668e49cbe3bb7313323e&url=http://api.hackertarget.com/hostsearch/?q=example.com

https://api.scrapingant.com/v2/general?url=https://api.hackertarget.com/reverseiplookup/?q=2.2.2.2&x-api-key=83d3f482fb7e4396bbddbdb4b03da1f4

*/
?>
<hr><font size=3>Unknown45 - 2021