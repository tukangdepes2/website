<?php
@error_reporting(0);
@set_time_limit(0);
?>
<html>
<head>
<title>[+] Nhentai Reader [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>Nhentai Reader [Fast Load]</font><br><font face=Staatliches size=3>tinggal taruh code sung klik gaskan untuk eksekusi<hr></font>
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

@media only screen and (max-width: 600px) {
  img {
    height: 100% !important;
    max-width: 100% !important
  }
}

@media only screen and (max-width: 768px) {
  img {
    height: 700px !important;
    max-width: 100% !important
  }
}

img {
max-width: 80%;
height: 190%;
}

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

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

oren {
  color: orange;
}

</style>
<script>
var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { /* Safari */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE11 */
    document.msExitFullscreen();
  }
}
</script>
<style>img[src="https://external-content.duckduckgo.com/iu/?u="]{display:none;}</style>
<form method="post">
<input type="number" name="url" height="20" placeholder="334430" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" style="margin: 5px auto; padding-left: 5px;" required></textarea><br>
<input type="submit" name="go" value="Gaskan" onclick="ngeklik()"></form>
<?php
if (isset($_POST['go'])) {
  $kode = $_POST['url'];
  $kode = str_replace("|", "", $kode);
  $kode = str_replace("^", "", $kode);
  $kode = str_replace("&", "", $kode);
  $kode = str_replace("$", "", $kode);
  $kode = str_replace(";", "", $kode);
  $kode = str_replace("*", "", $kode);
  $kode = str_replace('"', "", $kode);
  $kode = str_replace("/", "", $kode);
  $kode = str_replace("#", "", $kode);
  $ekse = shell_exec("node test.js \"".$kode."\" | ".base64_decode("YXdrIC1GIiciICcvdXJsL3twcmludCAkMn0n"));
  if (strpos($ekse, "https") !== false) {
    echo "<hr><font>Kode : <oren>".htmlspecialchars($kode)."</oren><br>";
    $judul = shell_exec("node test.js ".$kode." judul");
    echo "Judul : <oren>".htmlspecialchars($judul)."</oren><br><br>";
    //$cover = shell_exec("node test.js \"".$kode."\" cover");
    echo "<br><font onclick='openFullscreen()'><b>[ Klik Untuk FullScreen ]</b><br><br>";
    //echo "<img src='https://external-content.duckduckgo.com/iu/?u=".$cover."' loading='lazy'>";
    $a = explode("\n", $ekse);
    foreach ($a as $b) {
      echo "<img src='https://external-content.duckduckgo.com/iu/?u=".$b."' loading='lazy'><br>";
    }
    echo "<font onclick='closeFullscreen()'><b>[ Tutup FullScreen ]</b></font>";
    echo "<br><br>Tamat :v";
  } else {
    die("<pre>Doujin tidak di temukan !</pre>");
  }
}
?>
<font size="2"><hr><i>Alternative Link : <font color="yellow" onclick="location.replace('http://nhentai.rf.gd/');" style="cursor: pointer;">http://nhentai.rf.gd</font></i><br><font size="3">Unknown45 - 2021<br>