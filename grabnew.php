<html>
<head>
<title>[+] Grab New Domain [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


textarea {
max-width: 100%;
width: 100%;
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

select,option {
  background-color: #1e1e1e;
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
<font face=courier new size=5>Grab New Domain<br><font size="3">Data Domain Yang Terdaftar Bulan Ini</font><font size="3"><hr>
<form method="post">
<?php
ob_implicit_flush();ob_end_flush();
$source = check("https://ipsniper.info/new_domains");
preg_match_all('/">(.*?)<\/a><br>/i', $source, $list);
preg_match_all('/https\:\/\/ipsniper\.info\/new_domains\/(.*?)\/">/i', $source, $nama);
$nama = $nama[1];
if (empty($list)) {
	die('[+] Tools Error ! Silahkan Contact Owner');
} else {
	if (empty($_POST['date'])) {
		echo 'Tanggal : ';
		echo '<select name="date">';
		foreach ($list[1] as $no => $tanggal) {
			if (strstr($tanggal, "New domains index")) {
				$tanggal = explode('">', $tanggal);
				$tanggal = $tanggal[1];
			}
			echo '<option value="'.htmlspecialchars($nama[$no]).'+'.htmlspecialchars($tanggal).'">'.htmlspecialchars($tanggal).'</option>';
		}
		echo '</select>';
	} else {
		$waktu = explode('+', $_POST['date']);
		$waktu = $waktu[1];
		echo 'Tanggal : <oren>'.htmlspecialchars($waktu)."</oren>";
	}
	if (isset($_POST['go']) && !empty($_POST['date']) && empty($_POST['domen'])) {
		$waktu = $_POST['date'];
		$date = explode('+', $_POST['date']);
		$date = $date[0];
		$source = check("https://ipsniper.info/new_domains/".$date."/");
		preg_match_all('/https:\/\/ipsniper\.info\/new_domains\/'.$date.'\/(.*?)">/i', $source, $domain);
		if (empty($domain)) {
			die("[!] Tools Error ! Contact Owner Tools ini !");
		} else {
			echo '<br>Domain : <select name="domen">';
			foreach ($domain[1] as $domain) {
				echo '<option value="'.htmlspecialchars($domain).'">.'.htmlspecialchars($domain).'</option>';
			}
			echo '</select>';
		}
		echo '<br><br><input type="hidden" name="date" value="'.htmlspecialchars($waktu).'"><input type="submit" name="go" value="Gaskeun">';
		echo '</form>';
	} elseif (isset($_POST['go']) && !empty($_POST['date']) && !empty($_POST['domen'])) {
		$waktu = $_POST['date'];
		$date = explode('+', $_POST['date']);
		$date = $date[0];
		$domen = $_POST['domen'];
		$source = check("https://ipsniper.info/new_domains/".$date."/");
		preg_match_all('/https:\/\/ipsniper\.info\/new_domains\/'.$date.'\/(.*?)">/i', $source, $domain);
		if (empty($domain)) {
			die("[!] Tools Error ! Contact Owner Tools ini !");
		} else {
			echo '<br>Domain : <select name="domen">';
			foreach ($domain[1] as $domain) {
				echo '<option value="'.htmlspecialchars($domain).'">.'.htmlspecialchars($domain).'</option>';
			}
			echo '</select>';
		}
		echo '<br><br><input type="hidden" name="date" value="'.htmlspecialchars($waktu).'"><input type="submit" name="go" value="Gaskeun">';
		echo '</form>';
		$source = check("https://ipsniper.info/new_domains/".$date."/".$domen);
		$listdom = extractLine("</h2>", "<p>", $source);
		if (empty($listdom)) {
			die("[+] Tools Error ! Contact Owner Tools ini !");
		} else {
			echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
			echo "Total : <oren>".count(explode("<br>", $listdom))."</oren> Sites<br>";
			echo "<textarea>";
			echo str_replace("<br>", "", $listdom);
			echo "</textarea>";
			echo "</pre>";
		}
	} else {
		echo '<br><br><input type="submit" name="go" value="Gaskeun">';
		echo '</form>';
	}

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

function extractLine($startTag, $endTag, $html) {
    $startPos = strpos($html, $startTag);
    $endPos = strpos($html, $endTag, $startPos);

    if ($startPos !== false && $endPos !== false) {
        $result = substr($html, $startPos + strlen($startTag), $endPos - $startPos - strlen($startTag));
        return $result;
    } else {
        return "[+] Tools Error ! Contact Owner Tools ini !";
    }
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>