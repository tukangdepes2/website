<html>
<head>
<title>[+] GeoIP Lookup [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>GeoIP Lookup</font><br><font size="3">Find the location of an IP address with this GeoIP lookup tool</font><hr>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 100%;
height: 150px;
resize: none;
outline: none;
overflow: hidden;
background: transparent;
color: #ffffff;
text-align: center;
}

pre {
  text-align: center;
}

button {
  background: transparent;
    font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

select {
  background: transparent;
  color: #ffffff;
}

select option {
  background-color: #1e1e1e}
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

<center><form method="post">
<input type="text" name="url" height="20" placeholder="https://exploits.my.id / IP" style="padding-left: 5px; margin: 10px;" size="40" required></textarea><br>
<input type="submit" name="go" value="Lookup" onclick="ngeklik()">
<?php
$url = $_POST['url'];
$submit = $_POST['go'];
if($submit) {
$http = str_replace("http://", "", $url);
$https = str_replace("https://", "", $http);
$terakhir = str_replace("/", "", $https);
$prenya = file_get_contents("https://pastebin.com/raw/xrsf6P0q");
$vpn = file_get_contents('https://api.hackertarget.com/geoip/?q=' . $terakhir);
echo '<hr><font size=3>GeoIP Lookup From : <font color=orange><i>' . $url . '</font></i><br>';
ob_flush();
flush();
echo $prenya . '' . $vpn . '</pre>';
ob_end_flush();
}
?>
<hr><font size=3>Unknown45 - 2021