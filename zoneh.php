<html>
<head>
<title>[+] Mass Notify Zone-H [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
kgk {
  color: red;
}
vuln {
  color: green;
}
kun {
  color: yellow;
}
sayu {
	text-align: left;
}
</style>
<form method="post">
<font face=courier size=5>Mass Notify Zone-H<br>
  <font size="3">Buat Yang Males Paste Link Satu Satu wkwk</font></font><hr><font>
  Nick : <br><input type="text" name="nick" size="40" class="courier" required="true"><br><br>
  Url : <br><textarea name="url" required="true"></textarea><br><br>
  <input type="submit" name="submit" value="Gaskeun">
</form>
<?php
if (isset($_POST['submit'])) {
  $nick = $_POST['nick'];
  if (empty($nick)) {
    die("Sopan kh begitu ?");
  }
  $web = explode("\r\n", $_POST['url']);
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  ob_implicit_flush();ob_end_flush();
  foreach ($web as $wb) {
    $cek = notify($nick, $wb);
    preg_match_all('/color="red">(.*?)</i', $cek, $a);
    //print_r($a);
    $res = $a[1];
    $res = $res[0];
    if (preg_match("/OK/i", $res)) {
      echo htmlspecialchars($wb)." -> <vuln>OK</vuln><br>";
    } elseif (preg_match("/ERROR/i", $res)) {
      echo htmlspecialchars($wb)." -> <kgk>ERROR</kgk><br>";
    } else {
      echo htmlspecialchars($wb)." -> <kun>[Error Access Zone-H]</kun><br>";
    }
  }
  echo "<br>Defacer Onhold: <a href='https://www.zone-h.org/archive/notifier=".htmlspecialchars($nick)."/published=0<br>' target='_blank'>https://www.zone-h.org/archive/notifier=".htmlspecialchars($nick)."/published=0</a><br>";
  echo "Defacer Archive: <a href='https://www.zone-h.org/archive/notifier=".htmlspecialchars($nick)."' target='_blank'>https://www.zone-h.org/archive/notifier=".htmlspecialchars($nick)."</a>";
}
echo "</pre>";

function notify($defacer, $web) {
  //$url = 'https://mywordpress/wp-login.php';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://zone-h.org/notify/single");
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=".$defacer."&domain1=".$web."&hackmode=1&reason=1");
  //curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Safari/605.1.15');
  curl_setopt($ch, CURLOPT_AUTOREFERER, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  //curl_setopt($ch, CURLOPT_COOKIESESSION, true);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie_wp');
  //curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookie_wp');
  return curl_exec($ch);
}
?>
<hr><font size="3">Unknown45 - 2021</font>