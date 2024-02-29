<html>
<head>
<title>[+] Grab Domain from HaxorID [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<meta name="description" content="Mengambil Domain dari Hasil Mirror Defacer">
<meta property="og:image" content="https://i.imgur.com/5rdUUlU.jpg">
<meta name="theme-color" content="#1e1e1e">
<meta name="author" content="Unknown45">
<meta name="robots" content="noindex">
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');
  @import url('https://fonts.googleapis.com/css?family=Helvetica');


textarea {
max-width: 100%;
width: 100%;
height: 200px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

input[name="attacker"] {
  font-family: Helvetica;
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
<font face=courier new size=5>Grab Domain from HaxorID<br><font size="3">Mengambil Domain dari Hasil Mirror Defacer</font><font size="3"><hr>
<form method="post">
<input type="text" name="attacker" placeholder="nama defacer" size="25"><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  if (isset($_POST['attacker'])) {
    $attacker = $_POST['attacker'];
    $attacker = urlencode($attacker);
  } else {
    die();
  }
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  echo "Defacer : ".htmlspecialchars($_POST['attacker'])."<br><br>";
  $cekdulu = cekinfo($attacker);
  if (preg_match("/Page Not Found/i", $cekdulu)) {
    die("Defacer Tidak Ditemukan !<center><hr><font size=3>Unknown45 - 2021");
  }
  echo "<textarea>";
  foreach (range(1, 50) as $page) {
    $cek = attacker($attacker, $page);
    if (preg_match("/Page Not Found/i", $cek)) {
      die("Defacer tidak di temukan !<center><hr><font size=3>Unknown45 - 2021");
    } elseif (preg_match("/Out of data/i", $cek)) {
      die("</textarea><br><br>[+] Done ....<center><hr><font size=3>Unknown45 - 2021");
    } else {
      preg_match_all('/href="http(.*?)"/im', $cek, $result);
      foreach ($result[1] as $web) {
        $web = str_replace("s://", "//", $web);
        $web = str_replace("://", "//", $web);
        if (!preg_match("/haxor\.id|s\.id/i", $web)) {
          $parse = parse_url($web);
          if (!empty($parse['host'])) {
            echo htmlspecialchars($parse['host'])."\n";
          }
        }
      }
    }
  }
}
echo "</textarea>";
echo "</pre>";
function attacker($nick, $page) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://haxor.id/archive/attacker/".$nick."&page=".$page);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
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

function cekinfo($nick) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://haxor.id/archive/attacker/".$nick);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
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
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>