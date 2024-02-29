<html>
<head>
<title>[+] Reverse IP [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>Reverse IP<br><font size="3">Mencari Domain Lain Yang Satu Server<hr>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 100%;
width: 100%;
height: 100%;
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
<input type="submit" name="go" value="Reverse" onclick="ngeklik()">
<?php
if (isset($_POST['go'])) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $web = $_POST['url'];
  $url = htmlspecialchars($web);
  if (preg_match("/http/i", $web)) {
    $a = parse_url($web);
    $web = $a['host'];
  }

  $browserless = array("00936be8-74f3-4dc7-9964-70b45d5c131f", "74ffa1ed-25cd-45a7-a7ab-4c22bf5305bb", "6e106a93-2784-4463-8548-9308e2360a43", "dddd9420-90b2-4602-b214-9b63b53db2d8");
  $scrapingant = array("ba1871c5458545db843e26daa2767c0a", "8e3488a3807648879000293f24a4d090", "0082e8c79c4e4bf2bc85ea82076e0b13");
  $scrapeops = array("ad451f44-f4ed-4ad2-a774-444a4844124c", "820b2aff-b672-45ae-b088-6a1156f88f2d", "c9497b24-a8f6-4019-928a-079f5dc0fa65");
  $scrapeowl = array("198a1d4afb24a9092990768305574a", "9ffad322826e1df47384abbbd01558");
  $scrapingbee = array("S4U03X9HYS1PUJ5TQUUMQ0FM7EYN4V2IG6L7DK013YYXBEFCJC9CGTZG7ILR1HA1FETSO049PH5QJL4G", "L69AGGHMS16Z1SVXWC1FVP0MGX6C7T4T188VYBE247R5SI3N644LNPT54G9HLDR9DBO8GRT3T5SSUHFJ");

  ob_implicit_flush();ob_end_flush();
  $listapi = array("scrapingant", "scrapeops");
  foreach ($listapi as $api) {
    if (strstr($api, "scrapingant")) {
      $key = randomkey($scrapingant);
      $cek = get("https://api.scrapingant.com/v2/general?url=https://api.hackertarget.com/reverseiplookup/?q=".$web."&x-api-key=".$key);
      if (strstr($cek, 'white-space: pre-wrap;">')) {
        $data = extractline($cek, 'white-space: pre-wrap;">', "</pre></body>");
        echo "[Method 1] Total Domain : <oren>".count(explode("\n", $data))."</oren> | [ <oren style='cursor: pointer;' onclick='select_all();'>Select All & Copy</oren> ]<br><br>";
        echo "<textarea oninput='adjustTextareaHeight(this)' id='select'>";
        echo $data;
        echo "</textarea>";
        break;
      }
    }
    if (strstr($api, "scrapeops")) {
      $key = randomkey($scrapeops);
      $cek = get("https://proxy.scrapeops.io/v1/?api_key=".$key."&url=https://api.hackertarget.com/reverseiplookup/?q=".$web);
      if (strstr($cek, "You have consumed all your API credits") || strstr($cek, "To use the ScrapeOps Proxy API")) {
        echo "[Tools Error] Silahkan hubungi owner tools ini !";
        @get("https://api.telegram.org/bot6986295909:AAELG7p_bOxdctkmG97vlHo9HTNs7KF8eSA/sendMessage?chat_id=5531153063&text=".urlencode("[Reverse IP] Error, Kehabisan API !"));
      } else {
        echo "[Method 2] Total Domain : <oren>".count(explode("\n", $cek))."</oren> | [ <oren style='cursor: pointer;' onclick='select_all();'>Select All & Copy</oren> ]<br><br>";
        echo "<textarea oninput='adjustTextareaHeight(this)' id='select'>";
        echo $cek;
        echo "</textarea>";
      }
    }
  }
}
echo "</pre>";

if (!file_exists("/tmp/tempku/reverse")) {
  @mkdir("/tmp/tempku/reverse");
}

function scrapingant($web, $api) {
  $cek = get("https://api.scrapingant.com/v2/general?url=https://api.hackertarget.com/reverseiplookup/?q=".$web."&x-api-key=".$api);
  $data = extractline($cek, 'white-space: pre-wrap;">', "</pre></body>");
  return $data;
}

function filtercheck($check) {
  if (strstr($check, "error invalid host")) {
    return "[!] Error, Invalid Domain !";
  } elseif (strstr($check, "No DNS A records found")) {
    return "[!] No DNS A records found";
  }
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

function browserless($websiteUrl, $apiToken) {
    $apiUrl = "https://chrome.browserless.io/content?token=".$apiToken;
    $headers = array(
        'Cache-Control: no-cache',
        'Content-Type: application/json'
    );
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"url": "http://api.hackertarget.com/reverseiplookup/?q='.$websiteUrl.'"}');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function extractline($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function randomkey($array) {
    $randomKey = array_rand($array);
    return $array[$randomKey];
}
?>
<hr><font size=3>Unknown45 - 2021