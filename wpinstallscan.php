<html>
<head>
<title>[+] Mass WP setup-config Scanner [+]</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
</head>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white" style="max-width: 100%">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');


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

nemu {
	color: green;
}

kgk {
	color: red;
}

error {
	color: yellow;
}

.custom {
	width: 100px;
	max-width: 50%;
}

</style>
<script type="text/javascript">
$(function() {
    $('input[name="custom"]').on('click', function() {
        if ($(this).val() == 'yes') {
            $('#textboxes').show();
        }
        else {
            $('#textboxes').hide();
        }
    });
});
</script>
<body>
<center>
<font face=courier new size=5>Mass WP Install Scanner<br><font size="3">Check Wordpress Yang Vuln Di Install</font><font size="3"><hr>
<form method="post">
<textarea rows=1 name="url" placeholder="https://exploits.my.id/" required="true"></textarea><br><br>
<input type="radio" name="custom" checked="true" value="no"> No Path 
<input type="radio" name="custom" value="yes"> Custom Path <br><br>
<div id="textboxes" style="display: none">
<textarea name="wordlist" class="custom" placeholder="/
/wp
/blog
/old
/wordpress"></textarea>
<br><br>
</div>
<input type="submit" name="go" value="Gaskan">
</form>
<?php
if (isset($_POST['go'])) {
	ob_implicit_flush();ob_end_flush();
	echo "<hr><pre style='text-align: left; white-space: pre-line;'>";
	echo "[+] Loading ...<br><br>";
	if (empty($_POST['url'])) {
		die("Kalo gada web mau hek apa bre ? wkwk");
	} else {
		$list = explode("\r\n", $_POST['url']);
		if (count($list) > 20) {
			die("Web tidak boleh lebih dari 20 per submit !");
		}
	}
	if ($_POST['custom'] == "no") {
		$dir = array('');
	} elseif ($_POST['custom'] == "yes") {
		if (empty($_POST['wordlist'])) {
			$dir = array('', 'wp', 'old', 'blog', 'wordpress');
		} else {
			$dir = explode("\r\n", $_POST['wordlist']);
		}
	} else {
		die("Mau ngapain bre ? wkwk");
	}
	foreach ($dir as $path) {
		foreach ($list as $web) {
			if (strpos($web, "http") === false) {
				echo "[<error>Error</error>] Awalan website harus ada http ! <i>".$web."</i><br>";
				continue;
			}
			if (strpos($web, "install.php") !== false) {
				echo "[<error>Error</error>] Cukup masukan web tanpa /wp-admin/install.php ! <i>".$web."</i><br>";
				continue;
			}
			$web = $web."/".$path."/wp-admin/install.php?step=1";
			$web = str_replace("///", "/", $web);
			$web = str_replace("//", "/", $web);
			$web = str_replace("https:/", "https://", $web);
			$web = str_replace("http:/", "http://", $web);
			$out = htmlspecialchars(str_replace("?step=1", "", $web));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $web);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "language=en_GB");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36");
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$ekse = curl_exec($ch);
			if (strpos($ekse, "user_name") !== false) {
				echo "[<nemu>Vuln</nemu>] ".$out."<br>";
			} elseif (strpos($ekse, "wp-login.php") !== false) {
				echo "[<kgk>Not Vuln</kgk>] ".$out."<br>";
			} elseif (curl_errno($ch)) {
				echo "[<error>Timeout</error>] ".$out."<br>";
			} else {
				echo "[<error>Not Found</error>] ".$out."<br>";
			}
			curl_close($ch);
		}
	} echo "<br>[~] Done";
}
echo "</pre>";
?>
<hr><font face="courier" size="3">Unknown45 - 2021</font>