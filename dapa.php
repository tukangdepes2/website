<html>
<head>
<title>[+] DA PA Checker [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<meta name="robots" content="noindex">
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

body {
  max-width: 100% !important;
  overflow-x: hidden;
}

textarea {
max-width: 90%;
width: 90%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

textarea#note {
  width:100%;
    resize: none;
  display:block;
  max-width:100%;
  border: none;
    outline: none;
}

button {
  background: transparent;
    font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

input {
  background: transparent;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
  max-width: 95%;
}

font {
  font-family: Staatliches;
}

body::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

body::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
  cursor: pointer;
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
  cursor: pointer;
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
  cursor: pointer;
}

.area {
  font-family: Courier;
}

nemu {
  color: green;
}

kgk {
  color: red;
}

error {
  color: yellow;
}

oren {
  color: orange;
}
</style>
<body>
<center>
<font face=courier new size=5>DA PA Checker<br><font size="3">Biasa digunakan untuk check ranking web</font><font size="3"><hr>
</font>
<form method="post">
  <textarea name="url" placeholder="https://exploits.my.id/" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form></font></font></center>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (empty($_POST['url'])) {
    die("Hadeh ente wkwk");
  } else {
    $url = explode("\r\n", $_POST['url']);
  }
  if (count($url) > 100) {
    die("Maximal 100 web persubmit");
  }
  $random = "/tmp/".rand().".cookie";
  echo "[+] Loading ... ( ".count($url)." sites )<br><br>";
  foreach ($url as $web) {
    if ($web == "") {
      continue;
    }

    $webasli = $web;

    if (preg_match("/http/i", $web)) {
      $web = parse_url($web);
      $web = $web['host'];
    }

    //$cek = dapa("https://ettvi.com/page-authority-checker", "id=page-authority&site=".$web);
    //preg_match_all('/<td><span class="text-blue h4">(.*?)<\/span>/i', $cek, $resnya);
    //$resnya = $resnya[0]; $da = $resnya[0]; $pa = $resnya[1];
    //if (empty($da) && empty($pa) || $da == "0") {
      $cek1 = dapa("https://www.robingupta.com/wp-content/plugins/mng_domain_auth_v3//alexa.action.php", "da=y&mng_2_api_urls=https://thefashionhubs.com/wp-content/plugins/mng_bulk_domain_authority_api_v3/api.php&mng_t=0&pa=y&page_token=get_website&ss=y&website_name=".$web);
      $cek = dapa2("https://www.robingupta.com/wp-content/plugins/mng_domain_auth_v3//alexa.action.php?sitename=".$web."&page_token=get_website&null&da=y&pa=y&ss=y&v=1");
      preg_match_all("/<th>(.*?)<\/th>/i", $cek, $resnya);
      $resnya = $resnya[1]; $da = $resnya[1]; $pa = $resnya[2]; $ss = $resnya[3];
      if (empty($da) || $da === "0" || strstr($da, "N/A")) {
        $token = gtoken("https://www.duplichecker.com/domain-authority-checker.php", $random);
        $resnya = json_decode(duplichecker($web, $token, $random), true);
        $da = str_replace(".00", "", $resnya['domain_auth']); $pa = str_replace(".00", "", $resnya['page_auth']);
        if (empty($da) || $da === "0") {
          $token = ctoken("https://contconcord.com/domain-authority-checker", $random);
          $cek = contconcord($web, $token, $random);
          preg_match_all('/<td>(.*?)<\/td>/i', contconcord_get($random), $resnya);
          $resnya = $resnya[1]; $da = $resnya[2]; $pa = $resnya[3];
          if (empty($da) || $da === "0") {
            echo "[Tools Error] ".$web."\n";
          } else {
            echo htmlspecialchars($webasli)." <oren>DA</oren>: ".$da." <oren>PA</oren>: ".$pa."<br>";
            @file_put_contents('/tmp/tempku/dapa.txt', $web."DA: ".$da." PA: ".$pa."\n", FILE_APPEND);
          }
        } else {
          echo htmlspecialchars($webasli)." <oren>DA</oren>: ".$da." <oren>PA</oren>: ".$pa."<br>";
          @file_put_contents('/tmp/tempku/dapa.txt', $web."DA: ".$da." PA: ".$pa."\n", FILE_APPEND);
        }
      } else {
        echo htmlspecialchars($webasli)." <oren>DA</oren>: ".$da." <oren>PA</oren>: ".$pa." <oren>SS</oren>: ".$ss."<br>";
        @file_put_contents('/tmp/tempku/dapa.txt', $web."DA: ".$da." PA: ".$pa." SS: ".$ss."\n", FILE_APPEND);
      }
    //} else {
    //  echo htmlspecialchars($webasli)." <oren>DA</oren>: ".$da." <oren>PA</oren>: ".$pa."<br>";
    //  file_put_contents('/tmp/tempku/dapa.txt', $web."DA: ".$da." PA: ".$pa."\n", FILE_APPEND);
    //}
    //echo htmlspecialchars($web)." <oren>DA</oren>: ".$cek['site_da']." ".$pa." ".$mr." ".$ss."<br>";
    //@file_put_contents("/tmp/tempku/dapa.txt", $web." DA:".$cek['site_da']." PA:".$pa." SS:".$ss."\n", FILE_APPEND);
  }
  echo "<br>[~] Done</pre>";
  @unlink($random);
}

