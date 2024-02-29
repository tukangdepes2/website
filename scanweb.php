<html>
<head>
<title>[+] Mass Scan Defaced Website [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="antixss()">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


textarea {
max-width: 90%;
height: 150px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

.url {
  width: 90%;
}

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
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

nemu {
  color: #90ee90;;
}

kgk {
  color: red;
}

admin {
  color: green;
}

oren {
  color: orange;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass Scan Defaced Website<br><font size="3">Buat scan web yang udh kena hack apa kagak<br><hr>
<form method="post">
  <textarea name="url" class="url" placeholder="https://exploits.my.id"></textarea><br><br>
  Nick : <br>
  <input type="text" name="nick" class="area"><br><br>
<input type="submit" name="go" value="Gaskeun"><br>
</form>
<?php
if (isset($_POST["url"])) {
  $url = $_POST["url"];
}
if (isset($_POST["nick"])) {
  $nick = $_POST["nick"];
  $nick = str_replace("'", "", $nick);
  $nick = str_replace("&", "", $nick);
  $nick = str_replace("|", "", $nick);
}
if ($nick) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $url = explode("\r\n", $url);
  foreach ($url as $web) {
    ob_implicit_flush(true);ob_end_flush();
    $web = str_replace("'", "", $web);
    $web = str_replace("|", "", $web);
    $web = str_replace("&", "", $web);
    $ekse = shell_exec("curl -A -Lsk --ipv4 '".$web."' --max-time 7 | grep -e '".$nick."'");
    if (empty($ekse)) {
      echo "[<kgk>Not Hacked</kgk>] ".$web."\n";
    } else {
      echo "[<nemu>Hacked</nemu>] ".$web."\n";
    }
  }
}
echo "</pre>";
?>
<hr><font size="3">Unknown45 - 2021</font>