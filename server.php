<?php
$output = $_REQUEST['output'];
if ($output) {
header('Content-type:text/plain');
$memek = file_get_contents("/tmp/tempku/".$output."_sv.uk45");
echo $memek;
exit();
if (empty($memek)) {
  header('Content-type:text/html');
  echo "<title>Redirect</title><h1>Jangan gitu dong jago wkwk</h1><br>Redirecting to <i>https://exploits.my.id</i><meta http-equiv='refresh' content='1; URL=https://exploits.my.id/'>";
  exit();
}
}
?>
<html>
<head>
<title>[+] Mass Scan Server [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="antixss()">
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
</style>
<body>
<center>
<font face=courier new size=5>Mass Scan Server<br><font size="3">Untuk Mencari Web Server Yang Digunakan Dengan Instan<hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php
$namafile = basename($_SERVER['REQUEST_URI']);
$random = mt_rand(10000000,99999999);
$url = $_POST['url'];
$submit = $_POST['go'];
$meki = str_replace("\r", "", $url);
if (file_exists("/tmp/tempku")) {    
  } else {
    passthru("mkdir /tmp/tempku");
  }
if($submit) {
  echo "<hr>";
  echo "Check <a href='".$namafile."&output=".$random."' target='_blank'><font color=yellow>Raw Output Text</font></a> Here<br>";
$file = fopen("/tmp/tempku/".$random."","w");
fwrite($file, $meki);
fclose($file);
echo "<pre style='text-align: left; white-space: pre-line;'>";
ob_implicit_flush();
ob_end_flush();
$kentod = shell_exec('xargs -P 0 -n 1 curl -Iks --ipv4 --max-time 6 -w "Domain: %{url_effective}\n" < /tmp/tempku/'.$random.' | sed "s|server|Server|g" | grep -e "Domain:" -e "Server:" | tee -a /tmp/tempku/'.$random.'_sv.uk45');
$ewebang = str_replace("Server:", "<hr>Server:", $kentod);
echo $ewebang;
echo "</pre>";
}
?>
</form>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>