<html>
<head>
<title>[+] Whois Lookup [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white">
<center>
  <font size=5>Whois Lookup</font><br><font size="3">find the registered owner, netblock, ASN and registration dates</font><hr>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');
  @import url('https://fonts.googleapis.com/css?family=Roboto+Mono');

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
  text-align: left;
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

oren {
  color: orange;
}
</style>

<center><form method="post">
<input type="text" name="url" height="20" placeholder="https://exploits.my.id" style="padding-left: 5px; margin: 10px;font-family: Roboto Mono" size="40" required></textarea><br>
<input type="submit" name="go" value="Whois" onclick="ngeklik()">
<?php
if (isset($_POST['go'])) {
  echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
  $web = $_POST['url'];
  if (!preg_match("/http/i", $web)) {
    $web = "//".$web;
  }
  $web = parse_url($web);
  $web = $web['host'];
  $cek = check($web);
  $res = get_string_between($cek, "<pre>", "</pre>");
  if (!empty($res)) {
    echo htmlspecialchars($res);
  } else {
    echo "Whois : <oren>".htmlspecialchars($_POST['url'])."</oren> Not Found !";
  }
  echo "</pre>";
}

function check($web) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://webmaster.my.id/whois/?domain=".$web);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko, ".rand().") Chrome/92.0.4515.131 Safari/537.36");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  return curl_exec($ch);
  curl_close($ch);
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>
<hr><font size=3>Unknown45 - 2021