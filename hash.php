<html>
<head>
<title>[+] Hash Identifier [+]</title>
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
</style>
<body>
<center>
<font face=courier new size=5>Hash Identifier<br><font size="3">Untuk mengidentifikasi type hash</font><font size="3"><hr>
<form method="post">
<input type="text" name="hashnya" size="60" placeholder="a2956629e6a48213b50c3cb7a2b8b649"><br><br>
<input type="submit" name="go" value="Check Hash">
</form>
</font>
</font>
<?php

if (!file_exists("/usr/local/bin/hashid")) {
  die("<hr>Tools belum terinstall, silahkan hubungi owner tools.");
}

if (isset($_POST['go'])) {
  $hash = $_POST['hashnya'];
  $hash = str_replace("'", '', $hash);
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $cek = shell_exec("/usr/local/bin/hashid '".$hash."'");
  if (empty($cek)) {
    die("[!] Tools Error . Silahkan hubungi owner tools.");
  }
  echo htmlspecialchars($cek);
  echo "</pre>";
}
?>
</font>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>