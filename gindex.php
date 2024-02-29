<html>
<head>
<title>[+] Google Index Checker [+]</title>
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
<font face=courier new size=5>Google Index Checker<br><font size="3">cek apakah website nya terindex google</font><font size="3"><hr>
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

    $cek = dapa("https://www.checkmoz.com/bulkindex", "getStatus=1&google=1&siteID=1&sitelink=".$web);
    preg_match_all("/<td>(.*?)<\/td>/i", $cek, $moz);
    $moz = $moz[0]; $moz = $moz[0];
    if (empty($moz)) {
      echo htmlspecialchars($web)." <oren>ID</oren>: ? [<error>Tools Error</error>]<br>";
    } else {
      echo htmlspecialchars($web)." <oren>ID</oren>: ".$moz."<br>";
      @file_put_contents("/tmp/tempku/index.txt", $webasli."\n", FILE_APPEND);
    }
    //echo htmlspecialchars($web)." <oren>DA</oren>: ".$cek['site_da']." ".$pa." ".$mr." ".$ss."<br>";
    //@file_put_contents("/tmp/tempku/dapa.txt", $web." DA:".$cek['site_da']." PA:".$pa." SS:".$ss."\n", FILE_APPEND);
  }
  echo "<br>[~] Done</pre>";
}

function dapa($url, $post) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
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
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  return $ekse;
}

?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>