<html>
<head>
<title>[+] Admin Login Finder [+]</title>
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

textarea#note {
  width:100%;
    resize: none;
  display:block;
  max-width:100%;
  border: none;
    outline: none;
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

nemu {
	color: #90ee90;;
}

merah {
	color: red;
}

hijau {
	color: green;
}

kuning {
	color: yellow;
}

ungu {
	color: purple;
}

gold {
	color: gold;
}

oren {
	color: orange;
}

biru {
	color: blue;
}
</style>
<body>
<center>
<font face=courier new size=5>Admin Login Finder<br><font size="3">Login Finder Dengan Wordlist Bisa Di Custom<br><hr>
<form method="post">
	Url : <br><input type="url" name="url" size="50"><br><br>
	Wordlist : <br>
<textarea rows=1 name="wordlist" placeholder="/admin
/administrator
/login.php
/admin.php

(apabila kosong, otomatis menggunakan default wordlist)"><?php if(isset($_POST['wordlist'])){echo htmlspecialchars($_POST['wordlist']);}?></textarea><br><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php

if (!file_exists("/tmp/tempku/wordlist-admin")) {
	if (!file_exists("/tmp/tempku")) {
		mkdir("/tmp/tempku");
	} else {
		$word = file_get_contents("https://pastebin.com/raw/0LcGef19");
		file_put_contents("/tmp/tempku/wordlist-admin", $word);
	}
}
if (isset($_POST['url'])) {
	$url = $_POST["url"];
}
if (isset($_POST['wordlist'])) {
	$wordlists = $_POST["wordlist"];
	$wordlist = explode("\r\n", $wordlists);
	if (empty($wordlists)) {
		$list = file_get_contents("/tmp/tempku/wordlist-admin");
		$wordlist = explode("\r\n", $list);
	}
}
if (isset($url)) {
	ob_implicit_flush();ob_end_flush();
	echo "<hr>Loading ...<br>Total Wordlist (<oren>".count($wordlist)."</oren>)<hr><pre style='text-align: left; white-space: pre-line;'>";
	echo "[+] Loading ...<br><br>";
	foreach ($wordlist as $wl) {
		$web = $url."/".$wl;
		$web = str_replace("///", "/", $web);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $web);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$res = curl_exec($ch);
		$info = curl_getinfo($ch);
		if ($info['http_code'] == "200") {
			if (preg_match("/admin login|admin|login/i", $res)) {
				echo "[<nemu>Found Login</nemu>] ".htmlspecialchars($web)."<br>";
			} else {
				echo "[<hijau>HTTP 200</hijau>] ".htmlspecialchars($web)."<br>";
			}
		} elseif ($info['http_code'] == "404") {
			echo "[<merah>HTTP 404</merah>] ".htmlspecialchars($web)."<br>";
		} elseif ($info['http_code'] == "403") {
			echo "[<ungu>HTTP 403</ungu>] ".htmlspecialchars($web)."<br>";
		} elseif ($info['http_code'] == "500") {
			echo "[<kuning>HTTP 500</kuning>] ".htmlspecialchars($web)."<br>";
		} elseif ($info['http_code'] == "302" || $info['http_code'] == "301") {
			echo "[<biru>HTTP ".$info['http_code']."</biru>] ".htmlspecialchars($web)." <oren>-></oren> ".$info['url']."<br>";
		} elseif ($info['http_code'] == "0") {
			echo "[<merah>Error Connection</merah>] ".htmlspecialchars($web)."<br>";
		} else {
			echo "[<gold>HTTP ".$info['http_code']."</gold>] ".htmlspecialchars($web)."<br>";
		}
	}
	echo "<br>[+] Done ...";
}
echo "</pre>";
?>
<hr><font size="3">Unknown45 - 2021</font>