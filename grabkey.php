<html>
<head>
<title>[+] Keyword to Domain [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
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
</style>
<body>
<center>
<font face=courier new size=5>Keyword to Domain<br><font size="3">Mengambil domain dari keyword yang di gunakan</font><font size="3"><hr>
<form method="post">
<input type="text" name="dork" size="50" placeholder="/wp-admin/setup-config.php" style="font-family: Helvetica"><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
	ob_implicit_flush();ob_end_flush();
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	echo "[+] Loading ...<br><br>";
	$dork = $_POST['dork'];
	$cek = dork($dork);
	if (empty($cek)) {
		$cek = dork($dork);
	}
	$json = json_decode($cek, true);
	if ($json['status'] == "200") {
		$res = $json['matches'];
		foreach ($res as $wkwk) {
			if (empty($wkwk['site'])) {
				echo htmlspecialchars($wkwk['ip'])."<br>";
			} elseif ($wkwk['ip']) {
				echo htmlspecialchars($wkwk['site'])."<br>";
			}
		}
	} else {
		echo "Domain tidak ditemukan !";
	}
	echo "<br>[+] Done ...";
}
echo "</pre>";
function dork($dork) {
	$web = rawurlencode(rawurlencode($dork));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.zoomeye.org/search?q=".$web."&page=1&pageSize=20&t=v4%2Bv6%2Bweb");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>