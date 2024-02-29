<html>
<head>
<title>[+] Mass Notify Zone-XSec [+]</title>
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
<font face=courier new size=5>Mass Notify Zone-XSec<br><font size="3">Mirror di Zone-XSec secara sekaligus</font><font size="3"><hr>
<form method="post">
  Attacker<br><input type="text" name="attacker" size="25" placeholder="Unknown45" style="text-align: center;" class="area"><br><br>
  Team<br><input type="text" name="team" size="30" placeholder="Heker Pro" style="text-align: center;" class="area"><br><br>
<textarea name="url" required="true" placeholder="https://exploits.my.id/hacked.html"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (!file_exists("/tmp/tempku")) {
    @mkdir("/tmp/tempku");
  }
  if (isset($_POST['attacker'])) {
    $attacker = $_POST['attacker'];
    $attacker = str_replace('"', '', $attacker);
    $attacker = str_replace('|', '', $attacker);
  } else {
    die("Attacker tidak boleh kosong !");
  }
  if (isset($_POST['team'])) {
    $team = $_POST['team'];
    $team = str_replace('"', '', $team);
    $team = str_replace('|', '', $team);
  }
  if (isset($_POST['url'])) {
    $url = explode("\r\n", $_POST['url']);
    if (count($url) > 5000) {
      die("Max 5000 web per submit !");
    }
  } else {
    die("Hadeh ente wkwkw");
  }
  echo "[+] Loading ... ( ".count($url)." sites )<br><br>";
  foreach ($url as $web) {
    if (empty($web)) {
      echo "[<error>Error</error>] Url Cannot be Empty !<br>";
      continue;
    }
    $web = str_replace('"', '', $web);
    $web = str_replace('|', '', $web);
    $ekse = shell_exec('curl -Lsk --ipv4 -d "attacker='.$attacker.'&team='.$team.'&poc=1&reason=5&urls='.$web.'&mirror=submit" https://zone-xsec.com/notify | grep -e "atob"');
    $hasil = str_replace("const result = JSON.parse(atob('", "", $ekse);
    $hasil = str_replace("'));", "", $hasil);
    $hasil = base64_decode($hasil);
    if (strpos($hasil, "Invalid") !== false) {
      echo "[<error>Invalid</error>] ".htmlspecialchars($web)."<br>";
    } elseif (strpos($hasil, "Success") !== false) {
      echo "[<nemu>OK</nemu>] ".htmlspecialchars($web)."<br>";
    } elseif (strpos($hasil, "Already") !== false) {
      echo "[<error>Already Defaced</error>] ".htmlspecialchars($web)."<br>";
    } elseif (strpos($hasil, "Ban") !== false) {
      echo "[<error>Ban Domain</error>] ".htmlspecialchars($web)."<br>";
    } else {
      echo "[<kgk>Not Defaced</kgk>] ".htmlspecialchars($web)."<br>";
    }
  }
  echo "<br>Archive Defacer : <a href='https://zone-xsec.com/archive/attacker/".htmlspecialchars($attacker)."' target='_blank'>https://zone-xsec.com/archive/attacker/".htmlspecialchars($attacker)."</a>";
  echo "<br><br>[~] Done </pre>";
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>