<html>
<head>
<title>[+] Mass Country Checker [+]</title>
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

input[type="text"] {
  font-family: 'Helvetica';
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

oke {
  color: orange;
}

vuln {
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
<font face=courier new size=5>Mass Country Checker<br><font size="3">Melihat Lokasi Dari Berbagai Website Secara Instan</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/
exploits.my.id" required="true"></textarea><br><br>
<input type="checkbox" name="ipnya" value="123">Show IP<br><br>
<input type="submit" name="go" value="Gaskan">
</form>
</font>
</font>
<?php
if (isset($_POST['go'])) {
	if (isset($_POST['ipnya'])) {
		$ipnya = "gaskeun";
	} else {
		$ipnya = false;
	}
  $url = explode("\r\n", $_POST['url']);
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (count(array_unique($url)) > 100) {
    die("Limit 100 Web Per Submit ! Disubmit : <error>".count(array_unique($url))."</error>");
  }
  echo "[+] Loading ... ( ".count(array_unique($url))." sites )<br><br>";
  ob_implicit_flush();ob_end_flush();
  foreach ($url as $web) {
    if (empty($web)) {
      continue;
    } elseif (preg_match("/http/i", $web)) {
      $web = parse_url($web);
      $web = $web['host'];
    }
    $cek = ekse($web);
    preg_match_all('/"country_name": <\/span><span class="ip-info-right">&quot;(.*?)&quot;,<\/span><br>/i', $cek, $country);
    @$country = @$country[1]; @$country = @$country[0];
    preg_match_all('/"ip": <\/span><span class="ip-info-right">&quot;(.*?)&quot;,<\/span><br>/i', $cek, $ip);
    @$ip = @$ip[1]; @$ip = @$ip[0];
    if ($ipnya = "gaskeun") {
    	echo htmlspecialchars($web)." <oke>COUNTRY:</oke> ".$country." <oke>IP:</oke> ".$ip."<br>";
    } else {
    	echo htmlspecialchars($web)." <oke>COUNTRY:</oke> ".$country."<br>";
    }
  }
  echo "<br>[+] Done ...";
}

function ekse($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://ipgeolocation.io/ip-location/".$web);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  //curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_POSTFIELDS, "submitter=Check DA History&txtdahist=".$web);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  //curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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