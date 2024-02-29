<html>
<head>
<title>[+] WPScan Online [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

body {
  max-width: 100% !important;
  overflow-x: hidden;
}

textarea {
max-width: 100%;
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

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
  cursor: pointer;
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
  cursor: pointer;
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
  cursor: pointer;
}

.area {
  font-family: Courier;
}

nemu {
  color: green;
}

kgk {
  color: red;
}

error {
  color: yellow;
}

</style>
<body>
<center>
<font face=courier new size=5>WPScan Online<br><font size="3">Scan Wordpress Dengan Tool WPScan Versi Web</font><font size="3"><hr>
  <?php if (!file_exists("/usr/bin/wpscan")) { die("Tools wpscan belum di install, mohon segara infokan ke live chat");} ?>
<form method="post">
  <input type="text" name="url" size="30" class="area" placeholder="https://exploits.my.id/" required="true">
<input type="submit" name="go" value="Gaskan">
</form></center>
<?php
@error_reporting(1);

if (!empty("/tmp/tempku/wpscan")) {
  mkdir("/tmp/tempku/wpscan");
  chmod("/tmp/tempku/wpscan", 0777);
}

if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre>";
  if (empty($_POST['url'])) {
    die("Hadeh ente mau ngapain wkwk");
  } else {
    $url = $_POST['url'];
    $url = str_replace("'", "", $url);
    $url = str_replace('"', '', $url);
    $url = str_replace("|", "", $url);
    if (strpos($url, "http") === false) {
      $url = "http://".$url;
    }
  }
  echo "[~] Testing connection to target ...<br><br>";
  $cek = @shell_exec("curl -Lsk --ipv4 --max-time 30 -A 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36' '".$url."'");
  if (strpos($cek, "/wp-content/") !== false) {
    echo "[<nemu>OK</nemu>] ".$url."<br><br>";
    echo "[~] Loading WPScan ...<br><br>";
  } elseif (strpos($cek, "403 Forbidden")) {
    die("[<kgk>403 Forbidden</kgk>] ".$url."<br><br>");
  } elseif (strpos($cek, "Captcha")) {
    die("[<error>Captcha</error>] ".$url."<br><br>");
  } elseif ($cek == false) {
    die("[<error>Failed Load</error>] ".$url."<br><br>");
  } else {
    die("[<error>Error</error>] ".$url." is not wordpress site !<br><br>");
  }
  system("echo N | /usr/bin/wpscan --url '".$url."' --stealthy --cache-dir '/tmp/tempku/wpscan/' --format cli-no-color --enumerate vp,vt");
  echo "<br><br>[~] Done";
  echo "</pre>";
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>