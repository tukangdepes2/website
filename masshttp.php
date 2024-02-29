<html>
<head>
<title>[+] Mass Add HTTP [+]</title>
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
</style>
<body>
<center>
<font face=courier new size=5>Mass Add http<br><font size="3">Menambahkan http pada awal domain secara instan</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="exploits.my.id/tools.html?http" required="true"></textarea><br><br>
<input type="radio" name="pilih" value="1" checked="true">http
<input type="radio" name="pilih" value="2">https
<input type="radio" name="pilih" value="3">http://www
<input type="radio" name="pilih" value="4">https://www<br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (isset($_POST['url'])) {
    $url = explode("\r\n", $_POST['url']);
  } else {
    die("Kalo url kosong trus mau ngapain wkwk");
  }
  if ($_POST['pilih'] == "1") {
    $pilih = "http://";
  } elseif ($_POST['pilih'] == "2") {
    $pilih = "https://";
  } elseif ($_POST['pilih'] == "3") {
    $pilih = "http://www.";
  } elseif ($_POST['pilih'] == "4") {
    $pilih = "https://www.";
  } else {
    die("Pilih salah satu bukan yang lain wkwk");
  }
  echo "[+] Loading ... ( ".count($url)." sites )<br><br>";
  foreach ($url as $web) {
    echo htmlspecialchars($pilih."".$web)."<br>";
  }
  echo "<br>[~] Done</pre>";
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>