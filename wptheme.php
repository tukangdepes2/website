<html>
<head>
<title>[+] Mass WP Themes Scanner [+]</title>
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

oren {
	color: orange;
}

kuning {
	color: yellow;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass WP Theme Scanner<br><font size="3">Check Theme Yang di Gunakan Secara Instan</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/ (only url)" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
	ob_implicit_flush();ob_end_flush();
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	if (empty($_POST['url'])) {
		die();
	}
	$site = explode("\r\n", $_POST['url']);
	echo "[+] Loading ... ( ".count($site)." sites )<br><br>";
	foreach ($site as $web) {
		$cek = check($web);
		if (empty($cek)) {
			echo "[<kuning>Error</kuning>] ".htmlspecialchars($web)."<br>";
			continue;
		} elseif (!preg_match("/wp-content\/themes/i", $cek)) {
			echo "[<kgk>Wordpress</kgk>] ".htmlspecialchars($web)."<br>";
			continue;
		}
		preg_match_all("/wp-content\/themes\/(.*?)\//im", $cek, $hasil);
		$hasil = $hasil[1];
		echo "[<nemu>Wordpress</nemu>] ".htmlspecialchars($web)." (<oren>".$hasil[1]."</oren>)<br>";
	}
	echo "<br>[+] Done ...\n";
	echo "</pre>";
}

function check($web) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $web);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
	curl_close($ch);
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>