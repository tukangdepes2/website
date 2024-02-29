<html>
<head>
<title>[+] Mass SQLI Scanner [+]</title>
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

ijo {
  color: green;
}

kgk {
  color: red;
}

err {
  color: orange;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass SQLI Scanner<br><font size="3">Mencari Bug SQLI Dari Beberapa Website Secara Instan</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/tools.php?id=69" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['url'])) {
  $url = $_POST['url'];
  $total = array_unique(explode("\n", $url));
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  echo "[+] Loading ... ( ".count($total)." sites )<br><br>";
  foreach ($total as $web) {
    if (empty($url)) {
      continue;
    }
    $cek = check($web."'");
    $list = array("Trying to access array offset on value of type null", "mysqli_fetch_assoc() expects parameter", "You have an error in your SQL syntax", "Out of range value for column", "Data truncated for column", "mysqli_query() expects parameter", "mysqli_real_escape_string() expects parameter", "Unknown column '", "SQL", "mysql_error", "PDO", "SQLSTATE");
    foreach ($list as $error) {
      if (strstr($cek, $error)) {
        echo "[<ijo>Vuln</ijo>] ".htmlspecialchars($web)." -> <err>".$error."</err><br>";
        break;
      } else {
        echo "[<kgk>Not Vuln</kgk>] ".htmlspecialchars($web)."<br>";
      }
    }
  }
  echo "<br>[+] Done ...";
  echo "</pre>";
}

function check($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
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