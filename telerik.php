<html>
<head>
<title>[+] Mass Telerik Scanner [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<?php
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$memek = $_REQUEST['file'];
$kentod = file_get_contents("/tmp/tempku/".$memek."_tl.uk45");
if ($memek) {
  header("Content-Type: text/html");
  echo "<pre style='text-align: left; white-space: pre-line;'>";
  echo $kentod;
  echo "</pre>";
  exit();
}
?>
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

vuln {
  color: green;
}

kgk {
  color: red;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass Telerik Scanner<br><font size="3">Mencari Telerik UI Dari Beberapa Website Secara Instan</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id" required="true"></textarea><br><br>
<input type="checkbox" name="show" checked="true"> Show Not Found<br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $list = explode("\r\n", $_POST['url']);
  if (empty($list)) {
    die("Hadeh ente wkwk");
  }
  $lokasi = array("/DesktopModules/Admin/RadEditorProvider/DialogHandler.aspx", "/providers/htmleditorproviders/telerik/telerik.web.ui.dialoghandler.aspx", "/desktopmodules/telerikwebui/radeditorprovider/telerik.web.ui.dialoghandler.aspx", "/desktopmodules/dnnwerk.radeditorprovider/dialoghandler.aspx");
  ob_implicit_flush();ob_end_flush();
  foreach ($list as $web) {
    foreach ($lokasi as $lok) {
      $webnya = $web."/".$lok;
      if (isset($_POST['show'])) {
        $b = "[<kgk>Not Found</kgk>] ".$webnya."<br>";
      } else {
        $b = "";
      }
      $cek = get($webnya);
      if (preg_match("/Loading the dialog/i", $cek)) {
        echo "[<vuln>Found</vuln>] ".$webnya."<br>";
        file_put_contents("/tmp/tempku/restelerik.txt", $webnya."\n", FILE_APPEND);
      } else {
        if (!empty($b)) {
          echo $b;
        } else {
          continue;
        }
      }
    }
  }
}

echo "</pre>";

function get($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
}
?>
<hr>Unknown45 - 2021