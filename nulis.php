<html>
<head>
<title>[+] Bot Nulis [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
	<font size=5>Bot Nulis</font><br><font face=Staatliches size=3>rekomendasi buat yang mager nulis<hr><font size="2">Tools Ke Dua : <a href="https://exploits.my.id/tools?mager"><font color="yellow">Mager Nulis</font></a><hr></font>
<style>
	@import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 100%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
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
}

font {
	font-family: Staatliches;
}

body::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

body::-webkit-scrollbar-track {
  background: #1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: #1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
<form method="post">
<textarea type="text" class="area" name="url" height="20" placeholder="Andai 'ku malaikat, kupotong sayapku
Dan rasakan perih di dunia bersamamu
Perang 'kan berakhir, cinta 'kan abadi
Di tanah anarki romansa terjadi" style="margin: 5px auto; padding-left: 5px;" required></textarea><br>
<input type="submit" name="go" value="Gas Tulis">
</form>
<?php
if (isset($_POST['go'])) {
	if (empty($_POST['url'])) {
		exit("kata2 nya kok kosong ?");
	} else {
		$kata = urlencode($_POST['url']);
	}
	echo "<hr>";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://salism3api.pythonanywhere.com/write/?text=".$kata); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$hasil = json_decode(curl_exec($ch));
	curl_close($ch);
	foreach ($hasil->images as $gambar) {
		echo "<img src='".$gambar." loading='lazy'>";
	}
}
?>
<hr>
<i><font size="2">Alternative Link : <font color="yellow" onclick="location.replace('http://nulis.rf.gd');" style="cursor: pointer;">http://nulis.rf.gd</font></i>
<br><font size="3">unknown45 - 2021
