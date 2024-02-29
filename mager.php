<?php
@error_reporting(0);
@set_time_limit(0);
?>
<html>
<head>
<title>[+] Mager Nulis [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>Mager Nulis</font><br><font face=Staatliches size=3>rekomendasi buat yang mager nulis tugas wkwk</font><hr>
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
  font-family: Courier;
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

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
<form method="POST">
<font>Nama<br>
<input type="text" name="nama" height="40" style="margin: 5px auto; padding-left: 5px; text-align: center;" size="35" required><br>
<font>Kelas<br>
<input type="text" name="kelas" height="20" style="margin: 5px auto; padding-left: 5px; text-align: center;" size="35" required><br>
<font>Text<br>
<textarea type="text" name="kata" height="20" style="margin: 5px auto; padding-left: 5px;" size="35" required></textarea><br>
<input type="submit" name="go" value="Gas Tulis"></form>
<?php
$nama = urlencode($_POST['nama']);
$kelas = urlencode($_POST['kelas']);
$kata = urlencode($_POST['kata']);
$submit = $_POST['go'];
if($submit) {
echo "<hr><a href='https://google-github.herokuapp.com/https/api.zeks.xyz/api/magernulis?nama=" . $nama . "&kelas=" . $kelas . "&text=" . $kata . "&tinta=4&apikey=apivinz'><img src='https://api.zeks.xyz/api/magernulis?nama=" . $nama . "&kelas=" . $kelas . "&text=" . $kata . "&tinta=4&apikey=apivinz' width='100% height='100%'></a><br>";
}
?>
<font><hr>Unknown45 - 2021