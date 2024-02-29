<html>
<head>
<title>[+] Mass phpMyAdmin Scanner [+]</title>
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

ijo {
  color: green;
}

kgk {
  color: red;
}

oren {
	color: orange;
}

kuning {
	color: yellow;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass phpMyAdmin Scanner<br><font size="3">Mencari phpMyAdmin / Adminer Pada Website Secara Bersamaan</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
	$url = $_POST['url'];
	if (empty($url)) {
		die("Boleh juga lu");
	}
	$url = explode("\r\n", $url);
	$page = array("phpmyadmin", "phpMyAdmin", "adminer.php");
	if (count(array_unique($url)) > 20) {
		die("<hr>[+] Maksimal 20 Web Per Submit !");
	}
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	echo "[+] Loading ( ".count(array_unique($url))." Sites ) ...<br><br>";
	ob_implicit_flush();ob_end_flush();
	foreach (array_unique($url) as $web) {
		foreach ($page as $lok) {
			$we = str_replace("///", "/", $web."/".$lok);
			$cek = check($we);
			if (preg_match("/adminer/i", $we)) {
				if (preg_match("/www\.adminer\.org/i", $cek)) {
					echo "[<ijo>Found Adminer</ijo>] ".htmlspecialchars($we)."<br>";
					file_put_contents("/tmp/tempku/pma.txt", $we."\n", FILE_APPEND);
				} else {
					echo "[<kgk>Not Found</kgk>] ".htmlspecialchars($we)."<br>";
				}
			} else {
				if (preg_match("/pma_username/i", $cek)) {
					echo "[<ijo>Found PMA</ijo>] ".htmlspecialchars($we)."<br>";
					file_put_contents("/tmp/tempku/pma.txt", $we."\n", FILE_APPEND);
				} else {
					echo "[<kgk>Not Found</kgk>] ".htmlspecialchars($we)."<br>";
				}
			}
		}
	}
	echo "<br>[+] Done ...";
	echo "</pre>";
}

function check($web) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $web);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
	//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64; Trident/7.0; MAARJS; rv:11.0) like Gecko");
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
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>