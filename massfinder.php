<html>
<head>
<title>[+] Mass Admin Finder [+]</title>
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

nemu {
	color: #90ee90;;
}

kgk {
	color: red;
}

admin {
	color: green;
}

oren {
	color: orange;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass Admin Login Finder<br><font size="3">Mass Login Finder Dengan Wordlist Bisa Di Custom<br><hr>
<form method="post">
	<textarea name="url" class="url" placeholder="https://exploits.my.id"></textarea><br><br>
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
	$url = explode("\r\n", $url);
}
if (isset($_POST['wordlist'])) {
	$wordlists = $_POST["wordlist"];
	$wordlist = explode("\r\n", $wordlists);
	if (empty($wordlists)) {
		$wordlist = array('/admin','/administrator','/adminweb','/login.php','/admin.php','/adminpanel','/panel');
	}
}
if ($url) {
	echo "<hr>Loading ...<br>(<oren>".count($url)."</oren>) Web & (<oren>".count($wordlist)."</oren>) Wordlist<hr><pre style='text-align: left; white-space: pre-line;'>";
	foreach ($url as $link) {
	foreach ($wordlist as $wl) {
		ob_implicit_flush(true);ob_end_flush();
		$web = $link."/".$wl;
		$web = str_replace("'", "", $web);
		$web = str_replace('"', '', $web);
		$web = str_replace("&", "", $web);
		$web = str_replace("|", "", $web);
		$web = str_replace("/////", "/", $web);
		$web = str_replace("////", "/", $web);
		$web = str_replace("///", "/", $web);
		$web = str_replace("//", "/", $web);
		$web = str_replace("https:/", "https://", $web);
		$web = str_replace("http:/", "http://", $web);
		$ekse = shell_exec("curl -Lsk --ipv4 -o /dev/null -I -w '%{http_code}' '".$web."' --max-time 7");
		if ($ekse == "200") {
			$lagi = shell_exec("curl -Lsk --ipv4 '".$web."' --max-time 7 | grep -e 'login'");
			if (empty($lagi)) {
				echo "[<nemu>Found</nemu>] ".$web."\n";
			} else {
				echo "[<admin>Found Login</admin>] ".$web."\n";
			}
		} else {
			echo "[<kgk>Not Found</kgk>] ".$web."\n";
		}
	}
}
}
echo "</pre>";
?>
<hr><font size="3">Unknown45 - 2021</font>