function dapa($url, $post) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest", "Cookie: PHPSESSID=cbb2e69e5408bf133757e3da0386910"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  return $ekse;
}

function dapa2($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest", "Cookie: PHPSESSID=cbb2e69e5408bf133757e3da0386910"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  return $ekse;
}

function gtoken($url, $cookienya) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  //curl_setopt($ch, CURLOPT_COOKIESESSION, true);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookienya);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookienya);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  preg_match_all('/<meta name="csrf-token" content="(.*?)">/i', $ekse, $res);
  $res = $res[1][0];
  return $res;
}

function ctoken($url, $cookienya) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  //curl_setopt($ch, CURLOPT_COOKIESESSION, true);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookienya);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookienya);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  preg_match_all('/name="_token" value="(.*?)">/i', $ekse, $res);
  $res = $res[1][0];
  return $res;
}

function duplichecker($web, $token, $cookienya) {
    $url = 'https://www.duplichecker.com/domain-authority-checker/ajax';
    
    $headers = array(
        'authority: www.duplichecker.com',
        'accept: application/json, text/javascript, */*; q=0.01',
        'accept-language: en-US,en;q=0.9',
        'content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'origin: https://www.duplichecker.com',
        'referer: https://www.duplichecker.com/domain-authority-checker.php',
        'sec-ch-ua: "Not_A Brand";v="8", "Chromium";v="120", "Google Chrome";v="120"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Linux"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
        'x-requested-with: XMLHttpRequest',
    );
    
    $data = array(
        'action' => 'getDomainAuthority',
        'current_url' => 'http://'.$web,
        '_token' => $token,
    );
    
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_COOKIEJAR => $cookienya,
        CURLOPT_COOKIEFILE => $cookienya,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_HTTPHEADER => $headers,
    );
    
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        return false;
    }
    
    curl_close($ch);
    
    return $response;
}

function contconcord($web, $token, $cookienya) {
    $url = 'https://contconcord.com/domain-authority-checker';
    
    $headers = array(
        'authority: contconcord.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: en-US,en;q=0.9',
        'cache-control: max-age=0',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://contconcord.com',
        'referer: https://contconcord.com/domain-authority-checker',
        'sec-ch-ua: "Not_A Brand";v="8", "Chromium";v="120", "Google Chrome";v="120"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Linux"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: same-origin',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
    );
    
    $data = array(
        '_token' => $token,
        'urls' => $web,
    );
    
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_COOKIEJAR => $cookienya,
        CURLOPT_COOKIEFILE => $cookienya,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_HTTPHEADER => $headers,
    );
    
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        return false;
    }
    
    curl_close($ch);
    
    return $response;
}

function contconcord_get($cookienya) {
    $url = 'https://contconcord.com/domain-authority-checker';

    $headers = array(
        'authority: contconcord.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: en-US,en;q=0.9',
        'cache-control: max-age=0',
        'referer: https://contconcord.com/domain-authority-checker',
        'sec-ch-ua: "Not_A Brand";v="8", "Chromium";v="120", "Google Chrome";v="120"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Linux"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: same-origin',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
    );

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_COOKIEJAR => $cookienya,
        CURLOPT_COOKIEFILE => $cookienya,
        CURLOPT_HEADER => false,
        CURLOPT_HTTPHEADER => $headers,
    );

    $ch = curl_init();
    curl_setopt_array($ch, $options);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return false;
    }

    curl_close($ch);

    return $response;
}

?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>