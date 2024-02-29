<html>
<head>
<title>[+] Auto Mirror [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');
   @import url('https://fonts.googleapis.com/css?family=Helvetica');


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

input[type="text"] {
  font-family: 'Helvetica';
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

a {
  color: orange;
}

vuln {
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
<font face=courier new size=5>Auto Mirror<br><font size="3">Mirror Hasil Deface ke Beberapa Tempat Mirror Otomatis</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/unknown45.html" required="true"></textarea><br><br>
Notifier : <br><input type="text" name="user" required="true" placeholder="Unknown45"><br><br>
Team : <br><input type="text" name="team"><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
</font>
</font>
<?php
if (isset($_POST['go'])) {
  $url = explode("\r\n", $_POST['url']);
  $user = $_POST['user'];
  $team = $_POST['team'];
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  ob_implicit_flush();ob_end_flush();
  foreach ($url as $web) {
    echo htmlspecialchars($web)." ZH: ".zoneh($web, $user)." ZXS: ".zonexsec($web, $user, $team)." HID: ".haxorid($web, $user, $team)."<br>";
    //echo htmlspecialchars($web)." ZH: ".zoneh($web, $user)." ZD: ".zoned($web, $user)." ZXS: ".zonexsec($web, $user, $team)." HID: ".haxorid($web, $user, $team)."<br>";
  }
  echo "<br>[+] Zone-h : <a href='https://zone-h.org/archive/notifier=".htmlspecialchars($user)."/published=0' target='_blank'>https://zone-h.org/archive/notifier=".htmlspecialchars($user)."/published=0</a><br>";
  #echo "[+] Zone-d : <a href='https://zone-d.org/' target='_blank'>https://zone-d.org/</a><br>";
  echo "[+] Zone-XSec : <a href='https://zone-xsec.com/archive/attacker/".htmlspecialchars($user)."' target='_blank'>https://zone-xsec.com/archive/attacker/".htmlspecialchars($user)."</a><br>";
  echo "[+] HaxorID : <a href='https://haxor.id/archive/attacker/".htmlspecialchars($user)."' target='_blank'>https://haxor.id/archive/attacker/".htmlspecialchars($user)."</a>";
  echo "</pre>";
}

function zoneh($url, $user) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://zone-h.org/notify/single");
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=".$user."&domain1=".$url."&hackmode=1&reason=1");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  if (preg_match("/color=\"red\">OK<\/font><\/li>/i", $ekse)) {
    return "<vuln>OK</vuln>";
  } else {
    return "<kgk>NO</kgk>";
  }
}

function haxorid($url, $user, $team) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://hax.or.id/notify/single");
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=".$user."&reason=1&submit=Notify&team=".$team."&vulntype=1&webtarget=".$url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  if (preg_match("/<div class='alert alert-success' role='alert'>/i", $ekse)) {
    return "<vuln>OK</vuln>";
  } else {
    return "<kgk>NO</kgk>";
  }
}

/*
function zoned($url, $user) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://zone-d.org/notify/action");
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "attacker=".$user."&poc=known vulnerability (i.e. unpatched system)&url=".$url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/tempku/cookies.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/tempku/cookies.txt');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  if (preg_match("/Success<\/span>/i", $ekse)) {
    return "<vuln>OK</vuln>";
  } else {
    return "<kgk>NO</kgk>";
  }
}
*/

function zonexsec($url, $user, $team) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://zone-xsec.com/notify");
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "attacker=".$user."&mirror=submit&poc=1&reason=1&team=".$team."&urls=".$url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/tempku/cookies.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/tempku/cookies.txt');
  curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  if (preg_match("/W1sxLCJ/i", $ekse)) {
    return "<vuln>OK</vuln>";
  } else {
    return "<kgk>NO</kgk>";
  }
}

?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>