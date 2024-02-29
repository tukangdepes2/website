<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>[+] IP Lookup [+]</title>
	<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
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

h2 {
	font-family: Staatliches;
}

table {
	font-family: Staatliches;
}

h1 {
	font-family: Staatliches;
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
<body><center>
	<form class="form" method="POST">
		<div class="formRight"><input type="text" name="lookupip" maxlength="15" /></div>
		<input type="submit" value="Look Up IP" name="lookupipbtn" class="asu"/>
	</form>
<hr>
<?php
if (isset($_POST['lookupipbtn'])) {
	$ip = $_POST['lookupip'];
	if (empty($ip)) {
		die('<center><h2>Error: No IP Specified.</h2></center></body></html>');
	}
	if (!filter_var($ip, FILTER_VALIDATE_IP)) {
		die('<center><h2>Error: Invalid IP.</h2></center></body></html>');
	}
} else {
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
}
$long = ip2long($ip);
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
	echo '<center><h2>IP resides in a private range.</h2></center>';
} else {
	$ipinfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	/*
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, ("http://ipinfo.io/{$ip}/json"));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$ipinfo = json_decode(curl_exec($ch));
	curl_close($ch);
	*/
}
if (empty($ip)) $ip = "Not Found";
if (empty($long)) $long = "Not Found";
if (empty($ipinfo->org)) $ipinfo->org = "Not Found";
if (empty($ipinfo->hostname)) $ipinfo->hostname = "Not Found";
if (empty($ipinfo->country)) $ipinfo->country = "Not Found";
if (empty($ipinfo->city)) $ipinfo->city = "Not Found";
if (empty($ipinfo->region)) $ipinfo->region = "Not Found";
if (empty($ipinfo->postal)) $ipinfo->postal = "Not Found";
if (empty($ipinfo->loc)) $ipinfo->loc = "Not Found";


echo ('	<center><h1>IP Information:</h1></center>
	<table align="center">
	<tr><td><b>IP : </b></td><td><b>'.$ipinfo->ip.'</b></td></tr>
	<tr><td><b>Decimal : </b></td><td><b>'.$long.'</b></td></tr>
	<tr><td><b>Organization : </b></td><td><b>'.$ipinfo->org.'</b></td></tr>
	<tr><td><b>Host Name : </b></td><td><b>'.$ipinfo->hostname.'</b></td></tr>
	<tr><td><b>Country : </b></td><td><b>'.$ipinfo->country.'</b></td></tr>
	<tr><td><b>State : </b></td><td><b>'.$ipinfo->region.'</b></td></tr>
	<tr><td><b>City : </b></td><td><b>'.$ipinfo->city.'</b></td></tr>
	<tr><td><b>Postal : </b></td><td><b>'.$ipinfo->postal.'</b></td></tr>
	<tr><td><b>Latitude/Longitude:</b></td><td><b>'.$ipinfo->loc.'</b></td></tr>
	</table>
<br><hr><center><hr><font size=3>Unknown45 - 2021</font></center>
');
?>
</body>
</html>
