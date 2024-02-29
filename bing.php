<html>
<head>
<title>[+] Bing Dorker [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
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

a {
	color: #ffffff;
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

.asu {
	font-family: courier;
}

nemu {
  color: lightgreen;
}

kgk {
  color: red;
}

ungu {
  color: purple;
}

oke {
  color: gold;
}

lima {
  color: yellow;
}
</style>
<script>
function auto_grow(element) {
    element.style.height = "100%";
    element.style.height = (element.scrollHeight)+"px";
}
function select_all() {
var text_val = document.getElementById('select');
text_val.focus(); // Focus on textarea 
text_val.select();// Select all text  
document.execCommand("Copy");
document.getElementById('select').focus();
}
</script>
<center>
<font face=courier new size=5>Bing Dorker</font><br>
<font size=3>Solusi Buat Yang Males Manual Dorking + Sering Kena Captcha<hr>
<form method="post">
<input type="text" class="area" name="url" size="45" height="10" placeholder="Unknown45" style="margin: 5px auto; padding-left: 5px;font-family: courier" required><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php
if (isset($_POST['go'])) {
  $web = rawurlencode($_POST['url']);
  $pages = array("1", "11", "21", "31", "41", "51", "61", "71", "81", "91", "101", "111", "121", "131", "141", "151", "161", "171", "181", "191", "201");
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  echo "[+] Dork : <oke>".htmlspecialchars($web)."</oke><br>";
  echo "[+] Loading ...<br><br>";
  echo '<textarea oninput="auto_grow(this)" id="select">';
  foreach ($pages as $page) {
    $cek = check($web, $page);
    preg_match_all('/<h2><a href="(.*?)" h="/', $cek, $res);
    $resnya = $res[1];
    foreach ($resnya as $hasil) {
      echo $hasil."\n";
    }
  }
  echo "</textarea>";
  echo "<br><br>[+] Done ...";
}
echo "</pre>";

function check($dork, $page) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.bing.com/search?q=".$dork."&first=".$page."&FORM=PERE");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
}

?>
<hr></font><center><font size=3>Unknown45 - 2021