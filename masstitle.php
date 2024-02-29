<html>
<head>
<title>[+] Status & Title Checker [+]</title>
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
<font face=courier new size=5>Status Code + Title Checker<br><font size="3">Berguna Untuk Mencari Tahu Status Kode dan Title Pada Website<br><hr>
<form method="post">
	<textarea name="url" class="url" placeholder="https://exploits.my.id"></textarea><br><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php
if (isset($_POST['go'])) {
	ob_implicit_flush();ob_end_flush();
  	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  	$list = explode("\r\n", $_POST['url']);
  	if (count(array_unique($list)) > 50) {
  		die("Max List 50 Web per Submit !");
  	}
  	echo "[+] Loading ... ( ".count(array_unique($list))." sites )<br><br>";
  	foreach ($list as $web) {
  		$status = status($web, "2");
  		if ($status == "200") {
  			$title = status($web, "1");
  			echo "[<nemu>Status 200</nemu>] ".htmlspecialchars($web)." (<oren>".$title."</oren>)<br>";
  		} elseif ($status == "403") {
  			$title = status($web, "1");
  			echo "[<ungu>Status 403</ungu>] ".htmlspecialchars($web)." (<oren>".$title."</oren>)<br>";
  		} elseif ($status == "404") {
  			$title = status($web, "1");
  			echo "[<kgk>Status 404</kgk>] ".htmlspecialchars($web)." (<oren>".$title."</oren>)<br>";
  		} elseif ($status == "000" || $status == "0") {
  			echo "[<kuning>Status 000</kuning>] ".htmlspecialchars($web)." -> <oren>Error Connect !</oren><br>";
  		} else {
  			$title = status($web, "1");
  			echo "[<kuning>Status ".$status."</kuning>] ".htmlspecialchars($web)." (<oren>".$title."</oren>)<br>";
  		}
  	}
  	echo "<br>[+] Done ...";
	echo "</pre>";
}

function status($web, $method) {
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
  $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  if ($method == "1") {
  	preg_match_all("/<title>(.*?)<\/title>/im", $res, $a);
  	$a = $a[1];
  	if (empty($a[0])) {
  		return "No Title";
  	} else {
  		return htmlspecialchars($a[0]);
  	}
  	return $res;
  } elseif ($method == "2") {
  	return $status;
  }
}
?>
<hr><font size="3">Unknown45 - 2021</font>