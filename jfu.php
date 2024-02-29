<html>
<head>
<title>[+] Jquery Path Finder [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


textarea {
max-width: 90%;
width: 90%;
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

nemu {
  color: green;
}

kgk {
  color: red;
}
</style>
<body>
<center>
<font face=courier new size=5>JQuery Path Scanner<br><font size="3">Berguna Untuk Mencari Path Jquery File Upload</font><font size="3"><hr>
<form method="post">
<input type="text" name="url" size="45" placeholder="https://exploits.my.id/"><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if ($_POST['go'] == "Gaskan") {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
  } else {
    die("Hadeh ente ada ada aja wkwk");
  }
  $dir = array('asset/global/plugins/server/php/','asset/global/plugins/jquery-file-upload/server/php/','assets/global/plugins/server/php/','assets/global/plugins/jquery-file-upload/server/php/','asset/plugins/js/server/php/','asset/plugins/js/jquery-file-upload/server/php/','assets/plugins/js/server/php/','assets/plugins/js/jquery-file-upload/server/php/','asset/plugins/server/php/','asset/plugins/jquery-file-upload/server/php/','assets/plugins/server/php/','assets/plugins/jquery-file-upload/server/php/','asset/server/php/','assets/server/php/','assets/jquery-file-upload/server/php/','plugins/server/php/','plugins/js/jquery-file-upload/server/php/','js/jquery-file-upload/server/php/','plugin/server/php/','js/server/php/','uploads/server/php/','plugins/js/jquery-file-upload/server/php/','plugins/js/server/php/','admin/asset/global/plugins/server/php/','admin/asset/global/plugins/jquery-file-upload/server/php/','admin/assets/global/plugins/server/php/','admin/assets/global/plugins/jquery-file-upload/server/php/','admin/asset/plugins/js/server/php/','admin/asset/plugins/js/jquery-file-upload/server/php/','admin/assets/plugins/js/server/php/','admin/assets/plugins/js/jquery-file-upload/server/php/','admin/asset/plugins/server/php/','admin/asset/plugins/jquery-file-upload/server/php/','admin/assets/plugins/server/php/','admin/assets/plugins/jquery-file-upload/server/php/','admin/asset/server/php/','admin/assets/server/php/','admin/assets/jquery-file-upload/server/php/','admin/plugins/server/php/','admin/plugins/js/jquery-file-upload/server/php/','admin/js/jquery-file-upload/server/php/','admin/plugin/server/php/','admin/js/server/php/','admin/uploads/server/php/','admin/plugins/js/jquery-file-upload/server/php/','admin/plugins/js/server/php/', 'server/php/', 'cp/server/php/');
  echo "[+] Loading ...<br><br>";
  foreach ($dir as $path) {
    $wkwk = $url."/".$path;
    $wkwk = str_replace("///", "/", $wkwk);
    $wkwk = str_replace("//", "/", $wkwk);
    $wkwk = str_replace("https:/", "https://", $wkwk);
    $wkwk = str_replace("http:/", "http://", $wkwk);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $wkwk);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch ,CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); 
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    $ekse = curl_exec($ch);
    if (strpos($ekse, "files") !== false) {
      echo "[<nemu>Found</nemu>] ".$wkwk."<br>";
    } elseif (curl_errno($ch)) {
      echo "[<error>Timeout</error>] ".$wkwk."<br>";
    } else {
      echo "[<kgk>Not Found</kgk>] ".$wkwk."<br>";
    }
    curl_close($ch);
  }
  echo "<br>[~] Done </pre>";
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>