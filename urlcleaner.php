<html>
<head>
<title>[+] URL Cleaner [+]</title>
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

oren {
  color: orange;
}
</style>
<body>
<center>
<font face=courier new size=5>URL Cleaner<br><font size="3">Membersihkan Domain Dari Berbagai Macam Path</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/path/tools.html?urlc" required="true"></textarea><br><br>
Jenis Result<br>
<select name="tipe">
  <option value="1">Tanpa HTTP</option>
  <option value="2">Dengan HTTP</option>
</select><br><br>
<input type="submit" name="gaskan" value="Gaskan">
</form>
<?php
if (isset($_POST['gaskan'])) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $url = $_POST['url'];
  $tipe = $_POST['tipe'];
  if (empty($url)) {
    die("Infone Maszeh");
  }
  $urls = array_unique(explode("\r\n", $url));
  echo "[+] Loading ... ( <oren>".count($urls)." sites</oren> )<br><br>";
  foreach ($urls as $web) {
    if (!preg_match("/http/i", $web)) {
      $web = "//".$web;
    }
    if ($tipe == "1") {
      $a = parse_url($web);
      $a = $a['host'];
      echo htmlspecialchars($a)."<br>";
    } elseif ($tipe == "2") {
      $a = parse_url($web);
      echo htmlspecialchars($a['scheme']."://".$a['host'])."<br>";
    } else {
      die("Infone Maszeh");
    }
  } echo "<br>[+] Done ...";
}
echo "</pre>";
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>