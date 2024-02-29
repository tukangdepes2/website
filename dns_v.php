<html>
<head>
<title>[+] DNS Lookup [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 500px;
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
  background: ##1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: ##1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style><center>
<font face=courier new size=5>DNS Lookup<br><font size="3">mencantumkan data DNS domain secara instan<hr>
<form action="" method="POST">
<textarea name="text" placeholder="www.domain.com
domain.com
masukan domain tanpa http://" cols=50 rows=10></textarea>
<br><input type="submit" name="zone" class="asu" value="Lookup"></form>
<?php
$kontol = $_POST["text"];
$meki = str_replace("https://", "", $kontol);
$memek = str_replace("http://", "", $meki);
$sedd = explode("\r\n",$memek);
if($_POST["text"]){
echo '<hr><table id="tabnet"><tr><th>Hostname	</th><th>Type</th><th>	TTL	</th><th>Priority</th><th>Content</th></tr>';
foreach ($sedd as $site){
$sed = file_get_contents("https://who.is/dns/".$site);

preg_match_all('/<tr><td>(.*?)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><\/tr>/',$sed,$a);
$hitung = count($a[0]);
$mulai = 0;
while ($mulai < $hitung){
	echo "<tr><td>".$a[1][$mulai]."</td><td><center>".$a[2][$mulai]."</center></td><td><center>".$a[3][$mulai]."</center></td><td><center>".$a[4][$mulai]."</center></td><td>".$a[5][$mulai]."</td></tr>";
	$mulai++;
}
echo "<tr><th></th><th></th><th></th><th></th><th></th></tr>";
echo "<tr><th></th><th></th><th></th><th></th><th></th></tr>";
}
echo "</table>";
}
?>
<center><hr><font fsize=3>Unknown45 - 2021
