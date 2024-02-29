<html>
<head>
<title>[+] Mass PHP Debugbar Checker [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="antixss()">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


textarea {
max-width: 90%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

.url {
	width: 90%;
}

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
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

kgk {
	color: red;
}

nemu {
	color: green;
}

oren {
	color: orange;
}

ungu {
	color: purple;
}

kuning {
	color: yellow;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass PHP Debugbar Checker<br><font size="3">Mengecek PHP Debugbar Pada Website Secara Instan<br><hr>
<form method="post">
	<textarea name="url" class="url" placeholder="https://exploits.my.id"></textarea><br><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php
if (isset($_POST['go'])) {
	ob_implicit_flush();ob_end_flush();
  	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  	$list = explode("\r\n", $_POST['url']);
  	if (count(array_unique($list)) > 100) {
  		die("Max List 100 Web per Submit !");
  	}
  	echo "[+] Loading ... ( ".count(array_unique($list))." sites )<br><br>";
  	foreach ($list as $web) {
  		$status = status($web);
  		if (preg_match("/PhpDebugBar\.DebugBar|var phpdebugbar/i", $status)) {
        echo "[<nemu>Found</nemu>] ".htmlspecialchars($web)."<br>";
        file_put_contents("/tmp/tempku/debugbar.txt", $web."\n", FILE_APPEND);
      } else {
        echo "[<kgk>Not Found</kgk>] ".htmlspecialchars($web)."<br>";
      }
  	}
  	echo "<br>[+] Done ...";
	echo "</pre>";
}

function status($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $res = curl_exec($ch);
  return $res;
}
?>
<hr><font size="3">Unknown45 - 2021</font>