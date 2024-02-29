<html>
<head>
<title>[+] Mass Domain to IP [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

body {
  max-width: 100% !important;
  overflow-x: hidden;
}

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

textarea::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
  cursor: pointer;
}

textarea::-webkit-scrollbar-track {
  background: ##1e1e1e;        /* color of the tracking area */
  cursor: pointer;
}

textarea::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
  cursor: pointer;
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

oren {
  color: orange;
}
</style>
<body>
<center>
<font face=courier new size=5>Mass Domain to IP<br><font size="3">Mengubah Beberapa Domain Menjadi IP Secara Instan</font><font size="3"><hr>
<form method="post">
  <textarea name="url" placeholder="https://exploits.my.id/" required="true"></textarea><br><br>
<input type="submit" name="go" value="Gaskan">
</form></font></font></center>
<?php
if (isset($_POST['go'])) {
  ob_implicit_flush();ob_end_flush();
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  if (empty($_POST['url'])) {
    die("Hadeh ente wkwk");
  } else {
    $url = explode("\r\n", $_POST['url']);
  }
  echo "[+] Loading ... ( ".count($url)." sites )<br><br>";
  foreach ($url as $web) {
    if (strpos($web, "http") === false) {
      $web = "//".$web;
    }
    $cek = parse_url($web);
    echo htmlspecialchars(gethostbyname($cek['host']))."<br>";
  }
  echo "<br>[~] Done</pre>";
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>