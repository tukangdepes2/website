<html>
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
<?php
error_reporting(0);
echo "<center>
<font face=courier new size=5>Website IP Finder</font><hr>
<form action='' method='post'>
<font face=arial>http://</font> <input class='input' name='domain' placeholder='www.situs.com'> <button class='button'>Check</button>
";
$x = $_POST['domain'];
$y = gethostbyname($_POST['domain']);
echo "</div>";
echo "<pre> Domain : $x<br>";
echo " IP     : $y</pre>";
echo "</form>";
?>
<head>
<title>[+] Website IP Finder [+]</title>
</head>
<center><hr><font size=3>Unknown45 - 2021</font>
</html>
